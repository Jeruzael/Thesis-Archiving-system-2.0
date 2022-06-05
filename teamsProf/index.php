<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Moderator | Log In</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/style.css"/>

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body style="background-color:#F8FAFF;">
        <style type="text/css">
                *  
            {
                font-family: 'Poppins';

            }
            h2{
                font-weight: 600;
            }
            .btnLogin{
                margin-top:20px; 
                font-size:22px; 
                line-height:33px; 
                padding:10px; 
                width:100%; 
                background-color:#FD8978; 
                color:#FFF;
            }
            .btnLogin:hover{

                background-color: #FF6048;
                color: #fff;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
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
        <!-- main container -->
        <!-- <div class="container-fluid row" style="background-color:#F8FAFF; width:60%; margin-top:5%; margin-bottom:5%; margin-left:auto; margin-right:auto; box-shadow:0px 1px 9px -1px rgba(0, 0, 0, 0.25); border-radius:3px; padding:0px;"> -->

            <!-- left side -->
            <!-- <div style="padding:50px;" class="col-md-6">

                <img src="../teamsResources/teamsLogo_4.png" class="img-fluid" style="height:50px;"/>
                <h3 style="font-weight:600; font-size:32px; line-height:48px; margin-top:20%;">Moderator Log in</h3>

                <div class="form-outline">
                    <form action="index.php" method="post"> -->
                        <!-- <div class="form-floating mb-3">
                                   <input name="email" 
                                   type="email" 
                                   class="form-control" 
                                   id="floatingInput" 
                                   placeholder="name@example.com"
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return false;"
                                    required />
                                   <label for="floatingInput">Email address</label>
                              </div> -->
                              <div class="container-fluid pt-5" style="margin-top: 50px;">
                    <div class="row align-items-center p-5 loginRow">
                        <div class="col" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px; padding: 30px; border-radius: 5px;">
                            <center><img class="img-fluid loginlogoImg mb-4" src="../teamsResources/teamsLogo_1.png" style="max-width: 30%;" /></center>
                            <form action="index.php" method="post" style="">
                            <h2 style="font-family: 'Poppins';">MODERATOR LOGIN</h2>
                            <div class="form-floating mb-3">
                                   <input name="email" 
                                   type="email" 
                                   class="form-control" 
                                   id="floatingInput" 
                                   placeholder="name@example.com"
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return false;"
                                    required />
                                   <label for="floatingInput">Email address</label>
                              </div>

                              <div class="form-floating mb-3">
                                   <input name="password" 
                                   type="password" 
                                   class="form-control" 
                                   pattern=".{8,}" 
                                   id="floatingPassword" 
                                   placeholder="Password" 
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return false;"
                                   required />
                                   <label for="floatingPassword">Password</label>
                              </div>
                              
                                <input type="checkbox" name="" class="form-check-input ms-2" onclick="showPassword()"id="" style="float: left; cursor: pointer; margin-right: 10px;">

                              <label for="" class="mb-3" style="float: left;">Show Password</label>
                              <br>
                                <a href="recover.php" type="button" class="btn"  style="background-color:#F8FAFF; border:1px solid #F8FAFF; color:#7788F4; float: left; margin-left: -150px;">Forgot Password?</a>
                                
                                <input style="" name="profLogin" type="submit" value="Log In" class="btn btnLogin"/>
                                </form>
                              
                        </div>
                    </div>
                </div>
                        <!-- <div class="form-floating mb-3">
                                   <input name="password" 
                                   type="password" 
                                   class="form-control" 
                                   id="floatingInput" 
                                   placeholder="name@example.com"
                                   ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return false;" 
                                   required />
                                   <label for="floatingInput">Email address</label>
                              </div> -->

                        <!-- <label style="margin-top:30px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required"/> -->

                        <!-- <label style="margin-top:20px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-lock-alt'></i> Password</label>
                        <input style="font-size:13px; 
                        line-height:20px; 
                        padding:10px; 
                        border-bottom:1px solid rgba(167, 172, 182, 0.99); b
                        order-left:0px; 
                        border-top:0px; 
                        border-right:0px; b
                        ackground-color:#F8FAFF; 
                        border-radius:0px; 
                        margin-bottom:5px;" 
                        name="password" 
                        type="password" 
                        ondrop="return false;" 
                        oninvalid="IninvalidMsg(this);" 
                        oninput="IninvalidMsg(this);" 
                        onpaste="return false;" 
                        class="form-control" placeholder="**********" required="Required"/>
 -->
                    
                       <!--  <a href="recover.php" type="button" class="btn"  style="background-color:#F8FAFF; border:1px solid #F8FAFF; color:#7788F4; margin-left: -9px;">Forgot Password?</a>

                        <input style="margin-top:20px; font-size:22px; line-height:33px; padding:10px; width:100%; background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="profLogin" type="submit" value="Log In" class="btn"/> -->
                 <!--    </form>
                </div>
            </div> -->

            <!-- right side -->
           <!--  <div style="padding:5%; background-color:rgba(119, 136, 244, 0.21);" class="col-md-6">
                <img style="margin-top: 45%;" class="img-fluid" src="../teamsResources/poster_2.png"/>
            </div>
        </div> -->

        <!-- error message -->
        <?php
            if(isset($xmessage['message'])){
                $message = $xmessage['message'];
                foreach($xmessage as $showerror){
                    echo "<script>swal('Something went wrong', '$message', 'error')</script>";
                }
                $xmessage = null;
            }
        ?>

        <!-- Forgot Password Modal -->
        <div class="modal fade" id="recovery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Please provide your valid email address</p>
                        <form action="index.php" method="post">
                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Send OTP" data-bs-toggle="modal" data-bs-target="#verification"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forgot Password Modal -->
        <div class="modal fade" id="verification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p style="color:#FD8978;">Please enter your valid email address</p>
                        <form action="index.php" method="post">
                        <label style="margin-top:5px; font-size:16px; line-height:24px;" class="form-label"><i class='bx bx-envelope'></i> Email Address</label>
                        <input style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; border-radius:0px;" name="email" type="email" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn" style="background-color:#FD8978; border-color:#FD8978; color:#FFF;" name="otp" value="Send OTP"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- external script -->
        <script src="../teamsScript/bootstrap.js"></script>
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
    </body>

</html>