<?php
     // global variables
     $servname = 'localhost';
     $username = 'root';
     $password = '083098';
     $database = 'db_teams';

     // establish connection
     $connect = mysqli_connect($servname, $username, $password, $database);

     // connection error
     if (!$connect) {

          die("Connection failed: " . mysqli_connect_error());
     }
?>
