<?php
include_once 'head.php';
?>
<link href="plugins/mystyle.css" rel="stylesheet" type="text/css" />
<script src="plugins/myjavascript.js" type="application/javascript" ></script>
<html lang="lv">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>

</style>
	
  </head>
  <body>
	<section id="quiz-container">
	        <h2>Tests</h2>

		<form id="formproduct" method="POST" class="form-horizontal" autocomplete="off" action="answerserver.php">	
		<div id="questions">  
		<div id="Q1" class="category-block";  > 
			<?php 
			$testID=$_GET['test'];
			if ($testID>=5 or $testID<=0) redirect ("home.php");
			$question_no=1; 
			?>
			
			 <label class="text" for="name"> <?php showQuestion($conn, $testID, $question_no); ?><label>
			
				<div class="row">
				  <div class="medium-10 medium-centered small-12 columns">
							  <div class="large-12 columns">
								<div class="row-questions">
								<input type="hidden" name="Q1"  value="<?php $question_no; ?>">
										<?php
										$question_id=1;
										echo showAnswer($conn, $testID, $question_no);

										?>
								</div>
							   </div>
				</div> 
			</div>
		</div> 
		<div id="Q2" class="category-block" style="display: none"> 
			<?php 
			$testID=$_GET['test'];
			$question_no=2; 
			?>
				 <label class="text" for="name"> <?php showQuestion($conn, $testID, $question_no); ?><label>

						<div class="row">
							  <div class="large-12 columns">
								<div class="row-questions">
								<input type="hidden" name="Q2" value="<?php $question_no; ?>">
										<?php
										$question_id=2;
										echo showAnswer($conn, $testID, $question_no);?>
								</div>
							   </div>
						</div>  
			
		
		</div> 
		<div id="Q3" class="category-block" style="display: none"> 
			<?php 
			$testID=$_GET['test'];
			if ($testID==2){
				echo "<img src='pics/puke.jpg' alt='flower'>";
			}
			if ($testID==1){
				echo "<img src='pics/cels.bmp' alt='way'>";
			}
			if ($testID==3){
				echo "</br>
  <div class='green'><td >           </td></div>";
			}
			$question_no=3; 
			?></br>
				 <label class="text"> <?php showQuestion($conn, $testID, $question_no); ?><label>
			<div class="row">
				  <div name="Q3"  class="medium-10 medium-centered small-12 columns">
						<div class="row">
							  <div class="large-12 columns">
								<div class="row-questions">
								<input type="hidden"  value="<?php $question_no; ?>">
										<?php
										$question_id=3;
										echo showAnswer($conn, $testID, $question_no);?>
								</div>
							   </div>
						</div> 
						<!-- </form> -->
				</div> 
			</div>
		</div>
<div id="result" class="category-block" style="display: none">

	<span  id="status"></span>
	<div>		
		</div> 
		 </form>
	</section>
		</br>
	<div id="myProgress">
  <div id="myBar"></div>
  </body>
</html>
