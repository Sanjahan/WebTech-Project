function isValidLogin(form) {

    let email = form.email.value;
    let password = form.password.value;

    let flag = true;

    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a password.<br>";
        flag = false;
    }

    return flag;

}

function isValidRegistration(form) {

    let fullname = form.fullname.value;
    let email = form.email.value;
    let username = form.username.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    let securityq = form.securityq.value;
    let securityqa = form.securityqa.value;
    let flag = true;

    document.getElementById("fullnameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("confirmPasswordError").innerHTML = "";
    document.getElementById("securityQuestionError").innerHTML = "";
    document.getElementById("securityQuestionAnswerError").innerHTML = "";

    if (fullname === "") {
        document.getElementById("fullnameError").innerHTML = "Please enter your full name.<br>";
        flag = false;
    }

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    if (username === "") {
        document.getElementById("usernameError").innerHTML = "Please enter a username.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a password.<br>";
        flag = false;
    } else if (password.length < 8) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 8 characters long.<br>";
        flag = false;
    }

    if (cpassword === "") {
        document.getElementById("confirmPasswordError").innerHTML = "Please confirm your password.<br>";
        flag = false;
    }

    if (password !== cpassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.<br>";
        flag = false;
    }

    if (securityq === "Not Selected") {
        document.getElementById("securityQuestionError").innerHTML = "Please enter a security question.<br>";
        flag = false;
    }

    if (securityqa === "") {
        document.getElementById("securityQuestionAnswerError").innerHTML = "Please enter an answer to the security question.<br>";
        flag = false;
    }

    return flag;

}

function isValidForgotPassword(form) {

    let email = form.email.value;
    let flag = true;

    document.getElementById("emailError").innerHTML = "";

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    return flag;

}

function isValidCreatePost(form) {

    let address = form.address.value;
    let rent = form.rent.value;
    let flag = true;

    document.getElementById("addressError").innerHTML = "";
    document.getElementById("rentError").innerHTML = "";

    if (address.trim() === "") {
        document.getElementById("addressError").innerHTML = "Please enter your address.<br>";
        flag = false;
    }

    if (rent.trim() === "") {
        document.getElementById("rentError").innerHTML = "Please enter your desired rent.<br>";
        flag = false;
    }


    return flag;

    }


    function isValidEditProfile(form) {

        let fullname = form.fullname.value;
        let email = form.email.value;
        let username = form.username.value;
        let flag = true;

        document.getElementById("fullnameError").innerHTML = "";
        document.getElementById("emailError").innerHTML = "";
        document.getElementById("usernameError").innerHTML = "";

        if (fullname === "") {
            document.getElementById("fullnameError").innerHTML = "Please enter your full name.<br>";
            flag = false;
        }

        if (email === "") {
            document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
            flag = false;
        }

        if (username === "") {
            document.getElementById("usernameError").innerHTML = "Please enter a username.<br>";
            flag = false;
        }

        return flag;

        }

        function isValidEditPost(form) {

            let address = form.address.value;
            let rent = form.rent.value;
            let flag = true;

            document.getElementById("addressError").innerHTML = "";
            document.getElementById("rentError").innerHTML = "";

            if (address.trim() === "") {
                document.getElementById("addressError").innerHTML = "Please enter your address.<br>";
                flag = false;
            }

            if (rent.trim() === "") {
                document.getElementById("rentError").innerHTML = "Please enter your allocated rent.<br>";
                flag = false;
            }


            return flag;

            }

            function isValidChangePassword(form) {

                let prevpassword = form.prevpassword.value;
                let password = form.password.value;
                let cpassword = form.cpassword.value;
                let flag = true;
    
                document.getElementById("prevpasswordError").innerHTML = "";
                document.getElementById("passwordError").innerHTML = "";
                document.getElementById("cpasswordError").innerHTML = "";
    
                if (prevpassword.trim() === "") {
                    document.getElementById("prevpasswordError").innerHTML = "Please enter your previous password first.<br>";
                    flag = false;
                }
                if (password.trim() === "") {
                    document.getElementById("passwordError").innerHTML = "Please enter a new password.<br>";
                    flag = false;
                }
                if (cpassword.trim() === "") {
                    document.getElementById("cpasswordError").innerHTML = "Please confirm new password.<br>";
                    flag = false;
                }
    
    
                return flag;
    
                }

                function isValidForgotPassword2(form) {

                    let answer = form.answer.value;
                    let password = form.password.value;
                    let cpassword = form.cpassword.value;
                    let flag = true;
            
                    document.getElementById("answerError").innerHTML = "";
                    document.getElementById("passwordError").innerHTML = "";
                    document.getElementById("cpasswordError").innerHTML = "";
            
                    if (answer === "") {
                        document.getElementById("answerError").innerHTML = "Please enter the security question answer.<br>";
                        flag = false;
                    }
            
                    if (password === "") {
                        document.getElementById("passwordError").innerHTML = "Please enter a new password.<br>";
                        flag = false;
                    }
            
                    if (cpassword === "") {
                        document.getElementById("cpasswordError").innerHTML = "Please confirm your password.<br>";
                        flag = false;
                    }
            
                    return flag;
            
                    }
            