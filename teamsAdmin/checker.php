<?php
    $email = $_SESSION['email'];
    $searchMail = mysqli_query($connect, "SELECT * FROM teamsadmin WHERE adminEmail = '$email'");
    if(mysqli_num_rows($searchMail) > 0){
        $adminInfo = mysqli_fetch_assoc($searchMail);
        $adminEmail = $adminInfo['adminEmail'];
        $adminFirstname = $adminInfo['adminFirstname'];
        $adminLastname = $adminInfo['adminLastname'];
    }else{
        header('location: index.php');
        exit();
    }
?>
 