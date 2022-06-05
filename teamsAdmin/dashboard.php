<?php require_once "../teamsDataCenter/controller.php"; ?>
<?php include "checker.php"; ?>


<!DOCTYPE html>
<html>
<!-- This code is prepared by Jeffrix Briol -->

    <head>

        <title>Administration | Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/st.css"/>-

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <style type="text/css">
        div.tile1{
            background-color:#97C7FB; 
            padding:3%; color:#fff; 
            text-align:center; 
            margin:2%; 
            border-radius:5px;
        }
        div.tile1:hover{
            background-color:#73B4FB;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }
        div.tile2{
            background-color:#FD8978; 
            padding:3%; color:#fff; 
            text-align:center; 
            margin:2%; 
            border-radius:5px;
        }
        div.tile2:hover{
            background-color:#FF6048;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }
        div.tile3{
            background-color:#7788F4; 
            padding:3%; color:#fff; 
            text-align:center; 
            margin:2%; 
            border-radius:5px;
        }
        div.tile3:hover{
            background-color:#4A63FF;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }
    </style>
    <body style="background-color: #F8FAFF;">
        <?php include "menu.php"; ?>
        <section class="home-section" style="background-color: #F8FAFF;">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Poppins'; color:#7788F4;">Dashboard</div>

            <div class="container-fluid row"">
                <div class="col tile1" style=""><label style="font-size:20px;">Book Requests</label><br><label style="font-size:100px;"><?php echo $requestCount['totalRequests']?></label><br><a href="brequest.php" style="text-decoration:none; color:#fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>

                 <div class="col tile2" style=""><label style="font-size:20px;">Total Books Borrowed</label><br><label style="font-size:100px;"><?php echo $booksCount['totalBooks']?></label><br><a href="bborrowed.php" style="text-decoration:none; color:#fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>

                 <div class="col tile3" style=""><label style="font-size:20px;">Returned Books</label><br><label style="font-size:100px;"><?php echo $returnedCount['totalReturned']?></label><br><a href="breturned.php" style="text-decoration:none; color:#fff;">see more <i class='bx bx-right-arrow-alt'></i></a></div>
            </div>
        </section>
    </body>

    <!-- navigation of menu -->
    <!--<script src="../teamsScript/navigation.js"></script>-->
</html>
