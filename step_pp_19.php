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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_css_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        $_SESSION['step_pp_19'] = array();    

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_19']["$key"] = changeVar($value);
        }  
    }
    
    echo "<h1>".$webgen_css_title[$language]."</h1>";  

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul class="clear">
    
        <li>
            <label>
                <input checked="checked" name="css_choice" value="pp1" type="radio" <?php if (!isset($_SESSION['step_pp_19']['css_choice']) || $_SESSION['step_pp_19']['css_choice'] != "pp2") { echo "checked=\"checked\""; } ?> onclick="show_echo('<?php echo $webgen_css_choice_info[$language].$webgen_css_choice_pp1[$language]."', '".$submit_button_info[$language]; ?>')" />
                <?php echo $webgen_css_choice_pp1[$language]; ?>
                <img src="themes/pp1/preview/preview.png" title="<?php echo $webgen_css_choice_pp1_info[$language]; ?>" alt="<?php echo $webgen_css_choice_pp1_info[$language]; ?>" style="border:0;width:250px" />
            </label>
        </li>
        
        <li>
            <label>
                <input name="css_choice" value="pp2" type="radio" <?php if ($_SESSION['step_pp_19']['css_choice'] == "pp2") { echo "checked=\"checked\""; } ?> onclick="show_echo('<?php echo $webgen_css_choice_info[$language].$webgen_css_choice_pp2[$language]."', '".$submit_button_info[$language]; ?>')" />
                <?php echo $webgen_css_choice_pp2[$language]; ?>
                <img src="themes/pp2/preview/preview.png" title="<?php echo $webgen_css_choice_pp2_info[$language]; ?>" alt="<?php echo $webgen_css_choice_pp2_info[$language]; ?>" style="border:0;width:250px"  />
            </label>
        </li>
    
        <li>
            <label>
                <input name="css_choice" value="pp3" type="radio" <?php if ($_SESSION['step_pp_19']['css_choice'] == "pp3") { echo "checked=\"checked\""; } ?> onclick="show_echo('<?php echo $webgen_css_choice_info[$language].$webgen_css_choice_pp3[$language]."', '".$submit_button_info[$language]; ?>')" />
                <?php echo $webgen_css_choice_pp3[$language]; ?>
                <img src="themes/pp3/preview/preview.png" title="<?php echo $webgen_css_choice_pp3_info[$language]; ?>" alt="<?php echo $webgen_css_choice_pp3_info[$language]; ?>" style="border:0;width:250px"  />
            </label>
        </li>    
    
        <li>
            <label>
                <input name="css_choice" value="pp4" type="radio" <?php if ($_SESSION['step_pp_19']['css_choice'] == "pp4") { echo "checked=\"checked\""; } ?> onclick="show_echo('<?php echo $webgen_css_choice_info[$language].$webgen_css_choice_pp4[$language]."', '".$submit_button_info[$language]; ?>')" />
                <?php echo $webgen_css_choice_pp4[$language]; ?>
                <img src="themes/pp4/preview/preview.png" title="<?php echo $webgen_css_choice_pp4_info[$language]; ?>" alt="<?php echo $webgen_css_choice_pp4_info[$language]; ?>" style="border:0;width:250px"  />
            </label>
        </li>
        
        <li>
            <label>
                <input name="css_choice" value="pp5" type="radio" <?php if ($_SESSION['step_pp_19']['css_choice'] == "pp5") { echo "checked=\"checked\""; } ?> onclick="show_echo('<?php echo $webgen_css_choice_info[$language].$webgen_css_choice_pp5[$language]."', '".$submit_button_info[$language]; ?>')" />
                <?php echo $webgen_css_choice_pp5[$language]; ?>
                <img src="themes/pp5/preview/preview.png" title="<?php echo $webgen_css_choice_pp5_info[$language]; ?>" alt="<?php echo $webgen_css_choice_pp5_info[$language]; ?>" style="border:0;width:250px"  />
            </label>
        </li>       
    
        <li>
            <label>
                <input name="css_choice" value="pp6" type="radio" <?php if ($_SESSION['step_pp_19']['css_choice'] == "pp6") { echo "checked=\"checked\""; } ?> onclick="show_echo('<?php echo $webgen_css_choice_info[$language].$webgen_css_choice_pp6[$language]."', '".$submit_button_info[$language]; ?>')" />
                <?php echo $webgen_css_choice_pp6[$language]; ?>
                <img src="themes/pp6/preview/preview.png" title="<?php echo $webgen_css_choice_pp6_info[$language]; ?>" alt="<?php echo $webgen_css_choice_pp6_info[$language]; ?>" style="border:0;width:250px"  />
            </label>
        </li>
    </ul>    

    <label>
        <span id="span_submit_button"><?php if (isset($_SESSION['step_pp_19']['css_choice'])) { echo $webgen_css_choice_info[$language].${"webgen_css_choice_{$_SESSION['step_pp_19']['css_choice']}"}[$language]; } else { echo $webgen_css_choice_info[$language].$webgen_css_choice_pp1[$language]; } ?></span> <span id="span_submit_button_info"><?php echo $submit_button_info[$language]; ?></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>