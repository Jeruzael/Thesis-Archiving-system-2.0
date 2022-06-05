<?php require_once "../teamsDataCenter/controller.php"; ?>
<?php include "checker.php"; ?>
<!DOCTYPE html>
<html>

  <head>

    <title>Thesis Archiving System | Change Password</title>
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
      *{
        font-family: 'Poppins';
      }
      h1{
                padding-left: 100px;
                font-size: 25pt;
                font-family: 'Poppins';
                font-weight: 600;
                color: #FD8978;
               }
      .btn-primary{
        margin-top:20px; 
        font-size:11pt; 
        padding:10px; 
        width:100%; 
        background-color: #7788F4; 
        border-color: transparent; 
        height: 50px;
      }
      .btn-primary:hover{
        background-color: #4A63FF;
        border-color: transparent;
      }
    </style>

    <!-- top navigation -->
    <?php include "nv.php"; ?>
    <h1>Change Password</h1>

    <!-- signin contatiner -->
    <!--<div class="container-fluid row userform" style="margin-top: 90px;">-->

      <!-- left side -->
      <!-- <div style="padding:10%; background-color:rgba(253, 137, 120, 0.64);" class="col-md-6">
        <img style="margin-top:20px;" class="img-fluid" src="../teamsResources/poster_4.png"/>
      </div> -->

      <!-- right side --> 
      <center><hr style="width: 90%;">
        <div style="padding: 50px; background-color: #F8FAFF; margin-top: 1%;" class="col-md-4 cont">
        <img src="../teamsResources/teamsLogo_1.png" class="img-fluid" style="height: 50px;"/>
        <br>
        <br>
        <div class="form-outline">
          <?php 
          //echo "<script>alert('" . $_SESSION['number'] . "')</script>"
          ?>
          <form action="changepass.php" method="post">

            <!-- current password -->
            <div class="form-floating mb-3">
                                   <input name="currentpassword" 
                                   type="password" 
                                   ondrop="return false;" 
                                   oninvalid="IninvalidMsg(this);" 
                                   oninput="IninvalidMsg(this);" 
                                   onpaste="return false;"
                                   class="form-control" 
                                   pattern=".{8,}" 
                                   id="currentpasswordField" 
                                   placeholder="Current Password" required />
                                   <label for="floatingPassword">Current Password</label>
            </div>
            <!-- <label style="margin-top:20px; font-size:9pt; float: left;" class="FormLabel form-label">
              <i class='bx bx-lock-alt'></i> Current Password
            </label>
            <input name="currentpassword" 
                  type="password" 
                  style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" 
                  ondrop="return false;" 
                  oninvalid="IninvalidMsg(this);" 
                  oninput="IninvalidMsg(this);" 
                  onpaste="return false;" 
                  class="form-control" 
                  id="currentpasswordField"
                  placeholder=" Current Password"
                  required="Required"> -->


            <!-- new password -->
            <div class="form-floating mb-3">
                                   <input name="newpassword" 
                                   type="password" 
                                   class="form-control" 
                                   pattern=".{8,}" 
                                   ondrop="return false;" 
                                   oninvalid="IninvalidMsg(this);" 
                                   oninput="IninvalidMsg(this);" 
                                   onpaste="return false;" 
                                   id="newpasswordField" 
                                   placeholder="New Password" required />
                                   <label for="floatingPassword1">New Password</label>
                              </div>
            <!-- <label style="margin-top:20px; font-size:9pt; float: left;" class="FormLabel form-label">
              <i class='bx bx-lock-alt'></i> New Password
            </label>
            <input name="newpassword" 
                  type="password" 
                  style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" 
                  ondrop="return false;" 
                  oninvalid="IninvalidMsg(this);" 
                  oninput="IninvalidMsg(this);" 
                  onpaste="return false;" 
                  class="form-control" 
                  id="newpasswordField"
                  placeholder="New Password" 
                  pattern=".{8,}" 
                  required="Required"> -->

            <!-- confirm password -->
            <div class="form-floating">
                                   <input name="cpassword" 
                                   type="password" 
                                   ondrop="return false;" 
                                   oninvalid="IninvalidMsg(this);" 
                                   oninput="IninvalidMsg(this);" 
                                   onpaste="return false;" 
                                   class="form-control" 
                                   pattern=".{8,}" 
                                   id="confirmpasswordField" 
                                   placeholder="Confirm New Password" required />
                                   <label for="floatingPassword1">Confirm New Password</label>

                                   <input type="checkbox" name="" class="form-check-input ms-2" onclick="showPass()" style="float: left; cursor: pointer; margin-right: 10px;">
                                   
                                    <script>
                                    function showPass(){
                                    var showPass = document.getElementById('currentpasswordField');
                                    var showPass1 = document.getElementById('newpasswordField');
                                    var showPass2 = document.getElementById('confirmpasswordField');
                                    if (showPass.type== 'password' || showPass1.type== 'password' ||showPass2.type== 'password'  ){
                                    showPass.type='text';
                                    showPass1.type='text';
                                    showPass2.type='text';
                                    } else{
                                    showPass.type='password';
                                    showPass1.type='password';
                                    showPass2.type='password';
                                    }
                                    } </script>
                             
                              
                              </div>
                              <label for="" class="mb-3" style="float: left;">Show Password</label>
            <!-- <label style="margin-top:20px; font-size:9pt; float: left;" class="FormLabel form-label">
              <i class='bx bx-lock-alt'></i> Confirm New Password
            </label>
            <input name="cpassword" type="password" 
                                    style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" 
                                    ondrop="return false;" 
                                    oninvalid="IninvalidMsg(this);" 
                                    oninput="IninvalidMsg(this);" 
                                    onpaste="return false;" 
                                    class="form-control"
                                    id="confirmpasswordField" 
                                    pattern=".{8,}" 
                                    placeholder="Confirm New Password" 
                                    required="Required" > -->

            
            <input name="user_change" type="submit" 
                                      value="Change" 
                                      style="" 
                                      class="btn btn-primary">

          </form>
        </div>

      </div></center>
    <!--</div>-->

    <!-- Page Footer section-->
    <?php# include "footer.php"; ?>
    <?php 
    if(isset($xmessage['message'])){
               $message = $xmessage['message'];
               foreach($xmessage as $showerror){
                    echo "<script>swal('Something went wrong', '$message', 'error')</script>";
               }
               $xmessage = null;
          }
     ?>
 
  </body>
  <script src="../teamsScript/bootstrap.js"></script>
  
   
</html>
