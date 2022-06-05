<?php
require "../teamsDataCenter/connection.php";

$studentStamp = $_POST['studentStamp'];

$getEnrolled = mysqli_query($connect, "SELECT * FROM enrolled_csd WHERE studentStamp LIKE '$studentStamp%'");
$enrolled = mysqli_fetch_assoc($getEnrolled);


if(mysqli_num_rows($getEnrolled) > 0){
    foreach($getEnrolled as $enrolled){
        $sid = $enrolled['studentId'];
        $fn = $enrolled['studentFirstname'];
        $ln = $enrolled['studentLastname'];
        $si = $enrolled['studentImage'];
        $snum = $enrolled['studentNumber'];
        $sp = $enrolled['studentPassword'];
        $st = $enrolled['studentStatus'];
        $stamp = $enrolled['studentStamp'];
        $email = $enrolled['studentEmail'];
        $encrypt_password = password_hash($sp, PASSWORD_BCRYPT);
        $esQuery = "INSERT INTO teamsuser (userId, userFirstname, userLastname, userImage, userNumber, userEmail, userPassword, userStatus, userStamp)
        VALUES ('$sid','$fn','$ln','$si','$snum', '$email','$encrypt_password','$st','$stamp')";

        
        if($enroll_stud = mysqli_query($connect, $esQuery) === TRUE){

            echo "data added";
            header("Location: student.php");
        }else{
            echo "Error: " . $connect->error;
        }
        
    }
}else{
        echo "no data added";
    }

?>