<?php
require_once "db/db.php";
$id = $_GET['id'];
$sql = "DELETE FROM medicines WHERE id=$id";
mysqli_query($db_connect,$sql);
header("location:medicines.php");

?>