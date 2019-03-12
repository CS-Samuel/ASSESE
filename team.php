<?php
error_reporting(1);

require('settings.php'); 
$db = mysqli_connect("localhost", $settings['username'], $settings['password'], $settings['dbname']);


if ($db->connect_errno) {
    print_response(['DatabaseConnect'=>false,"error"=>"Connect failed: ".$db->connect_error]);
}

$name = $_POST['groupname'];

$sql = "SELECT * FROM `Groups` WHERE GroupName = '$name'";

$result = mysqli_query($db,$sql);

?>

<html>
<body>
<form action = "evaluationPage.php" method = "get">
<table>
<tr>
<td>Select Team Member :</td>
<td><select name = "member" required>
        <option value = "" required>Select Team Member Name</option>
        <?php while ($row2 = mysqli_fetch_array($result)):;?>
        <option value = "<?php echo $row2[4];?>" required><?php echo $row2[4];?></option>
        <?php endwhile ?>
    </select></td>
</tr>
<tr>
<td><input type="submit" value="Enter"></td>
<td><input type="button" value="Cancel" onclick="window.location='team.php'"></td>
</tr>
</table>
</form>
</body>
</html>