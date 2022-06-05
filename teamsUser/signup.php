<?php require_once "../teamsDataCenter/controller.php"; 



?>
<!DOCTYPE html>
<html>

  <head>

    <title>Thesis Archiving System | Sign up</title>
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

  <body style="background-color:#E5E5E5;">

    <!-- top navigation -->
    <?php include "navbar.php"; ?>

    <!-- signin contatiner -->
    <div class="container-fluid row userform">

      <!-- left side -->
      <div style="padding:10%; background-color:rgba(253, 137, 120, 0.94);" class="col-md-6">
        <img style="margin-top:20px;" class="img-fluid" src="../teamsResources/poster_5.png"/>
      </div>

      <!-- right side -->
      <div style="padding: 50px; background-color:#F8FAFF;" class="col-md-6">
        <img src="../teamsResources/teamsLogo_1.png" class="img-fluid" style="height: 50px;"/>
        <h3 style="font-weight: 700; margin-top: 5%;">Sign up</h3>
        <div class="form-outline">
          <form action="verify.php" method="post">

            <!-- firstname -->
            <label style="margin-top:5px; font-size:9pt;" class="FormLabel form-label">
              <i class='bx bxs-user-detail'></i> Firstname
            </label>
            <input name="firstname" type="text" style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Firstname" required="Required">

            <!-- Lastname -->
            <label style="margin-top:5px; font-size:9pt;" class="FormLabel form-label">
              <i class='bx bxs-user-detail'></i> Lastname
            </label>
            <input name="lastname" type="text" style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="Lastname" required="Required">

            <!-- student number -->
            <label style="margin-top:5px; font-size:9pt;" class="FormLabel form-label">
              <i class='bx bxs-user-detail'></i> Student Number
            </label>
            <input name="studnum" type="number" style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="2022xxxx" required="Required">

            <!-- email address -->
            <label style="margin-top:5px; font-size:9pt;" class="FormLabel form-label">
              <i class='bx bx-envelope'></i> Email Address
            </label>
            <input name="email" type="email" style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" ondrop="return false;" onpaste="return false;" class="form-control" placeholder="example@email.com" required="Required">

            <!-- password -->
            <label style="margin-top:5px; font-size:9pt;" class="FormLabel form-label">
              <i class='bx bx-lock-alt'></i> Password
            </label>
            <input name="password" type="password" style="font-size:13px; line-height:20px; padding:10px; border-bottom:1px solid rgba(167, 172, 182, 0.99); border-left:0px; border-top:0px; border-right:0px; background-color:#F8FAFF; border-radius:0px; margin-bottom:5px;" ondrop="return false;" oninvalid="IninvalidMsg(this);" oninput="IninvalidMsg(this);" onpaste="return false;" class="form-control" placeholder="Password" required="Required">

            <input name="user_signup" type="submit" value="Create Account" style="margin-top:20px; font-size:9pt; padding:10px; width:100%; background-color: #7788F4; border-color: #7788F4;" class="btn btn-primary">

          </form>
          <p>Already have an account?<a href="signin.php">Sign In</a></p>
        </div>
      </div>
    </div>

    <!-- Page Footer section-->
    <?php include "footer.php"; ?>

  </body>
  <script src="../teamsScript/bootstrap.js"></script>
</html>
