
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

