<!DOCTYPE html>
<html>

<body>

    <?php
    //Q9
    $s1 = 'INVALID-IC-NUM';
    $s2 = '12345678901234';
    $s3 = '123456-12-1234';
    $s4 = '900214-01-1234';

    $correct = "Matched<br>";
    $incorrect = "Not Matched<br>";

    //Q9b
    $pattern = "/[0-9]{2}[0-9]{4}[-]{1}[0-9]{2}[-]{1}[0-9]{4}/";

    print "<pre>";
    print $s1 . " = ";
    print preg_match($pattern, $s1) ? $correct : $incorrect;
    print $s2 . " = ";
    print preg_match($pattern, $s2) ? $correct : $incorrect;
    print $s3 . " = ";
    print preg_match($pattern, $s3) ? $correct : $incorrect;
    print $s4 . " = ";
    print preg_match($pattern, $s4) ? $correct : $incorrect;
    print "</pre>";

    //Q9c
    $pattern = "/[0-9]{2}(0[1-9]|1[0-2])(0[0-3]|1[0-9])[-]{1}[0-9]{2}[-]{1}[0-9]{4}/";
    
    print "<pre>";
    print $s1 . " = ";
    print preg_match($pattern, $s1) ? $correct : $incorrect;
    print $s2 . " = ";
    print preg_match($pattern, $s2) ? $correct : $incorrect;
    print $s3 . " = ";
    print preg_match($pattern, $s3) ? $correct : $incorrect;
    print $s4 . " = ";
    print preg_match($pattern, $s4) ? $correct : $incorrect;
    print "</pre>";
    ?>

    

</body>

</html>