<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Tehran");

include_once('dbconn.php');
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    die("Connection failed : " . mysqli_error());
}
$pc_name = $_SERVER['SERVER_NAME'];
//check if user fill the form or not
$q2 = "SELECT * FROM `ready_users` WHERE `ip` = '$pc_name'";
$r2 = mysqli_query($conn, $q2);
$row_person = mysqli_fetch_array($r2);

$user_melli = $row_person['melli'];

if (isset($user_melli) && $user_melli != ""){
    header('Location: doing.php');
}
//end of checking
/*echo $_SERVER['HTTP_X_FORWARDED_FOR'];*/

if (isset($_POST['melli-submit'])) {

    $pc_name = $_SERVER['SERVER_NAME'];





    if (isset($_POST['melli']) && ! empty($_POST['melli'])){
        $melli_code = $_POST['melli'];
        $query = "SELECT * FROM `all_users` WHERE `melli` = '$melli_code' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id_fill_form'] = $row['id'];
            header('Location: form.php');
        }
        else{
            echo "not found";
        }


    }

}
elseif (isset($_POST['phone-submit'])) {
    $pc_name = $_SERVER['SERVER_NAME'];
    include_once('dbconn.php');

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    mysqli_set_charset($conn, 'utf8');

    if (!$conn) {
        die("Connection failed : " . mysqli_error());
    }
    if (isset($_POST['phone']) && ! empty($_POST['phone'])){
        $phone_number = $_POST['phone'];
        $query = "SELECT * FROM `all_users` WHERE `melli` = '$phone_number' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id_fill_form'] = $row['id'];
            header('Location: form.php');
        }
        else{
            echo "not found";
        }


    }


}

?>
<html>

<head dir="rtl">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery-2.1.1.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-labels-on-top.css">
    <style>
        @font-face {
            font-family: "Iranian Sans";
            src: url(fonts/iraniansans.ttf);
        }
        body {
            direction: rtl;

            font-family: "Iranian Sans";

        }

        body label {
            font-family: "iranian sans";
        }

        body hr {
            margin-top: 0;
            margin-bottom: 0;
        }

        .background-image {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: url('img/cheap_diagonal_fabric.png');
            /*background-size: cover;
            background-repeat: no-repeat;*/
            z-index: 1;
            /*-webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);*/
        }

        .panel-login {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        }

        .panel-login > .panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align: center;
        }

        .panel-login > .panel-heading a {
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login > .panel-heading a.active {
            color: #029f5b;
            font-size: 18px;
        }

        .panel-login > .panel-heading hr {
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        }

        .panel-login input[type="text"], .panel-login input[type="email"], .panel-login input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login input:hover,
        .panel-login input:focus {
            outline: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .btn-login {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }

        .btn-login:hover,
        .btn-login:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }

        .forgot-password {
            text-decoration: underline;
            color: #888;
        }

        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-register {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }

        .btn-register:hover,
        .btn-register:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }

        .content {
            position: relative;
            z-index: 2;
            color: #fff;
        }

    </style>

</head>
<body>
<div class="background-image"></div>

<div class="content">
    <div class="row">
        <div class="col-md-2">
            <img style="" src="img/logofa.png" class="img-responsive">
        </div>
    </div>

    <div class="container">
        <div class="col-md-6">

<?php

/*echo "<pre style='text-align: left;direction: ltr;'>";
echo round(111434/10000, 1)*10000;
echo "<br>";
echo $pc_name;
echo "<br>";
echo "
127.0.0.1     talar.irandoc.ac.ir
172.16.6.210     talar.irandoc.ac.ir
172.16.0.7     9fnyQiLYUtEBrsuOK2OwheJxgtRUqEn3NpCJrlS5SZfQlvrgypynA4W7PqVqOaC.irandoc.ac.ir
172.16.0.7     defaulttalar.irandoc.ac.ir";
echo "</pre>";*/
?>
        </div>
        <div class="row">
            <div style="position: fixed;bottom: 15%;right: 5%" class="col-md-5 col-md-offset-6">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">ورود با کد ملی</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">ورود با شماره تلفن</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form autocomplete="off" id="login-form" action="" method="post" role="form"
                                      style="display: block;">
                                    <div class="form-group">
                                        <input style="font-family: 'Iranian Sans';text-align: right" type="text"
                                               name="melli" id="melli" tabindex="1" class="form-control"
                                               placeholder="کد ملی" value="">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <button type="submit" name="melli-submit" id="melli-submit" tabindex="4"
                                                        class="form-control btn btn-login">وارد شو !
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <form autocomplete="off" id="register-form" action="" method="post"
                                      role="form" style="display: none;">
                                    <div class="form-group">
                                        <input style="font-family: 'Iranian Sans';text-align: right" type="text"
                                               name="phone" id="phone" tabindex="1" class="form-control"
                                               placeholder="شماره تلفن" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <button type="submit" name="phone-submit" id="phone-submit" tabindex="4"
                                                        class="form-control btn btn-login">وارد شو !
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div style="padding-top: 5%" class="col-md-offset-1 col-md-10">
                                    <a class="form-control btn btn-login" style="font-size: small" href="form.php">اگر برای اولین بار است که از سیستم استفاده می کنید کلیک کنید</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(function () {

        $('#login-form-link').click(function (e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function (e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });

</script>
</body>
</html>