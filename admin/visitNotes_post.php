<?php
session_start();
 require_once "db/db.php";

 $uploaded_item = $_FILES['blood_test_report'];
 $uploaded_item_temp_loc = $uploaded_item['tmp_name'] ;
 $upload_ext = explode('.',$uploaded_item['name']);
 $new_name = rand().time().".". end($upload_ext);
 $new_location = '../admin/reports/'.$new_name;
 move_uploaded_file($uploaded_item_temp_loc,$new_location);


 if(isset($_POST['submit'])){
    $doc_id  = $_POST['doc_id'];
    $patient_id = $_POST['patient_id'];
    $report_name = $_POST['report_name'];
    $examination = $_POST['examination'];
    $blood_pressure = $_POST['blood_pressure'];
    $blood_pulse = $_POST['blood_pulse'];
    $spo2 = $_POST['spo2']; 
    $fasting_blood_sugar = $_POST['fasting_blood_sugar'];
    $random_blood_sugar= $_POST['random_blood_sugar'];
    $hbaic = $_POST['hbaic'];
    $creatinine = $_POST['creatinine'];
    $urine_macr = $_POST['urine_macr'];
    $bun =$_POST['bun'];
    $vit_d3 = $_POST['vit_d3'];
    $vit_b12 = $_POST['vit_b12'];
    $uric_acid = $_POST['uric_acid'];
    $sgot =$_POST['sgot'];
    $sgpt = $_POST['sgpt'];
    $provisional_diagnosis_implode =$_POST['provisional_diagnosis'];
    $provisional_diagnosis = implode(";",$provisional_diagnosis_implode);
    $investigation_implode = $_POST['investigation'];
    $investigation = implode(";",$investigation_implode);
    $referral_implode = $_POST['referral'];
    $referral = implode(";",$referral_implode);
    $advise_for_procedure  = $_POST['advise_for_procedure'];
    $repeat_visit = $_POST['repeat_visit'];
    $repeat_visit_date = $_POST['repeat_visit_date'];
    $prescription_implode = $_POST['prescription'];
    $prescription = implode(";",$prescription_implode);
 };

 

 $sql = "INSERT INTO visit_notes(doc_id, patient_id, blood_test_report,report_name, examination, blood_pressure, blood_pulse, spo2,fasting_blood_sugar, random_blood_sugar, hbaic, creatinine, urine_macr, bun, vit_d3, vit_b12,uric_acid, sgot, sgpt, provisional_diagnosis, investigation, referral, advise_for_procedure, repeat_visit, repeat_visit_date,prescription) VALUES ('$doc_id',' $patient_id ','$new_name','$report_name ',' $examination','$blood_pressure',' $blood_pulse',' $spo2','$fasting_blood_sugar','$random_blood_sugar',' $hbaic',' $creatinine','$urine_macr','$bun ','$vit_d3',' $vit_b12',' $uric_acid','$sgot','$sgpt','$provisional_diagnosis','$investigation','$referral','$advise_for_procedure','$repeat_visit ',' $repeat_visit_date','$prescription')";

 mysqli_query($db_connect,$sql);
 header("location:visit_notes.php");

?>