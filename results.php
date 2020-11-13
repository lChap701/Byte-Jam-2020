<!DOCTYPE html>

<html>
<?php
    $st = htmlspecialchars($_GET["st"]);
    $party = htmlspecialchars($_GET["party"]);
    include "connection.php";
    $stateTrm = trim($st, " \t\n\r");
    $partyTrm = trim($party, " \t\n\r");
    $sql = "SELECT * FROM electionresults NATURAL JOIN candidates WHERE party = '" . $partyTrm . "' AND st = '" . $stateTrm . "'";

    $result = $con->query($sql);
    $row = $result->fetch_assoc();
?>

<head>
    <title>ElectionResults</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<style>
#ontainer {
    position: absolute;
}
</style>

<body>
    <?php include "css/navbar.php"?>
    <div id="container">
        <div id="state-container">
            <?php
            if ($result->num_rows > 0) {
                echo
                    "<h4>State: " . $row["st"] .
                    "</h4>\n<p>Canadate: " . $row["name"] .
                    "</p>\n<p>Party: " . $row["party"] .
                    "</p>\nPopular Vote: " . $row["popVotes"] * 100 .
                    "%</p>\nElectoral Votes: " . $row["electVotes"];
            } else {
                echo $result->num_rows ." results";
            }
            ?>
        </div>
    </div>

    <div id="states">
        <img src="images/votes-college-state.jpg" alt="votes-college-state">
    </div>


</body>

</html>