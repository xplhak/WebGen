<?php

/*
    Copyright (c) 2009 Jiří Uhýrek

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
    
  $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_edit_choice_title[$language];

  function loadNode($node) {
    $node = (array)$node;
    foreach ($node as $key => $value) {
      if(is_object($value) || is_array($value)) {
        $node[$key] = loadNode($value);
      } else {
        $node[$key] = $value;
      }
    }
    return $node;
  }

  /** NACTENI DAT Z XML A ULOZENI DO SESSIONS ***/
  $_SESSION['loaded_data'] = loadNode(simplexml_load_file('./presentations/'.$_SESSION['step_all_2']['user_name'].'/'.$_SESSION['step_all_3']['edit_presentation_name'].'/'.$_SESSION['step_all_3']['edit_presentation_name'].'.xml')->personalPageData);

  // kvuli fci "zpet"
  if (isset($_SESSION['step_ppedit_5_back'])) {
    $_SESSION['step_ppedit_5'] = $_SESSION['step_ppedit_5_back'] ;
  }

  // spracovanie formulara
  if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych
        $_SESSION['steps']  = array('1', '2', '3', '4','5','6');
        
        // zkopirovani nazvu prezentace pro potreby generovani
        
        $_SESSION['step_all_4']['presentation_name'] = $_SESSION['step_all_3']['edit_presentation_name']; 
        
        // smazani obsahu nevyplnenych promennych
        
        $_SESSION['step_ppedit_5'] = array();
        $_SESSION['step_ppedit_5'] = $_POST;
        $_SESSION['step_ppedit_5_back'] = $_POST;

        
        foreach($_SESSION['step_ppedit_5'] as $key => $val) {
          if ($_SESSION['step_ppedit_5']["{$key}_action"] == 'delete') {
            unset($_SESSION['step_ppedit_5'][$key]);
          }
        } 
         
        
        // debug

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

        unset($_SESSION["step_ppedit_6"]);

        foreach ($choices as $key => $val) {
          unset($_SESSION["step_ppedit_$key"]); // smazani sessions ..

          if ( isset($_SESSION['step_ppedit_5'][$val]) && $_SESSION['step_ppedit_5']["{$val}_action"] != 'delete') {
              array_push ($_SESSION['steps'], $key);
          }
        }
        
        array_push ($_SESSION['steps'], '19');
        array_push ($_SESSION['steps'], '20');
        array_push ($_SESSION['steps'], '21');

        loadToSession();
        unset($_SESSION['loaded_data']);
    }
    
    echo "<h1>".$webgen_edit_choice_title[$language]."</h1>";  
?>

<h2 class='ok'><?php echo $webgen_edit_choice_h2[$language] ?></h2>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
  <ul id='main_list' class='clear'>

<?php

    function translate($what) {
      global ${$what};
      global $language;
      if (isset( ${$what}[$language])) {
        return ${$what}[$language];
      } else {
        return "{$what}['{$language}']";
      }
    }

    function isFilled($topic) {
      $data = $_SESSION['loaded_data'];

      $parts = explode('_',$topic);
    
      foreach ($parts as $part) {
        if (isset($data[$part])) {
          $data = $data[$part];
        } else {
          return false;
        }
      }
      return true;
    }

    function isFilledInXML($field) {
      switch ($field) {
        case 'degree': return isFilled('person_prefix') || isFilled('person_sufix');

        case 'photo': return isFilled('person_photo');

        case 'contact': return isFilled('contacts');
        case 'contact_email': return isFilled('contacts_email');
        case 'contact_address': return isFilled('contacts_homeAddress');
        case 'contact_cellular': return isFilled('contacts_phoneNumbers_mobilePhone');
        case 'contact_phone': return isFilled('contacts_phoneNumbers_phone');
        case 'contact_fax': return isFilled('contacts_phoneNumbers_fax');
        case 'contact_icq': return isFilled('contacts_communicationProtocols_icq');
        case 'contact_skype': return isFilled('contacts_communicationProtocols_skype');
        case 'contact_otherprotocols': return isFilled('contacts_communicationProtocols_irc') || isFilled('contacts_communicationProtocols_msn') || isFilled('contacts_communicationProtocols_aim');
        
        case 'university': return isFilled('school');
        case 'university_university': return isFilled('school_university');
        case 'university_faculty': return isFilled('school_faculty');
        case 'university_specialization': return isFilled('school_student_branch');
        case 'university_year': return isFilled('school_student_grade');
        case 'university_department': return isFilled('school_employee_department');
        case 'university_position': return isFilled('school_employee_position');
        case 'university_office': return isFilled('school_employee_office');
        case 'university_hour': return isFilled('school_employee_consultationHours');
        case 'university_departmentphone': return isFilled('school_employee_workPhone');
        case 'university_schooladdress': return isFilled('school_schoolAddress');
        case 'university_project': return isFilled('school_projects');
        case 'university_schoolpages': return isFilled('school_universityUrl');
        case 'university_facultypages': return isFilled('school_facultyUrl');
        //'projectpages' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
        
        case 'firm': return isFilled('business');
        case 'firm_firmname': return('business_businessName');
        case 'firm_ic': return isFilled('business_id');
        case 'firm_direction': return isFilled('business_directions');
        case 'firm_workload': return isFilled('business_workloads');
        case 'firm_position': return isFilled('business_position');
        case 'firm_address': return isFilled('business_businessAddress');
        case 'firm_www': return isFilled('business_businessUrl');
        case 'firm_add': return isFilled('business_otherInformation');
        
        case 'hobby': return isFilled('hobbies');
        case 'knowledge': return isFilled('knowledges');
        case 'birthdate': return isFilled('birth');

        case 'cv': return isFilled('cv');
        case 'cv_nationality': return isFilled('cv_nationality');
        case 'cv_family': return isFilled('cv_maritalStatus');
        case 'cv_school': return isFilled('cv_courses');
        case 'cv_work':return isFilled('cv_workExperiences');
        case 'cv_knowledge':return isFilled('cv_personalSkills');
        case 'cv_other':return isFilled('cv_otherInformation');
        
        case 'textfield': return isFilled('texts');


        case 'links': return isFilled('links');
        
        case 'features': return isFilled('applications');

        default: return false;
      }
    }


    function generateEditChoice($field, $details, $pack, $unpack) {
      if (isFilledInXML($field)) {

        echo "<li id='li_$field'>";
        echo " <label>";
        echo "   <input type='checkbox' value='yes' name='$field'";
        if (isset($_SESSION['step_ppedit_5'][$field])) { echo " checked=\"checked\" "; }
        if (isset($details['choices'])) {
          echo " onclick=\"show_action_choice(this,'{$field}_action')\"";
        }
        if (isset($details['subfields'])) {
          echo " onclick=\"pack_choice('$pack','$unpack','$field')\"";
        }
        echo "/> ".translate("webgen_choice_{$field}");
        if (isset($details['subfields'])) {
          $pack_info = isset($_SESSION['step_ppedit_5'][$field]) ? $pack : $unpack;
          echo "<span id='{$field}_pack_info' class='pack_info'>$pack_info</span>";
        }
        $display = "";
        if (isset($details['choices'])) {
          if (!isset($_SESSION['step_ppedit_5'][$field])) {$display = "style='display:none'";}
          echo "<select id='{$field}_action' name='{$field}_action' $display>";
          if (isset($details['choices'])) {
            foreach($details['choices'] as $key => $value) {
              $selected = "";
              if($_SESSION['step_ppedit_5']["{$field}_action"] == $key) { $selected = "selected"; }
              echo "<option value='$key' {$selected}>{$value}</option>";
            }
          }
          echo "</select>";
        }
        echo "</label>";
        if (isset($details['subfields'])) {
          $unfilled_subfields = array();
          $display = "";
          if (!isset($_SESSION['step_ppedit_5'][$field])) {$display = "style='display:none'";}
          echo "<ul id='{$field}_list' class='clear' $display>";
          foreach($details['subfields'] as $subfield => $options) {
            if(isFilledInXML("{$field}_{$subfield}")) {
              echo "<li><label>";
              echo "<input type='checkbox' value='yes' name='{$field}_{$subfield}'";
              if (isset($_SESSION['step_ppedit_5']["{$field}_{$subfield}"])) { echo " checked=\"checked\" "; }
              echo " onclick=\"show_action_choice(this,'{$field}_{$subfield}_action')\"";
              echo " /> ".translate("webgen_choice_{$field}_{$subfield}");
              $display = "";
              if (!isset($_SESSION['step_ppedit_5']["{$field}_{$subfield}"])) {$display = "style='display:none'";}
              echo "<select id='{$field}_{$subfield}_action' name='{$field}_{$subfield}_action' $display>";
              foreach($options as $key => $value) {
                $selected = "";
                if($_SESSION['step_ppedit_5']["{$field}_{$subfield}_action"] == $key) { $selected = "selected"; }
                echo "<option value='$key' {$selected}>{$value}</option>";
              }
              echo "</select>";

              echo "</label></li>";
            } else {
              $unfilled_subfields[] = $subfield;
            }
          }
          
          // SUBFIELDY NEVYPLNENE

          if (sizeof($unfilled_subfields) > 0) {
            echo "<li><label>";
            echo "<input type='checkbox' value='yes' name='{$field}_addnew'";
            echo " onclick=\"pack_choice('$pack','$unpack','{$field}_addnew')\"";
            if (isset($_SESSION['step_ppedit_5']["{$field}_addnew"])) { echo " checked=\"checked\" "; }
            echo " /> ".translate('webgen_edit_add_other');
            $pack_info = isset($_SESSION['step_ppedit_5']["{$field}_addnew"]) ? $pack : $unpack;
            echo "<span id='{$field}_addnew_pack_info' class='pack_info'>$pack_info</span>";
            echo "</label>";

            $display = "";
            if (!isset($_SESSION['step_ppedit_5']["{$field}_addnew"])) {$display = "style='display:none'";}
            echo "<ul id='{$field}_addnew_list' $display>";
            foreach ($unfilled_subfields as $key) {
              echo "<li><label>";
              echo "<input type='checkbox' value='yes' name='{$field}_{$key}'";
              echo " /> ".translate("webgen_choice_{$field}_{$key}");
              echo "</label></li>";
            }
            echo "</ul></li>";
          }

          echo "</ul>";
        }
        echo "</li>";


        return true;
      } else {
        return false;
      }
    }


    function generateNewChoice($field, $details, $pack, $unpack) {
       echo "<li id='li_$field'>";
        echo " <label>";
       echo "   <input type='checkbox' value='yes' name='$field'";
        if (isset($_SESSION['step_ppedit_5'][$field])) { echo " checked=\"checked\" "; }
        if (isset($details['subfields'])) {
          echo " onclick=\"pack_choice('$pack','$unpack','$field')\"";
        }
        echo "/> ".translate("webgen_choice_{$field}");
        if (isset($details['subfields'])) {
          $pack_info = isset($_SESSION['step_ppedit_5'][$field]) ? $pack : $unpack;
          echo "<span id='{$field}_pack_info' class='pack_info'>$pack_info</span>";
        }
        echo "</label>";

        if (isset($details['subfields'])) {
          $unfilled_subfields = array();
          $display = "";
          if (!isset($_SESSION['step_ppedit_5'][$field])) {$display = "style='display:none'";}
          echo "<ul id='{$field}_list' class='clear' $display>";
          foreach($details['subfields'] as $subfield => $options) {
              echo "<li><label>";
              echo "<input type='checkbox' value='yes' name='{$field}_{$subfield}'";
              if($subfield == 'university' || $subfield == 'firmname') { echo " checked='checked' onclick=\"this.checked ='checked'\" ";}
              echo " /> ".translate("webgen_choice_{$field}_{$subfield}");
              if($subfield == 'university' || $subfield == 'firmname') { echo " ".translate('mand'); }
              echo "</label></li>";
          }
          echo "</ul>";
        }
        echo "</li>";
    }


    $fields = array(
      'degree' => array(
        'choices' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
      ),
      'photo' => array(
        'choices' => array('from_file'=>'new from file','from_url'=>'new from url','delete'=>translate('webgen_edit_delete'))
      ),
      'contact' => array(
        'subfields' => array(
          'email' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'address' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'cellular' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'phone' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'fax' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'icq' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'skype' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'otherprotocols' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
        )
      ),
      'university' => array(
        'subfields' => array(
          'university' => array('edit'=>translate('webgen_edit_edit')),
          'faculty' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'specialization' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'year' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'department' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'position' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'office' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'hour' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'departmentphone' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'schooladdress' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'project' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'schoolpages' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'facultypages' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'projectpages' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
        )
      ),
      'firm' => array(
        'subfields' => array(
          'firmname' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'ic' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'direction' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'workload' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'position' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'address' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'www' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'add' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
        )
      ),
      'hobby' => array(
        'choices' => array('edit'=>translate('webgen_edit_editall'),'delete'=>translate('webgen_edit_deleteall'))
      ),
      'knowledge' => array(
        'choices' => array('edit'=>translate('webgen_edit_editall'),'delete'=>translate('webgen_edit_deleteall'))
      ),
      'birthdate' => array(
        'choices' => array('edit'=>translate('webgen_edit_editall'),'delete'=>translate('webgen_edit_deleteall'))
      ),
      'cv' => array(
        'subfields' => array(
          'nationality' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'family' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'school' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'work' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'knowledge' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'other' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
        )
      ),
      'textfield' => array(
        'choices' => array('edit'=>translate('webgen_edit_editall'),'delete'=>translate('webgen_edit_deleteall'))
      ),
      'links' => array(
        'choices' => array('edit'=>translate('webgen_edit_editall'),'delete'=>translate('webgen_edit_deleteall'))
      ),
      'features' => array(
        'subfields' => array(
          'favphoto' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'calendar' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'hour' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'weather' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'counter' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'quest' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'email' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete')),
          'discus' => array('edit'=>translate('webgen_edit_edit'),'delete'=>translate('webgen_edit_delete'))
        )
      )
    );


    $unfilled_fields = array();

    foreach($fields as $field => $details) {
      if (!generateEditChoice($field,$details,$pack[$language],$unpack[$language])) {
        $unfilled_fields[$field] = $details ;
      }
    }

    if(sizeof($unfilled_fields) > 0) {
      echo "<li id='li_addnew'>";
      echo " <label>";
      echo "  <input type='checkbox' value='yes' name='addnew'";
      if (isset($_SESSION['step_ppedit_5']['addnew'])) { echo " checked=\"checked\" "; }
      echo " onclick=\"pack_choice('{$pack[$language]}','{$unpack[$language]}','addnew')\"";
      echo " /> ".translate("webgen_edit_add_other");
      $pack_info = isset($_SESSION['step_ppedit_5']['addnew']) ? $pack[$language] : $unpack[$language];
      echo "<span id='addnew_pack_info' class='pack_info'>$pack_info</span>";
      echo "</label>";
        
      $display = "";
      if (!isset($_SESSION['step_ppedit_5']['addnew'])) {$display = "style='display:none'";}
      
      echo "<ul id='addnew_list' class='clear' $display>";
      foreach($unfilled_fields as $field => $details) {
        if ($field == 'photo') {
?>
<li id="li_photo">
            <label>
                <input type="checkbox" value="yes" name="photo" <?php if (isset($_SESSION['step_ppedit_5']['photo'])) { echo "checked=\"checked\""; } ?> onclick="pack_choice(<?php echo "'".$pack[$language]."', '".$unpack[$language]."', 'photos'"; ?>)" />  
                <?php echo $webgen_choice_photo[$language] ?> <span id="photos_pack_info" class="pack_info"><?php if (!isset($_SESSION['step_pp_5']['photo'])) { echo $unpack[$language]; } else { echo $pack[$language]; } ?></span>
            </label>
  
            <ul id="photos_list" class="clear" <?php if (!isset($_SESSION['step_ppedit_5']['photo'])) { echo "style=\"display: none;\""; } ?> >
                <li>
                    <label>
                        <input type="radio" value="url" name="photo_file" <?php if ($_SESSION['step_ppedit_5']['photo_file'] != 'file') { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_photo_file_b[$language]; ?>
                    </label>
                </li>                   
                
                <li>
                    <label>
                        <input type="radio" value="file" name="photo_file" <?php if ($_SESSION['step_ppedit_5']['photo_file'] == 'file') { echo "checked=\"checked\""; } ?> />
                        <?php echo $webgen_choice_photo_file_a[$language]; ?>
                    </label>
                </li>                                 
            </ul>
        </li> 
<?php
        } else {
          generateNewChoice($field,$details,$pack[$language],$unpack[$language]);
        }
      }
      echo "</ul>";
      echo "</li>";
    }

?>
  </ul>
  <input type="submit" id="submit_button" value="<?php echo $submit_button[$language] ?>" />
</form>
