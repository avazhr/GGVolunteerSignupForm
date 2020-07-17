<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Volunteer Sign up Form">
    <meta name="viewport" find
    /usr -name "libphp7.so"content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css"/>
    <title>GG Volunteer Sign Up Form</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js" ></script>
</head>

<body>

<header style="text-align:center;background-color: rgb(0, 142, 204); padding: 30px">
    <h1 style="color:white;">GEORGIA GAMES: 2020</h1>
    <p style="color:white;">OFFICIAL VOLUNTEER FORM</p>
</header>
<hr>

<section style="padding: 16px;">
    <form method="POST" action="volunteer.php">
        <!-- <form> -->
        <p style="font-size: 16px; font-weight: bold;">Please Select One:</p>

        <!-- Type of volunteer -->
        <label class="checkbox-container">General Sports Volunteer
            <input type="radio" name="radio" id="medical-uncheckbox" onclick="medicalUncheck()">
            <span class="checkmark"></span>
        </label>
        <label class="checkbox-container">Medical Volunteer
            <input type="radio" name="radio" id="medical-checkbox" onclick="medicalCheck()">
            <span class="checkmark"></span>
        </label>

        <div id="medical-licenseLv" style="display:none">
            <label><b>License Level:</b></label>
            <select name="dropdown" class="dropbtn" id="lv" onchange="otherMedicalLv()">
                <!-- id="medical-licenseLv" -->
                <option value="blank" selected></option>
                <option value="md">MD</option>
                <option value="pa">PA</option>
                <option value="atc">ATC</option>
                <option value="paramedic">Paramedic</option>
                <option value="emt">EMT</option>
                <option value="rn">RN</option>
                <option value="dc">DC</option>
                <option value="do">DO</option>
                <option value="1st aid">1st Aid/CPR only</option>
                <option value="other">Other:</option> <!--onclick, show blank to fill--->
            </select>
        </div>

        <input id="medicalLicenseLvAns" style="display:none" type="text" placeholder="Enter your medical license level"
               name="otherLicenseLv">

        <div style="margin-top: 22px" class="container">
            <!-- Personal Info -->

            <div class="big-row ">
              <span role="presentation" class="row-element">
                <label><b>First Name</b></label>
                <input type="text" placeholder="Please Fill" name="firstName" id="firstName" required>
              </span>

                <span role="presentation" class="row-element">
                <label><b>Last Name</b></label>
                <input type="text" placeholder="Please Fill" name="lastName" id="lastName" required>
              </span>
            </div>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="address1"><b>Address line 1</b></label>
            <input type="text" placeholder="Street address, P.O. box, company name, c/o" name="address1" id="address1"
                   required>

            <label for="address2"><b>Address line 2</b></label>
            <input type="text" placeholder="Apartment, suite, unit, building, floor, etc." name="address2" id="address2">

            <div class="big-row"> 
              <span role="presentation" class="row-element-three">
                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City" name="city" id="city" required>
              </span>

                <span role="presentation" class="row-element-three">
                <label for="state"><b>State</b></label>
                <input type="text" placeholder="Enter State" name="state" id="state" required>
              </span>

                <span role="presentation" class="row-element-three">
                <label for="zip"><b>Zip Code</b></label>
                <input type="text" placeholder="Enter Zip" name="zip" id="zip" required>
              </span>
            </div>

            <div class="big-row ">
              <span role="presentation" class="row-element">
                <label for="cellphone"><b>Cell Phone</b></label>
                <input type="text" placeholder="Enter Phone Number" name="cellphone" id="cellphone" required>
              </span>

                <span role="presentation" class="row-element">
                <label for="dayphone"><b>Day Phone</b></label>
                <input type="text" placeholder="Enter Phone Number" name="dayphone" id="dayphone" required>
              </span>
            </div>

            <label for="employer"><b>Employer</b></label>
            <input type="text" placeholder="Enter Name of Employer" name="employer" id="employer" required>

            <label for="tshirtSize" style="padding-right: 5px"><b>T-Shirt Size (Adult):</b></label>
            <select name="dropdown" class="dropbtn" id="tshirtSize">
                <option value="blank" selected></option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
                <option value="2xl">2XL</option>
                <option value="3xl">3XL</option>
                <option value="4xl">4XL</option>
            </select>
            <br>
            <br>

            <label><b>Availability: Please specify availability </b></label>

                    <?php
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
                        $query = "SELECT * FROM wp_wjwg_volunteer_admin";
                        if ( $result = $conn->query($query)) {
                            while ($row = $result->fetch_array())  {
                                $sportName = $row['sport'];
                                $sportId = $row['sports_id'];
                                $startDate = $row['start_date'];
                                $endDate = $row['end_date'];
                            }
                        } else {
                            echo "<script>alert('Query Failed!')</script>";
                            echo "Error: " . $query . "" . $conn->error;
                            // header("Location:index2.0.php");
                        }
                    }
                    // Close connection
                    $conn->close();
                    ?>
            <br>

            <select name="dropdown" class="dropbtn" id="sports">
                <option value="Blank"></option>
                <option value="<?php echo $sportName;?>"><?php echo $sportName;?></option>
<!--                <option value="BB Gun/Ninja/Soccer">BB Gun/Ninja/Soccer</option>-->
<!--                <option value="Pickleball/Fencing">Pickleball/Fencing</option>-->
<!--                <option value="Swim/Tennis">Swim/Tennis</option>-->
<!--                <option value="Swim-Adult">Swim-Adult</option>-->
<!--                <option value="Footgolf/Disc Golf">Footgolf/Disc Golf</option>-->
            </select>

            <label for="date1"><b style="padding-left:20px; padding-right: 5px;"><?php echo $startDate;?></b></label>
            <!--change to changable text-->
            <select name="dropdown" class="dropbtn" id="date1">
                <option value="s"></option>
                <option value="s">All day</option>
                <option value="m">Morning</option>
                <option value="l">Afternoon</option>
                <option value="xl">Evening</option>
                <option value="2xl">Not available</option>
            </select>

            <label for="date2"><b style="padding-left:50px; padding-right: 5px;"><?php echo $endDate;?></b></label>
            <select name="dropdown" class="dropbtn" id="date2">
                <option value="s"></option>
                <option value="s">All day</option>
                <option value="m">Morning</option>
                <option value="l">Afternoon</option>
                <option value="xl">Evening</option>
                <option value="2xl">Not available</option>
            </select>

            <br>
            <br>

            <label for="preferred-sports" style="padding-right: 5px"><b> Preferred Sports ONLY to volunteer
                    with? </b></label>
            <select name="dropdown" class="dropbtn" id="preferred-sports">
                <option value="Blank"></option>
                <option value="Wrestling">Wrestling</option>
                <option value="BB Gun/Ninja/Soccer">BB Gun/Ninja/Soccer</option>
                <option value="Pickleball/Fencing">Pickleball/Fencing</option>
                <option value="Swim/Tennis">Swim/Tennis</option>
                <option value="Swim-Adult">Swim-Adult</option>
                <option value="Footgolf/Disc Golf">Footgolf/Disc Golf</option>
            </select>

            <br>
            <br>

            <label for="prev-experience" style="padding-right: 5px"><b> Volunteered with the Georgia Games before? </b></label>
            <select name="dropdown" class="dropbtn" id="prev-experience" style="margin-bottom: 16px">
                <option value="Blank"></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <hr>

            <p>Please sign the following <a href="agreement.pdf">AGREEMENT, RELEASE AND WAIVER OF LIABILITY </a>.</p>

            <form method="POST" action="volunteer.php">
                <!-- <form> -->
                <label for="waiver">Upload the signed AGREEMENT, RELEASE AND WAIVER OF LIABILITY here:</label>
                <input type="file" id="waiver" name="waiver" accept="pdf/*">
            </form>

            <button type="submit" class="registerbtn" onclick="">Submit</button>
        </div>

    </form>
</section>


</body>
</html>