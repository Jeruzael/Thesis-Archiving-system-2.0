<?php require_once "../teamsDataCenter/controller.php"; ?>
<?php include "checker.php"; ?>
<?php #if (isset($_GET['requestsId'])) {
    #$_SESSION['reqId'] = $_GET['requestsId'];
#}
?>
<?php if (isset($_GET['requestsId'])) {
    $rID =  $_GET['requestsId'];
    $updateRequest = mysqli_query($connect, "UPDATE thesisrequest SET requestStatus='borrowed' WHERE requestId=$rID");
    if ($updateRequest) {
         $borrow = mysqli_query($connect, "INSERT INTO thesisborrow (borrowRequestId) VALUES ($rID)");
         
    }
   
}

?>
<?php if (isset($_GET['requestssId'])) {
    $rID =  $_GET['requestssId'];
    $updateRequest = mysqli_query($connect, "UPDATE thesisrequest SET requestStatus='declined' WHERE requestId=$rID");
    if ($updateRequest) {
         $borrow = mysqli_query($connect, "UPDATE thesisrequest
        INNER JOIN thesislibrary ON thesisrequest.requestBookId = thesislibrary.bookId 
        SET bookStatus='available'
        WHERE requestId=$rID;");
    }
   
}

?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Requests</title>
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
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;"><p class="title">Book Request</p></div>
            <div class="container-fluid" style="overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px;">
                    <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                        <th>Request ID</th>
                        <th>Borrower</th>
                        <th>Requested Book</th>
                        <th>Borrowing Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php

                            if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                                $page_no = $_GET['page_no'];
                            }
                            else{
                                $page_no = 1;
                            }
                            $total_records_per_page = 10;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM thesisrequest");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;


                            $dataQuery = "SELECT *, DATE_FORMAT(requestStamp, '%M %d, %Y') as borrowDate FROM thesisrequest
                            INNER JOIN thesislibrary
                            ON thesisrequest.requestBookId = thesislibrary.bookId
                            INNER JOIN teamsuser
                            ON thesisrequest.requesterId = teamsuser.userId
                            WHERE requestStatus = 'pending'
                            order by requestId asc LIMIT $offset, $total_records_per_page";

                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td><?php echo $row['requestId']; ?></td>
                            <td style="text-align:left;"><?php echo ucwords($row['userLastname']); ?>, <?php echo ucwords($row['userFirstname']); ?></td>
                            <td style="text-align:left; width:600px"><?php echo ucwords($row['bookTitle']); ?></td>
                            <td><?php echo $row['borrowDate']; ?></td>
                            
                            <td><a href="brequest.php?requestsId=<?=$row['requestId']?>" onclick="return confirm('Are you sure to accept this request?');" id="btnaccept" style="margin-right: 5px; padding: 5px; width: 30px; color: #fff; border: #AED5FF;"><i class='bx bx-check' style="font-size: 15px;" ></i></a>
                                <a href="brequest.php?requestssId=<?=$row['requestId']?>" onclick="return confirm('Are you sure want to decline this request?');" id="btndecline" style="padding: 5px; width: 30px; color: #fff;  border: #AED5FF;"><i class='bx bx-x' style="font-size: 15px;"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- This section is for Pagination -->
            <?php include "pagination.php"; ?>

        </section>
         <!-- Accept Modal -->
            <div class="modal fade" id="accept" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Accept Request</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="brequest.php" method="post">
                            <div style="display: none;">                     
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;text-align:center" class="form-label">Are you sure you want to accept this request?</label>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="brequest.php?requestedId=<?=$_SESSION['reqId']?>" type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name=""/>Accept</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- Decline Modal -->
            <div class="modal fade" id="decline" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Decline Request</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="brequest.php" method="post">
                            <div style="display: none;">                     
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;text-align:center" class="form-label">Are you sure you want to decline this request?</label>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Decline"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- navigation of menu -->
    <!--<script src="../teamsScript/navigation.js"></script>-->
</html>
