<?php
$hostname = "mariadb-adriyan";
$username = "root";
$password = "11223344";
$database = "consult_db";
$connection = new mysqli($hostname, $username, $password, $database);
if ($connection->connect_error) {
    die("Koneksi gagal :" . $connection->connect_error);
}
