<?php

const SERVERNAME = "127.0.0.1";
const USERNAME = 'root';
const PASSWORD = "";
const DB_NAME = "quiz";
const MY_DEBUG_MODE = 1;

function connToDataBase() {
	$servername = SERVERNAME;
	$username = USERNAME;
	$password = PASSWORD;
	$db_name = DB_NAME;

	$connection = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);

	//PDO::ERRMODE_SILENT -default
	//PDO::ERRMODE_WARNING ERRMODE_EXCEPTION - for debuging
	$connection->setAttribute(PDO::ATTR_ERRMODE, MY_DEBUG_MODE ? PDO::ERRMODE_EXCEPTION : PDO::ERRMODE_SILENT);
	return $connection;



	

 function generateSessionKey() {
		//$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		//return sha1($str.time().rand(0, 1000000));
		return (md5(microtime().rand()));
	}
	
function checkSession($connection) {
		if (!isset($_SESSION['user'])) return false;
		$username = $_SESSION['user'];//Sanitize email?
		//if (!isset($_SESSION['user_email'])) return false;
		//$email = $_SESSION['user_email'];//Sanitize email?
	
		$stmt = $conn->prepare("SELECT session_key FROM " . 'lietotajs' ." WHERE Lietotajvards=:username LIMIT :limit");
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':limit', 1, PDO::PARAM_INT);
		$stmt->execute();
		 
		if ($stmt->rowCount() <= 0) return false;
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
		$genRandKey = $row['USER_SESSION_KEY'];
		if (!isset($_SESSION['session_key'])) return false;
		if (empty($_SESSION['session_key'])) return false;
		if ($_SESSION['session_key'] !== $genRandKey) return false; 
		return true;
	}
	
function destroyFirstSession ($conn) {
		// ja sesijas username nav, tad lieku sesiju, ja
		$username = isset($_SESSION['user']) ? $_SESSION['user'] : "";
		$deleteSessionKey="";
		$stmt = $conn->prepare("UPDATE USER SET SESSION_KEY=:deleteSessionKey  WHERE USER_NAME=:username");
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':deleteSessionKey', $deleteSessionKey, PDO::PARAM_STR);
		//$stmt->bindValue(':limit', 1, PDO::PARAM_INT);
		$stmt->execute();

		if ($stmt->rowCount() >= 0) {
			return false;
		}

	}
	
	
function showTests($connection){
	$stmt = $connection->prepare ("SELECT * FROM "."testlist"." ORDER BY ID");
	$stmt->execute();							

}

}
function addUser ($name, $connection){

		$sessionKey =$name.microtime(TRUE);
		$_SESSION['session_key']= $sessionKey;

	$stmt = $connection->prepare("INSERT INTO USER (NAME, SESSION_KEY)
    VALUES (:name, :user_session_key)");
	$stmt->bindValue(':user_session_key', $sessionKey, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->execute();
	
	$stmt2 = $connection->prepare("SELECT * FROM USER WHERE NAME=:name");
	$stmt2->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt2->execute();
	$row = $stmt2->fetch(PDO::FETCH_ASSOC);
	$_SESSION['user'] = $row['NAME'];
	}


function showQuestion($conn, $testID, $question_no){
	$stmt = ("SELECT * FROM QUESTIONS q INNER JOIN TESTLIST t ON q.TEST_ID=t.ID WHERE q.QUESTION_NO =". $question_no . " AND q.TEST_ID=". $testID ."");
	$result = mysqli_query($conn,$stmt);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$question = $row["QUESTION"];
	echo $question ."</br>";
	mysqli_free_result($result);
	}
	
function showAnswer($conn, $testID, $question_no){
	$stmt = ("SELECT ANSWER, WRONG_CORRECT  
	FROM ANSWERS a
	INNER JOIN QUESTIONS q
	ON q.ID=a.QUESTIONS_ID 
	INNER JOIN TESTLIST t ON t.ID=q.TEST_ID 
	WHERE a.QUESTIONS_ID=q.ID AND q.QUESTION_NO =". $question_no . " AND q.TEST_ID=". $testID ."");
	$result = mysqli_query($conn,$stmt);
	$column = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$answerNo = 0;
	
	if ($question_no==3)
	{
		//$button = "submit";
		//$button = "";
		$class = "save";
		//$next = "";
		$next = "; next()";
		$ajax = "; ajax_post()";
		$button = "button";
	} else {
		$button = "button";
		$class = "accept";
		$next = "; next()";
		$ajax = "";
		//$button = "submit";
	}
	// onclick='next()' saveDataQ". $question_no . "A" . $answerNo . "(); move()
	foreach ($column as $field){
	$answerNo++;
		echo "							<div class='small-12'>
				            <label for='Q". $question_no ."A". $answerNo ."' class='Q". $question_no ." A". $answerNo ."'>
								<button  type='" . $button . "' class='answerButton' id='Q". $question_no . "A" . $answerNo . "'  name='Q". $question_no . "A" . $answerNo . "' onclick='saveDataQ". $question_no . "A" . $answerNo . "()" . $ajax . "; move". $question_no ."()" . $next . "' 
								value=" . $field['WRONG_CORRECT'] . ">". $field['ANSWER'] ."</button>
							</label>
				          </div>";
						  echo "<script>
						  function saveDataQ". $question_no . "A" . $answerNo . "(){
   var Q". $question_no . " = document.getElementById('Q". $question_no . "A" . $answerNo . "');
    var answerQ". $question_no . " = Q". $question_no . ".value;
     sessionStorage.setItem('answer". $question_no . "', JSON.stringify(answerQ". $question_no . "));

	 }
	 </script></br>";
	}
	
		  //document.getElementById('demo". $question_no . "').innerHTML = sessionStorage.getItem('answer". $question_no . "');

	
	
}
function sendAnswer ($name, $answer1, $answer2, $answer3, $connection){
	$result = $answer1+$answer2+$answer3;
	$stmt = $connection->prepare("UPDATE USER SET ANSWER1=:answer1, ANSWER2=:answer2, ANSWER3=:answer3, RESULT=:result WHERE NAME=:name ");
			$stmt->bindValue(':name', $name, PDO::PARAM_STR);
			$stmt->bindValue(':answer1', $answer1, PDO::PARAM_INT);
			$stmt->bindValue(':answer2', $answer2, PDO::PARAM_INT);
			$stmt->bindValue(':answer3', $answer3, PDO::PARAM_INT);
			$stmt->bindValue(':result', $result, PDO::PARAM_INT);
			$stmt->execute();
}

function showResult ($name, $sessionKey){
	global $connection;
	$stmt = $connection->prepare("SELECT * FROM USER WHERE NAME=:name AND SESSION_KEY =:user_session_key");
	$stmt->bindValue(':user_session_key', $sessionKey, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->execute(); 
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	$result = $row['RESULT'];
	echo $name . ", jūs pareizi atbildējāt uz " . $result . " no 3 jautājumiem.";
	}

function redirect($url) {
		if (!headers_sent()) header("Location: $url");
		exit();
	}


?>