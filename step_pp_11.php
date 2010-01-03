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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$hobby_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_11'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_11']["$key"] = changeVar($value);
        }
    }
    
    echo "<h1>".$hobby_title[$language]."</h1>";  
?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul id="ul_hobbies" class="clear">
        <li class="hobbies_copy">
            <label>
                <span class="span_hobbies"></span> <span class="hobbies_label"><?php echo $hobby_hobby1[$language]; ?></span>
                <input name="hobby_data[]" type="text" onkeyup="hobbies(this, 'span_submit_button', '<?php echo $hobby_next[$language]; ?>', '<?php echo $hobby_emptyprev[$language]; ?>', '<?php echo $hobby_emptyfirst[$language]; ?>', '<?php echo $hobby_valid[$language]; ?>', '<?php echo $hobby_invalid[$language]; ?>', '<?php echo $hobby_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'hobby')" onfocus="hobbies(this, 'span_submit_button', '<?php echo $hobby_next[$language]; ?>', '<?php echo $hobby_emptyprev[$language]; ?>', '<?php echo $hobby_emptyfirst[$language]; ?>', '<?php echo $hobby_valid[$language]; ?>', '<?php echo $hobby_invalid[$language]; ?>', '<?php echo $hobby_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'hobby')" />
            </label>
        </li>
    </ul>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>