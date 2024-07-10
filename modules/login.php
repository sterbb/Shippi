<?php require_once '../classes/Login.php';

if(isset($_SESSION["name"])){
    header("location: javascript://history.go(-1)");
}

if(isset($_SESSION["admin"])){
    header("location: javascript://history.go(-1)");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- jQuery library -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>

    
    <title>Login Form</title>
</head>
<body onload="displayDT()">

    <div class="container">
        <div class="left-side">
            <h1 class="dt" id="time"></h1>
            <h2 class="dt" id="date"></h2>
        </div>
        <div class="right-side">
                <h1 class="login">LOGIN FORM</h1>
                <form role="form" method="POST" autocomplete ="nope">
                    <label for="username" class="txt">Username:</label><br>
                    <input type="text" id="username" name="username" class="input" required><br><br>
                    <label for="password" class="txt">Password:</label><br>
                    <input type="password" id="password" name="password" class="input" required><br><br>
                    <h3 class="error">Username or Password is INVALID</h3>
                    <button type="submit" name="submit">Login</button>
                </form>
                <a href="loginAdmin.php"><button class="btn2" style="margin-top:10%;"><i class="fas fa-user-shield" ></i></button></a>
        </div>

    </div>
</body>
</html>
<link rel="stylesheet" href="../assests/css/login.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>


<?php

    if(isset($_POST['submit'])){
        $login = new customerAuthentication();
        $login ->auth();   
    }
?>

