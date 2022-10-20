<?php
$db_host="localhost";
$db_user="tsucon";
$db_pass="rditsu2019";
$db="tsu_con30";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db) or die ("Can't connect DB");
mysqli_set_charset($conn, "utf8");
?>