<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thesis Archiving System | Profile</title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Icons Package From Boxicons -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- External Files -->
        <link rel="icon" type="png" href="../teamsResources/teamsLogo_4.png"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../teamsDesign/style.css"/>

        <!--MODAL LINK-->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        <!-- sweetalert libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
	<style type="text/css">
		body{
			font-family: 'Poppins';
		}
		img{
		    height: 30px;
		    width: 30px;
		    margin-top:-10px;
		    margin-bottom: -10px;
		}
		#defaultprofile{
		    background-color: transparent;
		    color: #FD8978;
		    font-size: 11pt;
		    border: none;
		    margin-left: 10px;
		}
		#upload{

		    margin-top: 30px;
		    border: 2px solid #4562E5;
		    background-color: transparent;
		    color: #4562E5;
		    font-family: Poppins;
		    height: 40px;
		    border-radius: 5px;
		    padding: 10px;
		    font-size: 11pt;
		    display: inline-block;
		}
		p{
			
		}
		div.std{
			margin-top: 20px;
			width: 300px;
		}
		label.sd{
			float: left;
			font-family: 'Poppins';

		}
		input[type=text]{
			width: 300px;
			float: left;
			margin-bottom: 10px;
			font-family: 'Poppins';
			height: 40px;
			border-radius: 4px;
			border: .5px solid gray;
			padding: 5px;
		}
		button.save{
			margin-top: 30px;
		    border: 2px solid #4562E5;
		    background-color: transparent;
		    color: #4562E5;
		    font-family: Poppins;
		    height: 40px;
		    border-radius: 5px;
		    padding: 10px;
		    font-size: 11pt;
		}
	</style>
	<?php include "menu.php"; ?>
	<section class="home-section">
            <div class="text" style="font-size:43px; font-weight:600; line-height:64px; font-family:'Roboto'; color:#FD8978;">Profile</div>
            <div class="container-fluid" style="overflow-x: scroll; ">

				<div class="text-center">
				<br>
				<img src="../teamsResources/avatar_0.png" class="rounded" alt="..." style=" height: 130px; width: 130px;" >
				<center><div class="mb-3">
					<br>
				<form action="upload.php" method="POST" enctype="multipart/form-data">
				<!-- <label for="formFile" class="form-label">Profile</label>
				<input class="form-control" type="file" id="formFile">-->

				<label class="custom-file-upload">
				<input type="file" name="file"> 
				</label>
				<br>
				<button type="submit" name="submit" id="upload">Update</button>
				<button id="defaultprofile" name="defaultprofile">Remove</button>
				<br>
				<div class="std">
				<label class="sd">First name</label>
				<br>
				<input type="text" name="">
				<br>
				<label class="sd">Last name</label>
				<br>
				<input type="text" name="">
				<br>
				<label class="sd">Student Number</label>
				<br>
				<input type="text" name="">
				<br>
				<br>
				<label class="sd">Password</label>
				<br>
				<input type="text" name="">
				<button class="save">Save Changes</button>
				</div></center>
				</form> 

				</div>
				</div>

            </div>
           
        </section>
</body>
</html>