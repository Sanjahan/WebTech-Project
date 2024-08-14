function validateReg(){
    const a = document.getElementById("name");
    const b = document.getElementById("phone");
    const c = document.getElementById("email");
    const d = document.getElementById("userType");
    const e = document.getElementById("address");
    const f = document.getElementById("password");
    const g = document.getElementById("confirmPassword");

    let flag = true;

    if (a.value === ""){
        flag = false;
        document.getElementById('error1').innerHTML = "Please fill up the name";
    }

    if (b.value === ""){
        flag = false;
        document.getElementById('error2').innerHTML = "Please fill up the phone number";
    }

    if (c.value === ""){
        flag = false;
        document.getElementById('error3').innerHTML = "Please fill up the email";
    }

    if (d.value === ""){
        flag = false;
        document.getElementById('error4').innerHTML = "Please fill up the User Type";
    }

    if (e.value === ""){
        flag = false;
        document.getElementById('error5').innerHTML = "Please fill up the address";
    }

    if (f.value === ""){
        flag = false;
        document.getElementById('error6').innerHTML = "Please fill up the password";
    }

    if (g.value === ""){
        flag = false;
        document.getElementById('error7').innerHTML = "Please fill up the confirm Password";
    }

    return flag;

}