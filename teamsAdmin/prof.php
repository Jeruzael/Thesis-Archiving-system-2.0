<?php require_once "../teamsDataCenter/controller.php"; ?>
<?php include  "checker.php"; ?>

<!-- STATUS DEACT AND REACT -->
<?php if (isset($_GET['profId'])) {
    $profId =  $_GET['profId'];
    $searchProf = mysqli_query($connect, "SELECT * FROM teamsprof WHERE profId=$profId");
    $data = mysqli_fetch_assoc($searchProf);
    $status = $data['profStatus'];
    if ($status=='deactivated') {
        $reactProf = mysqli_query($connect,"UPDATE teamsprof SET profStatus='active' WHERE profId=$profId");
    } else {
        $deactStud = mysqli_query($connect,"UPDATE teamsprof SET profStatus='deactivated' WHERE profId=$profId");
    }
    
 }
?>

 
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Professor</title>
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
            }
            @media only screen and (max-width: 400px){
                 div.loginRow{
                      padding: 0px !important;
                 }
                 div.librarycontainer{
                      padding: 0px !important;
                 }
                 div.rowcon{
                      padding: 5% !important;
                 }
                }
                div.loginRow{
                     min-width: 300px;
                     max-width: 500px;
                     margin: auto;
                     text-align: center;
                }
                div.cardDisplay{
                     overflow-y: scroll;
                }
                img.loginlogoImg{
                     max-height: 100px;
                }
                img.dashlogo{
                     max-height: 50px;
                }
                form.loginForm{
                     text-align: left;
                }
                form.loginForm input,select{
                }
                input.submitBtn{
                     background-color: #7788F4;
                     color: #fff;
                }
                input.submitBtn:hover{
                     background-color: #556CFA;
                     color: #fff;
                }
                a.recoverBtn{
                     background-color: #fff;
                     color: #FD8978;
                     border: 1px solid #FD8978;
                }
                a.recoverBtn:hover{
                     background-color: #FD8978;
                     color: #fff;
                }
        
        </style>
        <!-- This section is for menus -->
        <?php include "menu.php"; ?>

        <section class="home-section" style="background-color: #F8FAFF;">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;">Professors</div>
            <div class="container-fluid row searchbox" style="padding-left:20%;padding-right:20%;">
                <div class="search__container col-md-9">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search user..." 
                    style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                </div>
                <div class="credits__container col-md-3" style="text-align: center; ">
                    <button type="button" class="btn add-new btnAddNew" style=""><i class='bx bx-plus'></i> Add new user</button>
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

                            $result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM teamsprof");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];

                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1;


                            $dataQuery = "SELECT *, profStatus FROM teamsprof ORDER BY profId ASC LIMIT $offset, $total_records_per_page";
                            $data = mysqli_query($connect, $dataQuery);
                            for($i = 0; $row = mysqli_fetch_array($data); $i++){
                        ?>
                        <tr style="border-bottom:2px solid whitesmoke;">
                            <td><?php echo $row['profId']; ?></td>
                            <td style="text-align:right; width:200px "><?php echo ucwords($row['profFirstname']); ?></td>
							<td style="text-align:left; width:200px"><?php echo ucwords($row['profLastname']); ?></td>
                            <td><?php echo $row['profStatus']; ?></td>
                            <td><a href="prof.php?profId=<?=$row['profId']?>" style="margin-right: 5px; padding: 5px; width: 30px; color: white; text-decoration:none;" class="studbtn
                                    ">
                                        <?php if ($row['profStatus']=='active') {
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
            <?php #include "pagination.php"; ?>

        </section>

        <!-- Add new user Modal-->
        <div class="modal fade" id="addnewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Professor Account</h5>
                        
                    </div>
                    <div class="modal-body" style="margin-top: -90px;">
                        <div class="container-fluid pt-5">
               <div class="row align-items-center p-5 loginRow">
                    <div class="col">
                         <center><img class="img-fluid loginlogoImg mb-4" src="../teamsResources/teamsLogo_1.png" style="max-width: 30%;" /></center>
                         <h5>REGISTER PROFESSOR ACCOUNT</h5>
                         <form  action="prof.php" method="post" class="loginForm">
                            <div class="form-floating mb-3">
                                   <input name="profFirstname" type="text" class="form-control" id="floatingInput" placeholder="firstname" required />
                                   <label for="floatingInput">First Name</label>
                              </div>
                              <div class="form-floating mb-3">
                                   <input name="profLastname" type="text" class="form-control" id="floatingInput" placeholder="lastname" required />
                                   <label for="floatingInput">Last Name</label>
                              </div>
                              <label class="alert alert-info" role="alert">Note: Please provide a valid email address</label>
                              <div class="form-floating mb-3">
                                   <input name="profEmail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required />
                                   <label for="floatingInput">Email address</label>
                              </div>
                              <div class="form-floating mb-3">
                                   <input name="profPassword" type="password" class="form-control" id="floatingInput" placeholder="********" required />
                                   <label for="floatingInput">Password</label>
                              </div>
                              <!-- <div class="form-floating mb-3">
                                   <input name="cpassword" type="password" class="form-control" id="floatingInput" placeholder="********" required />
                                   <label for="floatingInput">Re-type Password</label>
                              </div> -->
                              <input name="create" type="submit" class="btn form-control submitBtn mb-1" value="Create"/>
                         </form>
                         <a href="#" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100%;">Cancel</a>
                    </div>
               </div>
          </div>
                    </div>
                   <!--  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Add"/> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deactivate user Modal -->
        <div class="modal fade" id="editStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;text-align:center"><i class='bx bx-user'></i>User Status</p>
                        <form action="teamsprof.php" method="post">
                            <div style="display: none;">                     
                            </div>
                            <label style="margin-top:5px; font-size:16px; line-height:24px;text-align:center" class="form-label">Are you sure you want to deactivate "user name's" account?</label>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Deactivate"/>
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
    <!--<script src="../teamsScript/navigation.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function (){
            $('.btnAddNew').on('click', function() {
                $('#addnewModal').modal('show');
                /*$tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                console.log(data);
                $('#bookId').val(data[0]);
                $('#editTitle').val(data[1]);
                $('#editAuthor').val(data[2]);
                $('#editBookCover').val(data[3]);
                $('#editCourse').val(data[4]);
                $('#editCategory').val(data[5]);
                $('#editAbstract').val(data[6]);
                $('#editPublish').val(data[7]);
                $('#editProfessors').val(data[8]);*/
                });

        });
    </script>
    <!-- CODES FOR ADDING NEW ACCOUNT FOR PROF -->
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

    $profFirstname = $_POST['profFirstname'];
    $profLastname =  $_POST['profLastname'];
    $profEmail =  $_POST['profEmail'];
    $profPassword =  $_POST['profPassword'];
    $encrypted_password = password_hash($profPassword, PASSWORD_BCRYPT);

    $search = mysqli_query($connect,"SELECT * FROM teamsprof WHERE profEmail='$profEmail'");
    $data = mysqli_fetch_assoc($search);
    if ($profEmail==$data['profEmail']) {
        $xmessage['message'] = "Password mismatched!";
       echo '<script>swal("Error!", "Email already exist!", "error");</script>'; 
         /*swal("Good job!", "You clicked the button!", "success");*/
    } else {
        if(isset($_POST['create'])){
      $result = "INSERT INTO teamsprof (profFirstname, profLastname, profEmail, profPassword) values('$profFirstname', '$profLastname', '$profEmail','$encrypted_password')";
      echo '<script>swal("Success!", "Account Created Successfully!", "success");</script>'; 
      if(mysqli_query($connect, $result)){
        /*header("location: prof.php");*/
      }
    }
    }
}
?>
    
</html>
