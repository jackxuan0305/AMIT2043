<!DOCTYPE html>
<html>

<body>

    <?php
    //Q7

    $num = array();

    for ($i = 0; $i < 5; $i++) {
        $num[$i] = rand(0, 9999);
    }

    function printList($num){
        $list = "<ul>";
        foreach ($num as $value) {
            if($value % 2 == 0) {
                $list .= "<li style='color:red;'>" . $value . "</li>";
            }
            else{
            $list .= "<li>" . $value . "</li>";
            }
        }
        $list .= "</ul>";

        return $list;
    }
    print "Original : <br>";
    print printList($num);
    print "Ascending : <br>";
    sort($num);
    print printList($num);
    print "Descending : <br>";
    rsort($num);
    print printList($num);
    ?>

</body>

</html>