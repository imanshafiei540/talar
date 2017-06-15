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


if (isset($_GET['btn-search3'])){

    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    if (isset($from_date) && !empty($from_date) && isset($to_date) && !empty($to_date)){
        $dater= explode('/', $from_date);

        $day = $dater[0];
        $month = $dater[1];
        $year = $dater[2];
        $from_date = $year . '-' . $month . '-' . $day;

        //#######################################################
        $dater2 = explode('/', $to_date);
        $day2 = $dater2[0];
        $month2 = $dater2[1];
        $year2 = $dater2[2];
        $to_date = $year2 . '-' . $month2 . '-' . $day2;

        $result_for_users_interval = mysqli_query($conn, "SELECT * FROM `all_users` WHERE CONCAT(`year`, '-', `month`, '-', `day`) BETWEEN '$from_date' AND '$to_date'");


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
    <h3 style="text-align: center">گزارش کاربران</h3>
</div>
<div class="col-md-offset-3 col-md-6">

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
    <div class="container">
        <br>
        <table class="table table-hover">
            <?php
            if (isset($result_for_users_interval) and mysqli_num_rows($result_for_users_interval) != 0){
                echo '<thead>
        <tr>
            <th>پرداخت</th>
            <th>ساعت خروج</th>
            <th>ساعت ورود</th>
            <th>شماره کامپیوتر</th>
            <th>هزینه</th>
            <th>شماره تلفن</th>
            <th>کد ملی</th>
            <th>نام خانوادگی</th>
            <th>نام</th>
            <th>تاریخ مراجعه</th>
        </tr>
        </thead>';
            }
            ?>

            <tbody>

            <?php
            if (isset($result_for_users_interval) and mysqli_num_rows($result_for_users_interval) != 0){

                while ($row = mysqli_fetch_array($result_for_users_interval)) {
                    $pc_ip = $row['ip'];
                    $query2 = "SELECT `id` FROM `all_users` WHERE `ip` = '$pc_ip'";
                    $res = mysqli_query($conn, $query2);
                    $id = mysqli_fetch_assoc($res);
                    $des_ip = $row['ip'];
                    $q = "SELECT `id` FROM `ready_users` WHERE `ip` = '$des_ip'";
                    $r = mysqli_query($conn, $q);
                    $des_num = mysqli_fetch_assoc($r);
                    ?>
                    <tr>
                        <td><?php echo ($row['pay'] == 1 ? '<i class="glyphicon glyphicon-check" style="color:green"></i>' : '<i class="glyphicon glyphicon-remove" style="color:red"></i>');?></td>
                        <td><?php echo $row['end_time']; ?></td>
                        <td><?php echo $row['start_time']; ?></td>
                        <td><?php echo $des_num['id']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['melli']; ?></td>
                        <td><?php echo $row['l_name']; ?></td>
                        <td><?php echo $row['f_name']; ?></td>
                        <td><?php echo $row['year']." / ".$row['month']." / ".$row['day']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                <?php
            }

            ?>



            </tbody>
        </table>
    </div>

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
