<?php
session_start();
require_once "db/db.php";
$doc_id = $_POST['doc_id'];
$patient_id = $patient_id = $_POST['patient_id'];;
$medicine_name = $_POST['medicine_name'];
$quantity = $_POST['quantity'];
$time_day_implode =$_POST['time_day'];
$time_day =implode(",",$time_day_implode);
$continue_till =$_POST['continue_till'];
$date = $_POST['date'];

$insert_query = "INSERT INTO medicines (doc_id, patient_id, medicine_name, quantity, time_of_the_day, continue_till, continue_till_date) VALUES ('$doc_id ','$patient_id ','$medicine_name','$quantity','$time_day','$continue_till','$date')";

mysqli_query($db_connect,$insert_query);

header("location:medicines.php");

?>