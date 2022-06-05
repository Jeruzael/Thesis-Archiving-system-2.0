<?php 
include_once("../teamsDataCenter/connection.php");

$studNum = $_POST['studnumber'];
$passPost = $_POST['password'];

$userQuery = "SELECT userNumber FROM teamsuser WHERE userNumber = '" . $studNum . "'";
$passQuery = "SELECT userPassword FROM teamsuser WHERE userNumber = '" . $studNum . "'";

$getUser = $connect->query($userQuery);
$fetchUser = mysqli_fetch_assoc($getUser);

$pass = $connect->query($passQuery);
$fetchPass = mysqli_fetch_assoc($pass);

$acc = $fetchUser['userNumber'];
$pass2 = $fetchPass['userPassword'];



if($passPost == $pass2){
	$_SESSION['number'] = 10;
	//echo $_SESSION['number'] . "Session ID ";
	header("Location: index.php");
}else{
	header("Location: index.php");	
	//echo $passPost . " : " . $pass2 . " : " . $studNum;
}

?>

