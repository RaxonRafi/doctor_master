<?php
session_start();

  $arr['name'] = $_POST['name'];
  $arr['birth_date'] = $_POST['birth_date'];
  $arr['mobile'] = $_POST['mobile'];
  $arr['gender'] = $_POST['gender'];
  $arr['email'] = $_POST['email'];
  $arr['city'] = $_POST['city'];
  $arr['address'] = $_POST['address'];
  $arr['doctor_id']= $_POST['doctor_id'];
  json_encode($arr);
  $url = "https://devapi.oxyjon.com/api/doctors/addnewpatient";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  $result_after_decode = json_decode($result);
  $data = $result_after_decode->errorCode;

 
if($data != null){
  
  $_SESSION['success'] = "Patient added successfully !";
  header("location:addpatient.php");

}else{

  $_SESSION['error'] = "somthing is missing !";
  header("location:addpatient.php");
}

?>