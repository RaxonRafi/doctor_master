<?php

session_start();
 require_once "db/db.php";
//  print_r($_POST);
//  print_r($_FILES);

foreach( $_FILES['blood_test_report']['name'] as $key => $val){


    $uploaded_item = $_FILES['blood_test_report']['name'];
    $uploaded_item_temp_loc = $_FILES['blood_test_report']['tmp_name'][$key];
    //$upload_ext = explode('.',$uploaded_item['name']);
    $new_name_imp = rand('1111','9999').".".$val;
    $new_location = '../admin/reports/'.$new_name_imp;
    move_uploaded_file($uploaded_item_temp_loc,$new_location);

    if(isset($_POST['submit'])){

        $doc_id  = $_POST['doc_id'];
        $patient_id = $_POST['patient_id'];
        $report_name = $_POST['report_name'];

        
    }




}

$sql = "INSERT INTO reports (patient_id, doc_id, report_name,report) VALUES ('$patient_id','$doc_id',' $report_name','$new_name_imp')";
mysqli_query($db_connect,$sql);
header("location:visit_notes.php?id=".$patient_id);
?>