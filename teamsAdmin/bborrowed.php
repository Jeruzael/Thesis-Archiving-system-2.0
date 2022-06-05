<?php require_once "../teamsDataCenter/controller.php"; ?>
<?php include "checker.php"; ?>
<?php 
    if (isset($_GET['borrowsId'])) {
    $bID = $_GET['borrowsId'];
    $checkRemark = mysqli_query($connect, "SELECT * FROM thesisborrow WHERE borrowId=$bID");
    $remark = mysqli_fetch_assoc($checkRemark);
    $mark = $remark['borrowRemark'];
    if ($mark=='in borrowed') {
        $update = mysqli_query($connect, "UPDATE thesisborrow
        INNER JOIN thesisrequest ON thesisborrow.borrowRequestId = thesisrequest.requestId 
        INNER JOIN thesislibrary ON thesisrequest.requestBookId = thesislibrary.bookId 
        INNER JOIN teamsuser ON thesisrequest.requesterId = teamsuser.userId
        SET bookStatus='available', borrowRemark='returned', borrowDateReturn=current_timestamp()
        WHERE borrowId=$bID;");
    } elseif ($mark=='late'){
        $update = mysqli_query($connect, "UPDATE thesisborrow
        INNER JOIN thesisrequest ON thesisborrow.borrowRequestId = thesisrequest.requestId 
        INNER JOIN thesislibrary ON thesisrequest.requestBookId = thesislibrary.bookId 
        INNER JOIN teamsuser ON thesisrequest.requesterId = teamsuser.userId
        SET bookStatus='available', borrowRemark='resolved late', borrowDateReturn=current_timestamp()
        WHERE borrowId=$bID;");
    }
    elseif ($mark=='lost'){
        $update = mysqli_query($connect, "UPDATE thesisborrow
        INNER JOIN thesisrequest ON thesisborrow.borrowRequestId = thesisrequest.requestId 
        INNER JOIN thesislibrary ON thesisrequest.requestBookId = thesislibrary.bookId 
        INNER JOIN teamsuser ON thesisrequest.requesterId = teamsuser.userId
        SET bookStatus='unavailable', borrowRemark='resolved lost', borrowDateReturn=current_timestamp()
        WHERE borrowId=$bID;");
    }

    
    

}
 ?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Borrowed Records</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/st.css"/>

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body>
        <style type="text/css">
            .active{
            background-color: #FD8978;  
            border-color:transparent; 
            padding:5px; 
            border-radius:4px; 
            color:#fff;
        }
        .active:hover{
            background-color:#FF6048;
            color: #fff;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }
        .reactive{
            background-color: #7788F4;  
            border-color:transparent; 
            padding:5px; 
            border-radius:4px; 
            color:#fff;
        }
        .reactive:hover{
            background-color:#4A63FF;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }
        .done{
            background-color: gray;  
            border-color:transparent; 
            padding:5px; 
            border-radius:4px; 
            color:#fff;
            cursor: none;
        }
        @media (max-width: 400px) {
            *{
                
                padding: 0;
            }
            .home-section{
            }
            .bx-plus{
                display: none;
            }
            .title{
                font-size: 25pt;
            }
            .searchbox{
                margin-top: -60px;
            }

      }
        </style>

        <!-- This section is for menus -->
        <?php include "menu.php"; ?>

        <section class="home-section">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;"><p class="title">Borrowed Books</p></div>
            <div class="container-fluid row searchbox" style="padding-right:20px;">
                <div class="search__container col-md-9">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search thesis books..." 
                    style="">
                </div>
            </div>
            <div class="container-fluid" style="overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                        <th>Request ID</th>
                        <th>Book Title</th>
                        <th>Borrower</th>
                        <th>Borrowing Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="myTable">
                        <?php

                            if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                                $page_no = $_GET['page_no'];
                            }
                            else{
                                $page_no = 1;
                            }
                            $total_records_per_page = 300;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesisborrow");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;


                            $dataQuery = "SELECT *, DATE_FORMAT(borrowStamp, '%M %d, %Y') as borrowDate
                             FROM thesisborrow 
                                INNER JOIN thesisrequest ON thesisborrow.borrowRequestId = thesisrequest.requestId 
                                INNER JOIN thesislibrary ON thesisrequest.requestBookId = thesislibrary.bookId 
                                INNER JOIN teamsuser ON thesisrequest.requesterId = teamsuser.userId
                            order by borrowStamp DESC LIMIT $offset, $total_records_per_page";
                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td style="width: 100px;"><?php echo $row['requestId']; ?></td>
                            <td style="text-align:center; width:500px"><?php echo ucwords($row['bookTitle']); ?></td>
                            <td style="text-align:left; width: 150px;"><?php echo ucwords($row['userLastname']); ?>, <?php echo ucwords($row['userFirstname']); ?></td>
                            <td style="width: 300px;"><?php echo $row['borrowDate']; ?></td>
                            <td style="width: 300px;"><?php echo $row['borrowRemark']; ?></td>
                            <td> 
                                <a href="bborrowed.php?borrowsId=<?=$row['borrowId']?>">
                                <?php if ($row['borrowRemark']=='in borrowed') {
                                    echo "<button class='btn active'>Return
                                    </button>";
                                } elseif ($row['borrowRemark']=='late' || $row['borrowRemark']=='lost') {
                                    echo "<button class='reactive'>Resolve
                                    </button>";
                                }
                                else{
                                    echo "<button class='done'>Done
                                    </button";
                                }
                                 ?>
                                
                            </a>
                            </td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- This section is for Pagination -->
            <?php# include "pagination.php"; ?>

        </section>
    </body>

    <!-- navigation of menu -->
    <!--<script src="../teamsScript/navigation.js"></script>-->
    <script>
    function searchbar__Function() {

    //Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            var found = false;
            var td = tr[i].getElementsByTagName("td");
            for(j = 0; j < td.length; j++) {
                if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {

                    //if found at least once it is set to true
                    found = true;
                }
            }

            //only hides or shows it after checking all columns
            if(found){
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    </script>

    <script src="../teamsScript/bootstrap.js"></script>
</html>
