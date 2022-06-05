<?php
require "../teamsDataCenter/controller.php";
require "../teamsDataCenter/connection.php";
require_once "../teamsDataCenter/tool.php";

$tb = new tools\thesisBook();
$auth = $_REQUEST['q'];

$tb->getBookInfo($auth);

//tools\request::reqBook($_SESSION['number'], $_SESSION['bookId']);

echo $tb->tBookProfessor;
?>
