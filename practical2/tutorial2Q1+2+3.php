<!DOCTYPE html>
<html>
<body>

<?php
        //Q1
        date_default_timezone_set("Asia/Kuala_Lumpur");
        print "<h1>" . date("d-F-Y H:i:s A") . "</h1>";

        //Q2ab
        $s1 = 'INVALID-ID';
        $s2 = '1234567890';
        $s3 = '00XXX12345';
        $s4 = '00WAD12345';
        $correct = "Matched<br>";
        $incorrect = "Not Matched<br>";

        $pattern = "/[0-9]{2}[A-Z]{3}[0-9]{5}/";

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

        //Q2c
        $s1 = 'INVALID-IDAAA';
        $s2 = '1234567890BBB';
        $s3 = '00XXX12345ABC';
        $s4 = '00WAD12345EEE';
        $correct = "Matched<br>";
        $incorrect = "Not Matched<br>";

        $pattern2 = "/[0-9]{2}[A-Z]{3}[0-9]{5}[A|C|J|P|S|W]{1}[A|B|H|P|T]{1}[A|B|C|D|P]{1}/";

        print "<pre>";
        print $s1 . " = ";
        print preg_match($pattern2, $s1) ? $correct : $incorrect;
        print $s2 . " = ";
        print preg_match($pattern2, $s2) ? $correct : $incorrect;
        print $s3 . " = ";
        print preg_match($pattern2, $s3) ? $correct : $incorrect;
        print $s4 . " = ";
        print preg_match($pattern2, $s4) ? $correct : $incorrect;
        print "</pre>";

        //Q3
        $data = array(
            array("AACS3013", 70),
            array("AACS3073", 95),
            array("AAMS3683", 55),
            array("AACS3034", 75),
            array("AHLA3413", 65),
        );

        print "<table><tr style='background-color: #cccccc'><th>COURSE</th><th>PASSING RATE</th></tr>";
        foreach ($data as $value) {
            //echo "<tr><td>" . $value[0] . " </td>";
            //echo "<td>" . $value[1] . "%</td></tr><br>";
            $bgcolor = $value[1]>=70?"lightblue":"pink";
            echo "<tr><td>$value[0]</td><td><span style='display: inline-block;"
                    . ""."background-color: $bgcolor;width: ".$value[1]*5 ."px'>"
                    . "&nbsp;</span>$value[1]%</td></tr><br>";
        }
       
        ?>

</body>
</html>
