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
    
    $_page_title = $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_showhtml_title[$language];

    // spracovanie formulara
    
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        $_SESSION['step_pp_20'] = array();
       
        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_20']["$key"] = changeVar($value);
        }
    
        $r = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
        
        if ($_SESSION['step_pp_20']['send_choice'] == 'd') {
            
            $url = getUrl($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_4']['presentation_name'], $fname);
            
            header("Location: {$url}");
            exit();
        } else {
            if ($_SESSION['step_pp_20']['send_email_choice'] == 'c') {
                if (strlen($_SESSION['step_pp_20']['email_send_data']) == 0 || !preg_match($r, $_SESSION['step_pp_20']['email_send_data'])) {
                    
                    $next_step = $_GET['step'];
                    $next_type = $_GET['type'];
                    header("Location: ./index.php?step={$next_step}&type={$next_type}");
                    exit(); 
                }            
            }
        } 
        
    }
    
    
    echo "<h1>".$webgen_showhtml_title[$language]."</h1>";  
    
    $r = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
    
    if (isset($_SESSION['step_pp_20']['email_send_data']) && $_SESSION['step_pp_20']['send_choice'] != "d") {
        if (strlen($_SESSION['step_pp_20']['email_send_data']) == 0) {
            echo "<h2 class=\"error\">".$webgen_contact_email_empty[$language]."</h2>";
        } elseif (!preg_match($r, $_SESSION['step_pp_20']['email_send_data'])) {
            echo "<h2 class=\"error\">".$webgen_contact_email_invalid[$language]."</h2>";
        }    
    }

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  

<?php
    

// **********************************************
// ************ GENEROVANI XML ******************       
// **********************************************


    $dirname = "./presentations/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'];
    $fname = $dirname."/".$_SESSION['step_all_4']['presentation_name'].".xml";
      
    umask(0000);
  
    if (!file_exists("./presentations/".$_SESSION['step_all_2']['user_name'])) {
        mkdir("./presentations/".$_SESSION['step_all_2']['user_name'], 0777);
    }
  
    if (!file_exists($dirname)) {
        mkdir($dirname, 0777);
    }

    if (!file_exists($dirname."/img")) {
        mkdir($dirname."/img", 0777);
    } 

    if (!file_exists($dirname."/page_files")) {
        mkdir($dirname."/page_files", 0777);
    } 
    
    $file=fopen($fname,"w");
  
    fwrite($file, "<?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n");
 
    fwrite($file, "<presentation lastModified=\"".date("d. m. Y")."\" author=\"".$_SESSION['step_all_2']['user_name']."\" presentationName=\"".$_SESSION['step_all_4']['presentation_name']."\" presentationFullName=\"".$_SESSION['step_all_4']['presentation_full_name']."\" presentationType=\"pp\" xsi:noNamespaceSchemaLocation=\"http://andromeda.fi.muni.cz/~xplhak/webgen/xml/scheme/webgen.xsd\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">\n");
            
        fwrite($file, "\t<style>\n");
            fwrite($file, "\t\t<language>".$language."</language>\n");
            fwrite($file, "\t\t<css>".$_SESSION['step_pp_19']['css_choice'].".css</css>\n");
            fwrite($file, "\t\t<xsl>private_page.xslt</xsl>\n");                   
        fwrite($file, "\t</style>\n\n");
        
        fwrite($file, "\t<personalPageData>\n");
            fwrite($file, "\t\t<person>\n");
                
                if (!empty($_SESSION['step_pp_6']['degree_front_data'])) {
                    fwrite($file, "\t\t\t<prefix>".correctOutput($_SESSION['step_pp_6']['degree_front_data'])."</prefix>\n");
                }
                
                fwrite($file, "\t\t\t<fullName>".correctOutput($_SESSION['step_pp_6']['name_data'])."</fullName>\n");
                
                if ($_SESSION['step_pp_6']['degree_back_data']) {
                    fwrite($file, "\t\t\t<sufix>".correctOutput($_SESSION['step_pp_6']['degree_back_data'])."</sufix>\n");
                }
                
                if (isset($_SESSION['step_pp_5']['photo'])) {
                    fwrite($file, "\t\t\t<photo>\n");
                       
                       if ($_SESSION['step_pp_5']['photo_file'] == "url") {
                            fwrite($file, "\t\t\t\t<url>".addHttp(correctOutput($_SESSION['step_pp_7']['photo_src_data']))."</url>\n");
                            fwrite($file, "\t\t\t\t<alt>".correctOutput($_SESSION['step_pp_7']['photo_alt_data'])."</alt>\n");
                        }
                        else {
                            fwrite($file, "\t\t\t\t<url>img/".correctOutput($_SESSION['step_pp_7']['photo_file_upload']['photo_copy_data']['name'])."</url>\n");
                            fwrite($file, "\t\t\t\t<alt>".correctOutput($_SESSION['step_pp_7']['photo_alt_data'])."</alt>\n");                 
                        
                            if (is_dir("./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'])) {
                                recurse_copy("./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'], $dirname."/img");
                                recursive_remove_directory("./tmp/".$_SESSION['step_all_2']['user_name']);             
                            }
                        } 
                    
                    fwrite($file, "\t\t\t</photo>\n");
                }
                                              
            fwrite($file, "\t\t</person>\n");
                          
            if (isset($_SESSION['step_pp_5']['contact'])) {
                fwrite($file, "\t\t<contacts>\n");
                    
                if (!empty($_SESSION['step_pp_8']['email_data'])) {
                    fwrite($file, "\t\t\t<email>".correctOutput($_SESSION['step_pp_8']['email_data'])."</email>\n");
                }
      
                if (!empty($_SESSION['step_pp_8']['postcode_data'])) {
                    generateAddress($file, '3', 'homeAddress', $_SESSION['step_pp_8']['street_data'], $_SESSION['step_pp_8']['housenumber_data'], $_SESSION['step_pp_8']['postcode_data'], $_SESSION['step_pp_8']['city_data'], $_SESSION['step_pp_8']['state_data']);
                }
              
               if (!empty($_SESSION['step_pp_8']['cellular_data']) || !empty($_SESSION['step_pp_8']['phone_data']) || !empty($_SESSION['step_pp_8']['fax_data'])) {
                    fwrite($file, "\t\t\t<phoneNumbers>\n");
                        if ($_SESSION['step_pp_8']['cellular_data']) {
                            fwrite($file, "\t\t\t\t<mobilePhone>".correctOutput($_SESSION['step_pp_8']['cellular_data'])."</mobilePhone>\n");
                        }
                        
                        if ($_SESSION['step_pp_8']['phone_data']) {
                            fwrite($file, "\t\t\t\t<phone>".correctOutput($_SESSION['step_pp_8']['phone_data'])."</phone>\n");
                        }
      
                        if ($_SESSION['step_pp_8']['fax_data']) {
                            fwrite($file, "\t\t\t\t<fax>".correctOutput($_SESSION['step_pp_8']['fax_data'])."</fax>\n");
                        }
                    fwrite($file, "\t\t\t</phoneNumbers>\n");
                }
      
                if (($_SESSION['step_pp_8']['icq_data']) || ($_SESSION['step_pp_8']['skype_data']) || ($_SESSION['step_pp_8']['msn_data']) || ($_SESSION['step_pp_8']['irc_data']) || ($_SESSION['step_pp_8']['jabber_data']) || ($_SESSION['step_pp_8']['aim_data'])) {
                    fwrite($file, "\t\t\t<communicationProtocols>\n");
                        if ($_SESSION['step_pp_8']['icq_data']) {
                            fwrite($file, "\t\t\t\t<icq>".correctOutput($_SESSION['step_pp_8']['icq_data'])."</icq>\n");
                        }
                      
                        if ($_SESSION['step_pp_8']['skype_data']) {
                            fwrite($file, "\t\t\t\t<skype>".correctOutput($_SESSION['step_pp_8']['skype_data'])."</skype>\n");
                        }
                        
                        if ($_SESSION['step_pp_8']['jabber_data']) {
                            fwrite($file, "\t\t\t\t<jabber>".correctOutput($_SESSION['step_pp_8']['jabber_data'])."</jabber>\n");
                        }
                        
                        if ($_SESSION['step_pp_8']['irc_data']) {
                            fwrite($file, "\t\t\t\t<irc>".correctOutput($_SESSION['step_pp_8']['irc_data'])."</irc>\n");
                        }
                      
                        if ($_SESSION['step_pp_8']['aim_data']) {
                            fwrite($file, "\t\t\t\t<aim>".correctOutput($_SESSION['step_pp_8']['aim_data'])."</aim>\n");
                        }                                    
                        
                        if ($_SESSION['step_pp_8']['msn_data']) {
                            fwrite($file, "\t\t\t\t<msn>".correctOutput($_SESSION['step_pp_8']['msn_data'])."</msn>\n");
                        }
                    fwrite($file, "\t\t\t</communicationProtocols>\n");
                }    
            
                fwrite($file, "\t\t</contacts>\n");
            }           
        
            if (isset($_SESSION['step_pp_5']['university'])) {
                fwrite($file, "\n\t\t<school>\n");
                    
                    if (!empty($_SESSION['step_pp_9']['university_data'])) {
                        fwrite($file, "\t\t\t<university>".correctOutput($_SESSION['step_pp_9']['university_data'])."</university>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_9']['faculty_data'])) {
                        fwrite($file, "\t\t\t<faculty>".correctOutput($_SESSION['step_pp_9']['faculty_data'])."</faculty>\n");
                    }

                    if (!empty($_SESSION['step_pp_9']['specialization_data']) || !empty($_SESSION['step_pp_9']['year_data'])) {
                        fwrite($file, "\t\t\t<student>\n");
                            
                            fwrite($file, "\t\t\t\t<branch>".correctOutput($_SESSION['step_pp_9']['specialization_data'])."</branch>\n");
                            fwrite($file, "\t\t\t\t<grade>".correctOutput($_SESSION['step_pp_9']['year_data'])."</grade>\n");
                        
                        fwrite($file, "\t\t\t</student>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_9']['department_data']) || !empty($_SESSION['step_pp_9']['position_data']) || !empty($_SESSION['step_pp_9']['office_data']) || !empty($_SESSION['step_pp_9']['departmentphone_data']) || !empty($_SESSION['step_pp_9']['hour_day_data'][0])) {
                        fwrite($file, "\t\t\t<employee>\n");
                            
                            if (!empty($_SESSION['step_pp_9']['department_data'])) {
                                fwrite($file, "\t\t\t\t<department>".correctOutput($_SESSION['step_pp_9']['department_data'])."</department>\n");               
                            }
                            
                            // zmena! - generovat polem - vice moznych pozic
                            
                            if (!empty($_SESSION['step_pp_9']['position_data'])) {
                                fwrite($file, "\t\t\t\t<positions>\n");
                                fwrite($file, "\t\t\t\t\t<position>".correctOutput($_SESSION['step_pp_9']['position_data'])."</position>\n");
                                fwrite($file, "\t\t\t\t</positions>\n");
                            }
                            
                            if (!empty($_SESSION['step_pp_9']['office_data'])) {
                                fwrite($file, "\t\t\t\t<office>".correctOutput($_SESSION['step_pp_9']['office_data'])."</office>\n");
                            }
                            
                            if (!empty($_SESSION['step_pp_9']['departmentphone_data'])) {
                                fwrite($file, "\t\t\t\t<workPhone>".correctOutput($_SESSION['step_pp_9']['departmentphone_data'])."</workPhone>\n");
                            }
                            
                            if (!empty($_SESSION['step_pp_9']['hour_day_data'][0])) {
                            
                                fwrite($file, "\t\t\t\t<consultationHours>\n");
                                
                                $pom = 0;
                                while (!empty($_SESSION['step_pp_9']['hour_day_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<consultation>\n");    
                                        fwrite($file, "\t\t\t\t\t\t<day>".correctOutput($_SESSION['step_pp_9']['hour_day_data'][$pom])."</day>\n");
                                        fwrite($file, "\t\t\t\t\t\t<from>".correctOutput($_SESSION['step_pp_9']['hour_from_data'][$pom])."</from>\n");
                                        fwrite($file, "\t\t\t\t\t\t<to>".correctOutput($_SESSION['step_pp_9']['hour_to_data'][$pom])."</to>\n");
                                    fwrite($file, "\t\t\t\t\t</consultation>\n");
                                    $pom = $pom+1;
                                }
                                
                                fwrite($file, "\t\t\t\t</consultationHours>\n");
                            }                        
                        
                        fwrite($file, "\t\t\t</employee>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_9']['school_postcode_data'])) {
                        generateAddress($file, '3', 'schoolAddress', correctOutput($_SESSION['step_pp_9']['school_street_data']), correctOutput($_SESSION['step_pp_9']['school_housenumber_data']), correctOutput($_SESSION['step_pp_9']['school_postcode_data']), correctOutput($_SESSION['step_pp_9']['school_city_data']), correctOutput($_SESSION['step_pp_9']['school_state_data']));
                    }
                    
                    if (!empty($_SESSION['step_pp_9']['schoolpages_data'])) {
                        fwrite($file, "\t\t\t<universityUrl>\n");
                            fwrite($file, "\t\t\t\t<webUrl>\n");
                                fwrite($file, "\t\t\t\t\t<url>".addHttp(correctOutput($_SESSION['step_pp_9']['schoolpages_data']))."</url>\n");
                                fwrite($file, "\t\t\t\t\t<title>".correctOutput($_SESSION['step_pp_9']['university_data'])."</title>\n");
                            fwrite($file, "\t\t\t\t</webUrl>\n");
                        fwrite($file, "\t\t\t</universityUrl>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_9']['schoolpages_data'])) {
                        fwrite($file, "\t\t\t<facultyUrl>\n");
                            fwrite($file, "\t\t\t\t<webUrl>\n");
                                fwrite($file, "\t\t\t\t\t<url>".addHttp(correctOutput($_SESSION['step_pp_9']['facultypages_data']))."</url>\n");
                                if (!empty($_SESSION['step_pp_9']['faculty_data'])) {
                                    fwrite($file, "\t\t\t\t\t<title>".correctOutput($_SESSION['step_pp_9']['faculty_data'])."</title>\n");
                                } else {
                                    fwrite($file, "\t\t\t\t\t<title>".$webgen_choice_university_facultypages[$language]."</title>\n");
                                }
                                
                            
                            fwrite($file, "\t\t\t\t</webUrl>\n");
                        fwrite($file, "\t\t\t</facultyUrl>\n");
                    }               
                    
                if (!empty($_SESSION['step_pp_9']['project_name_data'][0])) {
                    fwrite($file, "\t\t\t<projects>\n");
                
                    $i = 0; 
                    while (!empty($_SESSION['step_pp_9']['project_name_data'][$i])) {  
                        fwrite($file, "\t\t\t\t<project>\n");
                        
                        fwrite($file, "\t\t\t\t\t<name>".correctOutput($_SESSION['step_pp_9']['project_name_data'][$i])."</name>\n");
                        
                        if (!empty($_SESSION['step_pp_9']['project_description_data'][$i])) {  
                            fwrite($file, "\t\t\t\t\t<description>".correctOutput($_SESSION['step_pp_9']['project_description_data'][$i])."</description>\n");
                        }
                                                   
                        $pom = 0;
                        while (!empty($_SESSION['step_pp_9']['project_coauthor'.($i).'_data'][$pom])) {
                            if ($pom == 0) { fwrite($file, "\t\t\t\t\t<coWorkers>\n"); }
                            
                            fwrite($file, "\t\t\t\t\t\t<coWorker>\n");
                                fwrite($file, "\t\t\t\t\t\t\t<person>\n");
                                    fwrite($file, "\t\t\t\t\t\t\t\t<fullName>".correctOutput($_SESSION['step_pp_9']['project_coauthor'.($i).'_data'][$pom])."</fullName>\n");
                                fwrite($file, "\t\t\t\t\t\t\t</person>\n");
                            fwrite($file, "\t\t\t\t\t\t</coWorker>\n");
                            
                            $pom = $pom+1;

                        }
                        
                        if (!empty($_SESSION['step_pp_9']['project_coauthor'.($i).'_data'][0])) {
                            fwrite($file, "\t\t\t\t\t</coWorkers>\n");
                        }                        
                
                        if ($_SESSION['step_pp_9']['project_year_data'][$i]) {  
                            fwrite($file, "\t\t\t\t\t<yearFinished>".correctOutput($_SESSION['step_pp_9']['project_year_data'][$i])."</yearFinished>\n");
                        } 
                        
                        if ($_SESSION['step_pp_9']['project_www_data'][$i]) {  
                            
                            fwrite($file, "\t\t\t\t\t<projectUrl>\n");
                                fwrite($file, "\t\t\t\t\t\t<webUrl>\n");
                                    fwrite($file, "\t\t\t\t\t\t\t<url>".addHttp(correctOutput($_SESSION['step_pp_9']['project_www_data'][$i]))."</url>\n");
                                    fwrite($file, "\t\t\t\t\t\t\t<title>".correctOutput($_SESSION['step_pp_9']['project_name_data'][$i])."</title>\n");
                                fwrite($file, "\t\t\t\t\t\t</webUrl>\n");
                            fwrite($file, "\t\t\t\t\t</projectUrl>\n");
                        }
                        
                        fwrite($file, "\t\t\t\t</project>\n");
                        $i = $i + 1;
                    }  
                    
                    fwrite($file, "\t\t\t</projects>\n"); 
                }
                
                fwrite($file, "\t\t</school>\n");
            }

            if (isset($_SESSION['step_pp_5']['firm'])) {
                fwrite($file, "\n\t\t<business>\n");
                
                if (!empty($_SESSION['step_pp_10']['firmname_data'])) {  
                    fwrite($file, "\t\t\t<businessName>".correctOutput($_SESSION['step_pp_10']['firmname_data'])."</businessName>\n");
                }
                
                if (!empty($_SESSION['step_pp_10']['ic_data'])) {  
                    fwrite($file, "\t\t\t<id>".correctOutput($_SESSION['step_pp_10']['ic_data'])."</id>\n");
                }
                
                if (!empty($_SESSION['step_pp_10']['direction_data'][0])) {          
                    fwrite($file, "\t\t\t<directions>\n");

                    $pom = 0;
                    
                    while (!empty($_SESSION['step_pp_10']['direction_data'][$pom]) || !empty($_SESSION['step_pp_10']['direction_data'][($pom+1)])) {
                        if (!empty($_SESSION['step_pp_10']['direction_data'][$pom])) {
                            fwrite($file, "\t\t\t\t<direction>".correctOutput($_SESSION['step_pp_10']['direction_data'][$pom])."</direction>\n");
                        }
                        
                        $pom = $pom + 1;
                    }
                    
                    fwrite($file, "\t\t\t</directions>\n");
                }                          
                               
                if (!empty($_SESSION['step_pp_10']['workload_data'][0])) {          
                    fwrite($file, "\t\t\t<workloads>\n");
                    
                    $pom = 0;
                    
                    while (!empty($_SESSION['step_pp_10']['workload_data'][$pom]) || !empty($_SESSION['step_pp_10']['workload_data'][($pom+1)])) {
                        if (!empty($_SESSION['step_pp_10']['workload_data'][$pom])) {
                            fwrite($file, "\t\t\t\t<workload>".correctOutput($_SESSION['step_pp_10']['workload_data'][$pom])."</workload>\n");
                        }
                        $pom = $pom + 1;
                    }
                    
                    fwrite($file, "\t\t\t</workloads>\n");
                }                
                
                if (!empty($_SESSION['step_pp_10']['position_data'])) {  
                    fwrite($file, "\t\t\t<position>".correctOutput($_SESSION['step_pp_10']['position_data'])."</position>\n");
                }       
                
                if (!empty($_SESSION['step_pp_10']['firm_postcode_data'])) {
                    generateAddress($file, '3', 'businessAddress', correctOutput($_SESSION['step_pp_10']['firm_street_data']), correctOutput($_SESSION['step_pp_10']['firm_housenumber_data']), correctOutput($_SESSION['step_pp_10']['firm_postcode_data']), correctOutput($_SESSION['step_pp_10']['firm_city_data']), correctOutput($_SESSION['step_pp_10']['firm_state_data']));
                }
                                       
                if (!empty($_SESSION['step_pp_10']['www_data'])) {  
                    fwrite($file, "\t\t\t<businessUrl>\n");
                        fwrite($file, "\t\t\t\t<webUrl>\n");
                            fwrite($file, "\t\t\t\t\t<url>".addHttp(correctOutput($_SESSION['step_pp_10']['www_data']))."</url>\n");
                            fwrite($file, "\t\t\t\t\t<title>".correctOutput($_SESSION['step_pp_10']['firmname_data'])."</title>\n");
                        fwrite($file, "\t\t\t\t</webUrl>\n");
                    fwrite($file, "\t\t\t</businessUrl>\n");
                }
                
                if (!empty($_SESSION['step_pp_10']['add_data'])) {  
                    fwrite($file, "\t\t\t<otherInformation>".correctOutput($_SESSION['step_pp_10']['add_data'])."</otherInformation>\n");
                }                        

                fwrite($file, "\t\t</business>\n");
            }
            
            if (isset($_SESSION['step_pp_5']['hobby'])) {    
                if (!empty($_SESSION['step_pp_11']['hobby_data'][0])) {
                    fwrite($file, "\n\t\t<hobbies>\n");
                             
                    $pom = 0;
                    while (!empty($_SESSION['step_pp_11']['hobby_data'][$pom]) || !empty($_SESSION['step_pp_11']['hobby_data'][($pom+1)])) {
                        if (!empty($_SESSION['step_pp_11']['hobby_data'][$pom])) {
                            fwrite($file, "\t\t\t<hobby>".correctOutput($_SESSION['step_pp_11']['hobby_data'][$pom])."</hobby>\n");
                        }
                        $pom = $pom + 1;
                    }
    
                    fwrite($file, "\t\t</hobbies>\n");
                }
            }
            
            if (isset($_SESSION['step_pp_5']['knowledge'])) {
                if (!empty($_SESSION['step_pp_12']['knowledge_data'][0])) {
                    fwrite($file, "\n\t\t<knowledges>\n");
                             
                    $pom = 0;
                    while (!empty($_SESSION['step_pp_12']['knowledge_data'][$pom]) || !empty($_SESSION['step_pp_12']['knowledge_data'][($pom+1)])) {
                        if (!empty($_SESSION['step_pp_12']['knowledge_data'][$pom])) {
                            fwrite($file, "\t\t\t<knowledge>".correctOutput($_SESSION['step_pp_12']['knowledge_data'][$pom])."</knowledge>\n");
                        }
                        $pom = $pom + 1;
                    }
    
                    fwrite($file, "\t\t</knowledges>\n");
                }
            }
            
            if (isset($_SESSION['step_pp_5']['birthdate'])) {            
                if (!empty($_SESSION['step_pp_13']['birthplace_data']) || !empty($_SESSION['step_pp_13']['birthdate_data'])) {
                    fwrite($file, "\n\t\t<birth>\n");
                
                    if (!empty($_SESSION['step_pp_13']['birthdate_data'])) {
                        fwrite($file, "\t\t\t<date>".correctOutput($_SESSION['step_pp_13']['birthdate_data'])."</date>\n");
                    }
              
                    if (!empty($_SESSION['step_pp_13']['birthplace_data'])) {
                        fwrite($file, "\t\t\t<place>".correctOutput($_SESSION['step_pp_13']['birthplace_data'])."</place>\n");   
                    }
                    
                    if (!empty($_SESSION['step_pp_13']['sign_data'])) {
                        if ($_SESSION['step_pp_13']['sign_data'] != "error") {
                            fwrite($file, "\t\t\t<sign>".correctOutput($_SESSION['step_pp_13']['sign_data'])."</sign>\n");
                        }
                    }                
              
                    fwrite($file, "\t\t</birth>\n");
                }
            }
 
            if (isset($_SESSION['step_pp_5']['textfield'])) {                                        
               if (!empty($_SESSION['step_pp_15']['tf_text'][0])) {
    
                    fwrite($file, "\n\t\t<texts>\n");
                
                    $i = 0;
                    while ($_SESSION['step_pp_15']['tf_text'][$i]) {
                        
                        fwrite($file, "\t\t\t<text>\n");
                            fwrite($file, "\t\t\t\t<message>".correctOutput($_SESSION['step_pp_15']['tf_text'][$i])."</message>\n");
                        
                            if ($_SESSION['step_pp_15']['tf_align_que'][$i] == "b") {
                                fwrite($file, "\t\t\t\t<align>right</align>\n");
                            } else {
                                 fwrite($file, "\t\t\t\t<align>left</align>\n");
                            }
                                                                      
                            if ($_SESSION['step_pp_15']['tf_photo_que'][$i] == "a") {
                                fwrite($file, "\t\t\t\t<tfphoto>\n");
                                    fwrite($file, "\t\t\t\t\t<url>".addHttp(correctOutput($_SESSION['step_pp_15']['tf_photo_src_data'][$i]))."</url>\n");
                                    fwrite($file, "\t\t\t\t\t<alt>".correctOutput($_SESSION['step_pp_15']['tf_photo_alt_data'][$i])."</alt>\n");
                                fwrite($file, "\t\t\t\t</tfphoto>\n");
                            }
                            
                            if ($_SESSION['step_pp_15']['tf_photo_que'][$i] == "b") {
                                fwrite($file, "\t\t\t\t<tfphoto>\n");
                                    fwrite($file, "\t\t\t\t\t<url>img/".correctOutput($_SESSION['step_pp_15']['photo_file_upload']['tf_photo_file_data']['name'][$i])."</url>\n");
                                    fwrite($file, "\t\t\t\t\t<alt>".correctOutput($_SESSION['step_pp_15']['tf_photo_alt_data'][$i])."</alt>\n");
                                fwrite($file, "\t\t\t\t</tfphoto>\n");
                            
                                if (is_dir("./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'])) {
                                    recurse_copy("./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'], $dirname."/img");
                                    recursive_remove_directory("./tmp/".correctOutput($_SESSION['step_all_2']['user_name']));             
                                }
                            }
                        
                        
                        fwrite($file, "\t\t\t</text>\n");
                        
                        $i++;
                    }
                
                    fwrite($file, "\t\t</texts>\n");
                }
            }

            if (isset($_SESSION['step_pp_5']['links'])) { 
                if (isset($_SESSION['step_pp_5']['links_undef']) || isset($_SESSION['step_pp_5']['links_def']) || (!isset($_SESSION['step_pp_5']['links_undef'])&& !isset($_SESSION['step_pp_5']['links_def']))) {
                    fwrite($file, "\n\t\t<links>\n");
                    
                    if (isset($_SESSION['step_pp_16']['links_organisations_pom1'])) {
                        generateLink($file, $dirname, "http://www.sons.cz", $webgen_links_organisations_sons[$language], "sons.jpg", "organisation");
                   }
                   
                    if (isset($_SESSION['step_pp_16']['links_organisations_pom2'])) {
                        generateLink($file, $dirname, "http://www.braillnet.cz/", $webgen_links_organisations_brailnet[$language], "braillnet.jpg", "organisation");
                    }                            

                    if (isset($_SESSION['step_pp_16']['links_organisations_pom3'])) {
                        generateLink($file, $dirname, "http://www.tyflocentrum.cz/", $webgen_links_organisations_tyflo[$language], "tyflo.jpg", "organisation");
                    } 

                    if (isset($_SESSION['step_pp_16']['links_organisations_pom4'])) {
                        generateLink($file, $dirname, "http://www.teiresias.muni.cz/", $webgen_links_organisations_teir[$language], "teiresias.jpg", "organisation");
                    } 
                    
                    if (isset($_SESSION['step_pp_16']['links_organisations_pom5'])) {
                        generateLink($file, $dirname, "http://www.nrzp.cz/", $webgen_links_organisations_nrozp[$language], "nrzp.jpg", "organisation");
                    }                             
                    
                    if (isset($_SESSION['step_pp_16']['links_social_pom1'])) {
                        generateLink($file, $dirname, "http://www.lide.cz/", $webgen_links_social_lide[$language], "lide.jpg", "social");
                    }                                                           

                    if (isset($_SESSION['step_pp_16']['links_social_pom2'])) {
                        generateLink($file, $dirname, "http://www.spoluzaci.cz/", $webgen_links_social_spoluzaci[$language], "spoluzaci.jpg", "social");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_social_pom3'])) {
                        generateLink($file, $dirname, "http://libimseti.cz/", $webgen_links_social_libimseti[$language], "libimseti.jpg", "social");
                    } 
                    
                    if (isset($_SESSION['step_pp_16']['links_social_pom4'])) {
                        generateLink($file, $dirname, "http://www.facebook.com/", $webgen_links_social_facebook[$language], "facebook.jpg", "social");
                    } 
                    
                    if (isset($_SESSION['step_pp_16']['links_social_pom5'])) {
                        generateLink($file, $dirname, "http://www.myspace.com/", $webgen_links_social_myspace[$language], "myspace.jpg", "socia");
                    } 
                    
                    if (isset($_SESSION['step_pp_16']['links_social_pom6'])) {
                        generateLink($file, $dirname, "http://www.last.fm/", $webgen_links_social_lastfm[$language]." - Listen to internet radio and the largest music catalogue online", "lastfm.jpg", "social");
                    }                                                         
                            
                    if (isset($_SESSION['step_pp_16']['links_chat_pom1'])) {
                        generateLink($file, $dirname, "http://xchat.centrum.cz/~guest~/index.php", $webgen_links_chat_xchat[$language], "xchat.jpg", "chat");
                    }                                     
                            
                    if (isset($_SESSION['step_pp_16']['links_chat_pom2'])) {
                        generateLink($file, $dirname, "http://4ever.sk/", $webgen_links_chat_forever[$language], "4everchat.jpg", "chat");
                    }                                     

                            
                    if (isset($_SESSION['step_pp_16']['links_browser_pom1'])) {
                        generateLink($file, $dirname, "https://www.microsoft.com/cze/windows/internet-explorer/default.aspx", $webgen_links_browser_expl[$language], "iexplorer.jpg", "browser");
                    }   

                    if (isset($_SESSION['step_pp_16']['links_browser_pom2'])) {
                        generateLink($file, $dirname, "http://www.opera.com", $webgen_links_browser_opera[$language], "opera.jpg", "browser");
                    }   
                    
                    if (isset($_SESSION['step_pp_16']['links_browser_pom3'])) {
                        generateLink($file, $dirname, "http://www.mozilla-europe.org/cs/firefox/", $webgen_links_browser_firefox[$language], "mozilla.jpg", "browser");
                    }   
                    
                   if (isset($_SESSION['step_pp_16']['links_browser_pom4'])) {
                        generateLink($file, $dirname, "http://www.apple.com/safari/", $webgen_links_browser_safari[$language], "safari.jpg", "browser");
                    }   
                    
                    if (isset($_SESSION['step_pp_16']['links_browser_pom5'])) {
                        generateLink($file, $dirname, "http://www.google.com/chrome/", $webgen_links_browser_chrome[$language], "chrome.jpg", "browser");
                    }   
                    
                    if (isset($_SESSION['step_pp_16']['links_browser_pom6'])) {
                        generateLink($file, $dirname, "http://lynx.isc.org/", $webgen_links_browser_lynx[$language], "lynx.jpg", "browser");
                    }   
                    
                    if (isset($_SESSION['step_pp_16']['links_browser_pom7'])) {
                        generateLink($file, $dirname, "http://www.konqueror.org/", $webgen_links_browser_konqueror[$language], "konqueror.jpg", "browser");
                    }   

                    if (isset($_SESSION['step_pp_16']['links_news_pom1'])) {
                        generateLink($file, $dirname, "http://ihned.cz/", $webgen_links_news_ihned[$language], "ihned.jpg", "news");
                    } 
 
                    if (isset($_SESSION['step_pp_16']['links_news_pom2'])) {
                        generateLink($file, $dirname, "http://www.idnes.cz/", $webgen_links_news_idnes[$language], "idnes.jpg", "news");
                    } 

                    if (isset($_SESSION['step_pp_16']['links_news_pom3'])) {
                        generateLink($file, $dirname, "http://www.lidovky.cz/", $webgen_links_news_lidovky[$language], "lidovky.jpg", "news");
                    } 

                    if (isset($_SESSION['step_pp_16']['links_news_pom4'])) {
                        generateLink($file, $dirname, "http://aktualne.centrum.cz/", $webgen_links_news_aktualne[$language], "aktualne.jpg", "news");
                    }                         

                    if (isset($_SESSION['step_pp_16']['links_news_pom5'])) {
                        generateLink($file, $dirname, "http://tn.nova.cz/zpravy", $webgen_links_news_tncz[$language], "tncz.jpg", "news");
                    }  

                    if (isset($_SESSION['step_pp_16']['links_news_pom6'])) {
                        generateLink($file, $dirname, "http://www.novinky.cz/", $webgen_links_news_novinky[$language], "novinky.jpg", "news");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_news_pom7'])) {
                        generateLink($file, $dirname, "http://www.blesk.cz/", $webgen_links_news_blesk[$language], "blesk.jpg", "news");
                    }                              

                    if (isset($_SESSION['step_pp_16']['links_search_pom1'])) {
                        generateLink($file, $dirname, "http://www.google.cz/", $webgen_links_search_google[$language], "google.jpg", "search");
                    }   

                    if (isset($_SESSION['step_pp_16']['links_search_pom2'])) {
                        generateLink($file, $dirname, "http://www.cuil.com/", $webgen_links_search_cuil[$language], "cuil.jpg", "search");
                    }   
                    
                    if (isset($_SESSION['step_pp_16']['links_search_pom3'])) {
                        generateLink($file, $dirname, "http://www.msn.com/", $webgen_links_search_msn[$language], "msn.jpg", "search");
                    }   
                  
                    if (isset($_SESSION['step_pp_16']['links_search_pom4'])) {
                        generateLink($file, $dirname, "http://answers.wikia.com/wiki/Wikianswers", $webgen_links_search_wikia[$language], "wikia.jpg", "search");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_search_pom5'])) {
                        generateLink($file, $dirname, "http://search.yahoo.com/", $webgen_links_search_yahoo[$language], "yahoo.jpg", "search");
                    }   
                   
                    if (isset($_SESSION['step_pp_16']['links_search_pom6'])) {
                        generateLink($file, $dirname, "http://www.seznam.cz", $webgen_links_search_seznam[$language], "seznam.jpg", "search");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_search_pom7'])) {
                        generateLink($file, $dirname, "http://www.centrum.cz/", $webgen_links_search_centrum[$language], "centrum.jpg", "search");
                    }         
                    
                    if (isset($_SESSION['step_pp_16']['links_search_pom8'])) {
                        generateLink($file, $dirname, "http://www.atlas.cz/", $webgen_links_search_atlas[$language], "atlas.jpg", "search");
                    }   
                    
                    if (isset($_SESSION['step_pp_16']['links_search_pom9'])) {
                        generateLink($file, $dirname, "http://jizdnirady.idnes.cz/vlakyautobusy/spojeni/", $webgen_links_search_idos[$language], "idos.jpg", "search");
                    }   
                  
                    if (isset($_SESSION['step_pp_16']['links_dictionary_pom1'])) {
                        generateLink($file, $dirname, "http://www.slovnik.cz/", $webgen_links_dictionary_slovnik[$language], "slovnik.jpg", "dictionary");
                    } 

                    if (isset($_SESSION['step_pp_16']['links_dictionary_pom2'])) {
                        generateLink($file, $dirname, "http://slovnik.seznam.cz/", $webgen_links_dictionary_sezslovnik[$language], "sezslovnik.jpg", "dictionary");
                    }
                  
                    if (isset($_SESSION['step_pp_16']['links_dictionary_pom3'])) {
                        generateLink($file, $dirname, "http://slovnik-cizich-slov.abz.cz/", $webgen_links_dictionary_cizichslov[$language], "slovcizich.jpg", "dictionary");
                    } 
                    
                   if (isset($_SESSION['step_pp_16']['links_dictionary_pom4'])) {
                        generateLink($file, $dirname, "http://www.merriam-webster.com/", $webgen_links_dictionary_merr[$language], "merriam.jpg", "dictionary");
                    }  

                    if (isset($_SESSION['step_pp_16']['links_maps_pom1'])) {
                        generateLink($file, $dirname, "http://www.mapy.cz", $webgen_links_dictionary_maps_mapy[$language], "mapy.jpg", "maps");
                    }

                    if (isset($_SESSION['step_pp_16']['links_maps_pom2'])) {
                        generateLink($file, $dirname, "http://amapy.atlas.cz/", $webgen_links_maps_amapy[$language], "amapy.jpg", "maps");
                    }    

                    if (isset($_SESSION['step_pp_16']['links_maps_pom3'])) {
                        generateLink($file, $dirname, "http://earth.google.com/intl/cs/", $webgen_links_maps_earth[$language], "gearth.jpg", "maps");
                    }
                
                    if (isset($_SESSION['step_pp_16']['links_client_pom1'])) {
                        generateLink($file, $dirname, "http://www.icq.com/", $webgen_links_client_icq[$language], "icq.jpg", "client");
                    }

                    if (isset($_SESSION['step_pp_16']['links_client_pom2'])) {
                        generateLink($file, $dirname, "http://www.miranda.cz/", $webgen_links_client_miranda[$language], "miranda.jpg", "client");
                    }                             
 
                    if (isset($_SESSION['step_pp_16']['links_client_pom3'])) {
                        generateLink($file, $dirname, "http://qipim.cz", $webgen_links_client_qip[$language], "qip.jpg", "client");
                    }

                    if (isset($_SESSION['step_pp_16']['links_client_pom4'])) {
                        generateLink($file, $dirname, "http://www.skype.com/intl/en/", $webgen_links_client_skype[$language], "skype.jpg", "client");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_client_pom5'])) {
                        generateLink($file, $dirname, "http://www.jabber.cz/wiki/", $webgen_links_client_jabber[$language], "jabber.jpg", "client");
                    }

                    if (isset($_SESSION['step_pp_16']['links_gallery_pom1'])) {
                        generateLink($file, $dirname, "http://www.flickr.com/", $webgen_links_gallery_flickr[$language], "flickr.jpg", "gallery");
                    }

                    if (isset($_SESSION['step_pp_16']['links_gallery_pom2'])) {
                        generateLink($file, $dirname, "http://www.picasaweb.google.cz/", $webgen_links_gallery_picasa[$language], "picasa.jpg", "gallery");
                    }
                  
                    if (isset($_SESSION['step_pp_16']['links_gallery_pom3'])) {
                        generateLink($file, $dirname, "http://www.rajce.idnes.cz/", $webgen_links_gallery_rajce[$language], "rajce.jpg", "gallery");
                    }

                    if (isset($_SESSION['step_pp_16']['links_gallery_pom4'])) {
                        generateLink($file, $dirname, "http://www.mojefoto.net/", $webgen_links_gallery_mojefoto[$language], "mojefoto.jpg", "gallery");
                    }

                    if (isset($_SESSION['step_pp_16']['links_gallery_pom5'])) {
                        generateLink($file, $dirname, "http://www.fotomat.com/home/home.asp", $webgen_links_gallery_fotomat[$language], "fotomat.jpg", "gallery");
                    }

                    if (isset($_SESSION['step_pp_16']['links_game_pom1'])) {
                        generateLink($file, $dirname, "http://www.travian.cz/", $webgen_links_game_travian[$language], "travian.jpg", "game");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_game_pom2'])) {
                        generateLink($file, $dirname, "http://www.darkorbit.com/", $webgen_links_game_darkorbit[$language], "darkorbit.jpg", "game");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_game_pom3'])) {
                        generateLink($file, $dirname, "http://ikariam.cz/", $webgen_links_game_ikariam[$language], "ikariam.jpg", "game");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_game_pom4'])) {
                        generateLink($file, $dirname, "http://www.bitefight.cz/", $webgen_links_game_bittefight[$language], "bittefight.jpg", "game");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_game_pom5'])) {
                        generateLink($file, $dirname, "http://www.darkelf.cz/", $webgen_links_game_darkelf[$language], "darkelf.jpg", "game");
                    }
                    
                    if (isset($_SESSION['step_pp_16']['links_game_pom6'])) {
                        generateLink($file, $dirname, "http://www.stargatewars.com", $webgen_links_game_stargate[$language], "stargate.jpg", "game");
                    }                      

                    if (isset($_SESSION['step_pp_16']['links_other_pom1'])) {
                        generateLink($file, $dirname, "http://wikipedia.org/", $webgen_links_other_wikipedia[$language], "wikipedia.jpg", "other");
                    }
                         
                    if (isset($_SESSION['step_pp_16']['links_other_pom2'])) {
                        generateLink($file, $dirname, "http://www.youtube.com/", $webgen_links_other_youtube[$language], "youtube.jpg", "other");
                    }
                   
                    $pom = 0;
                    while((!empty($_SESSION['step_pp_16']['link_description_data'][$pom]) && !empty($_SESSION['step_pp_16']['link_url_data'][$pom])) || (!empty($_SESSION['step_pp_16']['link_description_data'][$pom+1]) && !empty($_SESSION['step_pp_16']['link_url_data'][$pom+1]))) {
                        
                        if (!empty($_SESSION['step_pp_16']['link_description_data'][$pom]) && !empty($_SESSION['step_pp_16']['link_url_data'][$pom])) {
                        generateLink($file, $dirname, addHttp(correctOutput($_SESSION['step_pp_16']['link_url_data'][$pom])), correctOutput($_SESSION['step_pp_16']['link_description_data'][$pom]), "icon.jpg", "user defined");                 
                        }
                        
                        $pom = $pom + 1;
                    }
                    
                    fwrite($file, "\t\t</links>\n");
                }
            } 
                
// *********************** CV ***********************************************
            
            if (isset($_SESSION['step_pp_5']['cv'])) {
                fwrite($file, "\t\t<cv>\n");
                
                    if (!empty($_SESSION['step_pp_14']['email_cv_que']) && $_SESSION['step_pp_14']['email_cv_que'] != 'c') {

                        switch ($_SESSION['step_pp_14']['email_cv_que']) {
                            
                            case 'a':
                                fwrite($file, "\t\t\t<cvEmail>".correctOutput($_SESSION['step_pp_8']['email_data'])."</cvEmail>\n");
                                break;
                                
                            case 'b':
                                fwrite($file, "\t\t\t<cvEmail>".correctOutput($_SESSION['step_pp_14']['email_cv_data'])."</cvEmail>\n");
                                break;
                        }
                    
                    } else if (!empty($_SESSION['step_pp_14']['email_cv_data'])) {
                        fwrite($file, "\t\t\t<cvEmail>".correctOutput($_SESSION['step_pp_14']['email_cv_data'])."</cvEmail>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_14']['address_cv_que']) && $_SESSION['step_pp_14']['address_cv_que'] != 'c') {
                        
                        switch ($_SESSION['step_pp_14']['address_cv_que']) {
                            
                            case 'a':
                                generateAddress($file, '3', 'cvAddress', correctOutput($_SESSION['step_pp_8']['street_data']), correctOutput($_SESSION['step_pp_8']['housenumber_data']), correctOutput($_SESSION['step_pp_8']['postcode_data']), correctOutput($_SESSION['step_pp_8']['city_data']), correctOutput($_SESSION['step_pp_8']['state_data']));
                                break;
                                
                            case 'b':
                                generateAddress($file, '3', 'cvAddress', correctOutput($_SESSION['step_pp_14']['street_cv_data']), correctOutput($_SESSION['step_pp_14']['housenumber_cv_data']), correctOutput($_SESSION['step_pp_14']['postcode_cv_data']), correctOutput($_SESSION['step_pp_14']['city_cv_data']), correctOutput($_SESSION['step_pp_14']['state_cv_data']));
                                break;
                        }
                    
                    } else if (!empty($_SESSION['step_pp_14']['email_cv_cv_data'])) {
                        generateAddress($file, '3', 'cvAddress', correctOutput($_SESSION['step_pp_14']['street_cv_data']), correctOutput($_SESSION['step_pp_14']['housenumber_cv_data']), correctOutput($_SESSION['step_pp_14']['postcode_cv_data']), correctOutput($_SESSION['step_pp_14']['city_cv_data']), correctOutput($_SESSION['step_pp_14']['state_cv_data']));
                    }
                    
                    if (!empty($_SESSION['step_pp_14']['cellular_cv_que']) && $_SESSION['step_pp_14']['cellular_cv_que'] != 'c') {
                        
                        switch ($_SESSION['step_pp_14']['cellular_cv_que']) {
                            
                            case 'a':
                                fwrite($file, "\t\t\t<cvPhone>".correctOutput($_SESSION['step_pp_8']['cellular_data'])."</cvPhone>\n");
                                break;

                            case 'd':
                                fwrite($file, "\t\t\t<cvPhone>".correctOutput($_SESSION['step_pp_8']['phone_data'])."</cvPhone>\n");
                                break;                                            
                                
                            case 'b':
                                fwrite($file, "\t\t\t<cvPhone>".correctOutput($_SESSION['step_pp_14']['cellular_cv_data'])."</cvPhone>\n");
                                break;
                        }
                
                    } else if (!empty($_SESSION['step_pp_14']['cellular_cv_data'])) {
                        fwrite($file, "\t\t\t<cvPhone>".correctOutput($_SESSION['step_pp_14']['cellular_cv_data'])."</cvPhone>\n");
                    }                    
                    
                    if (!empty($_SESSION['step_pp_14']['nationality_cv_data'])) {
                        fwrite($file, "\t\t\t<nationality>".correctOutput($_SESSION['step_pp_14']['nationality_cv_data'])."</nationality>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_14']['family_cv_data'])) {
                        fwrite($file, "\t\t\t<maritalStatus>".correctOutput($_SESSION['step_pp_14']['family_cv_data'])."</maritalStatus>\n");
                    }
                    
                    if (!empty($_SESSION['step_pp_14']['edu_from_data'][0]) && !empty($_SESSION['step_pp_14']['edu_school_data'][0])) {
                        fwrite($file, "\t\t\t<courses>\n");
                        
                        $pom = 0;
                        
                        while (!empty($_SESSION['step_pp_14']['edu_from_data'][$pom]) && !empty($_SESSION['step_pp_14']['edu_school_data'][$pom])) {
                            fwrite($file, "\t\t\t\t<course>\n");
                            
                                fwrite($file, "\t\t\t\t\t<from>".correctOutput($_SESSION['step_pp_14']['edu_from_data'][$pom])."</from>\n");
                                
                                if (!empty($_SESSION['step_pp_14']['edu_to_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<to>".correctOutput($_SESSION['step_pp_14']['edu_to_data'][$pom])."</to>\n");
                                }
                                
                                if (!empty($_SESSION['step_pp_14']['edu_degree_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<level>".${"degree_{$_SESSION['step_pp_14']['edu_degree_data'][$pom]}"}[$language]."</level>\n");
                                }
    
                                if (!empty($_SESSION['step_pp_14']['edu_title_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<degree>".correctOutput($_SESSION['step_pp_14']['edu_title_data'][$pom])."</degree>\n");
                                }                            
    
                                if (!empty($_SESSION['step_pp_14']['edu_school_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<schoolName>".correctOutput($_SESSION['step_pp_14']['edu_school_data'][$pom])."</schoolName>\n");
                                }
    
                                if (!empty($_SESSION['step_pp_14']['edu_field_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<branch>".correctOutput($_SESSION['step_pp_14']['edu_field_data'][$pom])."</branch>\n");
                                }
                            
                            fwrite($file, "\t\t\t\t</course>\n");
                            $pom++;
                        }
                    
                        fwrite($file, "\t\t\t</courses>\n");
                    }                  
                    
                    if (!empty($_SESSION['step_pp_14']['work_from_data'][0]) && !empty($_SESSION['step_pp_14']['work_companyname_data'][0])) {
                        fwrite($file, "\t\t\t<workExperiences>\n");
                        
                        $pom = 0;
                        
                        while (!empty($_SESSION['step_pp_14']['work_from_data'][$pom]) && !empty($_SESSION['step_pp_14']['work_companyname_data'][$pom])) {
                            fwrite($file, "\t\t\t\t<work>\n");
                            
                                fwrite($file, "\t\t\t\t\t<from>".correctOutput($_SESSION['step_pp_14']['work_from_data'][$pom])."</from>\n");
                                
                                if (!empty($_SESSION['step_pp_14']['work_to_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<to>".correctOutput($_SESSION['step_pp_14']['work_to_data'][$pom])."</to>\n");
                                }
                                
                                if (!empty($_SESSION['step_pp_14']['work_companyname_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<businessName>".correctOutput($_SESSION['step_pp_14']['work_companyname_data'][$pom])."</businessName>\n");
                                }
    
                                if (!empty($_SESSION['step_pp_14']['work_sphere_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<branch>".correctOutput($_SESSION['step_pp_14']['work_sphere_data'][$pom])."</branch>\n");
                                }                            
    
                                if (!empty($_SESSION['step_pp_14']['work_pos_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<position>".correctOutput($_SESSION['step_pp_14']['work_pos_data'][$pom])."</position>\n");
                                }
    
                                if (!empty($_SESSION['step_pp_14']['work_wload_data'][$pom])) {
                                    fwrite($file, "\t\t\t\t\t<workload>".correctOutput($_SESSION['step_pp_14']['work_wload_data'][$pom])."</workload>\n");
                                }
                            
                            fwrite($file, "\t\t\t\t</work>\n");
                            $pom++;
                        }
                    
                        fwrite($file, "\t\t\t</workExperiences>\n");
                    }
                                                              
                if (!empty($_SESSION['step_pp_14']['it_degree_cv_data']) || $_SESSION['step_pp_14']['it_degree_cv_data'] == '0') {
                    fwrite($file, "\t\t\t<personalSkills>\n");
                        
                        fwrite($file, "\t\t\t\t<itSkills>\n");
                            fwrite($file, "\t\t\t\t\t<level>".${"it_{$_SESSION['step_pp_14']['it_degree_cv_data']}"}[$language]."</level>\n");    
                        
                            if (!empty($_SESSION['step_pp_14']['it_detail_cv_data'])) {
                                 fwrite($file, "\t\t\t\t\t<description>".correctOutput($_SESSION['step_pp_14']['it_detail_cv_data'])."</description>\n"); 
                            }
                        fwrite($file, "\t\t\t\t</itSkills>\n");
                        
                        if (!empty($_SESSION['step_pp_14']['driver_cv_data'])) {
                             fwrite($file, "\t\t\t\t<drivingLicence>".correctOutput($_SESSION['step_pp_14']['driver_cv_data'])."</drivingLicence>\n"); 
                        }
                        
                        if ((!empty($_SESSION['step_pp_14']['lang_type_data'][0]) || $_SESSION['step_pp_14']['lang_type_data'][0] == '0') && (!empty($_SESSION['step_pp_14']['lang_level_data'][0]) || $_SESSION['step_pp_14']['lang_level_data'][0] == '0')) {
                            fwrite($file, "\t\t\t\t<languages>\n"); 
                            
                            $pom = 0;
                            
                            while ((!empty($_SESSION['step_pp_14']['lang_type_data'][$pom]) || $_SESSION['step_pp_14']['lang_type_data'][$pom] == '0') || (!empty($_SESSION['step_pp_14']['lang_level_data'][$pom]) || $_SESSION['step_pp_14']['lang_level_data'][$pom] == '0')) {
                               
                                fwrite($file, "\t\t\t\t\t<language>\n");
                                    fwrite($file, "\t\t\t\t\t\t<name>".${"l_{$_SESSION['step_pp_14']['lang_type_data'][$pom]}"}[$language]."</name>\n"); 
                                    fwrite($file, "\t\t\t\t\t\t<level>".${"lang_{$_SESSION['step_pp_14']['lang_level_data'][$pom]}"}[$language]."</level>\n"); 
                                fwrite($file, "\t\t\t\t\t</language>\n");
                                
                                $pom++;
                            }
                        
                            fwrite($file, "\t\t\t\t</languages>\n"); 
                        }                        
  
                        if (!empty($_SESSION['step_pp_14']['otherskill_cv_data'])) {
                            fwrite($file, "\t\t\t\t<otherSkills>\n");
                                fwrite($file, "\t\t\t\t\t<skill>\n");
                                    fwrite($file, "\t\t\t\t\t\t<name>".correctOutput($_SESSION['step_pp_14']['otherskill_cv_data'])."</name>\n");
                                    fwrite($file, "\t\t\t\t\t\t<level></level>\n");
                                fwrite($file, "\t\t\t\t\t</skill>\n");
                            fwrite($file, "\t\t\t\t</otherSkills>\n");
                        }         
                        
                    fwrite($file, "\t\t\t</personalSkills>\n");
                }
                
                if (!empty($_SESSION['step_pp_14']['other_cv_data'])) {
                    fwrite($file, "\t\t\t<otherInformation>".correctOutput($_SESSION['step_pp_14']['other_cv_data'])."</otherInformation>\n");
                }                   
            
                fwrite($file, "\t\t</cv>\n");
            }
            
         // ******** Aplikace ************
      
            if (isset($_SESSION['step_pp_5']['features'])) {                                        
                fwrite($file, "\t\t<applications>\n");
               
                if (!empty($_SESSION['step_pp_17']['favphoto_alt_data'])) {      
                    fwrite($file, "\t\t\t<photoGATE>\n");
                        
                        if ($_SESSION['step_pp_5']['favphoto_file'] == "url") {
                            fwrite($file, "\t\t\t\t<url>".addHttp($_SESSION['step_pp_17']['favphoto_src_data'])."</url>\n");
                            fwrite($file, "\t\t\t\t<alt>".$_SESSION['step_pp_17']['favphoto_alt_data']."</alt>\n");
                        }
                        else {
                            fwrite($file, "\t\t\t\t<url>img/".correctOutput($_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['name'])."</url>\n");
                            fwrite($file, "\t\t\t\t<alt>".correctOutput($_SESSION['step_pp_17']['favphoto_alt_data'])."</alt>\n");                 
                        
                            if (is_dir("./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'])) {
                                recurse_copy("./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'], $dirname."/img");
                                recursive_remove_directory("./tmp/".correctOutput($_SESSION['step_all_2']['user_name']));             
                            }
                        } 
                    
                    fwrite($file, "\t\t\t</photoGATE>\n");  
                }
                
                if (isset($_SESSION['step_pp_5']['features_discus']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {

                    fwrite($file, "\t\t\t<guestbook>\n");
                        fwrite($file, "\t\t\t\t<type>classic</type>\n");
                    fwrite($file, "\t\t\t</guestbook>\n");
                    
                    if ('czech' == $_SESSION['step_all_1']['language']) {
                        copy("./apps/gb_cz/gb.php", $dirname."/page_files/gb.php");
                        copy("./apps/gb_cz/gb.css", $dirname."/page_files/gb.css");
                        copy("./apps/gb_cz/gb.js", $dirname."/page_files/gb.js");
                        copy("./apps/gb_cz/gb_add.php", $dirname."/page_files/gb_add.php");
                        if (!file_exists($dirname."/page_files/gb_data.txt")) {
                            copy("./apps/gb_cz/gb_data.txt", $dirname."/page_files/gb_data.txt");
                        }
                    
                    } else {
                        copy("./apps/gb_en/gb.php", $dirname."/page_files/gb.php");
                        copy("./apps/gb_en/gb.css", $dirname."/page_files/gb.css");
                        copy("./apps/gb_en/gb.js", $dirname."/page_files/gb.js");
                        copy("./apps/gb_en/gb_add.php", $dirname."/page_files/gb_add.php");
                        if (!file_exists($dirname."/page_files/gb_data.txt")) {
                            copy("./apps/gb_en/gb_data.txt", $dirname."/page_files/gb_data.txt");
                        }                    
                    }                 
                    
                    chmod($dirname."/page_files/gb.php", 0744);
                    chmod($dirname."/page_files/gb.css", 0777);
                    chmod($dirname."/page_files/gb.js", 0777);
                    chmod($dirname."/page_files/gb_add.php", 0777);
                    chmod($dirname."/page_files/gb_data.txt", 0777);
                }
                
                if (isset($_SESSION['step_pp_5']['features_quest']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
                    fwrite($file, "\t\t\t<poll>\n");
                        fwrite($file, "\t\t\t\t<question>".correctOutput($_SESSION['step_pp_18']['features_quest_question'])."</question>\n");
                        
                        fwrite($file, "\t\t\t\t<answers>\n");
                            
                            $pom = 0;
                            while (!empty($_SESSION['step_pp_18']['features_quest_answer'][$pom])) {
        
                                fwrite($file, "\t\t\t\t\t<answer>".correctOutput($_SESSION['step_pp_18']['features_quest_answer'][$pom])."</answer>\n");
                                $pom++;
                            }
                    
                        fwrite($file, "\t\t\t\t</answers>\n");
                    fwrite($file, "\t\t\t</poll>\n");                
                }
                
                if (isset($_SESSION['step_pp_5']['features_calendar']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
                    fwrite($file, "\t\t\t<application>\n");
                        fwrite($file, "\t\t\t\t<name>calendar</name>\n");
                    fwrite($file, "\t\t\t</application>\n");
                }                
                
                if (isset($_SESSION['step_pp_5']['features_hour']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
                    fwrite($file, "\t\t\t<application>\n");
                        fwrite($file, "\t\t\t\t<name>hour</name>\n");
                        
                        if (isset($_SESSION['step_pp_18']['features_hour_que'])) {
                            switch ($_SESSION['step_pp_18']['features_hour_que']) {
                                case 'a': $pom = 'analogue'; break;
                                case 'b': $pom = 'digital'; break;
                            }
                            
                            fwrite($file, "\t\t\t\t<parameters>\n");
                                fwrite($file, "\t\t\t\t\t<parameter name=\"type\" value=\"".$pom."\" />\n");
                            fwrite($file, "\t\t\t\t</parameters>\n");
                        }
                        
                    fwrite($file, "\t\t\t</application>\n");
                }
                
                if (isset($_SESSION['step_pp_5']['features_weather']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
                    fwrite($file, "\t\t\t<application>\n");
                        fwrite($file, "\t\t\t\t<name>weather</name>\n");
                    fwrite($file, "\t\t\t</application>\n");
                }                
                
                if (isset($_SESSION['step_pp_5']['features_counter']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
                    fwrite($file, "\t\t\t<application>\n");
                        fwrite($file, "\t\t\t\t<name>counter</name>\n");
                    fwrite($file, "\t\t\t</application>\n");
                }                
                
                if (isset($_SESSION['step_pp_5']['features_email']) || $_SESSION['step_pp_5']["featuresIsAllFalse"]) {
                    fwrite($file, "\t\t\t<application>\n");
                        fwrite($file, "\t\t\t\t<name>email</name>\n");
                    fwrite($file, "\t\t\t</application>\n");
                }                     
                
                fwrite($file, "\t\t</applications>\n");            
            }

            fwrite($file, "\t</personalPageData>\n");
        fwrite($file, "</presentation>\n");
  
  fclose($file);
  chmod($fname, 0777);       

// ***************** Funkce ************************************************
                    



// ***************** KOPIROVANI SOUBORU ************************************

    copy("./icons/icon.jpg", $dirname."/img/icon.jpg");
    chmod($dirname."/img/icon.jpg", 0777); 

    // ikonky informujici o validite stranky
    
    copy("./icons/xhtml.png", $dirname."/img/xhtml.png");
    chmod($dirname."/img/xhtml.png", 0777);
    
    copy("./icons/css.png", $dirname."/img/css.png");
    chmod($dirname."/img/css.png", 0777);  
    
    // sckript pro gate projekt
    
    copy("./jsc/page.js", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".js");
    chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".js", 0777);    
    
    // zkopirovani souboru s jquery
    copy("./jsc/jquery.js", $dirname."/page_files/jquery.js");
    chmod($dirname."/page_files/jquery.js", 0777);
    
    

// ********************* ROMAN *************************************************

    if ($_SESSION['step_pp_19']['css_choice'] == "pp1") {
        
        copy("./themes/pp1/style.css", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".css");
        
        copy("./icons/siluette.gif", $dirname."/img/siluette.gif");
        chmod($dirname."/img/siluette.gif", 0777);            
        
        copy("./themes/pp1/img/footer.png", $dirname."/img/footer.png");
        copy("./themes/pp1/img/bg.png", $dirname."/img/bg.png");
        copy("./themes/pp1/img/center.png", $dirname."/img/center.png");
        copy("./themes/pp1/img/menu_hover.png", $dirname."/img/menu_hover.png");
        copy("./themes/pp1/img/header.png", $dirname."/img/header.png");
        
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".css", 0777);
        chmod($dirname."/img/footer.png", 0777);
        chmod($dirname."/img/bg.png", 0777);
        chmod($dirname."/img/center.png", 0777);
        chmod($dirname."/img/menu_hover.png", 0777);
        chmod($dirname."/img/header.png", 0777); 
    }

// ********************* PETR **************************************************

    else if ($_SESSION['step_pp_19']['css_choice'] == "pp2") {
        
        copy("./themes/pp2/style.css", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".css");          
        
        copy("./themes/pp2/img/bg.png", $dirname."/img/bg.png");
        copy("./themes/pp2/img/center.png", $dirname."/img/center.png");
        copy("./themes/pp2/img/footer.png", $dirname."/img/footer.png");
        copy("./themes/pp2/img/h_bg.png", $dirname."/img/h_bg.png");
        copy("./themes/pp2/img/header.jpg", $dirname."/img/header.jpg");
        copy("./themes/pp2/img/icon_jarek.png", $dirname."/img/icon_jarek.png");
        copy("./themes/pp2/img/menu_hover.png", $dirname."/img/menu_hover.png");
        copy("./themes/pp2/img/sunflower.jpg", $dirname."/img/sunflower.jpg");
        copy("./themes/pp2/img/sunflower.xcf", $dirname."/img/sunflower.xcf");
        
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".css", 0777);
        chmod($dirname."/img/bg.png", 0777);
        chmod($dirname."/img/center.png", 0777);
        chmod($dirname."/img/footer.png", 0777);
        chmod($dirname."/img/h_bg.png", 0777);
        chmod($dirname."/img/header.jpg", 0777);
        chmod($dirname."/img/icon_jarek.png", 0777);           
        chmod($dirname."/img/menu_hover.png", 0777);            
        chmod($dirname."/img/sunflower.jpg", 0777);
        chmod($dirname."/img/sunflower.xcf", 0777);  
    }
    
    else if ($_SESSION['step_pp_19']['css_choice'] == "pp3") {
        
        copy("./themes/pp3/style.css", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".css");           
        
        copy("./themes/pp3/img/background.jpg", $dirname."/img/background.jpg");
        
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".css", 0777);
        chmod($dirname."/img/background.jpg", 0777);
    }
    
    else if ($_SESSION['step_pp_19']['css_choice'] == "pp4") {
        
        copy("./themes/pp4/style.css", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".css");           
        
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".css", 0777);
    }
    
    else if ($_SESSION['step_pp_19']['css_choice'] == "pp5") {
        
        copy("./themes/pp5/style.css", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".css");           
        
        copy("./themes/pp5/img/bg.png", $dirname."/img/bg.png");
        copy("./themes/pp5/img/bg.xcf", $dirname."/img/bg.xcf");
        copy("./themes/pp5/img/butterfly1.png", $dirname."/img/butterfly1.png");
        copy("./themes/pp5/img/butterfly2.png", $dirname."/img/butterfly2.png");
        copy("./themes/pp5/img/butterfly3.png", $dirname."/img/butterfly3.png");
        copy("./themes/pp5/img/butterfly4.png", $dirname."/img/butterfly4.png");
        copy("./themes/pp5/img/center.png", $dirname."/img/center.png");
        copy("./themes/pp5/img/footer.png", $dirname."/img/footer.png");
        copy("./themes/pp5/img/sidebar.png", $dirname."/img/sidebar.png");
        
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".css", 0777);
        chmod($dirname."/img/bg.png", 0777);
        chmod($dirname."/img/bg.xcf", 0777);
        chmod($dirname."/img/butterfly1.png", 0777);
        chmod($dirname."/img/butterfly2.png", 0777);
        chmod($dirname."/img/butterfly3.png", 0777);
        chmod($dirname."/img/butterfly4.png", 0777);
        chmod($dirname."/img/center.png", 0777);
        chmod($dirname."/img/footer.png", 0777);
        chmod($dirname."/img/sidebar.png", 0777);
        
    }
    
    else if ($_SESSION['step_pp_19']['css_choice'] == "pp6") {
        
        copy("./themes/pp6/style.css", $dirname."/".$_SESSION['step_all_4']['presentation_name'].".css");           
        
        copy("./themes/pp6/img/additional.jpg", $dirname."/img/additional.jpg");
        copy("./themes/pp6/img/birth.gif", $dirname."/img/birth.gif");
        copy("./themes/pp6/img/hobbies.jpg", $dirname."/img/hobbies.jpg");
        copy("./themes/pp6/img/information.jpg", $dirname."/img/information.jpg");
        copy("./themes/pp6/img/language.gif", $dirname."/img/language.gif");
        copy("./themes/pp6/img/pozadi-kary-modry.png", $dirname."/img/pozadi-kary-modry.png");
        copy("./themes/pp6/img/qualification.jpg", $dirname."/img/qualification.jpg");
        copy("./themes/pp6/img/skills.jpg", $dirname."/img/skills.jpg");
        copy("./themes/pp6/img/working.jpg", $dirname."/img/working.jpg");
        
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".css", 0777);
        chmod($dirname."/img/additional.jpg", 0777);
        chmod($dirname."/img/birth.gif", 0777);
        chmod($dirname."/img/hobbies.jpg", 0777);
        chmod($dirname."/img/information.jpg", 0777);
        chmod($dirname."/img/language.gif", 0777);
        chmod($dirname."/img/pozadi-kary-modry.png", 0777);
        chmod($dirname."/img/qualification.jpg", 0777);
        chmod($dirname."/img/skills.jpg", 0777);
        chmod($dirname."/img/working.jpg", 0777);
    }   
      

// ******************* PROVEDENI XSL TRANSFORMACE HLAVNI STRANKA ********************************
   

    // naètení dokumentu XML
    $xml = new DomDocument();
    $xml->load($fname);
    
    // naètení stylu XSLT
    $xsl = new DomDocument();

   
    if ('czech' == $_SESSION['step_all_1']['language']) {
        $xsl->load("./xml/xslt/webgen_cz.xsl"); 
    } else {
        $xsl->load("./xml/xslt/webgen_en.xsl"); 
    }       


    // vytvoøení procesoru XSLT

    $proc = new xsltprocessor();
    $proc->registerPhpFunctions();
    $proc->importStylesheet($xsl);
    
    // provedení transformace a vypsání výsledku

    $newdom = $proc->transformToDoc($xml);
    $newdom->save($dirname."/".$_SESSION['step_all_4']['presentation_name'].".php"); 
    
    // naètení stylu XSLT
    $xsl = new DomDocument();

   
    if ('czech' == $_SESSION['step_all_1']['language']) {
        $xsl->load("./xml/xslt/center_cz.xsl"); 
    } else {
        $xsl->load("./xml/xslt/center_en.xsl"); 
    }       

    // vytvoøení procesoru XSLT

    $proc = new xsltprocessor();
    $proc->registerPhpFunctions();
    $proc->importStylesheet($xsl);
    
    // provedení transformace a vypsání výsledku

    $newdom = $proc->transformToDoc($xml);
    $newdom->save($dirname."/page_files/center.php");
    
    deleteXmlHeading($dirname."/".$_SESSION['step_all_4']['presentation_name'].".php");
    deleteXmlHeading($dirname."/page_files/center.php");
    
    chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".php", 0744);
    chmod($dirname."/page_files/center.php", 0744);
    
    
      
    
// ****************** PROVEDENI XSL TRANFORMACE ZIVOTOPIS *******************************************
    
    if (isset($_SESSION['step_pp_5']['cv'])) {
    
        // naètení stylu XSLT
        $xsl = new DomDocument();

        if ('czech' == $_SESSION['step_all_1']['language']) {
            $xsl->load("./xml/xslt/cv_cz.xsl"); 
        } else {
            $xsl->load("./xml/xslt/cv_en.xsl"); 
        }            
    
        // vytvoøení procesoru XSLT
    
        $proc = new xsltprocessor();
        $proc->registerPhpFunctions();
        $proc->importStylesheet($xsl);
        
        // provedení transformace a vypsání výsledku
    
        $newdom = $proc->transformToDoc($xml);
        $newdom->save($dirname."/page_files/cv.php"); 
        
        deleteXmlHeading($dirname."/page_files/cv.php");
        
        chmod($dirname."/page_files/cv.php", 0744); 
        
    
    // ****************** Kopirovani souboru pro zivotopis **********************************************
    
        copy("./themes/cv_euro/cv.css", $dirname."/".$_SESSION['step_all_4']['presentation_name']."_cv.css");
        copy("./themes/cv_euro/flag_eu.gif", $dirname."/img/flag_eu.gif");
           
        chmod($dirname."/".$_SESSION['step_all_4']['presentation_name']."_cv.css", 0777);
        chmod($dirname."/img/flag_eu.gif", 0777);
    }

// ***************** ZJISTI URL VYSLEDNE STRANKY ****************************************************

    $url = getUrl($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_4']['presentation_name'], $fname);
    
    $_SESSION['step_pp_20']['page_url'] = $url;
        
    // zjisteni, ktere emaily jsou jiz nastaveny - pro Javascript    
    if (!empty($_SESSION['step_pp_8']['email_data'])) { $email_pers = true; } else { $email_pers = false; }
    if (!empty($_SESSION['step_pp_14']['email_cv_data'])) { $email_cv = true; } else { $email_cv = false; }
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    
    <ul class="clear">
        <li>
            <label>
                <?php echo $webgen_showhtml_choice[$language].":"; ?>
                <select name="send_choice" onkeyup="analyze_send_choice(this, '<?php echo $email_pers; ?>', '<?php echo $email_cv; ?>', '<?php echo $webgen_showhtml_link_valid[$language]; ?>', '<?php echo $webgen_showhtml_button[$language]; ?>', '<?php echo $webgen_send_to_button[$language]; ?>')" onclick="analyze_send_choice(this, '<?php echo $email_pers; ?>', '<?php echo $email_cv; ?>', '<?php echo $webgen_showhtml_link_valid[$language]; ?>', '<?php echo $webgen_showhtml_button[$language]; ?>', '<?php echo $webgen_send_to_button[$language]; ?>')" >
                    <option value="a" <?php if ($_SESSION['step_pp_20']['send_choice'] == 'a') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_a[$language]; ?></option>
                    <option value="b" <?php if ($_SESSION['step_pp_20']['send_choice'] == 'b') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_b[$language]; ?></option>
                    <option value="c" <?php if ($_SESSION['step_pp_20']['send_choice'] == 'c') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_c[$language]; ?></option>
                    <option value="d" <?php if ($_SESSION['step_pp_20']['send_choice'] == 'd') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_d[$language]; ?></option>
                </select>
            </label>
        </li>
        
        <li id="email_send_choice" <?php if ($_SESSION['step_pp_20']['send_choice'] == "d" || (empty($_SESSION['step_pp_8']['email_data']) && empty($_SESSION['step_pp_14']['email_cv_data']))) { echo "style=\"display: none;\""; } ?> >
            <label>
                <span id="span_email_send_choice"></span> <?php echo $webgen_showhtml_choice_email[$language].":"; ?>
                <select name="send_email_choice" id="send_email_choice" onkeyup="email_choice(this, '<?php echo $email_pers; ?>', '<?php echo $email_cv; ?>', '<?php echo $webgen_showhtml_choice_email_valid[$language] ?>', '<?php echo $button[$language] ?>', '<?php echo $webgen_showhtml_button[$language] ?>', '<?php echo $webgen_showhtml_link_valid[$language] ?>', '<?php echo $webgen_showhtml_choice_email_c[$language] ?>')" onclick="email_choice(this, '<?php echo $email_pers; ?>', '<?php echo $email_cv; ?>', '<?php echo $webgen_showhtml_choice_email_valid[$language] ?>', '<?php echo $button[$language] ?>', '<?php echo $webgen_showhtml_button[$language] ?>', '<?php echo $webgen_showhtml_link_valid[$language] ?>', '<?php echo $webgen_showhtml_choice_email_c[$language] ?>')" >
                <?php
                    
                    if ($_SESSION['step_pp_8']['email_data']) {
                
                ?>
                    <option value="a"  <?php if ($_SESSION['step_pp_20']['send_email_choice'] == 'a') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_email_a[$language]." ".$_SESSION['step_pp_8']['email_data']; ?></option>
                    <?php
                        
                        }
                        if ($_SESSION['step_pp_14']['email_cv_data']) {
                    
                    ?>
                    <option value="b" <?php if ($_SESSION['step_pp_20']['send_email_choice'] == 'b') { echo "selected=\"selected\""; } ?> > <?php echo $webgen_showhtml_choice_email_b[$language]." ".$_SESSION['step_pp_14']['email_cv_data']; ?></option>
                    <?php
                        
                        }
                    
                    ?>
                    <option value="c" <?php if ($_SESSION['step_pp_20']['send_email_choice'] == 'c') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_email_c[$language]; ?></option>
                </select>
            </label>    
        </li>
        
        <li id="email_send" <?php if (((!empty($_SESSION['step_pp_8']['email_data']) || !empty($_SESSION['step_pp_14']['email_cv_data'])) && ($_SESSION['step_pp_20']['send_email_choice'] != "c")) || $_SESSION['step_pp_20']['send_choice'] == "d") { echo "style=\"display: none;\""; } ?> >
            <label>
                <span id="span_email"></span> <?php echo $webgen_contact_email[$language]; ?> 
                <input type="text" name="email_send_data" onkeyup="prompt_check(this, 'span_submit_button', '<?php echo $webgen_contact_email_empty[$language]; ?>', '<?php echo $webgen_contact_email_valid[$language]; ?>', '<?php echo $webgen_contact_email_invalid[$language]; ?>', '<?php echo $button[$language]." ".$webgen_showhtml_button[$language]; ?>', 'email')" <?php if (isset($_SESSION['step_pp_20']['email_send_data'])) { echo "value=\"".$_SESSION['step_pp_20']['email_send_data']."\""; } ?> />
            </label>
        </li>
    </ul>

    <div id="button_send">
        <label>
            <span id="span_submit_button"></span> <span id="span_submit_button_info"></span>
            <input id="submit_button" type="submit" value="<?php if ($_SESSION['step_pp_20']['send_choice'] == "d") { echo $webgen_send_to_button[$language]; } else { echo $webgen_showhtml_button[$language]; } ?>" />
        </label>
    </div>
</form>