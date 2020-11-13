<!DOCTYPE html>

<head>
    <title>Account</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<?php include "connection.php"; ?>

<?php
session_start();
$errCtr = 0;
$errMsgs = [];

// Performs validation when the form is submitted
if (isset($_POST['save'])) {    // checks if the login form has been submitted
    // Stores what was in 'uname' (the username prompt) in variable if it's valid
    $username = validUsername($_REQUEST['uname']);
    
    // Stores what was in 'psw' (the password prompt) in variable if it's valid
    $password = validPassword($_REQUEST['psw']);
}
?>

<body>
    <div id="wrapper3">
        <div id="container">
            <?php
            update();

            /**
             * Used to check if a username that was entered is valid
             *
             * @param String $uname represents the username that was entered
             *
             * @category Description
             * @package  MIT
             * @author   Lucas Chapman <lucas_chapman@stu.indianhills.edu>
             * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
             * @version  PHP: 7.4.9
             * @link     http://www.php.net
             * @return   String returns either null or a valid username
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
             * @category Description
             * @package  MIT
             * @author   Lucas Chapman <lucas_chapman@stu.indianhills.edu>
             * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
             * @version  PHP: 7.4.9
             * @link     http://www.php.net
             * @return   String returns either null or a valid password
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
             * Checks if the user's account should be created
             *
             * @return void
             */
            function update()
            {
                global $errCtr, $errMsgs, $username;

                if ($errCtr == 0) {
                    $updated = updateUser();

                    if ($updated) {
                        $_SESSION["uname"] = $username;
                        header("Location: http://localhost/PHPatriots/account.php");
                    } else {
                        displayErrors();
                    }
                } else {
                    displayErrors();
                }
            }

            /**
             * Prints error messages and error page
             *
             * @return void
             */
            function displayErrors()
            {
                global $errMsgs;
                
                echo "\t<h1>Error</h1>\n";
                reset($errMsgs);
                    
                foreach ($errMsgs as $errMsg) {
                    echo $errMsg;
                }
                    
                echo "\t<a href='account.php'>Click here to try again</a>";
            }

            
            /**
             * Updates users in the database
             *
             * @return bool
             */
            function updateUser()
            {
                global $username, $password, $con, $errMsgs;

                try {
                    $encPassword = encPsw();
                    
                    if (!password_verify($password, $encPassword)) {
                        // Prepare and binds placeholders
                        $query = "UPDATE Accounts SET username = ?, password = ? WHERE username = ?";
                        $prep_update = $con->prepare($query);
                        $prep_update->bind_param("sss", $uname1, $psw, $uname2);
                    
                        // Sets parameters and execute prepare statement
                        $uname1 = $username;
                        $psw = password_hash($password, PASSWORD_DEFAULT);
                        $uname2 = $_SESSION["uname"];
                        $prep_update->execute();
                    
                        // End prepare statement
                        $prep_update->close();

                        return true;
                    } else {
                        $errMsgs[] = "\t<p>A new password should be used</p>";
                        return false;
                    }
                } catch (Exception $e) {
                    echo "<script>console.error('" . $e->getMessage() . "');</script>";
                    return false;
                }
            }

            /**
             * Gets the encrypted password
             *
             * @return String
             */
            function encPsw()
            {
                global $con;
                $query = "SELECT username, password FROM Accounts";
                $result = $con->query($query);
                
                while ($row = $result->fetch_assoc()) {
                    if ($_SESSION["uname"] == $row["username"]) {
                        $encPsw = $row["password"];
                        break;
                    }
                }
                return $encPsw;
            }
            ?>
        </div>
    </div>

</body>