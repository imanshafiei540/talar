<?php
session_start();
ob_start();
include_once("heading.html");
include('jdf.php');

date_default_timezone_set("Asia/Tehran");

include_once('dbconn.php');

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');


if (isset($_SESSION['auth']) && $_SESSION['auth'] != '2'){
    header('Location: login.php');
}

if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

if (isset($_GET['btn-search1'])){
    $date = $_GET['date'];
    if (isset($date) && !empty($date)){
        $dater= explode('/', $date);
        $day = jdate($dater[0]);
        $month = jdate($dater[1]);
        $year = jdate($dater[2]);
        $query = "SELECT * FROM `price` WHERE `day` = '$day' AND `month` = '$month' AND `year` = '$year'";
        $result = mysqli_query($conn, $query);
        $price = mysqli_fetch_assoc($result)['price'];
    }
}

if (isset($_GET['btn-search2'])){
    $month = jdate($_GET['month']);
    $year = jdate($_GET['year']);
    if (isset($month) && !empty($month) && isset($year) && !empty($year)){
        $query2 = "SELECT SUM(price) AS `month_price` FROM price WHERE `month` = '$month' AND `year` = '$year'";
        $result2 = mysqli_query($conn, $query2);
        $price2 = mysqli_fetch_assoc($result2)['month_price'];
    }
}
if (isset($_GET['btn-search3'])){

    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    if (isset($from_date) && !empty($from_date) && isset($to_date) && !empty($to_date)){
        $dater= explode('/', $from_date);

        $iday = (int)$dater[0];
        $imonth = (int)$dater[1];
        $iyear = (int)$dater[2];

        $day = jdate($dater[0]);
        $month = jdate($dater[1]);
        $year = jdate($dater[2]);

        //#######################################################
        $dater2 = explode('/', $to_date);
        $iday2 = (int)$dater2[0];
        $imonth2 = (int)$dater2[1];
        $iyear2 = (int)$dater2[2];

        $day2 = jdate($dater2[0]);
        $month2 = jdate($dater2[1]);
        $year2 = jdate($dater2[2]);




        $val_day = abs($iday - $iday2);
        $val_month = abs($imonth - $imonth2)*30;
        $val_year = abs($iyear - $iyear2)*365;



        $query = "SELECT SUM(price) AS 'total_price' FROM `price` WHERE (`day` >= '$day' OR `day` <= '$day2') AND (`month` >= '$month' OR `month` <= '$month2') AND (`year` >= '$year' OR `year` <= '$year2')";
        $result = mysqli_query($conn, $query);
        $price3 = mysqli_fetch_assoc($result)['total_price'];

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>


    <link rel="stylesheet" href="css/bootstrap-datepicker.css"/>


    <style>
        body {
            margin: 2em;
            font-family: "Iranian Sans";

        }

        .jumbotron {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 10px;


        }
        .table th {
            text-align: right;
        }

        .table td {
            text-align: right;
        }

    </style>
</head>
<body>
<div style="padding: 1%" class="jumbotron">
    <h3 style="text-align: center">درآمد مالی</h3>
</div>
<div class="col-md-offset-3 col-md-6">
    <form method="get" action="">
        <div class="control-group">
            <p style="direction: rtl;" class="control-label" for="datepicker1">مشخص کردن یک روز خاص:</p>
            <div class="controls">
                <div class="input-append">
                    <input name="date" style="height: 34px" id="datepicker1" class="form-control" type="text">
                    <button id="datepicker1btn" class="btn" type="button"><i class="glyphicon glyphicon-calendar"></i></button>
                </div>
            </div>
        </div>
        <button name="btn-search1" style="width: 100%" class="btn btn-info" type="submit">جست و جو</button>
    </form>
    <form method="get" action="">
        <div class="form-group">
            <p style="direction: rtl" for="sel1">جست و جو در یک ماه خاص:</p>
            <select name="month" style="direction: rtl" class="form-control" id="sel1">
                <option value="01">فروردین</option>
                <option value="02">اردبیهشت</option>
                <option value="03">خرداد</option>
                <option value="04">تیر</option>
                <option value="05">مرداد</option>
                <option value="06">شهریور</option>
                <option value="07">مهر</option>
                <option value="08">آبان</option>
                <option value="09">آذر</option>
                <option value="10">دی</option>
                <option value="11">بهمن</option>
                <option value="12">اسفند</option>


            </select>
        </div>
        <div class="form-group">
            <p style="direction: rtl" for="usr">جست و جو در یک سال خاص:</p>
            <input name="year" style="height: 34px" type="text" class="form-control" id="usr" required>
        </div>
        <button name="btn-search2" style="width: 100%" class="btn btn-info" type="submit">جست و جو</button>
    </form>
    <form method="get" action="">
        <div class="control-group">
            <p style="direction: rtl;" class="control-label" for="datepicker2">از روز</p>
            <div class="controls">
                <div class="input-append">
                    <input name="from_date" style="height: 34px" id="datepicker2" class="form-control" type="text">
                    <button id="datepicker2btn" class="btn" type="button"><i class="glyphicon glyphicon-calendar"></i></button>
                </div>
            </div>
            <p style="direction: rtl;" class="control-label" for="datepicker3">تا روز</p>
            <div class="controls">
                <div class="input-append">
                    <input name="to_date" style="height: 34px" id="datepicker3" class="form-control" type="text">
                    <button id="datepicker3btn" class="btn" type="button"><i class="glyphicon glyphicon-calendar"></i></button>
                </div>
            </div>
        </div>
        <button name="btn-search3" style="width: 100%" class="btn btn-info" type="submit">جست و جو</button>
    </form>

</div>
<div class="container">

    <br>
    <hr>
    <table class="table table-hover">
        <thead>
        <?php if (isset($price) || isset($price2) || isset($price3)){ ?>
        <tr>
            <th>مجموع قیمت</th>
            <th>تاریخ</th>
        </tr>
        <?php } ?>
        </thead>
        <tbody>

        <?php
        if (isset($price)) {
            ?>
            <tr>
                <td style="direction: rtl"><?php echo $price . " ریال "; ?></td>
                <td><?php echo $year . "/" . $month . "/" . $day; ?></td>
            </tr>
            <?php

        }

        ?>

        <?php
        if (isset($price2)){
            ?>
            <tr>
                <td style="direction: rtl"><?php echo $price2 . " ریال "; ?></td>
                <td><?php echo $year . "/" . $month; ?></td>
            </tr>
            <?php

        }
        ?>
        <?php
        if (isset($price3)){
            ?>
            <tr>
                <td style="direction: rtl"><?php echo $price3 . " ریال "; ?></td>
                <td style="direction: rtl"><?php echo  $from_date . " تا " . $to_date ; ?></td>
            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>

</div>

<script src="js/jquery-2.1.1.js"></script>

<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-datepicker.fa.js"></script>
<script>
    $(document).ready(function () {
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
        $("#datepicker3").datepicker();
        $("#datepicker1btn").click(function (event) {
            event.preventDefault();
            $("#datepicker1").focus();
        })
        $("#datepicker2btn").click(function (event) {
            event.preventDefault();
            $("#datepicker2").focus();
        })
        $("#datepicker3btn").click(function (event) {
            event.preventDefault();
            $("#datepicker3").focus();
        })


    });
</script>
</body>
<?php
include_once("footer.html");
?>
</html>
