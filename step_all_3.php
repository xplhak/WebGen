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

    $_page_title = $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_action_title[$language];
   
    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_all_3'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_all_3']["$key"] = $value;
        }
    
        if (($_SESSION['step_all_3']['action'] == 'edit' && !isset($_SESSION['step_all_3']['edit_presentation_name'])) || ($_SESSION['step_all_3']['action'] == 'delete' && !isset($_SESSION['step_all_3']['delete_presentation_name']))) {
        
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();       
        }
        
        if ($_SESSION['step_all_3']['action'] == 'edit') {
            unset($_SESSION['step_ppedit_5']);
             
            // preskoceni 4teho kroku u editace
            $_SESSION['steps'] = array('1', '2', '3', '5');
            
            // zde jeste zjistime typ prezentace - a podle toho zmenit typ editace 
    
           $xml = simplexml_load_file('./presentations/'.$_SESSION['step_all_2']['user_name'].'/'.$_SESSION['step_all_3']['edit_presentation_name'].'/'.$_SESSION['step_all_3']['edit_presentation_name'].'.xml');       
           
            $next_type = $xml->attributes()->presentationType."edit";  
        } 
        elseif ($_SESSION['step_all_3']['action'] == 'delete') {
            $_SESSION['steps'] = array('1', '2', '3', '4', '5');
            $next_type = "delete";
        }
        else {
            $_SESSION['steps'] = array('1', '2', '3', '4', '5');
        }
    }
?>

<h1><?php echo $webgen_action_h1[$language]; ?></h1>

<?php
    
    if ($_SESSION['step_all_3']['action'] == 'edit' && !isset($_SESSION['step_all_3']['edit_presentation_name'])) {
        echo "<h2 class=\"error\">".$webgen_action_presentation_edit_error[$language]."</h2>";
    } 
    
    if ($_SESSION['step_all_3']['action'] == 'delete' && !isset($_SESSION['step_all_3']['delete_presentation_name'])) {
        echo "<h2 class=\"error\">".$webgen_action_presentation_delete_error[$language]."</h2>";
    }

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <ul class="clear">
        <?php
        
            // promenna exist_and_filled urcuje, zda adresar uzivatele jiz existuje a zda jiz obsauje nejake prezentace
            if (file_exists('./presentations/'.$_SESSION['step_all_2']['user_name']) && fileCount('./presentations/'.$_SESSION['step_all_2']['user_name']) > 0) { $exist_and_filled = true; } else { $exist_and_filled = false; }
            
            if ($exist_and_filled) {
        
        ?>
        <li>
            <label>
                <input type="radio" name="action" value="edit" <?php if ($_SESSION['step_all_3']['action'] == 'edit' || !isset($_SESSION['step_all_3']['action'])) { echo "checked=\"checked\""; } ?> onclick="show_pres1_names('<?php echo $webgen_action_presentation_edit_error[$language]."', '".$webgen_action_edit_info[$language]."', '".$submit_button_info[$language]; ?> ')" />
                <?php echo $webgen_action_edit[$language] ?>
            </label>
        </li>             
        <?php
        
            }
        
        ?>
        <ul id="presentation_list1" class="clear" <?php if ($_SESSION['step_all_3']['action'] != 'edit' && isset($_SESSION['step_all_3']['action'])) { echo "style=\"display: none;\""; } ?> >
                <?php
                    
                    showPresentations($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_3']['edit_presentation_name'], $language, 'edit');
                    
                ?>
        </ul>
            
        <li>
            <label>
                <input type="radio" name="action" value="new" <?php if ($_SESSION['step_all_3']['action'] == 'new' || !$exist_and_filled) { echo "checked=\"checked\""; } ?> onclick="show_newpres_name()" />
                <?php echo $webgen_action_new[$language] ?>
            </label>
        </li>
        
        <?php
        
            if ($exist_and_filled) {
        
        ?> 
        <li>
            <label>
                <input type="radio" name="action" value="delete" <?php if ($_SESSION['step_all_3']['action'] == 'delete') { echo "checked=\"checked\""; } ?> onclick="show_pres2_names('<?php echo $webgen_action_presentation_delete_error[$language]."', '".$webgen_action_delete_info[$language]."', '".$submit_button_info[$language]; ?> ')" />
                <?php echo $webgen_action_delete[$language] ?>
            </label>
        </li> 
        <?php
        
            }
        
        ?> 
        <ul id="presentation_list2" class="clear" <?php if ($_SESSION['step_all_3']['action'] != 'delete') { echo "style=\"display: none;\""; } ?>>
                <?php
                    
                    showPresentations($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_3']['delete_presentation_name'], $language, 'delete');
                    
                ?>
        </ul>     
    </ul>
    
    
    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language] ?>" />
    </label>
</form>














