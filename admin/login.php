<?php
session_start();
ob_start();


?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery-2.1.1.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/auth.css">
    <!--<script src="js/auth.js"></script>-->

</head>
<body>

<div class="container">
    <div class="login-container">
        <div style="font-family: 'Iranian Sans'" id="output"></div>
        <div class="avatar"></div>
        <div class="form-box">
            <form name="form" method="post" action="" onsubmit="return checkEmpty();">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "false") { ?>
                    <input id="user" style="font-family: 'Iranian Sans'" name="user" type="text" placeholder="نام کاربری">
                    <input id="pass" style="font-family: 'Iranian Sans'" name="password" type="password" placeholder="رمز عبور">
                    <button name="btn-login" style="font-family: 'Iranian Sans'" class="btn btn-info btn-block login"
                            type="submit">ورود
                    </button>
                <?php } else { ?>
                    <a href="index.php">ورود به پنل کاربری

                    </button></a>

                    <?php
                }
                ?>

            </form>
        </div>
    </div>

</div>

<?php
if (isset($_POST['btn-login'])) {
    $user = $_POST['user'];
    $pass = $_POST['password'];

    if ($user = 'admin') {
        if ( $pass == 'admin'){
            $_SESSION['logged_in'] = "true";
            $_SESSION['auth'] = "1";
            header('Location: index.php');
        }
        else {
            echo '<script type="text/javascript">
            $("#output").addClass("alert alert-danger animated fadeInUp").html("نام کاربری یا رمز عبور اشتباه می باشد");
            </script>';
        }
    }

    if ($user = 'manager') {
        if ( $pass == 'ramz'){
            $_SESSION['logged_in'] = "true";
            $_SESSION['auth'] = "2";
            header('Location: index.php');
        }
        else {
            echo '<script type="text/javascript">
            $("#output").addClass("alert alert-danger animated fadeInUp").html("نام کاربری یا رمز عبور اشتباه می باشد");
            </script>';
        }
    }

}
?>
<script type="text/javascript">

    function checkEmpty() {
        var user = document.forms["form"]["user"].value;
        var pass = document.forms["form"]["password"].value;

        if (user == '' || pass == '') {
            alert("لطفا تمام مشخصات را وارد کنید");
            return false;
        }
    }

</script>

</body>
</html>