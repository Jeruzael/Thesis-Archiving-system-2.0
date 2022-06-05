<?php
    $email = $_SESSION['email'];
    $searchMail = mysqli_query($connect, "SELECT * FROM teamsprof WHERE profEmail = '$email'");
    if(mysqli_num_rows($searchMail) > 0){
        $profInfo = mysqli_fetch_assoc($searchMail);
        $profEmail = $profInfo['profEmail'];
        $profFirstname = $profInfo['profFirstname'];
        $profLastname = $profInfo['profLastname'];
    }else{
        header('location: index.php');
        exit();
    }
?>
 