<!DOCTYPE html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<?php include "connection.php"; ?>

<?php
session_start();    // starts a new session
$errCtr = 0;
$errMsgs = [];

// Performs validation when the form is submitted
if (isset($_POST['register'])) {    // checks if the form has been submitted
    // Stores what was in 'uname' (the username prompt) in variable if it's valid
    $username = validUsername($_REQUEST['uname']);
    
    // Stores what was in 'psw1' and 'psw2' (the password prompts) in variables if it's valid
    $password = validPassword($_REQUEST['psw1'], $_REQUEST['psw2']);
}
?>

<body>
    <div id="wrapper3" class="special">
        <div id="container">
            <?php
            create();

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
             * @param String $psw1 represents the password that was entered
             * @param String $psw2 represents the password that was re-entered
             *
             * @return String returns either null or a valid password
             */
            function validPassword(String $psw1, String $psw2)
            {
                global $errCtr, $errMsgs;
                // Represents the length
                $pattern = "/(?=.*[A-Z|a-z])(?=.*\d)(?=.*[\W|_])[A-Za-z\d\W_]{8,}$/";
                $format1 = preg_match($pattern, $psw1) && preg_match("/^\S{8,}$/", $psw1);
                $format2 = preg_match($pattern, $psw2) && preg_match("/^\S{8,}$/", $psw2);
                        
                if (empty(trim($psw1)) || empty(trim($psw2))) {
                    $errMsgs[] = "\t<p>Password should be entered and re-entered</p>";
                    $errCtr++;
                    $psw1 = null;
                } else {
                    if ($psw1 != $psw2) {
                        $errMsgs[] = "\t<p>A different password was entered</p>";
                        $errCtr++;
                        $psw1 = null;
                    } elseif (!$format1  || !$format2) {
                        $errMsgs[] = "\t<p>Invalid password, $psw1 should be at least 8 characters long with no whitespace characters and contain at least one letter, one number, and one special chatacter</p>";
                        $errCtr++;
                        $psw1 = null;
                    }
                }
                        
                return $psw1;
            }

            /**
             * Checks if the user's account should be created
             *
             * @return void
             */
            function create()
            {
                global $errCtr;

                if ($errCtr == 0) {
                    $created = createUser();

                    if ($created) {
                        header("Location: http://localhost/PHPatriots/login.php");
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
                    
                echo "\t<a href='register.html'>Click here to try again</a>";
            }

            
            /**
             * Finds users in the database
             *
             * @return bool
             */
            function createUser()
            {
                global $username, $password, $con;

                try {
                    // Prepare and binds placeholders
                    $query = "INSERT INTO Accounts (username, password) VALUES (?, ?)";
                    $prep_insert = $con->prepare($query);
                    $prep_insert->bind_param("ss", $uname, $psw);
                    
                    // Sets parameters and execute prepare statement
                    $uname = $username;
                    $psw = password_hash($password, PASSWORD_DEFAULT);
                    $prep_insert->execute();
                    
                    // End prepare statement
                    $prep_insert->close();

                    return true;
                } catch (Exception $e) {
                    echo "<script>console.error('" . $e->getMessage() . "');</script>";
                    return false;
                }
            }
            ?>
        </div>
    </div>
</body>