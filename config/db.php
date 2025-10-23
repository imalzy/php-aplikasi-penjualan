<?php 
$host="localhost";
$username="root";
$password="";
$database_name="pos_db";

// $mysqli = new mysqli("localhost","my_user","my_password","my_db");
$koneksi = new mysqli($host, $username, $password, $database_name);

if ($koneksi->connect_errno) {
    echo "Failed to connect to MySQL: " . $koneksi -> connect_error;
    exit();
}

?>