<!DOCTYPE html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<?php include "connection.php"; ?>

<?php
session_start();    // starts a new session
$errCtr = 0;
$username = null;
$password = null;
$errMsgs = [];
$_SESSION['login'] = false;

// Performs validation when the form is submitted
if (isset($_POST['login'])) {    // checks if the login form has been submitted
    // Stores what was in 'uname' (the username prompt) in variable if it's valid
    $username = validUsername($_REQUEST['uname']);
    
    // Stores what was in 'psw' (the password prompt) in variable if it's valid
    $password = validPassword($_REQUEST['psw']);
    $_SESSION['login'] = checkAccount();
    
    // Checks if the 'Remember Me' checkbox was checked
    if (isset($_POST['remember'])) {
        setcookie(
            "unme",
            $username,
            time() + 60 * 60 * 24 * 30
        );
    } else {
        // Deletes a cookie when a 'unme' cookie exists and the
        // 'Remember Me' checkbox is not checked
        if (isset($_COOKIE['unme'])) {
            // Deletes an existing cookie for the username that was entered
            setcookie("unme", $username, time() - 60 * 60 * 24 * 30);
        }
    }
}
?>

<body>
    <div id="wrapper3">
        <div id="container">
            <?php
            login();

            /**
             * Used to check if a username that was entered is valid
             *
             * @param String $uname represents the username that was entered
             *
             * @return String returns either null or a valid username
             */
            function validUsername(String $uname)
            {
                global $errCtr, $errMsgs;
                // Represents length (not including any whitespace characters such as spaces)
                $lenTrimUname = strlen(str_replace(" ", "", $uname));

                if (empty(trim($uname))) {
                    $uname = null;
                    $errMsgs[] = "\t<p>No username was entered. Note: Any white space characters that were entered were trimmed</p>";
                    $errCtr++;
                } elseif ($lenTrimUname < 2) {
                    $uname = null;
                    $errMsgs[] = "\t<p>Invalid username, " . str_replace(" ", "", $uname) . " should be at least 2 characters long and all whitespace characters will be removed</p>";
                    $errCtr++;
                } else {
                    // Used to remove all whitespace characters
                    $uname = str_replace(" ", "", $uname);
                }

                return $uname;
            }

            /**
             * Used to check if a password that was entered is valid
             *
             * @param String $psw represents the password that was entered
             *
             * @return String returns either null or a valid password
             */
            function validPassword(String $psw)
            {
                global $errCtr, $errMsgs;
                // Represents the length
                $pattern = "/(?=.*[A-Z|a-z])(?=.*\d)(?=.*[\W|_])[A-Za-z\d\W_]{8,}$/";
                $format = preg_match($pattern, $psw) && preg_match("/^\S{8,}$/", $psw);
                
                if (empty(trim($psw))) {    // checks if password was null when user tried to login
                    $errMsgs[] = "\t<p>No password was entered</p>";
                    $errCtr++;
                    $psw = null;
                } else {
                    // Checks if the length of the password is in the correct format
                    if (!$format) {
                        $errMsgs[] = "\t<p>Invalid password, $psw should be at least 8 characters long with no whitespace characters and contain at least one letter, one number, and one sepcial chatacter</p>";
                        $errCtr++;
                        $psw = null;
                    }
                }
                        
                return $psw;
            }

            /**
             * Checks if a valid username and valid password has been entered
             *
             * @return bool returns a Boolean value to store in another variable
             */
            function checkAccount()
            {
                global $username, $password;    // passes global variables to the function
                
                // Checks if a username and password has been entered
                if ($username != null && $password != null) {
                    $login = true;
                } else {
                    $login = false;
                }
                return $login;
            }

            /**
             * Checks if the user is logged in
             *
             * @return void
             */
            function login()
            {
                global $errCtr, $errMsgs, $username;

                if ($_SESSION["login"]) {
                    findUser();
                }

                if ($errCtr == 0) {
                    $_SESSION["uname"] = $username;
                    header("Location: http://localhost/PHPatriots/index.php");
                } else {
                    echo "\t<h1>Error</h1>\n";
                    reset($errMsgs);
                    
                    foreach ($errMsgs as $errMsg) {
                        echo $errMsg;
                    }
                    
                    echo "\t<a href='login.php'>Click here to try again</a>";
                }
            }

            /**
             * Finds users in the database
             *
             * @return void
             */
            function findUser()
            {
                global $username, $password, $errMsgs, $errCtr, $con;
                $found = false;

                try {
                    $query = "SELECT username, password FROM Accounts";
                    $result = $con->query($query);
                    
                    // Checks if nothing was found and if the correct password was entered
                    if ($result->num_rows == 0) {
                        $errMsgs[] = "\t<p>Account was not found</p>";
                        $errCtr++;
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            if ($username == $row["username"] && password_verify($password, $row["password"])) {
                                $found = true;
                            }
                        }

                        if (!$found) {
                            $errMsgs[] = "\t<p>Incorrect password or username was entered</p>";
                            $errCtr++;
                        }
                    }
                } catch (Exception $e) {
                    echo "<script>console.error('" . $e->getMessage(). "');</script>\n";
                }
            }
            ?>
        </div>
    </div>
</body>