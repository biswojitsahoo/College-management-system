<?php
include 'dbcon.php';
$insert = false;
if(isset($_POST['reg'])){
    
    // Check for connection success
    if(!$con){
        //die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $pass = $_POST['pass'];
    $reg=$_POST['reg'];
    $sql = "INSERT INTO `student`(`reg_no`,`password`) VALUES ('$reg','$pass');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body >
<img class="bg" src="image/student.jpg" alt="">
<nav>      
        </nav>
    <div class="comment-box">
        <h2>
            Add Student
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Student added successfully</p>";
        }
    ?>
        </h2>
            <form action="add.php" method="post" >
                <input type="integer" name="reg" id="name" placeholder="REGISTRATION NO">
                <input type="text" name="pass" id="name" placeholder="password">
                <button class="btnn">submit</button> 
            </form>
    </div>
</body>
</html>