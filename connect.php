<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'you850407');
define('DB_DATABASE', 'kh_sql');
$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
mysqli_set_charset($link, "utf8");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>