<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    //create a database connection
    $con = mysqli_connect($server, $username, $password);

    //check for connection success
    if (!$con) {
        die("Connection to this database failed due to: " . mysqli_connect_error());
    }
    // echo "Success connecting to the database:";

    //collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = " INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    //Execute the query string
    if($con ->query($sql) == true){
        // echo "Successfully inserted";

        //Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //close the database connection
    $con->close();
}
   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="bg.jpeg" alt="Galgotias University" class="bg">
    <div class="container">
        <h1>Welcome to Galgotias US Trip form</h1>
        <p>Enter your detail and submit this form to confirm your participation in the Trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>thanks for submittimg your form. we are happy to se you joining for the US Trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phone" placeholder="enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="enter your any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
      
</body>

</html>