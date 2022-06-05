<?php 
require_once "../teamsDataCenter/controller.php";
require_once "../teamsDataCenter/connection.php";    
 ?>
<?php #include  "checker.php"; ?>

<!-- STATUS DEACT AND REACT -->
<?php if (isset($_GET['studId'])) {
    $studId =  $_GET['studId'];
    $searchUser = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userId=$studId");
    $data = mysqli_fetch_assoc($searchUser);
    $status = $data['userStatus'];
    if ($status=='deactivated') {
        $reactStud = mysqli_query($connect,"UPDATE teamsuser SET userStatus='active' WHERE userId=$studId");
    } else {
        $deactStud = mysqli_query($connect,"UPDATE teamsuser SET userStatus='deactivated' WHERE userId=$studId");
    }
    
 } 



if(isset($_POST['studentStamp'])){

    $studentStamp = $_POST['studentStamp'];

    $getEnrolled = mysqli_query($connect, "SELECT * FROM enrolled_csd WHERE studentStamp LIKE '$studentStamp%'");
$enrolled = mysqli_fetch_assoc($getEnrolled);


if(mysqli_num_rows($getEnrolled) > 0){
    foreach($getEnrolled as $enrolled){
        $sid = $enrolled['studentId'];
        $fn = $enrolled['studentFirstname'];
        $ln = $enrolled['studentLastname'];
        $si = $enrolled['studentImage'];
        $snum = $enrolled['studentNumber'];
        $sp = $enrolled['studentPassword'];
        $st = $enrolled['studentStatus'];
        $stamp = $enrolled['studentStamp'];
        $email = $enrolled['studentEmail'];
        $encrypt_password = password_hash($sp, PASSWORD_BCRYPT);
        $esQuery = "INSERT INTO teamsuser (userId, userFirstname, userLastname, userImage, userNumber, userEmail, userPassword, userStatus, userStamp)
        VALUES ('$sid','$fn','$ln','$si','$snum', '$email','$encrypt_password','$st','$stamp')";

        
        if($enroll_stud = mysqli_query($connect, $esQuery) === TRUE){

            echo "data added";
            header("Location: student.php");
        }else{            
            echo "<script>alert('Duplicate Entry')</script>";
            unset($_POST['studentStamp']);
            break;
        }
        
    }
}else{
        echo "no data added";
    }
}else{
    //echo "...............Data not set";
}




 ?>


 
 


<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Students</title>
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
        .add-new{
            border: 1px solid #FD8978; 
            padding: 10px; 
            width: 200px; 
            background-color: #FD8978; 
            color: #FFF; 
            border-radius: 5px; 
            margin-top: -10px;
        }
        .add-new:hover{
            background-color:#FF6048;
            color: #fff;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }
        .active{
            background-color: #FD8978;  
            border-color:transparent; 
            padding:5px; 
            border-radius:4px; 
            color:#fff;
        }
        .active:hover{
            background-color:#FF6048;
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
        
            
        </style>
        <!-- This section is for menus -->
        <?php include "menu.php"; ?>

        <section class="home-section" style="background-color: #F8FAFF;">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;">Students</div>
            <div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
                <div class="search__container col-md-9">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search user..." 
                    style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                </div>
                <div class="credits__container col-md-3" style="text-align: center; ">
                    <button type="button" class="btn add-new" data-bs-toggle="modal" data-bs-target="#addUser" style=""><i class='bx bx-plus'></i> Add new user</button>
                </div>
            </div>
            <div class="container-fluid" 
            style="overflow-x: scroll; ">
                <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 1000px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <thead style="background-color: #7788F4; color: #FFF; text-align: center; height: 50px; vertical-align: middle;">
                        <th>User Number</th>
                        <th colspan="2">Name</th>
                        <th>Status</th>
                       
                        <th>Action</th>
                    </thead>
                    <tbody  id="myTable">
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

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM teamsuser");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;

                            
                            $dataQuery = "SELECT * FROM teamsuser 
                            
                            ORDER BY userId ASC LIMIT $offset, $total_records_per_page";
                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){

                            
                           
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">

                            <td id="studNum"><?php echo $row['userId']; ?></td>
                            <td style="text-align:right; width:200px "><?php echo ucwords($row['userFirstname']); ?></td>
							<td style="text-align:left; width:200px"><?php echo ucwords($row['userLastname']); ?></td>
                            <td><?php echo $row['userStatus']; ?></td>
                            <td>
                                <a href="student.php?studId=<?=$row['userId']?>" style="margin-right: 5px; padding: 5px; width: 30px; color: white; text-decoration:none;" class="studbtn">
                                        <?php if ($row['userStatus']=='active') {
                                            echo "<button class='active'>Deactivate</button>";
                                        } else {
                                            echo "<button class='reactive'>Reactivate</button>";
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

        <!-- Add new user Modal-->
        <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add new user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style = "max-height: 400px; min-height: 400px; overflow:auto;">
                        <p style="color:#FD8978; ">Student Account</p>                       
                        <form action="student.php" method="post">
                         <input class="search__input" name="studentStamp" id="myInput" type="text" onkeyup="addStudent.getEnrolledStud(this)" 
                           placeholder="Search enrollment date" 
                            style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">    
                        <table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; 
                        border-radius:5px 5px 0 0;min-width: 300px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                        max-height: 100px; min-height: 100px; overflow:auto;">
                        <tr style="border-bottom:2px solid whitesmoke;">
                        <thead style="text-align: center; height: 50px; vertical-align: middle;">
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                            </tr>
                            </thead>
                            <tbody id="enrollies">
                                                            
                            </tbody>
                            </table>
                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="addusers" value="Add"/>
                     </div> 
                    
                        </form>
                    
                </div>
            </div>
        </div>

        <!-- Deactivate user Modal -->
        <div class="modal fade" id="editStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;text-align:center"><i class='bx bx-user'></i>User Status</p>
                        <form action="enroll.php" method="post">
                            <div style="display: none;">
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;text-align:center" class="form-label">Are you sure you want to deactivate this user's account?</label>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="deact" value="Deactivate" />
                            
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

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
    <script type="text/javascript" src="../teamsScript/getBookInfo.js"></script>
    <!--<script src="../teamsScript/navigation.js"></script>-->
    
</html>

        