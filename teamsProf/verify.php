<?php require_once "../teamsDataCenter/controller.php"; ?>
<!doctype html>
<html lang="en">
     <head>
          <title>MODERATOR - Email Verification</title>
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
          <div class="container-fluid pt-5" style="">
               <div class="row align-items-center p-5 loginRow">
                    <div class="col">
                         <center><img class="img-fluid loginlogoImg mb-4" src="../teamsResources/teamsLogo_1.png" style="max-width: 30%;" /></center>
                         <h5>MODERATOR EMAIL VERIFICATION</h5>
                         <form  action="verify.php" method="post" class="loginForm">
                              <label class="alert alert-success" role="alert">Message: Check your email inbox or spam for the verification code</label>
                              <div class="form-floating mb-1">
                                   <input name="otp" type="number" class="form-control"  id="floatingInput" placeholder="name@example.com" required />
                                   <label for="floatingInput">Email Verification Code</label>
                              </div>
                              <label class="ms-2">Didn't work? </label> <a href="#">Resend Code</a>
                              <input name="profverify" type="submit" class="btn form-control submitBtn mt-4 mb-1" value="RECOVER" style="" />
                         </form>
                         <a href="index.php" class="btn form-control recoverBtn">LOGIN INSTEAD</a>
                    </div>
               </div>
          </div>
     </body>
     <?php
          if(isset($_SESSION['info'])){
               $message = $_SESSION['info'];
               echo "<script>swal('Done', '$message', 'success')</script>";
          }
          $_SESSION['info'] = null;

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
</html>
