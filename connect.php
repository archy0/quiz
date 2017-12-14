<?php	

include_once 'connect.php';
include_once 'tools.php';
		// konektors, kas savieno php ar SQL datu bāzi 
	

	$servername = SERVERNAME;
	$username = USERNAME;
	$password = PASSWORD;
	$db_name = DB_NAME;
	$conn = mysqli_connect($servername, $username, $password, $db_name);
	if (mysqli_connect_errno())
  {
  echo "Nevar savienoties ar datu bāzi: " . mysqli_connect_error();
  }

	
// uzlieku utf8, lai atpazīst latviešu burtus
	mysqli_set_charset($conn,'utf8');
	
try {

	$connection = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
			//PDO::ERRMODE_SILENT -default
			//PDO::ERRMODE_WARNING - for debuging
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		//if(!isset($_SESSION)) session_start();


}
catch ( Exception $e ) {
    	logError($e->getMessage());
    }
    catch ( PDOException $e ) {
		logError($e->getMessage());
    } 
	
		
	
		

?>
