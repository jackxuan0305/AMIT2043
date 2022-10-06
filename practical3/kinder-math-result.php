<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <style>
        .question {

            outline-style: solid;
            outline-color: white;
            outline-width: thick;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 30px;
            max-width: 250px;
            height: 40px;
            background-color: powderblue;
        }

        p {
            margin-top: 10px;
        }
    </style>


</head>

<body>
    <?php
    $firstQuestionPass = array();
    $answersPass = array();
    $secondQuestionPass = array();

    $check = 0;

    for ($i = 0; $i < 5; $i++) {
        $firstQuestionPass[$i] = $_POST['firstQuestion' . $i];
        $secondQuestionPass[$i] = $_POST['secondQuestion' . $i];
        $answersPass[$i] = $_POST['answer' . $i];
        if ($firstQuestionPass[$i] + $secondQuestionPass[$i] == $answersPass[$i]) {
            print "<div style = 'background-color:powderblue;' class = 'question'> Q" . ($i + 1) . ".    " . $firstQuestionPass[$i] . " + " . $secondQuestionPass[$i] . " = " . $answersPass[$i];
            echo ' &#9989 ';
            echo ' Correct!';
            $check = $check + 1;
        } 
        else {
            print "<div style = 'background-color:pink;' class = 'question'> Q" . ($i + 1) . ".    " . $firstQuestionPass[$i] . " + " . $secondQuestionPass[$i] . " = " . $answersPass[$i];
            echo ' &#10060 ';
            echo ' It should be <bold>' . $firstQuestionPass[$i] + $secondQuestionPass[$i] . '</bold>';
        }
        print "</div>";
    }

    print "<p>You get " . $check . " correct out of 5 questions. <a href='/php/Practical3/kinder-math-ques.php'>Try again</a></p>";
    ?>
</body>
<footer>
    <?php include "footer.php"; ?>
</footer>

</html>