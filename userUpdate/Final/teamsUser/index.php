<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>

     <head>

          <title>Thesis Archiving System | Home</title>
          <?php include "libraries.php"; ?>
     </head>
     <body style="background-color:#F8FAFF;">

          <?php include "navbar.php"; ?>
          <div class="container-fluid row">
               <div class="col-md" style="padding:10%;">
                    <p style="font-weight:700; font-size:8vh; line-height:1;">Thesis
                         <label style="color:#7788F4;">Archiving</label> System
                    </p>
                    <p style="font-weight:400; font-size:3vh; line-height:1;">An interactive books management<br>system for the Computer Studies<br>Department.</p>

                    <div class="container-fluid" style="text-align:center; margin-top:15%;">
                         <a href="library.php" class="btn" style="border-radius:12px; background-color:#FD8978; border:1px solid #FD8978; font-weight:400; font-size: 2vh;line-height:1; min-width: 70%;padding:3vh;color:#fff; text-decoration:none;">Borrow books</a>
                    </div>
               </div>
               <div class="col-md-6"><img class="img-fluid" src="../teamsResources/poster_1.png"/></div>
          </div>

          <div class="container-fluid" style="background-color:#fff;font-weight:700;font-size:5vh; line-height:1;text-align: center; padding:10%; margin:0;">Thesis Archiving System is the new home for your learning needs from the thesis books
               <p style="font-weight: 400;font-size: 3vh;line-height: 1; margin-top:3%;">Connect, enable learning, and share knowledge</p>

          </div>
          <?php include "footer.php"; ?>
     </body>

     <script src="../teamsScript/bootstrap.js"></script>
</html>
