<?php
     session_start();
     require "connection.php";

     $_SESSION['number']='';
     $title_filter = "ASC";

     if(isset($_POST['filter'])){
          $title = mysqli_real_escape_string($connect, $_POST['title']);
          if($title == "A to Z"){
               $title_filter = "ASC";
          }
          else{
               $title_filter = "DESC";
          }
     }
?>
