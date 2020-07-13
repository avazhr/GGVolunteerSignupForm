<?php
    // $link = mysqli_connect("localhost", "georgid6_user1", "gg2020GG")
    // or die ('I cannot connect to the database.');
    // mysql_select_db ("georgid6_wo3496");
    
    session_start();

    $generalSports = filter_input(INPUT_POST, 'medical-uncheckbox');
    $medical = filter_input(INPUT_POST, 'medical-uncheckbox');
    $licenseLevel = filter_input(INPUT_POST, 'medical-licenseLv');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $stAddress = filter_input(INPUT_POST, 'stAddress');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state_name');
    $zip = filter_input(INPUT_POST, 'zip');
    $cellphone = filter_input(INPUT_POST, 'cellphone');
    $dayphone = filter_input(INPUT_POST, 'dayphone');
    $employer = filter_input(INPUT_POST, 'employer');
    $tshirtSize = filter_input(INPUT_POST, 'tshirtSize');
    $preferredSports = filter_input(INPUT_POST, 'preferred-sports');
    $prevExperience = filter_input(INPUT_POST, 'prev-experience');
    $waiver = filter_input(INPUT_POST, 'waiver');

    console.log("FUCKKKKKKKKKK1");

    
    $host = "127.0.0.1";
    $port = 3306;
    $socket = "";
    $dbusername = "georgid6_user1";
    $dbpassword = "gg2020GG";
    $dbname = "georgid6_wo3496";

    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname, $port);
    console.log("FUCKKKKKKKKKK2");

    if (mysqli_connect_error()) {
        console.log("FUCKKKKKKKKKK3");
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    } else {
        // Attempt insert query execution

        console.log("FUCKKKKKKKKKK4");
        $sql = "INSERT INTO wp_wjwg_volunteer_sign_up (general_sports, medical, license_level, first_name, last_name, email, str_address, str_address_2, city, state_name, zip, cellphone, dayphone, employer_name, t_shirt_size, preferred_sports, prev_experience, waiver) VALUES ('$generalSports', '$medical', '$licenseLevel', '$firstName', '$lastName','$email','$stAddress','$city','$state','$zip','$cellphone','$dayphone','$employer','$tshirtSize','$preferredSports','$prevExperience','$waiver')";
        
        if($conn->query($sql)) {
            echo "<script>alert('Records added successfully.')</script>";
        } else {
            echo "<script>alert('Update Failed!')</script>";
            echo "Error: " . $sql . "" . $conn->error;
            // header("Location:index2.0.html");
        }
        
        // Close connection
        $conn->close();
        session_unset();
        session_destroy();
    }
?>