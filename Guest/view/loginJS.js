function validate(){
    const x = document.getElementById("email");
    const y = document.getElementById("password");

    let flag = true;

    if (x.value === ""){
        flag = false;
        document.getElementById('error1').innerHTML = "Please fill up the email";
    }
    if (y.value === ""){
        flag = false;
        document.getElementById('error2').innerHTML = "Please fill up the password";
    }

    return flag;

}