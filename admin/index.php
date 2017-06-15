<?php
session_start();
ob_start();
include_once("heading.html");
include ("jdf.php");
include_once('dbconn.php');

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'false'){
    header('Location: login.php');
}


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
        .carousel{
            position: initial !important;
        }
        #myCarousel img{
            width: 100%;

        }

    </style>
</head>
<body>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="http://lorempixel.com/580/250/nature/1" alt="Chania">
            <div class="carousel-caption">
                <h1>پژوهشگاه علوم و فناوری اطلاعات ایران</h1>
                <p> خوش آمدید</p>
            </div>
        </div>

        <div class="item">
            <img src="http://lorempixel.com/580/250/nature/2" alt="Chania">
            <div class="carousel-caption">
                <h1>پژوهشگاه علوم و فناوری اطلاعات ایران</h1>
                <p> خوش آمدید</p>
            </div>
        </div>

        <div class="item">
            <img src="http://lorempixel.com/580/250/nature/3" alt="Flower">
            <div class="carousel-caption">
                <h1>پژوهشگاه علوم و فناوری اطلاعات ایران</h1>
                <p> خوش آمدید</p>
            </div>
        </div>

        <div class="item">
            <img src="http://lorempixel.com/580/250/nature/4" alt="Flower">
            <div class="carousel-caption">
                <h1>پژوهشگاه علوم و فناوری اطلاعات ایران</h1>
                <p> خوش آمدید</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
include_once ("footer.html");
?>
</body>
</html>