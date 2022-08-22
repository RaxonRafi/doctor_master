<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProClinic-Bootstrap4 Hospital Admin</title>
    <!-- Fav  Icon Link -->
    <link rel="shortcut icon" type="image/png" href="images/fav.png">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- themify icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Animations CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/green.css" id="style_theme">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- morris charts -->
    <link rel="stylesheet" href="charts/css/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="css/jquery-jvectormap.css">
    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="js/modernizr.min.js"></script>
</head>

<body>
    <!-- Pre Loader -->
    <!-- <div class="loading">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div> -->
    <!--/Pre Loader -->

    <div class="container-fluid wrapper">
        <!-- Page Content -->
        <div class="container-fluid" id="content">
            <!-- Top Navigation -->
            <div class="container-fluid top-brand">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <div class="sidebar-header"> <a href="dashboard.php"><img src="images/logo.png" class="logo" alt="logo"></a>
                        </div>
                    </div>
                    <ul class="nav justify-content-end">
                        <!-- <li class="nav-item">
                            <a class="nav-link">
                                <span title="Fullscreen" class="ti-fullscreen fullscreen"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target=".proclinic-modal-lg">
                                <span class="ti-search"></span>
                            </a>
                            <div class="modal fade proclinic-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lorvens">
                                    <div class="modal-content proclinic-box-shadow2">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Search Patient/Doctor:</h5>
                                            <span class="ti-close" data-dismiss="modal" aria-label="Close">
                                            </span>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="search-term" placeholder="Type text here">
                                                    <button type="button" class="btn btn-lorvens proclinic-bg">
                                                        <span class="ti-location-arrow"></span> Search</button>
                                                </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                <span class="ti-announcement"></span>
                            </a>
                            <div class="dropdown-menu proclinic-box-shadow2 notifications animated flipInY">
                                <h5>Notifications</h5>
                                <a class="dropdown-item" href="#">
                                    <span class="ti-wheelchair"></span> New Patient Added</a>
                                <a class="dropdown-item" href="#">
                                    <span class="ti-money"></span> Patient payment done</a>
                                <a class="dropdown-item" href="#">
                                    <span class="ti-time"></span>Patient Appointment booked</a>
                                <a class="dropdown-item" href="#">
                                    <span class="ti-wheelchair"></span> New Patient Added</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="ti-user"></span>
                            </a>
                            <div class="dropdown-menu proclinic-box-shadow2 profile animated flipInY">
                                <h5><?php echo $_SESSION['username'] ?></h5>
                                <a class="dropdown-item" href="#">
                                    <span class="ti-settings"></span> Settings</a>
                                <a class="dropdown-item" href="#">
                                    <span class="ti-help-alt"></span> Help</a>
                                <a class="dropdown-item" href="logout.php">
                                    <span class="ti-power-off"></span> Logout</a>
                            </div>
                        </li>
                    </ul>

                </nav>
            </div>
            <!-- /Top Navigation -->
            <!-- Menu -->
            <div class="container-fluid menu-nav">
                <nav class="navbar navbar-expand-lg proclinic-bg text-white">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ti-menu text-white"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown <?= (isset($dashboard)) ? 'active' : '' ?> ">
                                <a class="nav-link dropdown-toggle" href="dashboard.php" role="button" aria-haspopup="true" aria-expanded="false"><span class="ti-home"></span> Dashboard</a>
                            </li>
                            <li class="nav-item dropdown  <?= (isset($patient_details)) ? 'active' : '' ?> ">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="ti-wheelchair"></span> Patients</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="addpatient.php">Add Patient</a>
                                    <a class="dropdown-item" href="visit_notes.php">Visit Notes</a>
                                    <a class="dropdown-item" href="patient_details.php">Patient Details</a>

                                </div>
                            </li>

                            <li class="nav-item dropdown  <?= (isset($medicine)) ? 'active' : '' ?>">
                                <a class="nav-link dropdown-toggle" href="medicines.php" role="button" aria-haspopup="true" aria-expanded="false"><span class="ti-pencil"></span> Medicines</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="ti-money"></span> Payments</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="add-payment.html">Add Payment</a>
                                    <a class="dropdown-item" href="payments.html">All Payments</a>
                                    <a class="dropdown-item" href="about-payment.html">Payment Invoice</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
            <!-- /Menu -->
            <!-- Breadcrumb -->
            <!-- Page Title -->

            <!-- /Page Title -->
            <!-- /Breadcrumb -->