<?php
$patient_details = true;
require_once "inc/header.php";

$_SESSION['patient_name'] = $_GET['name'];
$_SESSION['patient_id'] = $_GET['id'];

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
                <a class="btn btn-success" href="visit_notes.php?id=<?php echo $_SESSION['patient_id']?>" type="button" >Go to visit notes</a>
             
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>Daniel Smith</td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Birth</strong> </td>
                                <td>26-10-1989</td>
                            </tr>
                            <tr>
                                <td><strong>Gender</strong></td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td><strong>City</strong></td>
                                <td>Koramangala</td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td>Koramangala
                                    Banglore, India</td>
                            </tr>
                            <tr>
                                <td><strong>Phone </strong></td>
                                <td>+91 11111 11111</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>your@email.com</td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Registration</strong></td>
                                <td>26-02-2022</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

              
                <button type="button" class="btn btn-success mb-3"><span class="ti-pencil-alt"></span> Edit Patient</button>
                <button type="button" class="btn btn-danger mb-3"><span class="ti-trash"></span> Delete Patient</button>
   
            </div>
        </div>
        <!-- /Widget Item -->

 
   
</div>
</div>
<!-- /Main Content -->
<?php
require_once "inc/footer.php"
?>