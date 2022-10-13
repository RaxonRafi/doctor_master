<?php
require_once "inc/header.php";
require_once "inc/header.php";
$mobile = $_GET['mobile'];
//$_SESSION['patient_id'] = $_GET['id'];

$url = "https://devapi.oxyjon.com/api/doctors/getpatientprofile?mobile=".$mobile;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_after_decode = json_decode($result);

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
            <h3 class="block-title">Edit Patient</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item active">Edit Patient</li>
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
                <h3 class="widget-title">Edit Patient </h3>
              
                <form action="UpdatePatients_post.php?mobile=<?php echo $mobile  ?>" method="POST">

                    <input type="hidden" name="doctor_id" value="<?php echo $_SESSION['doc_id'] ?>">
                    <input type="hidden" name="patient_id" value="<?php echo $_SESSION['patient_id'] ?>">

                    <div class="form-row mt-5">
                        <div class="form-group col-md-6">
                            <label for="patient-name">Patient Name</label>
                            <input name="name" value="<?php echo $patient_name ?>" required type="text" class="form-control" placeholder="Patient name" id="patient-name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">Date Of Birth</label>
                            <input name="birth_date"  value="<?php echo $birth_date ?>"  type="text" placeholder="Date of Birth" class="form-control" id="dob">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="age">Email</label>
                            <input type="Email"  value="<?php echo $email ?>"  name="email" placeholder="Enter Email Address" class="form-control" id="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="phone"  value="<?php echo $mobile ?>"  required  name="mobile" placeholder="Phone" class="form-control" id="phone">
                        </div>

                        <div class="col-md-6 form-group" id="residing_in_ids">
                            <label for="residing_in">City <small>(select from lookup)</small></label> <span class="span_error"  id="error_BirthDate"></span>
                            <input type="text"  value="<?php echo $city ?>"  class="form-control form_input" autocomplete="off" name="city" id="residing_in" placeholder="Residing in">                        
                            <input type="hidden" name="residing_in_id" id="residing_in_id" value="0"> 
                     
                        </div>

                        <!-- <div class="form-group col-md-6">
                            <label for="phone">City</label>
                            <input type="search" name="city" required placeholder="Enter Your City" class="form-control" id="searchcity">
                            <span id="residing_in"></span>
                        </div> -->
                        <div class="form-group col-md-6">
                            <label for="Address">Address</label>
                            <input type="text"  value="<?php echo $profile_address ?>"  required name="address" placeholder="Enter Your Address" class="form-control" id="address">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date Of Registration</label>
                            <input type="text"  value="<?php echo $registration_date ?>"  placeholder="Registration date" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" required class="form-control" id="gender">
                                <option value="M" 
                                   <?php
                                 if(isset($gender) == "M"){
                                    echo "selected";
                                 }
                                   ?>
                                >Male</option>
                                <option value="F"
                                <?php
                                 if(isset($gender) == "F"){
                                    echo "selected";
                                 }
                                   ?>
                                >Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <button name="submit" type="submit" class="btn btn-info btn-lg">Update</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>
<!-- /Main Content -->
<?php
require_once "inc/footer.php";
?>