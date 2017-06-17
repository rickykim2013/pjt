<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pjt";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM tb_user";
$result = $conn->query($sql);
$outp = "[";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	    if ($outp != "[") {$outp .= ",";}
	   
	    $outp .= '{"first_name":"'  . $row["first_name"] . '",';
	    $outp .= '"last_name":"'   . $row["last_name"]        . '",';
	    //$outp .= '"personIntro":"'   . $row["skill"]        . '",';
	    $outp .= '"system_id":"'   . $row["system_id"]        . '",';
	    $outp .= '"email":"'. $row["email"]     . '"}'; 
    }
} else {
}
$outp .="]";
$conn->close();
echo($outp);
?>