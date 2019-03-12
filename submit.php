<?php
error_reporting(1);

require('settings.php');



    $db = new mysqli('cs2.mwsu.edu', $settings['username'], $settings['password'], $settings['dbname']);

    if ($db->connect_errno) 
    {
        print_response(['success'=>false,"error"=>"Connect failed: ".$db->connect_error]);
    }
    else{
        echo "Success";
    }
   
    $sql="INSERT into Forms (Reviewed Student ID, Question A, Question B, Question C, Question D, Question E, Question F, Question G, Question H) VALUES (reviewedID, QuestionA, QuestionB, QuestionC, QuestionD, QuestionE, QuestionF, QuestionG, QuestionH);
    $insert = $mysqli->query($sql);

    
$mysqli->close();


?>