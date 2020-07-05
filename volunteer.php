<?php
    $link = mysqli_connect("localhost", "georgid6_user1", "gg2020GG")
    or die ('I cannot connect to the database.');
    mysql_select_db ("georgid6_wo3496");
     
    // Escape user inputs for security
    $firstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $stAddress = mysqli_real_escape_string($link, $_REQUEST['stAddress']);
    $city = mysqli_real_escape_string($link, $_REQUEST['city']);
    $state = mysqli_real_escape_string($link, $_REQUEST['state']);
    $zip = mysqli_real_escape_string($link, $_REQUEST['zip']);
    $cellphone = mysqli_real_escape_string($link, $_REQUEST['cellphone']);
    $dayphone = mysqli_real_escape_string($link, $_REQUEST['dayphone']);
    $tshirtSize = mysqli_real_escape_string($link, $_REQUEST['tshirtSize']);
    
    // Attempt insert query execution
    $sql = "INSERT INTO wp_wjwg_volunteer_sign_up (first_name, last_name, email, str_address, str_address_2, city, state, zip, cellphone, dayphone, t_shirt_size) 
    VALUES ('$firstName', '$lastName', '$email', '$stAddress', '$city', '$state', '$zip', '$cellphone', '$dayphone', '$tshirtSize')";
    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
     
    // Close connection
    mysqli_close($link);
?>