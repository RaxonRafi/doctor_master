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
            <a class="btn_color" href="medicines.php?id=<?php echo $_SESSION['patient_id']?>" type="button" >Go to Medicines</a>
                <!-- <h3 class="widget-title">Visit Notes</h3> -->
                <form action="report_post.php" method="post" enctype="multipart/form-data" >
                <input name="doc_id" value="<?php echo $_SESSION['doc_id'] ?>" type="hidden">
                
                <input name="patient_id" value="<?php echo $_SESSION['patient_id'] ?>" type="hidden">

               

                <div class="row">
                    <div class="form-group mt-5 col-md-5 blood_test_report">
                        <!-- <div class="form-group mt-5"> -->
                            <label for="exampleInputEmail1">Blood Test Report</label>
                            <input type="file" name="blood_test_report[]" multiple class="form-control">

                        <!-- </div> -->

                    </div>
                    <div class="form-group col-md-5 mt-5 report_name">
                        <!-- <div class="form-group mt-5"> -->
                            <label for="exampleInputEmail1">Report Name</label>
                            <input rows="3" type="text" name="report_name" class="form-control" placeholder="Report Name">

                        <!-- </div> -->
                    </div>
                    <div class="form-group float-left col-md-2 submit-btn"style="margin-top:82px ;">
                        <!-- <div class="form-group float-left "style="margin-top:82px ;" > -->
                           <button target="_blank" name="submit" type="submit" class="btn_color mt-10">Submit</button>

                        <!-- </div> -->

                 

                    </div>

                    <?php


                        $id = $_SESSION['patient_id'];
                  
                        $select_query = "SELECT * FROM visit_notes WHERE patient_id = $id ORDER BY id DESC LIMIT 1";
                        $data = mysqli_fetch_assoc( mysqli_query($db_connect,$select_query));
                        $sql = "SELECT * FROM reports WHERE patient_id = $id";
                        $result =  mysqli_query($db_connect,$sql);
                        

                        ?>

                    <div class="col-md-8">
                    <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Sl NO.</th>
                                        <th scope="col">Report Name</th>
                                        <th scope="col">Reports</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                $serial = 1;
                                while($report = mysqli_fetch_assoc($result)){
                                  

                                ?>
                                    <tr >
                                      <td scope="row"><?php echo $serial++ ?></td>
                                        <td scope="row"><?php echo $report['report_name'] ?></td>
                                        <td><?php echo $report['report'] ?></td>
                                        <td>
                                            <a type="button" download class="btn btn-info"  href="../admin/reports/<?php echo $report['report']?>"><span class="ti-download"></span></a>
                                            <a type="button" class="btn btn-danger"  href="delete_report.php?id=<?php echo $report['id'] ?>&report_name=<?php echo $report['report']?>">✕</a>

                                        </td>

                                   
                                    </tr>
                                    <?php

                                    };
                                    ?>
                          
                                </tbody>
                            </table>
                        </div>
                    </div>
                    


                   
                  
                     
       
                </div>
               
                </form>
                <form method="POST" enctype="multipart/form-data" action="visitNotes_post.php">

                    <input name="doc_id" value="<?php echo $_SESSION['doc_id'] ?>" type="hidden">
                
                    <input name="patient_id" value="<?php echo $_SESSION['patient_id'] ?>" type="hidden">

                    <input name="patient_name" type="hidden" value="<?php echo $_SESSION['patient_name'] ?>">

 

                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1">Examination</label>
                        <textarea name="examination" rows="3" type="text" style="width: 75%;" class="form-control" placeholder="Physical examination"></textarea>

                    </div>
                    <div class="form-group">
                        <label>Health Parameters</label>
                          <!-- <div class="row"> -->
                            <div class="row">
                                <div class="form-group col-md-3 col-sm-12">
                                <label for="blood_pressure" > BP </label>
                                <input name="blood_pressure" id="blood_pressure" type="text" rows="3" class="form-control" placeholder=" BP">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                <label for="blood_pulse"> Pulse </label>
                                    <input type="text" name="blood_pulse" rows="3" class="form-control" placeholder="Pulse ">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="spo2"> SPO2 </label>
                                    <input type="text" name="spo2" rows="3" class="form-control" placeholder=" SPO2 ">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="fasting_blood_sugar">  Fasting Sugar</label>
                                    <input type="text" name="fasting_blood_sugar" rows="3" class="form-control" placeholder=" Fasting Blood Sugar">
                                </div>
                                                                       
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="random_blood_sugar"> Random Sugar</label>
                                    <input type="text" name="random_blood_sugar" rows="3" class="form-control" placeholder=" Random Blood Sugar">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                   <label for="hbaic"> HbA1c </label>
                                    <input type="text" name="hbaic" rows="3" class="form-control" placeholder=" HbA1c">
                                </div>
                                <div class="form-group  col-md-3 col-sm-12">
                                    <label for="creatinine"> Creatinine </label>
                                    <input type="text" name="creatinine" rows="3" class="form-control" placeholder=" Creatinine">
                                </div>
                                <div class="form-group  col-md-3 col-sm-12">
                                    <label for="urine_macr"> Urine MACR</label>
                                    <input type="text" name="urine_macr" rows="3" class="form-control" placeholder=" Urine MACR">
                                </div>

                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="bun"> BUN </label>
                                    <input type="text" name="bun" rows="3" class="form-control" placeholder=" BUN">
                                </div>
                                <div class="form-group  col-md-3 col-sm-12">
                                    <label for="vit_d3"> Vit D3 </label>
                                    <input type="text" name="vit_d3" rows="3" class="form-control" placeholder=" Vit D3">
                                </div>
                                <div class="form-group  col-md-3 col-sm-12">
                                    <label for="vit_b12"> Vit B12 </label>
                                    <input type="text" name="vit_b12" rows="3" class="form-control" placeholder="  Vit B12">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="uric_acid"> Uric acid </label>
                                    <input type="text" name="uric_acid" rows="3" class="form-control" placeholder=" Uric acid">
                                </div>                       
                    
                                <div class="form-group  col-md-3 col-sm-12">
                                    <label for="sgot"> SGOT </label>
                                    <input name="sgot" type="text" rows="3" class="form-control" placeholder="SGOT">
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="sgpt"> SGPT </label>
                                    <input type="text" name="sgpt" rows="3" class="form-control" placeholder="SGPT">
                                </div>
                      
                        </div>
                        <div class="form-group">
                            <label>Family History</label>
                            <div class="row">
                            <div class="form-group col-md-3 col-sm-12">

                                <select name="father_Condition" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Father Condition--</option>
                                    <option value="Type 2 Diabetes" > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes"> Type 1 Diabetes</option>
                                    <option value="High Blood pressure">High Blood pressure</option>
                                    <option value="Eye issue"> Eye issue</option>
                                    <option value="Kidney disease">Kidney disease</option>
                                    <option value="Cholesterol issue">Cholesterol issue</option>
                                </select>

                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                <select  name="mother_Condition"  class="form-control" id="exampleFormControlSelect1">
                                    <option>--Mother Condition--</option>
                                    <option value="Type 2 Diabetes" > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes"> Type 1 Diabetes</option>
                                    <option value="High Blood pressure">High Blood pressure</option>
                                    <option value="Eye issue"> Eye issue</option>
                                    <option value="Kidney disease">Kidney disease</option>
                                    <option value="Cholesterol issue">Cholesterol issue</option>
                                </select>

                                </div>

                                <div class="form-group col-md-3 col-sm-12">

                                <select name="sister_Condition"  class="form-control" id="exampleFormControlSelect1">
                                    <option>--Sister Condition--</option>
                                    <option value="Type 2 Diabetes" > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes"> Type 1 Diabetes</option>
                                    <option value="High Blood pressure">High Blood pressure</option>
                                    <option value="Eye issue"> Eye issue</option>
                                    <option value="Kidney disease">Kidney disease</option>
                                    <option value="Cholesterol issue">Cholesterol issue</option>
                                </select>
                                </div>

                                <div class="form-group col-md-3 col-sm-12">

                                <select name="brother_Condition" class="form-control" id="exampleFormControlSelect1">
                                    <option>--Brother Condition--</option>
                                    <option value="Type 2 Diabetes" > Type 2 Diabetes</option>
                                    <option value="Type 1 Diabetes"> Type 1 Diabetes</option>
                                    <option value="High Blood pressure">High Blood pressure</option>
                                    <option value="Eye issue"> Eye issue</option>
                                    <option value="Kidney disease">Kidney disease</option>
                                    <option value="Cholesterol issue">Cholesterol issue</option>
                                </select>
                                </div>

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

                        <label>Repeat visit date</label>
                        <div class="row">
                            <!-- <div class="col-12"> -->
                     
                                <div class="form-group col-md-4 col-sm-12">
                                    <select name="repeat_visit" style="width: 60%;" col="3" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select day or month--</option>
                                        <option value="Day">Day</option>
                                        <option value="Month">Month</option>
                                    </select>
                                   
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                <input name="repeat_visit_date" placeholder="enter date" type="number">
                                </div>
                            <!-- </div> -->
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

                        <button target="_blank" name="submit" type="submit" class="btn_color mt-3">Submit</button>
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

               
                <a type="button"class="btn_color mr-2 float-right" href="visitnotes_update.php?id=<?php echo $data['id'] ?>"> <span class="ti-pencil-alt" ></span> Edit</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <!-- <tr>
                                <td><strong>Blood Test Report</strong></td>

                               <td>
                               <?php
                               //if(isset($result['blood_test_report'])){
                              //while($reports = mysqli_fetch_assoc($result ) ){
                        
                                ?>
                                 <a type="button" class="btn btn-info" href="../admin/reports/<?php echo $reports['blood_test_report']?>" download><span class="ti-download mr-1"></span>Download <a class="ml-2" href="delete_report.php?id=<?php echo $reports['id'] ?>&report_name=<?php echo $reports['blood_test_report']?>" type="button">✕</a></a><br>

                                
                                 <?php
                                //};
                     
                                ?>
                              </td>
                              
                                                
                           
                                
                            </tr> -->
                            <!-- <tr>
                                <td><strong>Report Name</strong></td>
                                <?php
                               if(isset($data['report_name'])){
                                ?>
                                <td><?php echo $data['report_name'] ?></td>
                                <?php
                               };
                                ?>
                                
                            </tr> -->
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
                            <!-- <tr>
                                <td><strong>Health Parameters</strong> </td>

                            </tr> -->
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
                                <td><?php echo $data['spo2'].""."%" ?></td>
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
                                <td><strong> Vitamin D3</strong></td>
                                <?php
                               if(isset($data['vit_d3'])){
                                ?>
                                <td><?php echo $data['vit_d3'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Vitamin B12</strong></td>
                                <?php
                               if(isset($data['vit_b12'])){
                                ?>
                                <td><?php echo $data['vit_b12'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> Uric Acid</strong></td>
                                <?php
                               if(isset($data['uric_acid'])){
                                ?>
                                <td><?php echo $data['uric_acid'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong> SGOT</strong></td>
                                <?php
                               if(isset($data['sgot'])){
                                ?>
                                <td><?php echo $data['sgot'] ?></td>
                                <?php
                               };
                                ?>>
                            </tr>
                            <tr>
                                <td><strong> SGPT</strong></td>
                                <?php
                               if(isset($data['sgpt'])){
                                ?>
                                <td><?php echo $data['sgpt'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Father Condition</strong></td>
                                <?php
                               if(isset($data['father_condition'])){
                                ?>
                                <td><?php echo $data['father_condition'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                            <td><strong>Mother Condition </strong></td>
                                <?php
                               if(isset($data['mother_condition'])){
                                ?>
                                <td><?php echo $data['mother_condition'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                            <td><strong>Sister Condition</strong></td>
                                <?php
                               if(isset($data['sister_condition'])){
                                ?>
                                <td><?php echo $data['sister_condition'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                               <td><strong>Brother Condition</strong></td>
                                <?php
                               if(isset($data['brother_condition'])){
                                ?>
                                <td><?php echo $data['brother_condition'] ?></td>
                                <?php
                               };
                                ?>
                            </tr>
                            <tr>
                                <td><strong>Patient Condition </strong></td>
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