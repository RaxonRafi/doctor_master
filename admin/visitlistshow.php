 <?php
 require_once "inc/header.php";
 require_once "db/db.php";


$id = $_GET['id'];
$select_query = "SELECT * FROM visit_notes WHERE id = $id";
$data = mysqli_fetch_assoc( mysqli_query($db_connect,$select_query));
// $sql = "SELECT * FROM reports WHERE patient_id = $id";
// $result =  mysqli_query($db_connect,$sql);
?>
<div class="container-fluid">
    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Visit Notes</h3>

               
                <a type="button"class="btn_color mr-2 float-right" href="visitnotes_update.php?id=<?php echo $id ?>"> <span class="ti-pencil-alt"></span> Edit</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>

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
                            <td><strong>sister Condition</strong></td>
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
 
 $id = $_SESSION['patient_id'];
 $select_query = "SELECT * FROM medicines WHERE patient_id=$id";
 $query_run = mysqli_query($db_connect, $select_query);
 $result =$query_run;

?>
<div class="container-fluid">
    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">


        <div class="widget-area-2 proclinic-box-shadow">
                            <h3 class="widget-title mb-2">List of Medicines</h3>
                            <div class="table-div">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">sl no.</th>
                                                <th scope="col">Medicine Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Time of the day</th>
                                                <th scope="col">Continue till</th>
                                      

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $serial = 1;
                                            foreach ($result as $data) {
 
                                            ?> 
                                                <tr>
                                                    <td><?php echo $serial++ ?></td>
                                                    <td><?php echo $data['medicine_name'] ?></td>
                                                    <td><?php echo $data['quantity'] ?></td>
                                                    <td><?php echo $data['time_of_the_day'] ?></td>
                                                    <td><?php echo $data['continue_till_date']." ".$data['continue_till'] ?></td>
                                        
                                                </tr>
                                            <?php
                                            }
                                            ?> 

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


            </div>
            </div>
            </div>


         