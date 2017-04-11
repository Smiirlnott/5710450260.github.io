<html>
<head>
<link rel="stylesheet" media="screen" href="CSS-lab7.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="tableExport.jquery.plugin-master/tableExport.js"></script>
<script type="text/javascript" src="tableExport.jquery.plugin-master/jquery.base64.js"></script>

<script type="text/javascript"  src="tableExport.jquery.plugin-master/jspdf/jspdf.js"></script>
<script type="text/javascript" src="tableExport.jquery.plugin-master/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="tableExport.jquery.plugin-master/jspdf/libs/base64.js"></script>

<script type="text/javascript"> 
$(document).ready(function(e) {
    $("#PDF").click(function(e){
		$("#myTable").tableExport({
			type:'pdf',
			escape:'false'
			});
			});
	 $("#EXCEL").click(function(e){
		$("#myTable").tableExport({
			type:'excel',
			escape:'false'
			});
			});		
});
</script>
<body>

<title>Export File</title>
<div>
  <h1>Export File<br>
    <br>
    <?php

echo "<table id='myTable' align='center'style='border: solid 1px black;'>";
echo "<thead><tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Date</th></tr></thead>";
class TableRows extends RecursiveIteratorIterator {
     function __construct($it) {
         parent::__construct($it, self::LEAVES_ONLY);
     }

     function current() {
         return "<td style='width: 150px; border:1px  ;text-align: center; border-bottom: 1px solid #ddd;'>" . parent::current(). "</td>";
     }

     function beginChildren() {
         echo "<tr>";
     }

     function endChildren() {
         echo "</tr>" . "\n";
     }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamhome";

try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT client.clientno,client.fname,client.lname,viewing.viewdate 
	 FROM client
	 INNER JOIN viewing
	 ON client.clientno = viewing.clientno");
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";




?>

  </h1>
  <p>
  <table width="600" align="center">
    <tr>
      <td height="29">
       <div class="dropdown" align="center">
    	<button class="dropbtn"  align="center" >  Export File  </button>
  		<div class="dropdown-content">
    <a href="#" id="PDF" >PDF</a>
    <a href="#" id="EXCEL">EXCEL</a>
    </div>
</div>
      
      </td>
    </tr>
  </table>
  <p>    
 
</div>
</body>
</html>
