<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <style>
        .results {

            outline-style: solid;
            outline-color: cornflowerblue;
            outline-width: thin;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 15px;
            max-width: 250px;
            height: 15px;
            background-color: powderblue;
            color: blue;
        }

        .errorResults {
            outline-style: solid;
            outline-color: hotpink;
            outline-width: thin;
            padding-top: 10px;
            padding-right: 20px;
            padding-left: 15px;
            max-width: 250px;
            height: 15px;
            background-color: pink;
            color: red;
        }

        p {
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <?php

    print "<h1>Simple Calculator</h1><br>";
    $num1 = $num2 = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = 0;
        $checkError = 0;
        $emptyNum1 = $emptyNum2 = $numericNum1 = $numericNum2 = $validNum1 = $validNum2 = $validOperatorNum2 = 0;
        $size = 0;

        if (empty($_POST['num1'])) {
            $checkError = $emptyNum1 = 1;
            $size += 17;
        }

        if (!is_numeric($num1)) {
            $checkError = $numericNum1 = 1;
            $size += 17;
        }

        if ($num1 > PHP_INT_MAX || $num1 < (-PHP_INT_MAX - 1)) {
            $checkError = $validNum1 = 1;
            $size += 17;
        }

        if (empty($_POST['num2'])) {
            $checkError = $emptyNum2 = 1;
            $size += 17;
        }

        if (!is_numeric($num2)) {
            $checkError = $numericNum2 = 1;
            $size += 17;
        }

        if ($num2 > PHP_INT_MAX || $num2 < (-PHP_INT_MAX - 1)) {
            $checkError = $validNum2 = 1;
            $size += 17;
        }

        if ($_POST['operator'] == "Divide" && $num2 == 0) {
            $checkError = $validOperatorNum2 = 1;
            $size += 17;
        }

        if ($checkError == 0) {
            if ($_POST['operator'] == "Add") {
                $result = $num1 + $num2;
                print "<div class='results'>";
                print "<b>Add</b>: $num1 + $num2 = <b>$result</b>";
                print "</div>";
            } else if ($_POST['operator'] == "Minus") {
                $result = $num1 - $num2;
                print "<div class='results'>";
                print "<b>Minus</b>: $num1 - $num2 = <b>$result</b>";
                print "</div>";
            } else if ($_POST['operator'] == "Multiply") {
                $result = $num1 * $num2;
                print "<div class='results'>";
                print "<b>Multiply</b>: $num1 &#215; $num2 = <b>$result</b>";
                print "</div>";
            } else if ($_POST['operator'] == "Divide") {
                $result = $num1 / $num2;
                print "<div class='results'>";
                print "<b>Divide</b>: $num1 &#247 $num2 = <b>$result</b>";
                print "</div>";
            }
        } else {
            print "<div style='padding-bottom: " . $size . "px;' class='errorResults'>";
            if ($emptyNum1 == 1) {
                print " - Please enter <b>number 1</b>. <br>";
            }
            if ($numericNum1 == 1) {
                print " - <b>Number 1</b> must be an integer. <br>";
            }
            if ($validNum1 == 1) {
                print " - <b>Number 1</b> must be in the range. <br>";
            }
            if ($emptyNum2 == 1) {
                print " - Please enter <b>number 2</b>. <br>";
            }
            if ($numericNum2 == 1) {
                print " - <b>Number 2</b> must be an integer. <br>";
            }
            if ($validNum2 == 1) {
                print " - <b>Number 2</b> must be in the range. <br>";
            }
            if ($validOperatorNum2 == 1) {
                print " - <b>Number 2</b> cannot be 0. <br>";
            }
            print "</div>";
        }
    }

    print "<form method='post' action='simple-calculator.php'>";
    print "Number 1 : <input style='margin-top:5px; type='text' name='num1' value='$num1'><br>";
    print "Number 2 : <input type='text' name='num2' value='$num2'><br>";
    print "<p><input style='margin-left:5px;' type='submit' name='operator' value='Add'>";
    print "<input style='margin-left:5px;' type='submit' name='operator' value='Minus'>";
    print "<input style='margin-left:5px;' type='submit' name='operator' value='Multiply'>";
    print "<input style='margin-left:5px;' type='submit' name='operator' value='Divide'>";
    print "<input style='margin-left:5px;' type='button' value='Reset' onclick='location.reload()'></p>";
    print "</form>";

    ?>
</body>
<footer>
    <?php include "footer.php"; ?>
</footer>

</html>