<!DOCTYPE html>

<html>

<head>
    <title>Map</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <?php include "css/navbar.php"?>
    </header>
    <div id="wrapper">
        <div id="form-container">
            <h1>Election Results</h1>
            <form action="results.php" method="GET">
                <label for="States">Choose a state:</label>
                <select id="st" name="st">
                    <option value=""></option>
                    <?php
                    $filename = "states.txt";
                    $states = file("states.txt");
                    foreach ($states as $state) {
                        echo "<option value='". $state ."'>". $state ."</option>";
                    }
                    ?>
                </select>

                <label for="party">Choose a party:</label>
                <select id="party" name="party">
                    <option value=""></option>
                    <option value="Democrat">Democrat</option>
                    <option value="Republican">Republican</option>
                    <option value="Independent">Independent</option>
                </select>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>