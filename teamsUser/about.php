<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thesis Archiving System | About us</title>
		<?php include "libraries.php"; ?>

	</head>
	<body style="background-color:#F8FAFF;">
		<style type="">
		*{
			font-family: 'Poppins';
		}
			h3{		
				margin-top: 10px;
				font-family: Roboto;
			}
			p{
				font-family: 'Poppins';
				font-size: 13pt;
			}
			p.desc{
				margin-bottom: 20px;

			}
			li{
				font-family: 'Poppins';
			}
			div.box{
				background-color: transparent;

			}
			div.cont{
				padding: 20px;
				
			}
			img.dp{
				width: 142px;
				height: 142px;
				margin-top: -90px;

			}
			p.devName{
				margin: 0;
			}
			p.role{
				margin: 0;
				color: #7F7F7F;
			}
			p.bio{
				text-align: justify;
			}
			.card{
				margin-bottom: 20px;
				border: none;
				border-radius: 15px;
			}
			.card:hover{
				box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
			}
			.fb{
				font-size:20px; 
				color:#7788F4; 
				border: 1px solid #C4C4C4; 
				border-radius: 3px; 
				padding: 3px;
			}
			.fb:hover{
				color:#4A63FF; 
			}
			 @media (max-width: 500px) {
          body{
          	align: justify;
          	justify-content: all;
          }
          }
			
	</style>
	<?php include "navbar.php"; ?>

	<div class="container-fluid row" style="padding:5%;">
		<h3>About Us</h3>
		<p class="desc">We are strategists, designers, developers, and creators who builds, breaks, and transforms system software that values the freedom to imagine and design. Thrives to expand out team’s full potential.</p>
		<h3>Mission Statement</h3>
		<p class="desc">To provide a great work environment and build a good product to inspire and
		implement solutions with the use of technology.</p>
		<h3>Vision Statement</h3>
		<p class="desc">To be the world’s most successful software development company that brings inspiration and innovation.</p>
		<h3>Core Values</h3>
			<li>TEAMS values an open exchange of information and perspectives.</li>
			<li>Invent solutions and simplify complexity.</li>
			<li>Better ourselves every day while having fun doing it.</li>
		<p class="desc"></p>

		<h3>Meet the Team</h3>
		<!-- <div class="container-fluid row">-->
		<br>
		<br>
		<!--TEAMS' MEMBERS-->
		<center>
		<div class="row">
		<!--GABRIELLE-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes img-fluid" src="../teamsResources/coverPhoto_1.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Napoto.png"></center>
					<p class="devName">Gabrielle D. Napoto</p>
					<p class="role">Team Leader</p>
					<p class="bio">Aside from taking the lead and communicating with people, I also love to travel and communicate with nature. I take adventurous activities like cliff diving, snorkeling, ATV driving and other outdoor activities. Has a sweet tooth and loves to paint during my spare time.</p>
					<a href="https://www.facebook.com/gabrielle.napoto.79"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>
		<!--DUMALE-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes2 img-fluid" src="../teamsResources/coverPhoto_5.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Dumale.png"></center>
					<p class="devName">Jeruzael Dumale</p>
					<p class="role">Back-end developer</p>
					<p class="bio">Hi! I'm Jeruzael one of the backend developers on our
					team. I am the one who is responsible for structuring data
					processing and flow. I and our team is doing our best so
					we can provide you with a user-friendly and very
					useful web application that might fulfill your needs.</p>
					<a href="https://www.facebook.com/Jeru.Z6el"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>
		<!--DANICA-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		      	<img class="boxes3 img-fluid" src="../teamsResources/coverPhoto_6.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Cabullo.png"></center>
					<p class="devName">Danica O. Cabullo</p>
					<p class="role">Website Designer | Front-end <data></data>eveloper</p>
					<p class="bio">A 21 year old graphic designer aspirant. Bachelor of Science in Computer Science.
					Graphic Design: Adobe Photoshop, Adobe Illustrator, Figma, Photopea, Canva
					Check my works out on dribbble <a href="https://dribbble.com/ElysianD">here.</a>
					<br>
					</p>
					<a href="https://www.facebook.com/danicabullo/"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>
		<!--JEFFRIX-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		      	<img class="boxes4 img-fluid" src="../teamsResources/coverPhoto_2.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Briol.png"></center>
					<p class="devName">Jeffrix Briol</p>
					<p class="role">Back-end developer | Front-end developer</p>
					<p class="bio">A 23 year old software developer aspirant.
					Software Developer: JavaFx, Java, Javascript, PHP, C#, C</p>
					<a href="https://www.facebook.com/ohmikoto"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>
		<!--EBARLE-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes5 img-fluid" src="../teamsResources/coverPhoto_3.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Ebarle.png"></center>
					<p class="devName">Sean Kim Ebarle</p>
					<p class="role">Research Manager</p>
					<p class="bio">21 years old and youngest among my siblings.
					I believe in the saying “Your
					Success and
					happiness lie in you”</p>
					<a href="https://www.facebook.com/seankimpots"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>
		<!--ALEXANDER-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes6 img-fluid" src="../teamsResources/coverPhoto_4.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Caberto.png"></center>
					<p class="devName">Alexander Caberto</p>
					<p class="role">Research Assistant Manager</p>
					<p class="bio">Pursuing Computer Science. Researching is my
					passion</p>
					<a href="https://www.facebook.com/AlexCaberto011"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>
		<!--KEVIN-->
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes6 img-fluid" src="../teamsResources/coverPhoto_7.png">
		        <div class="cont">
					<center><img class="img-fluid dp" src="../teamsResources/developer_Corpin.png"></center>
					<p class="devName">Kevin Corpin</p>
					<p class="role">Back-end Developer Assistant</p>
					<p class="bio">21 years old
					My hobbies are playing online games
					and basketball</p>
					<a href="https://www.facebook.com/kevin.Zafra.09"><i class='bx bxl-facebook-square fb' style=""></i></a>
				</div>
		      </div>
		    </div>
		  </div>

		 
		</div> 
		</center>
		<p></p>
	</div>
	<?php include "footer.php"; ?>
</body>
	<script src="../teamsScript/bootstrap.js"></script>
</html>
