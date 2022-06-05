<?php require_once "../teamsDataCenter/controller.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Thesis Archiving System | Support</title>
		<?php include "libraries.php"; ?>

	</head>
<body style="background-color:#F8FAFF;">

	<style type="text/css">
		h3{
			font-weight: 600;
		}
		
		input[type="search"] {
		  	border: none;
		  	background: transparent;
		  	margin: 0;
		  	padding: 7px 8px;
		  	font-size: 14px;
			color: inherit;
		  	border: 1px solid transparent;
		  	border-radius: inherit;
		  	width: 800px;
		}
		button[type="submit"] {
		  	text-indent: -999px;
		  	overflow: hidden;
		  	width: 40px;
		  	padding: 0;
		  	margin: 0;
		  	border: 1px solid transparent;
		  	border-radius: inherit;
		  	background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat center;
		  	cursor: pointer;
		  	opacity: 0.7;
			}

		button[type="submit"]:hover {
		  opacity: 1;
		}

		input[type="search"]::placeholder {
		  color: #7F7F7F;
		}
		button[type="submit"]:focus,
		input[type="search"]:focus {
		  
		 
		  outline: none;
		}
		a.questions{
			text-decoration: none;
			color: #000;
			font-weight: 600;
			font-size: 23pt;
		}
		div.box{
			margin-bottom: 10px;
			
		}
		div.cont{
			padding: 20px;
		}
		
		img.boxes{
			max-height: 50%;
			max-width:50%;

		}
		img.boxes2{
			max-height: 20%;
			max-width:20%;
		}
		img.boxes3{
			max-height: 90%;
			max-width:90%;
		}
		img.boxes4{
			max-height: 21%;
			max-width:21%;
		}
		img.boxes5{
			max-height: 28%;
			max-width:28%;
		}
		img.boxes6{
			max-height: 21%;
			max-width:21%;
		}
		a.suppBox{
			font-family: 'Poppins';
			text-decoration: none;
			color: #000;
			font-size: 15pt;
			font-weight: 600;
		}
		p.description{
			font-family: 'Poppins';
		}
		div.card{
			background-color: transparent;
		}
		div.card:hover{
			background-color: #fff;
			border-radius: 4px;
			box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

		}
		.row{
			padding-left: 5%;
			padding-right: 5%;
			padding-top: 2%;
			padding-bottom: 2%;
		}
		.srch{
			width: 50%;
			height: 7%;
			padding: 8px;
		}
		h3{		
				margin-top: 10px;
				font-family: Roboto;
			}
			p{
				font-family: 'Poppins';
				font-size: 15pt;
			}
			p.desc{
				margin-bottom: 5px;

			}
	</style>

	<?php include "navbar.php"; ?>

	<div class="container-fluid row">
		<center><h3>How can we help you?</h3>
		<!-- <div class="search__container col-md-9">
                    <input class="search__input" id="myInput" type="text" onkeyup="searchbar__Function()" placeholder="Search..." 
                    style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                </div> -->
		<br>
		<br>

				<div class="row">
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes img-fluid" src="../teamsResources/banner_5.png">
		        <h5 class="card-title">Return Book</h5>
		        <p class="card-text">Problem with returning the book</p>
		        <a href="#returnBook" class="btn btn-primary">See how</a>
		      </div>
		    </div>
		    </a>
		  </div>
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes2 img-fluid" src="../teamsResources/banner_6.png">
		        <h5 class="card-title">Signing in</h5>
		        <p class="card-text">Problem with creating an account</p>
		        <a href="#logginIn" class="btn btn-primary">See how</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		      	<img class="boxes3 img-fluid" src="../teamsResources/banner_4.png">
		        <h5 class="card-title">Request Book</h5>
		        <p class="card-text">Borrow books</p>
		        <a href="#requestBook" class="btn btn-primary">See how</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		      	<img class="boxes4 img-fluid" src="../teamsResources/banner_2.png">
		        <h5 class="card-title">Information of Books</h5>
		        <p class="card-text">Lack of information about books</p>
		        <a href="#informationOfBook" class="btn btn-primary">See how</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes5 img-fluid" src="../teamsResources/banner_1.png">
		        <h5 class="card-title">Account Registration</h5>
		        <p class="card-text">Create an account</p>
		        <a href="#accountRegistration" class="btn btn-primary">See how</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-4 box">
		    <div class="card">
		      <div class="card-body">
		        <img class="boxes6 img-fluid" src="../teamsResources/banner_3.png">
		        <h5 class="card-title">Notifications</h5>
		        <p class="card-text">Manage notifications</p>
		        <a href="#notifications" class="btn btn-primary">See how</a>
		      </div>
		    </div>
		  </div>
		 
		</div>
		
		<br>
		</center>
	</div>
	</div>
	
	<div class="container-fluid row" style="margin-top: -50px;">
		<h3 id="returnBook">FREQUENTLY ASKED QUESTIONS</h3>
		<br>
		<br>
		<h3 id="returnBook">RETURN BOOK </h3>
		<p class="desc">•	Where do I return the books I have borrowed?</p>
		<p>•	When will I return the books I have borrowed?</p>
		<p>•	What will I considered my book is lost?</p>
		<h5>SOLUTION:</h5>
		<h5>Where do I return the books I have borrowed?</h5>
		<p class="desc">•	To return the book, the user must get the book in person at MIS.</p>
		<p>•	If you realize that you have lost an item that you’ve borrowed, please contact the administrator</p>
		<h5>When will I return the books I have borrowed?</h5>
		<p class="desc">•	You have 1 (one) day grace period to return the book</p>
		<h5>What will I considered my book is lost?</h5>
		<p class="desc">•	We will mark items as considered lost either if they are requested but not returned within the required period, or if they are not renewed or returned within 5 (five) days of the due date. In both situations, we will automatically apply a Lost Item and on MIS, the charge for lost items varies.</p>
		<p class="desc">•	We will note on your profile that the book is lost.</p>
		<br>
		<br>
		<h3 id="logginIn">LOGGING IN</h3>
		<p class="desc">•	How to view your library account?</p>
		<p class="desc">•	How I resolve can’t logging in?</p>
		<p class="desc">•	How to recover my account?</p>
		<h5>SOLUTION:</h5>
		<h5>Signing in:</h5>
		<h5>How I resolve can’t logging in?</h5>
		<p class="desc">•	If you see a “Something went wrong” error during sign-in, select the Go back button on the page or the Back button in your browser. Then, try logging in again.</p>
		<h5>How to view your library account?</h5>
		<p class="desc">•	Check your internet access is available</p>
		<p class="desc">•	Check that you've entered your student number and your password correctly.</p>
		<p class="desc">•	Check your profile to view your library account.</p>
		<p class="desc">•	If you're having any of the following problems, you'll need to contact the administrator</p>
		<h5>How to recover my account?</h5>
		<p class="desc">•	You forget your password</p>
		<p class="desc">•	Someone else is using your account</p>
		<p class="desc">•	You’re locked out of your account for another reason</p>
		<p class="desc">To recover your account:</p>
		<p class="desc">•	Recover and reset your password</p>
		<p class="desc">•	One Time Password" (OTP) will be sent to your registered email address</p>
		<p class="desc">•	Once you get the 6 (six) digit code, enter it and you may change your password after a while.</p>
		<br><br>
		<h3 id="informationOfBook">INFORMATION OF BOOKS</h3>
		<p class="desc">•	How to see books Information?</p>
		<p class="desc">•	How to search by topic, date, author?</p>
		<p class="desc">•	How long does it take to get a book?</p>
		<h5>SOLUTION:</h5>
		<h5>Books Information:</h5>
		<p class="desc">•	Make sure that you Log In</p>
		<p class="desc">•	Users can filter and search their respective ideal and needed books on the “Thesis Library”</p>
		<p class="desc">•	Search for more key words about what you are looking for. </p>
		<p class="desc">•	You may also maximize the filter to to what you are looking for</p>
		<p class="desc">•   If didn’t work, Ask for technical support about what specific problem in navigation the button to filter and also the thesis books you are looking for information</p>
		<h5>How to search by topic, date, author?</h5>
		<p class="desc">You can narrow your search results with search filters</p>
		<h5>How long does it take to get a book?</h5>
		<p class="desc">You can narrow your search results with search filters</p>
		<p class="desc">•	The administrator decides whether to approve or reject the request. The the usual business days is 1-2 days.</p>
		<p class="desc">•	If there no response at all, please contact us.</p>
		<br>
		<br>
		<h3 id="accountRegistration">ACCOUNT REGISTRATION</h3>
		<h5>How to create an account</h5>
		<h5>Student </h5>
		<p class="desc">•	Make sure that you are student of University of Caloocan City (UCC)</p>
		<p class="desc">•	If you were a verified student of UCC, there will be a respective verified account for you.</p>
		<p class="desc">•	The Username will be your Student number and your password is default</p>
		<h5>Professor</h5>
		<p class="desc">•	Make sure that you are a professor of University of Caloocan City (UCC)</p>
		<p class="desc">•	Please be advise the administrator to create your account.</p>
		<p class="desc">•	Wait for verification and approval from administrator.</p>
		<p class="desc">•	Once the administrator has confirmed that you are a professor, the administrator will give you a username and password.             If not working, check your internet connection and please be advise and explain to administrator what happened </p>
		<br>
		<br>
		<h3 id="requestBook">REQUEST BOOK </h3>
		<p class="desc">How many books can I check out?</p>
		<p class="desc">How do I request a specific thesis book?</p>
		<p class="desc">How my account deactivated, what cause I get banned?</p>
		<h5>SOLUTION:</h5>
		<h5>Request Book:</h5>
		<p class="desc">•	The borrowing of the books is individual and is only permissible for users with a valid identity / academic staff.</p>
		<h5>How many books can I check out?</h5>
		<p class="desc">•	User can borrow up to five(5) books max.</p>
		<h5>How do I request a specific thesis book?</h5>
		<p class="desc">•	To request the book, Log In to your account</p>
		<p class="desc">•	Narrow  your specific thesis book title in borrow book section</p>
		<p class="desc">•	Borrowed books and/or users book request/s can be seen on pending requests tab.</p>
		<p class="desc">•	If you’re able to request a book to borrow, it will depend on the administrator. Please wait 1-2 business days.</p>
		<h5>How my account deactivated, what cause I get banned?</h5>
		<p class="desc">•	If regulations are violated, students are inactive, or there are too many late and missing books entries, the account can be deactivated.</p>
		<p class="desc">•	If the account was deactivated, it can be reactivated and can be requested with the admin.</p>
		<br>
		<br>
		<h3 id="notifications">NOTIFICATIONS</h3>
		<p class="desc">•	How will I know if the books I borrowed ready to pick-up?</p>
		<p class="desc">•	How will I know when to return books I borrowed?</p>
		<p class="desc">•	How to enable push notifications in your browser?</p>
		<h5>SOLUTION:</h5>
		<h5>Notification:</h5>
		<p class="desc">There’s notification for </p>
		<h5>How to enable push notifications in your browser?</h5>
		<p class="desc">•	Make sure you haven’t disabled system notifications from your browser (Link for troubleshooting)</p>
		<h5>How will I know if the books I borrowed ready to pick-up?</h5>
		<p class="desc">•	There is no notification about it. If the administrator accepts your pending book, the pending book will be moved to request book so that it can be picked up at MIS.</p>
		<h5>How will I know when to return books I borrowed?</h5>
		<p class="desc">•	There is no notification about it, we just advise, When student or professor borrowing books, a user must have them returned after 24 hours (1 day). After 24 hours and the books have not yet been returned, it will be tagged as late and if not returned within five (5) days, it will be tagged as "lost book/s".</p>
	</div>
	<?php include "footer.php"; ?>
</body>
	<script src="../teamsScript/bootstrap.js"></script>
</html>