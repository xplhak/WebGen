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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$feat_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_18'] = array(); 

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_18']["$key"] = changeVar($value);
        }
    
        // kontrola, zda je zadana otazka, a zda je zadana alespon jedna odpoved (nemusi byt hned na prvnim radku)
    
        if (isset($_SESSION['step_pp_18']['features_quest_question']) && (strlen($_SESSION['step_pp_18']['features_quest_question']) == 0 || (strlen($_SESSION['step_pp_18']['features_quest_answer'][0]) == 0 && strlen($_SESSION['step_pp_18']['features_quest_answer'][1]) == 0))) {
    
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }    
    }
    
    echo "<h1>".$feat_title[$language]."</h1>";  

    if (isset($_SESSION['step_pp_18']['features_quest_question'])) {
        if (strlen($_SESSION['step_pp_18']['features_quest_question']) == 0) {
            echo "<h2 class=\"error\">".$feat_que_empty[$language]."</h2>";
        }
        
        if (strlen($_SESSION['step_pp_18']['features_quest_answer'][0]) == 0 && (!isset($_SESSION['step_pp_18']['features_quest_answer'][1]) || strlen($_SESSION['step_pp_18']['features_quest_answer'][1]) == 0)) {
            echo "<h2 class=\"error\">".$feat_answ_emptyfirst[$language]."</h2>";
        }
    }



?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul id="features" class="clear">      
        <?php
            
            if (isset($_SESSION['step_pp_5']["features_hour"]) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
        
        ?>
        <li>
            <label>
                <span id="span_features_hour_que"></span> <?php echo $feat_hour_que[$language]; ?>
                <select name="features_hour_que" onclick="hour_select(this, '<?php echo $feat_hour_choice[$language]; ?>')" onkeyup="hour_select(this, '<?php echo $feat_hour_choice[$language]; ?>')">
                    <option value="a" <?php if ($_SESSION['step_pp_18']['features_hour_que'] != "b") { echo "selected=\"selected\""; } ?> ><?php echo $feat_hour_a[$language]; ?></option>
                    <option value="b" <?php if ($_SESSION['step_pp_18']['features_hour_que'] == "b") { echo "selected=\"selected\""; } ?> ><?php echo $feat_hour_b[$language]; ?></option>
                </select>
            </label>
        </li>
        <?php
            
            } 
            if (isset($_SESSION['step_pp_5']["features_quest"]) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
        
        ?>
        <li>
            <label>
                <span id="span_features_que"></span> <?php echo $feat_que[$language] ?>
                <input name="features_quest_question" type="text" <?php if (isset($_SESSION['step_pp_18']['features_quest_question'])) { echo "value=\"".$_SESSION['step_pp_18']['features_quest_question']."\""; } ?> onkeyup="prompt_check(this, '.que_echo', '<?php echo $feat_que_empty[$language]; ?>', '<?php echo $feat_que_valid[$language]; ?>', '<?php echo $feat_que_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'question')" />
            </label>
        </li>
        
        <li>
            <ul id="ul_quest" class="clear">
                <li class="quest_copy">
                    <label>
                        <span class="que_echo"> </span> <span class="que_label"><?php echo $feat_answ[$language] ?></span>
                        <input name="features_quest_answer[]" type="text"
                            onkeyup="answer(this, 'span_submit_button', '<?php echo $feat_answ_next[$language]; ?>', '<?php echo $feat_answ_empty[$language]; ?>', '<?php echo $feat_answ_emptyfirst[$language]; ?>', '<?php echo $feat_answ_valid[$language]; ?>', '<?php echo $feat_answ_invalid[$language]; ?>', '<?php echo $feat_answ_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'answer')"
                            onfocus="answer(this, 'span_submit_button', '<?php echo $feat_answ_next[$language]; ?>', '<?php echo $feat_answ_empty[$language]; ?>', '<?php echo $feat_answ_emptyfirst[$language]; ?>', '<?php echo $feat_answ_valid[$language]; ?>', '<?php echo $feat_answ_invalid[$language]; ?>', '<?php echo $feat_answ_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'answer')" />
                    </label>
                </li>
            </ul>
        </li>
    
        
        <?php
            
            }
        
        ?>
    </ul>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"> </span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>