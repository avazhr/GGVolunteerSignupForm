function medicalCheck() {
    var checkbox = document.getElementById("medical-checkbox");
    var medicalLicenceLv = document.getElementById("medical-licenseLv");
    if (checkbox.checked == true) {
        medicalLicenceLv.style.display = "block";
    } else {
        medicalLicenceLv.style.display = "none";
    }
}

function medicalUncheck() {
    var checkbox = document.getElementById("medical-uncheckbox");
    var medicalLicenceLv = document.getElementById("medical-licenseLv");
    if (checkbox.checked == true) {
        medicalLicenceLv.style.display = "none";
    } else {
        medicalLicenceLv.style.display = "block";
    }
}

function otherMedicalLv() {
    var lv = document.getElementById("lv");
    console.log(lv);
    if (lv.selectedIndex == 10) {
        medicalLicenseLvAns.style.display = "block";
    } else {
        medicalLicenseLvAns.style.display = "none";
    }
}

function printScreen() {
    window.location.href = "thankYouPage.html";
}


function outputStuff() {
    var name = document.getElementById("firstName").value;
    console.log(name);
}

// function showDate {
//     // Show the available dates for that particular sport
//     var sportsSelection = document.getElementById("sports");
//     var dateOptions = document.getElementById("available-dates");
//     var mysql = require('mysql');
//
//     var con = mysql.createConnection({
//         host: "localhost",
//         user: "root",
//         password: "password",
//         database: "georgid6_wo3496"
//     });
//
//     con.connect(function(err) {
//         if (err) throw err;
//         con.query("SELECT startDate, endDate FROM wp_wjwg_volunteer_admin WHERE startDate = sportSelection", function (err, result) {
//             if (err) throw err;
//             console.log(result);
//         });
//     });
//
//     // var selectedSports = sportsSelection.value;
//     if (sportsSelection.selected === true) {
//         dateOptions.style.display = "block";
//     } else {
//         dateOptions.style.display = "none";
//     }
// }


