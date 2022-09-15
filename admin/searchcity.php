<?php

if(isset($_POST['search'])){
    
    $city_name['city_name'] = $_POST['search'];
    $url = "https://devapi.oxyjon.com/api/doctors/searchcity";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $city_name);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result_after_decode = json_decode($result, TRUE);
    $response = array();
    foreach($result_after_decode['data'] as $value) 
    {
        $response[] = array("value"=>$value['id'],"label"=>$value['city_name']);
    }
    
     echo json_encode($response);  
   
}


?>