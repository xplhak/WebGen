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

    $_page_title = $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_presentation_type_choice_title[$language];
   
    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_all_4'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_all_4']["$key"] = $value;
        }
        
        $_SESSION['step_all_4']['presentation_full_name'] = $_SESSION['step_all_4']['presentation_name'];
        $_SESSION['step_all_4']['presentation_name'] = removeDia($_SESSION['step_all_4']['presentation_name']);
        
        // vyhodnoceni jestli neni vybrana moynost nove prezentace, ale neni zadano jeji jmeno, pripadne jestli jiz takova prezentace neexistuje
        // vyhodnoceni, jestli v pripade vybrani hodnoty editace je i vybrano, kterou prezentaci editovat.
        // vyhodnoceni, jestli v pripade vybrani hodnoty smazani je i vybrano, kterou prezentaci smazat.
        // musi byt delky alespon tri znaky
        $r = "/^[a-zA-Z0-9ěščřžýáíéĚŠČŘŽÝÁÍÉ]{1}[a-zA-Z0-9.\-_ ěščřžýáíéĚŠČŘŽÝÁÍÉ]{2}[a-zA-Z0-9.\-_ ěščřžýáíéĚŠČŘŽÝÁÍÉ]*$/";
        
        if (strlen($_SESSION['step_all_4']['presentation_name']) == 0 || !preg_match($r, $_SESSION['step_all_4']['presentation_name']) || isPresentationFree($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_4']['presentation_name']) == false) {
        
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();       
        }      
        
        array_push ($_SESSION['steps'], '5');
        $next_type = $_SESSION['step_all_4']['presentation_type'];
    }
 
?>
 
<h1><?php echo $webgen_presentation_type_choice_h1[$language]; ?></h1>


<?php

    $r = "/^[a-zA-Z0-9ěščřžýáíéĚŠČŘŽÝÁÍÉ]{1}[a-zA-Z0-9.\-_ ěščřžýáíéĚŠČŘŽÝÁÍÉ]{2}[a-zA-Z0-9.\-_ ěščřžýáíéĚŠČŘŽÝÁÍÉ]*$/";
    
    if (isset($_SESSION['step_all_4']['presentation_name'])) {
        if (strlen($_SESSION['step_all_4']['presentation_name']) == 0) {
            echo "<h2 class=\"error\">".$webgen_action_presentation_name_empty[$language]."</h2>";
        }
        elseif (isPresentationFree($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_4']['presentation_name']) == false) {
            echo "<h2 class=\"error\">".$webgen_action_action_name_duplicate[$language]."</h2>";
        } elseif (!preg_match($r, $_SESSION['step_all_4']['presentation_name'])) {
            echo "<h2 class=\"error\">".$webgen_action_presentation_name_short[$language]."</h2>";        
        }
    }

?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <ul class="clear">
        <li>
            <label>
                <input type="radio" name="presentation_type" value="pp" onclick="show_echo('<?php echo $webgen_presentation_type_choice_info[$language].$webgen_presentation_type_choice_pp[$language]; ?>')" <?php if ($_SESSION['step_all_4']['presentation_type']!="blog" || $_SESSION['step_all_4']['presentation_type']!="gall") { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_presentation_type_choice_pp[$language] ?>
            </label>
        </li>
        
        <li>
            <label>
                <input type="radio" name="presentation_type" value="blog" onclick="show_echo('<?php echo $webgen_presentation_type_choice_info[$language].$webgen_presentation_type_choice_blog[$language]; ?>')" <?php if ($_SESSION['step_all_4']['presentation_type']=="blog" ) { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_presentation_type_choice_blog[$language] ?>
            </label>
        </li>
 
        <li>
            <label>
                <input type="radio" name="presentation_type" value="gall" onclick="show_echo('<?php echo $webgen_presentation_type_choice_info[$language].$webgen_presentation_type_choice_gall2[$language]; ?>')" <?php if ($_SESSION['step_all_4']['presentation_type']=="gall") { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_presentation_type_choice_gall[$language] ?>
            </label>
        </li>
        
        <li>
            <label>
                <span id="span_presentation_name"><?php if ($_SESSION['step_all_4']['presentation_type']=="blog") { echo $webgen_presentation_type_choice_info[$language].$webgen_presentation_type_choice_blog[$language]."."; } elseif ($_SESSION['step_all_4']['presentation_type']=="gall") { echo $webgen_presentation_type_choice_info[$language].$webgen_presentation_type_choice_gall2[$language]."."; } else { echo $webgen_presentation_type_choice_info[$language].$webgen_presentation_type_choice_pp[$language]."."; } ?></span> <?php echo $webgen_action_presentation_name_label[$language] ?>
                <input type="text" id="presentation_name" name="presentation_name" <?php if (!empty($_SESSION['step_all_4']['presentation_name'])) { echo "value=\"".$_SESSION['step_all_4']['presentation_full_name']."\""; } ?> onkeyup="prompt_check(this, 'span_submit_button', '<?php echo $webgen_action_presentation_name_empty[$language]; ?>', '<?php echo $webgen_action_presentation_name_valid[$language]; ?>', '<?php echo $webgen_action_presentation_name_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'presentation', '<?php echo $webgen_action_action_name_duplicate[$language]; ?>', '<?php echo $_SESSION['step_all_2']['user_name']; ?>')" />
            </label>
        </li>   
    
    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language] ?>" />
    </label>
</form>














