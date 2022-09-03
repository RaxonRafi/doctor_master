<?php

$patient_details = true;
require_once "inc/header.php";
require_once "db/db.php";
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
                <form method="POST" enctype="multipart/form-data" action="visitNotes_post.php">

                    <input name="doc_id" value="<?php echo $_SESSION['doc_id'] ?>" type="hidden">
                    <input name="patient_id" value="<?php echo $_SESSION['patient_id'] ?>" type="hidden">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mt-5">
                                <label for="exampleInputEmail1">Blood Test Report</label>
                                <input rows="3" type="file" name="blood_test_report" class="form-control">

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-5">
                                <label for="exampleInputEmail1">Report Name</label>
                                <input rows="3" type="text" name="report_name" style="width:50%;" class="form-control" placeholder="Report Name">

                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Examination</label>
                        <textarea name="examination" rows="3" type="text" style="width: 75%;" class="form-control" placeholder="Physical examination"></textarea>

                    </div>
                    <div class="form-group">
                        <label>Health Parameters</label>
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="form-group">
                                    <input name="blood_pressure" type="text" rows="3" class="form-control" placeholder="Enter Blood Pressure"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="blood_pulse" rows="3" class="form-control" placeholder="Enter Blood Pulse "></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="spo2" rows="3" class="form-control" placeholder="Enter SPO2 "></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fasting_blood_sugar" rows="3" class="form-control" placeholder="Enter Fasting Blood Sugar"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="form-group">
                                    <input type="text" name="random_blood_sugar" rows="3" class="form-control" placeholder="Enter Random Blood Sugar"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="hbaic" rows="3" class="form-control" placeholder="Enter HbA1c"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="creatinine" rows="3" class="form-control" placeholder="Enter Creatinine"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="urine_macr" rows="3" class="form-control" placeholder="Enter Urine MACR"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-flex">

                                <div class="form-group">
                                    <input type="text" name="bun" rows="3" class="form-control" placeholder="Enter BUN"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="vit_d3" rows="3" class="form-control" placeholder="Enter Vit D3"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="vit_b12" rows="3" class="form-control" placeholder="Enter  Vit B12"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="uric_acid" rows="3" class="form-control" placeholder="Enter Uric acid"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="form-group">
                                    <input name="sgot" type="text" rows="3" class="form-control" placeholder="Enter SGOT"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="sgpt" rows="3" class="form-control" placeholder="Enter SGPT"></textarea>
                                </div>
                            </div>
                        </div>

                        <label>Provisional diagnosis</label>

                        <div class="form-group">
                            <select name="provisional_diagnosis[]" style="width: 75%;" class="form-control" id="diagnosis_dropdown" multiple>
                                <option>--List of Conditions--</option>
                                <?php
                                foreach ($conditions as $condition) {
                                ?>
                                    <option><?php echo $condition->property_type ?></option>
                                <?php
                                };
                                ?>
                            </select>
                        </div>
                        <label>Investigation</label>
                        <div class="form-group">
                            <select name="investigation[]" style="width: 75%;" class="form-control" id="investigation_dropdown" multiple>
                                <option>--List of Tests--</option>

                                <?php
                                foreach ($procedures as $procedure) {
                                ?>
                                    <option><?php echo $procedure->property_type ?></option>
                                <?php
                                };
                                ?>

                            </select>
                        </div>
                        <label>Referral</label>
                        <div class="form-group">

                            <select name="referral[]" style="width: 75%;" class="form-control" id="referral_dropdown" multiple>
                                <option>--List of Referral--</option>
                                <option>Cardiologist</option>
                                <option>Nephrologist</option>
                                <option>Ophthalmologist</option>
                                <option>Footcare Specialist</option>
                            </select>
                        </div>
                        <label>Advise for Procedure</label>
                        <div class="form-group">
                            <input name="advise_for_procedure" type="text" style="width: 75%;" class="form-control form-control-sm" placeholder="" aria-controls="tableId">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label>Repeat visit date</label>
                                <div class="form-group  d-flex">
                                    <select name="repeat_visit" style="width: 60%;" col="3" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select day or month--</option>
                                        <option value="Day">Day</option>
                                        <option value="Month">Month</option>
                                    </select>
                                    <input name="repeat_visit_date" placeholder="enter date" type="number">
                                </div>
                            </div>
                        </div>
                        <label>Prescription</label>
                        <div class="form-check">
                            <input name="prescription[]" value="Dietary modification" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Dietary modification
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="prescription[]" value ="Lifestyle modification" class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Lifestyle modification
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="prescription[]" value="Blood sugar charting" class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Blood sugar charting
                            </label>
                        </div>

                        <button target="_blank" name="submit" type="submit" class="btn btn-primary mt-3">Submit</button>
                        </from>


                    </div>

            </div>
        </div>
        <!-- /Widget Item -->

    </div>
</div>
<!-- /Main Content -->
<?php
$id = $_SESSION['patient_id'];
$select_query = "SELECT * FROM visit_notes WHERE patient_id = $id";
$data = mysqli_fetch_assoc( mysqli_query($db_connect,$select_query));

?>



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
                                <td><strong>Blood Test Report</strong></td>
                                <?php
                               if(isset($data['blood_test_report'])){
                                ?>
                                <td><a href="../admin/reports/<?php echo $data['blood_test_report']?>" download> Download Blood Test Report </a></td>
                                <?php
                               };
                                ?>
                                
                            </tr>
                            <tr>
                                <td><strong>Report Name</strong></td>
                                <?php
                               if(isset($data['report_name'])){
                                ?>
                                <td><?php echo $data['report_name'] ?></td>
                                <?php
                               };
                                ?>
                                
                            </tr>
                            <tr>
                                <td><strong>Examination</strong></td>
                                <?php
                               if(isset($data['examination'])){
                                ?>
                                <td><?php echo $data['examination'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Health Parameters</strong> </td>

                            </tr>
                            <tr>
                                <td><strong>Blood Pressure</strong></td>
                                <?php
                               if(isset($data['blood_pressure'])){
                                ?>
                                <td><?php echo $data['blood_pressure'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Pulse</strong></td>
                                <?php
                               if(isset($data['blood_pulse'])){
                                ?>
                                <td><?php echo $data['blood_pulse'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>SPO2 </strong></td>
                                <?php
                               if(isset($data['spo2'])){
                                ?>
                                <td><?php echo $data['spo2'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Fasting Blood Sugar</strong></td>
                                <?php
                               if(isset($data['fasting_blood_sugar'])){
                                ?>
                                <td><?php echo $data['fasting_blood_sugar'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Random Blood Sugar</strong></td>
                                <?php
                               if(isset($data['random_blood_sugar'])){
                                ?>
                                <td><?php echo $data['random_blood_sugar'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> HbA1c </strong></td>
                                <?php
                               if(isset($data['hbaic'])){
                                ?>
                                <td><?php echo $data['hbaic'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Creatinine</strong></td>
                                <?php
                               if(isset($data['creatinine'])){
                                ?>
                                <td><?php echo $data['creatinine'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Urine MACR</strong></td>
                                <?php
                               if(isset($data['urine_macr'])){
                                ?>
                                <td><?php echo $data['urine_macr'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> BUN</strong></td>
                                <?php
                               if(isset($data['bun'])){
                                ?>
                                <td><?php echo $data['bun'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> vit_d3</strong></td>
                                <?php
                               if(isset($data['vit_d3'])){
                                ?>
                                <td><?php echo $data['vit_d3'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> vit_b12</strong></td>
                                <?php
                               if(isset($data['vit_b12'])){
                                ?>
                                <td><?php echo $data['vit_b12'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> uric_acid</strong></td>
                                <?php
                               if(isset($data['uric_acid'])){
                                ?>
                                <td><?php echo $data['uric_acid'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> sgot</strong></td>
                                <?php
                               if(isset($data['sgot'])){
                                ?>
                                <td><?php echo $data['sgot'] ?></td>
                                <?php
                               };
                                ?>>
                            </tr>
                            <tr>
                                <td><strong> sgpt</strong></td>
                                <?php
                               if(isset($data['sgpt'])){
                                ?>
                                <td><?php echo $data['sgpt'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>patient Conditions </strong></td>
                                <?php
                               if(isset($data['provisional_diagnosis'])){
                                ?>
                                <td><?php echo $data['provisional_diagnosis'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Investigation </strong></td>
                                <?php
                               if(isset($data['investigation'])){
                                ?>
                                <td><?php echo $data['investigation'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                            <tr>
                                <td><strong>Referral</strong></td>
                                <?php
                               if(isset($data['referral'])){
                                ?>
                                <td><?php echo $data['referral'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Advise for Procedure </strong></td>
                                <?php
                               if(isset($data['advise_for_procedure'])){
                                ?>
                                <td><?php echo $data['advise_for_procedure'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Prescription </strong></td>
                                <?php
                               if(isset($data['prescription'])){
                                ?>
                                <td><?php echo $data['prescription'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Repeat visit date</strong></td>
                                <?php
                               if(isset($data['repeat_visit'])){
                                ?>
                                <td><?php echo $data['repeat_visit_date']." ".$data['repeat_visit'] ?></td>
                                <?php
                               };
                                ?>
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