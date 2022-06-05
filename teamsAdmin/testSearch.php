<?php 
require_once "../teamsDataCenter/connection.php";

$req = $_REQUEST['q'];

$getData = mysqli_query($connect, "SELECT * FROM enrolled_csd WHERE studentStamp LIKE '$req%'");
$data = mysqli_fetch_assoc($getData);

//$name = $data['studentFirstname'];
//$pass = $data['studentPassword'];



if(mysqli_num_rows($getData) > 0){
	foreach($getData as $row){
		$studId = $row['studentId'];
		$fname = $row['studentFirstname'];
		$lname = $row['studentLastname'];
		$pass = $row['studentPassword'];		
		$format = "
<tr style=\"border-bottom:2px solid whitesmoke;text-align: center; height: 50px; vertical-align: middle;\">
	<td>$studId</td>
	<td>$fname</td>
	<td>$lname</td>
	
</tr>
";
		
		echo $format;
	}
}

//echo $format;
?>

