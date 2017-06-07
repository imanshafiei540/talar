<?php
session_start();
ob_start();

include_once('heading.html');
include('jdf.php');

date_default_timezone_set("Asia/Tehran");

include_once('dbconn.php');

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');
$num_rows = 1;
if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

$now = time();
$d = jdate('d', $now);
$m = jdate('m', $now);
$y = jdate('Y', $now);


if (isset($_GET['btn-search'])) {
    $val = $_GET['q'];
    $search_p = $_GET['search_param'];
    if (isset($search_p) && $search_p == 'all'){
        $query = "SELECT * FROM `all_users` WHERE";
        $query .= " (`day` LIKE '%" . mysqli_real_escape_string($conn, $d) . "%' AND";
        $query .= " `month` LIKE '%" . mysqli_real_escape_string($conn, $m) . "%' AND";
        $query .= " `year` LIKE '%" . mysqli_real_escape_string($conn, $y) . "%' ) AND";
        $query .= "( `f_name` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' OR";
        $query .= " `l_name` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' OR";
        $query .= " `melli` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' OR";
        $query .= " `phone` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' )";

        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
    }
    elseif (isset($search_p) && $search_p == 'name'){
        $query = "SELECT * FROM `all_users` WHERE";
        $query .= " (`day` LIKE '%" . mysqli_real_escape_string($conn, $d) . "%' AND";
        $query .= " `month` LIKE '%" . mysqli_real_escape_string($conn, $m) . "%' AND";
        $query .= " `year` LIKE '%" . mysqli_real_escape_string($conn, $y) . "%' ) AND";
        $query .= " (`f_name` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' OR";
        $query .= " `l_name` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' )";

        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
    }
    elseif (isset($search_p) && $search_p == 'melli'){
        $query = "SELECT * FROM `all_users` WHERE";
        $query .= " (`day` LIKE '%" . mysqli_real_escape_string($conn, $d) . "%' AND";
        $query .= " `month` LIKE '%" . mysqli_real_escape_string($conn, $m) . "%' AND";
        $query .= " `year` LIKE '%" . mysqli_real_escape_string($conn, $y) . "%' ) AND";
        $query .= " (`melli` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' )";


        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
    }
    elseif (isset($search_p) && $search_p == 'phone'){
        $query = "SELECT * FROM `all_users` WHERE";
        $query .= " (`day` LIKE '%" . mysqli_real_escape_string($conn, $d) . "%' AND";
        $query .= " `month` LIKE '%" . mysqli_real_escape_string($conn, $m) . "%' AND";
        $query .= " `year` LIKE '%" . mysqli_real_escape_string($conn, $y) . "%' ) AND";
        $query .= " (`phone` LIKE '%" . mysqli_real_escape_string($conn, $val) . "%' )";

        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
    }


}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery-2.1.1.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: "Iranian Sans";
        }

        table th {
            text-align: right;
        }

        table td {
            text-align: right;
        }

        .dropdown.dropdown-lg .dropdown-menu {
            margin-top: -1px;
            padding: 6px 20px;
        }

        .input-group-btn .btn-group {
            display: flex !important;
        }

        .btn-group .btn {
            border-radius: 0;
            margin-left: -1px;
        }

        .btn-group .btn:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .btn-group .form-horizontal .btn[type="submit"] {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .form-horizontal .form-group {
            margin-left: 0;
            margin-right: 0;
        }

        .form-group .form-control:last-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        @media screen and (min-width: 768px) {
            #adv-search {
                width: 500px;
                margin: 0 auto;
            }

            .dropdown.dropdown-lg {
                position: static !important;
            }

            .dropdown.dropdown-lg .dropdown-menu {
                min-width: 500px;
            }
        }
        .jumbotron{
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 10px;
        }

    </style>
</head>
<body>

<div class="container">


    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <form style="margin-top: 10%;margin-bottom: 5%" action="" method="get">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <button style="height: 45px" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="search_concept">بر اساس</span> <span class="caret"></span>
                        </button>
                        <ul style="text-align: right" class="dropdown-menu" role="menu">
                            <li><a href="#name">نام و نام خانوادگی</a></li>
                            <li><a href="#melli">کد ملی</a></li>
                            <li><a href="#phone">شماره تلفن</a></li>
                            <li class="divider"></li>
                            <li><a href="#all">همه</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input style="text-align: right;direction: rtl;height: 45px" type="text" class="form-control" name="q" placeholder="جست و جو">
                    <span class="input-group-btn">
                    <button name="btn-search" style="height: 45px" class="btn btn-primary" type="submit"><span
                                class="glyphicon glyphicon-search"></span></button>
                </span>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function (e) {
            $('.search-panel .dropdown-menu').find('a').click(function (e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
            });
        });
    </script>


    <?php if (isset($_GET['btn-search'])) {
        echo '<div style="padding: 1%;" class="jumbotron">
        <h3 style="text-align: center">نتایج جست و جو</h3>
        <br>

    </div>';
    } ?>

    <br>
    <table class="table table-hover">
        <?php
            if (isset($result) and mysqli_num_rows($result) != 0){
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
        </tr>
        </thead>';
            }
        ?>

        <tbody>

        <?php
        if (isset($result) and mysqli_num_rows($result) != 0){

        while ($row = mysqli_fetch_array($result)) {

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
                <td><?php echo ($row['id'] == 1 ? '<i class="fa fa-check-circle" style="color:green"></i>' : '<i class="fa fa-remove" style="color:red"></i>');?></td>
                <td><?php echo $row['end_time']; ?></td>
                <td><?php echo $row['start_time']; ?></td>
                <td><?php echo $des_num['id']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['melli']; ?></td>
            <td><?php echo $row['l_name']; ?></td>
            <td><?php echo $row['f_name']; ?></td>
            </tr>
            <?php
        }
        ?>
        <?php
        }
        elseif ($num_rows == 0){
            echo "<p style='text-align: right'>نتیجه ایی یافت نشد</p>";
        }
        ?>



        </tbody>
    </table>
</div>
<?php
include_once ("footer.html");
?>
</body>
</html>


</body>
</html>