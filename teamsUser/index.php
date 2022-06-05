<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>

     <head>

          <title>Thesis Archiving System | Home</title>
          <?php include "libraries.php"; ?>

     </head>
     <body style="background-color:#F8FAFF;">
          <style type="text/css">
               .panelBorrow{
                    text-align:center; 
                    margin-top:10%;  
                    margin-left: 0; 
                    width: 68%; 
                    border-radius: 4px; 
                    background-color: #7788F4;
               }
               .panelBorrow:hover{
                    /*background-color: #FF6048;*/
                    background-color: #4A63FF;
               }
               .btnBorrow{
                    border-radius:12px;
                    background-color: transparent;   
                    font-weight:400;
                    font-size: 2.5vh;
                    /*line-height:1;*/
                    width: 100%;
                    max-width: 100%;
                    padding:3vh;
                    color:#F8FAFF; 
                    text-decoration:none;
                    margin-right: 150px;
                    font-family: 'Poppins';
               }
               .btnBorrow:hover{
                    background-color: transparent;
                    color:#F8FAFF;
               }
               @media (max-width: 500px) {
                    html, body {
                         width: auto!important; 
                         overflow-x: hidden!important;
                         /*padding: 20px;*/
                    }
               .panelBorrow{
                   /* margin-left: 50px;*/
                    margin-right: 0;
                    background-color: transparent;

               }
               .panelBorrow:hover{
                   /* margin-left: 50px;*/
                    margin-right: 0;
                    background-color: transparent;

               }
               .btnBorrow{
                 margin-left: 50px;
                    max-height: 40px;
                    text-align: center;
                    padding: 10px;
                    background-color: #7788F4;
                    border-radius: 4px;
                    padding-bottom: 10px;
               }
               .btnBorrow:hover{
                         background-color: #4A63FF;
               }
               .thesis{
                    text-align: center;
                   margin-top: 150px;
               }
               .pic{
                    margin-top: -730px;
                    margin-left: 55px;
                    /*margin-left: 50px;*/
               }
               .row{
                    /*padding-left: 50px;*/
               }
               .pnlBorrow{
                    /*-ms-transform: translateY(-50%);
transform: translateY(-50%);*/
               }


               }
          </style>

          <?php include "navbar.php"; ?>
          <div class="container-fluid row" style="margin-bottom: 60px; padding: 20px;">
               <div class="col-md thesis" style="padding:10%; padding-right: 0;">
                    <p style="font-weight:700; font-size:5vh; line-height:1;">Thesis
                         <label style="color:#7788F4;">Archiving</label> System
                    </p>
                    <p style="font-weight:400; font-size:3vh; line-height:1;">An interactive books management system <br>for the Computer Studies Department.</p>

                    <div class="container-fluid btn-primary panelBorrow" style="">
                         <a href="library.php" class="btn btnBorrow" 
                         style="
                              ">Borrow books</a>
                    </div>
               </div>
               <div class="col-md-6"><center><img class="img-fluid pic" src="../teamsResources/poster_1.png" style="max-height: 100%; padding-right: 100px;" /></div></center>
          </div>

          <!-- <div class="container-fluid" style="background-color:#F8FAFF;;font-weight:700;font-size:5vh; line-height:1;text-align: center; padding:10%; margin:0;">Thesis Archiving System is the new home for your learning needs from the thesis books
               <p style="font-weight: 400;font-size: 3vh;line-height: 1; margin-top:3%;">Connect, enable learning, and share knowledge</p> -->

          </div>
          <?php include "footer.php"; ?>
          
     </body>

     <script src="../teamsScript/bootstrap.js"></script>
</html>
