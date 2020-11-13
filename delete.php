<?php include "connection.php" ?>
<?php
session_start();

// Logouts the user
unset($_SESSION['login']);

deleteAccount();

// Deletes the data
setcookie("unme", $username, time() - 60 * 60 * 24 * 30);
unset($_SESSION['uname']);

/**
 * Deletes users
 *
 * @return void
 */
function deleteAccount()
{
    global $con;
    
    try {
        // Prepare and binds placeholders
        $query = "DELETE FROM Accounts WHERE username = ?";
        $prep_delete = $con->prepare($query);
        $prep_delete->bind_param("s", $username);
        
        // Sets parameters and execute prepare statement
        $username = $_SESSION["uname"];
        $prep_delete->execute();
        
        // End prepare statement
        $prep_delete->close();
    } catch (Exception $e) {
        echo "<script>console.error('" . $e->getMessage() . "');</script>";
    }
}

// Goes back to the Login page
header("Location: http://localhost/PHPatriots/login.php");

?>