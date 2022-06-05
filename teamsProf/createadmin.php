<?php
    require "../teamsDataCenter/connection.php";

    $firstname = "teamsph";
    $lastname = "teams";
    $email = "teamsph.inc@gmail.com";
    $password = "teams2022";
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO teamsProf(profFirstname, profLastname, profEmail, profPassword)values('$firstname','$lastname','$email','$encrypted_password')";
    $runquery = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>email:teamsph.inc@gmail.com</h1>
	<h1>password:teams2022</h1>
	<a href="index.php">
		<button>Login</button>
	</a>
</body>
</html>