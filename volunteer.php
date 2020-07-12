<?php
    // $link = mysqli_connect("localhost", "georgid6_user1", "gg2020GG")
    // or die ('I cannot connect to the database.');
    // mysql_select_db ("georgid6_wo3496");
     
    // Escape user inputs for security
    $generalSports = mysqli_real_escape_string($link, $_REQUEST('medical-uncheckbox');
    $medical = mysqli_real_escape_string($link, $_REQUEST['medical-uncheckbox']);
    $licenseLevel = mysqli_real_escape_string($link, $_REQUEST['medical-licenseLv']);
    $firstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $stAddress = mysqli_real_escape_string($link, $_REQUEST['stAddress']);
    $city = mysqli_real_escape_string($link, $_REQUEST['city']);
    $state = mysqli_real_escape_string($link, $_REQUEST['state_name']);
    $zip = mysqli_real_escape_string($link, $_REQUEST['zip']);
    $cellphone = mysqli_real_escape_string($link, $_REQUEST['cellphone']);
    $dayphone = mysqli_real_escape_string($link, $_REQUEST['dayphone']);
    $employer = mysqli_real_escape_string($link, $_REQUEST['employer']);
    $tshirtSize = mysqli_real_escape_string($link, $_REQUEST['tshirtSize']);
    $preferredSports = mysqli_real_escape_string($link, $_REQUEST['preferred-sports']);
    $prevExperience = mysqli_real_escape_string($link, $_REQUEST['prev-experience']);
    $waiver = mysqli_real_escape_string($link, $_REQUEST['waiver']);
    
    $host = "127.0.0.1";
    $port = 3306;
    $socket = "";
    $dbusername = "georgid6_user1";
    $dbpassword = "gg2020GG";
    $dbname = "georgid6_wo3496";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    } else {
        // Attempt insert query execution
        $sql = "INSERT INTO wp_wjwg_volunteer_sign_up (general_sports, medical, license_level, first_name, last_name, email, str_address, str_address_2, city, state_name, zip, cellphone, dayphone, employer_name, t_shirt_size, preferred_sports, prev_experience, waiver) 
        VALUES ('$generalSports', '$medical', '$licenseLevel', '$firstName', '$lastName', '$email', '$stAddress', '$city', '$state', '$zip', '$cellphone', '$dayphone', '$employer', '$tshirtSize', '$preferredSports', '$prevExperience', '$waiver')";
        if(mysqli_query($link, $sql)){
            echo "<script>alert('Records added successfully.')</script>";
            echo "<script>alert('Update success!')</script>";
        } else{
            echo "<script>alert('ERROR: Could not able to execute $sql.')</script>" . mysqli_error($link);
            header("Location:index2.0.html");
        }
        
        // Close connection
        mysqli_close($link);
    }

?>