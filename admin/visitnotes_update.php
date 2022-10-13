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
$id = $_GET['id'];
$sql = "SELECT * FROM visit_notes WHERE id=$id";
$sql_run = mysqli_query($db_connect,$sql);
$result = mysqli_fetch_assoc($sql_run);

$_SESSION['id'] = $id;




?> 
<!-- Breadcrumb -->
<!-- Page Title -->
<div class="container-fluid mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title">Visit Notes Update</h3>
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
                <!-- <h3 class="widget-title">Visit Notes Update</h3> -->
                <form method="POST" action="visitNotesUpdate_post.php">

                    <input name="doc_id" value="<?php echo $_SESSION['doc_id'] ?>" type="hidden">
                
                    <input name="patient_id" value="<?php echo $_SESSION['patient_id'] ?>" type="hidden">
<!-- 
                    <div class="row">
                        <!-- <div class="col-6">
                            <div class="form-group mt-5">
                                <label for="exampleInputEmail1">Blood Test Report</label>
                                <input id="file" rows="3" type="file" value="<?php echo $result['blood_test_report'] ?>" name="blood_test_report" class="form-control ChangeEvntImage UploadEventImage tab5-required-check">

                            </div>
                        </div> -->
                        <!-- <div class="col-6">
                            <div class="form-group mt-5">
                                <label for="exampleInputEmail1">Report Name</label>
                                <input rows="3" type="text" value="<?php echo $result['report_name'] ?>" name="report_name" style="width:50%;" class="form-control" placeholder="Report Name">

                            </div>
                        </div>
                    </div> --> 

                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Examination</label>
                        <input value="<?php echo $result['examination'] ?>" name="examination" rows="3" type="text" style="width: 75%;" class="form-control" placeholder="Physical examination">

                    </div>
                    <div class="form-group">
                        <label>Health Parameters</label>
                        <div class="row">
                            <!-- <div class="d-flex"> -->
                                <div class="form-group col-md-3 col-sm-12">
                                <label for="blood_pressure" > BP </label>
                                <input value="<?php echo $result['blood_pressure'] ?>" name="blood_pressure" id="blood_pressure" type="text" rows="3" class="form-control" placeholder=" BP">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                <label for="blood_pulse"> Pulse </label>
                                    <input type="text" value="<?php echo $result['blood_pulse'] ?>" name="blood_pulse" rows="3" class="form-control" placeholder="Pulse ">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="spo2"> SPO2 </label>
                                    <input type="text" value="<?php echo $result['spo2'] ?>" name="spo2" rows="3" class="form-control" placeholder=" SPO2 ">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="fasting_blood_sugar"> Fasting Sugar</label>
                                    <input type="text" value="<?php echo $result['fasting_blood_sugar'] ?>" name="fasting_blood_sugar" rows="3" class="form-control" placeholder=" Fasting Blood Sugar">
                                </div>
                            <!-- </div> -->
                         
              
                            <!-- <div class="d-flex"> -->
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="random_blood_sugar"> Random Sugar </label>
                                    <input type="text" value="<?php echo $result['random_blood_sugar'] ?>" name="random_blood_sugar" rows="3" class="form-control" placeholder=" Random Blood Sugar">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                   <label for="hbaic"> HbA1c </label>
                                    <input type="text"value="<?php echo $result['hbaic'] ?>" name="hbaic" rows="3" class="form-control" placeholder=" HbA1c">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="creatinine"> Creatinine </label>
                                    <input type="text" value="<?php echo $result['creatinine'] ?>" name="creatinine" rows="3" class="form-control" placeholder=" Creatinine">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="urine_macr"> Urine MACR</label>
                                    <input type="text" value="<?php echo $result['urine_macr'] ?>" name="urine_macr" rows="3" class="form-control" placeholder=" Urine MACR">
                                </div>
                            <!-- </div> -->
                        


                            <!-- <div class="d-flex"> -->

                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="bun"> BUN </label>
                                    <input type="text" value="<?php echo $result['bun'] ?>" name="bun" rows="3" class="form-control" placeholder=" BUN">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="vit_d3"> Vit D3 </label>
                                    <input type="text" value="<?php echo $result['vit_d3'] ?>" name="vit_d3" rows="3" class="form-control" placeholder=" Vit D3">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="vit_b12"> Vit B12 </label>
                                    <input type="text" value="<?php echo $result['vit_b12'] ?>" name="vit_b12" rows="3" class="form-control" placeholder="  Vit B12">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="uric_acid"> Uric acid </label>
                                    <input type="text" value="<?php echo $result['uric_acid'] ?>" name="uric_acid" rows="3" class="form-control" placeholder=" Uric acid">
                                </div>
                            <!-- </div> -->
                 
                       
                            <!-- <div class="col-md-4 d-flex"> -->
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="sgot"> SGOT </label>
                                    <input name="sgot" value="<?php echo $result['sgot'] ?>" type="text" rows="3" class="form-control" placeholder="SGOT">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="sgpt"> SGPT </label>
                                    <input type="text" value="<?php echo $result['sgpt'] ?>" name="sgpt" rows="3" class="form-control" placeholder="SGPT">
                                </div>
                            <!-- </div> -->
                        </div>
                        <div class="form-group ">
                            <label>Family History</label>

                        <div class="row">
                            <div class="form-group col-md-3 col-sm-12">

                                <select name="father_Condition" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Father Condition--</option>
                                    <option value="Type 2 Diabetes"<?php echo ($result['father_condition'] == "Type 2 Diabetes" )? 'selected':'' ?> > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes" <?php echo ($result['father_condition'] ==  "Type 1 Diabetes")? 'selected':'' ?> > Type 1 Diabetes</option>
                                    <option value="High Blood pressure" <?php echo ($result['father_condition'] ==  "High Blood pressure")? 'selected':'' ?> >High Blood pressure</option>
                                    <option value="Eye issue" <?php echo ($result['father_condition'] == "Eye issue")? 'selected':'' ?> > Eye issue</option>
                                    <option value="Kidney disease" <?php echo ($result['father_condition'] =="Kidney disease")? 'selected':'' ?> >Kidney disease</option>
                                    <option value="Cholesterol issue" <?php echo ($result['father_condition'] =="Cholesterol issue")? 'selected':'' ?> >Cholesterol issue</option>
                                </select>

                            </div>   
                            <div class="form-group col-md-3 col-sm-12">
                                <select  name="mother_Condition"  class="form-control" id="exampleFormControlSelect1">
                                    <option>--Mother Condition--</option>
                                    <option value="Type 2 Diabetes"<?php echo ($result['mother_condition'] == "Type 2 Diabetes" )? 'selected':'' ?> > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes" <?php echo ($result['mother_condition'] ==  "Type 1 Diabetes")? 'selected':'' ?> > Type 1 Diabetes</option>
                                    <option value="High Blood pressure" <?php echo ($result['mother_condition'] ==  "High Blood pressure")? 'selected':'' ?> >High Blood pressure</option>
                                    <option value="Eye issue" <?php echo ($result['mother_condition'] == "Eye issue")? 'selected':'' ?> > Eye issue</option>
                                    <option value="Kidney disease" <?php echo ($result['mother_condition'] =="Kidney disease")? 'selected':'' ?> >Kidney disease</option>
                                    <option value="Cholesterol issue" <?php echo ($result['mother_condition'] =="Cholesterol issue")? 'selected':'' ?> >Cholesterol issue</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-12"> 
                                <select name="sister_Condition"  class="form-control" id="exampleFormControlSelect1">
                                    <option>--Sister Condition--</option>
                                    <option value="Type 2 Diabetes"<?php echo ($result['sister_condition'] == "Type 2 Diabetes" )? 'selected':'' ?> > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes" <?php echo ($result['sister_condition'] ==  "Type 1 Diabetes")? 'selected':'' ?> > Type 1 Diabetes</option>
                                    <option value="High Blood pressure" <?php echo ($result['sister_condition'] ==  "High Blood pressure")? 'selected':'' ?> >High Blood pressure</option>
                                    <option value="Eye issue" <?php echo ($result['sister_condition'] == "Eye issue")? 'selected':'' ?> > Eye issue</option>
                                    <option value="Kidney disease" <?php echo ($result['sister_condition'] =="Kidney disease")? 'selected':'' ?> >Kidney disease</option>
                                    <option value="Cholesterol issue" <?php echo ($result['sister_condition'] =="Cholesterol issue")? 'selected':'' ?> >Cholesterol issue</option>
                                </select>

                            </div>
                            
                            <div class="form-group col-md-3 col-sm-12"> 
                                <select name="brother_Condition" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Brother Condition--</option>
                                    <option value="Type 2 Diabetes"<?php echo ($result['brother_condition'] == "Type 2 Diabetes" )? 'selected':'' ?> > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes" <?php echo ($result['brother_condition'] ==  "Type 1 Diabetes")? 'selected':'' ?> > Type 1 Diabetes</option>
                                    <option value="High Blood pressure" <?php echo ($result['brother_condition'] ==  "High Blood pressure")? 'selected':'' ?> >High Blood pressure</option>
                                    <option value="Eye issue" <?php echo ($result['brother_condition'] == "Eye issue")? 'selected':'' ?> > Eye issue</option>
                                    <option value="Kidney disease" <?php echo ($result['brother_condition'] =="Kidney disease")? 'selected':'' ?> >Kidney disease</option>
                                    <option value="Cholesterol issue" <?php echo ($result['brother_condition'] =="Cholesterol issue")? 'selected':'' ?> >Cholesterol issue</option>
                                </select>


                            </div>

                         
                        </div>

                        <label>Provisional diagnosis</label>

                        <div class="form-group">
                            <select name="provisional_diagnosis[]" style="width: 75%;" class="form-control" id="diagnosis_dropdown" multiple>
                                <option>--List of Conditions--</option>
                                <?php
                                foreach ($conditions as $condition) {
                                ?>
                                    <option value="<?php echo $condition->property_type ?>" <?php echo ($result['provisional_diagnosis'] == ($condition->property_type))? 'selected':'' ?>  ><?php echo $condition->property_type ?></option>
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
                                    <option value="<?php echo $procedure->property_type ?>"<?php echo ($result['investigation'] == ($procedure->property_type))? 'selected':'' ?>  ><?php echo $procedure->property_type ?></option>
                                <?php
                                };
                                ?>

                            </select>
                        </div>
                        <label>Referral</label>
                        <div class="form-group">

                            <select name="referral[]" style="width: 75%;" class="form-control" id="referral_dropdown" multiple>
                                <option>--List of Referral--</option>
                                <option value="Cardiologist"<?php echo ($result['referral'] == "Cardiologist")? 'selected': '' ?> >Cardiologist</option>
                                <option value="Nephrologist"<?php echo ($result['referral'] == "Nephrologist")? 'selected': '' ?>>Nephrologist</option>
                                <option value="Ophthalmologist"<?php echo ($result['referral'] == "Ophthalmologist")? 'selected': '' ?>>Ophthalmologist</option>
                                <option value="Footcare Specialist"<?php echo ($result['referral'] == "Footcare Specialist")? 'selected': '' ?> >Footcare Specialist</option>
                            </select>
                        </div>
                        <label>Advise for Procedure</label>
                        <div class="form-group">
                            <input value="<?php echo $result['advise_for_procedure'] ?>" name="advise_for_procedure" type="text" style="width: 75%;" class="form-control form-control-sm" placeholder="" aria-controls="tableId">
                        </div>


                        <label>Repeat visit date</label>
                        <div class="row">
                            
                            <div class="form-group col-md-4 col-sm-12">
                                    <select name="repeat_visit" style="width: 60%;" col="3" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select day or month--</option>
                                        <option value="Day" <?php echo (isset($result['repeat_visit']) == "Day") ? 'selected':'' ?> >Day</option>
                                        <option value="Month"<?php echo (isset($result['repeat_visit']) == "Month") ? 'selected': ''?> >Month</option>
                                    </select>
                                   
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                  <input value="<?php echo $result['repeat_visit_date'] ?>" name="repeat_visit_date" placeholder="enter date" type="number">
                                </div>
                                                                                                                              
                        </div>
                        <label>Prescription</label>
                        <div class="form-check">
                            <input name="prescription[]" value="Dietary modification" <?php echo (($result['prescription'])=="Dietary modification") ? 'checked' : '' ?> class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Dietary modification
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="prescription[]" value ="Lifestyle modification" <?php echo (($result['prescription'])=="Lifestyle modification") ? 'checked' : '' ?> class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Lifestyle modification
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="prescription[]" value="Blood sugar charting" <?php echo (($result['prescription'])=="Blood sugar charting") ? 'checked' : '' ?> class="form-check-input"  type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Blood sugar charting
                            </label>
                        </div>

                        <button target="_blank" name="submit" type="submit" class="btn_color mt-3">Update</button>
                        </from>


                    </div>

            </div>
        </div>
        <!-- /Widget Item -->

    </div>
</div>
<!-- /Main Content -->
<?php
require_once "inc/footer.php"
?>