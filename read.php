<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "college";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

$sql = "SELECT * FROM `review`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Review</title>
</head>
<body background="image/student.jpg">
<section id="reviews">
    <div class="review-heading">
        <span>Reviews</span>
        <h1>What people say about us</h1>
    </div>
    <div class="review-box-cointainer">
        </div>
        <?php
        if(mysqli_num_rows($result)>0){
            foreach($result as $row){
                
                ?>
                <div class="review-box">
            <div class="box-top">
                <div class="profile">
                    <div class="user-name">
                        <strong><?php 
                        echo $row['name'];
                        ?></strong>
                    </div>
                </div>
                
            </div>
            <div class="people-reviews">
                <p><?php
                echo $row['comment'];
                ?></p>
            </div>
        </div>

                <?php
            }

        }
        else{
            ?>
            <h1>No record found</h1>
            <?php
        }
        ?>
    </div>
</div>
</section>
</body>
</html>