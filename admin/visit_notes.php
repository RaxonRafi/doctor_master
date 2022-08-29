<?php
$patient_details = true;
require_once "inc/header.php";
$url = "https://devapi.oxyjon.com/api/doctors/masterdata";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_after_decode = json_decode($result);
$conditions = $result_after_decode->data->HealthCondition;
$procedures = $result_after_decode->data->Procedure;

?>
<!-- Breadcrumb -->
<!-- Page Title -->
<div class="container-fluid mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title">Visit Notes</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item active">Visit Notes</li>
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
                <h3 class="widget-title">Visit Notes</h3>
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mt-5">
                                <label for="exampleInputEmail1">Blood Test Report</label>
                                <input rows="3" type="file" class="form-control" placeholder="Physical examination">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-5">
                                <label for="exampleInputEmail1">Report Name</label>
                                <input rows="3" type="text" style="width:50%;" class="form-control" placeholder="Report Name">

                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Examination</label>
                        <textarea rows="3" type="text" style="width: 75%;" class="form-control" placeholder="Physical examination"></textarea>

                    </div>
                    <div class="form-group">
                        <label>Health Parameters</label>
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Blood Pressure"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Blood Pulse "></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter SPO2 "></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Fasting Blood Sugar"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Random Blood Sugar"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter HbA1c"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Creatinine"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Urine MACR"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex">

                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter BUN"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Vit D3"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter  Vit B12"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter Uric acid"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter SGOT"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" rows="3" class="form-control" placeholder="Enter SGPT"></textarea>
                                </div>
                            </div>
                        </div>

                        <label>Provisional diagnosis</label>

                        <div class="form-group">
                            <select style="width: 75%;" class="form-control" id="diagnosis_dropdown" multiple>
                                <option>--List of Conditions--</option>
                                <?php
                                foreach ($conditions as $condition) {
                                ?>
                                    <option value="<?php echo $condition->id?>"><?php echo $condition->property_type ?></option>
                                <?php
                                };
                                ?>
                            </select>
                        </div>
                        <label>Investigation</label>
                        <div class="form-group">
                            <select style="width: 75%;" class="form-control" id="investigation_dropdown" multiple>
                                <option>--List of Tests--</option>

                                <?php
                                foreach ($procedures as $procedure) {
                                ?>
                                    <option value="<?php echo $procedure->id ?>"><?php echo $procedure->property_type ?></option>
                                <?php
                                };
                                ?>

                            </select>
                        </div>
                        <label>Referral</label>
                        <div class="form-group">

                            <select style="width: 75%;" class="form-control" id="referral_dropdown" multiple>
                                <option>--List of Referral--</option>
                                <option>Cardiologist</option>
                                <option>Nephrologist</option>
                                <option>Ophthalmologist</option>
                                <option>Footcare Specialist</option>
                            </select>
                        </div>
                        <label>Advise for Procedure</label>
                        <div class="form-group">
                            <input type="search" style="width: 75%;" class="form-control form-control-sm" placeholder="" aria-controls="tableId">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label>Repeat visit date</label>
                                <div class="form-group  d-flex">
                                    <select style="width: 60%;" col="3" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select day or month--</option>
                                        <option>Day</option>
                                        <option>Month</option>
                                    </select>
                                    <input placeholder="enter date" type="number">
                                </div>
                            </div>
                        </div>
                        <label>Prescription</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Dietary modification
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Lifestyle modification
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Blood sugar charting
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </from>


                    </div>

            </div>
        </div>
        <!-- /Widget Item -->

    </div>
</div>
<!-- /Main Content -->
<div class="container-fluid">
    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Visit Notes</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Examination</strong></td>
                                <td>Name of examination</td>
                            </tr>
                            <tr>
                                <td><strong>Health Parameters</strong> </td>

                            </tr>
                            <tr>
                                <td><strong>Blood Pressure</strong></td>
                                <td> Blood Pressure goes here</td>
                            </tr>
                            <tr>
                                <td><strong> Pulse</strong></td>
                                <td>Pulse goes here</td>
                            </tr>
                            <tr>
                                <td><strong>SPO2 </strong></td>
                                <td>SPO2 goes here</td>
                            </tr>
                            <tr>
                                <td><strong> Fasting Blood Sugar</strong></td>
                                <td> Fasting Blood Sugar goes here</td>
                            </tr>
                            <tr>
                                <td><strong> Random Blood Sugar</strong></td>
                                <td> Random Blood Sugar goes here</td>
                            </tr>
                            <tr>
                                <td><strong> HbA1c </strong></td>
                                <td> HbA1c goes here</td>
                            </tr>
                            <tr>
                                <td><strong> Creatinine</strong></td>
                                <td> Creatinine goes here</td>
                            </tr>
                            <tr>
                                <td><strong> Urine MACR</strong></td>
                                <td> Urine MACR goes here</td>
                            </tr>
                            <tr>
                                <td><strong> BUN</strong></td>
                                <td> BUN goes here</td>
                            </tr>
                            <tr>
                                <td><strong>patient Conditions </strong></td>
                                <td> patient conditions goes here</td>
                            </tr>
                            <tr>
                                <td><strong>Investigation </strong></td>
                                <td> Investigation goes here</td>
                            </tr>
                            <tr>
                                <td><strong>Advise for Procedure </strong></td>
                                <td>Advise for Procedure goes here</td>
                            </tr>
                            <tr>
                                <td><strong>Prescription </strong></td>
                                <td> Prescription goes here</td>
                            </tr>
                            <tr>
                                <td><strong>Medicines</strong></td>
                                <td> Medicines goes here</td>
                            </tr>
                            <tr>
                                <td><strong>Time of the day </strong></td>
                                <td> Time of the day goes here</td>
                            </tr>
                            <tr>
                                <td><strong>Repeat visit date</strong></td>
                                <td> Repeat visit dategoes here</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>
<?php
require_once "inc/footer.php"
?>