<?php
$patient_details = true;
require_once "inc/header.php";

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
                <h3 class="widget-title">Patient Details</h3>
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

                <!--Export links-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center export-pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-download"></span> csv</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-printer"></span> print</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Export links-->
                <button type="button" class="btn btn-success mb-3"><span class="ti-pencil-alt"></span> Edit Patient</button>
                <button type="button" class="btn btn-danger mb-3"><span class="ti-trash"></span> Delete Patient</button>
                <button type="button" class="btn btn-info mb-3"><span class="ti-arrow-down"></span> Download File</button>
            </div>
        </div>
        <!-- /Widget Item -->
        <!-- Widget Item -->

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <h3 class="widget-title">Enter Patient Medical History</h3>
                    <form>

                        <div class="form-group">
                            <label class="mr-2" for="exampleFormControlSelect1">Condition</label>

                            <select style="width: 75%;" class="form-control" id="condition_dropdown" multiple>
                                <option>--Select Condition--</option>
                                <option>Type 2 Diabetes</option>
                                <option>Type 1 Diabetes</option>
                                <option>High Blood pressure</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Procedures</label>
                            <select style="width: 75%;" class="form-control" id="procedure_dropdown" multiple>
                                <option>--Select Procedures--</option>
                                <option>Colonoscopy</option>
                                <option>Gall bladder surgery</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Family History</label>

                            <div class="form-group  d-flex">

                                <select col="3" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Father Condition--</option>
                                    <option> Type 2 Diabetes</option>
                                    <option> Type 1 Diabetes</option>
                                    <option>High Blood pressure</option>
                                    <option> Eye issue</option>
                                    <option>Kidney disease</option>
                                    <option>Cholesterol issue</option>
                                </select>
                                <select col="3" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Mother Condition--</option>
                                    <option> Type 2 Diabetes</option>
                                    <option> Type 1 Diabetes</option>
                                    <option>High Blood pressure</option>
                                    <option> Eye issue</option>
                                    <option>Kidney disease</option>
                                    <option>Cholesterol issue</option>
                                </select>
                                <select col="3" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Sister Condition--</option>
                                    <option> Type 2 Diabetes</option>
                                    <option> Type 1 Diabetes</option>
                                    <option>High Blood pressure</option>
                                    <option> Eye issue</option>
                                    <option>Kidney disease</option>
                                    <option>Cholesterol issue</option>
                                </select>
                                <select col="3" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Brother Condition--</option>
                                    <option> Type 2 Diabetes</option>
                                    <option> Type 1 Diabetes</option>
                                    <option>High Blood pressure</option>
                                    <option> Eye issue</option>
                                    <option>Kidney disease</option>
                                    <option>Cholesterol issue</option>
                                </select>

                            </div>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!-- /Widget Item -->
    <!-- Hoverable rows Table-->
    <div class="col-md-12">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title"> Patient Medical History</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Patient Condition</strong></td>
                            <td>Type 2 Diabetes</td>
                        </tr>
                        <tr>
                            <td><strong>Procedures</strong> </td>
                            <td>Gall bladder surgery</td>
                        </tr>
                        <tr>
                            <td><strong>Family History</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Father Condition</strong></td>
                            <td>Type 2 Diabetes</td>
                        </tr>
                        <tr>
                            <td><strong>Mother Condition </strong>
                            </td>
                            <td>Type 2 Diabetes</td>
                        </tr>
                        <tr>
                            <td><strong>sister Condition</strong>
                            </td>
                            <td>Type 2 Diabetes</td>
                        </tr>
                        <tr>
                            <td><strong>Brother Condition</strong>
                            </td>
                            <td>Type 2 Diabetes</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- /Hoverable rows Table-->
</div>
</div>
<!-- /Main Content -->
<?php
require_once "inc/footer.php"
?>