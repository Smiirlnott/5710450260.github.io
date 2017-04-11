<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$myfile = fopen("/Lab5/1.txt"."r") or die("Unable to open file!");
while(!feof($myfile)){
	echo fgets($myfile,1024);
	echo '<br/>';
	}
fclose($myfile);?>
</body>
</html>