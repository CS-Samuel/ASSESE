<?php
error_reporting(1);

require('settings.php'); 
$db = mysqli_connect("localhost", $settings['username'], $settings['password'], $settings['dbname']);


if ($db->connect_errno) 
{
    print_response(['DatabaseConnect'=>false,"error"=>"Connect failed: ".$db->connect_error]);
}


$studentName = $_POST['member'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$f = $_POST['quantity1'];
$g = $_POST['quantity2'];
$h = $_POST['quantity3'];
$i = $_POST['quantity4'];


$sql = "UPDATE `Students` Set `Question A Results` = CONCAT(`Question A Results`, ',{$a}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question B Results` = CONCAT(`Question B Results`, ',{$b}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question C Results` = CONCAT(`Question C Results`, ',{$c}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question D Results` = CONCAT(`Question D Results`, ',{$d}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question E Results` = CONCAT(`Question E Results`, ',{$e}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question F Results` = CONCAT(`Question F Results`, ',{$f}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question G Results` = CONCAT(`Question G Results`, ',{$g}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Question H Results` = CONCAT(`Question H Results`, ',{$h}')  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Percent Work Average` = (`Percent Work Average` * `Times Reviewed` + '{$i}') / (`Times Reviewed`+1) WHERE `Student Name` = '{$studentName}'";
$db->query($sql);
$sql = "UPDATE `Students` Set `Times Reviewed` = `Times Reviewed` + 1  WHERE `Student Name` = '{$studentName}'";
$db->query($sql);




echo "<script>window.location = 'evaluationMain.php'</script>";


?>