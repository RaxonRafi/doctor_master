<?php
require_once "db/db.php";

//print_r($_GET);

$id = $_GET['id'];

$report_name = $_GET['report_name'];

$delete = "DELETE FROM reports WHERE id = $id";

$query = mysqli_query($db_connect,$delete);

if($query){

    unlink("../admin/reports/".$report_name);
    header("location:visit_notes.php");
}



?>