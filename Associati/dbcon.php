<?php

$servername = 'localhost';
$username = 'davemercer';
$password = '';
$dbname = 'my_davemercer';

$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "select * FROM tbl_users";
if(!$conn){
    echo 'Connection Error '.mysqli_connect_error();
}