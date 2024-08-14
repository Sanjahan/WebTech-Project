function loaddoc(){
    const xhr = new XMLHttpRequest();

    xhr.onload = function(){
        const container = document.getElementById("good");
        good.innerHTML = xhr.responseText;

    }

    xhr.open("GET", "editUserInfoView.php");

    xhr.send();
}