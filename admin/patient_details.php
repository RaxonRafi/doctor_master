<?php
$patient_details = true;
require_once "inc/header.php";
$mobile = $_GET['mobile'];
$_SESSION['patient_name'] = $_GET['name'];
$_SESSION['patient_id'] = $_GET['id'];

$url = "https://devapi.oxyjon.com/api/doctors/getpatientprofile?mobile=".$mobile;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_after_decode = json_decode($result);

//print_r($result_after_decode);

$mobile = $result_after_decode->data->mobile;
$patient_name = $result_after_decode->data->patient_name;
$gender = $result_after_decode->data->gender;
$email = $result_after_decode->data->email;
$birth_date = $result_after_decode->data->birth_date;
$profile_address = $result_after_decode->data->profile_address;
$registration_date = $result_after_decode->data->registration_date;
$city = $result_after_decode->data->city;

?>
<!-- Breadcrumb -->
<!-- Page Title -->
<div class="container-fluid mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title"> Patient Details</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item active">Patient Details</li>
            </ol>
        </div>
    </div>
</div>
<!-- /Page Title -->

<!-- /Breadcrumb -->
<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
               <!-- // <h3 class="widget-title">Patient Details</h3> -->
                <a class="btn_color" href="visit_notes.php?id=<?php echo $_SESSION['patient_id']?>&name=<?php echo $_SESSION['patient_name']  ?>" type="button" >Create New visit notes</a>
                <a class="btn_color mb-2" href="Pastvisit_notes.php?id=<?php echo $_SESSION['patient_id']?>" type="button" >Past visit notes</a>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td><?php echo $patient_name ?> </td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Birth</strong> </td>
                                <td><?php echo $birth_date ?></td>
                            </tr>
                            <tr>
                                <td><strong>Gender</strong></td>
                                <td><?php echo $gender ?></td>
                            </tr>
                            <tr>
                                <td><strong>City</strong></td>
                                <td><?php echo $city ?></td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td><?php echo $profile_address ?></td>
                            </tr>
                            <tr>
                                <td><strong>Phone </strong></td>
                                <td><?php echo $mobile ?></td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><?php echo $email ?></td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Registration</strong></td>
                                <td><?php echo $registration_date ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

              
                <a type="button" href="updatePatients.php?id=<?php echo $_SESSION['patient_id']?>&mobile=<?php echo $mobile  ?>" class="btn_color"><span class="ti-pencil-alt"></span> Edit Patient</a>
                <button type="button" class="btn btn-danger "><span class="ti-trash"></span> Delete Patient</button>
   
            </div>
        </div>
        <!-- /Widget Item -->

 
   
</div>
</div>
<!-- /Main Content -->
<?php
require_once "inc/footer.php"
?>