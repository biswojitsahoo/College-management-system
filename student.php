<?php
include 'dbcon.php';
if(isset($_POST['reg'])){
    $reg = $_POST['reg'];
    $pass = $_POST['password'];
    $sql="SELECT * FROM `student` WHERE `reg_no`= '$reg' AND `password`= '$pass';";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)){
        header("Location: write.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>login</title>
</head>
<body>
    <form action="student.php" method="post">
        <h2>STUDENT LOGIN</h2>
        <input type="integer" name="reg" required placeholder="REGISTRATION NO"><br>
        <input type="password" name="password" required placeholder="PASSWORD"><br>
        <button type="submit" class="btnn" value="submit" name="submit">LOGIN</buttontype>
    </form>
</body>
</html>