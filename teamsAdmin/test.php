<?php 
require "../teamsDataCenter/connection.php";
require "../teamsDataCenter/controller.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>
	<h1>test</h1>
	<form action="test.php" method="post">
		<input type="text" name="inputTxt" id="txt" onkeyup="addStudent.getEnrolledStud(this.value)">		
		<table style="width:100%; border-collapse:collapse; margin:25px 0; font-size:0.9em; border-radius:5px 5px 0 0;min-width: 300px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
			<thead style="text-align: center; height: 50px; vertical-align: middle;">
				<tr style="border-bottom:2px solid whitesmoke;">
					<th>Username</th>
					<th>Password</th>
				</tr>
			</thead>
			<tbody id="testId" style="border-bottom:2px solid whitesmoke;text-align: center; height: 50px; vertical-align: middle;">
				<tr id="testId">
					
				</tr>				
			</tbody>
		</table>
	</form>
	<script type="text/javascript" src="../teamsScript/getBookInfo.js"></script>
</body>
</html>