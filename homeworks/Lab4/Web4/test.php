<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$TEST = 'Hello world';
echo $TEST;
?>
<script type="text/javascript">  
$(function(){       
       
    $(".css_data_item").click(function(){  
        if($(this).prop("checked")==true){ 
            var indexObj=$(this).index(".css_data_item");    
            $(".css_data_item").not(":eq("+indexObj+")").prop( "checked", false ); 
        }  
    });  
 
    $("#form_checkbox1").submit(function(){ 
        if($(".css_data_item:checked").length==0){ 
            alert("Please Select Your Gender !!");  
            return false;     
        }  
    });     
           
});  
</script>


</body>
</html>