<!DOCTYPE html>

<html>

<head>
    <title>Fun Facts</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Facts came from https://www.infoplease.com/us/states/fifty-states-and-fifty-fun-facts -->
    <header>
        <?php include "css/navbar.php";?>
    </header>
    <div id="flexBox">
        <div id="container">
            <h1>50 States of Facts</h1>
            <form action="" id="form2">
                <div class="search_box">
                    <input type="text" id="search">
                    <input type="button" id="submit_form" onclick="checkInput()" value="Search">
                </div>
            </form>

            <script>
            function checkInput() {
                var query = document.getElementById('search').value;
                window.find(query);
                return true;
            }
            </script>
            <table id="factTable">
                <tr>
                    <th>Facts</th>
                </tr>

                <?php
                    $filename = "facts.txt";
                    $facts = file("facts.txt");
                    foreach ($facts as $fact) {
                        echo "<tr><td>" . $fact . "</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>


</body>

</html>