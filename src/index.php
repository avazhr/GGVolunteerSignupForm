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
    <script src="index.js"></script>
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
            <input type="radio" name="volunteer-type" id="medical-uncheckbox" onclick="medicalUncheck()"
                   value="General Sports">
            <span class="checkmark"></span>
        </label>
        <label class="checkbox-container">Medical Volunteer
            <input type="radio" name="volunteer-type" id="medical-checkbox" onclick="medicalCheck()" value="Medical">
            <span class="checkmark"></span>
        </label>

        <div id="medical-licenseLv" style="display:none">
            <label><b>License Level:</b></label>
            <select name="lv" class="dropbtn" id="lv" onchange="otherMedicalLv()">
                <!-- id="medical-licenseLv" -->
                <option value="" selected></option>
                <option value="MD">MD</option>
                <option value="PA">PA</option>
                <option value="ATC">ATC</option>
                <option value="Paramedic">Paramedic</option>
                <option value="EMT">EMT</option>
                <option value="RN">RN</option>
                <option value="DC">DC</option>
                <option value="DO">DO</option>
                <option value="1st Aid/CPR only">1st Aid/CPR only</option>
                <option value="Other">Other:</option> <!--onclick, show blank to fill--->
            </select>
        </div>

        <input id="medicalLicenseLvAns" name="lv-other" style="display:none" type="text"
               placeholder="Enter your medical license level"
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
            <input type="text" placeholder="Apartment, suite, unit, building, floor, etc." name="address2"
                   id="address2">

            <div class="big-row"> 
              <span role="presentation" class="row-element-three">
                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City" name="city" id="city" required>
              </span>

                <span role="presentation" class="row-element-three">
                <label for="state-name"><b>State</b></label>
                <input type="text" placeholder="Enter State" name="state-name" id="state-name" required>
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
            <select name="tshirtSize" class="dropbtn" id="tshirtSize">
                <option value="blank" selected></option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="2XL">2XL</option>
                <option value="3XL">3XL</option>
                <option value="4XL">4XL</option>
            </select>
            <br>
            <br>

            <label><b>Availability</b></label>
            <hr>

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
                // Drop down for sports
                $sqli = "SELECT * FROM wp_wjwg_volunteer_admin;";
                if ($result = mysqli_query($conn, $sqli)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<label><b>'.$row['sport'].'</b></label><br><br>';
                        for ($i=strtotime($row['start_date']); $i<=strtotime($row['end_date']); $i+=86400) {
                            echo '<input type="hidden" name="checkedSport" value="'.$row['sport'].'"></input>';
                            echo '<input type="checkbox" name="date[]" value="'.date("Y-m-d", $i).'">'.date("Y-m-d", $i).'</input>';
                        }
                        echo '<br><br>';
                    }
                } else {
                    echo "<script>alert('Query Failed!')</script>";
                    echo "Error: " . $sqli . "" . $conn->error;
                    // header("Location:index2.0.php");
                }
                // Close connection
                $conn->close();
            }
            ?>

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
            <select name="prev-experience" class="dropbtn" id="prev-experience" style="margin-bottom: 16px">
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
<script>
</script>
</body>
</html>