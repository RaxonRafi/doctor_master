<?php
$medicine = true;
require_once "inc/header.php";
// $arr['medicine_name'] = $_GET['medicine_name'];
// $url = "https://devapi.oxyjon.com/api/doctors/searchmedicine";
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);
// $result_after_decode = json_decode($result);
// $data = $result_after_decode->data;
// $data_encode = json_encode($data);
// $data_decode  = json_decode($data_encode);
// print_r($result_after_decode);
?>
<div class="container-fluid">

    <div class="row">

        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Add Medicines</h3>


                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <form action="" method="post">
                            <div class="form-group mt-5">
                                <label>Medicines</label>
                                <div class="form-group">    
                                        <!-- //<label for="phone">medicine name</label> -->
                                        <input type="search" name="medicine_name" placeholder="Enter Your medicine" class="form-control" id="searchmedicine">
                                    </div>
                                    <span id="result2"></span>
                                    <!-- <select name="medicine_name[]" style="width:100%;" class="form-control" id="medicine_dropdown" multiple>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                    </select> -->
                           
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter quantity of Medicine"></input>
                                </div>
                                <label>Time of the day</label>
                                <div class="form-group  d-flex">
                                    <select style="width:100%;" class="form-control" id="time_dropdown" multiple>
                                        <option>--Select one--</option>
                                        <option>Empty stomach</option>
                                        <option>Before lunch </option>
                                        <option>After lunch </option>
                                        <option>Before breakfast</option>
                                        <option>After breakfast</option>
                                        <option>Before dinner </option>
                                        <option>After dinner </option>
                                        <option>Bed time</option>
                                    </select>

                                </div>
                                <label>Continue till</label>
                                <div class="form-group d-flex">

                                    <select col="3" class="form-control" id="exampleFormControlSelect1">
                                        <option>--Select day or month--</option>
                                        <option>Day</option>
                                        <option>Month</option>
                                    </select>
                                    <input placeholder="enter date" type="number">
                                </div>



                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- Responsive Table-->

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
                                            <tr>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>

                                            </tr>
                                            <tr>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>

                                            </tr>
                                            <tr>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>

                                            </tr>
                                            <tr>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>
                                                <td>Cell</td>

                                            </tr>
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