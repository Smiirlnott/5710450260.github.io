<?php require_once('Connections/myconnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO customer (CustomerID, citizenid, fname, lname) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['CustomerID'], "int"),
                       GetSQLValueString($_POST['citizenid'], "int"),
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"));

  mysql_select_db($database_myconnect, $myconnect);
  $Result1 = mysql_query($insertSQL, $myconnect) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>InsertData</title>
</head>

<body>
<p>
  <?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=webtech", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
   </p>
</p>
<h1>Insert Data</h1>
 <div>
   <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
     <table align="center">
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">CustomerID:</td>
         <td><input type="text" name="CustomerID" value="" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Citizenid:</td>
         <td><input type="text" name="citizenid" value="" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Firstname:</td>
         <td><input type="text" name="fname" value="" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">Lastname:</td>
         <td><input type="text" name="lname" value="" size="32" /></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">&nbsp;</td>
         <td><input type="submit" value="Insert record" /></td>
       </tr>
     </table>
     <input type="hidden" name="MM_insert" value="form2" />
   </form>
   <p>&nbsp;</p>
</div>
 <p>&nbsp;</p>
</body>
</html>
