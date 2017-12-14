<?php
include_once 'connect.php';
include_once 'tools.php';
?>
<html>
<body>

<button type="button" id="Q1" name="Q1" value="1pareiz" onclick="saveData1()" >1 atbilde</button>
<button type="button" id="Q2" name="Q2" value="2pareiz" onclick="saveData2()" >2 atbilde</button>
<button type="button" id="Q3" name="Q3" value="3pareiz" onclick="saveData3()" >3 atbilde</button>
<button type="button" id="result" name="result" onclick="showData()" >Rezumē</button>
<p id="demo1"></p>
<p id="demo2"></p>
<p id="demo3"></p><p id="resume"></p>
<script>





function saveData1(){
 //localStorage.setItem("Q1", Q1.value);
 // localStorage.setItem("Q2", Q2.value);
  // localStorage.setItem("Q2", Q2.value);
  // sessionStorage.getItem("Q1", Q1.value); // name is the key
   // sessionStorage.getItem("Q2", Q2.value);
   //  sessionStorage.getItem("Q3", Q3.value);
   var Q1 = document.getElementById("Q1");
    var answerQ1 = Q1.value;
     sessionStorage.setItem("answer1", JSON.stringify(answerQ1));
	  document.getElementById("demo1").innerHTML = sessionStorage.getItem("answer1");
	 }
function saveData2(){
	var Q2 = document.getElementById("Q2");
	var answerQ2 = Q2.value;
    sessionStorage.setItem("answer2", JSON.stringify(answerQ2));
	 document.getElementById("demo2").innerHTML = sessionStorage.getItem("answer2");
	
	 }
function saveData3(){
	var Q3 = document.getElementById("Q3");
	var answerQ3 = Q3.value;
    sessionStorage.setItem("answer3", JSON.stringify(answerQ3));
	 document.getElementById("demo3").innerHTML = sessionStorage.getItem("answer3");
	 }
	 
function showData(){
	var show1 = sessionStorage.getItem("answer1");
    var show2 = sessionStorage.getItem("answer2");
	var show3 = sessionStorage.getItem("answer3"); 
	 document.getElementById("resume").innerHTML = show1 ;
	 }

   //  Q1.value = answer.Q1;
     //Q2.value = answer.Q2;
     //Q3.value = answer.Q3;

	 /*function myFunction() {
    var Q1 = document.getElementById("Q1").value;
    document.getElementById("demo").innerHTML = x;
}*/
</script>

<script>
var p1 = "success";
</script>

<?php
echo "<script>document.writeln(p1);</script>";
echo "<script>document.writeln(Q2.value);</script>";
echo "<script>sessionStorage.getItem('answer3');</script>";
?>
    
     
</script>



</body>
</html>
