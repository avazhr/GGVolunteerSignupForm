<?php
// $link = mysqli_connect("localhost", "georgid6_user1", "gg2020GG")
// or die ('I cannot connect to the database.');
// mysql_select_db ("georgid6_wo3496");

session_start();

$volunteerId = uniqid('volunteer');
$licenseLevel = filter_input(INPUT_POST, 'lv');
if ($licenseLevel == "Other") {
    $licenseLevel = filter_input(INPUT_POST, 'lv-other');
}
$volunteerType = filter_input(INPUT_POST, 'volunteer-type');
if($volunteerType == "General Sports") {
    $licenseLevel = "";
}
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$email = filter_input(INPUT_POST, 'email');
$address1 = filter_input(INPUT_POST, 'address1');
$address2 = filter_input(INPUT_POST, 'address2');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state-name');
$zip = filter_input(INPUT_POST, 'zip');
$cellphone = filter_input(INPUT_POST, 'cellphone');
$dayphone = filter_input(INPUT_POST, 'dayphone');
$employer = filter_input(INPUT_POST, 'employer');
$tshirtSize = filter_input(INPUT_POST, 'tshirtSize');
$checkedSport = $_POST['checkedSport'];
$dateChecked = $_POST['date'];
$preferredSports = filter_input(INPUT_POST, 'preferred-sports');
$prevExperience = filter_input(INPUT_POST, 'prev-experience');
$sport = filter_input(INPUT_POST, 'sports');
$waiver = filter_input(INPUT_POST, 'waiver');

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
    $sql = "INSERT INTO wp_wjwg_volunteer_sign_up (volunteer_id, type_of_volunteer, license_level, first_name, last_name, 
email, str_address, str_address_2, city, state_name, zip, cellphone, dayphone, employer_name, t_shirt_size, preferred_sports, 
prev_experience, sport, waiver) VALUES ('$volunteerId', '$volunteerType', '$licenseLevel', '$firstName', '$lastName','$email','$address1',
'$address2','$city','$state','$zip','$cellphone','$dayphone','$employer','$tshirtSize','$preferredSports','$prevExperience','$sport','$waiver')";

    if ($conn->query($sql)) {
        echo "<script>alert('Records added successfully.')</script>";
//        header("Location:thankYouPage.html");
    } else {
        echo "<script>alert('Update Failed!')</script>";
        echo "Error: " . $sql . "" . $conn->error;
        // header("Location:index2.0.php");
    }
        foreach ($dateChecked as $date) {
            $eventID = uniqid('event');
            $sql = "INSERT INTO wp_wjwg_volunteer_event (event_id, sport, date, volunteer) VALUES ('$eventID', '$checkedSport', '$date', '$volunteerId')";
            if($conn->query($sql)) {
                echo "<script>alert('Records added to events table successfully.')</script>";
                header("Location:thankYouPage.html");
            } else {
                echo "<script>alert('Update failed for events table!')</script>";
                echo "Error: " . $sql . "" . $conn->error;
                // header("Location:index.php");
            }
        }


    // Close connection
    $conn->close();
    header("Cache-Control: no cache");
    session_cache_limiter("private_no_expire");
}
session_unset();
session_destroy();
?>