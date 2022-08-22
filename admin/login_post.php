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
$_SESSION['username']= $result_after_decode->data->fullName;
$_SESSION['doc_id']= $result_after_decode->data->doc_id;

  if($data == 0){
      header('location:dashboard.php');
  }else{
      $_SESSION['login_error'] = "Your Username or Password is incorrect!";
        header('location:doctor_login.php');
  }

 ?>