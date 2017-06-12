<?php
session_start();
ob_start();

include_once('dbconn.php');

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

$pc_name = $_SERVER['SERVER_NAME'];


$q2 = "SELECT * FROM `ready_users` WHERE `ip` = '$pc_name'";
$r2 = mysqli_query($conn, $q2);
$row_person = mysqli_fetch_array($r2);

$user_name = $row_person['f_name'];
$last_name = $row_person['l_name'];
$user_id = $row_person['melli'];
$start = $row_person['begin_time'];

if ($user_id == ""){
    header('Location: index.php');
}

date_default_timezone_set("Asia/Tehran");

if (isset($_POST['btn-end'])) {
    $query_for_user_exist = "SELECT `isReady` FROM `ready_users` WHERE `ip` = '$pc_name'";
    $result_for_user_exist = mysqli_query($conn, $query_for_user_exist);
    $array_for_user_exist = mysqli_fetch_array($result_for_user_exist);
    $is_user_exist = $array_for_user_exist['isReady'];
    if ($is_user_exist == 1){
        $end_time = date("h:i:sa");
        $isReady = 0;
        $query = "UPDATE `ready_users` SET `end_time`= '$end_time', `isReady`= '$isReady' WHERE `ip` = '$pc_name'";
        $result = mysqli_query($conn, $query);

        $query2 = "SELECT `ip` FROM `ready_users` WHERE `ip` = '$pc_name'";
        $result2 = mysqli_query($conn, $query2);
        $ip_count = mysqli_num_rows($result2);

        if ($result && $ip_count == 1) {
            $conn = null;
            header('Location: recipt.php');


        } else {
            $errTyp = "danger";
            $errMSG = "آی پی این کامپیوتر در پایگاه داده موجود نیست، با کارشناس بخش تماس بگیرید.";
            $conn = null;
        }
    }
    else{
        header('Location: index.php');
    }


}
?>
<!DOCTYPE html>
<html>
<head>
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
            margin: 0;
            font-family: "Iranian Sans";
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }

        li {

            float: left;
            margin: 1%;

        }

        li a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;

        }

        .main {
            padding: 16px;
            margin-top: 30px;
            height: 1500px; /* Used in this example to enable scrolling */
        }

        .button {
            font-family: "Iranian Sans";
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        .ids li {
            text-align: right;
            float: right !important;
            direction: rtl;
            font-family: "Agency FB", "Iranian Sans";
            color: aliceblue;
            list-style-type: none;
            font-size: larger;
            margin: 2%;
        }

    </style>

</head>
<body>
<div  class="container">
   <div class="row">
       <div style="margin-top: 10%" class="col-md-offset-4 col-md-4">
           <div class="panel panel-default">
               <div style="text-align: center" class="panel-heading">مشخصات کاربری</div>
               <div style="text-align: right;direction: rtl" class="panel-body">
                   <div style="text-align: center" class="col-md-offset-3 col-md-6">
                       <p>  <?php echo $user_name . " " . $last_name ?></p>
                       <p> <?php echo $user_id ?></p>
                       <p> <?php echo $start ?></p>
                   </div>
                   <div style="text-align: center" class="col-md-offset-1 col-md-10">
                       <form action="" method="post">
                           <button style="font-size: x-small" name="btn-end" class="button" onclick="closeBrowser();">برای پایان دادن به کار خود کلیک کنید</button>
                       </form>
                       <br>
                       <!--<a target="_blank" href="http://9fnyQiLYUtEBrsuOK2OwheJxgtRUqEn3NpCJrlS5SZfQlvrgypynA4W7PqVqOaC.irandoc.ac.ir">برای وارد شدن به تالار کلیک کنید</a>-->
                       <!--172.16.0.6     talar.irandoc.ac.ir
                       172.16.0.7     9fnyQiLYUtEBrsuOK2OwheJxgtRUqEn3NpCJrlS5SZfQlvrgypynA4W7PqVqOaC.irandoc.ac.ir-->
                   </div>


               </div>

               <div style="font-size: large;font-weight: bold;color: red;text-align: center" class="panel-footer">
                   <p>تا پایان یافتن کار این صفحه را نبندید</p>
                   <hr>
                   <p style="direction: rtl">برای باز کردن مجدد صفحه تالار، این صفحه را Refresh کنید</p>
               </div>
           </div>
       </div>
   </div>
</div>


<script>
    var s = window.open('http://9fnyQiLYUtEBrsuOK2OwheJxgtRUqEn3NpCJrlS5SZfQlvrgypynA4W7PqVqOaC.irandoc.ac.ir/','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=1200,height=600');
    /*var dest = new Date();
    dest.setHours(17, 45, 0, 0);
    var now = new Date();
    var t = dest - now;

    setTimeout(function () {
        alert("مراجعه کننده گرامی زمان استفاده از سیستم 15 دقیقه دیگر به پایان خواهد رسید. خواهشمند است در این مدت کار خود را به پایان برسانید. باتشکر");
    }, t);*/


</script>
<!--<script language="JavaScript">
    window.onbeforeunload = confirmExit;
    function confirmExit() {
        return "You have attempted to leave this page. Are you sure?";
    }
</script>-->

<script>
    function closeBrowser(){
        s.close();
    }
</script>
</body>
</html>
