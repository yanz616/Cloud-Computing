<?php
include "config.php";
$id = $_GET["id"];
$connection->query("DELETE FROM appointment WHERE id = $id");
header("Location: index.php");
exit();
