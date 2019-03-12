<?php
error_reporting(1);

require('settings.php'); 
$db = mysqli_connect("localhost", $settings['username'], $settings['password'], $settings['dbname']);


if ($db->connect_errno) {
    print_response(['DatabaseConnect'=>false,"error"=>"Connect failed: ".$db->connect_error]);
}

$name = $_POST['groupname'];


$sql = "SELECT `Group ID` FROM `Groups` WHERE `GroupName` = '{$name}'";
$result = $db->query($sql);

while ($row = $result -> fetch_assoc()){
    $groupID = $row["Group ID"];
 }


 $students = []; // Array for course names

 $sql = "SELECT * FROM `Students` WHERE `Group ID` = '{$groupID}'";
 $result = $db->query($sql);
//Fetching students table into an array
 while ($row = $result -> fetch_assoc()){
     $students[] = $row;
 }


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./project_css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./project_css/studenthomepage.css">
    <title>ASESSE Evaluation</title>
</head>
<body>

<div class="container-fluid justify-content-center">
        <nav class="navbar text-center">
            <div class="col">
                <h1 class="font-weight-bold text-dark text-center">ASESSE</h1>
        </nav>
    </div>
    

 
     <p class="text-center">This is an anonymous evaluation and no one else in the group will see 
     these evaluation sheets.These evaluations and the objective evaluations (project grading sheet) 
     are what will help determine your grade on the project. 
    </p>
    <p class="text-center">(Note: The percentages should total 100%.If there are 5 in the group and everyone contributed equally,
     then everyone should get 20%.)</p>

<div class="form-sz">
    <form class="form-horizontal selectSize" action ="info.php" method = "post">
        <fieldset>

            
            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">Select Team Member :</label>
                <div class="selectSize">
                    <select name = "member" class="form-control selectSize" required>
                        <option value = "" required>Select Team Member </option>
                        <?php foreach($students as $item){?>
                        <option value = "<?php echo $item['Student Name'];?>" required>
                        <?php echo $item['Student Name'];?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>


        <option value = "" required>Select Group Name</option>
            <?php while ($row2 = mysqli_fetch_array($result)):;?>
            <option value = "<?php echo $row2[1];?>" required><?php echo $row2[1];?></option>
            <?php endwhile ?>


            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">Has the group member attended most meetings? Y/N </label>
                <div class="selectSize">
                    <select name = "a" class="form-control" required>
                        <option value = "">Please Select</option>
                        <option value = "yes" required>YES</option>
                        <option value = "no" required>NO</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">B. Has the group member been prepared for group meetings? Y/N </label>
                <div class="selectSize">
                    <select name = "b" class="form-control" required>
                        <option value = "">Please Select</option>
                        <option value = "yes" required>YES</option>
                        <option value = "no" required>NO</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">C. Has the group member participated positively in meetings? Y/N</label>
                <div class="selectSize">
                    <select name = "c" class="form-control" required>
                        <option value = "">Please Select</option>
                        <option value = "yes" required>YES</option>
                        <option value = "no" required>NO</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">D. Has the group member performed their share of the work, as assigned? Y/N</label>
                <div class="selectSize">
                    <select name = "d" class="form-control" required>
                        <option value = "">Please Select</option>
                        <option value = "yes" required>YES</option>
                        <option value = "no" required>NO</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">E. Has the group member been able to work well with others? Y/N</label>
                <div class="selectSize">
                    <select name = "e" class="form-control" required>
                        <option value = "">Please Select</option>
                        <option value = "yes" required>YES</option>
                        <option value = "no" required>NO</option>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">F. Rate the level of initiative this group member has exhibited in the project.</label>
                <div class="selectSize">
                    <input type="number" class="form-control" name="quantity1"  min="0" max="10" step="0.1" required>
                </div>
            </div>

            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">G. Rate the quality of this group member's inputt to group discussions and design issues. </label>
                <div class="selectSize">
                    <input type="number" class="form-control" name="quantity2"  min="0" max="10" step="0.1" required>
                </div>
            </div>

            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">H. Rate the overall value of this group member to the project.</label>
                <div class="selectSize">
                    <input type="number" class="form-control" name="quantity3" min="0" max="10" step="0.1" required>
                </div>
            </div>

            <div class="form-group">
                <label class="selectSize control-label text-center" for="selectbasic">Percentage of work done. </label>
                <div class="selectSize">
                    <input type="number" class="form-control" name="quantity4" min="0" max="100" step="1" required>
                </div>
            </div>

  
            <div class="form-group">
                <div class="selectSize">
                    <input class="btn btn-default" type="button" name="back" value="BACK" onclick= "window.location='evaluationMain.php'">
                    <input class="btn btn-default" type="submit" name="submit" value ="NEXT">  
                </div>
            </div>
        </fieldset>
    </form>
</div>

</body>

<footer>
    <div class="footer">© 2018 Copyright</div>
</footer>

</html>
