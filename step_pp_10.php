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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_firm_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_10'] = array();
        
        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_10']["$key"] = changeVar($value);
        }
        
        // kontrola, zda je zadan nazev firmy, ktery je povinny (tj. zda obsahuje alespon tri znaky)
        $r = "/^[a-zA-Z0-9]{1}.{2}.*$/";
    
        if (strlen($_SESSION['step_pp_10']['firmname_data']) == 0 || !preg_match($r, $_SESSION['step_pp_10']['firmname_data'])) {
    
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }
    
        // osetreni mezer v textarea
        $_SESSION['step_pp_10']['add_data'] = mynl2br($_SESSION['step_pp_10']['add_data']);
    
    }     
    
    $nextInput = array('firm_ic', 'firm_direction', 'firm_workload', 'firm_position', 'firm_address', 'firm_www', 'firm_add');
    
    $isAllFalse = true;
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"])) {
            $isAllFalse = false;
        }
    }
    
    array_unshift($nextInput, 'firm_firmname');
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"]) || $isAllFalse) {
            if ($val == 'firm_direction' || $val == 'firm_workload') {
                $a[] = '.'.$val;
            }
            else {
                $a[] = $val;
            }
        }
    }
    
    $a[] = 'submit_button';
    
    echo "<h1>".$webgen_firm_title[$language]."</h1>";  
    
    $r = "/^[a-zA-Z0-9]{1}.{2}.*$/";
    
    if (isset($_SESSION['step_pp_10']['firmname_data'])) {
        if (strlen($_SESSION['step_pp_10']['firmname_data']) == 0) {
            echo "<h2 class=\"error\">".$webgen_firm_firmname_empty[$language]."</h2>";
        }
        elseif (!preg_match($r, $_SESSION['step_pp_10']['firmname_data'])) {
            echo "<h2 class=\"error\">".$webgen_firm_firmname_short[$language]."</h2>";
        }
    }
    
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  

    <ul class="clear">  
        <li>  
            <label>
                <span id="span_firm_firmname"></span> <?php echo $webgen_firm_firmname[$language]; ?>
                <input type="text" name="firmname_data" <?php if (!empty($_SESSION['step_pp_10']['firmname_data'])) { echo "value=\"".$_SESSION['step_pp_10']['firmname_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'firm_firmname'); ?>', '<?php echo $webgen_firm_firmname_empty[$language]; ?>', '<?php echo $webgen_firm_firmname_valid[$language]; ?>', '<?php echo $webgen_firm_firmname_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'firmname')" />
            </label>
        </li>
        <?php      
            
            if (isset($_SESSION['step_pp_5']['firm_ic']) || $isAllFalse) {
        
        ?>    
        <li>  
            <label>
                <span id="span_firm_ic"></span> <?php echo $webgen_firm_ic[$language]; ?>
                <input type="text" name="ic_data" <?php if (!empty($_SESSION['step_pp_10']['ic_data'])) { echo "value=\"".$_SESSION['step_pp_10']['ic_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'firm_ic'); ?>', '<?php echo $webgen_firm_ic_empty[$language]; ?>', '<?php echo $webgen_firm_ic_valid[$language]; ?>', '<?php echo $webgen_firm_ic_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'ic')" /> 
            </label>
        </li>
    <?php      
        
        }   
        if (isset($_SESSION['step_pp_5']['firm_direction']) || $isAllFalse) {
    
    ?>
    <li>
        <ul class="clear" id="ul_direction">
            <li class="direction_copy">
                <label>
                    <span class="span_firm_direction"> </span> <span class="direction_label"><?php echo $webgen_firm_direction[$language] ?></span>
                    <input name="direction_data[]" type="text" onkeyup="direction(this, '<?php echo returnNext($a, '.firm_direction'); ?>', '<?php echo $webgen_firm_direction_another[$language]; ?>', '<?php echo $webgen_firm_direction_empty[$language]; ?>', '<?php echo $webgen_firm_direction_emptyfirst[$language]; ?>', '<?php echo $webgen_firm_direction_valid[$language]; ?>', '<?php echo $webgen_firm_direction_invalid[$language]; ?>', '<?php echo $webgen_firm_direction_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'direction')" onfocus="direction(this, '<?php echo returnNext($a, '.firm_direction'); ?>', '<?php echo $webgen_firm_direction_another[$language]; ?>', '<?php echo $webgen_firm_direction_empty[$language]; ?>', '<?php echo $webgen_firm_direction_emptyfirst[$language]; ?>', '<?php echo $webgen_firm_direction_valid[$language]; ?>', '<?php echo $webgen_firm_direction_invalid[$language]; ?>', '<?php echo $webgen_firm_direction_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'direction')" />
                </label>
            </li>
        </ul>
    </li>
    <?php      
        
        }
        if (isset($_SESSION['step_pp_5']['firm_workload']) || $isAllFalse) {
    
    ?>
    <li>
        <ul class="clear" id="ul_workload">
            <li class="workload_copy">
                <label>
                    <span class="span_firm_workload"> </span> <span class="workload_label"><?php echo $webgen_firm_workload[$language] ?></span>
                    <input name="workload_data[]" type="text" onkeyup="workload(this, '<?php echo returnNext($a, '.firm_workload'); ?>', '<?php echo $webgen_firm_workload_another[$language]; ?>', '<?php echo $webgen_firm_workload_empty[$language]; ?>', '<?php echo $webgen_firm_workload_emptyfirst[$language]; ?>', '<?php echo $webgen_firm_workload_valid[$language]; ?>', '<?php echo $webgen_firm_workload_invalid[$language]; ?>', '<?php echo $webgen_firm_workload_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'workload')" onfocus="workload(this, '<?php echo returnNext($a, '.firm_workload'); ?>', '<?php echo $webgen_firm_workload_another[$language]; ?>', '<?php echo $webgen_firm_workload_empty[$language]; ?>', '<?php echo $webgen_firm_workload_emptyfirst[$language]; ?>', '<?php echo $webgen_firm_workload_valid[$language]; ?>', '<?php echo $webgen_firm_workload_invalid[$language]; ?>', '<?php echo $webgen_firm_workload_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'workload')" />
                </label>
            </li>
        </ul>
    </li>
    <?php      
        
        }
        if (isset($_SESSION['step_pp_5']['firm_position']) || $isAllFalse) {
    
    ?>
    <li>  
        <label>
            <span id="span_firm_position"></span> <?php echo $webgen_firm_position[$language]; ?>
            <input type="text" name="position_data" <?php if (!empty($_SESSION['step_pp_10']['position_data'])) { echo "value=\"".$_SESSION['step_pp_10']['position_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'firm_position'); ?>', '<?php echo $webgen_firm_position_empty[$language]; ?>', '<?php echo $webgen_firm_position_valid[$language]; ?>', '<?php echo $webgen_firm_position_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'position')" />
        </label>
    </li>
    <?php      
        
        }
        if (isset($_SESSION['step_pp_5']['firm_address']) || $isAllFalse) {
    
    ?>  
        <li>
            <label>
                <span id="span_firm_address"></span> <?php echo $webgen_street[$language]; ?>
                <input type="text" name="firm_street_data" <?php if (!empty($_SESSION['step_pp_10']['firm_street_data'])) { echo "value=\"".$_SESSION['step_pp_10']['firm_street_data']."\""; } ?> onkeyup="prompt_check(this, 'span_firm_housenumber', '<?php echo $webgen_street_empty[$language]; ?>', '<?php echo $webgen_street_valid[$language]; ?>', '<?php echo $webgen_street_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'street')" />
            </label>
        </li>

        <li>
            <label>
                <span id="span_firm_housenumber"></span> <?php echo $webgen_housenumber[$language]; ?>
                <input type="text" name="firm_housenumber_data" <?php if (!empty($_SESSION['step_pp_10']['firm_housenumber_data'])) { echo "value=\"".$_SESSION['step_pp_10']['firm_housenumber_data']."\""; } ?> onkeyup="prompt_check(this, 'span_firm_city', '<?php echo $webgen_housenumber_empty[$language]; ?>', '<?php echo $webgen_housenumber_valid[$language]; ?>', '<?php echo $webgen_housenumber_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'housenumber')" />
            </label>
        </li>

        <li>
            <label>
                <span id="span_firm_city"></span> <?php echo $webgen_city[$language]; ?>
                <input type="text" id="firm_city_data" name="firm_city_data" <?php if (!empty($_SESSION['step_pp_10']['firm_city_data'])) { echo "value=\"".$_SESSION['step_pp_10']['firm_city_data']."\""; } ?> onkeyup="prompt_check(this, 'span_firm_postcode', '<?php echo $webgen_city_empty[$language]; ?>', '<?php echo $webgen_city_valid[$language]; ?>', '<?php echo $webgen_city_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'city')" />
            </label>
        </li>

        <li>
            <label>
                <span id="span_firm_postcode"></span> <?php echo $webgen_postcode[$language]; ?>
                <input type="text" name="firm_postcode_data" <?php if (!empty($_SESSION['step_pp_10']['firm_postcode_data'])) { echo "value=\"".$_SESSION['step_pp_10']['firm_postcode_data']."\""; } ?> onkeyup="prompt_check(this, 'span_firm_state', '<?php echo $webgen_postcode_empty[$language]; ?>', '<?php echo $webgen_postcode_valid[$language]; ?>', '<?php echo $webgen_postcode_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'postcode')" />
            </label>
        </li>

        <li>
            <label>
                <span id="span_firm_state"></span> <?php echo $webgen_state[$language]; ?>
                <input type="text" name="firm_state_data" <?php if (!empty($_SESSION['step_pp_10']['firm_state_data'])) { echo "value=\"".$_SESSION['step_pp_10']['firm_state_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'firm_address'); ?>', '<?php echo $webgen_state_empty[$language]; ?>', '<?php echo $webgen_state_valid[$language]; ?>', '<?php echo $webgen_state_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'state')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['firm_www']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_firm_www"></span> <?php echo $webgen_firm_www[$language]; ?>
                <input type="text" name="www_data" <?php if (!empty($_SESSION['step_pp_10']['www_data'])) { echo "value=\"".$_SESSION['step_pp_10']['www_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'firm_www'); ?>', '<?php echo $webgen_firm_www_empty[$language]; ?>', '<?php echo $webgen_firm_www_valid[$language]; ?>', '<?php echo $webgen_firm_www_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'www')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['firm_add']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_firm_add"></span> <?php echo $webgen_firm_add[$language]; ?>
                <textarea cols="50" rows="2" name="add_data"  onkeyup="prompt_check(this, '<?php echo returnNext($a, 'firm_add'); ?>', '<?php echo $webgen_firm_add_empty[$language]; ?>', '<?php echo $webgen_firm_add_valid[$language]; ?>', '<?php echo $webgen_firm_add_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'additional')"><?php if (!empty($_SESSION['step_pp_10']['add_data'])) { echo mybr2nl($_SESSION['step_pp_10']['add_data']); } ?></textarea>
            </label>
        </li>
        <?php      
        
            }
        
        ?>
    </ul>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>