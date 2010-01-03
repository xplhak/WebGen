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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_u_s_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_9'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_9']["$key"] = changeVar($value);
        }   
        
        // kontrola, zda je zadan nazev univerzity, ktery je povinny (tj. zda obsahuje alespon tri znaky)
        $r = "/^[a-zA-Z0-9]{3}.*$/";
        
        if (strlen($_SESSION['step_pp_9']['university_data']) == 0 || !preg_match($r, $_SESSION['step_pp_9']['university_data'])) {
        
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }
    }

    $nextInput = array('university_faculty', 'university_specialization', 'university_year', 'university_department', 'university_position', 'university_office', 'university_hour', 'university_departmentphone', 'university_schooladdress', 'university_schoolpages', 'university_facultypages', 'university_project', 'university_projectpages');
    
    $isAllFalse = true;
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"])) {
            $isAllFalse = false;
        }
    }
    
    array_pop($nextInput);
    array_unshift($nextInput, 'university_university');    
    
    foreach ($nextInput as $key => $val) {
        if (isset($_SESSION['step_pp_5']["{$val}"]) || $isAllFalse) {
            if ($val == 'university_hour' || $val == 'university_project') {
                $a[] = '.'.$val;
            }
            else {
                $a[] = $val;
            }
        }
    }
        
    $a[] = 'submit_button';

    // echo implode(", ", $a);

    echo "<h1>".$webgen_u_s_title[$language]."</h1>";  

    $r = "/^[a-zA-Z0-9]{3}.*$/";
    
    if (isset($_SESSION['step_pp_9']['university_data'])) {
        if (strlen($_SESSION['step_pp_9']['university_data']) == 0) {
            echo "<h2 class=\"error\">".$webgen_u_s_university_empty[$language]."</h2>";
        }
        elseif (!preg_match($r, $_SESSION['step_pp_9']['university_data'])) {
            echo "<h2 class=\"error\">".$webgen_u_s_university_short[$language]."</h2>";
        }
    }

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul class="clear">
        <li>  
            <label>
                <span id="span_university_university"></span> <?php echo $webgen_u_s_university[$language]; ?>
                <input type="text" name="university_data" <?php if (!empty($_SESSION['step_pp_9']['university_data'])) { echo "value=\"".$_SESSION['step_pp_9']['university_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_university'); ?>', '<?php echo $webgen_u_s_university_empty[$language]; ?>', '<?php echo $webgen_u_s_university_valid[$language]; ?>', '<?php echo $webgen_u_s_university_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'university')" />
            </label>
        </li>    
        <?php      
            
            if (isset($_SESSION['step_pp_5']['university_faculty']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_university_faculty"></span> <?php echo $webgen_u_s_faculty[$language]; ?>
                <input type="text" name="faculty_data" <?php if (!empty($_SESSION['step_pp_9']['faculty_data'])) { echo "value=\"".$_SESSION['step_pp_9']['faculty_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_faculty'); ?>', '<?php echo $webgen_u_s_faculty_empty[$language]; ?>', '<?php echo $webgen_u_s_faculty_valid[$language]; ?>', '<?php echo $webgen_u_s_faculty_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'faculty')" />
            </label>
        </li>      
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_specialization']) || $isAllFalse) {
        
        ?>  
        <li>
            <label>
                <span id="span_university_specialization"></span> <?php echo $webgen_u_s_specialization[$language]; ?>
                <input type="text" name="specialization_data" <?php if (!empty($_SESSION['step_pp_9']['specialization_data'])) { echo "value=\"".$_SESSION['step_pp_9']['specialization_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_specialization'); ?>', '<?php echo $webgen_u_s_specialization_empty[$language]; ?>', '<?php echo $webgen_u_s_specialization_valid[$language]; ?>', '<?php echo $webgen_u_s_specialization_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'specialization')" />
            </label>
        </li>      
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_year']) || $isAllFalse) {
        
        ?>
  
        <li>  
            <label>
                <span id="span_university_year"></span> <?php echo $webgen_u_s_year[$language]; ?>
                <input type="text" id="year_data" name="year_data" <?php if (!empty($_SESSION['step_pp_9']['year_data'])) { echo "value=\"".$_SESSION['step_pp_9']['year_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_year'); ?>', '<?php echo $webgen_u_s_year_empty[$language]; ?>', '<?php echo $webgen_u_s_year_valid[$language]; ?>', '<?php echo $webgen_u_s_year_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'yearschool')" />
            </label>
        </li>       
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_department']) || $isAllFalse) {
        
        ?>  
        <li>
            <label>
                <span id="span_university_department"></span> <?php echo $webgen_u_r_department[$language]; ?>
                <input type="text" name="department_data" <?php if (!empty($_SESSION['step_pp_9']['department_data'])) { echo "value=\"".$_SESSION['step_pp_9']['department_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_department'); ?>', '<?php echo $webgen_u_r_department_empty[$language]; ?>', '<?php echo $webgen_u_r_department_valid[$language]; ?>', '<?php echo $webgen_u_r_department_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'department')" />
            </label>
        </li>      
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_position']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_university_position"></span> <?php echo $webgen_u_r_position[$language]; ?>
                <input type="text" name="position_data" <?php if (!empty($_SESSION['step_pp_9']['position_data'])) { echo "value=\"".$_SESSION['step_pp_9']['position_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_position'); ?>', '<?php echo $webgen_u_r_position_empty[$language]; ?>', '<?php echo $webgen_u_r_position_valid[$language]; ?>', '<?php echo $webgen_u_r_position_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'position')" />
            </label>
        </li>       
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_office']) || $isAllFalse) {
            
        ?>
        <li>
            <label>
                <span id="span_university_office"></span> <?php echo $webgen_u_r_office[$language]; ?>
                <input type="text" name="office_data" <?php if (!empty($_SESSION['step_pp_9']['office_data'])) { echo "value=\"".$_SESSION['step_pp_9']['office_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_office'); ?>', '<?php echo $webgen_u_r_office_empty[$language]; ?>', '<?php echo $webgen_u_r_office_valid[$language]; ?>', '<?php echo $webgen_u_r_office_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'office')" />
            </label>
        </li>           
        
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_hour']) || $isAllFalse) {
        
        ?>
        <li id="li_hours">
            <ul class="ul_hours">
                <li class="hours_day">
                    <label>
                        <span class="span_university_hour"></span> <span class="hours_label"><?php echo $webgen_u_r_hour[$language]; ?></span>
                        <input type="text" name="hour_day_data[]" onkeyup="hours(this, '<?php echo returnNext($a, '.university_hour'); ?>', '<?php echo $webgen_u_r_day[$language]; ?>', '<?php echo $webgen_u_r_hour_empty[$language]; ?>', '<?php echo $webgen_u_r_hour_firstempty[$language]; ?>', '<?php echo $webgen_u_r_day_valid[$language]; ?>', '<?php echo $webgen_u_r_day_invalid[$language]; ?>', '<?php echo $webgen_u_r_hour_empty[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'day')" />
                    </label>
                </li>
                
                <li class="hours_invisible" style="display: none;">
                    <label>
                        <span class="span_university_from"></span> <?php echo $webgen_u_r_from[$language]; ?>
                        <input type="text" name="hour_from_data[]" onkeyup="prompt_clone_check(this, '.span_university_to', '<?php echo $webgen_u_r_from_empty[$language]; ?>', '<?php echo $webgen_u_r_from_valid[$language]; ?>', '<?php echo $webgen_u_r_from_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'hour', 'li')" />
                    </label>
                </li>

                <li class="hours_invisible" style="display: none;">
                    <label>
                        <span class="span_university_to"></span> <?php echo $webgen_u_r_to[$language]; ?>
                        <input type="text" name="hour_to_data[]" onkeyup="prompt_clone_check(this, '.span_university_hour', '<?php echo $webgen_u_r_to_empty[$language]; ?>', '<?php echo $webgen_u_r_to_valid[$language]; ?>', '<?php echo $webgen_u_r_to_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'hour', 'ul')" />
                    </label>
                </li>
            </ul>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_departmentphone']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_university_departmentphone"></span> <?php echo $webgen_u_r_departmentphone[$language]; ?>
                <input type="text" id="departmentphone_data" name="departmentphone_data" <?php if (!empty($_SESSION['step_pp_9']['departmentphone_data'])) { echo "value=\"".$_SESSION['step_pp_9']['departmentphone_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_departmentphone'); ?>', '<?php echo $webgen_u_r_departmentphone_empty[$language]; ?>', '<?php echo $webgen_u_r_departmentphone_valid[$language]; ?>', '<?php echo $webgen_u_r_departmentphone_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'phone')" />
            </label>
        </li>     
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_schooladdress']) || $isAllFalse) {
        
        ?>  
        <li>
            <label>
                <span id="span_university_schooladdress"></span> <?php echo $webgen_street[$language]; ?>
                <input type="text" name="school_street_data" <?php if (!empty($_SESSION['step_pp_9']['school_street_data'])) { echo "value=\"".$_SESSION['step_pp_9']['school_street_data']."\""; } ?> onkeyup="prompt_check(this, 'span_university_school_housenumber', '<?php echo $webgen_street_empty[$language]; ?>', '<?php echo $webgen_street_valid[$language]; ?>', '<?php echo $webgen_street_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'street')" />
            </label>
        </li>
    
        <li>
            <label>
                <span id="span_university_school_housenumber"></span> <?php echo $webgen_housenumber[$language]; ?>
                <input type="text" name="school_housenumber_data" <?php if (!empty($_SESSION['step_pp_9']['school_housenumber_data'])) { echo "value=\"".$_SESSION['step_pp_9']['school_housenumber_data']."\""; } ?> onkeyup="prompt_check(this, 'span_university_school_city', '<?php echo $webgen_housenumber_empty[$language]; ?>', '<?php echo $webgen_housenumber_valid[$language]; ?>', '<?php echo $webgen_housenumber_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'housenumber')" />
            </label>
        </li>
    
        <li>
            <label>
                <span id="span_university_school_city"></span> <?php echo $webgen_city[$language]; ?>
                <input type="text" name="school_city_data" <?php if (!empty($_SESSION['step_pp_9']['school_city_data'])) { echo "value=\"".$_SESSION['step_pp_9']['school_city_data']."\""; } ?> onkeyup="prompt_check(this, 'span_university_school_postcode', '<?php echo $webgen_city_empty[$language]; ?>', '<?php echo $webgen_city_valid[$language]; ?>', '<?php echo $webgen_city_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'city')" />
            </label>
        </li>
        
        <li>
            <label>
                <span id="span_university_school_postcode"></span> <?php echo $webgen_postcode[$language]; ?>
                <input type="text" name="school_postcode_data" <?php if (!empty($_SESSION['step_pp_9']['school_postcode_data'])) { echo "value=\"".$_SESSION['step_pp_9']['school_postcode_data']."\""; } ?> onkeyup="prompt_check(this, 'span_university_school_state', '<?php echo $webgen_postcode_empty[$language]; ?>', '<?php echo $webgen_postcode_valid[$language]; ?>', '<?php echo $webgen_postcode_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'postcode')" />
            </label>
        </li>
    
        <li>
            <label>
                <span id="span_university_school_state"></span> <?php echo $webgen_state[$language]; ?>
                <input type="text" name="school_state_data" <?php if (!empty($_SESSION['step_pp_9']['school_state_data'])) { echo "value=\"".$_SESSION['step_pp_9']['school_state_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_schooladdress'); ?>', '<?php echo $webgen_state_empty[$language]; ?>', '<?php echo $webgen_state_valid[$language]; ?>', '<?php echo $webgen_state_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'state')" />
            </label>
        </li>
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_schoolpages']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_university_schoolpages"></span> <?php echo $webgen_u_s_uniwww[$language]; ?>
                <input type="text" name="schoolpages_data" <?php if (!empty($_SESSION['step_pp_9']['schoolpages_data'])) { echo "value=\"".$_SESSION['step_pp_9']['schoolpages_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_schoolpages'); ?>', '<?php echo $webgen_u_s_uniwww_empty[$language]; ?>', '<?php echo $webgen_u_s_uniwww_valid[$language]; ?>', '<?php echo $webgen_u_s_uniwww_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'www')" />
            </label>
        </li>  
        
        <?php      
            
            }
            if (isset($_SESSION['step_pp_5']['university_facultypages']) || $isAllFalse) {
        
        ?>
        <li>  
            <label>
                <span id="span_university_facultypages"></span> <?php echo $webgen_u_s_facwww[$language]; ?>
                <input type="text" name="facultypages_data" <?php if (!empty($_SESSION['step_pp_9']['facultypages_data'])) { echo "value=\"".$_SESSION['step_pp_9']['facultypages_data']."\""; } ?> onkeyup="prompt_check(this, '<?php echo returnNext($a, 'university_facultypages'); ?>', '<?php echo $webgen_u_s_facwww_empty[$language]; ?>', '<?php echo $webgen_u_s_facwww_valid[$language]; ?>', '<?php echo $webgen_u_s_facwww_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'www')" />
            </label>
        </li>       
        <?php      
            
            }
            
            if (isset($_SESSION['step_pp_5']['university_project']) || $isAllFalse) {
                
                if (isset($_SESSION['step_pp_5']['university_projectpages']) || $isAllFalse) { $www = true; } else { $www = false; }
        
        ?>
        
        <li id="li_projects">
            <ul class="ul_projects">
                <li>  
                    <label>
                        <span class="span_university_project"></span> <span class="span_university_project_info"><?php echo $webgen_u_s_first_project[$language]; ?></span>
                        <input type="text" name="project_name_data[]" onkeyup="prompt_clone_check(this, '.span_university_description', '<?php echo $webgen_u_s_project_empty[$language]; ?>', '<?php echo $webgen_u_s_project_valid[$language]; ?>', '<?php echo $webgen_u_s_project_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'project', 'li')" />
                    </label>
                </li>
                
                <li>  
                    <label>
                        <span class="span_university_description"></span> <?php echo $webgen_u_s_project_description[$language]; ?>
                        <input type="text" name="project_description_data[]" onkeyup="prompt_clone_check(this, '.span_university_coauthor', '<?php echo $webgen_u_s_project_description_empty[$language]; ?>', '<?php echo $webgen_u_s_project_description_valid[$language]; ?>', '<?php echo $webgen_u_s_project_description_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'description', 'li')" />
                    </label>
                </li>        
                     
                <li>
                    <ul class="ul_coauthors"> 
                        <li class="li_coauthors">  
                            <label>
                                <span class="span_university_coauthor"></span> <span class="coauthor_info"><?php echo $webgen_u_s_project_coauthor[$language]; ?></span>
                                <input type="text" name="project_coauthor0_data[]" onkeyup="coauthors(this, '.span_university_year', '<?php echo $webgen_u_s_project_coauthor_next[$language]; ?>', '<?php echo $webgen_u_s_project_coauthor_end[$language]; ?>', '<?php echo $webgen_u_s_project_coauthor_emptyfirst[$language]; ?>', '<?php echo $webgen_u_s_project_coauthor_valid[$language]; ?>', '<?php echo $webgen_u_s_project_coauthor_invalid[$language]; ?>', '<?php echo $webgen_u_s_project_coauthor_empty[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'coauthor', 'li')" />
                            </label>
                        </li>
                    </ul>
                </li>
                
                <li>  
                    <label>
                        <span class="span_university_year"></span> <?php echo $webgen_u_s_project_year[$language]; ?>
                        <input type="text" name="project_year_data[]" onkeyup="prompt_clone_check(this, '<?php if ($www) { echo ".span_university_www"; } else { echo ".span_next_project"; } ?>', '<?php echo $webgen_u_s_project_year_empty[$language]; ?>', '<?php echo $webgen_u_s_project_year_valid[$language]; ?>', '<?php echo $webgen_u_s_project_year_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'year', 'li', '<?php echo $next_project_button_info[$language]; ?>')" />
                    </label>
                </li> 
                <?php
                
                    if ($www) {
                
                ?>
                <li>  
                    <label>
                        <span class="span_university_www"></span> <?php echo $webgen_u_s_project_www[$language]; ?>
                        <input type="text" name="project_www_data[]" onkeyup="prompt_clone_check(this, '.span_next_project', '<?php echo $webgen_u_s_project_www_empty[$language]; ?>', '<?php echo $webgen_u_s_project_www_valid[$language]; ?>', '<?php echo $webgen_u_s_project_www_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'www', 'li', '<?php echo $next_project_button_info[$language]; ?>')" />
                    </label>
                </li>
                <?php
                
                    }
                
                ?>
                <li>
                    <label>
                        <span class="span_next_project"> </span> <span class="span_next_project_button_info"></span>
                        <input type="button" value="<?php echo $next_project_button[$language]; ?>" onclick="clone_project(this, '<?php echo $webgen_u_s_project_next[$language]; ?>', '<?php echo $webgen_u_s_project_coauthor[$language]; ?>')" />
                    </label>
                </li>
            </ul>
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