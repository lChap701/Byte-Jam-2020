<!DOCTYPE html>
<html>

<head>
    <title>Accounts</title>
    <script src="js/enableFields.js" defer></script>
    <link rel="stylesheet" href="css/styles.css">
</head>

<?php session_start(); ?>

<body>
    <div id="wrapper4">
        <div id="form-container">
            <h1>Accounts</h1>
            <form method="POST" action="update.php">
                <label for="uname">Username</label>
                <input type="text" placeholder="Enter Username" name="uname" value="<?php
                if (isset($_SESSION["uname"])) {
                    echo $_SESSION["uname"];
                } ?>" readonly>

                <label for="psw">Password</label>
                <input type="password" placeholder="Enter Password" name="psw" readonly>

                <input type="submit" name="save" value="Save" disabled>

                <div id="link-container">
                    <input type="button" value="Edit" onclick="enableFields();" />
                    <a href="index.php" title="Cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>