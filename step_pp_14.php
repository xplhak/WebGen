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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_cv_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych
        
        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_14'] = array();
        
        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_14']["$key"] = changeVar($value);
        }
    
        // nahrazeni odradkovani v textareach
        $_SESSION['step_pp_14']["it_detail_cv_data"] = mynl2br($_SESSION['step_pp_14']["it_detail_cv_data"]);
        $_SESSION['step_pp_14']["otherskill_cv_data"] = mynl2br($_SESSION['step_pp_14']["otherskill_cv_data"]);
        $_SESSION['step_pp_14']["other_cv_data"] = mynl2br($_SESSION['step_pp_14']["other_cv_data"]);
  
    }

    $nextInput = array('cv_nationality', 'cv_family', 'cv_school', 'cv_work', 'cv_knowledge', 'cv_other');

    $isAllFalse = true;
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"])) {
            $isAllFalse = false;
        }
    }
    
    array_unshift($nextInput, 'cv_cellular');
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"]) || $isAllFalse) {
            if ($val == 'cv_school' || $val == 'cv_work') {
                $a[] = '.'.$val;
            }
            else {
                $a[] = $val;
            }
        }
    }
    
    $a[] = 'submit_button';
    
    echo "<h1>".$webgen_cv_title[$language]."</h1>";  
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  

    <ul class="clear">
        
        <li><h2 class="ok"><?php echo $webgen_choice_contact[$language]; ?></h2></li>
        
        <!-- Jmeno je zadano, rovnou pouzit -->
        <!-- Email muze byt zadan - pokud ano, zeptat se na export -->    
        <?php
            
            if (!empty($_SESSION['step_pp_8']['email_data'])) { // pokud je zadany
        
        ?>
        <li>
            <label>
                <?php echo $webgen_cv_email_reuse[$language]; ?>
                <select name="email_cv_que" onkeyup="choice_check(this, 'email_question', 'span_cv_email', 'span_cv_address', '<?php echo $webgen_cv_email_reuse_valid[$language]; ?>', '<?php echo $email_a[$language]." ".$_SESSION['step_pp_8']['email_data']; ?>', '<?php echo $email_b[$language]; ?>', '<?php echo $email_c[$language]; ?>')" onclick="choice_check(this, 'email_question', 'span_cv_email', 'span_cv_address', '<?php echo $webgen_cv_email_reuse_valid[$language]; ?>', '<?php echo $email_a[$language]." ".$_SESSION['step_pp_8']['email_data']; ?>', '<?php echo $email_b[$language]; ?>', '<?php echo $email_c[$language]; ?>')">
                    <option value="a" <?php if ($_SESSION['step_pp_14']['email_cv_que'] == "a") { echo "selected=\"selected\""; } ?> ><?php echo $email_a[$language]." ".$_SESSION['step_pp_8']['email_data']; ?></option>
                    <option value="b" <?php if ($_SESSION['step_pp_14']['email_cv_que'] == "b") { echo "selected=\"selected\""; } ?> ><?php echo $email_b[$language]; ?></option>
                    <option value="c" <?php if ($_SESSION['step_pp_14']['email_cv_que'] == "c") { echo "selected=\"selected\""; } ?> ><?php echo $email_c[$language]; ?></option>
                </select>    
            </label>
        </li>
        <?php
            
            }
        
        ?>                
        <li id="email_question" <?php if (!empty($_SESSION['step_pp_8']['email_data']) && $_SESSION['step_pp_14']['email_cv_que'] != "b") { echo "style=\"display: none;\""; }?> >
            <label>
                <span id="span_cv_email"></span> <?php echo $webgen_contact_email[$language]; ?> 
                <input type="text" name="email_cv_data"  <?php if (!empty($_SESSION['step_pp_14']['email_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['email_cv_data']."\""; } ?> onkeyup="prompt_check(this, 'span_cv_address', '<?php echo $webgen_contact_email_empty[$language]; ?>', '<?php echo $webgen_contact_email_valid[$language]; ?>', '<?php echo $webgen_contact_email_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'email')" />
            </label>
        </li>                  
              
        <!-- Adresa muze byt zadana - pokud ano, zeptat se na export -->                                     
        <?php               
            
            if (!empty($_SESSION['step_pp_8']['postcode_data'])) {
                if (!empty($_SESSION['step_pp_8']['state_data'])) {
                    $address = $_SESSION['step_pp_8']['street_data']." ".$_SESSION['step_pp_8']['housenumber_data'].", ".$_SESSION['step_pp_8']['postcode_data']." ".$_SESSION['step_pp_8']['city_data'].", ".$_SESSION['step_pp_8']['state_data'];
                } else {
                    $address = $_SESSION['step_pp_8']['street_data']." ".$_SESSION['step_pp_8']['housenumber_data'].", ".$_SESSION['step_pp_8']['postcode_data']." ".$_SESSION['step_pp_8']['city_data'];
                }     
        
        ?>
        <li>
            <label>
                <span id="span_cv_address"></span> <?php echo $webgen_cv_address_reuse[$language]; ?>
                <select name="address_cv_que" id="address_cv_que" onkeyup="choice_check(this, 'address_question', 'span_address_sec', 'span_cv_cellular', '<?php echo $webgen_cv_email_reuse_valid[$language]; ?>', '<?php echo $address_a[$language]." ".$address; ?>', '<?php echo $address_b[$language]; ?>', '<?php echo $address_c[$language]; ?>')" onclick="choice_check(this, 'address_question', 'span_address_sec', 'span_cv_cellular', '<?php echo $webgen_cv_email_reuse_valid[$language]; ?>', '<?php echo $address_a[$language]." ".$address; ?>', '<?php echo $address_b[$language]; ?>', '<?php echo $address_c[$language]; ?>')">
                    <option value="a" <?php if ($_SESSION['step_pp_14']['address_cv_que'] == "a") { echo "selected=\"selected\""; } ?> ><?php echo $address_a[$language]." ".$address; ?></option>
                    <option value="b" <?php if ($_SESSION['step_pp_14']['address_cv_que'] == "b") { echo "selected=\"selected\""; } ?> ><?php echo $address_b[$language]; ?></option>
                    <option value="c" <?php if ($_SESSION['step_pp_14']['address_cv_que'] == "c") { echo "selected=\"selected\""; } ?> ><?php echo $address_c[$language]; ?></option>
                </select>    
            </label>
        </li>
        <?php               
            
            }
        
        ?>
        <li id="address_question" <?php if (!empty($_SESSION['step_pp_8']['postcode_data']) && $_SESSION['step_pp_14']['address_cv_que'] != "b") { echo "style=\"display: none;\""; }?> >
            <ul id="cv_address" class="clear">
                <li>
                    <label>
                        <?php if ($_SESSION['step_pp_8']['postcode_data']) { echo "<span id=\"span_address_sec\"></span>"; } else { echo "<span id=\"span_cv_address\"></span>"; } echo $webgen_street[$language]; ?>
                        <input type="text" name="street_cv_data"  <?php if (!empty($_SESSION['step_pp_14']['street_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['street_cv_data']."\""; } ?> onkeyup="prompt_check(this, 'span_cv_housenumber', '<?php echo $webgen_street_empty[$language]; ?>', '<?php echo $webgen_street_valid[$language]; ?>', '<?php echo $webgen_street_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'street')" />
                    </label>
                </li>
        
                <li>
                    <label>
                        <span id="span_cv_housenumber"></span> <?php echo $webgen_housenumber[$language]; ?>
                        <input type="text" name="housenumber_cv_data"  <?php if (!empty($_SESSION['step_pp_14']['housenumber_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['housenumber_cv_data']."\""; } ?> onkeyup="prompt_check(this, 'span_cv_city', '<?php echo $webgen_housenumber_empty[$language]; ?>', '<?php echo $webgen_housenumber_valid[$language]; ?>', '<?php echo $webgen_housenumber_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'housenumber')" />
                    </label>
                </li>
                
                <li>
                    <label>
                        <span id="span_cv_city" class="normal_span"></span> <?php echo $webgen_city[$language]; ?>
                        <input type="text" name="city_cv_data"  <?php if (!empty($_SESSION['step_pp_14']['city_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['city_cv_data']."\""; } ?> onkeyup="prompt_check(this, 'span_cv_postcode', '<?php echo $webgen_city_empty[$language]; ?>', '<?php echo $webgen_city_valid[$language]; ?>', '<?php echo $webgen_city_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'city')" />
                    </label>
                </li>
            
                <li>
                    <label>
                        <span id="span_cv_postcode" class="normal_span"> </span> <?php echo $webgen_postcode[$language]; ?>
                        <input type="text" name="postcode_cv_data"  <?php if (!empty($_SESSION['step_pp_14']['postcode_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['postcode_cv_data']."\""; } ?> onkeyup="prompt_check(this, 'span_cv_state', '<?php echo $webgen_postcode_empty[$language]; ?>', '<?php echo $webgen_postcode_valid[$language]; ?>', '<?php echo $webgen_postcode_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'postcode')" />
                    </label>
                </li>
            
                <li>
                    <label>
                        <span id="span_cv_state" class="normal_span"> </span> <?php echo $webgen_state[$language]; ?>
                        <input type="text" name="state_cv_data"  <?php if (!empty($_SESSION['step_pp_14']['state_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['state_cv_data']."\""; } ?> onkeyup="prompt_check(this, 'span_cv_cellular', '<?php echo $webgen_state_empty[$language]; ?>', '<?php echo $webgen_state_valid[$language]; ?>', '<?php echo $webgen_state_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'state')" />
                    </label>
                </li>
            </ul>
        </li>

       <!-- Telefon muze byt zadana - pokud ano, zeptat se, ktery pouzit na export (mobil, pevna, jiny) -->    
        <?php
            
            if (!empty($_SESSION['step_pp_8']['cellular_data']) || !empty($_SESSION['step_pp_14']['phone_data'])) { // pokud je zadanej mobil nebo pevna
        
        ?>
        <li>
            <label>
                <span id="span_cv_cellular"></span> <?php echo $webgen_cv_cellular_reuse[$language]; ?>
                <select name="cellular_cv_que" id="cellular_cv_que" onkeyup="choice_check(this, 'cellular_question', 'span_cellular_sec', '<?php echo returnNext($a, 'cv_cellular'); ?>', '<?php echo $webgen_cv_email_reuse_valid[$language]; ?>', '<?php echo $cellular_a[$language]." ".$_SESSION['step_pp_14']['cellular_data']; ?>', '<?php echo $cellular_b[$language]; ?>', '<?php echo $cellular_c[$language]; ?>', '<?php echo $cellular_d[$language]." ".$_SESSION['step_pp_14']['phone_data']; ?>')" onclick="choice_check(this, 'cellular_question', 'span_cellular_sec', '<?php echo returnNext($a, 'cv_cellular'); ?>', '<?php echo $webgen_cv_email_reuse_valid[$language]; ?>', '<?php echo $cellular_a[$language]; ?>', '<?php echo $cellular_b[$language]; ?>', '<?php echo $cellular_c[$language]; ?>', '<?php echo $cellular_d[$language]." ".$_SESSION['step_pp_8']['phone_data']; ?>')">
                    <?php if ($_SESSION['step_pp_14']['cellular_cv_que'] == "a") { $sel = " selected=\"selected\" "; } else { $sel = ""; } if ($_SESSION['step_pp_8']['cellular_data']) { echo "<option value=\"a\"{$sel}>".$cellular_a[$language]." ".$_SESSION['step_pp_8']['cellular_data']."</option>"; } ?>
                    <?php if ($_SESSION['step_pp_14']['cellular_cv_que'] == "d") { $sel = " selected=\"selected\" "; } else { $sel = ""; } if ($_SESSION['step_pp_8']['phone_data']) { echo "<option value=\"d\"{$sel}>".$cellular_d[$language]." ".$_SESSION['step_pp_8']['phone_data']."</option>"; } ?>
                    <option value="b" <?php if ($_SESSION['step_pp_14']['cellular_cv_que'] == "b") { echo "selected=\"selected\""; } ?> ><?php echo $cellular_b[$language]; ?></option>
                    <option value="c" <?php if ($_SESSION['step_pp_14']['cellular_cv_que'] == "c") { echo "selected=\"selected\""; } ?> ><?php echo $cellular_c[$language]; ?></option>
                </select>    
            </label>
        </li>
        <?php
            
            }
        
        ?>                
        <li id="cellular_question" <?php if ((!empty($_SESSION['step_pp_8']['cellular_data']) || !empty($_SESSION['step_pp_8']['phone_data'])) && $_SESSION['step_pp_14']['cellular_cv_que'] != "b") { echo "style=\"display: none;\""; }?> >
            <label>
                <?php if ($_SESSION['step_pp_14']['cellular_data'] || $_SESSION['step_pp_14']['phone_data']) { echo "<span id=\"span_cellular_sec\"></span>"; } else { echo "<span id=\"span_cv_cellular\"></span>"; } echo $webgen_cv_cellular[$language]; ?>
                <input type="text" name="cellular_cv_data" <?php if (!empty($_SESSION['step_pp_14']['cellular_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['cellular_cv_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'cv_cellular'); ?>', '<?php echo $webgen_cv_cellular_empty[$language]; ?>', '<?php echo $webgen_cv_cellular_valid[$language]; ?>', '<?php echo $webgen_cv_cellular_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'phone')" />
            </label>        
        </li>

        <!-- Narodnost, pokud je zaskrtla -->
        <?php
            
            if (isset($_SESSION['step_pp_5']['cv_nationality']) || $isAllFalse) {
        
        ?>                        
        <li> 
            <label>
                <span id="span_cv_nationality"></span> <?php echo $webgen_cv_nationality[$language]; ?>
                <input type="text" name="nationality_cv_data" <?php if (!empty($_SESSION['step_pp_14']['nationality_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['nationality_cv_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'cv_nationality'); ?>', '<?php echo $webgen_cv_nationality_empty[$language]; ?>', '<?php echo $webgen_cv_nationality_valid[$language]; ?>', '<?php echo $webgen_cv_nationality_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'nationality')" />
            </label>        
        </li>                       
        <?php
           
            }
            if (isset($_SESSION['step_pp_5']['cv_family']) || $isAllFalse) {
        
        ?>                       
        <!-- Rodinny stav, pokud je zaskrtly -->
        <li>
            <label>
                <span id="span_cv_family"></span> <?php echo $webgen_cv_family[$language]; ?>
                <input type="text" name="family_cv_data" <?php if (!empty($_SESSION['step_pp_14']['family_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['family_cv_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'cv_family'); ?>', '<?php echo $webgen_cv_family_empty[$language]; ?>', '<?php echo $webgen_cv_family_valid[$language]; ?>', '<?php echo $webgen_cv_family_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'family')" />
            </label>        
        </li>                  
        <?php
            
            }
            if (isset($_SESSION['step_pp_5']['cv_school']) || $isAllFalse) {
        
        ?>
        
        <!-- Vzdelani a kurzy od, do, stupen, skola obor - mozno vicekrat -->
        <h2 class="ok"><?php echo $webgen_choice_cv_school[$language]; ?></h2>
        
        <li id="li_education">
            <ul class="ul_education">    
                <li> 
                    <label>
                        <span class="span_cv_school"></span> <span class="education_info"><?php echo $webgen_cv_edu_from_init[$language]; ?></span>
                        <input type="text" name="edu_from_data[]" onkeyup="prompt_clone_check(this, '.span_edu_to', '<?php echo $webgen_cv_edu_from_empty[$language]; ?>', '<?php echo $webgen_cv_edu_from_valid[$language]; ?>', '<?php echo $webgen_cv_edu_from_invalid[$language]; ?>', '', 'year', 'li')" />
                    </label>
                </li>
                
                <li> 
                    <label>
                        <span class="span_edu_to"></span> <?php echo $webgen_cv_edu_to[$language]; ?>
                        <input type="text" name="edu_to_data[]" onkeyup="prompt_clone_check(this, '.span_edu_degree', '<?php echo $webgen_cv_edu_to_empty[$language]; ?>', '<?php echo $webgen_cv_edu_to_valid[$language]; ?>', '<?php echo $webgen_cv_edu_to_invalid[$language]; ?>', '', 'year', 'li')" />        
                    </label>
                </li>
                           
                <li> 
                    <label>
                        <span class="span_edu_degree"></span> <?php echo $webgen_cv_edu_degree[$language]; ?>
                        <select name="edu_degree_data[]" onkeyup="edu_degree_check(this, '.span_edu_title', '.span_edu_school', '<?php echo $webgen_cv_edu_degree_valid[$language]; ?>', 'li')" onclick="edu_degree_check(this, '.span_edu_title', '.span_edu_school', '<?php echo $webgen_cv_edu_degree_valid[$language]; ?>', 'li')" >
                            <option value="0"><?php echo $degree_0[$language]; ?></option>
                            <option value="1"><?php echo $degree_1[$language]; ?></option>
                            <option value="2"><?php echo $degree_2[$language]; ?></option>
                            <option value="3"><?php echo $degree_3[$language]; ?></option>
                            <option value="4"><?php echo $degree_4[$language]; ?></option>
                            <option value="5"><?php echo $degree_5[$language]; ?></option>
                            <option value="6"><?php echo $degree_6[$language]; ?></option>
                            <option value="7"><?php echo $degree_7[$language]; ?></option>
                        </select>    
                    </label>
                </li>
        
                <li class="li_edu_title" style="display: none;"> 
                    <label>
                        <span class="span_edu_title"></span> <?php echo $webgen_cv_edu_title[$language]; ?>
                        <input type="text" name="edu_title_data[]" onkeyup="prompt_clone_check(this, '.span_edu_school', '<?php echo $webgen_cv_edu_title_empty[$language]; ?>', '<?php echo $webgen_cv_edu_title_valid[$language]; ?>', '<?php echo $webgen_cv_edu_title_invalid[$language]; ?>', '', 'title', 'li')" />        
                    </label>
                </li>
                
                <li> 
                    <label>
                        <span class="span_edu_school"></span> <?php echo $webgen_cv_edu_school[$language]; ?>
                        <input type="text" size="75" name="edu_school_data[]" onkeyup="prompt_clone_check(this, '.span_edu_field', '<?php echo $webgen_cv_edu_school_empty[$language]; ?>', '<?php echo $webgen_cv_edu_school_valid[$language]; ?>', '<?php echo $webgen_cv_edu_school_invalid[$language]; ?>', '', 'school', 'li')" />        
                    </label>
                </li>
                
                <li> 
                    <label>
                        <span class="span_edu_field"></span> <?php echo $webgen_cv_edu_field[$language]; ?>
                        <input type="text" size="40" name="edu_field_data[]" onkeyup="prompt_clone_check(this, '.span_next_edu_button', '<?php echo $webgen_cv_edu_field_empty[$language]; ?>', '<?php echo $webgen_cv_edu_field_valid[$language]; ?>', '<?php echo $webgen_cv_edu_field_invalid[$language]; ?>', '', 'specialization', 'li', '<?php echo $next_edu_button_info[$language]; ?>')" />        
                    </label>
                </li>              
                
                <li>
                    <label>
                        <span class="span_next_edu_button"></span> <span class="span_next_edu_button_info"></span>
                        <input type="button" value="<?php echo $next_edu_button[$language]; ?>" onclick="clone_education(this, '<?php echo $webgen_cv_edu_from[$language]; ?>')" />
                    </label>
                </li>
            </ul>
        </li>
        
        <?php
            
            }
            if (isset($_SESSION['step_pp_5']['cv_work']) || $isAllFalse) {
        
        ?>                                 
        
        <!-- Pracovni zkusenosti od, do, oblast podnikani (nazev odvetvi), dosazena pozice - muze byt vicekrat -->
        <h2 class="ok"><?php echo $webgen_choice_cv_work[$language]; ?></h2>

        <li id="li_work">
            <ul class="ul_work">    
                <li> 
                    <label>
                        <span class="span_cv_work"></span> <span class="work_info"><?php echo $webgen_cv_work_from_init[$language]; ?></span>
                        <input type="text" name="work_from_data[]" onkeyup="prompt_clone_check(this, '.span_work_to', '<?php echo $webgen_cv_work_from_empty[$language]; ?>', '<?php echo $webgen_cv_edu_from_valid[$language]; ?>', '<?php echo $webgen_cv_edu_from_invalid[$language]; ?>', '', 'from', 'li')" />
                    </label>
                </li>
                
                <li> 
                    <label>
                        <span class="span_work_to"></span> <?php echo $webgen_cv_work_to[$language]; ?>
                        <input type="text" name="work_to_data[]" onkeyup="prompt_clone_check(this, '.span_work_companyname', '<?php echo $webgen_cv_edu_to_empty[$language]; ?>', '<?php echo $webgen_cv_edu_to_valid[$language]; ?>', '<?php echo $webgen_cv_edu_to_invalid[$language]; ?>', '', 'to', 'li')" />        
                    </label>
                </li>
                           
                <li>
                    <label>
                        <span class="span_work_companyname"></span> <?php echo $webgen_cv_work_companyname[$language]; ?>
                        <input type="text" size="50" name="work_companyname_data[]" onkeyup="prompt_clone_check(this, '.span_work_sphere', '<?php echo $webgen_cv_work_companyname_empty[$language]; ?>', '<?php echo $webgen_cv_work_companyname_valid[$language]; ?>', '<?php echo $webgen_cv_work_companyname_invalid[$language]; ?>', '', 'companyname', 'li')" />        
                    </label>
                </li>
                
                <li> 
                    <label>
                        <span class="span_work_sphere"></span> <?php echo $webgen_cv_work_sphere[$language]; ?>
                        <input type="text"  size="50" name="work_sphere_data[]" onkeyup="prompt_clone_check(this, '.span_work_pos', '<?php echo $webgen_cv_work_sphere_empty[$language]; ?>', '<?php echo $webgen_cv_work_sphere_valid[$language]; ?>', '<?php echo $webgen_cv_work_sphere_invalid[$language]; ?>', '', 'sphere', 'li')" />        
                    </label>
                </li>
                
                <li> 
                    <label>
                        <span class="span_work_pos"></span> <?php echo $webgen_cv_work_pos[$language]; ?>
                        <input type="text"  size="30" name="work_pos_data[]" onkeyup="prompt_clone_check(this, '.span_work_wload', '<?php echo $webgen_cv_work_pos_empty[$language]; ?>', '<?php echo $webgen_cv_work_pos_valid[$language]; ?>', '<?php echo $webgen_cv_work_pos_invalid[$language]; ?>', '', 'position', 'li')" />        
                    </label>
                </li>              
        
                <li> 
                    <label>
                        <span class="span_work_wload"></span> <?php echo $webgen_cv_work_wload[$language]; ?>
                        <input type="text" size="100" name="work_wload_data[]" onkeyup="prompt_clone_check(this, '.span_next_work_button', '<?php echo $webgen_cv_work_companyname_empty[$language]; ?>', '<?php echo $webgen_cv_work_companyname_valid[$language]; ?>', '<?php echo $webgen_cv_work_companyname_invalid[$language]; ?>', '', 'from', 'li', '<?php echo $next_work_button_info[$language]; ?>')" />        
                    </label>
                </li>   
              
                <li>
                    <label>
                        <span class="span_next_work_button"></span> <span class="span_next_work_button_info"></span>
                        <input type="button" value="<?php echo $next_work_button[$language]; ?>" onclick="clone_work(this, '<?php echo $webgen_cv_edu_from[$language]; ?>')" />
                    </label>
                </li>
            </ul>
        </li>    
        <?php
            
            }
            if (isset($_SESSION['step_pp_5']['cv_knowledge']) || $isAllFalse) {
        
        ?>                         
        
        <!-- Osobni schopnosti - pocitacove znalosti, detailni popis IT znalosti, ridicak, jazyky, ostatni znalosti a dovednosti -->
        <h2 class="ok"><?php echo $webgen_choice_cv_knowledge[$language]; ?></h2>
        <h3><?php echo $webgen_cv_it[$language]; ?></h3>
        
        <li> 
            <label>
                <span id="span_it"></span> <?php echo $webgen_cv_it_degree[$language]; ?>
                <select name="it_degree_cv_data" onkeyup="degree_check(this, '#span_it_detail', '<?php echo $webgen_cv_it_degree_valid[$language]; ?>', 'it_degree_cv_data')" onclick="degree_check(this, '#span_it_detail', '<?php echo $webgen_cv_it_degree_valid[$language]; ?>', 'it_degree_cv_data')">
                    <option <?php if ($_SESSION['step_pp_14']['it_degree_cv_data'] == '0') { echo "selected=\"selected\""; } ?> value="0"><?php echo $it_0[$language]; ?></option>
                    <option <?php if ($_SESSION['step_pp_14']['it_degree_cv_data'] == '1') { echo "selected=\"selected\""; } ?> value="1"><?php echo $it_1[$language]; ?></option>
                    <option <?php if ($_SESSION['step_pp_14']['it_degree_cv_data'] == '2') { echo "selected=\"selected\""; } ?> value="2"><?php echo $it_2[$language]; ?></option>
                    <option <?php if ($_SESSION['step_pp_14']['it_degree_cv_data'] == '3') { echo "selected=\"selected\""; } ?> value="3"><?php echo $it_3[$language]; ?></option>
                    <option <?php if ($_SESSION['step_pp_14']['it_degree_cv_data'] == '4') { echo "selected=\"selected\""; } ?> value="4"><?php echo $it_4[$language]; ?></option>
                </select>    
            </label>
        </li>                
        
        <li> 
            <label>
                <span id="span_it_detail"></span> <?php echo $webgen_cv_it_detail[$language]; ?>
                <textarea cols="50" rows="2" type="text" name="it_detail_cv_data"  onkeyup="prompt_check(this, 'span_driver', '<?php echo $webgen_cv_it_detail_empty[$language]; ?>', '<?php echo $webgen_cv_it_detail_valid[$language]; ?>', '<?php echo $webgen_cv_it_detail_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'it_detail')"><?php if (!empty($_SESSION['step_pp_14']['it_detail_cv_data'])) { echo mybr2nl($_SESSION['step_pp_14']['it_detail_cv_data']); } ?></textarea>
            </label>        
        </li>                                
        
        <h3><?php echo $webgen_cv_driver_info[$language]; ?></h3>
        
        <li> 
            <label>
                <span id="span_driver"></span> <?php echo $webgen_cv_driver[$language]; ?>
                <input type="text" name="driver_cv_data" <?php if (!empty($_SESSION['step_pp_14']['driver_cv_data'])) { echo "value=\"".$_SESSION['step_pp_14']['driver_cv_data']."\""; } ?> onkeyup="prompt_check(this, '.span_lang_type', '<?php echo $webgen_cv_driver_empty[$language]; ?>', '<?php echo $webgen_cv_driver_valid[$language]; ?>', '<?php echo $webgen_cv_driver_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'driver')" />
            </label>        
        </li>               
        
        <!-- Jazyky: matersky a pak opakovane se ptat na jazyk, uroven, poznamka -->
                    
        <h3><?php echo $webgen_cv_lang[$language]; ?></h3>
        
        <li id="li_lang">
            <ul class="ul_lang">    
                <li> 
                    <label>
                        <span class="span_lang_type"></span> <span class="lang_info"><?php echo $webgen_cv_lang_type_init[$language]; ?></span>
                        <select name="lang_type_data[]" onkeyup="degree_check(this, '.span_lang_level', '<?php echo $webgen_cv_lang_type_valid[$language]; ?>', 'lang_type_data[]')" onclick="degree_check(this, '.span_lang_level', '<?php echo $webgen_cv_lang_type_valid[$language]; ?>', 'lang_type_data[]')">
                            <option value="0"><?php echo $l_0[$language]; ?></option>
                            <option value="1"><?php echo $l_1[$language]; ?></option>
                            <option value="2"><?php echo $l_2[$language]; ?></option>
                            <option value="3"><?php echo $l_3[$language]; ?></option>
                            <option value="4"><?php echo $l_4[$language]; ?></option>
                            <option value="5"><?php echo $l_5[$language]; ?></option>
                            <option value="6"><?php echo $l_6[$language]; ?></option>
                            <option value="7"><?php echo $l_7[$language]; ?></option>
                            <option value="8"><?php echo $l_8[$language]; ?></option>
                            <option value="9"><?php echo $l_9[$language]; ?></option>
                            <option value="10"><?php echo $l_10[$language]; ?></option>
                            <option value="11"><?php echo $l_11[$language]; ?></option>
                            <option value="12"><?php echo $l_12[$language]; ?></option>
                            <option value="13"><?php echo $l_13[$language]; ?></option>
                            <option value="14"><?php echo $l_14[$language]; ?></option>
                            <option value="15"><?php echo $l_15[$language]; ?></option>
                            <option value="16"><?php echo $l_16[$language]; ?></option>
                            <option value="17"><?php echo $l_17[$language]; ?></option>
                            <option value="18"><?php echo $l_18[$language]; ?></option>
                            <option value="19"><?php echo $l_19[$language]; ?></option>
                            <option value="20"><?php echo $l_20[$language]; ?></option>
                            <option value="21"><?php echo $l_21[$language]; ?></option>
                            <option value="22"><?php echo $l_22[$language]; ?></option>
                            <option value="23"><?php echo $l_23[$language]; ?></option>
                            <option value="24"><?php echo $l_24[$language]; ?></option>
                        </select>                 
                    </label>
                </li>
                
                <li>
                    <label><span class="span_lang_level"></span> <?php echo $webgen_cv_lang_level[$language]; ?>
                        <select name="lang_level_data[]" onkeyup="degree_check(this, '.span_next_lang_button', '<?php echo $webgen_cv_lang_level_valid[$language]; ?>', 'lang_level_data[]', '<?php echo $next_lang_button_info[$language]; ?>')" onclick="degree_check(this, '.span_next_lang_button', '<?php echo $webgen_cv_lang_level_valid[$language]; ?>', 'lang_level_data[]', '<?php echo $next_lang_button_info[$language]; ?>')" >
                            <option value="0"><?php echo $lang_0[$language]; ?></option>
                            <option value="1"><?php echo $lang_1[$language]; ?></option>
                            <option value="2"><?php echo $lang_2[$language]; ?></option>
                            <option value="3"><?php echo $lang_3[$language]; ?></option>
                            <option value="4"><?php echo $lang_4[$language]; ?></option>
                        </select>    
                    </label>
                </li>
              
                <li>
                    <label>
                        <span class="span_next_lang_button"></span> <span class="span_next_lang_button_info"></span>
                        <input type="button" value="<?php echo $next_lang_button[$language]; ?>" onclick="clone_lang(this, '<?php echo $webgen_cv_lang_type[$language]; ?>')" />
                    </label>
                </li>
            </ul>
        </li>
        
        <li> 
            <label>
                <span id="span_cv_otherskill"></span> <?php echo $webgen_cv_otherskill[$language]; ?>
                <textarea cols="50" rows="2" type="text" name="otherskill_cv_data" onkeyup="prompt_check(this, '<?php echo returnNext($a, 'cv_knowledge'); ?>', '<?php echo $webgen_cv_otherskill_empty[$language]; ?>', '<?php echo $webgen_cv_otherskill_valid[$language]; ?>', '<?php echo $webgen_cv_otherskill_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'otherskill')"><?php if (!empty($_SESSION['step_pp_14']['otherskill_cv_data'])) { echo mybr2nl($_SESSION['step_pp_14']['otherskill_cv_data']); } ?></textarea>
            </label>       
        </li>                        
        
        <?php
            }
            
//                    if ($_SESSION['step_pp_14']['cv_publication'] == "yes") {
        ?>   
                        
        <!-- Publikace -->
                     
        <?php
//                    }
            
//                    if ($_SESSION['step_pp_14']['cv_product'] == "yes") {
        ?>                   
        
        <!-- Vyrobky, vlastni produkty -->
        
        <?php
//                    }
            
//                    if ($_SESSION['step_pp_14']['cv_prize'] == "yes") {
        ?>   

        <!-- Oceneni -->
        
        <?php
//                    }
            
            if (isset($_SESSION['step_pp_5']['cv_other']) || $isAllFalse) {
        ?>
                        
        <!-- Doplnujici informace -->
        
        <h2 class="ok"><?php echo $webgen_cv_other_info[$language]; ?></h2>
        
        <li> 
            <label>
                <span id="span_cv_other"></span> <?php echo $webgen_cv_other[$language]; ?>
                <textarea cols="50" rows="3" type="text" name="other_cv_data" onkeyup="prompt_check(this, '<?php echo returnNext($a, 'cv_other'); ?>', '<?php echo $webgen_cv_other_empty[$language]; ?>', '<?php echo $webgen_cv_other_valid[$language]; ?>', '<?php echo $webgen_cv_other_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'other')"><?php if (!empty($_SESSION['step_pp_14']['other_cv_data'])) { echo mybr2nl($_SESSION['step_pp_14']['it_detail_cv_data']); } ?></textarea>
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