<?php require_once "../teamsDataCenter/controller.php"; ?>
<!doctype html>
<html lang="en">
     <head>
          <title>MODERATOR - Change Password</title>
          <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     </head>
     <body style="background-color: #F8FAFF;">
          <style type="text/css">
               *{
                font-family: 'Poppins';

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
          <div class="container-fluid pt-5">
               <div class="row align-items-center p-5 loginRow">
                    <div class="col">
                         <center><img class="img-fluid loginlogoImg mb-4" src="../teamsResources/teamsLogo_1.png" style="max-width: 30%;" /></center>
                         <h5>MODERATOR CHANGE PASSWORD</h5>
                         <form  action="changepass.php" method="post" class="loginForm">
                              <label class="alert alert-info" role="alert">Note: Please Remember your new moderator Password</label>
                              <div class="form-floating mb-3">
                                   <input name="password" type="password" class="form-control" pattern=".{8,}" id="floatingPassword" placeholder="Password" required />
                                   <label for="floatingPassword">New Password</label>
                              </div>
                              <div class="form-floating">
                                   <input name="cpassword" type="password" class="form-control" pattern=".{8,}" id="floatingPassword1" placeholder="Password" required />
                                   <label for="floatingPassword1">Confirm New Password</label>
                              </div>
                              <input type="checkbox" name="" class="form-check-input ms-2" onclick="showPassword()"id="">
                              <label for="" class="mb-3">Show Password</label>
                              <input name="profchangepass" type="submit" class="btn form-control submitBtn" value="CHANGE AND LOGIN"/>
                         </form>
                    </div>
               </div>
          </div>
     </body>
     <?php
          if(isset($xmessage['message'])){
               $message = $xmessage['message'];
               foreach($xmessage as $showerror){
                    echo "<script>swal('Something went wrong', '$message', 'error')</script>";
               }
               $xmessage = null;
          }
     ?>
     <script src="../javascript/showPassword.js"></script>
     <script src="../javascript/bootstrap.bundle.js"></script>
     <script type="text/javascript">
       function showPassword(){
     var showPass = document.getElementById('floatingPassword');
     if (showPass.type== 'password'){
          showPass.type='text';
     }
     else{
          showPass.type='password';
     }

     var showPass1 = document.getElementById('floatingPassword1');
     if (showPass1.type== 'password'){
          showPass1.type='text';
     }
     else{
          showPass1.type='password';
     }
}

     </script>
</html>
