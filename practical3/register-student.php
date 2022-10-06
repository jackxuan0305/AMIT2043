<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
    <style>
        .account {
            outline-style: solid;
            outline-color: cornflowerblue;
            outline-width: thin;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 15px;
            max-width: 450px;
            height: 15px;
            background-color: powderblue;
            color: blue;
        }

        .errorAccount {
            outline-style: solid;
            outline-color: hotpink;
            outline-width: thin;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 15px;
            max-width: 450px;
            height: 15px;
            background-color: pink;
            color: red;
        }
    </style>
</head>

<body>
    <?php
    function printSpace($num){
        for ($i = 0; $i < $num; $i++) {
            print "&nbsp";
        }
    }

    print "<h1>Register Student Account</h1><br>";
    $studentID = $password = $confirmPassword = $studentName = $email = "";
    $tickStudentID = $tickPassword = $tickConfirmPassword = $tickStudentName = $tickGender = $tickState = $tickEmail = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $studentID = $_POST['studentID'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $studentName = $_POST['studentName'];
        $email = $_POST['email'];

        $checkError = $size = 0;
        $emptyStudentID = $emptyPassword = $emptyConfirmPassword = $emptyStudentName = $emptyEmail = 0;
        $validStudentID = $validPassword = $validConfirmPassword = $validStudentName = $validEmail = 0;
        $validPassword2 = $emptyGender = $emptyState = 0;


        if (empty($studentID)) {
            $checkError = $emptyStudentID = 1;
            $size += 17;
        } elseif (!preg_match("/[0-9]{2}[X]{3}[0-9]{5}/", $studentID)) {
            $checkError = $validStudentID = 1;
            $size += 17;
        }
        if (empty($password)) {
            $checkError = $emptyPassword = 1;
            $size += 17;
        } elseif (strlen($password) < 8 || strlen($password) > 15) {
            $checkError = $validPassword = 1;
            $size += 17;
        } elseif (!preg_match("/[a-zA-Z0-9_]/", $password)) {
            $checkError = $validPassword2 = 1;
            $size += 34;
        }
        if (empty($confirmPassword)) {
            $checkError = $emptyConfirmPassword = 1;
            $size += 17;
        } elseif ($confirmPassword != $password) {
            $checkError = $validConfirmPassword = 1;
            $size += 17;
        }
        if (empty($studentName)) {
            $checkError = $emptyStudentName = 1;
            $size += 17;
        } elseif (!preg_match("/[a-zA-Z\s,.'-]/", $studentName)) {
            $checkError = $validStudentName = 1;
            $size += 34;
        }
        if (empty($_POST['Gender'])) {
            $checkError = $emptyGender = 1;
            $size += 17;
        }
        if (empty($_POST['state'])) {
            $checkError = $emptyState = 1;
            $size += 17;
        }
        if (empty($email)) {
            $checkError = $emptyEmail = 1;
            $size += 17;
        } elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
            $checkError = $validEmail = 1;
            $size += 17;
        }

        if ($checkError == 0) {
            print "<div class = 'account'>";
            print "Hi, <b>" . $studentName . "</b>, your account has been created. [ <a href> Check </a> ]<br>";
            print "</div>";
        } else {
            print "<div style='padding-bottom: " . $size . "px;' class='errorAccount'>";
            if ($emptyStudentID == 1) {
                $tickStudentID = "&#10060";
                print " - <b>Student ID</b> cannot be empty <br>";
            }
            if ($validStudentID == 1) {
                $tickStudentID = "&#10060";
                print " - <b>Student ID</b> is of invalid format. Format: 99XXX99999. <br>";
            }
            if ($emptyPassword == 1) {
                $tickPassword = "&#10060";
                print " - <b>Password</b> cannot be empty <br>";
            }
            if ($validPassword == 1) {
                $tickPassword = "&#10060";
                print " - <b>Password</b> must be between 8 and 15 characters. <br>";
            }
            if ($validPassword2 == 1) {
                $tickPassword = "&#10060";
                print " - <b>Password</b> must contain only uppercase, lowercase alphabet, digit and underscore. <br>";
            }
            if ($emptyConfirmPassword == 1) {
                $tickConfirmPassword = "&#10060";
                print " - <b>Confirm Password</b> cannot be empty <br>";
            }
            if ($validConfirmPassword == 1) {
                $tickConfirmPassword = "&#10060";
                print " - <b>Confirm Password</b> must match the password. <br>";
            }
            if ($emptyStudentName == 1) {
                $tickStudentName = "&#10060";
                print " - <b>Student Name</b> cannot be empty <br>";
            }
            if ($validStudentName == 1) {
                $tickStudentName = "&#10060";
                print " - <b>Student Name</b> must contain only uppercase, lowercase alphabet, space, comma, single-quote, dot, dash and slash. <br>";
            }
            if ($emptyGender == 1) {
                $tickGender = "&#10060";
                print " - <b>Gender</b> cannot be empty <br>";
            }
            if ($emptyState == 1) {
                $tickState = "&#10060";
                print " - Please select a <b>state</b>. <br>";
            }
            if ($emptyEmail == 1) {
                $tickEmail = "&#10060";
                print " - <b>Email</b> cannot be empty. <br>";
            }
            if ($validEmail == 1) {
                $tickEmail = "&#10060";
                print " - <b>Email</b> must follow the correct email format (@) and end with .com. <br>";
            }


            print "</div>";
        }
    }

    print "<p margin-top: 10px;></p>";
    print "<form method='post' action='register-student.php'>";
    print "Student ID :";
    printSpace(16);
    print "<input type='text' name='studentID' value='' maxlength='10'></input>$tickStudentID<br><br>";
    print "Password : ";
    printSpace(17);
    print "<input type='password' name='password' value='' maxlength='15'></input>$tickPassword<br><br>";
    print "Confirm Password : ";
    printSpace(2);
    print "<input type='password' name='confirmPassword' value='' maxlength='15'></input>$tickConfirmPassword<br><br>";
    print "Student Name : ";
    printSpace(9);
    print "<input type='text' name='studentName' value='' maxlength='30'></input>$tickStudentName<br><br>";
    print "Gender : ";
    printSpace(18);
    print "<input type ='radio' name='Gender' value='F'><label for='Female'>Female</label>";
    print "<input type ='radio' name='Gender' value='M'><label for='Male'>Male</label>$tickGender<br><br>";
    print "<label for='state'>State : </label>";
    printSpace(23);
    print "<select id='state' name='state'>";
    print "<option value=''>-- Selected One --</option>";

    $state = array(
        "JH" => "Johor",
        "KH" => "Kedah",
        "KT" => "Kelantan",
        "KL" => "Kuala Lumpur",
        "MK" => "Melaka",
        "NS" => "Negeri Sembilan",
        "PH" => "Pahang",
        "PR" => "Perak",
        "PG" => "Pinang",
        "PL" => "Perlis",
        "PJ" => "Putrajaya",
        "SA" => "Selangor",
        "SB" => "Sabah",
        "SW" => "Sarawak",
        "TR" => "Terengganu",
    );

    foreach ($state as $key => $value) {
        print "<option value='$key'>$value</option>";
    }
    print "</select>$tickState<br><br>";

    print "Email Address : ";
    printSpace(7);
    print "<input type='text' name='email' value='' maxlength='30'></input>$tickEmail<br><br>";
    print "<p><input type='submit' value='Submit'>";
    print "<input style='margin-left:5px;' type='button' value='Reset' onclick='location.reload();'</p>";
    print "</form>";

    ?>
</body>
<footer>
    <?php include "footer.php"; ?>
</footer>

</html>