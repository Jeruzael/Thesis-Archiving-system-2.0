<?php
    require "../teamsDataCenter/connection.php";

    $firstname = "jeffrix";
    $lastname = "briol";
    $email = "bbriol30@gmail.com";
    $password = "user1234";
    $studnum = "20190800";
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO teamsuser(userFirstname, userLastname, userEmail, userPassword, userNumber)values('$firstname','$lastname','$email','$encrypted_password','$studnum')";
    $runquery = mysqli_query($connect, $query);
?>
