<?php
session_start();
ob_start();
include_once('jdf.php');

$pc_name = $_SERVER['SERVER_NAME'];

date_default_timezone_set("Asia/Tehran");


include_once('dbconn.php');

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

$query2 = "SELECT `ip` FROM `ready_users` WHERE `ip` = '$pc_name'";
$result2 = mysqli_query($conn, $query2);
$ip_count = mysqli_num_rows($result2);

if ($ip_count == 1) {
    $query = "SELECT * FROM `ready_users` WHERE `ip`= '$pc_name' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $now = time();
    $day = jdate('d', $now);
    $month = jdate('m', $now);
    $year = jdate('Y', $now);


    $begin_time = $row['begin_time'];
    $end_time = $row['end_time'];
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];
    $uni_num = $row['uni_name'];
    $phone = $row['phone'];
    $melli = $row['melli'];
    $grade = $row['grade'];
    $field = $row['field'];
    $madrak = $row['madrak'];
    $gender = $row['gender'];
    $uni_name = $row['uni_name'];
    $uni_kind = $row['uni_kind'];
    $subject = $row['subject'];
    $email = $row['email'];
    $year_madrak = $row['year'];


    if ($result) {
        $name_for_details = $row['f_name'];
        $last_name_for_details = $row['l_name'];
        $melli_for_details = $row['melli'];

        $begin_time = $row['begin_time'];
        $end_time = $row['end_time'];
        $to_time = strtotime($begin_time);
        $from_time = strtotime($end_time);
        $total_time = round(abs($to_time - $from_time) / 60, 2);

        $price = round(($total_time * 450)/10000,1)*10000;
        ###########################################################################
        $query3 = "INSERT INTO `all_users`(`ip`, `day`, `month`, `year`, `start_time`, `end_time`, `price`, `f_name`, `l_name`, `melli`, `uni_num`, `phone`, `email`,`madrak`, `year_madrak`,`grade`, `field`, `gender`, `uni_name`, `uni_kind`, `subject`)  VALUES ('$pc_name','$day','$month','$year','$begin_time','$end_time','$price','$f_name','$l_name','$melli','$uni_num','$phone','$email','$madrak','$year_madrak','$grade','$field','$gender','$uni_name','$uni_kind','$subject')";
        $result3 = mysqli_query($conn, $query3);
        $id = mysqli_insert_id($conn);

        ###########################################################################

        $query = "UPDATE `ready_users` SET `f_name`='',`l_name`='',`melli`='',`uni_num`='',`phone`='', `email`='',`gender`=0,`grade`=0,`madrak`=0,`year`=0,`field`=0,`uni_kind`=0,`uni_name`='',`subject`='',`begin_time`='', `end_time`='' WHERE `ip` = '$pc_name'";

        $result = mysqli_query($conn, $query);




    }


} else {
    $errTyp = "danger";
    $errMSG = "آی پی این کامپیوتر در پایگاه داده موجود نیست، با کارشناس بخش تماس بگیرید.";
    $conn = null;
}

if (isset($_POST['btn-pay'])){
    $query4 = "UPDATE `all_users` SET `pay`= 1 WHERE `id` = '$id'";
    $result4 = mysqli_query($conn, $query4);

}
?>
<!DOCTYPE html>
<html>

<head dir="rtl">
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
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
            font-family: "Iranian Sans", "Agency FB";
            margin-top: 20px;
            background-image: url("img/bg.jpg");
            background-size: 100% 125%;
            background-repeat: no-repeat;
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
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <p>
                        <em>تاریخ: <?php
                            $now = time();
                            echo jdate('d-m-Y', $now);
                            ?></em>
                    </p>
                    <p>
                        <em>شماره رسید: </em>
                    </p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <address>
                        <strong>پژوهشگاه اطلاعات و مدارک علمی ایران</strong>
                        <br>
                        تقاطع خیابان فلسطین و انقلاب
                        <br>
                        تهران، ایران
                        <br>
                        <abbr title="Phone">تلفن:</abbr> (021)66951437
                    </address>

                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1 style="border-bottom: thin solid gray;padding-bottom: 3%">رسید مراجعه کننده</h1>
                    <div class="col-md-6" style="text-align: right;direction: rtl;">نام
                        خانوادگی: <?php echo $last_name_for_details; ?></div>
                    <div class="col-md-6" style="direction: rtl;text-align: right">
                        نام: <?php echo $name_for_details; ?></div>

                    <div class="col-md-6"></div>
                    <div class="col-md-6" style="text-align: right;direction: rtl;margin-bottom: 5%">کد
                        ملی: <?php echo $melli_for_details; ?></div>

                </div>
                </span>
                <table class="table table-hover" style="direction: rtl;text-align: right;">
                    <thead>
                    <tr>
                        <th style="text-align: right"> ساعت شروع</th>
                        <th style="text-align: right">ساعت پایان</th>
                        <th style="text-align: right">قیمت</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-md-4"><?php echo $begin_time; ?></h4></td>
                        <td class="col-md-4"><?php echo $end_time; ?></td>
                        <td class="col-md-4"><?php echo $price; ?></td>
                    </tr>


                    <tr>

                        <td class="text-right"><h4><strong>کل: </strong></h4></td>
                        <td class="text-right"><h4><strong><?php echo $total_time; ?></strong></h4></td>
                        <td class="text-right text-danger"><h4><strong><?php echo $price; ?></strong></h4></td>
                    </tr>
                    </tbody>
                </table>
                <!--<form method="post" action="">
                    <button name="btn-pay" type="submit" class="btn btn-success btn-lg btn-block">
                        پرداخت   <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </form>-->
                <a href="index.php">بازگشت به صفحه ی اصلی</a>
                </td>
            </div>
        </div>
    </div>
</div>
</body>
</html>