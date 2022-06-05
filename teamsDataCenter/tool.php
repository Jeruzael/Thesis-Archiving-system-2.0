<?php  
namespace tools {		
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer-master/src/Exception.php';
	require '../PHPMailer-master/src/PHPMailer.php';
	require '../PHPMailer-master/src/SMTP.php';
 	require '../teamsDataCenter/connection.php';

	
	

	class Gmail  
	{
		public static function sendEmail($addr, $mess)
		{

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Mailer = "smtp";

			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port = 587;
			$mail->Host = "smtp.gmail.com";
			$mail->Username = "ardums.clothing18@gmail.com";
			$mail->Password = "@rDUms_C10+ing";
			$mail->IsHTML(true);
			$mail->AddAddress($addr, "");
			$mail->SetFrom("ardums.clothing18@gmail.com", "TEAMS THESIS BOOKS COLLECTION");
			$mail->Subject = "OTP";
			$content = "<b>" . $mess . "</b>";

			$mail->MsgHTML($content);
			if(!$mail->Send())
			{
				echo "<script>alert('Email not sent');</script>";				
			}
			else
			{
				echo "<script>alert('Email sent successfuly');</script>";
				/*header("Location: otp.php");*/
			}
		}
	}

	class Otpcode 
	{
		public static function genOTP()
		{
			return random_int(100000, 999999);

		}
	}


	class teamsUser
	{	


		public $userId;
		public $userFirstname;
		public $userLastname;
		public $userImg;
		public $userNumber;
		public $userEmail;
		public $userPassword;
		public $userCode;
		public $userStat;



		public function addUser($fn, $ln, $num, $email, $pass, $code)
		{			
			

			$this->userFirstname = $fn;
			$this->userLastname = $ln;			
			$this->userNumber = $num;
			$this->userEmail = $email;
			$this->userPassword = $pass;
			$this->userCode = $code;			

			$userQuery = "INSERT INTO teamsuser (userFirstname, userLastname, userNumber, userEmail, userPassword, userCode) VALUES ('$this->userFirstname','$this->userLastname','$this->userNumber','$this->userEmail','$this->userPassword','$this->userCode')";



			return $userQuery;

			/*if($connect->query($userQuery) === TRUE){
				echo "Data added";				
			}else{
				echo "Data not added: " . $connect->error;
			}*/
		}

		public function addToSession($fn, $ln, $num, $email, $pass, $code){						
			$_SESSION['firstname'] = $fn;
			$_SESSION['lastname'] = $ln;
			$_SESSION['studnum'] = $num;
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $pass;
			$_SESSION['otpCode'] = $code;


		}

		public function signin($postUsername, $postPass){
			$getUserQuery = "SELECT userEmail FROM teamsuser WHERE userEmail = '$postUsername'";
			return $getUserQuery;
		}
	}

	class thesisBook {


		public $tBookTitle;
		public $tBookID;
		public $tBookCategory;
		public $tBookAbstract;
		public $tBookAuthor;
		public $tBookProfessor;
		public $tBookPublished;
		public $tBookStatus; 
		public $tBookStamp;
		public $tBookProgram;
		

		function getBookInfo($title){	
			require '../teamsDataCenter/connection.php';
			$getBookQuery = mysqli_query($connect, "SELECT * FROM thesislibrary WHERE bookTitle = '$title'");
			$books = mysqli_fetch_assoc($getBookQuery);

			$this->tBookTitle = $books['bookTitle'];
			$this->tBookID = $books['bookId'];
			$this->tBookCategory = $books['bookCategory'];
			$this->tBookAbstract = $books['bookAbstract'];
			$this->tBookAuthor = $books['bookAuthor'];
			$this->tBookProfessor = $books['bookProfessor'];
			$this->tBookPublished = $books['bookPublished'];
			$this->tBookStatus = $books['bookStatus'];
			$this->tBookStamp = $books['bookStamp'];
			$this->tBookProgram = $books['bookProgram'];

			$_SESSION['bookTitle'] = $books['bookTitle'];
			$_SESSION['bookId'] = $books['bookId'];
			$_SESSION['bookCategory'] = $books['bookCategory'];
			$_SESSION['bookAbstract'] = $books['bookAbstract'];
			$_SESSION['bookAuthor'] = $books['bookAuthor'];
			$_SESSION['bookProf'] = $books['bookProfessor'];
			$_SESSION['bookPub'] = $books['bookPublished'];
			$_SESSION['bookStatus'] = $books['bookStatus'];
			$_SESSION['bookStamp'] = $books['bookStamp'];
		}

		
	}

	class request {

		public $reqId;
		public $requesterId;
		public $reqBID;
		public $reqStatus;
		public $reqStamp;

		public static function reqBook($requesterId, $reqBID){
			require '../teamsDataCenter/connection.php';
			$setReqQuery = mysqli_query($connect, "INSERT INTO thesisrequest (requesterId, requestBookId) VALUES ('$requesterId','$reqBID')");
			
		}
	}
}



?>