<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <style>
        .question {
            
            outline-style: solid;
            outline-color: white;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 30px;
            max-width: 200px;
            outline-width: thick;
            height: 40px;
            background-color: powderblue;
        }
    </style>

    <title>PHP Test</title>
</head>

<body>
    <?php

    print "<form action='/php/Practical3/kinder-math-result.php' method='post'>";
    for ($i = 0; $i < 5; $i++) {
        $first = rand(1, 9);
        $second = rand(1, 9);
        print "<input type='hidden' name='firstQuestion" . $i . "' value='" . $first . "'>";
        print "<input type='hidden' name='secondQuestion" . $i . "' value='" . $second . "'>";
        print "<div class = 'question'> Q" . ($i + 1) . ".    " . $first . " + " . $second . " = <input type='text' id='answer' name='answer" . $i . "' maxlength='2' size='2' value=''><br></div>";
    }
    print "<p><input type='submit' value='Submit'>";
    print "<input style='margin-left:5px;' type='button' value='Re-generate' onclick='window.location.reload();'</p>";
    print "</form>";
    ?>
</body>
<footer>
    <?php include "footer.php"; ?>
</footer>

</html>