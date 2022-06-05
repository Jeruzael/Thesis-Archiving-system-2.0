<?php
require_once "../teamsDataCenter/tool.php";

$tb = new tools\thesisBook();
$auth = $_REQUEST['q'];

$tb->getBookInfo($auth);

echo $tb->tBookID;
?>
