<?php
session_start();
$arr['userName'] = $_POST['userName'];
$arr['password'] = $_POST['password'];
// $arr['doc_id'] = $_POST['doc_id'];
json_encode($arr);

$url = "https://devapi.oxyjon.com/api/doctors/login";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_after_decode = json_decode($result);
$result_after_encode = json_encode($result);
$result_after_decode2 = json_decode($result_after_encode);
$data = $result_after_decode->errorCode;
$data_name = $result_after_decode->data;
$_SESSION['error_code']=$data;
$_SESSION['username']= $result_after_decode->data->fullName;
$_SESSION['doc_id']= $result_after_decode->data->doc_id;
$_SESSION['qualification']= $result_after_decode->data->qualification;
$_SESSION['address']= $result_after_decode->data->address;
$_SESSION['mobileNumber']= $result_after_decode->data->mobileNumber;
$_SESSION['state']= $result_after_decode->data->state;
$_SESSION['city']= $result_after_decode->data->city;
$_SESSION['locality']= $result_after_decode->data->locality;

  if($data == 0){
      header('location:dashboard.php');
  }else{
      $_SESSION['login_error'] = "Your Username or Password is incorrect!";
        header('location:doctor_login.php');
  }

 ?>