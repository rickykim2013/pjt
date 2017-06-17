<?php

header("Content-Type: application/json; charset=UTF-8");


$action_type = trim($_POST['action_type']);
$system_id = trim($_POST['system_id']);
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);


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


if ( $action_type == "ADD" ){
	$sql = "INSERT INTO db_pjt.tb_user (first_name, last_name) VALUES ('".$first_name."', '".$last_name."')";	
}else if( $action_type == "MOD" ){
	
	$sql = "UPDATE db_pjt.tb_user set first_name = '".$first_name."',  last_name = '".$last_name."'   WHERE system_id = ".$system_id."   ";

}else if( $action_type == "DEL"){
	$sql = "DELETE FROM db_pjt.tb_user WHERE system_id = ".$system_id."   ";
}



if (mysqli_query($conn, $sql)) {
    echo "{return_code:1}";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>