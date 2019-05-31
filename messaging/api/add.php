<?php 
require("./connect.php");
$sender = $_GET["sender"];
$receiver = $_GET["receiver"];
$message = $_GET["message"];
if($sender != null && $receiver != null && $message != null){
    $date = date("Y-m-d");
    $sql = "INSERT INTO messages(sender,receiver,message,date) VALUES ('$sender','$receiver','$message','$date');";
    mysqli_query($conn, $sql);
}
?>