<?php
include 'dbcon.php';
$insert = false;
if(isset($_POST['name'])){
    
    // Check for connection success
    if(!$con){
        //die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $reg=$_POST['reg'];
    $sql = "INSERT INTO `review`(`reg_no`, `name`, `date`, `comment`) VALUES ('$reg','$name',current_timestamp(),'$comment');";
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
    <title>Write Review</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body >
<img class="bg" src="image/student1.jpg" alt="">

    <div class="comment-box">
        <h2>
            Write your opinion
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thank you for submit your review</p>";
        }
    ?>
        </h2>
            <form action="write.php" method="post" >
                <input type="text" name="name" id="name" placeholder="Name">
                <textarea  name="comment" id="comment" cols="30" rows="10" placeholder="Write your opinion..."></textarea>
                <button class="btnn" >submit</button> 
            </form>
    </div>
</body>
</html>