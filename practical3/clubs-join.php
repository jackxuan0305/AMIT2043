<!DOCTYPE html>
<html>

<head>
    <?php include "header.php"; ?>
        }
</head>

<body>
    <?php
    function printSpace($num){
        for ($i = 0; $i < $num; $i++) {
            print "&nbsp";
        }
    }
    print "<form action='/php/Practical3/clubs-result.php' method='post'>";
    print "<h1> Join TARUC's interest clubs </h1>";
    print "Gender : ";
    printSpace(13);
    print "<input type ='radio' name='Gender' value='M'><label for='Male'>Male</label>";
    print "<input type ='radio' name='Gender' value='F'><label for='Female'>Female</label><br><br>";
    print "Name : ";
    printSpace(14);
    print "<input name='Name' value='' maxlength='30'></input><br><br>";
    print "Mobile Phone : ";
    printSpace(1);
    print "<input name='Phone' value='' maxlength='12'></input><br><br>";
    print "Interest Clubs :&nbsp (Select 1 to 3 clubs)<br>";

    $club = array(
        "LD" => "Ladies Club",
        "GT" => "Gentlemen Club",
        "DT" => "DOTA and Gaming Club",
        "MG" => "Manga and Comic Club",
        "PS" => "Pet Society Club",
        "FV" => "Farmville Club"
    );

    foreach ($club as $value => $text) {
        printSpace(24);
        print "<input type ='checkbox' name='club" . $value . "'value='" . $value . "'><label for='ladiesClub'>" . $text . "</label><br>";
    }
    print "<p><input type='submit' value='Submit'>";
    print "<input style='margin-left:5px;' type='button' value='Reset' onclick='window.location.reload();'</p>";
    ?>
</body>

<footer>
    <?php include "footer.php"; ?>
</footer>

</html>