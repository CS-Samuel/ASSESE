<?php
error_reporting(1);

require('settings.php'); 
$db = mysqli_connect("localhost", $settings['username'], $settings['password'], $settings['dbname']);


if ($db->connect_errno) {
    print_response(['DatabaseConnect'=>false,"error"=>"Connect failed: ".$db->connect_error]);
}

$course = $_POST['cname'];
$password = $_POST['password'];
//Getting the values from database which contains the course and password
$sql = "SELECT * FROM `Courses`WHERE Name='$course' AND Password='$password'";

$result = mysqli_query($db,$sql);
//Fetchinf the results into an array
$row = mysqli_fetch_assoc($result);

if (!$row)
{
    echo "Please Enter Correct Password";
    header("Location: student.php");   
}
else{
    header("Location: evaluationMain.php");
}
?>


