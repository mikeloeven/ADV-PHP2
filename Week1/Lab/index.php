<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>

        
        <H1>Address List</H1>

        <?php
        require_once './helpers/dbconnect.php';
        require_once './helpers/until.php';
        $db = dbconnect();
        $addrL = getAllAddress();

        if (count($addrL) > 0) {
            echo "<table border=\"1\"><tr><th>ID</th><th>Address</th><th>city</th><th>state</th><th>zip</th></tr>";
            foreach ($addrL as $row) {
                echo "<tr><td>" . $row['addressID'] . "</td><td>" . $row['addr1'] . "<br/>" . $row['addr2'] . "</td><td>" . $row['city'] . "</td><td>" . $row['state'] . "</td><td>" . $row['zip'] . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "<h1>No Data</h1>";
        }
        ?>
        
    <form action="./add.php">
    <input type="submit" value="Add Address">
    </form>
    </body>
</html>