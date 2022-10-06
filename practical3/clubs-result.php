<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <style>
        li {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    $genderError = $nameError = $phoneError = $clubError = 0;
    $emptyGender = $emptyName = $emptyPhone = $emptyClub = 0;
    $validName = $validPhone = $validClub = 0;
    $validGenderM = $validGenderF = 0;

    if (empty($_POST['Gender'])) {
        $genderError = $emptyGender = 1;
    } 
    elseif (($_POST['Gender'] == 'M') && isset($_POST['clubLD'])) {
        $genderError = $validGenderM = 1;
    } 
    elseif (($_POST['Gender'] == 'F') && isset($_POST['clubGT'])) {
        $genderError = $validGenderF = 1;
    }

    if (empty($_POST['Name'])) {
        $nameError = $emptyName = 1;
    } 
    elseif (!preg_match("/[a-zA-Z\s'.,-]/", $_POST['Name'])) {
        $nameError = $validName = 1;
    }

    if (empty($_POST['Phone'])) {
        $phoneError = $emptyPhone = 1;
    } 
    elseif (!preg_match("/01[0-9]{1}[-]{1}[0-9]{7}/", $_POST['Phone'])) {
        $phoneError = $validPhone = 1;
    }


    $club = array("clubLD", "clubGT", "clubDT", "clubMG", "clubPS", "clubFV");

    $clubCount = 0;
    foreach ($club as $value) {
        if (isset($_POST[$value])) {
            $clubCount++;
        }
    }

    if ($clubCount == 0) {
        $clubError = $emptyClub = 1;
    }

    if ($clubCount >= 4) {
        $clubError = $validClub = 1;
    }

    print "</ul>";

    if ($genderError == 0 && $nameError == 0 && $phoneError == 0 && $clubError == 0) {
        print "<h1> Thanks for joining</h1>";
        if ($_POST['Gender'] == 'M') {
            print "<h3>Mr." . $_POST['Name'] . "</h3>";
        }
        if ($_POST['Gender'] == 'F') {
            print "<h3>Mrs." . $_POST['Name'] . "</h3>";
        }
        print "You have joined the following clubs: <br>";

        print "<ul>";
        foreach ($club as $value) {
            if (isset($_POST[$value])) {
                if ($value == "clubLD") {
                    print "<li style='color:black;'>Ladies Club (LD)</li>";
                }
                if ($value == "clubGT") {
                    print "<li style='color:black;'>Gentlemen Club (GT)</li>";
                }
                if ($value == "clubDT") {
                    print "<li style='color:black;'>Dance Club (DT)</li>";
                }
                if ($value == "clubMG") {
                    print "<li style='color:black;'>Music Club (MG)</li>";
                }
                if ($value == "clubPS") {
                    print "<li style='color:black;'>Photography Club (PS)</li>";
                }
                if ($value == "clubFV") {
                    print "<li style='color:black;'>Fashion Club (FV)</li>";
                }
            }
        }
        print "</ul>";
    } else {
        print "<h1> OOPS... There are input errors</h1>";
        print "<ul>";
        if ($emptyGender == 1) {
            print "<li><p>Gender is <b>required</b></p></li>";
        }
        if ($validGenderM == 1) {
            print "<li><p>Sorry. Males are not allowed to join the <b>Ladies Club.</b></p></li>";
        }
        if ($validGenderF == 1) {
            print "<li><p>Sorry. Females are not allowed to join the <b>Gentlemen Club.</b></p></li>";
        }
        if ($emptyName == 1) {
            print "<li><p>Please enter your <b>Name.</b></p></li>";
        }
        if ($validName == 1) {
            print "<li><p>Name can only contain <b>alphabets, space, single-quote, dot, dash and slash.</b></p></li>";
        }
        if ($emptyPhone == 1) {
            print "<li><p>Please enter your <b>mobile phone</b> number.</p></li>";
        }
        if ($validPhone == 1) {
            print "<li><p>Mobile phone number must follow format: <b>[999-9999999] and start with '01'.</b></p></li>";
        }
        if ($emptyClub == 1) {
            print "<li><p>Please select your <b>interest clubs.</b></p></li>";
        }
        if ($validClub == 1) {
            print "<li><p>You cannot select more than 3 <b>clubs.</b></p></li>";
        }
        print "</ul>";
        print "<p>[ <a href='' onclick='history.back()'>Back</a> ]</p>";
    }
    ?>

</body>
<footer>
    <?php include "footer.php"; ?>
</footer>

</html>