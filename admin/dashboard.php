<?php
$dashboard = true;
require_once "inc/header.php";

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}


$arr['doctorprofile_id'] = 1;
$arr['password'] = "12345w";
$arr['page'] = $page;
$url = "https://devapi.oxyjon.com/api/doctors/patientlist";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result_after_decode = json_decode($result);
$data = $result_after_decode->patients->data;
$pagi_1 = $result_after_decode->patients->current_page;
$pagi_from = $result_after_decode->patients->from;
$pagi_last = $result_after_decode->patients->last_page;

$pagi_next = "dashboard.php?page=" . $page + 1;
$pagi_prev = "dashboard.php?page=" . $page - 1;

$pagi_path = $result_after_decode->patients->path;
$data_encode = json_encode($data);
$data_decode = json_decode($data_encode);

?>

<div class="container-fluid mt-0">
    <div class="row breadcrumb-bar">
        <div class="col-md-6">
            <h3 class="block-title">Quick Statistics</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="dashboard.php">
                        <span class="ti-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<!-- Main Content -->
<div class="container-fluid home">
    <div class="row revenue">
        <!-- Widget Item -->
        <div class="col-md-4">
            <div class="widget-area proclinic-box-shadow color-red">
                <div class="widget-left">
                    <span class="ti-user"></span>
                </div>
                <div class="widget-right">
                    <h4 class="wiget-title">Patients</h4>
                    <span class="numeric color-red">348</span>
                    <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +20% Increased</p>
                </div>
            </div>
        </div>
        <!-- /Widget Item -->
        <!-- Widget Item -->
        <div class="col-md-4">
            <div class="widget-area proclinic-box-shadow color-green">
                <div class="widget-left">
                    <span class="ti-bar-chart"></span>
                </div>
                <div class="widget-right">
                    <h4 class="wiget-title">Appointments</h4>
                    <span class="numeric color-green">1585</span>
                    <p class="inc-dec mb-0"><span class="ti-angle-down"></span> -15% Decreased</p>
                </div>
            </div>
        </div>
        <!-- /Widget Item -->
        <!-- Widget Item -->
        <div class="col-md-4">
            <div class="widget-area proclinic-box-shadow color-yellow">
                <div class="widget-left">
                    <span class="ti-money"></span>
                </div>
                <div class="widget-right">
                    <h4 class="wiget-title">Total Revenue</h4>
                    <span class="numeric color-yellow">$7300</span>
                    <p class="inc-dec mb-0"><span class="ti-angle-up"></span> +10% Increased</p>
                </div>
            </div>
        </div>
        <!-- /Widget Item -->
    </div>

    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Patients List</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ProfileId</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Birth date</th>
                                <th>Location</th>
                                <th>Repeat Visit Date</th>
                                <th>Last Visit date</th>                              
                                <th>Condition</th>
                                <th>Alerts</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                            <?php

                            foreach ($data_decode  as $single_data) {



                            ?>

                                <tr>
                                    <?php
                                    if ($single_data->profileId) {
                                    ?>
                                        <td><?php echo $single_data->profileId ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->name) {
                                    ?>
                                        <td><?php echo $single_data->name ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->mobile) {
                                    ?>
                                        <td><?php echo $single_data->mobile ?></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->gender) {
                                    ?>
                                        <td><?php echo $single_data->gender ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->birth_date) {
                                    ?>
                                        <td><?php echo $single_data->birth_date ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->location) {
                                    ?>
                                        <td><?php echo $single_data->location ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <!-- <?php
                                    if ($single_data->diabetesType) {
                                    ?>
                                        <td><?php echo $single_data->diabetesType ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?> -->
                                    <?php
                                    if ($single_data->height_ft) {
                                    ?>
                                        <td><?php echo $single_data->height_ft ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->height_inches) {
                                    ?>
                                        <td><?php echo $single_data->height_inches ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($single_data->weight) {
                                    ?>
                                        <td><?php echo $single_data->weight ?></td>
                                    <?php
                                    } else {


                                    ?>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                    <td></td>
                                    <td>
                                        <a type="button" class="btn btn-info" href="patient_details.php?id=<?php echo $single_data->profileId?>&name=<?php echo $single_data->name?>">View details</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

                <?php

                if ($page) {

                ?>
                    <!-- Pagination Set -->

                    <div class="proclinic-widget">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo $pagi_prev ?>">Previous</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href=""><?php echo $pagi_1 ?></a>
                                </li>
                                <!-- <li class="page-item">
                                    <a class="page-link" href="/a>
                                </li> -->
                                <!-- <?php
                                if ($_GET['page'] < 445) {
                                ?> -->
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo $pagi_next ?>">Next</a>
                                    </li>
                                <!-- <?php
                                }
                                ?> -->

                            </ul>
                        </nav>
                    </div>
                    <!-- /Pagination Set -->
                <?php
                }
                ?>

            </div>
        </div>
        <!-- /Widget Item -->
    </div>



</div>
<!-- /Main Content -->
<?php
require_once "inc/footer.php"
?>