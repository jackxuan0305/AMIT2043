<!DOCTYPE html>
<html>

<body>

    <?php
    //Q6
    $states = array(
        array("JH", "Johor"),
        array("KD", "Kedah"),
        array("KT", "Kelantan"),
        array("KL", "Kuala Lumpur"),
        array("LB", "Labuan"),
        array("MK", "Malaka"),
        array("NS", "Negeri Sembilan"),
        array("PH", "Pahang"),
        array("PN", "Penang"),
        array("PR", "Perak"),
        array("PI", "Perlis"),
        array("PJ", "Putrajaya"),
        array("SB", "Sabah"),
        array("SW", "Sarawak"),
        array("SG", "Selangor"),
        array("TR", "Terengganu"),
    );

    $unorderedList .= "<ul>";

    foreach ($states as $value) {
        $unorderedList .= "<li>" . $value[1] . "(". $value[0] .")" . "</li>";
    }

    $unorderedList .= "</ul>";

    echo $unorderedList;

    ?>

</body>

</html>