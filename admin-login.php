<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="/media/css/login.css">


</head>

<body>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>
<div id="login">
    <form name='form-login' action="services/validation.php" method="post">
        <span class="fontawesome-user"></span>
        <input type="text" id="user" placeholder="Username" required = "" name="login">
        <span class="fontawesome-lock"></span>
        <input type="password" id = "pass" placeholder="Password" required = "" name="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>
