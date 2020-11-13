<?php
/**
 * Connects to the server and the database that is being used for this site
 */
$con = @new mysqli("localhost", "root", "", "bytejam2020", 3306);

// Checks for connection errors and displays messages based on the error that occurred (if any)
if ($con->connect_error) {
    echo "<h1>Connect Error " . $con->connect_errno . " " . $con->connect_error . "</h1>\n";
    echo "<h2>This website is temporily unavailabe due to a serious error with our server. We are currently working on fixing this issue, sorry for the inconvience!</h2>\n";
    echo "<a href='oilTycoon.php'>Click here to pass the time</a>";
    echo "</body>";    // adds the ending <body> tag
    echo "<script>document.body.style.backgroundColor = '#fff';</script>\n";
    // exit() is used to stop all other code from being executed when errors occur
    exit();
} else {
    echo "<script>console.log('Connection was successful!')</script>\n";
}