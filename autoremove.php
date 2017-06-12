<?php
session_start();
ob_start();
include('jdf.php');
date_default_timezone_set("Asia/Tehran");
include_once('dbconn.php');
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($conn, 'utf8');
if (!$conn) {
    die("Connection failed : " . mysqli_error());
}

if (isset($_GET['user_id']) && !empty($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $query_for_remove = "DELETE FROM `all_users` WHERE `id` = $user_id";
    $result_for_remove = mysqli_query($conn, $query_for_remove);
    if ($result_for_remove){
        header('Location: lastday.php');
    }
}
else{
    echo "<h1>Forbidden<br>There is no user_id to Remove</h1>";
}

?>
