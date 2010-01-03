<?php

/*
    Copyright (c) 2009 Jaromír Plhák

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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_birthdate_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_13'] = array();
        
        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_13']["$key"] = changeVar($value);
        }
    }
    
    echo "<h1>".$webgen_birthdate_title[$language]."</h1>";  
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul class="clear">
        <li>
            <label>
                <span id="span_birthdate"></span> <?php echo $webgen_birthdate_birthdate[$language]; ?>
                <input type="text" name="birthdate_data" <?php if (!empty($_SESSION['step_pp_13']['birthdate_data'])) { echo "value=\"".$_SESSION['step_pp_13']['birthdate_data']."\""; } ?> onkeyup="birth_check(this, 'span_birthplace', '<?php echo $webgen_birthdate_birthdate_empty[$language]; ?>', '<?php echo $webgen_birthdate_birthdate_valid_part1[$language]; ?>', '<?php echo $webgen_birthdate_birthdate_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'birthdate', '<?php echo $webgen_birthdate_birthdate_valid_part2[$language]; ?>', '<?php echo $language ?>')" />
            </label>
        </li>

        <li>  
            <label>
                <span id="span_birthplace"></span> <?php echo $webgen_birthdate_birthplace[$language]; ?>
                <input type="text" name="birthplace_data" <?php if (!empty($_SESSION['step_pp_13']['birthplace_data'])) { echo "value=\"".$_SESSION['step_pp_13']['birthplace_data']."\""; } ?> onkeyup="birth_check(this, 'span_submit_button', '<?php echo $webgen_birthdate_birthplace_empty[$language]; ?>', '<?php echo $webgen_birthdate_birthplace_valid[$language]; ?>', '<?php echo $webgen_birthdate_birthplace_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'birthplace', '')" />
            </label>
        </li>
    </ul>

    <input type="hidden" id="sign_data" name="sign_data" value="error"/>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>