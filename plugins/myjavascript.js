        function empty()
        {
          var x;
          x = document.getElementById("name").value;
          if (x == "") 
           { 
              alert("Ierakstiet savu vārdu!");
			  return false;
           };
		   
		  var y;
          y = document.getElementById("test").value;
          if (y == "0") 
           { 
              alert("izvēlieties testa veidu!");
			  return false;
           };
        }
		
var showing = [1, 0, 0, 0];
var questions = ['Q1', 'Q2', 'Q3', 'result'];
function next() {
    var qElems = [];
    for (var i = 0; i < questions.length; i++) {
        qElems.push(document.getElementById(questions[i]));   
    }
    for (var i = 0; i < showing.length; i++) {
        if (showing[i] == 1) {
            qElems[i].style.display = 'none';
            showing[i] = 0;
            if (i == showing.length - 1) {
                qElems[0].style.display = 'block';
                showing[0] = 1;
            } else {
                qElems[i + 1].style.display = 'block';
                showing[i + 1] = 1;
            }
            break;
        }
    }      
}


function move1() {
  var elem = document.getElementById("myBar");   
  var width = 9;
  var id = setInterval(frame, 33);
  function frame() {
    if (width >= 33) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}

function move2() {
  var elem = document.getElementById("myBar");   
  var width = 33;
  var id = setInterval(frame, 33);
  function frame() {
    if (width >= 66) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}

function move3() {
  var elem = document.getElementById("myBar");   
  var width = 66;
  var id = setInterval(frame, 33);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}


function ajax_post() {
	var xmlhttp;
	var url = "answerserver.php";
	var answer1 = sessionStorage.getItem('answer1');
	var answer2 = sessionStorage.getItem('answer2');
	var answer3 = sessionStorage.getItem('answer3');
	
		if (window.XMLHttpRequest)
			{
			xmlhttp=new XMLHttpRequest();
			}
			else
			{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			
			}
			xmlhttp.onreadystatechange=function ()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("status").innerHTML=xmlhttp.responseText;
				 // var return_data = hr.responseText;
				document.getElementById("status").innerHTML = return_data;
				} /*else {
					alert("An error has occured making the request")
						}*/
			}
			xmlhttp.open("POST", url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("atbilde1="+answer1+"&atbilde2="+answer2+"&atbilde3="+answer3);
			/*document.getElementById("Q3").onclick = function () 
			location.href = "finish.php";*/
	};