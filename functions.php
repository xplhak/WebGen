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

    // *********** PHP to JS array ****************************
    function getJavascriptArray($phpArray, $jsArrayName, &$html = '') {
        $html .= $jsArrayName . " = new Array(); \r\n ";
        
        foreach ($phpArray as $key => $value) {
            $outKey = (is_int($key)) ? '[' . $key . ']' : "['" . $key . "']";

            if (is_array($value)) {
                getJavascriptArray($value, $jsArrayName . $outKey, $html);
                continue;
            
            }

            $html .= $jsArrayName . $outKey . " = ";

            if (is_string($value)) {
                $html .= "'" . $value . "'; \r\n ";
            } elseif ($value === false) {
                $html .= "false; \r\n";
            } elseif ($value === NULL) {
                $html .= "null; \r\n";
            } elseif ($value === true) {
                $html .= "true; \r\n";
            } else {
                $html .= $value . "; \r\n";
            }
        }
       
        return $html;
    }
    
    // *********** prochazeni vicerozmerneho pole *************************

    
    function array_map_r( $func, $arr ) {
        $newArr = array();
    
        foreach( $arr as $key => $value ) {
            $newArr[ $key ] = ( is_array( $value ) ? array_map_r( $func, $value ) : ( is_array($func) ? call_user_func_array($func, $value) : $func( $value ) ) );
        }
        
        return $newArr;
    } 
    
    // *********** zmeni nastenou promenou tak, ze zmeni uvozovky a specialni znaky
    
    function changeVar($value) {
        //return $value;
        return array_htmlspecialchars($value);
    }
    
    function array_htmlspecialchars(&$input) {
        if (is_array($input)) {
            foreach ($input as $key => $value) {
                if (is_array($value)) {
                    $input[$key] = array_htmlspecialchars($value);
                } else $input[$key] = htmlspecialchars($value);
            }
        
            return $input;
            }
        return htmlspecialchars($input);
    }
    
    function array_htmlspecialchars_decode(&$input){
        if (is_array($input)) {
            foreach ($input as $key => $value) {
                if (is_array($value)) $input[$key] = array_htmlspecialchars_decode($value);
                else $input[$key] = htmlspecialchars_decode($value);
            }
            
            return $input;
        }
        return htmlspecialchars_decode($input);
    }

    // *********** je uzivatelske meno volne? **********************
    function isUserFree($username) {
        return !file_exists('./presentations/' . $username);    
    }
    
    // ************** je prezentacia daneho uzivatela volna? *******
    function isPresentationFree($username, $presentation) {
        return !file_exists('./presentations/' . $username . '/' . $presentation);
    }

    //zjisti nasledujici prvek v poli
    function returnNext($array, $current) {
        $j = 0;
         
        for ($i=0; $i<Count($array); $i++): 
            if ((string)$array[$i] == (string)$current) {
                if ($array[$i+1][0] == '.') {
                    return ".span_".substr($array[$i+1], 1);
                } else {
                    return "span_".$array[$i+1];
                }
            }
        endfor;
    
        return 'false';
    }

    // *** vytvori nabidku jiz drive vygenerovanych prezentaci pro editaci ***
    function showPresentations($username, $postvalue, $language, $type) {
        
        if (is_dir('./presentations/'.$username)) {
            
            $handle=opendir('./presentations/'.$username);
        
            while (false!==($file = readdir($handle))) {     
                if ($file != "." && $file != "..") {         
                    
                    if (file_exists('./presentations/'.$username.'/'.$file.'/'.$file.'.xml')) {
                        $xml = simplexml_load_file('./presentations/'.$username.'/'.$file.'/'.$file.'.xml');     
                        
                        if ($xml->attributes()->presentationType == "pp") {
                            $presentation_type = $GLOBALS["pp"][$language];
                        }
                        elseif ($xml->attributes()->presentationType == "blog") {
                            $presentation_type = $GLOBALS["blog"][$language];
                        }
                        elseif ($xml->attributes()->presentationType == "gall") {
                            $presentation_type = $GLOBALS["gall"][$language];
                        }
        
                        
                        if ($file == $postvalue) {
                            echo "<li><label><input type=\"radio\" name=\"".$type."_presentation_name\" checked=\"checked\" value=\"".$file."\" onclick=\"show_echo(this, '".$xml->attributes()->presentationFullName."', '".$GLOBALS["webgen_action_".$type."_info"][$language]."', '".$GLOBALS['submit_button_info'][$language]."')\" />".$xml->attributes()->presentationFullName.", ".$presentation_type.", datum poslední editace ".$xml->attributes()->lastModified."</label></li>\n";   
                        }
                        else {
                            echo "<li><label><input type=\"radio\" name=\"".$type."_presentation_name\" value=\"".$file."\" onclick=\"show_echo(this, '".$xml->attributes()->presentationFullName."', '".$GLOBALS["webgen_action_".$type."_info"][$language]."', '".$GLOBALS['submit_button_info'][$language]."')\" />".$xml->attributes()->presentationFullName.", ".$presentation_type.", datum poslední editace ".$xml->attributes()->lastModified."</label></li>\n"; 
                        }                    
                    }
                }
            }
            
            closedir($handle);
        }   
    }

    // *********** Pocet souboru v adresari ***************************
    function fileCount($addr){
        
        if (is_dir($addr)) {
     
            $dir = opendir($addr);
            $num = 0;           
            
            while (false!==($file = readdir($dir))) {
                
                if ($file != "." && $file != "..") {                
                    $num++;
                }
            }
    
            return $num;
        }
        
        else return "0";
    }
    
    // ***************** odstraneni diakritiky ***************************
    
    function removeDia($text) { 
        $prevodni_tabulka = Array('ä'=>'a', 'Ä'=>'A', 'á'=>'a', 'Á'=>'A', 'č'=>'c', 'Č'=>'C', 'ć'=>'c', 'Ć'=>'C', 'ď'=>'d', 'Ď'=>'D', 'ě'=>'e', 'Ě'=>'E', 'é'=>'e', 'É'=>'E', 'ë'=>'e', 'Ë'=>'E', 'í'=>'i', 'Í'=>'I', 'ľ'=>'l', 'Ľ'=>'L', 'ń'=>'n', 'Ń'=>'N', 'ň'=>'n', 'Ň'=>'N', 'ó'=>'o', 'Ó'=>'O', 'ö'=>'o', 'Ö'=>'O', 'ř'=>'r', 'Ř'=>'R', 'ŕ'=>'r', 'Ŕ'=>'R', 'š'=>'s', 'Š'=>'S', 'ś'=>'s', 'Ś'=>'S', 'ť'=>'t', 'Ť'=>'T', 'ú'=>'u', 'Ú'=>'U', 'ů'=>'u', 'Ů'=>'U', 'ü'=>'u', 'Ü'=>'U', 'ý'=>'y', 'Ý'=>'Y', 'ž'=>'z', 'Ž'=>'Z', 'ź'=>'z', 'Ź'=>'Z', ' '=>'_');
        
        return strtr($text, $prevodni_tabulka);
    }
    
    // kopirovani adresare
    function recurse_copy($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    } 
    
    // odstraneni adresare vcetne podadresaru
    function recursive_remove_directory($directory, $empty=FALSE) {
     
        if(substr($directory,-1) == '/') {
            $directory = substr($directory,0,-1);
        }

        if(!file_exists($directory) || !is_dir($directory)) {
            return FALSE;
        } elseif(!is_readable($directory)) {
            return FALSE;
        } else {
            $handle = opendir($directory);
            
            while (FALSE !== ($item = readdir($handle))) {
                if($item != '.' && $item != '..') {
                    $path = $directory.'/'.$item;

                    if(is_dir($path)) {
                        recursive_remove_directory($path);
                    } else {
                        unlink($path);
                    }
                }
            }
            
            closedir($handle);
  
            if($empty == FALSE) {
                if(!rmdir($directory)) {
                    return FALSE;
                }
            }
        
            return TRUE;
        }
    }

    
    // **** ziska url vysledne stranky
    function getUrl($user, $pres, $fname) {
        if (getenv("SERVER_NAME") == "localhost") {
                    
            $url = "http://".getenv("SERVER_NAME").":8888/local/presentations/".$user."/".$pres."/".$pres.".php";
                
        } else {
                
            $url = "http://".getenv("SERVER_NAME")."/~xplhak/webgen/presentations/".$user."/".$pres."/".$pres.".php";
                
        }
        
        return str_replace("webgen_showhtml.php", $fname, $url);
    }
    
    
    

    // *** ulozeni souboru s podadresari do archivu (krome adresare zip_file) ***   
    function addFolderToZip($dir, $zipArchive, $newdir){
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
    
                //Add the directory
                $zipArchive->addEmptyDir($newdir);
               
                // Loop through all the files
                while (($file = readdir($dh)) !== false) {
                    
                    //If it's a folder, run the function again! 
                    if (!is_file($dir ."/". $file)) {
                        
                        //echo "DIR: ".$dir ."/".$file."<br/>";
                        // Skip parent and root directories and zip_file
                        if (($file !== ".") && ($file !== "..") && ($file !== "zip_file")) {
                            addFolderToZip($dir ."/". $file, $zipArchive, $newdir ."/". $file);
                        }
                       
                    } else {
                        //echo "FILE: ".$dir ."/".$file."<br/>";
                        // Add the files
                        $zipArchive->addFile($dir ."/". $file, $newdir ."/". $file);
                    }
                }
            }
        }
    }
    
    // *********** Nahrazeni odradkovani v textarea za br a naopak **********************
    function mynl2br($text) {
        return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    }     
    
    function mybr2nl($text) {
        //return $text;
        return strtr($text, array('<br />' => "\r\n"));
    } 
    
    function mybr2at($text) {
        //return $text;
        return strtr($text, array('<br />' => "xxx"));
    }     
    
    // ********** Funkce pro zjisteni zivosti odkazu (neovereno) ************************
    function is_valid_url($url){
        
        $url = @parse_url($url);
            
        if (!$url) {
            return false;
        }
        
        $url = array_map('trim', $url);
        $url['port'] = (!isset($url['port'])) ? 80 : (int)$url['port'];
        $path = (isset($url['path'])) ? $url['path'] : '';
        
        if ($path == '') {
            $path = '/';
        }
        
        $path .= (isset($url['query'])) ? "?$url[query]" : '';
        
        if (isset($url['host']) AND $url['host'] != gethostbyname($url['host'])) {
            if (PHP_VERSION >= 5) {
                $headers = get_headers("$url[scheme]://$url[host]:$url[port]$path");
            }
            $headers = (is_array($headers)) ? implode("\n", $headers) : $headers;
            return (bool)preg_match('#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers);
        }
        
        return false;
    }
    
    function isImage($file_type) {
        if ($file_type == 'image/gif' || $file_type == 'image/jpeg' || $file_type == 'image/pjpeg' || $file_type == 'image/svg+xml' || $file_type == 'text/plain') {
            return true;
        }
        return false;
    }
    
    // ********* Funkce pro generování **************************************
    function correctOutput($str) {
        return htmlspecialchars_decode(stripslashes($str));
        //return $str;
    }
    
    function addHttp($url) {                       
        if (substr($url, 0, 4) != 'http') {
            $url = 'http://'.$url;
        }
        return $url;
    }
    
    function generateAddress($file, $number, $addresstype, $street, $house, $city, $zip, $country) {
        switch ($number) {
            case '2':
                $pred = "\t\t";
                break;
            case '3':
                $pred = "\t\t\t";
                break;            
            case '4':   
                $pred = "\t\t\t\t";
                break;
        }
        
        
        fwrite($file, $pred."<".$addresstype.">\n"); 
            fwrite($file, $pred."\t<address>\n");
                            
            fwrite($file, $pred."\t\t<street>".$street."</street>\n");
            fwrite($file, $pred."\t\t<houseNumber>".$house."</houseNumber>\n");
            fwrite($file, $pred."\t\t<city>".$city."</city>\n");
            fwrite($file, $pred."\t\t<zipCode>".$zip."</zipCode>\n");
                            
                if (!empty($country)) {
                    fwrite($file, $pred."\t\t<country>".$country."</country>\n");
                }
            
            fwrite($file, $pred."\t</address>\n");
            fwrite($file, $pred."</".$addresstype.">\n"); 
    }
    
    function generateLink($file, $dirname, $url, $title, $icon, $type) {
        fwrite($file, "\t\t\t<link>\n");
            fwrite($file, "\t\t\t\t<url>".$url."</url>\n");
            fwrite($file, "\t\t\t\t<title>".$title."</title>\n");
            fwrite($file, "\t\t\t\t<iconFile>".$icon."</iconFile>\n");
            fwrite($file, "\t\t\t\t<type>".$type."</type>\n");
        fwrite($file, "\t\t\t</link>\n");
    
        copy("icons/".$icon, $dirname."/img/".$icon);
        chmod($dirname."/img/".$icon, 0777);
    
    }
    
    // nasteni dat z XML - J. Uhyrek
 function loadToSession($data) {

      //  person data
      if($_SESSION['step_pp_5']['degree_action'] != 'delete' && isset($data['person']['prefix'])) {
        $_SESSION['step_pp_6']['degree_front_data'] = $data['person']['prefix'];
      }

      if(isset($data['person']['fullName'])) {
        $_SESSION['step_pp_6']['name_data'] = $data['person']['fullName'];
      }

      if($_SESSION['step_pp_5']['degree_action'] != 'delete' && isset($data['person']['sufix'])) {
        $_SESSION['step_pp_6']['degree_back_data'] = $data['person']['sufix'];
      }

      // photo
      if ($_SESSION['step_pp_5']['photo_action'] != 'delete' && isset($data['person']['photo']['url'])) {
        $_SESSION['step_pp_7']['photo_alt_data'] = $data['person']['photo']['alt'];
        $_SESSION['step_pp_7']['photo_src_data'] = $data['person']['photo']['url'];
      }

      // contact
      if ($_SESSION['step_pp_5']['contact_email_action'] != 'delete' && isset($data['contacts']['email'])) {
        $_SESSION['step_pp_8']['email_data'] = $data['contacts']['email'];
      }
      if ($_SESSION['step_pp_5']['contact_address_action'] != 'delete' && isset($data['contacts']['homeAddress']['address'])) {
        $_SESSION['step_pp_8']['street_data'] = $data['contacts']['homeAddress']['address']['street'];
        $_SESSION['step_pp_8']['housenumber_data'] = $data['contacts']['homeAddress']['address']['houseNumber'];
        $_SESSION['step_pp_8']['city_data'] = $data['contacts']['homeAddress']['address']['city'];
        $_SESSION['step_pp_8']['postcode_data'] = $data['contacts']['homeAddress']['address']['zipCode'];
        $_SESSION['step_pp_8']['state_data'] = $data['contacts']['homeAddress']['address']['country'];
      }
      if ($_SESSION['step_pp_5']['contact_cellular_action'] != 'delete' && isset($data['contacts']['phoneNumbers']['mobilePhone'])) {
        $_SESSION['step_pp_8']['cellular_data'] = $data['contacts']['phoneNumbers']['mobilePhone'];
      }
      if ($_SESSION['step_pp_5']['contact_phone_action'] != 'delete' && isset($data['contacts']['phoneNumbers']['phone'])) {
        $_SESSION['step_pp_8']['phone_data'] = $data['contacts']['phoneNumbers']['phone'];
      }
      if ($_SESSION['step_pp_5']['contact_fax_action'] != 'delete' && isset($data['contacts']['phoneNumbers']['fax'])) {
        $_SESSION['step_pp_8']['fax_data'] = $data['contacts']['phoneNumbers']['fax'];
      }
      if ($_SESSION['step_pp_5']['contact_icq_action'] != 'delete' && isset($data['contacts']['communicationProtocols']['icq'])) {
        $_SESSION['step_pp_8']['icq_data'] = $data['contacts']['communicationProtocols']['icq'];
      }
      if ($_SESSION['step_pp_5']['contact_skype_action'] != 'delete' && isset($data['contacts']['communicationProtocols']['skype'])) {
        $_SESSION['step_pp_8']['skype_data'] = $data['contacts']['communicationProtocols']['skype'];
      }
      if ($_SESSION['step_pp_5']['contact_otherprotocols_action'] != 'delete' && isset($data['contacts']['communicationProtocols'])) {
        $_SESSION['step_pp_8']['jabber_data'] = $data['contacts']['communicationProtocols']['jabber'];
        $_SESSION['step_pp_8']['msn_data'] = $data['contacts']['communicationProtocols']['msn'];
        $_SESSION['step_pp_8']['aim_data'] = $data['contacts']['communicationProtocols']['aim'];
        $_SESSION['step_pp_8']['irc_data'] = $data['contacts']['communicationProtocols']['irc'];
      }

      // university
      if(isset($data['school']['university'])) {
        $_SESSION['step_pp_9']['university_data'] = $data['school']['university'];
      }
      if( $_SESSION['step_pp_5']['university_faculty_action'] != 'delete' && isset($data['school']['faculty']) ) {
        $_SESSION['step_pp_9']['faculty_data'] = $data['school']['faculty'];
      }
      if($_SESSION['step_pp_5']['university_specialization_action'] != 'delete' && isset( $data['school']['student']['branch'])) {
        $_SESSION['step_pp_9']['specialization_data'] = $data['school']['student']['branch'];
      }
      if( $_SESSION['step_pp_5']['university_year_action'] != 'delete' && isset( $data['school']['student']['grade'])) {
        $_SESSION['step_pp_9']['year_data'] = $data['school']['student']['grade'];
      }
      if( $_SESSION['step_pp_5']['university_department_action'] != 'delete' && isset($data['school']['employee']['department'])) {
        $_SESSION['step_pp_9']['department_data'] = $data['school']['employee']['department'];
      }
      if( $_SESSION['step_pp_5']['university_position_action'] != 'delete' && isset( $data['school']['employee']['positions']['position'])) {
        $_SESSION['step_pp_9']['position_data'] = $data['school']['employee']['positions']['position'];
      }
      if( $_SESSION['step_pp_5']['university_office_action'] != 'delete' && isset($data['school']['employee']['office']) ) {
        $_SESSION['step_pp_9']['office_data'] = $data['school']['employee']['office'];
      }
      if( $_SESSION['step_pp_5']['university_hour_action'] != 'delete' && isset($data['school']['employee']['consultationHours'])) {
        if(isset($data['school']['employee']['consultationHours']['consultation'][0])) {
          foreach( $data['school']['employee']['consultationHours']['consultation'] as $consultation ) {
            $_SESSION['step_pp_9']['hour_day_data'][] = $consultation['day'];
            $_SESSION['step_pp_9']['hour_from_data'][] = $consultation['from'];
            $_SESSION['step_pp_9']['hour_to_data'][] = $consultation['to'];
          }
       } else { 
          $consultation = $data['school']['employee']['consultationHours']['consultation'];
          $_SESSION['step_pp_9']['hour_day_data'][] = $consultation['day'];
          $_SESSION['step_pp_9']['hour_from_data'][] = $consultation['from'];
          $_SESSION['step_pp_9']['hour_to_data'][] = $consultation['to'];
        }
      }
      if( $_SESSION['step_pp_5']['university_departmentphone_action'] != 'delete' && isset( $data['school']['employee']['workPhone'])) {
        $_SESSION['step_pp_9']['departmentphone_data'] = $data['school']['employee']['workPhone'];
      }
      if( $_SESSION['step_pp_5']['university_schooladdress_action'] != 'delete' && isset($data['school']['schoolAddress']['address'])) {
        $_SESSION['step_pp_9']['school_street_data'] = $data['school']['schoolAddress']['address']['street'];
        $_SESSION['step_pp_9']['school_housenumber_data'] = $data['school']['schoolAddress']['address']['houseNumber'];
        $_SESSION['step_pp_9']['school_city_data'] = $data['school']['schoolAddress']['address']['city'];
        $_SESSION['step_pp_9']['school_postcode_data'] = $data['school']['schoolAddress']['address']['zipCode'];
        $_SESSION['step_pp_9']['school_state_data'] = $data['school']['schoolAddress']['address']['country'];
      }

      if( $_SESSION['step_pp_5']['university_schoolpages_action'] != 'delete' && isset($data['school']['universityUrl']['webUrl']['url']) ) {
        $_SESSION['step_pp_9']['schoolpages_data_data'] = $data['school']['universityUrl']['webUrl']['url'];
      }

      if( $_SESSION['step_pp_5']['university_facultypages_action'] != 'delete' && isset($data['school']['facultyUrl']['webUrl']['url'])) {
        $_SESSION['step_pp_9']['facultypages_data'] = $data['school']['facultyUrl']['webUrl']['url'];
      }
      if( $_SESSION['step_pp_5']['university_project_action'] != 'delete' && isset($data['school']['projects']['project'])) {
        if(isset($data['school']['projects']['project'][0])) {
          foreach ($data['school']['projects']['project'] as $project) {
            $_SESSION['step_pp_9']['project_name_data'][] = $project['name'];
            $_SESSION['step_pp_9']['project_description_data'][] = $project['description'];
            if (isset($project['coWorkers']['coWorker'][0])) {
              foreach ( $project['coWorkers']['coWorker'] as $coWorker) {
                $_SESSION['step_pp_9']['project_coauthor0_data'][] = $coWorker['person']['fullname'];
              }
            } else {
              $coWorker = $project['coWorkers']['coWorker'];
              $_SESSION['step_pp_9']['project_coauthor0_data'][] = $coWorker['person']['fullname'];
            }
            $_SESSION['step_pp_9']['project_year_data'][] = $project['yearFinished'];
            $_SESSION['step_pp_9']['project_www_data'][] = $project['projectUrl']['webUrl']['url'];
          }
        } else {
            $project = $data['school']['projects']['project'];
            $_SESSION['step_pp_9']['project_name_data'][] = $project['name'];
            $_SESSION['step_pp_9']['project_description_data'][] = $project['description'];
            if (isset($project['coWorkers']['coWorker'][0])) {
              foreach ( $project['coWorkers']['coWorker'] as $coWorker) {
                $_SESSION['step_pp_9']['project_coauthor0_data'][] = $coWorker['person']['fullname'];
              }
            } else {
              $coWorker = $project['coWorkers']['coWorker'];
              $_SESSION['step_pp_9']['project_coauthor0_data'][] = $coWorker['person']['fullname'];
            }
            $_SESSION['step_pp_9']['project_year_data'][] = $project['yearFinished'];
            $_SESSION['step_pp_9']['project_www_data'][] = $project['projectUrl']['webUrl']['url'];
        }
      }

      // firm
      if (isset($data['business']['businessName'])) {
        $_SESSION['step_pp_10']['firmname_data'] = $data['business']['businessName'];
      }
      if($_SESSION['step_pp_5']['firm_ic_action'] != 'delete' && isset($data['business']['id'])) {
        $_SESSION['step_pp_10']['ic_data'] = $data['business']['id'];
      }

      if($_SESSION['step_pp_5']['firm_direction_action'] != 'delete' && isset($data['business']['directions']['direction'])) {
        if(isset($data['business']['directions']['direction'][0])) {
          foreach($data['business']['directions']['direction'] as $direction) {
            $_SESSION['step_pp_10']['direction_data'][] = $direction;
          }
        } else { 
          $direction = $data['business']['directions']['direction'];
          $_SESSION['step_pp_10']['direction_data'][] = $direction;
        }
      }

      if($_SESSION['step_pp_5']['firm_workload_action'] != 'delete' && isset($data['business']['workloads']['workload'])) {
        if(isset($data['business']['workloads']['workload'][0])) {
          foreach($data['business']['workloads']['workload'] as $workload) {
            $_SESSION['step_pp_10']['workload_data'][] = $workload;
          }
        } else { 
          $workload = $data['business']['workloads']['workload'];
          $_SESSION['step_pp_10']['workload_data'] = $workload;
        }
      }

      if($_SESSION['step_pp_5']['firm_position_action'] != 'delete' && isset($data['business']['position'])) {
        $_SESSION['step_pp_10']['position_data'] = $data['business']['position'];
      }

      if($_SESSION['step_pp_5']['firm_address_action'] != 'delete' && isset( $data['business']['businessAddress']['address'])) {
        $_SESSION['step_pp_10']['firm_street_data'] = $data['business']['businessAddress']['address']['street'];
        $_SESSION['step_pp_10']['firm_city_data'] = $data['business']['businessAddress']['address']['city'];
        $_SESSION['step_pp_10']['firm_postcode_data'] = $data['business']['businessAddress']['address']['zipCode'];
        $_SESSION['step_pp_10']['firm_state_data'] = $data['business']['businessAddress']['address']['country'];
      }

      if($_SESSION['step_pp_5']['firm_www_action'] != 'delete' && isset( $data['business']['businessUrl']['webUrl']['url'])) {
        $_SESSION['step_pp_10']['www_data'] = $data['business']['businessUrl']['webUrl']['url'];
      }

      if($_SESSION['step_pp_5']['firm_add_action'] != 'delete' && isset($data['business']['otherInformation'])) {
        $_SESSION['step_pp_10']['www_data'] = $data['business']['otherInformation'];
      }

      // hobies
      if($_SESSION['step_pp_5']['hobby_action'] != 'delete' && isset($data['hobbies'])) {
        if(isset($data['hobbies']['hobby'][0])) {
          foreach($data['hobbies']['hobby'] as $hobby) {
            $_SESSION['step_pp_11']['hobby_data'][] = $hobby;
          }
        } else {
          $hobby = $data['hobbies']['hobby'];
          $_SESSION['step_pp_11']['hobby_data'][] = $hobby;
        }
      }

      // knowledges
      if($_SESSION['step_pp_5']['knowledge_action'] != 'delete' && isset($data['knowledges']['knowledge'])) {
        if(isset($data['knowledges']['knowledge'][0])) {
          foreach($data['knowledges']['knowledge'] as $knowledge) {
            $_SESSION['step_pp_12']['knowledge_data'][] = $knowledge;
          }
        } else {
          $knowledge = $data['knowledges']['knowledge'];
          $_SESSION['step_pp_12']['knowledge_data'][] = $knowledge;
        }
      }

      //birthdate
      if ($_SESSION['step_pp_5']['birthdate_action'] != 'delete' && isset( $data['birth'])) {
        $_SESSION['step_pp_13']['birthdate_data'] = $data['birth']['date'];
        $_SESSION['step_pp_13']['birthplace_data'] = $data['birth']['place'];
      }
        
      //cv 
      if (isset($data['cv']['cvEmail'])) {
        $_SESSION['step_pp_14']['email_cv_data'] = $data['cv']['cvEmail'];
      }
      if (isset($data['cv']['cvAddress']['address'])) {
        $_SESSION['step_pp_14']['street_cv_data'] = $data['cv']['cvAddress']['address']['street'];
        $_SESSION['step_pp_14']['housenumber_cv_data'] = $data['cv']['cvAddress']['address']['houseNumber'];
        $_SESSION['step_pp_14']['city_cv_data'] = $data['cv']['cvAddress']['address']['city'];
        $_SESSION['step_pp_14']['postcode_cv_data'] = $data['cv']['cvAddress']['address']['zipCode'];
        $_SESSION['step_pp_14']['state_cv_data'] = $data['cv']['cvAddress']['address']['country'];
      }
      if (isset($data['cv']['cvPhone'])) {
        $_SESSION['step_pp_14']['cellular_data'] = $data['cv']['cvPhone'];
      }

      if ($_SESSION['step_pp_5']['cv_nationality_action'] != 'delete' && isset($data['cv']['nationality'])) {
        $_SESSION['step_pp_14']['nationality_cv_data'] = $data['cv']['nationality'];
      }
      if ($_SESSION['step_pp_5']['cv_family_action'] != 'delete' && isset($data['cv']['maritalStatus'])) {
        $_SESSION['step_pp_14']['family_cv_data'] = $data['cv']['maritalStatus'];
      }
      if ($_SESSION['step_pp_5']['cv_school_action'] != 'delete' && isset($data['courses']['course'])) {
        if (isset($data['courses']['course'][0])) {
          foreach($data['courses']['course'] as $course) {
            $_SESSION['step_pp_14']['edu_from_data'][] = $course['from'];
            $_SESSION['step_pp_14']['edu_to_data'][] = $course['to'];
            $_SESSION['step_pp_14']['edu_degree_data'][] = $course['level'];            $_SESSION['step_ppedit_14']['edu_title_data'][] = $course['degree'];
            $_SESSION['step_pp_14']['edu_field_data'][] = $course['branch'];
            $_SESSION['step_pp_14']['edu_school_data'][] = $course['schoolName'];
          }
        } else {
          $course = $data['courses']['course'];
          $_SESSION['step_pp_14']['edu_from_data'][] = $course['from'];
          $_SESSION['step_pp_14']['edu_to_data'][] = $course['to'];
          $_SESSION['step_pp_14']['edu_degree_data'][] = $course['level'];            $_SESSION['step_ppedit_14']['edu_title_data'][] = $course['degree'];
          $_SESSION['step_pp_14']['edu_field_data'][] = $course['branch'];
          $_SESSION['step_pp_14']['edu_school_data'][] = $course['schoolName'];
        }
      }

      if ($_SESSION['step_pp_5']['cv_work_action'] != 'delete' && isset($data['cv']['workExperiences']['work'])) {
        if (isset($data['cv']['workExperiences']['work'][0])) {
          foreach ($data['cv']['workExperiences']['work'] as $work) {
            $_SESSION['step_pp_14']['work_from_data'][] = $work['from'];
            $_SESSION['step_pp_14']['work_to_data'][] = $work['to'];
            $_SESSION['step_pp_14']['work_companyname_data'][] = $work['businessName'];
            $_SESSION['step_pp_14']['work_sphere_data'][] = $work['branch'];
            $_SESSION['step_pp_14']['work_pos_data'][] = $work['position'];
            $_SESSION['step_pp_14']['work_wload_data'][] = $work['workload'];
          }
        } else {
          $work = $data['cv']['workExperiences']['work'];
          $_SESSION['step_pp_14']['work_from_data'][] = $work['from'];
          $_SESSION['step_pp_14']['work_to_data'][] = $work['to'];
          $_SESSION['step_pp_14']['work_companyname_data'][] = $work['businessName'];
          $_SESSION['step_pp_14']['work_sphere_data'][] = $work['branch'];
          $_SESSION['step_pp_14']['work_pos_data'][] = $work['position'];
          $_SESSION['step_pp_14']['work_wload_data'][] = $work['workload'];
        }
      }

      if ($_SESSION['step_pp_5']['cv_knowledge_action'] != 'delete' && isset($data['cv']['personalSkills'])) {
        $_SESSION['step_pp_14']['it_degree_cv_data'] = $data['cv']['personalSkills']['itSkills']['level'];
        $_SESSION['step_pp_14']['it_detail_cv_data'] = $data['cv']['personalSkills']['itSkills']['description'];

        $_SESSION['step_pp_14']['driver_cv_data'] = $data['cv']['personalSkills']['drivingLicence'];
        $_SESSION['step_pp_14']['other_cv_data'] = $data['cv']['personalSkills']['otherInformation'];
      }

      // texty
      if($_SESSION['step_pp_5']['textfield_action'] != 'delete' && isset($data['texts']['text'])) {
        if(isset($data['texts']['text'][0])) {
          foreach($data['texts']['knowledge'] as $text) {
            $_SESSION['step_pp_15']['tf_text'][] = $text['body'];
            $_SESSION['step_pp_15']['tf_photo_alt_data'][] = $text['photo']['alt'];
            $_SESSION['step_pp_15']['tf_photo_src_data'][] = $text['photo']['url'];
            $_SESSION['step_pp_15']['tf_align_que'][] = $text['align'];
          }
        } else {
          $text = $data['texts']['text'];
          $_SESSION['step_pp_15']['tf_text'][] = $text['body'];
        }
      }

      // odkazy
      if($_SESSION['step_pp_5']['links_action'] != 'delete' && isset($data['links']['link'])) {
        if( isset($data['links']['link'][0]) ) {
          foreach ($data['links']['link'] as $link) {
            $_SESSION['step_pp_16']['link_description_data'][] = $link['title'];
            $_SESSION['step_pp_16']['link_url_data'][] = $link['url'];

          }
        } else {
          $link = $data['links']['link'];

          $_SESSION['step_pp_16']['link_description_data'][] = $link['title'];
          $_SESSION['step_pp_16']['link_url_data'][] = $link['url'];

        }
      }
    }
   


                        
                        
                        









    


?>
