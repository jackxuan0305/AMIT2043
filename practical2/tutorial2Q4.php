<!DOCTYPE html>
<html>

<body>

    <?php
    //Q4a
    function getGrade($mark)
    {
        if ($mark >= 80) {
            return 'A';
        } else {
            if ($mark >= 70) {
                return 'B';
            }
            if ($mark >= 60) {
                return 'C';
            }
            if ($mark >= 50) {
                return 'D';
            }
            if ($mark < 50) {
                return 'F';
            }
        }
    }

    //4b
    function getComment($grade)
    {
        switch ($grade) {
            case 'A':
                return 'Passed with distinction<br>';
            case 'B':
            case 'C':
                return 'Passed<br>';
            case 'D':
                return 'Passed with condition<br>';
            case 'F':
                return 'Failed<br>';
        }
    }

    //4c
    $marks = array(
        array("Alex", 90),
        array("Barbie", 65),
        array("Christine", 45),
        array("Danny", 55),
        array("Elaine", 75),
    );

    print "<style>table, th, td {border: 1px solid black;}</style>";
    print "<table><th>Name</th><th>Mark</th><th>Grade</th><th>Comment</th>";
    foreach ($marks as $value) {
        echo "<tr><td>$value[0]</td><td>"
            . "$value[1]" . "%</td><td>"
            . getGrade($value[1]) . "</td><td>"
            . getComment(getGrade($value[1])) . "</td></tr><br>";
    }
    ?>

</body>
</html>