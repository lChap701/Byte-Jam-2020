<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="wrapper2">
        <div id="form-container">
            <h1>Login</h1>
            <form action="login-handler.php" method="post" name="login">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" value="<?php
                if (isset($_COOKIE['unme'])) {
                    echo $_COOKIE['unme'];
                } ?>">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw">
                <input type="submit" name="login" value="Login" />
                <label id="checkbox">
                    <input type="checkbox" checked="checked" name="remember">Remember me </label>
                <div id="link-container">
                    <a href="register.html">Create account</a>
                    <a href="reset.html">Forgot password</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>