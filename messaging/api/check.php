<?php 
header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
require("./connect.php");
$last_id = $_GET["lastId"];
$sender = $_GET["sender"];
$receiver = $_GET["receiver"];
$sql = "SELECT * FROM messages WHERE id > ".$last_id." AND ((sender ='".$receiver."' AND receiver = '".$sender."'));";
$result = mysqli_query($conn, $sql);
$arr = [];
while($row = mysqli_fetch_assoc($result)){
    array_push($arr,$row);
}
echo json_encode($arr);
?>