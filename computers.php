<?php
session_start();
ob_start();

include("jdf.php");
include("dbconn.php");
include_once("heading.html");
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    die("Connection failed : " . mysqli_error());
}


date_default_timezone_set("Asia/Tehran");

$query = "SELECT * FROM `ready_users` WHERE 1";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery-2.1.1.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: "Iranian Sans";
        }

        .jumbotron {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 10px;
            margin-top: 5%;
        }

    </style>
</head>
<body>
<div class="container">
    <div style="text-align: center;padding: 1%" class="jumbotron">
        <h3>راهبری کامپیوترهای تالار</h3>
    </div>

</div>
<div style="margin-bottom: 5%" class="container">

    <?php while ($row = mysqli_fetch_array($result)) { ?>
        <div style="text-align: center;float: right;font-family: 'Arial';font-weight: bold;font-size: small;margin-bottom: 5%" class="col-md-2">
            <?php
            if ($row['isReady'] == 1) {
                ?>
                <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcNA.png">
                <p><?php echo 'PC NO: ' . $row['id']; ?></p>
                <p><?php echo $row['f_name']. " " . $row['l_name']; ?></p>
                <p><?php echo $row['begin_time']; ?></p>
                <!--<p><?php /*echo 'آی پی: ' . $row['ip'];*/?></p>-->
                <!--<p><?php /*echo 'مشغول'; */?></p>-->
            <?php } else {
                ?>
                <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcA.png">
                <p><?php echo 'PC NO: ' . $row['id']; ?></p>
               <!-- <p><?php /*echo 'آی پی: ' . $row['ip'];*/?></p>-->
                <!--<p><?php /*echo 'آماده برای سرویس دهی'; */?></p>-->
            <?php } ?>

        </div>
    <?php } ?>
    <div style="margin: 20%;" class="row">
        <div class="col-md-12">
            <button style="margin-top:10%;width: 100%" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> کامپیوترها در یک نگاه</button>
        </div>
    </div>


    <div id="myModal" class="modal fade" role="dialog">
        <div style="width: 85%" class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">همه سیستم&#8202;ها در یک نگاه</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM `ready_users` WHERE 1";
                        $result = mysqli_query($conn, $query);
                        ?>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <div style="text-align: center;float: right;font-family: 'Arial';font-weight: bold;" class="col-md-1">
                                <?php
                                if ($row['isReady'] == 1) {
                                    ?>
                                    <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcNA.png">
                                    <p><?php echo $row['id']; ?></p>
                                    <!--<p><?php /*echo 'آی پی: ' . $row['ip'];*/?></p>-->
                                    <!--<p><?php /*echo 'مشغول'; */?></p>-->
                                <?php } else {
                                    ?>
                                    <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcA.png">
                                    <p><?php echo $row['id']; ?></p>
                                    <!-- <p><?php /*echo 'آی پی: ' . $row['ip'];*/?></p>-->
                                    <!--<p><?php /*echo 'آماده برای سرویس دهی'; */?></p>-->
                                <?php } ?>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once ("footer.html");
?>


</body>
</html>