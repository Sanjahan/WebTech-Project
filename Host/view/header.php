<script>

function searchPosts() {

let search = document.getElementById("search").value;
let table = document.getElementById("post-table");

for (let i = table.rows.length - 1; i > 0; i--) {
    table.deleteRow(i);
}

if(search === "" || search.trim() === '') return;

let xhttp = new XMLHttpRequest();
xhttp.open('GET', '../controller/get-posts.php?address=' + search, true);
xhttp.send();

xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        result = JSON.parse(this.responseText);
        if (result.length > 0) {
            result.forEach(data => {
                addRow(table, data);
            });
        }
        else{
            let newRow = table.insertRow(table.rows.length);
            newRow.innerHTML = '<tr><td align=\"center\">No Posts Available</td></tr>';
        }
    }
}
}


function addRow(table, rowdata) {

let newRow = table.insertRow(table.rows.length);

let cell1 = newRow.insertCell(0);

cell1.innerHTML = '<font size=8>'+ rowdata.Username +'</font>&nbsp;&nbsp;&nbsp;&nbsp;<font size=4>'+ rowdata.PostDate +'</font><br><br>'+ rowdata.Address +'<br><br>Rent: '+ rowdata.Rent +' <br><br>'+ rowdata.Status +'<br><br></br>'

}

</script>
<?php

    require_once('../model/profile-model.php');
    
    $user = getUserByID($_COOKIE["id"]);

?>
<table width="100%" border="0" cellspacing="0"  cellpadding="25" align="center" style="background-color: #F9E79F;">
    <tr>
        <td>
            <a href="home.php">Home</a>
        </td>
        <td align=center>
            <input type="text" placeholder='Search By Address...' size="80px" id="search" onkeyup="searchPosts()">
        </td>
        <td align=right>
            <a href="profile.php"><?php echo $user["Username"] ?></a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="notification.php">Notifications</a> &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="../controller/logout-process.php">Logout</a>
        </td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="20" id="post-table">
    <tr>
        <td>

        </td>
    </tr>
</table>