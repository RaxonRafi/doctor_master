<?php
session_start();
 require_once "db/db.php";
  //$id =$_GET['id'];
  $id=$_SESSION['patient_id'];

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
    $father_Condition = $_POST['father_Condition']; 
    $mother_Condition = $_POST['mother_Condition'];
    $sister_Condition = $_POST['sister_Condition'];
    $brother_Condition = $_POST['brother_Condition'];
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


  $sql = "UPDATE visit_notes SET doc_id='$doc_id',patient_id='$patient_id',report_name='$report_name',examination='$examination',blood_pressure='$blood_pressure',blood_pulse='$blood_pulse',spo2='$spo2',fasting_blood_sugar='$fasting_blood_sugar',random_blood_sugar='$random_blood_sugar',hbaic='$hbaic',creatinine='$creatinine',urine_macr='$urine_macr',bun='$bun',vit_d3='$vit_d3',vit_b12='$vit_b12',uric_acid='$uric_acid',sgot='$sgot',sgpt='$sgpt',father_condition='$father_Condition',mother_condition='$mother_Condition',sister_condition='$sister_Condition',brother_condition='$brother_Condition',provisional_diagnosis='$provisional_diagnosis',investigation='$investigation',referral='$referral',advise_for_procedure='$advise_for_procedure',repeat_visit='$repeat_visit',repeat_visit_date='$repeat_visit_date',prescription='$prescription' WHERE patient_id=$id";

 mysqli_query($db_connect,$sql);
 header("location:visitnotes_update.php?id=".$id);

?>