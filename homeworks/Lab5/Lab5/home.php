<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>-- Post --</title>
<style type=”text/css”>
table {
margin: 8px;
}

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #FFF;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}
</style>
</head>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("post").innerHTML =
			"<img src='/jungwud/"+document.getElementById("Province").value+".png'></>" +this.responseText;
      
    }
  };
  var dir = "/jungwud/";
  xhttp.open("GET",dir +document.getElementById("Province").value+ ".txt",true);
  xhttp.send();
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
    $(".button").click(function(){
        $("body").css('background-image','url("bg.jpg")'); 
    });
});

</script>
<body>
<?php
$firstname = $_POST["firstname"];
echo "Firstname :  $firstname<br/>";
$lastname = $_POST["lastname"];
echo "Lastname : $lastname<br/>";
$bd = $_POST["bd"];
echo "Birthday : $bd<br/>";

$male_status = 'unchecked';
$female_status = 'unchecked';
if(isset($_POST['gender'])){
	$gender =$_POST['gender'];
	echo("Your Gender: $gender <br/>");
	
	}
	else{
		echo("Your Gender: Not select!! <br/>");
		}
$Province = $_POST["Province"];
echo "Privince : $Province<br/>";

echo "<div class=\"body\">
        <ul>
          <li>
            <img src=\"jungwud/{$row['Province']}\" />
          </li>
        </ul>
      </div>";


?>
</body>
</html>