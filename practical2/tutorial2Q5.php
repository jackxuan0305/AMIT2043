<!DOCTYPE html>
<html>

<body>

    <?php
    //Q5
    define("ROW", 10);
    define("COL", 15);

    print "<style>table, th, td {border: 1px solid black;}</style>";

    print "<table>";
    for ($i = 1; $i <= ROW; $i++) {
        if (($i + 1 + COL) % 2 == 0) {
            print "<tr style='background-color:pink'>";
        } else {
            print "<tr style='background-color:white'>";
        }

        for ($j = 1; $j <= COL; $j++) {
            echo "<td width='20px'>$i-$j</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "The table has " . ROW . " rows and " . COL . " columns";


    ?>

</body>

</html>