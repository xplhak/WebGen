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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_contact_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_8'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_8']["$key"] = changeVar($value);
        }
    }

    $nextInput = array('contact_email', 'contact_address', 'contact_cellular', 'contact_phone', 'contact_fax', 'contact_icq', 'contact_skype', 'contact_otherprotocols');
    
    $isAllFalse = true;
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"])) {
            $isAllFalse = false;
        }
    }
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"]) || $isAllFalse) {
            $a[] = $val;
        }
    }
        
    $a[] = 'submit_button';   
    
    echo "<h1>".$webgen_contact_title[$language]."</h1>";  
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  

    <ul class="clear">
        <?php
            
            if (isset($_SESSION['step_pp_5']['contact_email']) || $isAllFalse) {
        
        ?>
        <li id="li_email">
            <label>
                <span id="span_contact_email"></span> <?php echo $webgen_contact_email[$language]; ?>
                <input type="text" name="email_data" <?php if (!empty($_SESSION['step_pp_8']['email_data'])) { echo "value=\"".$_SESSION['step_pp_8']['email_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_email'); ?>', '<?php echo $webgen_contact_email_empty[$language]; ?>', '<?php echo $webgen_contact_email_valid[$language]; ?>', '<?php echo $webgen_contact_email_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'email')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_address']) || $isAllFalse) { 
        ?>   
        <li>
            <label>
                <span id="span_contact_address"></span> <?php echo $webgen_street[$language]; ?>
                <input type="text" name="street_data" <?php if (!empty($_SESSION['step_pp_8']['street_data'])) { echo "value=\"".$_SESSION['step_pp_8']['street_data']."\""; } ?> onkeyup="prompt_check(this, 'span_housenumber', '<?php echo $webgen_street_empty[$language]; ?>', '<?php echo $webgen_street_valid[$language]; ?>', '<?php echo $webgen_street_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'street')" />
            </label>
        </li>
    
        <li>
            <label>
                <span id="span_housenumber"></span> <?php echo $webgen_housenumber[$language]; ?>
                <input type="text" name="housenumber_data" <?php if (!empty($_SESSION['step_pp_8']['housenumber_data'])) { echo "value=\"".$_SESSION['step_pp_8']['housenumber_data']."\""; } ?> onkeyup="prompt_check(this, 'span_city', '<?php echo $webgen_housenumber_empty[$language]; ?>', '<?php echo $webgen_housenumber_valid[$language]; ?>', '<?php echo $webgen_housenumber_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'housenumber')" />
            </label>
        </li>
        
        <li>
            <label>
                <span id="span_city" class="normal_span"></span> <?php echo $webgen_city[$language]; ?>
                <input type="text" name="city_data" <?php if (!empty($_SESSION['step_pp_8']['city_data'])) { echo "value=\"".$_SESSION['step_pp_8']['city_data']."\""; } ?> onkeyup="prompt_check(this, 'span_postcode', '<?php echo $webgen_city_empty[$language]; ?>', '<?php echo $webgen_city_valid[$language]; ?>', '<?php echo $webgen_city_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'city')" />
            </label>
        </li>
    
        <li>
            <label>
                <span id="span_postcode" class="normal_span"></span> <?php echo $webgen_postcode[$language]; ?>
                <input type="text" name="postcode_data" <?php if (!empty($_SESSION['step_pp_8']['postcode_data'])) { echo "value=\"".$_SESSION['step_pp_8']['postcode_data']."\""; } ?> onkeyup="prompt_check(this, 'span_state', '<?php echo $webgen_postcode_empty[$language]; ?>', '<?php echo $webgen_postcode_valid[$language]; ?>', '<?php echo $webgen_postcode_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'postcode')" />
            </label>
        </li>
    
        <li>
            <label>
                <span id="span_state" class="normal_span"></span> <?php echo $webgen_state[$language]; ?>
                <input type="text" name="state_data" <?php if (!empty($_SESSION['step_pp_8']['state_data'])) { echo "value=\"".$_SESSION['step_pp_8']['email_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_address'); ?>', '<?php echo $webgen_state_empty[$language]; ?>', '<?php echo $webgen_state_valid[$language]; ?>', '<?php echo $webgen_state_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'state')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_cellular']) || $isAllFalse) {
        
        ?> 
        <li> 
            <label>
                <span id="span_contact_cellular"></span> <?php echo $webgen_contact_cellular[$language]; ?>
                <input type="text" name="cellular_data" <?php if (!empty($_SESSION['step_pp_8']['cellular_data'])) { echo "value=\"".$_SESSION['step_pp_8']['cellular_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_cellular'); ?>', '<?php echo $webgen_contact_cellular_empty[$language]; ?>', '<?php echo $webgen_contact_cellular_valid[$language]; ?>', '<?php echo $webgen_contact_cellular_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'phone')" />
            </label>       
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_phone']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_contact_phone"></span> <?php echo $webgen_contact_phone[$language]; ?>
                <input type="text" name="phone_data" <?php if (!empty($_SESSION['step_pp_8']['phone_data'])) { echo "value=\"".$_SESSION['step_pp_8']['phone_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_phone'); ?>', '<?php echo $webgen_contact_phone_empty[$language]; ?>', '<?php echo $webgen_contact_phone_valid[$language]; ?>', '<?php echo $webgen_contact_phone_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'phone')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_fax']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_contact_fax"></span> <?php echo $webgen_contact_fax[$language]; ?>
                <input type="text" name="fax_data" <?php if (!empty($_SESSION['step_pp_8']['fax_data'])) { echo "value=\"".$_SESSION['step_pp_8']['fax_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_fax'); ?>', '<?php echo $webgen_contact_fax_empty[$language]; ?>', '<?php echo $webgen_contact_fax_valid[$language]; ?>', '<?php echo $webgen_contact_fax_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'phone')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_icq']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_contact_icq"></span> <?php echo $webgen_contact_icq[$language]; ?>
                <input type="text" name="icq_data" <?php if (!empty($_SESSION['step_pp_8']['icq_data'])) { echo "value=\"".$_SESSION['step_pp_8']['icq_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_icq'); ?>', '<?php echo $webgen_contact_icq_empty[$language]; ?>', '<?php echo $webgen_contact_icq_valid[$language]; ?>', '<?php echo $webgen_contact_icq_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'icq')" />
            </label>         
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_skype']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_contact_skype"></span> <?php echo $webgen_contact_skype[$language]; ?>
                <input type="text" name="skype_data" <?php if (!empty($_SESSION['step_pp_8']['skype_data'])) { echo "value=\"".$_SESSION['step_pp_8']['skype_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'contact_skype'); ?>', '<?php echo $webgen_contact_skype_empty[$language]; ?>', '<?php echo $webgen_contact_skype_valid[$language]; ?>', '<?php echo $webgen_contact_skype_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'skype')" />
            </label>         
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['contact_otherprotocols']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_contact_otherprotocols"></span> <?php echo $webgen_contact_msn[$language]; ?>
                <input type="text" name="msn_data" <?php if (!empty($_SESSION['step_pp_8']['msn_data'])) { echo "value=\"".$_SESSION['step_pp_8']['msn_data']."\""; } ?> onkeyup="prompt_check(this, 'span_irc', '<?php echo $webgen_contact_msn_empty[$language]; ?>', '<?php echo $webgen_contact_msn_valid[$language]; ?>', '<?php echo $webgen_contact_msn_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'msn')" />
            </label>
        </li>           

        <li>
            <label>
                <span id="span_irc"></span> <?php echo $webgen_contact_irc[$language]; ?>
                <input type="text" name="irc_data" <?php if (!empty($_SESSION['step_pp_8']['irc_data'])) { echo "value=\"".$_SESSION['step_pp_8']['irc_data']."\""; } ?> onkeyup="prompt_check(this, 'span_jabber', '<?php echo $webgen_contact_irc_empty[$language]; ?>', '<?php echo $webgen_contact_irc_valid[$language]; ?>', '<?php echo $webgen_contact_irc_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'irc')" />
            </label>
        </li>   

        <li>  
            <label>
                <span id="span_jabber"></span> <?php echo $webgen_contact_jabber[$language]; ?>
                <input type="text" name="jabber_data" <?php if (!empty($_SESSION['step_pp_8']['jabber_data'])) { echo "value=\"".$_SESSION['step_pp_8']['jabber_data']."\""; } ?> onkeyup="prompt_check(this, 'span_aim', '<?php echo $webgen_contact_jabber_empty[$language]; ?>', '<?php echo $webgen_contact_jabber_valid[$language]; ?>', '<?php echo $webgen_contact_jabber_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'jabber')" />
            </label>
        </li>  
        
        <li>  
            <label>
                <span id="span_aim"></span> <?php echo $webgen_contact_aim[$language]; ?></label>
                <input type="text" name="aim_data" <?php if (!empty($_SESSION['step_pp_8']['aim_data'])) { echo "value=\"".$_SESSION['step_pp_8']['aim_data']."\""; } ?> onkeyup="prompt_check(this, 'span_submit_button', '<?php echo $webgen_contact_aim_empty[$language]; ?>', '<?php echo $webgen_contact_aim_valid[$language]; ?>', '<?php echo $webgen_contact_aim_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'aim')" /> 
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