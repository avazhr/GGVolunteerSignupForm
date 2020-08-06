<?php
session_start();

$sport = $_REQUEST['sport'];
if($sport == "Others") {
    $sport = $_REQUEST['hidden'];
}
$sportsId = uniqid('sports');
$date1 = strtr($_REQUEST['start-date'], '/', '-');
$date2 = strtr($_REQUEST['end-date'], '/', '-');
$startdate = date('Y-m-d', strtotime($date1));
$enddate = date('Y-m-d', strtotime($date2));

$host = "127.0.0.1";
$port = 3306;
$socket = "";
//    $dbusername = "georgid6_volunteer";
//    $dbpassword = "DXD_((Eq5gZq";
$dbusername = "root";
$dbpassword = "password";
$dbname = "georgid6_wo3496";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
} else {
    // Attempt insert query execution
    $sql = "INSERT INTO wp_wjwg_volunteer_admin (sport, sports_id, start_date, end_date) VALUES ('$sport','$sportsId','$startdate','$enddate')";

    if($conn->query($sql)) {
        echo "<script>alert('Records added successfully.')</script>";
        header("Location:staffUse.html");
    } else {
        echo "<script>alert('Update Failed!')</script>";
        echo "Error: " . $sql . "" . $conn->error;
        // header("Location:index.php");
    }

    // Close connection
    $conn->close();
    session_unset();
    session_destroy();
}
?>