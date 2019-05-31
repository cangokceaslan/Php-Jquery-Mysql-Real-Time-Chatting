<?php 
define('HOST','localhost:3306');
define('USER','root');
define('PASS','root');
define('DB','mesaj');
$conn = mysqli_connect(HOST,USER,PASS,DB) or die("Hata");
?>