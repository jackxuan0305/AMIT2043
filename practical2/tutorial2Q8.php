<!DOCTYPE html>
<html>

<body>

    <?php
    //Q8
    function GenerateDatePicker(){
        
        $date = date("d F Y");
        $date = explode(" ", $date);

        $day = $date[0];
        $month = $date[1];
        $year = $date[2];

        $dayOptions = "";
        $monthOptions = "";
        $yearOptions = "";

        $monthList = array(
            array("January", "1"),
            array("February", "2"),
            array("March", "3"),
            array("April", "4"),
            array("May", "5"),
            array("June", "6"),
            array("July", "7"),
            array("August", "8"),
            array("September", "9"),
            array("October", "10"),
            array("November", "11"),
            array("December", "12")
        );
   
        for ($i = 1; $i <= 31; $i++) {
            if ($i == $day) {
                $dayOptions .= "<option value='" . $i . "' selected>" . $i . "</option>";
            } 
            else {
                $dayOptions .= "<option value='" . $i . "'>" . $i . "</option>";
            }
        }

        for ($i = 0; $i < 12; $i++) {
            if ($monthList[$i][0] == $month) {
                $monthOptions .= "<option value='" . $monthList[$i][1] . "' selected>" . $monthList[$i][0] . "</option>";
            } 
            else {
                $monthOptions .= "<option value='" . $monthList[$i][1] . "'>" . $monthList[$i][0] . "</option>";
            }
        }

        for ($i = $year; $i >= 2002; $i--) {
            if ($i == $year) {
                $yearOptions .= "<option value='" . $i . "' selected>" . $i . "</option>";
            } 
            else {
                $yearOptions .= "<option value='" . $i . "'>" . $i . "</option>";
            }
        }

        $datePicker = "<select name='day'>" . $dayOptions . "</select>";
        $datePicker .= "<select name='month'>" . $monthOptions . "</select>";
        $datePicker .= "<select name='year'>" . $yearOptions . "</select>";

        return $datePicker;
    }

    print GenerateDatePicker();
    ?>

</body>
</html>