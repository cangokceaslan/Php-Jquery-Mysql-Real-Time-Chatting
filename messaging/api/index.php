<?php 
require("./connect.php");
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
$sender = $_GET["sender"];
$receiver = $_GET["receiver"];
if($sender != null && $receiver != null){
    $sql = "SELECT * FROM messages WHERE (sender='".$sender."' AND receiver='".$receiver."') OR (receiver='".$sender."' AND sender='".$receiver."') ORDER BY date ASC;";
    $result = mysqli_query($conn,$sql);
    $arr = [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($arr,$row);
    }
    echo json_encode($arr);
}else{
    echo "Hata";
}


?>