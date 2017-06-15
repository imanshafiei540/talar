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

if (isset($_POST['end_work'])) {
    $pc_id = $_POST['pc_id'];
    $query_for_user_exist = "SELECT `isReady` FROM `ready_users` WHERE `id` = '$pc_id'";
    $result_for_user_exist = mysqli_query($conn, $query_for_user_exist);
    $array_for_user_exist = mysqli_fetch_array($result_for_user_exist);
    $is_user_exist = $array_for_user_exist['isReady'];
    if ($is_user_exist == 1){
        if (isset($_POST['end_work'])){
            $pc_id = $_POST['pc_id'];


            $end_time = date("h:i:sa");
            $isReady = 0;
            $query8 = "UPDATE `ready_users` SET `end_time`= '$end_time', `isReady`= '$isReady' WHERE `id` = $pc_id";
            $result8 = mysqli_query($conn, $query8);


            $query = "SELECT * FROM `ready_users` WHERE `id`= $pc_id ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            $now = time();
            $day = jdate('d', $now,'','Asia/Tehran','en');
            $month = jdate('m', $now,'','Asia/Tehran','en');
            $year = jdate('Y', $now,'','Asia/Tehran','en');


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
            $pc_name = $row['ip'];


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
            else {
                $errTyp = "danger";
                $errMSG = "آی پی این کامپیوتر در پایگاه داده موجود نیست، با کارشناس بخش تماس بگیرید.";
                $conn = null;
            }
        }
    }
    else{
        header('Location: computers.php');
    }
}


$query5 = "SELECT * FROM `ready_users` WHERE 1";
$result5 = mysqli_query($conn, $query5);

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

    <?php while ($row5 = mysqli_fetch_array($result5)) { ?>
        <div style="text-align: center;float: right;font-family: 'Arial';font-weight: bold;font-size: small;margin-bottom: 5%" class="col-md-2">
            <?php
            if ($row5['isReady'] == 1) {
                ?>
                <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcNA.png">
                <p><?php echo 'PC NO: ' . $row5['id']; ?></p>
                <p><?php echo $row5['f_name']. " " . $row5['l_name']; ?></p>
                <p><?php echo $row5['begin_time']; ?></p>
                <form action="" method="post">
                    <input hidden name="pc_id" value="<?php echo $row5['id']; ?>">
                    <button style="font-family: 'Iranian Sans'" class="btn btn-primary" name="end_work" type="submit">پایان کار</button>
                </form>

            <?php } else {
                ?>
                <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcA.png">
                <p><?php echo 'PC NO: ' . $row5['id']; ?></p>

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
                        $query4 = "SELECT * FROM `ready_users` WHERE 1";
                        $result4 = mysqli_query($conn, $query4);
                        ?>
                        <?php while ($row4 = mysqli_fetch_array($result4)) { ?>
                            <div style="text-align: center;float: right;font-family: 'Arial';font-weight: bold;" class="col-md-1">
                                <?php
                                if ($row4['isReady'] == 1) {
                                    ?>
                                    <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcNA.png">
                                    <p><?php echo $row4['id']; ?></p>
                                <?php } else {
                                    ?>
                                    <img style="display: block;margin: auto" width="60%" height="30%" src="img/pcA.png">
                                    <p><?php echo $row4['id']; ?></p>
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