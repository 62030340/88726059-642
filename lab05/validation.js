function formValidation() {
    var uid = document.registform.userid;
    var passid = document.registform.passid;
    var uname = document.registform.username;
    var uadd = document.registform.address;
    var ucountry = document.registform.country;
    var uzip = document.registform.zip;
    var uemail = document.registform.email;
    var usex = document.registform.sex;
    if (validateuserID(uid, 5, 12)) {
        if (validatePassword(passid, 7, 12)) {
            if (allletter(uname)) {
                if (alphanumeric(uadd)) {
                    if (countryselect(ucountry)) {
                        if (allnumeric(uzip)) {
                            if (validateEmail(uemail)) {
                                if (validateGender(usex)) {}
                            }
                        }
                    }
                }
            }
        }
    }

    return false;
}

function validateUserID(uid, min, max) {
    var error = "";
    var illegalChars = /\W/;
    if (uid.value == "") {
        uid.style.background = 'Yellow';
        error = "กรุณาป้อน User ID\n";
        alert(error);
        uid.focus();
        return false;
    } else if ((uid.value.length < min) || (uid.value.length > max)) {
        uid.style.background = 'Yellow';
        error = "User ID ต้องมีความยาว " + min + "-" + max + " ตัวอักษร\n";
        alert(error);
        uid.focus();
        return false;
    } else if (illegalChars.test(uid.value)) {
        uid.style.background = 'Yellow';
        error = "User ID มีตัวอักษรที่ไม่ได้รับอนุญาต\n";
        alert(error);
        uid.focus();
        return false;
    } else {
        uid.style.background = 'White';
    }
    return true;
}