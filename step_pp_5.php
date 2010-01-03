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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_choice_title[$language];

//        $_SESSION = array();


    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        $_SESSION['steps']  = array('1', '2', '3', '4', '5', '6');
        
        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_5'] = array();        
        
        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_5']["$key"] = $value;
        }
        
        // Vlozeni cisla kroku, ktere se maji provest na zaklade toho, co vlozil uzivatel - prvky se pridavaji na konec pole
        
        $choices = array(
            '7'  => 'photo',
            '8'  => 'contact',
            '9'  => 'university',
            '10' => 'firm',
            '11' => 'hobby',
            '12' => 'knowledge',
            '13' => 'birthdate',
            '14' => 'cv',
            '15' => 'textfield',
            '16' => 'links',
        );
        
        foreach ($choices as $key => $val) {
            if (isset($_SESSION['step_pp_5']["{$val}"])) {
                array_push ($_SESSION['steps'], $key);
            }
        }
        
        // Zjisteni, zda nejsou nahodou odskrtle vsechny aplikace - v tom pripade je nutne spustit PhotoGate.
        
        $nextInput = array('features_favphoto', 'features_calendar', 'features_hour', 'features_weather', 'features_counter', 'features_quest', 'features_email', 'features_discus');
    
        $isAllFalse = true;
        
        foreach ($nextInput as $key => $val) {
            if (isset($_SESSION['step_pp_5']["{$val}"])) {
                $isAllFalse = false;
            }
        }
        
        // Generovani PhotoGate bude probihat jen tehdy, pokud je zaroven zaskrtle features (nadrazeby element)
        
        if (isset($_SESSION['step_pp_5']['features'])) {
            if (isset($_SESSION['step_pp_5']['features_favphoto']) || $isAllFalse) {
                array_push ($_SESSION['steps'], '17');
            }
            if ($isAllFalse || $_SESSION['step_pp_5']['features_hour'] || $_SESSION['step_pp_5']['features_quest']) {
                array_push ($_SESSION['steps'], '18');
            }
        }
        
        $_SESSION['step_pp_5']['featuresIsAllFalse'] = $isAllFalse;
        
        array_push ($_SESSION['steps'], '19');
        array_push ($_SESSION['steps'], '20');
        array_push ($_SESSION['steps'], '21');
    }
    
    echo "<h1>".$webgen_choice_title[$language]."</h1>";  
?>

<h2 class="ok"><?php echo $webgen_choice_h2[$language] ?></h2>
    
<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    
    <ul id="main_list" class="clear">
        
        <li id="li_degree">
            <label>
                <input type="checkbox" value="yes" name="degree" <?php if (isset($_SESSION['step_pp_5']['degree'])) { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_choice_degree[$language] ?>
            </label>
        </li>

        <li id="li_photo">
            <label>
                <input type="checkbox" value="yes" name="photo" <?php if (isset($_SESSION['step_pp_5']['photo'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'photos'"; ?>)" />  
                <?php echo $webgen_choice_photo[$language] ?> <span id="photos_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['photo'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
  
            <ul id="photos_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['photo'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="radio" value="url" name="photo_file" <?php if ($_SESSION['step_pp_5']['photo_file'] != 'file') { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_photo_file_b[$language]; ?>
                    </label>
                </li>                   
                
                <li>
                    <label>
                        <input type="radio" value="file" name="photo_file" <?php if ($_SESSION['step_pp_5']['photo_file'] == 'file') { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_photo_file_a[$language]; ?>
                    </label>
                </li>                                 
            </ul>
        </li> 
                                                                                
        <li id="li_contact">
            <label>
                <input type="checkbox" value="yes" name="contact" <?php if (isset($_SESSION['step_pp_5']['contact'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'contact'"; ?>)" />
                <?php echo $webgen_choice_contact[$language] ?> <span id="contact_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['contact'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
  
            <ul id="contact_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['contact'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="contact_email" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_email'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_email[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="contact_address" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_address'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_address[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="contact_cellular" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_cellular'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_cellular[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="contact_phone" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_phone'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_phone[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="contact_fax" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_fax'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_fax[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="contact_icq" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_icq'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_icq[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label >
                        <input type="checkbox" name="contact_skype" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_skype'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_skype[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="contact_otherprotocols" value="yes" <?php if (isset($_SESSION['step_pp_5']['contact_otherprotocols'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_contact_otherprotocols[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>

        <li id="li_university">
            <label>
                <input type="checkbox" value="yes" name="university" <?php if (isset($_SESSION['step_pp_5']['university'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'university'"; ?>)" />
                <?php echo $webgen_choice_university[$language] ?> <span id="university_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['university'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
  
            <ul id="university_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['university'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="university_university" checked="checked" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_university'])) { echo "checked=\"checked\""; } ?> onclick="this.checked='checked'" />
                        <?php echo $webgen_choice_university_university[$language]." ".$mand[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_faculty" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_faculty'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_faculty[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_specialization" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_specialization'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_specialization[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_year" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_year'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_year[$language]; ?></label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_department" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_department'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_department[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_position" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_position'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_position[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_office" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_office'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_office[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_hour" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_hour'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_hour[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_departmentphone" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_departmentphone'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_departmentphone[$language]; ?>
                    </label>
                </li>               
                
                <li>
                    <label>
                        <input type="checkbox" name="university_schooladdress" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_schooladdress'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_schooladdress[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_project" id="university_project" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_project'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_project[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_schoolpages" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_schoolpages'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_schoolpages[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_facultypages" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_facultypages'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_facultypages[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="university_projectpages" value="yes" <?php if (isset($_SESSION['step_pp_5']['university_projectpages'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_university_projectpages[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>

        <li id="li_firm">
            <label>
                <input type="checkbox" value="yes" name="firm" <?php if (isset($_SESSION['step_pp_5']['firm'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'firm'"; ?>)" />
                <?php echo $webgen_choice_firm[$language] ?> <span id="firm_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['firm'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="firm_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['firm'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="firm_firmname" value="yes" checked="checked" <?php if (isset($_SESSION['step_pp_5']['firm_firmname'])) { echo "checked=\"checked\""; } ?> onclick="this.checked='checked'" />
                        <?php echo $webgen_choice_firm_firmname[$language]." ".$mand[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_ic" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_ic'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_ic[$language]; ?></label>
                </li>            
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_direction" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_direction'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_direction[$language]; ?>
                    </label>
                </li>            
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_workload" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_workload'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_workload[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_position" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_position'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_position[$language]; ?>
                    </label>
                </li>            
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_address" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_address'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_address[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_www" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_www'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_www[$language]; ?></label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="firm_add" value="yes" <?php if (isset($_SESSION['step_pp_5']['firm_add'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_firm_add[$language]; ?></label>
                </li>                            
            </ul>
        </li>
    
        <li id="li_hobby">
            <label>
                <input type="checkbox" value="yes" name="hobby" <?php if (isset($_SESSION['step_pp_5']['hobby'])) { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_choice_hobby[$language] ?>
            </label>
        </li>
        
        <li id="li_knowledge">
            <label>
                <input type="checkbox" value="yes" name="knowledge" <?php if (isset($_SESSION['step_pp_5']['knowledge'])) { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_choice_knowledge[$language] ?>
            </label>
        </li>
        
        <li id="li_birthdate">
            <label>
                <input type="checkbox" value="yes" name="birthdate" <?php if (isset($_SESSION['step_pp_5']['birthdate'])) { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_choice_birthdate[$language] ?>
            </label>
        </li>

        <li id="li_cv">
            <label>
                <input type="checkbox" value="yes" name="cv" <?php if (isset($_SESSION['step_pp_5']['cv'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'cv'"; ?>)" />
                <?php echo $webgen_choice_cv[$language] ?> <span id="cv_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['cv'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
          
            <ul id="cv_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['cv'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="cv_nationality" value="yes" <?php if (isset($_SESSION['step_pp_5']['cv_nationality'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_cv_nationality[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="cv_family" value="yes" <?php if (isset($_SESSION['step_pp_5']['cv_family'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_cv_family[$language]; ?>
                    </label>
                </li>                        
                
                <li>
                    <label>
                        <input type="checkbox" name="cv_school" value="yes" <?php if (isset($_SESSION['step_pp_5']['cv_school'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_cv_school[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="cv_work" value="yes" <?php if (isset($_SESSION['step_pp_5']['cv_work'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_cv_work[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="cv_knowledge" value="yes" <?php if (isset($_SESSION['step_pp_5']['cv_knowledge'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_cv_knowledge[$language]; ?>
                    </label>
                </li>                                
                
<!--  mezera mezi < a ? ... nutne odmazat              
                <li>
                    <label>
                        <input type="checkbox" name="cv_publication" value="yes" < ?php if (isset($_SESSION['step_pp_5']['cv_publication'])) { echo "checked=\"checked\""; } ?> />
                        < ?php echo $webgen_choice_cv_publication[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="cv_product" value="yes" < ?php if (isset($_SESSION['step_pp_5']['cv_product'])) { echo "checked=\"checked\""; } ?> />
                        < ?php echo $webgen_choice_cv_product[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="cv_prize" value="yes" < ?php if (isset($_SESSION['step_pp_5']['cv_prize'])) { echo "checked=\"checked\""; } ?> />
                        < ?php echo $webgen_choice_cv_prize[$language]; ?>
                    </label>
                </li>
 -->
       
                <li>
                    <label>
                        <input type="checkbox" name="cv_other" value="yes" <?php if (isset($_SESSION['step_pp_5']['cv_other'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_cv_other[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>

        <li id="li_textfield">
            <label>
                <input type="checkbox" value="yes" name="textfield" <?php if (isset($_SESSION['step_pp_5']['textfield'])) { echo "checked=\"checked\""; } ?> />
                <?php echo $webgen_choice_textfield[$language] ?>
            </label>
        </li>

        <li id="li_links">
            <label>
                <input type="checkbox" value="yes" name="links" <?php if (isset($_SESSION['step_pp_5']['links'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'links'"; ?>)" />
                <?php echo $webgen_choice_links[$language] ?> <span id="links_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['links'] )) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
  
            <ul id="links_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['links'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="links_def" value="yes" <?php if (isset($_SESSION['step_pp_5']['links_def'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_links_def[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="links_undef" value="yes" <?php if (isset($_SESSION['step_pp_5']['links_undef'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_links_undef[$language]; ?>
                    </label>
                </li>          
            </ul>
        </li>

        <li id="li_features">
            <label>
                <input type="checkbox" value="yes" name="features" <?php if (isset($_SESSION['step_pp_5']['features'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'features'"; ?>)" />
                <?php echo $webgen_choice_features[$language] ?> <span id="features_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['features'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
  
            <ul id="features_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['features'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="checkbox" name="features_favphoto" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_favphoto'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'features_favphoto'"; ?>)" />
                        <?php echo $webgen_choice_features_favphoto[$language]; ?> <span id="features_favphoto_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['features_favphoto'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
                    </label>
                
                    <ul id="features_favphoto_list" class="clear" <?php if (!isset($_SESSION['step_pp_5']['features_favphoto'])) { echo "style=\"display: none;\""; } ?> >
                        <li>
                            <label>
                                <input type="radio" name="favphoto_file" value="url" <?php if ($_SESSION['step_pp_5']['favphoto_file'] != 'file') { echo "checked=\"checked\""; } ?> />
                                <?php echo $webgen_choice_photo_file_b[$language]; ?>
                            </label>
                        </li>                   
                        
                        <li>
                            <label>
                                <input type="radio" name="favphoto_file" value="file" <?php if ($_SESSION['step_pp_5']['photo_file'] == 'file') { echo "checked=\"checked\""; } ?> />
                                <?php echo $webgen_choice_photo_file_a[$language]; ?>
                            </label>
                        </li>
                    </ul>
                </li>

<!--  mezera mezi < a ? ... nutne odmazat
                <li>
                    <label>
                        <input type="checkbox" name="features_contacticon" value="yes" < ?php if (isset($_SESSION['step_pp_5']['features_contacticon'])) { echo "checked=\"checked\""; } ?> />
                        < ?php echo $webgen_choice_features_contacticon[$language]; ?>
                    </label>
                </li>
-->
                <li>
                    <label>
                        <input type="checkbox" name="features_calendar" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_calendar'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_calendar[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="features_hour" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_hour'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_hour[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="features_weather" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_weather'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_weather[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="features_counter" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_counter'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_counter[$language]; ?>
                    </label>
                </li>

                <li>
                    <label>
                        <input type="checkbox" name="features_quest" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_quest'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_quest[$language]; ?>
                    </label>
                </li>
                
                <li>
                    <label>
                        <input type="checkbox" name="features_email" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_email'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_email[$language]; ?>
                    </label>
                </li>
                
<!--                <li>
                    <label>
                        <input type="checkbox" name="features_addresser" value="yes" < ?php if (isset($_SESSION['step_pp_5']['features_addresser'])) { echo "checked=\"checked\""; } ?> />
                        < ?php echo $webgen_choice_features_addresser[$language]; ?>
                    </label>
                </li>
-->
                
                <li>
                    <label>
                        <input type="checkbox" name="features_discus" value="yes" <?php if (isset($_SESSION['step_pp_5']['features_discus'])) { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_features_discus[$language]; ?>
                    </label>
                </li>
            </ul>
        </li>
    </ul>
    
    <input type="submit" id="submit_button" value="<?php echo $submit_button[$language] ?>" />
</form>

    

