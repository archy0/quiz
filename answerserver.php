<?php
include_once 'head.php';


if(isset($_POST['atbilde1'])){
	echo "POST pieņemts</br>";

$answer1quotes = $_POST['atbilde1'];
$answer2quotes = $_POST['atbilde2'];
$answer3quotes = $_POST['atbilde3'];
$name = $_SESSION['user'];

$answer1 = str_replace( '"','',$answer1quotes);
$answer2 = str_replace( '"','',$answer2quotes);
$answer3 = str_replace( '"','',$answer3quotes);

sendAnswer ($name, $answer1, $answer2, $answer3, $connection);

///echo "Thank you ". $answer1 . " and " . $answer2 . ", says the PHP file. </br>";
}
//echo  "<script> parseInt(document.write(sessionStorage.getItem('answer1')));</script>";
//echo "<script> sessionStorage.getItem('answer2'); </script>";
//echo "<script> sessionStorage.getItem('answer3'); </script>";


redirect ("finish.php");
?>



	

 