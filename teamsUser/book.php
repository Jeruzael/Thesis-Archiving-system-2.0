<?php 
require "../teamsDataCenter/connection.php";
require "../teamsDataCenter/controller.php";
require "../teamsDataCenter/tool.php";

//tools\request::reqBook($_SESSION['number'], '');
echo "<script>alert('Invalid Password')</script>";
            
header("Location: dashboard.php", true);


?>