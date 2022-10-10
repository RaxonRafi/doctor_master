<?php
 require_once "db/db.php";
  
  $arr['name'] = $_POST['name'];
  $arr['gender'] = $_POST['gender'];
  $arr['birth_date'] = $_POST['birth_date'];
  $arr['mobile'] = $_POST['mobile'];
  $arr['doctor_id']= $_POST['doctor_id'];
  $arr['patient_id']= $_POST['patient_id'];
  $arr['address'] = $_POST['address'];
  $arr['email'] = $_POST['email'];
  $arr['city'] = $_POST['residing_in_id'];

  
  json_encode($arr);
$url = "https://devapi.oxyjon.com/api/doctors/updatepatientprofile";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_after_decode = json_decode($result);

print_r($result);


?>