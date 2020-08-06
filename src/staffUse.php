<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="Volunteer Sign up Form" name="description">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="stylesheet.css" rel="stylesheet"/>
</head>

<body>

<header style="text-align:center;background-color: rgb(0, 142, 204); padding: 30px">
    <h1 style="color:white;">GG20 VOLUNTEER FORM AVAILIBILITY UPDATE SHEET</h1>
    <p style="color:white;">Staff Use Only</p>
</header>

<form action="staff_add.php" style="padding: 16px;">

    <label><b>Add Sports</b></label>
    <p>If you select "Others", you can specify the name of the sport</p>
    <select class="dropbtn" name="sport" id="sport" onchange='checkSports(this.value);' required>
        <option selected value="blank">Pick a sport to add</option>
        <option value="Wrestling">Wrestling</option>
        <option value="BB Gun/Ninja/Soccer">BB Gun/Ninja/Soccer</option>
        <option value="Pickleball/Fencing">Pickleball/Fencing</option>
        <option value="Swim/Tennis">Swim/Tennis</option>
        <option value="Swim-Adult">Swim-Adult</option>
        <option value="Footgolf/Disc Golf">Footgolf/Disc Golf</option>
        <option value="Various">Various</option>
        <option value="Track">Track</option>
        <option value="Swim-Lake/Racquet">Swim-Lake/Racquet</option>
        <option value="Soccer">Soccer</option>
        <option value="Baton">Baton</option>
        <option value="Others">Others</option>
    </select>
    <input id="hidden" name="hidden" style='display:none' type="text"/>

    <br>
    <br>
    <label class="control-label" for="start-date"><b>Start Date: </b></label>
    <input class="form-control mr-sm-2" type="date" class="form-control" id="start-date" name="start-date" required>
    <br>
    <br>
    <label class="control-label" for="end-date"><b>End Date: </b></label>
    <input class="form-control mr-sm-2" type="date" class="form-control" id="end-date" name="end-date" required>

    <br>
    <br>

    <button type="submit" class="registerbtn">Add Sports</button>

</form>

<form action="staff_delete.php" style="padding: 16px;">
    <label><b>Delete Sports</b></label><br><br>
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
        $sqli = "SELECT sport FROM wp_wjwg_volunteer_admin;";
        echo '<select class="dropbtn" name="sport-delete" id="sport-delete">
              <option selected value="blank">Pick a sport to delete</option>';
        if ($result = mysqli_query($conn, $sqli)) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
            }
            echo '</select><br><br>';
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

    <button type="submit" class="registerbtn">Delete Sports</button>

</form>

<form action="staff_modify.php" style="padding: 16px;">
    <label><b>Modify Sports</b></label><br><br>
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
        $sqli = "SELECT sport FROM wp_wjwg_volunteer_admin;";
        echo '<select class="dropbtn" name="sport-modify" id="sport-modify">
              <option selected value="blank">Pick a sport to modify</option>';
        if ($result = mysqli_query($conn, $sqli)) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
            }
            echo '</select><br>';
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

    <div style="margin-top: 22px" class="container">
        <label><b>Sport: </b></label>
        <input type="text" placeholder="Sports you want to change to" name="sport-modified" id="sport-modified"
               required>
        <br>
        <label class="control-label" for="start-date"><b>Start Date: </b></label>
        <input class="form-control mr-sm-2" type="date" class="form-control" id="start-date" name="start-date" required>
        <br><br>
        <label class="control-label" for="end-date"><b>End Date: </b></label>
        <input class="form-control mr-sm-2" type="date" class="form-control" id="end-date" name="end-date" required>
    </div>
    <br>
    <button type="submit" class="registerbtn">Mdoify Sports</button>
</form>

<script type="text/javascript">

    function checkSports(val) {
        if (val === "Others")
            document.getElementById('hidden').style.display = 'block';
        else
            document.getElementById('hidden').style.display = 'none';
    }

    function printScreen() {
        window.location.href = "staffUse.html";
    }

    // var startDate = new Date("2017-10-01"); //YYYY-MM-DD
    // var endDate = new Date("2017-10-07"); //YYYY-MM-DD
    //
    // var getDateArray = function(start, end) {
    //     var arr = new Array();
    //     var dt = new Date(start);
    //     while (dt <= end) {
    //         arr.push(new Date(dt));
    //         dt.setDate(dt.getDate() + 1);
    //     }
    //     return arr;
    // }
    //
    // var dateArr = getDateArray(startDate, endDate);
    //
    // // Output
    // document.write("<p>Start Date: " + startDate + "</p>");
    // document.write("<p>End Date: " + endDate + "</p>");
    // document.write("<p>Date Array</p>")
    // for (var i = 0; i < dateArr.length; i++) {
    //     document.write("<p>" + dateArr[i] + "</p>");
    // }


</script>

</body>
</html>