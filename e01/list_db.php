<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edu";


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "edu");

$result = $conn->query("SELECT  * FROM guest");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"email":"'  . $rs["email"] . '",';
    $outp .= '"phone":"'   . $rs["phone"]        . '",';
    $outp .= '"last_name":"'. $rs["last_name"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
