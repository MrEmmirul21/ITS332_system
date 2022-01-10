<html>
<head>
    <title>Basic PHP</title>
    <script language=javascript>
        function checkPassword()//to ensure Password & Confirmation Password are match
    {
        var passmatch = true;
        var p1 = document.getElementById("pass1").value;
        var p2 = document.getElementById("pass2").value;
         
        if(p1 != p2)
        {
            alert("Password do not match");
            passmatch = false;
        }
        return passmatch;
    }</script>
</head>

<body>
    <form id="register" name="register" method="post" action="pregister.php">
    <table border="1" style="table-align:center">
        <tr>
            <td>Student No:</td>
            <td><input type="text" name="studno" id="studno" required/></td>
        </tr>
        <tr>
            <td>Student Name:</td>
            <td><input type="text" name="studname" id="studname" required/></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="pass1" id="pass1" required/></td>
        </tr>
        <tr>
            <td>Confirmation password:</td>
            <td><input type="password" name="pass2" id="pass2" required/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="btnsignin" id="btnsignin" value="Register" class="btn btn-info" onclick="return checkPassword()"/></td>
        </tr>
    </table>
    </form>
</body>
</html>