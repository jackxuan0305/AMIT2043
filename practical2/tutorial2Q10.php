<!DOCTYPE html>
<html>

<body>

    <?php
    //Q10
    $s1 = 'INVALID-IC-NUM';
    $s2 = '999999-01-1234';
    $s3 = '900231-01-1234';
    $s4 = '900214-01-1234';

    $correct = "Valid<br>";
    $incorrect = "Invalid<br>";

    $pattern = "/[0-9]{2}[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{4}/";

    function isValidIC($ic){

        $year = substr($ic, 0, 2);
        $month = substr($ic, 2, 2);
        $day = substr($ic, 4, 2);

        if (checkdate($month, $day, $year)) {
            return true;
        } else {
            return false;
        }
    }

    print "<pre>";
    print $s1 . " = ";
    print isValidIC($s1) ? $correct : $incorrect;
    print $s2 . " = ";
    print isValidIC($s2) ? $correct : $incorrect;
    print $s3 . " = ";
    print isValidIC($s3) ? $correct : $incorrect;
    print $s4 . " = ";
    print isValidIC($s4) ? $correct : $incorrect;
    print "</pre>";
    ?>



</body>

</html>