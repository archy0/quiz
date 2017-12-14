<?php
include_once 'head.php';
?>
<link href="plugins/mystyle.css" rel="stylesheet" type="text/css" />
<script src="plugins/myjavascript.js" type="application/javascript" ></script>
<html lang="lv">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	
  </head>
  <body>
  <?php 	
  $name = $_SESSION['user'] ? $_SESSION['user'] : "";
  $sessionKey = $_SESSION['session_key'];
	?>
	
	       
		 <h2> <?php showResult ($name, $sessionKey); ?></h2>
		 <button type="button" class = "button"  id = "restart" name = "restart"  onclick="window.location='home.php';" ><span class = ""></span> Pildīt vēlreiz </button>

	<span id="status"></span>

  </body>
</html>
