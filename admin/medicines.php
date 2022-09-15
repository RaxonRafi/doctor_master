<?php

$medicine = true;
require_once "inc/header.php";
require_once "db/db.php";
$doc_id = $_SESSION['doc_id'];
?>
<!-- Page Title -->
<div class="container-fluid mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title">Medicines</h3>
        </div>
        <!-- <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item">Patients</li>
                <li class="breadcrumb-item active">Patient Details</li>
            </ol>
        </div> -->
    </div>
</div>
<div class="container-fluid">

    <div class="row">
    
        <!-- Widget Item -->
        <div class="col-md-12">
       
            <div class="widget-area-2 proclinic-box-shadow">
            <a class="btn btn-success" href="visit_notes.php?id=<?php echo $_SESSION['patient_id']?>" type="button" >Go to Visit Notes</a>
               <!-- // <h3 class="widget-title">Add Medicines</h3> -->


                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <form action="medicine_post.php" method="POST">
                            <input name="doc_id" value="<?php echo $doc_id ?>" type="hidden">
                            <div class="form-group mt-5">
                                <label>Medicines</label>
                                <div class="form-group">
                                    <!-- //<label for="phone">medicine name</label> -->
                                    <input type="search" name="medicine_name" placeholder="Enter Your medicine" class="form-control" id="searchmedicine">
                                    <input name="patient_id" value="<?php echo $_SESSION['patient_id'] ?>" type="hidden">
                                </div>
                                <span id="result2"></span>

                                <div class="form-group">
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter quantity of Medicine"></input>
                                </div>
                                <label>Time of the day</label>
                                <div class="form-group  d-flex">
                                    <select name="time_day[]" style="width:100%;" class="form-control" id="time_dropdown" multiple>
                                        <option>--Select one--</option>
                                        <option>Empty stomach</option>
                                        <option>Before breakfast</option>
                                        <option>After breakfast</option>
                                        <option>Before lunch </option>
                                        <option>After lunch </option>
                                        <option>Before dinner </option>
                                        <option>After dinner </option>
                                        <option>Bed time</option>
                                    </select>

                                </div>
                                <label>Continue till</label>
                                <div class="form-group d-flex">

                                    <select name="continue_till" col="3" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select day or month--</option>
                                        <option value="day">Day</option>
                                        <option value="month">Month</option>
                                    </select>
                                    <input name="date" placeholder="enter date" type="number">
                                </div>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- Responsive Table-->

                        <?php
                        $id =$_SESSION['patient_id'];
                        $select_query = "SELECT * FROM medicines WHERE patient_id=$id";
                        $query_run = mysqli_query($db_connect, $select_query);
                        $result =$query_run;
                         
                        ?>

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
                                                <th scope="col">Action</th>

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
                                                    <td><a href="delete_medi.php?id=<?php echo $data['id'] ?>">x</a></td>

                                                </tr>
                                            <?php
                                            }
                                            ?> 

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- /Responsive Table-->
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- /Widget Item -->

</div>
</div>
<div class="container-fluid">




</div>
</div>
<?php
require_once "inc/footer.php";
?>