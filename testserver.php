<?php

include_once 'connect.php';
include_once 'tools.php';

	$name = $_POST['name'];
	addUser ($name, $connection);
	echo $name;
	
	$testID = $_POST['test'];
	
	switch ($testID )
	{
		case 1://Galīgi grūts tests
			redirect ("question.php?test=1");
			if(!isset($_POST['submit'])) return false;
			
			$stmt = ("SELECT * FROM "."questions"." WHERE TEST_ID = 1");
			$questions = mysqli_query($conn, $stmt);
			print_r($questions);
			break;
	
		case 2://grūts tests
			redirect ("question.php?test=2");
			if(!isset($_POST['apstiprinat'])) return false;
			
			
			if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			// dabonam 'id' mainīgo no URL
			$user_id = $_GET['id'];
			editUser($user_id, $vards, $uzvards, $lietotajvards, $hash, $adminatips, $epasts, $sakdatums, $beigudatums, $conn);
			}
			break;
	
	
		case 3: //vidēji grūts tests
			redirect ("question.php?test=3");
			break;

		case 4: //viegls tests
			redirect ("question.php?test=4");
			break;
	return;
		default:
		redirect ("home.php");
	}
//redirect ("question.php");

?>
 