<?php
error_reporting(1);

require('settings.php'); 
$db = mysqli_connect("localhost", $settings['username'], $settings['password'], $settings['dbname']);


if ($db->connect_errno) {
    print_response(['DatabaseConnect'=>false,"error"=>"Connect failed: ".$db->connect_error]);
}

$sql = "SELECT * FROM `Courses`";

$result = mysqli_query($db,$sql);


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./project_css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./project_css/studenthomepage.css">
    <title>Student Home Page</title>
</head>

<body>
    <div class="container-fluid justify-content-center">
        <nav class="navbar text-center">
            <div class="col">
                <h1 class="font-weight-bold text-dark text-center">ASESSE</h1>
        </nav>
        <div class="text-center pt-5"> 
        <h1>Welcome</h1>
        <h1>Student</h1>
        </div>
    </div>

    <div class="form-entry">
        <form action = "validation.php" method="post">

        <div class="form-group selectSize">
            <label> Course Name :</label>
            <select class="selectSize form-control" name = "cname" required>
                <option value = "">Select The Course</option>
                <?php while ($row2 = mysqli_fetch_array($result)):;?>
                <option value = "<?php echo $row2[1];?>" required><?php echo $row2[1];?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label>Enter Password :</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="form-control bg-dark text-white">
            <input type="button" value="Cancel" class="form-control bg-dark text-white" onclick="window.location='student.php'">
        </div>

        </form>
    </div>
</body>

<footer>
    <div class="footer">© 2018 Copyright</div>
</footer>

</html>
