<?php require_once "../teamsDataCenter/controller.php"; ?>
<?php include "checker.php"; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administration | Book Archive</title>
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

        <!--LINKS FOR BOOTSTRAP MODAL-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body>
        <style type="text/css">
            #btnaccept{
                background-color: #AED5FF;
            }
            #btnaccept:hover{
                background-color: #7788F4;
            }
            #btndecline{
                background-color: #AED5FF;
            }
            #btndecline:hover{
                background-color: #FD8978;;
            }
            .bx-check{
               color: #32a852;
            }
            .bx-check:hover{
               color: #fff;
            }
            .bx-x{
                color: #ff0000;
            }
            .bx-x:hover{
                color: #fff;
            }
            <style type="text/css">
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
                margin-top: -80px;
            }

      }
        </style>

        <!-- This section is for menus -->
        <?php include "menu.php"; ?>

        <!--HOME SECTION-->
        <section class="home-section">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;"><p class="title">Book Archive</p></div>

            <!--SEARCH BOX INPUT & DESIGN-->
            <div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
                <center><div class="search__container col-md-9">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search thesis books..." 
                    style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                </div></center>
            </div>
            <!--END OF SEARCHBOX-->

            <!--TABLE-->
            <div class="container-fluid" style="overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                        <th>Book Title</th>
                        <th>Book Cover</th>
                        <th>Author</th>
                        <th>Publishing Date</th>
                    </thead>
                    <tbody id="myTable">
                        <?php

                            if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                                $page_no = $_GET['page_no'];
                            }
                            else{
                                $page_no = 1;
                            }
                            $total_records_per_page = 200;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesisrequest");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;

                            $today = date('Y')-5;
                            $dataQuery = "SELECT * FROM thesislibrary where year(bookPublished)<='$today'";

                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td style="text-align:left; width:500px"><?php echo $row['bookTitle']; ?></td>
                            <td><img class="img-fluid" style="height: 50px;" src="../teamsResources/<?php echo $row['bookCover']; ?>"/></td>
                            <td><?php echo $row['bookAuthor']; ?></td>
                            <td style="text-align:left; width:150px"><?php echo ucwords($row['bookPublished']); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!--END OF TABLE-->

            <!-- This section is for Pagination -->
            <?php include "pagination.php"; ?>
        </section>
    </body>

    <!-- navigation of menu -->
    <!--<script src="../teamsScript/navigation.js"></script>-->
    <script src="../teamsScript/bootstrap.js"></script>
    <script>

    //SEARCH BAR FUNCTIONS
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
</html>
