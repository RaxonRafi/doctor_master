<?php
session_start();
$result = " ";
if (isset($_POST['submit'])) {
    $url = "https://devapi.oxyjon.com/api/doctors/login";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = curl_exec($ch);
    curl_close($ch);
    $result_decode = json_decode($result);
}

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
    <!-- Main CSS -->
    <link rel="stylesheet" href="../admin/css/styles.css">
    <link rel="stylesheet" href="css/green.css" id="style_theme">
    <link rel="stylesheet" href="css/responsive.css">

    <script src="js/modernizr.min.js"></script>
</head>

<body class="auth-bg">
    <!-- Pre Loader -->
    <div class="loading">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!--/Pre Loader -->

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 auth-box">
                        <div class="proclinic-box-shadow">
                            <div class="d-flex login_page">
                                <img src="../admin/images/rsz_oxyjon_logo_1.png" alt="">
                                <h3 style="padding-left:160px" class="widget-title text-center">Doctor Login</h3>
                                <img class="img-2" style="padding-left:100px" src="../admin/images/rsz_oxyjon_logo_2.png" alt="">

                            </div>
                            <hr>


                            <?php
                            if (isset($_SESSION['login_error'])) {
                            ?>
                                <div class="alert alert-danger">
                                  <?= $_SESSION['login_error'] ?>
                                </div>
                            <?php
                            };
                            ?>

                            <form method="POST" action="login_post.php" class="widget-form">
                                <!-- form-group -->
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input name="userName" placeholder="Enter Your Number" class="form-control">
                                    </div>

                                    <div class="col-sm-12">
                                        <input type="password" name="password" placeholder="Enter password" class="form-control">
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <!-- form-group -->
                                <!-- <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" placeholder="Password" name="pass_confirmation" class="form-control" data-validation="strength" data-validation-strength="2" data-validation-has-keyup-event="true">
                                    </div>
                                </div> -->
                                <!-- /.form-group -->
                                <!-- Check Box -->
                                <div class="form-check row">
                                    <div class="col-sm-12 text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="ex-check-2">
                                            <label class="custom-control-label" for="ex-check-2">Remember Me</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Check Box -->
                                <!-- Login Button -->
                                <div class="button-btn-block">
                                    <button name="submit" type="submit" class="btn_color  btn-block">Login</button>
                                </div>
                                <!-- /Login Button -->
                                <!-- Links -->
                                <div class="auth-footer-text">
                                    <small>New User,
                                        contact us at contact@oxyjon.com Or 88008 17354 </small>
                                </div>
                                <!-- /Links -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content  -->
    </div>
    <!-- Jquery Library-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Popper Library-->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap Library-->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom Script-->
    <script src="js/custom.js"></script>
</body>

</html>
<?php
session_destroy();
?>