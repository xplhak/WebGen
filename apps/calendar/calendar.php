<?php

/*
    Copyright (c) 2009 Vladimír Tesařík

    Permission is hereby granted, free of charge, to any person
    obtaining a copy of this software and associated documentation
    files (the "Software"), to deal in the Software without
    restriction, including without limitation the rights to use,
    copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following
    conditions:
    
    The above copyright notice and this permission notice shall be
    included in all copies or substantial portions of the Software.
    
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
    EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
    OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
    NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
    HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
    WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
    OTHER DEALINGS IN THE SOFTWARE.
*/

    session_start();
    $_SESSION["sundayFirst"] = false;
    if (!empty($_POST["sunday_first"])) {
        $_SESSION["sundayFirst"] = ($_POST["sunday_first"] == 1);
    }

    $sundayFirst = $_SESSION["sundayFirst"];

    /* Public holidays */
    $hols[1][1] = "Den obnovy samostatného českého státu";
    $hols[5][8] = "Den vítězství";
    $hols[7][5] = "Den slovanských věrozvěstů Cyrila a Metoděje";
    $hols[7][6] = "Den upálení mistra Jana Husa";
    $hols[9][28] = "Den české státnosti";
    $hols[10][28] = "Den vzniku samostatného československého státu";
    $hols[11][17] = "Den boje za svobodu a demokracii";


    // doplnit do hlavicky <link href="calendar.css" rel="stylesheet" type="text/css" />
?>

<table border="1" class="calendar">
    <tr>
        <?php
            if ($sundayFirst) {
                print "<th>Ne</th>";
            }
        ?>
        <th>Po</th>
        <th>Út</th>
        <th>St</th>
        <th>Čt</th>
        <th>Pá</th>
        <th>So</th>
        <?php
            if (!$sundayFirst) {
                print "<th>Ne</th>";
            }
        ?>
    </tr>
    <?php
        $day = date("j");
        $month = date("n");
        $year = date("Y");
        $actualMonth = mktime(0, 0, 1, $month, 1, $year);
        $firstDayInMonth = date("w", $actualMonth);
        if (!$sundayFirst) {
            $firstDayInMonth = ($firstDayInMonth + 6) % 7;
        }

        print "<tr>";
        for ($i = 0; $i < $firstDayInMonth; $i++) {
            print "<td class=\"gap\"></td>";
        }

        $daysInMonth = date("t", $actualMonth);
        
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $class = "day";
            $title = ($i == $day) ? "Dnes" : "";

            switch (($i + $firstDayInMonth - 1) % 7) {
                case 0:
                    if ($sundayFirst) {
                        $class = "weekend";
                    }
                    break;

                case 5:
                    if (!$sundayFirst) {
                        $class = "weekend";
                    }
                    break;

                case 6:
                    $class = "weekend";
                    break;

                default:
                    break;
            }

            if ($i == $day) {
                $class = "today";
            }

            if (array_key_exists($month, $hols) && array_key_exists($i, $hols[$month])) {
                $class = "holiday";
                $title = $hols[$month][$i];
            }

            print "<td class=\"$class\" title=\"$title\">$i</td>";
            if (($firstDayInMonth + $i - 1) % 7 == 6) {
                print "</tr>";
                if ($i < $daysInMonth) {
                    print "<tr>";
                }
            }
        }

        for ($i = 0; $i < 7 - (($daysInMonth + $firstDayInMonth) % 7); $i++) {
            print "<td class=\"gap\"></td>";
        }
        print "</tr>";
    ?>
</table>