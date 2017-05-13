<?php

header("Content-Type: application/json; charset=UTF-8");


$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pjt";


//
/*


INSERT INTO db_pjt.tb_user (first_name, last_name, email) VALUES ('John', 'Doe', 'john@example.com');




*/// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO db_pjt.tb_user (first_name, last_name, email) VALUES ('".$first_name."', '".$last_name."', '".$email."')";

if (mysqli_query($conn, $sql)) {
    echo "{return_code:1}";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>