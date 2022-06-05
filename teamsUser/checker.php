<?php
    $userNumber = $_SESSION['number'];
    $searchMail = mysqli_query($connect, "SELECT * FROM teamsuser WHERE userId = '$userNumber'");
    if(mysqli_num_rows($searchMail) > 0){
        $adminInfo = mysqli_fetch_assoc($searchMail);
        $adminEmail = $adminInfo['userId'];
        $adminFirstname = $adminInfo['userFirstname'];
        $adminLastname = $adminInfo['userLastname'];
        $userStatus = $adminInfo['userStatus'];
        if ($userStatus=='deactivated') {
            header('location: index.php');
            exit();
        }
        
    }else{
        header('location: index.php');
        exit();
    }
?>
 