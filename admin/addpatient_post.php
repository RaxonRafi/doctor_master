<?php
session_start();

  $arr['patient_id'] = $_SESSION['patient_id'];

  $arr['name'] = $_POST['name'];
  $arr['birth_date'] = $_POST['birth_date'];
  $arr['mobile'] = $_POST['mobile'];
  $arr['gender'] = $_POST['gender'];
  $arr['email'] = $_POST['email'];
  //$arr['profile_city'] = $_POST['residing_in_id'];
  $arr['city'] = $_POST['residing_in_id'];
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
  $data = $result_after_decode->data->profileId;

  

   header("location:patient_details.php?mobile=".$arr['mobile']."&name=".$arr['name']."&id=".$data);
// if($data != ){
   
//   $_SESSION['success'] = "Patient added successfully !";


// }else{

//   $_SESSION['error'] = "somthing is missing !";
//   header("location:addpatient.php");
// }


?>