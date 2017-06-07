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

if (isset($user_melli) && $user_melli != "") {
    header('Location: doing.php');
}
//end of checking

/*echo $_SERVER['HTTP_X_FORWARDED_FOR'];*/
if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
    session_destroy();
    $pc_name = $_SERVER['SERVER_NAME'];


    $user_id = $_SESSION['user_id_fill_form'];
    $query = "SELECT * FROM `all_users` WHERE `id` = '$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $f_name = $row['f_name'];
        $l_name = $row['l_name'];
        $melli = $row['melli'];
        $uni_num = $row['uni_num'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $grade = $row['grade'];
        $madrak = $row['madrak'];
        $uni_name = $row['uni_name'];
        $uni_kind = $row['uni_kind'];
        $field = $row['field'];
        $email_filled = $row['email'];
        $year = $row['year'];


    }
    else{
        $f_name = "";
        $l_name = "";
        $melli = "";
        $uni_num = "";
        $phone = "";
        $gender = 0;
        $grade = 0;
        $madrak = 0;
        $uni_name = "";
        $uni_kind = 0;
        $field = 0;
        $email_filled = "";
        $year = 0;
    }

}
else{
    $f_name = "";
    $l_name = "";
    $melli = "";
    $uni_num = "";
    $phone = "";
    $gender = 0;
    $grade = 0;
    $madrak = 0;
    $uni_name = "";
    $uni_kind = 0;
    $field = 0;
    $email_filled = "";
    $year = 0;
}
if (isset($_POST['btn-start'])) {

    $pc_name = $_SERVER['SERVER_NAME'];
    include_once('dbconn.php');

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    mysqli_set_charset($conn, 'utf8');

    if (!$conn) {
        die("Connection failed : " . mysqli_error());
    }

    if (isset($_POST['agreement'])) {
        //scape variables for security
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $melli = mysqli_real_escape_string($conn, $_POST['melli']);
        $uni_num = mysqli_real_escape_string($conn, $_POST['uni_num']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $grade = mysqli_real_escape_string($conn, $_POST['grade']);
        $madrak = mysqli_real_escape_string($conn, $_POST['madrak']);
        $uni_name = mysqli_real_escape_string($conn, $_POST['uni_name']);
        $uni_kind = mysqli_real_escape_string($conn, $_POST['uni_kind']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $field = mysqli_real_escape_string($conn, $_POST['field']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);;
        $year = mysqli_real_escape_string($conn, $_POST['year']);;

        //can not sql injection for server
//strip string from tags like script tags
        $name = strip_tags($name);
        $last_name = strip_tags($last_name);
        $melli = strip_tags($melli);
        $uni_num = strip_tags($uni_num);
        $phone = strip_tags($phone);
        $gender = strip_tags($gender);
        $grade = strip_tags($grade);
        $madrak = strip_tags($madrak);
        $uni_name = strip_tags($uni_name);
        $uni_kind = strip_tags($uni_kind);
        $subject = strip_tags($subject);
        $field = strip_tags($field);
        $email = strip_tags($email);
        $year = strip_tags($year);
        $date = date("h:i:sa");
        $isReady = 1;

        $query2 = "SELECT `ip` FROM `ready_users` WHERE `ip` = '$pc_name'";
        $result2 = mysqli_query($conn, $query2);
        $ip_count = mysqli_num_rows($result2);
        print_r($result2);
        echo "ip count: " . $ip_count;
        if ($result2 && $ip_count == 1) {
            $query = "UPDATE `ready_users` SET `f_name`='$name',`l_name`='$last_name',`melli`='$melli',`uni_num`='$uni_num',`phone`='$phone',`gender`='$gender',`grade`='$grade',`madrak`='$madrak',`field`='$field',`uni_kind`='$uni_kind',`uni_name`='$uni_name',`subject`='$subject',`begin_time`='$date', `isReady`='$isReady' , `email`='$email', `year`='$year' WHERE `ip` = '$pc_name'";
            /*$query = "INSERT INTO `ready_users`(`f_name`, `l_name`, `melli`, `uni_num`, `phone`, `gender`, `grade`, `madrak`, `field`, `uni_kind`, `uni_name`, `subject`, `begin_time`, `isReady`) VALUES ('$name' ,'$last_name' ,'$melli' ,'$uni_num' ,'$phone' ,'$gender' ,'$grade' ,'$madrak', '$field', '$uni_kind', '$uni_name', '$subject', '$date', '$isReady')";*/
            $result = mysqli_query($conn, $query);
            $conn = null;
            $_SESSION['start'] = $date;
            $_SESSION['user_id'] = $melli;
            $_SESSION['user_name'] = $name;
            $_SESSION['last_name'] = $last_name;
            header('Location: doing.php');
            $errTyp = "success";
            $errMSG = "ثبت نام شما با موفقیت انجام شد . لطفا وارد شوید";

        } else {
            $errTyp = "danger";
            $errMSG = "آی پی این کامپیوتر در پایگاه داده موجود نیست، با کارشناس بخش تماس بگیرید.";
            $conn = null;
        }
    } else {
        $errTyp = "danger";
        $errMSG = "لطفا گزینه مربوط به تعهدات را پر کنید";
        $conn = null;
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

    <style>
        @font-face {
            font-family: "Iranian Sans";
            src: url(fonts/iraniansans.ttf);
        }

        body {
            background-color: #f3f3f3;
            direction: rtl;
        / / background-image: url('logo.png');
        / / background-repeat: no-repeat;
        / / background-position: center;
        / / background-size: 50 % 50 %;

        }

        body label {
            font-family: "iranian sans";
        }
        body span{
            float: right;
        }

        .form-control {
            height: auto !important;
        }

        .colorgraph {
            height: 14px;
            border-top: 0;
            background: #c4e17f;
            border-radius: 5px;
            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }

        .row{
            margin-bottom: 5%;
        }

        body hr {
            margin-top: 0;
            margin-bottom: 0;
        }

        .form-labels-on-top {
            box-sizing: border-box;
            max-width: 75%;
            margin: 0 auto;
            padding: 55px;

            background-color: #ffffff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);

            font: bold 14px sans-serif;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        function checkEmpty() {
            var name = document.forms["form"]["name"].value;
            var last_name = document.forms["form"]["last_name"].value;
            var melli = document.forms["form"]["melli"].value;
            var phone = document.forms["form"]["phone"].value;
            var uni_name = document.forms["form"]["uni_name"].value;

            if (name == null || name == "", melli == null || melli == "", last_name == null || last_name == "") {
                alert("لطفا تمام مشخصات را وارد کنید");
                return false;
            }
        }
    </script>
</head>
<body>
<hr class="colorgraph">
<div style="margin-top: 5%;margin-bottom: 5%;" class="row">
    <div class="container" style="background-color: #f3f3f3;">
        <h2 style="text-align: center;font-family: 'iranian sans'">پژوهشگاه علوم و فناوری اطلاعات ایران</h2>
        <h3 style="text-align: center;font-family: 'iranian sans'">فرم درخواست جست و جو و بازیابی اطلاعات</h3>
        <br><br>
        <?php
        if (isset($errMSG)) {

            ?>
            <div class="container">
                <div class="panel panel-<?php echo $errTyp; ?>">
                    <div class="panel-heading">پیام از طرف سرویس دهنده</div>
                    <div class="panel-body"><?php echo $errMSG . '<br>' . $pc_name ?></div>

                </div>
            </div>

            <?php
        }
        ?>

        <form autocomplete="off" class="form-labels-on-top" name="form" method="post" action=""
              onsubmit="return checkEmpty();">

            <div class="row">
                <div class="col-md-3 pull-right">
                    <label>
                        <span>نام</span>
                        <input required type="text" class="form-control" id="name"
                               placeholder="نام" name="name"
                               value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                                   echo $f_name;
                               } ?>">
                    </label>

                </div>
                <div class="col-md-3 pull-right">
                    <label>
                        <span>نام خانوادگی</span>
                        <input required type="text" class="form-control" id="last_name"
                               placeholder="نام خانوادگی" name="last_name"
                               value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                                   echo $l_name;
                               } ?>">
                    </label>
                </div>

                <div class="col-md-3 pull-right">
                    <label>
                        <span>کد ملی</span>
                    <input required style="font-family: 'Iranian Sans'" type="text" class="form-control" id="melli"
                           placeholder="کد ملی" name="melli"
                           value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                               echo $melli;
                           } ?>">
                    </label>
                </div>


                <div class="col-md-3 pull-right">
                    <label>
                        <span>شماره دانشجویی</span>
                        <input type="text" class="form-control" id="uni_num"
                               placeholder="شماره دانشجویی" name="uni_num"
                               value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                                   echo $uni_num;
                               } ?>">
                    </label>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 pull-right">
                    <label>
                        <span>شماره تلفن</span>
                        <input required type="text" class="form-control" id="phone"
                               placeholder="شماره تلفن" name="phone"
                               value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                                   echo $phone;
                               } ?>">
                    </label>
                </div>
                <div class="col-md-3 pull-right">
                    <label>
                        <span>پست الکترونیک</span>
                        <input required type="email" class="form-control" id="email"
                               placeholder="پست الکترونیک" name="email"
                               value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                                   echo $email_filled;
                               } ?>">
                    </label>
                </div>

                <div class="col-md-3 pull-right">
                    <label>
                        <span>جنسیت</span>
                        <select required class="form-control" id="gender" name="gender">
                            <option value="0">-- انتخاب کنید</option>
                            <option <?php echo $gender == 1 ? "selected" : ""; ?> value="1">مرد</option>
                            <option <?php echo $gender == 2 ? "selected" : ""; ?> value="2">زن</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-3 pull-right">
                    <label>
                        <span>موقعیت علمی</span>
                        <select required class="form-control" id="grade" name="grade">
                            <option value="0">-- انتخاب کنید</option>
                            <option <?php echo $grade == 1 ? "selected" : ""; ?> value="1">دانشجو</option>
                            <option <?php echo $grade == 2 ? "selected" : ""; ?> value="2"> فارغ التحصیل</option>
                            <option <?php echo $grade == 3 ? "selected" : ""; ?> value="3">هیات علمی</option>
                        </select>
                    </label>
                </div>

            </div>


            <div class="row">
                <div class="col-md-3 pull-right">
                    <label>
                        <span>مقطع تحصیلی</span>
                        <select required class="form-control" id="madrak" name="madrak">
                            <option <?php echo $madrak == 1 ? "selected" : ""; ?> value="0">-- انتخاب کنید</option>
                            <option <?php echo $madrak == 2 ? "selected" : ""; ?> value="1">کاردانی</option>
                            <option <?php echo $madrak == 3 ? "selected" : ""; ?> value="2">کارشناسی</option>
                            <option <?php echo $madrak == 4 ? "selected" : ""; ?> value="3">کارشناسی ارشد</option>
                            <option <?php echo $madrak == 5 ? "selected" : ""; ?> value="4">دکترای تخصصی (PHD)</option>
                            <option <?php echo $madrak == 6 ? "selected" : ""; ?> value="5">دکترای حرفه ای (عمومی)</option>
                            <option <?php echo $madrak == 7 ? "selected" : ""; ?> value="6">دستیاری تخصصی (علوم پایه پزشکی، داروسازی و دندان پزشکی)</option>
                            <option <?php echo $madrak == 8 ? "selected" : ""; ?> value="7">دستیاری تخصصی بالینی</option>
                            <option <?php echo $madrak == 9 ? "selected" : ""; ?> value="8">پسا دکترا</option>
                            <option <?php echo $madrak == 10 ? "selected" : ""; ?> value="9">دوره فلوشیپ</option>
                            <option <?php echo $madrak == 11 ? "selected" : ""; ?> value="10">دوره MPH</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-3 pull-right">
                    <label>
                        <span>سال ورود به مقطع تحصیلی</span>
                        <select required class="form-control" id="year" name="year">
                            <option value="0">-- انتخاب کنید</option>
                            <script>
                                var myDate = new Date();
                                var year = myDate.getFullYear();
                                for (var i = 1300; i < year - 620; i++) {
                                    document.write('<option value="' + i + '">' + i + '</option>');
                                }
                            </script>
                        </select>
                    </label>
                </div>
                <div class="col-md-3 pull-right">
                    <label>
                        <span>رشته تحصیلی</span>
                        <select required class="form-control" id="field" name="field">
                            <option <?php echo $field == 1 ? "selected" : ""; ?> value="0">-- انتخاب کنید</option>
                            <option <?php echo $field == 2 ? "selected" : ""; ?> value="1">علوم پایه</option>
                            <option <?php echo $field == 3 ? "selected" : ""; ?> value="2">علوم انسانی</option>
                            <option <?php echo $field == 4 ? "selected" : ""; ?> value="3">فنی مهندسی</option>
                            <option <?php echo $field == 5 ? "selected" : ""; ?> value="4">هنر</option>
                            <option <?php echo $field == 6 ? "selected" : ""; ?> value="5">پزشکی</option>
                            <option <?php echo $field == 7 ? "selected" : ""; ?> value="6">کشاورزی</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-3 pull-right">
                    <label>
                        <span>نوع دانشگاه</span>
                        <select required class="form-control" id="uni_kind" name="uni_kind">
                            <option value="0">-- انتخاب کنید</option>
                            <option <?php echo $uni_kind == 1 ? "selected" : ""; ?> value="1">دولتی</option>
                            <option <?php echo $uni_kind == 2 ? "selected" : ""; ?> value="2">آزاد</option>
                            <option <?php echo $uni_kind == 3 ? "selected" : ""; ?> value="3">غیرانتفاعی</option>
                        </select>
                    </label>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6 pull-right">
                    <label>
                        <span>نام دانشگاه</span>
                        <input required name="uni_name" type="text" class="form-control" id="uni_name"
                               placeholder="نام دانشگاه"
                               value="<?php if (isset($_SESSION['user_id_fill_form']) && !empty($_SESSION['user_id_fill_form'])) {
                                   echo $uni_name;
                               } ?>">

                    </label>
                </div>
                <div class="col-md-6 pull-right">
                    <label>
                        <span>عنوان پژوهش</span>
                        <input type="text" class="form-control" id="subject"
                               placeholder="عنوان پژوهش" name="subject">
                    </label>
                </div>





            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>
                        <label class="form-check-label">
                            <input required type="checkbox" class="form-check-input" name="agreement" value="accept">
                            بدینوسیله تعهد می نمایم به اطلاعات مورد درخواست استناد علمی نموده و حق معنوی پدید آورنده را
                            تضییع نکنم
                        </label>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <button style="width: 100%;font-family: iranian sans;" type="submit" class="btn btn-primary"
                            name="btn-start">شروع به کار
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

</body>
</html>