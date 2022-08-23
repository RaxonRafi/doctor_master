<?php

if(isset($_POST['input'])){
    
    $arr['city_name'] = $_POST['input'];
    $url = "https://devapi.oxyjon.com/api/doctors/searchcity";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $result_after_decode = json_decode($result);
    $data = $result_after_decode->data;
    $data_encode = json_encode($data);
    $data_decode  = json_decode($data_encode);

}



foreach ($data_decode as $result) {

    echo "<a href='#' class='list-group-item border-1'>" . $result->city_name . "</a>";
}
?>





