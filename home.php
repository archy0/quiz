<?php
include_once 'head.php';
?>
<link href="plugins/mystyle.css" rel="stylesheet" type="text/css" />
<html class="no-js" lang="lv">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>

	</style>
	
  </head>

<body>

<h2>Testa uzdevums</h2>
<div id = "content">
<form method = "POST"  action = '<?php echo "testserver.php";?>'>	

	<fieldset class="fieldset">
		<input type="hidden" name="name" id="login_submitted" value='1'/>
		<div class="form-group">
		    <label class="text" for="name"><?php echo "Ievadi savu vārdu!" ?></label>
		     <div class="input-group col-sm-4">
			    <input type="text" class="form-control" name="name" id="name" value="">
				
			</div>
	    </div>
		
		<div class="form-group" >			
    <select class="form-control" id="test" name="test">
	<option for="test" value="0">izvēlieties testu</option>
<?php
				$stmt = $connection->prepare ("SELECT * FROM "."testlist"." ORDER BY ID");
				$stmt->execute();							
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$str ="";
				foreach ($rows as $row)
				{				
					if ($row['ID'] == 0) continue;
					$str .= "<option value='".$row['ID']."'>".$row['TEST_NAME']."</option>";
				}
				$str .= "</select>";
				echo $str;			
?>
	 </div>					
	</form>
	 			<div class="form-group">
			<div class="col-sm-offset-4">
			<button class = "button"  id = "submit" name = "submit" onClick="return empty()"><span class = ""></span> Sākt</button>
			</div>
			</div>
	</fieldset>
</form>
</body>
</html>
