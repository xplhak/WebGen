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

        // ********************** FOR ALL *************************************************
      
        $step_desc['czech'] = "Krok";
        $step_desc['english'] = "Step";
        $step_desc['deutsch'] = "";
        
        $submit_button['czech'] = "   Pokračovat   ";
        $submit_button['english'] = "   Continue   ";
        $submit_button['deutsch'] = "   Weiter   ";
        
        $submit_button_page['czech'] = "   Pokračovat na vygenerovanou stránku  ";
        $submit_button_page['english'] = "   Continue to the generated web page  ";
        $submit_button_page['deutsch'] = "   Weiter   ";
        
        $submit_button_info['czech'] = "Tlačítko pokračovat.";
        $submit_button_info['english'] = "Continue button.";
        $submit_button_info['deutsch'] = "Das weiter Klickfeld.";   

        $mand['czech'] = "(povinné)";
        $mand['english'] = "(mandatory)";
        $mand['deutsch'] = "";
        
        $button['czech'] = "Tlačítko";
        $button['english'] = "Button";
        $button['deutsch'] = "Klickfeld";          
        
        $pack['czech'] = "(rozbaleno)";
        $pack['english'] = "(unpack)";
        $pack['deutsch'] = "";

        $unpack['czech'] = "(nerozbaleno)";
        $unpack['english'] = "(pack)";
        $unpack['deutsch'] = "";

        $yes['czech'] = "ano";
        $yes['english'] = "yes";
        $yes['deutsch'] = "";
        
        $no['czech'] = "ne";
        $no['english'] = "no";
        $no['deutsch'] = "";

       // ************************ OPTIMALIZACE - opakující se výrazy ************************************
       
        $mandatory['czech'] = "Tento údaj je povinný.";  
        $mandatory['english'] = "This information is mandatory.";
        $mandatory['deutsch'] = "";
       
        $nonstandard['czech'] = "je v nestandardním formátu nebo obsahuje nestandardní znaky.";
        $nonstandard['english'] = "has been either entered in a non-standard form or contains illegal characters.";
        $nonstandard['deutsch'] = "";
        
        $nothing_he['czech'] = "nebyl zadán.";
        $nothing_he['english'] = "has not been entered."; 
        $nothing_he['deutsch'] = "";
    
        $nothing_she['czech'] = "nebyla zadána.";
        $nothing_she['english'] = "has not been entered.";   
        $nothing_she['deutsch'] = "";
         
        $nothing_it['czech'] = "nebylo zadáno.";
        $nothing_it['english'] = "has not been entered.";
        $nothing_it['deutsch'] = "";

        $nothing_they['czech'] = "nebyly zadány.";
        $nothing_they['english'] = "have not been entered.";
        $nothing_they['deutsch'] = "";
        
       // ********************************** Index *************************************************************
       
        $webgen_info['czech'] = "Generování webové stránky pomocí dialogu";
        $webgen_info['english'] = "Generation of the web page using a dialogue";
        $webgen_info['deutsch'] = "";
        
       // ********************************** WEBGEN STEP_ALL_1 *************************************************
        
 /*       $webgen_basic_info['czech'] = "Systém WebGen Vám umožní vytvářet vlastní webové stránky. Systém WebGen je postaven na principu zadávání dat do webových dotazníků. Mezi jednotlivými elementy v těchto dotaznících se můžete pohybovat pomocí klávesy TAB (pro pohyb vpřed) a kláves SHIFT + TAB (pro pohyb zpět). Pro každý dotazník je možné vyvolat nápovědu pomocí klávesové zkratky CTRL + Q. Nápověda se otevře jako webová stránka v novém okně. Pro zobrazení nápovědy je nutné povolit otevírání nových oken pro aktuální server.";
       $webgen_basic_info['english'] = "WebGen system allows you to create your own web pages. This system is build on the web form filling principle. You can navigate through the form using the TAB key (for going forward) and SHIFT + TAB combination (for going backward). You are allowed to call help web page for each web form using the CTRL + Q key combination. For the correct run of help pages, please allow the system to open new pages automatically.";
       $webgen_basic_info['deutsch'] = ""; 
 */
       
        $webgen_basic_info['czech'] = "Systém WebGen Vám umožní vytvářet vlastní webové stránky. Systém WebGen je postaven na principu zadávání dat do webových dotazníků. Mezi jednotlivými elementy v těchto dotaznících se můžete pohybovat pomocí klávesy TAB (pro pohyb vpřed) a kláves SHIFT + TAB (pro pohyb zpět).";
       $webgen_basic_info['english'] = "WebGen system allows you to create your own web pages. This system is build on the web form filling principle. You can navigate through the form using the TAB key (for going forward) and SHIFT + TAB combination (for going backward). ";
       $webgen_basic_info['deutsch'] = ""; 

         
       // ********************************** WEBGEN STEP_ALL_2 *************************************************

        $webgen_user_title['czech'] = "Informace o uživateli";
        $webgen_user_title['english'] = "The basic information about the user";
        $webgen_user_title['deutsch'] = "";
        
     /*   $webgen_user_title_info['czech'] = "V testovací verzi nezadáváte heslo. Heslo je nastaveno na stejnou hodnotu pro vsechny uživatele a nelze jej měnit.";
        $webgen_user_title_info['english'] = "In testing version you are not encouradged to enter the password. It is set to default value for all users.";
        $webgen_user_title_info['deutsch'] = "";        
    */

        $webgen_user_choice_info['czech'] = "Byla vybrána možnost";
        $webgen_user_choice_info['english'] = "You choose to";
        $webgen_user_choice_info['deutsch'] = "";

        $webgen_user_enrolment['czech'] = "Přihlásit se ke svému účtu.";
        $webgen_user_enrolment['english'] = "Enroll to your account.";
        $webgen_user_enrolment['deutsch'] = "";
        
        $webgen_user_enrolment_name['czech'] = "Zadejte Váš login (bez použití českých a speciálních znaků). ".$mandatory['czech'];
        $webgen_user_enrolment_name['english'] = "Enter your login.";
        $webgen_user_enrolment_name['deutsch'] = "";        

        $webgen_user_enrolment_name_empty['czech'] = "Vaše uživatelské jméno ".$nothing_it['czech'];
        $webgen_user_enrolment_name_empty['english'] = "Your user name ".$nothing_it['english'];
        $webgen_user_enrolment_name_empty['deutsch'] = "";

        $webgen_user_enrolment_name_short['czech'] = "Vaše uživatelské jméno je příliš krátké nebo obsahuje nepovolené znaky. Login musí být alespoň tři znaky dlouhý a použijte pro něj pouze písmena, číslice a znaky tečka, pomlčka a podrtřžítko.";
        $webgen_user_enrolment_name_short['english'] = "Your user name is too short or it contains disallowed characters. Enter at least three symbols long login using alphabetic characters, numbers and dot, dash or underscore symbol.";
        $webgen_user_enrolment_name_short['deutsch'] = "";
        
        $webgen_user_enrolment_name_valid['czech'] = "Váš login je";
        $webgen_user_enrolment_name_valid['english'] = "Your login is";
        $webgen_user_enrolment_name_valid['deutsch'] = "";
        
        $webgen_user_enrolment_name_invalid['czech'] = "Vaše uživatelské jméno ".$nonstandard['czech'];
        $webgen_user_enrolment_name_invalid['english'] = "The username ".$nonstandard['english'];
        $webgen_user_enrolment_name_invalid['deutsch'] = "";          
        
        $webgen_user_registration['czech'] = "Vytvořit nový účet.";
        $webgen_user_registration['english'] = "Create new account.";
        $webgen_user_registration['deutsch'] = "";
              
        $webgen_user_pass['czech'] = "Zadejte heslo.";
        $webgen_user_pass['english'] = "Enter the password.";
        $webgen_user_pass['deutsch'] = "";        

        $webgen_user_pass_rep['czech'] = "Zopakujte zadané heslo.";
        $webgen_user_pass_rep['english'] = "Repeat inserted password.";
        $webgen_user_pass_rep['deutsch'] = "";
        
        $webgen_user_pass_short['czech'] = "Zadané heslo musí mít délku alespoň tři znaky.";
        $webgen_user_pass_short['english'] = "Your password is too short. Please enter the password at least three characters long.";
        $webgen_user_pass_short['deutsch'] = "";        
        
        $webgen_user_enrolment_problem['czech'] = "Uživatel s tímto loginem dosud nebyl zaregistován. Prosím, vytvořte si účet.";
        $webgen_user_enrolment_problem['english'] = "User with this login has not been registered. Please create your account.  ";
        $webgen_user_enrolment_problem['deutsch'] = "";
        
        $webgen_user_registration_duplicate['czech'] = "Uživatel se stejným jménem již existuje. Prosím, zadejte jiný login.";
        $webgen_user_registration_duplicate['english'] = "This login is used by another user. Please enter different login.";
        $webgen_user_registration_duplicate['deutsch'] = "";
        
        $webgen_css_change['czech'] = "Změnit vybraný styl dialogů pro generování stránky.";
        $webgen_css_change['english'] = "Change the appearance of the dialogues.";
        $webgen_css_change['deutsch'] = "";         

        $webgen_css_choice['czech'] = "Vyberte si styl pro průchod dialogem.";
        $webgen_css_choice['english'] = "Choose the appearance of the dialogues.";
        $webgen_css_choice['deutsch'] = "";  

        $webgen_css_blind['czech'] = "Styl pro nevidomé.";
        $webgen_css_blind['english'] = "Style for blind.";
        $webgen_css_blind['deutsch'] = "";

        $webgen_css_classic['czech'] = "Klasický, barevný styl.";
        $webgen_css_classic['english'] = "Classical colorful style.";
        $webgen_css_classic['deutsch'] = "";
        
        $webgen_css_weak['czech'] = "Styl pro slabozraké.";
        $webgen_css_weak['english'] = "Style for weak-sighted.";
        $webgen_css_weak['deutsch'] = "";
        
        $webgen_user_enrolment_bad_login_or_pass['czech']  = "Špatné přihlašovací jméno nebo heslo.";
        $webgen_user_enrolment_bad_login_or_pass['english']  = "Bad login or password.";
        $webgen_user_enrolment_bad_login_or_pass['english']  = "";
        
        $webgen_user_registration_pass_not_match_rep['czech'] = 'Heslo a zopakované heslo musí být stejné.';
        $webgen_user_registration_pass_not_match_rep['english'] = "Password and repeated password must be same.";
        $webgen_user_registration_pass_not_match_rep['deutsch'] = "";

        // ********************************** WEBGEN STEP_all_3 *************************************************

        $webgen_action_title['czech'] = "Výběr akce";
        $webgen_action_title['english'] = "Select the action";
        $webgen_action_title['deutsch'] = "";        
        
        $webgen_action_h1['czech'] = "Vyberte jednu z nabídnutých akcí";
        $webgen_action_h1['english'] = "Select one of the following actions";
        $webgen_action_h1['deutsch'] = "";

        $webgen_action_edit['czech'] = "Editovat existující prezentaci. (Ve vývoji)";
        $webgen_action_edit['english'] = "Edit the existing presentation. (In development phase)";
        $webgen_action_edit['deutsch'] = "";

        $webgen_action_new['czech'] = "Vytvořit novou prezentaci.";
        $webgen_action_new['english'] = "Create new presentation.";
        $webgen_action_new['deutsch'] = "";

        $webgen_action_delete['czech'] = "Vymazat existující prezentaci.";
        $webgen_action_delete['english'] = "Delete the existing presentation.";
        $webgen_action_delete['deutsch'] = "";

        $webgen_action_presentation_name_label['czech'] = "Zadejte název prezentace, kterou chcete vytvořit. ".$mandatory['czech'];
        $webgen_action_presentation_name_label['english'] = "Enter the name of your presentation. ".$mandatory['english'];
        $webgen_action_presentation_name_label['deutsch'] = "";  
        
        $webgen_action_presentation_name_empty['czech'] = "Název prezentace ".$nothing_he['czech'];
        $webgen_action_presentation_name_empty['english'] = "Presentation name ".$nothing_he['english'];
        $webgen_action_presentation_name_empty['deutsch'] = "";
        
        $webgen_action_presentation_name_short['czech'] = "Název prezentace je příliš krátký nebo obsahuje nepovolené znaky. Název musí být alespoň tři znaky dlouhý a použijte pro něj pouze písmena, číslice a znaky tečka, pomlčka nebo potržítko.";
        $webgen_action_presentation_name_short['english'] = "Your presentation name is too short or it contains disallowed characters. Enter at least three symbols long login using alphabetic characters, numbers and dot, dash or underscore symbol.";
        $webgen_action_presentation_name_short['deutsch'] = "";       
        
        $webgen_action_presentation_name_valid['czech'] = "Název prezentace je";
        $webgen_action_presentation_name_valid['english'] = "Presentation name is";
        $webgen_action_presentation_name_valid['deutsch'] = "";
        
        $webgen_action_presentation_name_invalid['czech'] = "Název prezentace ".$nonstandard['czech'];     
        $webgen_action_presentation_name_invalid['english'] = "The name of the presentation ".$nonstandard['english'];
        $webgen_action_presentation_name_invalid['deutsch'] = "";
        
        $webgen_action_action_name_duplicate['czech'] = "Prezentace se stejným názvem již byla vytvořena. ";
        $webgen_action_action_name_duplicate['english'] = "The presentation of the same name has been already created. ";
        $webgen_action_action_name_duplicate['deutsch'] = "";
        
        $webgen_action_edit_info['czech'] = "Byla vybrána možnost editovat prezentaci s názvem";
        $webgen_action_edit_info['english'] = "You choose: edit the presentation named ";
        $webgen_action_edit_info['deutsch'] = "";
        
        $webgen_action_delete_info['czech'] = "Byla vybrana možnost smazat prezentaci s názvem";
        $webgen_action_delete_info['english'] = "You choose: delete the presentation named ";
        $webgen_action_delete_info['deutsch'] = "";      
        
        $webgen_action_presentation_edit_error['czech'] = "Nebyla vybrána prezentace, která má být editována.";
        $webgen_action_presentation_edit_error['english'] = "The presentation name have not been selected.";
        $webgen_action_presentation_edit_error['deutsch'] = ""; 
        
        $webgen_action_presentation_delete_error['czech'] = "Nebyla vybrána prezentace, která má být smazána.";
        $webgen_action_presentation_delete_error['english'] = "The presentation name have not been selected.";
        $webgen_action_presentation_delete_error['deutsch'] = "";   

        // ********************************** WEBGEN STEP_ALL_4  *************************************************

        $webgen_presentation_type_choice_title['czech'] = "Výběr typu prezentace";
        $webgen_presentation_type_choice_title['english'] = "Presentation type";
        $webgen_presentation_type_choice_title['deutsch'] = "";
        
        $webgen_presentation_type_choice_h1['czech'] = "Vyberte typ vytvářené prezentace";
        $webgen_presentation_type_choice_h1['english'] = "Select the type of presentation";
        $webgen_presentation_type_choice_h1['deutsch'] = "";        

        $webgen_presentation_type_choice_pp['czech'] = "Osobní stránky";
        $webgen_presentation_type_choice_pp['english'] = "Personal Pages";
        $webgen_presentation_type_choice_pp['deutsch'] = "";

        $webgen_presentation_type_choice_blog['czech'] = "Blog";
        $webgen_presentation_type_choice_blog['english'] = "Blog";
        $webgen_presentation_type_choice_blog['deutsch'] = "";

        $webgen_presentation_type_choice_gall['czech'] = "Fotogalerie";
        $webgen_presentation_type_choice_gall['english'] = "Photogallery";
        $webgen_presentation_type_choice_gall['deutsch'] = "";

        $webgen_presentation_type_choice_gall2['czech'] = "Fotogalerii";
        $webgen_presentation_type_choice_gall2['english'] = "Photogallery";
        $webgen_presentation_type_choice_gall2['deutsch'] = "";        
        
        $webgen_presentation_type_choice_info['czech'] = "Budete vytvářet ";
        $webgen_presentation_type_choice_info['english'] = "You will generate ";
        $webgen_presentation_type_choice_info['deutsch'] = "";
        
        // ******************************** WebGen_step_delete_4 ************************************************
        
        $webgen_delete_title['czech'] = "Odstranění prezentace";
        $webgen_delete_title['english'] = "Deletion of existing presentation.";
        $webgen_delete_title['deutsch'] = "";        
        
        $webgen_delete_info['czech'] = "Prezentace";
        $webgen_delete_info['english'] = "Presentation";
        $webgen_delete_info['deutsch'] = "";          
        
        $webgen_delete_info2['czech'] = "byla odstraněna ze serveru.";
        $webgen_delete_info2['english'] = "was deleted from the server.";
        $webgen_delete_info2['deutsch'] = "";
        
        $webgen_delete_error['czech'] = "Nastal problém s mazáním prezentace. Pravděpodobně již byla smazána.";
        $webgen_delete_error['english'] = "The deletion of your presentation has failed. Probably it has been already deleted.";
        $webgen_delete_error['deutsch'] = "";        
        
        $webgen_delete_button['czech'] = "Návrat zpět na výběr akce.";
        $webgen_delete_button['english'] = "Back to action selection.";
        $webgen_delete_button['deutsch'] = "";
 
        // ********************************** WEBGEN_step_pp_5  *************************************************
        
        $webgen_choice_title['czech'] = "Určení dat, která budou získávána";
        $webgen_choice_title['english'] = "Types of data that will be acquired";
        $webgen_choice_title['deutsch'] = "";
        
        $webgen_choice_h2['czech'] = "Prosím, označte informace, které chcete vložit do své prezentace.";
        $webgen_choice_h2['english'] = "Please select the information you would like to enter into the presentation.";
        $webgen_choice_h2['deutsch'] = "";
                
        $webgen_choice_degree['czech'] = "Akademický titul";
        $webgen_choice_degree['english'] = "Academic degree";
        $webgen_choice_degree['deutsch'] = "";
        
        $webgen_choice_photo['czech'] = "Fotografie";
        $webgen_choice_photo['english'] = "Personal photo";
        $webgen_choice_photo['deutsch'] = "";
        
        $webgen_choice_photo_file_a['czech'] = "Fotografie ze souboru na vlastním počítači";
        $webgen_choice_photo_file_a['english'] = "Photo from your computer";
        $webgen_choice_photo_file_a['deutsch'] = "";
        
        $webgen_choice_photo_file_b['czech'] = "Fotografie z internetu";
        $webgen_choice_photo_file_b['english'] = "Web photo";
        $webgen_choice_photo_file_b['deutsch'] = "";
        
        $webgen_choice_contact['czech'] = "Kontaktní informace";
        $webgen_choice_contact['english'] = "Contact info";
        $webgen_choice_contact['deutsch'] = "";
        
        $webgen_choice_contact_email['czech'] = "Email";
        $webgen_choice_contact_email['english'] = "E-mail";
        $webgen_choice_contact_email['deutsch'] = "";
        
        $webgen_choice_contact_address['czech'] = "Adresa";
        $webgen_choice_contact_address['english'] = "Home address";
        $webgen_choice_contact_address['deutsch'] = "";
        
        $webgen_choice_contact_cellular['czech'] = "Mobilní telefon";
        $webgen_choice_contact_cellular['english'] = "Cell phone";
        $webgen_choice_contact_cellular['deutsch'] = "";
        
        $webgen_choice_contact_phone['czech'] = "Pevná linka";
        $webgen_choice_contact_phone['english'] = "Home phone";
        $webgen_choice_contact_phone['deutsch'] = "";
        
        $webgen_choice_contact_fax['czech'] = "Fax";
        $webgen_choice_contact_fax['english'] = "Fax";
        $webgen_choice_contact_fax['deutsch'] = "";
        
        $webgen_choice_contact_icq['czech'] = "ICQ";
        $webgen_choice_contact_icq['english'] = "ICQ number";
        $webgen_choice_contact_icq['deutsch'] = "";
        
        $webgen_choice_contact_skype['czech'] = "Skype";
        $webgen_choice_contact_skype['english'] = "Skype login";
        $webgen_choice_contact_skype['deutsch'] = "";
        
        $webgen_choice_contact_otherprotocols['czech'] = "Ostatní komunikační protokoly";
        $webgen_choice_contact_otherprotocols['english'] = "Other communication protocols";
        $webgen_choice_contact_otherprotocols['deutsch'] = "";
        
        $webgen_choice_university['czech'] = "Informace o studiu, doktorském studiu nebo vědecké práci na škole nebo univerzitě";
        $webgen_choice_university['english'] = "Information about your studies";
        $webgen_choice_university['deutsch'] = "";
        
        $webgen_choice_university_university['czech'] = "Univerzita";
        $webgen_choice_university_university['english'] = "University";
        $webgen_choice_university_university['deutsch'] = "";
        
        $webgen_choice_university_faculty['czech'] = "Fakulta";
        $webgen_choice_university_faculty['english'] = "Faculty";
        $webgen_choice_university_faculty['deutsch'] = "";
        
        $webgen_choice_university_specialization['czech'] = "Obor";
        $webgen_choice_university_specialization['english'] = "Field of study";
        $webgen_choice_university_specialization['deutsch'] = "";
        
        $webgen_choice_university_year['czech'] = "Ročník";
        $webgen_choice_university_year['english'] = "Year of study";
        $webgen_choice_university_year['deutsch'] = "";
        
        $webgen_choice_university_schooladdress['czech'] = "Adresa školy";
        $webgen_choice_university_schooladdress['english'] = "University address";
        $webgen_choice_university_schooladdress['deutsch'] = "";
        
        $webgen_choice_university_project['czech'] = "Projekty";
        $webgen_choice_university_project['english'] = "Projects";
        $webgen_choice_university_project['deutsch'] = "";
        
        $webgen_choice_university_schoolpages['czech'] = "Webové stránky univerzity";
        $webgen_choice_university_schoolpages['english'] = "University web page";
        $webgen_choice_university_schoolpages['deutsch'] = "";
        
        $webgen_choice_university_facultypages['czech'] = "Webové stránky fakulty";
        $webgen_choice_university_facultypages['english'] = "Faculty web page";
        $webgen_choice_university_facultypages['deutsch'] = "";
        
        $webgen_choice_university_projectpages['czech'] = "Webové stránky projektů";
        $webgen_choice_university_projectpages['english'] = "Project web page";
        $webgen_choice_university_projectpages['deutsch'] = "";
        
        $webgen_choice_university_department['czech'] = "Katedra";
        $webgen_choice_university_department['english'] = "Department";
        $webgen_choice_university_department['deutsch'] = "";
        
        $webgen_choice_university_position['czech'] = "Pozice";
        $webgen_choice_university_position['english'] = "Job position";
        $webgen_choice_university_position['deutsch'] = "";
        
        $webgen_choice_university_office['czech'] = "Kancelář";
        $webgen_choice_university_office['english'] = "Office";
        $webgen_choice_university_office['deutsch'] = "";
        
        $webgen_choice_university_hour['czech'] = "Konzultační hodiny";
        $webgen_choice_university_hour['english'] = "Office hours";
        $webgen_choice_university_hour['deutsch'] = "";
        
        $webgen_choice_university_departmentphone['czech'] = "Pracovní telefon";
        $webgen_choice_university_departmentphone['english'] = "Office phone number";
        $webgen_choice_university_departmentphone['deutsch'] = "";

        $webgen_choice_firm['czech'] = "Informace o zaměstnání";
        $webgen_choice_firm['english'] = "Information about your career";
        $webgen_choice_firm['deutsch'] = "";
     
        $webgen_choice_firm_firmname['czech'] = "Název firmy";
        $webgen_choice_firm_firmname['english'] = "Firm name";
        $webgen_choice_firm_firmname['deutsch'] = "";
        
        $webgen_choice_firm_ic['czech'] = "Identifikační číslo";
        $webgen_choice_firm_ic['english'] = "ID";
        $webgen_choice_firm_ic['deutsch'] = "";
        
        $webgen_choice_firm_direction['czech'] = "Oblast podnikání firmy";
        $webgen_choice_firm_direction['english'] = "Sphere of business";
        $webgen_choice_firm_direction['deutsch'] = "";
        
        $webgen_choice_firm_workload['czech'] = "Pracovní náplň";
        $webgen_choice_firm_workload['english'] = "Workload";
        $webgen_choice_firm_workload['deutsch'] = "";
        
        $webgen_choice_firm_position['czech'] = "Dosažená pozice";
        $webgen_choice_firm_position['english'] = "Job position";
        $webgen_choice_firm_position['deutsch'] = "";

        $webgen_choice_firm_address['czech'] = "Adresa pracoviště";
        $webgen_choice_firm_address['english'] = "Address";
        $webgen_choice_firm_address['deutsch'] = "";
        
        $webgen_choice_firm_www['czech'] = "Webové stránky";
        $webgen_choice_firm_www['english'] = "Web pages";
        $webgen_choice_firm_www['deutsch'] = ""; 
        
        $webgen_choice_firm_add['czech'] = "Doplňující informace";
        $webgen_choice_firm_add['english'] = "Additional information";
        $webgen_choice_firm_add['deutsch'] = ""; 

        $webgen_choice_hobby['czech'] = "Zájmy, koníčky";
        $webgen_choice_hobby['english'] = "Hobbies and interests";
        $webgen_choice_hobby['deutsch'] = "";
        
        $webgen_choice_knowledge['czech'] = "Znalosti, dovednosti";
        $webgen_choice_knowledge['english'] = "Knowledges and skills";
        $webgen_choice_knowledge['deutsch'] = "";
        
        $webgen_choice_birthdate['czech'] = "Datum a místo narození";
        $webgen_choice_birthdate['english'] = "Birthdate and place";
        $webgen_choice_birthdate['deutsch'] = "";
        
        $webgen_choice_cv['czech'] = "Strukturovaný životopis";
        $webgen_choice_cv['english'] = "Curriculum vitae";
        $webgen_choice_cv['deutsch'] = "";
        
        $webgen_choice_cv_nationality['czech'] = "Národnost";
        $webgen_choice_cv_nationality['english'] = "Nationality";
        $webgen_choice_cv_nationality['deutsch'] = "";
        
        $webgen_choice_cv_family['czech'] = "Rodinný stav";
        $webgen_choice_cv_family['english'] = "Marital status";
        $webgen_choice_cv_family['deutsch'] = "";
        
        $webgen_choice_cv_school['czech'] = "Vzdělání a kurzy";
        $webgen_choice_cv_school['english'] = "Education and courses";
        $webgen_choice_cv_school['deutsch'] = "";
          
        $webgen_choice_cv_work['czech'] = "Pracovní zkušenosti";
        $webgen_choice_cv_work['english'] = "Career";
        $webgen_choice_cv_work['deutsch'] = "";

        $webgen_choice_cv_driver['czech'] = "Řidičský průkaz";
        $webgen_choice_cv_driver['english'] = "Driver licence";
        $webgen_choice_cv_driver['deutsch'] = "";
        
        $webgen_choice_cv_knowledge['czech'] = "Osobní schopnosti a dovednosti";
        $webgen_choice_cv_knowledge['english'] = "Skills";
        $webgen_choice_cv_knowledge['deutsch'] = ""; 
        
        $webgen_choice_cv_publication['czech'] = "Publikace";
        $webgen_choice_cv_publication['english'] = "List of publications";
        $webgen_choice_cv_publication['deutsch'] = "";
        
        $webgen_choice_cv_product['czech'] = "Výrobky, vlastní produkty";
        $webgen_choice_cv_product['english'] = "Products";
        $webgen_choice_cv_product['deutsch'] = "";
        
        $webgen_choice_cv_prize['czech'] = "Ocenění";
        $webgen_choice_cv_prize['english'] = "Awards";
        $webgen_choice_cv_prize['deutsch'] = "";
        
        $webgen_choice_cv_other['czech'] = "Doplňující informace";
        $webgen_choice_cv_other['english'] = "Other information";
        $webgen_choice_cv_other['deutsch'] = "";
                 
        $webgen_choice_textfield['czech'] = "Volný text s možností vložit ilustrativní fotografii";
        $webgen_choice_textfield['english'] = "Other unsorted information including images and multimedia.";
        $webgen_choice_textfield['deutsch'] = "";        
        
/*        $webgen_choice_textfield['czech'] = "Volný text";
        $webgen_choice_textfield['english'] = "Other unsorted text information.";
        $webgen_choice_textfield['deutsch'] = "";
*/        
        
        $webgen_choice_links['czech'] = "Odkazy";
        $webgen_choice_links['english'] = "Links";
        $webgen_choice_links['deutsch'] = "";
        
        $webgen_choice_links_undef['czech'] = "Vlastní odkazy";
        $webgen_choice_links_undef['english'] = "Other links";
        $webgen_choice_links_undef['deutsch'] = "";
        
        $webgen_choice_links_def['czech'] = "Předdefinované odkazy";
        $webgen_choice_links_def['english'] = "Defined links";
        $webgen_choice_links_def['deutsch'] = "";
        
        $webgen_choice_features['czech'] = "Jednoduché aplikace (např. hodiny, kalendář apod.) (ve vývoji)";
        $webgen_choice_features['english'] = "Applications (clock, calendar, etc.) (in development phase)";
        $webgen_choice_features['deutsch'] = "";

        $webgen_choice_features_favphoto['czech'] = "Fotografie nebo obrázek, o které bude možné zjisťovat informace pomocí dialogu";
        $webgen_choice_features_favphoto['english'] = "Photo prepared for exploration using the dialogue and sonification";
        $webgen_choice_features_favphoto['deutsch'] = "";
        
        $webgen_choice_features_contacticon['czech'] = "Ikonky u kontaktních informací";
        $webgen_choice_features_contacticon['english'] = "Contact icons";
        $webgen_choice_features_contacticon['deutsch'] = "";
             
        $webgen_choice_features_calendar['czech'] = "Kalendář";
        $webgen_choice_features_calendar['english'] = "Calendar";
        $webgen_choice_features_calendar['deutsch'] = "";
        
        $webgen_choice_features_hour['czech'] = "Hodiny";
        $webgen_choice_features_hour['english'] = "Clocks";
        $webgen_choice_features_hour['deutsch'] = "";
        
        $webgen_choice_features_weather['czech'] = "Ukazatel počasí";
        $webgen_choice_features_weather['english'] = "Weather";
        $webgen_choice_features_weather['deutsch'] = "";
        
        $webgen_choice_features_counter['czech'] = "Počítadlo přístupů";
        $webgen_choice_features_counter['english'] = "Page access counter";
        $webgen_choice_features_counter['deutsch'] = "";
        
        $webgen_choice_features_quest['czech'] = "Anketa";
        $webgen_choice_features_quest['english'] = "Questionnaire";
        $webgen_choice_features_quest['deutsch'] = "";
        
        $webgen_choice_features_email['czech'] = "Formulář pro odesílání emailů na Vaši adresu";
        $webgen_choice_features_email['english'] = "Send me an e-mail form";
        $webgen_choice_features_email['deutsch'] = "";
        
        $webgen_choice_features_addresser['czech'] = "Adresář kontaktních informací dalších uživatelů, kteří si vytvořili osobní stránku pomocí WebGenu";
        $webgen_choice_features_addresser['english'] = "Other WebGen users contact list";
        $webgen_choice_features_addresser['deutsch'] = "";
        
        $webgen_choice_features_discus['czech'] = "Kniha návštěv - bude uložena na samostatné stránce v prezentaci";
        $webgen_choice_features_discus['english'] = "Visitor\'s book";
        $webgen_choice_features_discus['deutsch'] = "";

     // ********************************** WEBGEN_step_pp_6 *************************************************
     
        $webgen_name_title['czech'] = "Zadání jména uživatele"; 
        $webgen_name_title['english'] = "User name";
        $webgen_name_title['deutsch'] = "";
    
        $webgen_name_degree_front['czech'] = "Zadejte Váš akademický titul patřící před jméno.";
        $webgen_name_degree_front['english'] = "Enter your academic degree in front of your name.";
        $webgen_name_degree_front['deutsch'] = "";
        
        $webgen_name_empty_title['czech'] = "Titul ".$nothing_he['czech'];
        $webgen_name_empty_title['english'] = "Academic degree ".$nothing_he['english'];
        $webgen_name_empty_title['deutsch'] = "";
   
        $webgen_name_valid_title['czech'] = "Máte titul";
        $webgen_name_valid_title['english'] = "Your degree is";
        $webgen_name_valid_title['deutsch'] = "";
        
        $webgen_name_invalid_title['czech'] = "Zadaný titul není znám nebo obsahuje nestandardní znaky.";
        $webgen_name_invalid_title['english'] = "Incorrect academic degree or it contains invalid characters.";
        $webgen_name_invalid_title['deutsch'] = "";
        
        $webgen_name_name['czech'] = "Zadejte Vaše jméno a příjmení. ".$mandatory['czech'];
        $webgen_name_name['english'] = "Enter your name and surname. ".$mandatory['english'];
        $webgen_name_name['deutsch'] = "";

        $webgen_name_short_name['czech'] = "Jméno a příjmení musí začínat písmenem.";
        $webgen_name_short_name['english'] = "Please enter the name starting with the letter of the alphabet.";
        $webgen_name_short_name['deutsch'] = "";

        $webgen_name_empty_name['czech'] = "Vaše jméno a příjmení ".$nothing_it['czech'];
        $webgen_name_empty_name['english'] = "Your full name ".$nothing_it['english'];
        $webgen_name_empty_name['deutsch'] = "";
        
        $webgen_name_valid_name['czech'] = "Jmenujete se";
        $webgen_name_valid_name['english'] = "Your name is";
        $webgen_name_valid_name['deutsch'] = "";
     
        $webgen_name_invalid_name['czech'] = "Zadané jméno ".$nonstandard['czech'];
        $webgen_name_invalid_name['english'] = "Your name ".$nonstandard['english'];
        $webgen_name_invalid_name['deutsch'] = "";        
        
        $webgen_name_degree_back['czech'] = "Doplňte akademický titul patřící za jméno.";
        $webgen_name_degree_back['english'] = "Enter your academic degree behind the name.";
        $webgen_name_degree_back['deutsch'] = "";   

        // ********************************** WEBGEN_step_pp_7 *************************************************
    
        $webgen_photo_title['czech'] = "Vložení fotografie"; 
        $webgen_photo_title['english'] = "Your photo";
        $webgen_photo_title['deutsch'] = "";
                  
        $webgen_photo_h2_empty['czech'] = "Nebyl zadán žádný soubor nebo nahrávaný soubor není ve správném formátu. Je nutné vložit obrázek ve formátu gif, jpeg nebo svg.";
        $webgen_photo_h2_empty['english'] = "The file name is missing or the picture is in unsupported format. Supported formats are jpeg, gif and svg.";
        $webgen_photo_h2_empty['deutsch'] = "";
        
        $webgen_photo_h2_big['czech'] = "Nahrávaný soubor je příliš velký. Je nutné vložit obrázek do velikosti 500 kB.";
        $webgen_photo_h2_big['english'] = "Picture is too big. Maximum picture size is 500 kB.";
        $webgen_photo_h2_big['deutsch'] = "";
        
        $webgen_photo_h2_alt['czech'] = "Je nutné zadat alternativní popis fotografie.";
        $webgen_photo_h2_alt['english'] = "Alternative description is required.";
        $webgen_photo_h2_alt['deutsch'] = "";
        
        $webgen_photo_h2_unknown['czech'] = "Nastal neznámý problém s nahráním souboru. Prosím, pokuste se jej nahrát ještě jednou.";
        $webgen_photo_h2_unknown['english'] = "Uknown error. Please try to upload the picture again.";
        $webgen_photo_h2_unknown['deutsch'] = "";
        
        $webgen_photo_h2_src['czech'] = "Zadání adresy obrázku je povinné. Prosím, zadejte ji.";
        $webgen_photo_h2_src['english'] = "Picture address is missing. Please fill it in.";
        $webgen_photo_h2_src['deutsch'] = "";
 
        $webgen_photo_photo_alt['czech'] = "Vložte popis obrázku. ".$mandatory['czech'];
        $webgen_photo_photo_alt['english'] = "Enter the description of the picture. ".$mandatory['english'];
        $webgen_photo_photo_alt['deutsch'] = "";
        
        $webgen_photo_photo_src['czech'] = "Nyní zadejte internetovou adresu (URL) obrázku. ".$mandatory['czech'];
        $webgen_photo_photo_src['english'] = "Enter image address (URL). ".$mandatory['english'];
        $webgen_photo_photo_src['deutsch'] = "";
        
        $webgen_photo_photo_file['czech'] = "Nyní vyberte soubor.";
        $webgen_photo_photo_file['english'] = "Select a file";
        $webgen_photo_photo_file['deutsch'] = "";
        
        $webgen_photo_photo_file_upinfo['czech'] = "Nahrávání tohoto souboru může trvat i několik desítek sekund.";
        $webgen_photo_photo_file_upinfo['english'] = "File uploading can take one or more minute.";
        $webgen_photo_photo_file_upinfo['deutsch'] = "";        

        $webgen_photo_empty_alt['czech'] = "Popis obrázku nebyl zadán.";
        $webgen_photo_empty_alt['english'] = "The alternative description has not been specified.";
        $webgen_photo_empty_alt['deutsch'] = "";
        
        $webgen_photo_valid_alt['czech'] = "Popis obrázku je";
        $webgen_photo_valid_alt['english'] = "Image description is";
        $webgen_photo_valid_alt['deutsch'] = "";
 
        $webgen_photo_invalid_alt['czech'] = "Alternativní popis ".$nonstandard['czech'];
        $webgen_photo_invalid_alt['english'] = "The picture alternative description ".$nonstandard['english'];
        $webgen_photo_invalid_alt['deutsch'] = "";
     
        $webgen_photo_empty_src['czech'] = "Internetová adresa obrázku ".$nothing_she['czech'];
        $webgen_photo_empty_src['english'] = "Photo web address ".$nothing_she['english'];
        $webgen_photo_empty_src['deutsch'] = "";
        
        $webgen_photo_valid_src['czech'] = "Webová adresa obrázku je";
        $webgen_photo_valid_src['english'] = "Image URL is";
        $webgen_photo_valid_src['deutsch'] = "";
        
        $webgen_photo_invalid_src['czech'] = "Internetový odkaz ".$nonstandard['czech'];
        $webgen_photo_invalid_src['english'] = "Link ".$nonstandard['english'];
        $webgen_photo_invalid_src['deutsch'] = "";
        
   // **************** WEBGEN CONTACT *************************************************   
    
        $webgen_contact_title['czech'] = "Zadání kontaktních informací";
        $webgen_contact_title['english'] = "Contact information";
        $webgen_contact_title['deutsch'] = "";
        
        $webgen_contact_email['czech'] = "Zadejte Váš email.";
        $webgen_contact_email['english'] = "Enter your e-mail";
        $webgen_contact_email['deutsch'] = "";
        
        $webgen_contact_email_empty['czech'] = "Email ".$nothing_he['czech'];
        $webgen_contact_email_empty['english'] = "Your e-mail ".$nothing_he['english'];
        $webgen_contact_email_empty['deutsch'] = "";
        
        $webgen_contact_email_valid['czech'] = "Email je";
        $webgen_contact_email_valid['english'] = "E-mail is";
        $webgen_contact_email_valid['deutsch'] = "";
        
        $webgen_contact_email_invalid['czech'] = "Zadaný email není ve správném formátu.";
        $webgen_contact_email_invalid['english'] = "Invalid e-mail.";
        $webgen_contact_email_invalid['deutsch'] = "";
        
                // ************************** ADRESA - použita i níže ****************************************
        
        $nothing_address['czech'] = "Adresa nebude vložena do prezentace";
        $nothing_address['english'] = "has not been entered.";
        $nothing_address['deutsch'] = "";
        
        $webgen_street['czech'] = "Nyní budete po částech zadávat adresu. Nejprve zadejte název ulice.";
        $webgen_street['english'] = "Now, you should enter your address step-by-step. Enter the name of the street.";
        $webgen_street['deutsch'] = "";
        
        $webgen_street_empty['czech'] = "Název ulice není zadán. ";
        $webgen_street_empty['english'] = "Name of the street ".$nothing_address['english'];
        $webgen_street_empty['deutsch'] = "";
        
        $webgen_street_valid['czech'] = "Název ulice je";
        $webgen_street_valid['english'] = "Name of the street is";
        $webgen_street_valid['deutsch'] = "";
        
        $webgen_street_invalid['czech'] = "Název ulice ".$nonstandard['czech'];    
        $webgen_street_invalid['english'] = "The street name ".$nonstandard['english'];
        $webgen_street_invalid['deutsch'] = "";
        
        $webgen_housenumber['czech'] = "Zadejte číslo orientační nebo popisné.";
        $webgen_housenumber['english'] = "Enter the house number";
        $webgen_housenumber['deutsch'] = "";
        
        $webgen_housenumber_empty['czech'] = "Číslo domu nebylo zadáno.";
        $webgen_housenumber_empty['english'] = "House number ".$nothing_address['english'];
        $webgen_housenumber_empty['deutsch'] = "";
        
        $webgen_housenumber_valid['czech'] = "Číslo domu je";
        $webgen_housenumber_valid['english'] = "House number is";
        $webgen_housenumber_valid['deutsch'] = "";
        
        $webgen_housenumber_invalid['czech'] = "Číslo domu ".$nonstandard['czech'];    
        $webgen_housenumber_invalid['english'] = "The house number ".$nonstandard['english'];
        $webgen_housenumber_invalid['deutsch'] = "";
        
        $webgen_city['czech'] = "Zadejte obec.";
        $webgen_city['english'] = "Enter the city.";
        $webgen_city['deutsch'] = "";
        
        $webgen_city_empty['czech'] = "Název obce nebyl zadán.";
        $webgen_city_empty['english'] = "Name of the city ".$nothing_address['english'];
        $webgen_city_empty['deutsch'] = "";
        
        $webgen_city_valid['czech'] = "Byla zadána obec";
        $webgen_city_valid['english'] = "Your city is";
        $webgen_city_valid['deutsch'] = "";
        
        $webgen_city_invalid['czech'] = "Název obce ".$nonstandard['czech'];
        $webgen_city_invalid['english'] = "City ".$nonstandard['english'];
        $webgen_city_invalid['deutsch'] = "";
        
        $webgen_postcode['czech'] = "Zadejte poštovní směrovací číslo. ".$mandatory['czech'];
        $webgen_postcode['english'] = "Enter the post code. ".$mandatory['english'];
        $webgen_postcode['deutsch'] = "";
        
        $webgen_postcode_empty['czech'] = "Poštovní směrovací číslo nebylo zadáno. ".$nothing_address['czech'];
        $webgen_postcode_empty['english'] = "Post code ".$nothing_address['english'];
        $webgen_postcode_empty['deutsch'] = "";
        
        $webgen_postcode_valid['czech'] = "Poštovní směrovací číslo je";
        $webgen_postcode_valid['english'] = "Post code is";
        $webgen_postcode_valid['deutsch'] = "";
    
        $webgen_postcode_invalid['czech'] = "Poštovní směrovací ".$nonstandard['czech'];
        $webgen_postcode_invalid['english'] = "Post code ".$nonstandard['english'];
        $webgen_postcode_invalid['deutsch'] = "";
        
        $webgen_state['czech'] = "Zadejte stát.";
        $webgen_state['english'] = "Enter the country.";
        $webgen_state['deutsch'] = "";
        
        $webgen_state_empty['czech'] = "Stát nebyl zadán.";
        $webgen_state_empty['english'] = "The country has not been filled.";
        $webgen_state_empty['deutsch'] = "";
        
        $webgen_state_valid['czech'] = "Stát je";
        $webgen_state_valid['english'] = "The country is";
        $webgen_state_valid['deutsch'] = "";
        
        $webgen_state_invalid['czech'] = "Pojmenování státu ".$nonstandard['czech'];
        $webgen_state_invalid['english'] = "State ".$nonstandard['english'];
        $webgen_state_invalid['deutsch'] = "";
        
        
        
        
        // ****************************** KONEC ADRESY *************************************************
        
        $webgen_contact_cellular['czech'] = "Zadejte Váš mobilní telefon.";
        $webgen_contact_cellular['english'] = "Enter your mobile phone";
        $webgen_contact_cellular['deutsch'] = "";
        
        $webgen_contact_cellular_empty['czech'] = "Vaše číslo na mobilní telefon ".$nothing_he['czech'];
        $webgen_contact_cellular_empty['english'] = "Your mobile ".$nothing_he['english'];
        $webgen_contact_cellular_empty['deutsch'] = "";
        
        $webgen_contact_cellular_valid['czech'] = "Číslo na mobilní telefon je";
        $webgen_contact_cellular_valid['english'] = "Your mobile phone is";
        $webgen_contact_cellular_valid['deutsch'] = "";
        
        $webgen_contact_cellular_invalid['czech'] = "Číslo na mobilní telefon ".$nonstandard['czech'];
        $webgen_contact_cellular_invalid['english'] = "Mobile phone number ".$nonstandard['english'];
        $webgen_contact_cellular_invalid['deutsch'] = "";
        
        $webgen_contact_phone['czech'] = "Zadejte Vaši pevnou linku.";
        $webgen_contact_phone['english'] = "Enter your phone";
        $webgen_contact_phone['deutsch'] = "";
        
        $webgen_contact_phone_empty['czech'] = "Vaše číslo na pevnou linku ".$nothing_it['czech'];
        $webgen_contact_phone_empty['english'] = "Your phone ".$nothing_it['english'];
        $webgen_contact_phone_empty['deutsch'] = "";
        
        $webgen_contact_phone_valid['czech'] = "Číslo na pevnou linku je";
        $webgen_contact_phone_valid['english'] = "Phone number is";
        $webgen_contact_phone_valid['deutsch'] = "";
        
        $webgen_contact_phone_invalid['czech'] = "Číslo na pevnou linku ".$nonstandard['czech'];
        $webgen_contact_phone_invalid['english'] = "Phone number ".$nonstandard['english'];
        $webgen_contact_phone_invalid['deutsch'] = "";
        
        $webgen_contact_fax['czech'] = "Zadejte Váš fax.";
        $webgen_contact_fax['english'] = "Enter your fax";
        $webgen_contact_fax['deutsch'] = "";
        
        $webgen_contact_fax_empty['czech'] = "Vaše faxové číslo ".$nothing_it['czech'];
        $webgen_contact_fax_empty['english'] = "Your fax ".$nothing_it['english'];
        $webgen_contact_fax_empty['deutsch'] = "";
        
        $webgen_contact_fax_valid['czech'] = "Faxové číslo je";
        $webgen_contact_fax_valid['english'] = "Your fax is";
        $webgen_contact_fax_valid['deutsch'] = "";
        
        $webgen_contact_fax_invalid['czech'] = "Faxové číslo ".$nonstandard['czech'];
        $webgen_contact_fax_invalid['english'] = "Fax number ".$nonstandard['english'];
        $webgen_contact_fax_invalid['deutsch'] = "";
        
        $webgen_contact_icq['czech'] = "Zadejte Vaše ICQ.";
        $webgen_contact_icq['english'] = "Enter your ICQ number";
        $webgen_contact_icq['deutsch'] = "";
        
        $webgen_contact_icq_empty['czech'] = "Vaše ICQ ".$nothing_it['czech'];
        $webgen_contact_icq_empty['english'] = "ICQ ".$nothing_it['english'];
        $webgen_contact_icq_empty['deutsch'] = "";
        
        $webgen_contact_icq_valid['czech'] = "ICQ je";
        $webgen_contact_icq_valid['english'] = "ICQ is";
        $webgen_contact_icq_valid['deutsch'] = "";
        
        $webgen_contact_icq_invalid['czech'] = "ICQ ".$nonstandard['czech'];
        $webgen_contact_icq_invalid['english'] = "ICQ ".$nonstandard['english'];
        $webgen_contact_icq_invalid['deutsch'] = "";
        
        $webgen_contact_skype['czech'] = "Zadejte Váš Skype login.";
        $webgen_contact_skype['english'] = "Your Skype login";
        $webgen_contact_skype['deutsch'] = "";
        
        $webgen_contact_skype_empty['czech'] = "Váš Skype login ".$nothing_he['czech'];
        $webgen_contact_skype_empty['english'] = "Skype login ".$nothing_he['english'];
        $webgen_contact_skype_empty['deutsch'] = "";
        
        $webgen_contact_skype_valid['czech'] = "Skype login je";
        $webgen_contact_skype_valid['english'] = "Skype login is";
        $webgen_contact_skype_valid['deutsch'] = "";
        
        $webgen_contact_skype_invalid['czech'] = "Skype login ".$nonstandard['czech'];
        $webgen_contact_skype_invalid['english'] = "Skype name ".$nonstandard['english'];
        $webgen_contact_skype_invalid['deutsch'] = "";
        
        $webgen_contact_msn['czech'] = "Zadejte Váš MSN login.";
        $webgen_contact_msn['english'] = "Enter your MSN name.";
        $webgen_contact_msn['deutsch'] = "";
        
        $webgen_contact_msn_empty['czech'] = "Váš MSN login ".$nothing_he['czech'];
        $webgen_contact_msn_empty['english'] = "MSN name ".$nothing_he['english'];
        $webgen_contact_msn_empty['deutsch'] = "";
        
        $webgen_contact_msn_valid['czech'] = "MSN login je";
        $webgen_contact_msn_valid['english'] = "MSN name is";
        $webgen_contact_msn_valid['deutsch'] = "";
        
        $webgen_contact_msn_invalid['czech'] = "MSN login ".$nonstandard['czech'];
        $webgen_contact_msn_invalid['english'] = "MSN name ".$nonstandard['english'];
        $webgen_contact_msn_invalid['deutsch'] = "";
        
        $webgen_contact_irc['czech'] = "Zadejte Váš IRC login.";
        $webgen_contact_irc['english'] = "Enter your IRC ID please.";
        $webgen_contact_irc['deutsch'] = "";
        
        $webgen_contact_irc_empty['czech'] = "Váš IRC login ".$nothing_he['czech'];
        $webgen_contact_irc_empty['english'] = "IRC ID ".$nothing_he['english'];
        $webgen_contact_irc_empty['deutsch'] = "";
        
        $webgen_contact_irc_valid['czech'] = "IRC login je";
        $webgen_contact_irc_valid['english'] = "IRC ID is";
        $webgen_contact_irc_valid['deutsch'] = "";
        
        $webgen_contact_irc_invalid['czech'] = "IRC login ".$nonstandard['czech'];
        $webgen_contact_irc_invalid['english'] = "IRC ID ".$nonstandard['english'];
        $webgen_contact_irc_invalid['deutsch'] = "";
        
        $webgen_contact_jabber['czech'] = "Zadejte Váš Jabber login.";
        $webgen_contact_jabber['english'] = "Enter your jabber login please.";
        $webgen_contact_jabber['deutsch'] = "";
        
        $webgen_contact_jabber_empty['czech'] = "Váš Jabber login ".$nothing_he['czech'];
        $webgen_contact_jabber_empty['english'] = "Jabber login ".$nothing_he['english'];
        $webgen_contact_jabber_empty['deutsch'] = "";
        
        $webgen_contact_jabber_valid['czech'] = "Jabber login je";
        $webgen_contact_jabber_valid['english'] = "Jabber login is";
        $webgen_contact_jabber_valid['deutsch'] = "";
        
        $webgen_contact_jabber_invalid['czech'] = "Jabber login ".$nonstandard['czech'];
        $webgen_contact_jabber_invalid['english'] = "Jabber login ".$nonstandard['english'];
        $webgen_contact_jabber_invalid['deutsch'] = "";
        
        $webgen_contact_aim['czech'] = "Zadejte AIM login";
        $webgen_contact_aim['english'] = "Enter your AIM login please.";
        $webgen_contact_aim['deutsch'] = "";
        
        $webgen_contact_aim_empty['czech'] = "Váš AIM login ".$nothing_he['czech'];
        $webgen_contact_aim_empty['english'] = "AIM login ".$nothing_he['english'];
        $webgen_contact_aim_empty['deutsch'] = "";
        
        $webgen_contact_aim_valid['czech'] = "AIM login je";
        $webgen_contact_aim_valid['english'] = "AIM login is";
        $webgen_contact_aim_valid['deutsch'] = "";
        
        $webgen_contact_aim_invalid['czech'] = "AIM login ".$nonstandard['czech'];
        $webgen_contact_aim_invalid['english'] = "AIM login ".$nonstandard['english'];
        $webgen_contact_aim_invalid['deutsch'] = "";    

        
        // ************ WEBGEN_pp_9 **************************************


        $webgen_u_s_title['czech'] = "Zadání informací o studiu či práci na univerzitě";
        $webgen_u_s_title['english'] = "Information about studies, PhD studies or scientific work";
        $webgen_u_s_title['deutsch'] = "";    
        
        $webgen_u_s_university['czech'] = "Zadejte název univerzity. ".$mandatory['czech'];
        $webgen_u_s_university['english'] = "Enter the university name. ".$mandatory['english'];
        $webgen_u_s_university['deutsch'] = "";
        
        $webgen_u_s_university_empty['czech'] = "Název univerzity ".$nothing_he['czech'];
        $webgen_u_s_university_empty['english'] = "University name ".$nothing_he['english'];
        $webgen_u_s_university_empty['deutsch'] = "";
        
        $webgen_u_s_university_valid['czech'] = "Univerzita je";
        $webgen_u_s_university_valid['english'] = "University is";
        $webgen_u_s_university_valid['deutsch'] = "";
        
        $webgen_u_s_university_invalid['czech'] = "Název univerzity ".$nonstandard['czech'];
        $webgen_u_s_university_invalid['english'] = "University ".$nonstandard['english'];
        $webgen_u_s_university_invalid['deutsch'] = "";

        $webgen_u_s_university_short['czech'] = "Název univerzity musí být alespoň tři znaky dlouhý.";
        $webgen_u_s_university_short['english'] = "Please enter the university name at least three characters long.";
        $webgen_u_s_university_short['deutsch'] = "";
        
        $webgen_u_s_faculty['czech'] = "Zadejte název fakulty.";
        $webgen_u_s_faculty['english'] = "Enter the faculty name.";
        $webgen_u_s_faculty['deutsch'] = "";
        
        $webgen_u_s_faculty_empty['czech'] = "Fakulta ".$nothing_she['czech'];
        $webgen_u_s_faculty_empty['english'] = "Faculty ".$nothing_she['english'];
        $webgen_u_s_faculty_empty['deutsch'] = "";
        
        $webgen_u_s_faculty_valid['czech'] = "Fakulta je";
        $webgen_u_s_faculty_valid['english'] = "Faculty is";
        $webgen_u_s_faculty_valid['deutsch'] = "";
        
        $webgen_u_s_faculty_invalid['czech'] = "Název fakulty ".$nonstandard['czech'];
        $webgen_u_s_faculty_invalid['english'] = "Faculty ".$nonstandard['english'];
        $webgen_u_s_faculty_invalid['deutsch'] = "";
        
        $webgen_u_s_specialization['czech'] = "Zadejte Váš obor studia.";
        $webgen_u_s_specialization['english'] = "Enter your field of study.";
        $webgen_u_s_specialization['deutsch'] = "";
        
        $webgen_u_s_specialization_empty['czech'] = "Obor studia ".$nothing_he['czech'];
        $webgen_u_s_specialization_empty['english'] = "Field of study study ".$nothing_he['english'];
        $webgen_u_s_specialization_empty['deutsch'] = "";
        
        $webgen_u_s_specialization_valid['czech'] = "Oborem studia je";
        $webgen_u_s_specialization_valid['english'] = "Field of study is";
        $webgen_u_s_specialization_valid['deutsch'] = "";
        
        $webgen_u_s_specialization_invalid['czech'] = "Obor studia ".$nonstandard['czech'];
        $webgen_u_s_specialization_invalid['english'] = "Field of study ".$nonstandard['english'];
        $webgen_u_s_specialization_invalid['deutsch'] = "";
        
        $webgen_u_s_year['czech'] = "Zadejte ročník studia.";
        $webgen_u_s_year['english'] = "Year of study.";
        $webgen_u_s_year['deutsch'] = "";
        
        $webgen_u_s_year_empty['czech'] = "Ročník studia ".$nothing_he['czech'];
        $webgen_u_s_year_empty['english'] = "Year of study ".$nothing_he['english'];
        $webgen_u_s_year_empty['deutsch'] = "";
        
        $webgen_u_s_year_valid['czech'] = "Ročník studia je";
        $webgen_u_s_year_valid['english'] = "Year of study is";
        $webgen_u_s_year_valid['deutsch'] = "";
        
        $webgen_u_s_year_invalid['czech'] = "Ročník studia ".$nonstandard['czech'];
        $webgen_u_s_year_invalid['english'] = "Year of study ".$nonstandard['english'];
        $webgen_u_s_year_invalid['deutsch'] = "";
        
        $webgen_u_r_department['czech'] = "Zadejte katedru.";
        $webgen_u_r_department['english'] = "Enter your department.";
        $webgen_u_r_department['deutsch'] = "";
        
        $webgen_u_r_department_empty['czech'] = "Katedra ".$nothing_she['czech'];
        $webgen_u_r_department_empty['english'] = "Department ".$nothing_she['english'];
        $webgen_u_r_department_empty['deutsch'] = "";
        
        $webgen_u_r_department_valid['czech'] = "Katedra je";
        $webgen_u_r_department_valid['english'] = "Department is";
        $webgen_u_r_department_valid['deutsch'] = "";
        
        $webgen_u_r_department_invalid['czech'] = "Název katedry ".$nonstandard['czech'];
        $webgen_u_r_department_invalid['english'] = "Department ".$nonstandard['english'];
        $webgen_u_r_department_invalid['deutsch'] = "";
        
        $webgen_u_r_position['czech'] = "Zadejte Vaše pracovní zařazení.";
        $webgen_u_r_position['english'] = "Enter your official job position.";
        $webgen_u_r_position['deutsch'] = "";
        
        $webgen_u_r_position_empty['czech'] = "Pracovní zařazení ".$nothing_it['czech'];
        $webgen_u_r_position_empty['english'] = "Official job position ".$nothing_it['english'];
        $webgen_u_r_position_empty['deutsch'] = "";
        
        $webgen_u_r_position_valid['czech'] = "Pracovní zařazení je";
        $webgen_u_r_position_valid['english'] = "Official job position is";
        $webgen_u_r_position_valid['deutsch'] = "";
        
        $webgen_u_r_position_invalid['czech'] = "Pracovní zařazení ".$nonstandard['czech'];
        $webgen_u_r_position_invalid['english'] = "Official job position ".$nonstandard['english'];
        $webgen_u_r_position_invalid['deutsch'] = "";
        
        $webgen_u_r_office['czech'] = "Zadejte Váši kancelář.";
        $webgen_u_r_office['english'] = "Enter the name of your office.";
        $webgen_u_r_office['deutsch'] = "";
        
        $webgen_u_r_office_empty['czech'] = "Kancelář ".$nothing_she['czech'];
        $webgen_u_r_office_empty['english'] = "The name of your office ".$nothing_she['english'];
        $webgen_u_r_office_empty['deutsch'] = "";
        
        $webgen_u_r_office_valid['czech'] = "Kancelář je";
        $webgen_u_r_office_valid['english'] = "The name of your office is";
        $webgen_u_r_office_valid['deutsch'] = "";
        
        $webgen_u_r_office_invalid['czech'] = "Označení kanceláře ".$nonstandard['czech'];
        $webgen_u_r_office_invalid['english'] = "Office ".$nonstandard['english'];
        $webgen_u_r_office_invalid['deutsch'] = "";
        
        $webgen_u_r_departmentphone['czech'] = "Zadejte číslo na pracovní telefon.";
        $webgen_u_r_departmentphone['english'] = "Enter your work phone.";
        $webgen_u_r_departmentphone['deutsch'] = "";
        
        $webgen_u_r_departmentphone_empty['czech'] = "Pracovní telefon ".$nothing_he['czech'];
        $webgen_u_r_departmentphone_empty['english'] = "Work phone ".$nothing_he['english'];
        $webgen_u_r_departmentphone_empty['deutsch'] = "";
        
        $webgen_u_r_departmentphone_valid['czech'] = "Pracovní telefon je";
        $webgen_u_r_departmentphone_valid['english'] = "Work phone is";
        $webgen_u_r_departmentphone_valid['deutsch'] = "";
        
        $webgen_u_r_departmentphone_invalid['czech'] = "Číslo na pracovní telefon ".$nonstandard['czech'];
        $webgen_u_r_departmentphone_invalid['english'] = "Work phone ".$nonstandard['english'];
        $webgen_u_r_departmentphone_invalid['deutsch'] = "";
        
        $webgen_u_r_hour['czech'] = "Nyní budete zadávat konzultační hodiny. Nejprve zadejte den, kdy probíhají Vaše první konzultační hodiny.";
        $webgen_u_r_hour['english'] = "The office hours are acquired. Enter the day of your first office hours.";
        $webgen_u_r_hour['deutsch'] = "";
        
        $webgen_u_r_hour_firstempty['czech'] = "Konzultační hodiny nebyly zadány.";
        $webgen_u_r_hour_firstempty['english'] = "Office hours have not been specified.";
        $webgen_u_r_hour_firstempty['deutsch'] = "";
        
        $webgen_u_r_hour_empty['czech'] = "Zadávání konzultačních hodin bylo ukončeno.";
        $webgen_u_r_hour_empty['english'] = "Office hours filling have been finished.";
        $webgen_u_r_hour_empty['deutsch'] = "";
        
        $webgen_u_r_day['czech'] = "Zadejte den, kdy probíhají Vaše následující konzultační hodiny.";
        $webgen_u_r_day['english'] = "Enter the day when the next office hours take place.";
        $webgen_u_r_day['deutsch'] = "";
        
        $webgen_u_r_day_valid['czech'] = "Dnem konzultačních hodin je";
        $webgen_u_r_day_valid['english'] = "Office hours take place on";
        $webgen_u_r_day_valid['deutsch'] = "";
        
        $webgen_u_r_day_invalid['czech'] = "Den konzultací ".$nonstandard['czech'];
        $webgen_u_r_day_invalid['english'] = "Office hours day ".$nonstandard['english'];
        $webgen_u_r_day_invalid['deutsch'] = "";
        
        $webgen_u_r_from['czech'] = "Zadejte hodinu, od kdy probíhají konzultační hodiny.";
        $webgen_u_r_from['english'] = "Enter the hour when office hours start.";
        $webgen_u_r_from['deutsch'] = "";
        
        $webgen_u_r_from_empty['czech'] = "Hodina začátku konzultací nebyla uvedena. Konzultační hodiny nebudou v prezentaci uvedeny.";
        $webgen_u_r_from_empty['english'] = "The start time of office hours has not been filled. Office hours will not be included.";
        $webgen_u_r_from_empty['deutsch'] = "";
        
        $webgen_u_r_from_valid['czech'] = "Konzultace začínají v";
        $webgen_u_r_from_valid['english'] = "Office hours start at";
        $webgen_u_r_from_valid['deutsch'] = "";
        
        $webgen_u_r_from_invalid['czech'] = "Hodina, kdy začínají konzultace ".$nonstandard['czech'];
        $webgen_u_r_from_invalid['english'] = "Start time of the office hours ".$nonstandard['english'];
        $webgen_u_r_from_invalid['deutsch'] = "";
        
        $webgen_u_r_to['czech'] = "Zadejte hodinu, kdy končí konzultační hodiny.";
        $webgen_u_r_to['english'] = "The finish time of office hours.";
        $webgen_u_r_to['deutsch'] = "";
        
        $webgen_u_r_to_empty['czech'] = "Hodina ukončení konzultací nebyla uvedena. Konzultační hodiny nebudou v prezentaci uvedeny.";
        $webgen_u_r_to_empty['english'] = "The finish time of office hours has not been entered. Office hours will not be included.";
        $webgen_u_r_to_empty['deutsch'] = "";
        
        $webgen_u_r_to_valid['czech'] = "Konzultace končí v";
        $webgen_u_r_to_valid['english'] = "Office hours finish at";
        $webgen_u_r_to_valid['deutsch'] = "";

        $webgen_u_r_to_invalid['czech'] = "Hodina, kdy končí konzultace ".$nonstandard['czech'];
        $webgen_u_r_to_invalid['english'] = "Office hours ".$nonstandard['english'];
        $webgen_u_r_to_invalid['deutsch'] = "";
           
        $webgen_u_s_uniwww['czech'] = "Zadejte adresu webových stránek univerzity.";
        $webgen_u_s_uniwww['english'] = "Enter the link to the university web page.";
        $webgen_u_s_uniwww['deutsch'] = "";
        
        $webgen_u_s_uniwww_empty['czech'] = "Internetové stránky univerzity nebyly zadány.";
        $webgen_u_s_uniwww_empty['english'] = "Link has not been entered.";
        $webgen_u_s_uniwww_empty['deutsch'] = "";
        
        $webgen_u_s_uniwww_valid['czech'] = "Internetové stránky univerzity jsou na adrese";
        $webgen_u_s_uniwww_valid['english'] = "University web page is at";
        $webgen_u_s_uniwww_valid['deutsch'] = "";
        
        $webgen_u_s_uniwww_invalid['czech'] = "Adresa na internetové stránky ".$nonstandard['czech'];
        $webgen_u_s_uniwww_invalid['english'] = "Link ".$nonstandard['english'];
        $webgen_u_s_uniwww_invalid['deutsch'] = "";
        
        $webgen_u_s_facwww['czech'] = "Zadejte adresu webových stránek fakulty.";
        $webgen_u_s_facwww['english'] = "Enter the link to the faculty web page.";
        $webgen_u_s_facwww['deutsch'] = "";
        
        $webgen_u_s_facwww_empty['czech'] = "Internetové stránky fakulty nebyly zadány.";
        $webgen_u_s_facwww_empty['english'] = "Link has not been entered.";
        $webgen_u_s_facwww_empty['deutsch'] = "";
        
        $webgen_u_s_facwww_valid['czech'] = "Internetové stránky fakulty jsou na adrese";
        $webgen_u_s_facwww_valid['english'] = "Faculty web page is at";
        $webgen_u_s_facwww_valid['deutsch'] = "";
        
        $webgen_u_s_facwww_invalid['czech'] = "Adresa na internetové stránky fakulty ".$nonstandard['czech'];
        $webgen_u_s_facwww_invalid['english'] = "Link ".$nonstandard['english'];
        $webgen_u_s_facwww_invalid['deutsch'] = "";
        
        $webgen_u_s_first_project['czech'] = "Nyní budete zadávat informace o Vašich projektech. Zadejte název projektu. ".$mandatory['czech'];
        $webgen_u_s_first_project['english'] = "Enter the information about your projects. Enter the name of the first project. ".$mandatory['english'];
        $webgen_u_s_first_project['deutsch'] = "";
        
        $webgen_u_s_project_empty['czech'] = "Název projektu nebyl zadán. Tento projekt tedy nebude vložen do prezentace.";
        $webgen_u_s_project_empty['english'] = "Project name has not been entered. Project will not be generated.";
        $webgen_u_s_project_empty['deutsch'] = "";
        
        $webgen_u_s_project_valid['czech'] = "Název projektu je";
        $webgen_u_s_project_valid['english'] = "Name of project is";
        $webgen_u_s_project_valid['deutsch'] = "";
        
        $webgen_u_s_project_invalid['czech'] = "Název projektu ".$nonstandard['czech'];
        $webgen_u_s_project_invalid['english'] = "The name of project ".$nonstandard['english'];
        $webgen_u_s_project_invalid['deutsch'] = "";
        
        $webgen_u_s_project_next['czech'] = "Zadejte název dalšího projektu.";
        $webgen_u_s_project_next['english'] = "Name of next project";
        $webgen_u_s_project_next['deutsch'] = "";
        
        $webgen_u_s_project_description['czech'] = "Zadejte stručný popis projektu.";
        $webgen_u_s_project_description['english'] = "Enter the short description of the project.";
        $webgen_u_s_project_description['deutsch'] = "";
        
        $webgen_u_s_project_description_empty['czech'] = "Popis projektu ".$nothing_he['czech'];
        $webgen_u_s_project_description_empty['english'] = "Description of your project ".$nothing_he['english'];
        $webgen_u_s_project_description_empty['deutsch'] = "";
        
        $webgen_u_s_project_description_valid['czech'] = "Popis projektu je";
        $webgen_u_s_project_description_valid['english'] = "Description is";
        $webgen_u_s_project_description_valid['deutsch'] = "";
        
        $webgen_u_s_project_description_invalid['czech'] = "Popis projektu ".$nonstandard['czech'];
        $webgen_u_s_project_description_invalid['english'] = "Description ".$nonstandard['english'];
        $webgen_u_s_project_description_invalid['deutsch'] = "";
        
        $webgen_u_s_project_coauthor['czech'] = "Zadejte jméno jednoho ze spoluautorů. Získávání spoluautorů bude ukončeno, jakmile žádného nezadáte.";
        $webgen_u_s_project_coauthor['english'] = "Enter the name of first co-author. Entering will be finished when the name of coautor is not filled in.";
        $webgen_u_s_project_coauthor['deutsch'] = "";
                
        $webgen_u_s_project_coauthor_emptyfirst['czech'] = "Projekt nemá žádného spoluautora.";
        $webgen_u_s_project_coauthor_emptyfirst['english'] = "Project has no co-author.";
        $webgen_u_s_project_coauthor_emptyfirst['deutsch'] = "";
        
        $webgen_u_s_project_coauthor_empty['czech'] = "Spoluautor nebyl zadán.";
        $webgen_u_s_project_coauthor_empty['english'] = "Co-author has not been entered.";
        $webgen_u_s_project_coauthor_empty['deutsch'] = "";

        $webgen_u_s_project_coauthor_end['czech'] = "Zadávání spoluautorů bylo ukončeno.";
        $webgen_u_s_project_coauthor_end['english'] = "Entering has been finished.";
        $webgen_u_s_project_coauthor_end['deutsch'] = "";
        
        $webgen_u_s_project_coauthor_valid['czech'] = "Spoluautor se jmenuje";
        $webgen_u_s_project_coauthor_valid['english'] = "Co-author name is";
        $webgen_u_s_project_coauthor_valid['deutsch'] = "";
        
        $webgen_u_s_project_coauthor_invalid['czech'] = "Spoluautor ".$nonstandard['czech'];
        $webgen_u_s_project_coauthor_invalid['english'] = "Co-author name ".$nonstandard['english'];
        $webgen_u_s_project_coauthor_invalid['deutsch'] = "";
        
        $webgen_u_s_project_coauthor_next['czech'] = "Zadejte dalšího spoluautora.";
        $webgen_u_s_project_coauthor_next['english'] = "Enter the name of next co-author.";
        $webgen_u_s_project_coauthor_next['deutsch'] = "";
        
        $webgen_u_s_project_year['czech'] = "Zadejte rok dokončení (nebo plánovaného dokončení).";
        $webgen_u_s_project_year['english'] = "Enter the year when the project was (will be) completed.";
        $webgen_u_s_project_year['deutsch'] = "";
        
        $webgen_u_s_project_year_empty['czech'] = "Rok dokončení ".$nothing_he['czech'];
        $webgen_u_s_project_year_empty['english'] = "Completion year ".$nothing_he['english'];
        $webgen_u_s_project_year_empty['deutsch'] = "";
        
        $webgen_u_s_project_year_valid['czech'] = "Rok dokončení je";
        $webgen_u_s_project_year_valid['english'] = "Completion year is";
        $webgen_u_s_project_year_valid['deutsch'] = "";
        
        $webgen_u_s_project_year_invalid['czech'] = "Rok dokončení ".$nonstandard['czech'];
        $webgen_u_s_project_year_invalid['english'] = "Completion year ".$nonstandard['english'];
        $webgen_u_s_project_year_invalid['deutsch'] = "";
        
        $webgen_u_s_project_www['czech'] = "Vložte adresu na internetových stránek projektu.";
        $webgen_u_s_project_www['english'] = "Enter the link to web page about the project.";
        $webgen_u_s_project_www['deutsch'] = "";
        
        $webgen_u_s_project_www_empty['czech'] = "Internetová adresa ".$nothing_she['czech'];
        $webgen_u_s_project_www_empty['english'] = "Link ".$nothing_she['english'];
        $webgen_u_s_project_www_empty['deutsch'] = "";
        
        $webgen_u_s_project_www_valid['czech'] = "Internetová adresa je";
        $webgen_u_s_project_www_valid['english'] = "The web page address is";
        $webgen_u_s_project_www_valid['deutsch'] = "";
        
        $webgen_u_s_project_www_invalid['czech'] = "Adresa na internetové stránky projektu ".$nonstandard['czech'];
        $webgen_u_s_project_www_invalid['english'] = "Link ".$nonstandard['english'];
        $webgen_u_s_project_www_invalid['deutsch'] = "";
        
        $next_project_button['czech'] = "Přidat další projekt.";
        $next_project_button['english'] = "Add another project.";
        $next_project_button['deutsch'] = "";
        
        $next_project_button_info['czech'] = "Tlačítko přidat další projekt.";
        $next_project_button_info['english'] = "Add another project button.";
        $next_project_button_info['deutsch'] = "";

    // ********************** WEBGEN FIRM *************************************************

        $webgen_firm_title['czech'] = "Zadání informací o práci ve firmě";
        $webgen_firm_title['english'] = "Information about your company or employment";
        $webgen_firm_title['deutsch'] = "";
        
        $webgen_firm_firmname['czech'] = "Zadejte název firmy. ".$mandatory['czech'];
        $webgen_firm_firmname['english'] = "Enter company name. ".$mandatory['english'];
        $webgen_firm_firmname['deutsch'] = "";
        
        $webgen_firm_firmname_empty['czech'] = "Název firmy ".$nothing_he['czech'];
        $webgen_firm_firmname_empty['english'] = "Company name ".$nothing_he['english'];
        $webgen_firm_firmname_empty['deutsch'] = "";
        
        $webgen_firm_firmname_short['czech'] = "Název firmy musí být alespoň tři znaky dlouhý.";
        $webgen_firm_firmname_short['english'] = "Please enter the company name at least three characters long.";
        $webgen_firm_firmname_short['deutsch'] = "";

        $webgen_firm_firmname_valid['czech'] = "Název firmy je";
        $webgen_firm_firmname_valid['english'] = "Company name is";
        $webgen_firm_firmname_valid['deutsch'] = "";
        
        $webgen_firm_firmname_invalid['czech'] = "Název firmy ".$nonstandard['czech'];
        $webgen_firm_firmname_invalid['english'] = "Company name ".$nonstandard['english'];
        $webgen_firm_firmname_invalid['deutsch'] = "";
        
        $webgen_firm_ic['czech'] = "Zadejte identifikační číslo firmy.";
        $webgen_firm_ic['english'] = "Enter your company ID.";
        $webgen_firm_ic['deutsch'] = "";
        
        $webgen_firm_ic_empty['czech'] = "Identifikační číslo ".$nothing_it['czech'];
        $webgen_firm_ic_empty['english'] = "Company ID ".$nothing_it['english'];
        $webgen_firm_ic_empty['deutsch'] = "";        
        
        $webgen_firm_ic_valid['czech'] = "Identifikační číslo je";
        $webgen_firm_ic_valid['english'] = "ID is";
        $webgen_firm_ic_valid['deutsch'] = "";
        
        $webgen_firm_ic_invalid['czech'] = "Identifikační číslo ".$nonstandard['czech'];
        $webgen_firm_ic_invalid['english'] = "ID ".$nonstandard['english'];
        $webgen_firm_ic_invalid['deutsch'] = "";
        
        $webgen_firm_direction['czech'] = "Zadejte první oblast podnikání firmy. Zadávání bude ukončeno, jakmile žádnou nezadáte.";
        $webgen_firm_direction['english'] = "Enter the first sphere of business of your company. Entering will be finished when another sphere of business is not filled in.";
        $webgen_firm_direction['deutsch'] = "";

        $webgen_firm_direction_another['czech'] = "Zadejte další oblast podnikání.";
        $webgen_firm_direction_another['english'] = "Enter the next company sphere of business.";
        $webgen_firm_direction_another['deutsch'] = "";

        $webgen_firm_direction_emptyfirst['czech'] = "Nebyla zadána žádná oblast podnikání.";
        $webgen_firm_direction_emptyfirst['english'] = "The sphere of business has not been entered.";
        $webgen_firm_direction_emptyfirst['deutsch'] = "";
        
        $webgen_firm_direction_empty['czech'] = "Předchozí oblast podnikání nebyla zadána.";
        $webgen_firm_direction_empty['english'] = "The sphere of business has not been entered.";
        $webgen_firm_direction_empty['deutsch'] = "";

        $webgen_firm_direction_end['czech'] = "Zadávání oblastí podnikání firmy bylo ukončeno.";
        $webgen_firm_direction_end['english'] = "Entering has been finished.";
        $webgen_firm_direction_end['deutsch'] = "";
        
        $webgen_firm_direction_valid['czech'] = "Oblast podnikání je";
        $webgen_firm_direction_valid['english'] = "Your company sphere of business is";
        $webgen_firm_direction_valid['deutsch'] = "";
        
        $webgen_firm_direction_invalid['czech'] = "Oblast podnikání ".$nonstandard['czech'];
        $webgen_firm_direction_invalid['english'] = "The sphere of business ".$nonstandard['english'];
        $webgen_firm_direction_invalid['deutsch'] = "";

        $webgen_firm_workload['czech'] = "Zadejte Vaši pracovní náplň. Zadávání bude ukončeno, jakmile ji nezadáte.";
        $webgen_firm_workload['english'] = "Enter your workload. Entering will be finished when another workload is not filled in.";
        $webgen_firm_workload['deutsch'] = "";

        $webgen_firm_workload_another['czech'] = "Zadejte další pracovní náplň.";
        $webgen_firm_workload_another['english'] = "Enter the next workload.";
        $webgen_firm_workload_another['deutsch'] = "";

        $webgen_firm_workload_emptyfirst['czech'] = "Nebyla zadána žádná pracovní náplň.";
        $webgen_firm_workload_emptyfirst['english'] = "Workload has not been entered.";
        $webgen_firm_workload_emptyfirst['deutsch'] = "";
        
        $webgen_firm_workload_empty['czech'] = "Předchozí pracovní náplň nebyla zadána.";
        $webgen_firm_workload_empty['english'] = "The workload has not been entered.";
        $webgen_firm_workload_empty['deutsch'] = "";

        $webgen_firm_workload_end['czech'] = "Zadávání pracovní náplně bylo ukončeno.";
        $webgen_firm_workload_end['english'] = "Entering has been finished.";
        $webgen_firm_workload_end['deutsch'] = "";
        
        $webgen_firm_workload_valid['czech'] = "Pracovní náplň je";
        $webgen_firm_workload_valid['english'] = "Workload is";
        $webgen_firm_workload_valid['deutsch'] = "";
        
        $webgen_firm_workload_invalid['czech'] = "Pracovní náplň ".$nonstandard['czech'];
        $webgen_firm_workload_invalid['english'] = "Workload ".$nonstandard['english'];
        $webgen_firm_workload_invalid['deutsch'] = "";
        
        $webgen_firm_position['czech'] = "Zadejte dosaženou pracovní pozici.";
        $webgen_firm_position['english'] = "Enter your position.";
        $webgen_firm_position['deutsch'] = "";
        
        $webgen_firm_position_empty['czech'] = "Dosažená pracovní pozice nebyla zadána."; 
        $webgen_firm_position_empty['english'] = "Your position ".$nothing_she['english'];
        $webgen_firm_position_empty['deutsch'] = "";
        
        $webgen_firm_position_valid['czech'] = "Pracovní pozice je";
        $webgen_firm_position_valid['english'] = "Your position is";
        $webgen_firm_position_valid['deutsch'] = "";
        
        $webgen_firm_position_invalid['czech'] = "Pracovní pozice ".$nonstandard['czech'];
        $webgen_firm_position_invalid['english'] = "The position ".$nonstandard['english'];
        $webgen_firm_position_invalid['deutsch'] = "";
        
        $webgen_firm_www['czech'] = "Zadejte adresu na webové stránky firmy.";
        $webgen_firm_www['english'] = "Enter the address of your company web pages.";
        $webgen_firm_www['deutsch'] = "";

        $webgen_firm_www_empty['czech'] = "Adresa na webové stránky ".$nothing_she['czech'];
        $webgen_firm_www_empty['english'] = "Web pages location ".$nothing_she['english'];
        $webgen_firm_www_empty['deutsch'] = "";
        
        $webgen_firm_www_valid['czech'] = "Adresa webové stránky je";
        $webgen_firm_www_valid['english'] = "Web pages are located at";
        $webgen_firm_www_valid['deutsch'] = "";
        
        $webgen_firm_www_invalid['czech'] = "Adresa na internetové stránky firmy ".$nonstandard['czech'];
        $webgen_firm_www_invalid['english'] = "Web pages location ".$nonstandard['english'];
        $webgen_firm_www_invalid['deutsch'] = "";

        $webgen_firm_add['czech'] = "Zadejte doplňující informace.";
        $webgen_firm_add['english'] = "Enter the additional information.";
        $webgen_firm_add['deutsch'] = "";

        $webgen_firm_add_empty['czech'] = "Doplňující informace ".$nothing_they['czech'];
        $webgen_firm_add_empty['english'] = "Additional information ".$nothing_they['english'];
        $webgen_firm_add_empty['deutsch'] = "";
        
        $webgen_firm_add_valid['czech'] = "Byly zadány doplňující informace: ";
        $webgen_firm_add_valid['english'] = "Additional information are";
        $webgen_firm_add_valid['deutsch'] = "";
        
        $webgen_firm_add_invalid['czech'] = "Doplňující informace byly zadány v nesprávném formátu.";
        $webgen_firm_add_invalid['english'] = "Additional information have been entered in incorrect format.";
        $webgen_firm_add_invalid['deutsch'] = "";


  // ********************** WEBGEN HOBBY *************************************************

        $hobby_title['czech'] = "Zadání zájmů a koníčků"; 
        $hobby_title['english'] = "Hobbies";
        $hobby_title['deutsch'] = "";
        
        $hobby_hobby1['czech'] = "Zadejte Váš první koníček. Jakmile žádný nezadáte, bude získávaní koníčků automaticky ukončeno.";
        $hobby_hobby1['english'] = "Enter your first hobby. Entering will be finished when the hobby is not filled in.";
        $hobby_hobby1['deutsch'] = "";
        
        $hobby_emptyfirst['czech'] = "Žádný koníček ".$nothing_he['czech'];
        $hobby_emptyfirst['english'] = "Hobby ".$nothing_he['czech'];
        $hobby_emptyfirst['deutsch'] = "";
        
        $hobby_end['czech'] = "Zadávání koníčků bylo ukončeno.";
        $hobby_end['english'] = "Entering has been finished.";
        $hobby_end['deutsch'] = "";
        
        $hobby_emptyprev['czech'] = "Předchozí koníček nebyl zadán.";
        $hobby_emptyprev['english'] = "Previous hobby has not been entered.";
        $hobby_emptyprev['deutsch'] = "";
        
        $hobby_next['czech'] = "Zadejte Váš další koníček.";
        $hobby_next['english'] = "Enter your next hobby.";
        $hobby_next['deutsch'] = "";
        
        $hobby_valid['czech'] = "Koníček je";
        $hobby_valid['english'] = "Hobby is";
        $hobby_valid['deutsch'] = "";
        
        $hobby_invalid['czech'] = "Koníček zadán v nesprávném formátu.";
        $hobby_invalid['english'] = "Hobby is in incorrect format.";
        $hobby_invalid['deutsch'] = "";

  // ********************** WEBGEN KNOWLEDGE *************************************************

        $knowledge_title['czech'] = "Zadání znalostí a dovedností"; 
        $knowledge_title['english'] = "Knowledges and skills";
        $knowledge_title['deutsch'] = "";
        
        $knowledge_knowledge1['czech'] = "Zadejte Váši první znalost či dovednost. Jakmile žádnou nezadáte, bude získávaní znalostí automaticky ukončeno.";
        $knowledge_knowledge1['english'] = "Enter your first knowledge or skill. Entering will be finished when the skill is not filled in.";
        $knowledge_knowledge1['deutsch'] = "";
        
        $knowledge_emptyfirst['czech'] = "Žádná znalost ani dovednost nebyla zadána.";
        $knowledge_emptyfirst['english'] = "Knowledge of skill has not been entered.";
        $knowledge_emptyfirst['deutsch'] = "";
            
        $knowledge_end['czech'] = "Zadávání znalostí bylo ukončeno.";
        $knowledge_end['english'] = "Entering has been finished.";
        $knowledge_end['deutsch'] = "";
        
        $knowledge_emptyprev['czech'] = "Předchozí znalost nebyla zadána.";
        $knowledge_emptyprev['english'] = "Previous knowledge has not been entered.";
        $knowledge_emptyprev['deutsch'] = "";        
        
        $knowledge_next['czech'] = "Zadejte Vaši další znalost či dovednost.";
        $knowledge_next['english'] = "Enter your next knowledge or skill.";
        $knowledge_next['deutsch'] = "";
        
        $knowledge_valid['czech'] = "Znalost (dovednost) je";
        $knowledge_valid['english'] = "Knowledge (skill) is";
        $knowledge_valid['deutsch'] = "";
        
        $knowledge_invalid['czech'] = "Znalost zadána v nesprávném formátu.";
        $knowledge_invalid['english'] = "Knowledge is in incorrect format.";
        $knowledge_invalid['deutsch'] = "";        
        
        
        // *************** WEBGEN BIRTHDATE ************************
        
        $webgen_birthdate_title['czech'] = "Zadání informací o datu a místu narození";
        $webgen_birthdate_title['english'] = "Birthdate and birthplace";
        $webgen_birthdate_title['deutsch'] = "";
          
        $webgen_birthdate_birthdate['czech'] = "Zadejte Vaše datum narození.";
        $webgen_birthdate_birthdate['english'] = "Enter your date of birth.";
        $webgen_birthdate_birthdate['deutsch'] = "";
          
        $webgen_birthdate_birthdate_empty['czech'] = "Datum narození ".$nothing_it['czech'];
        $webgen_birthdate_birthdate_empty['english'] = "Date of birth ".$nothing_it['english'];
        $webgen_birthdate_birthdate_empty['deutsch'] = "";
  
        $webgen_birthdate_birthdate_valid_part1['czech'] = "Vaše datum narození je";
        $webgen_birthdate_birthdate_valid_part1['english'] = "Your birtdate is";
        $webgen_birthdate_birthdate_valid_part1['deutsch'] = "";
        
        $webgen_birthdate_birthdate_valid_part2['czech'] = "Astronomické znamení je";
        $webgen_birthdate_birthdate_valid_part2['english'] = "Astrological sign is";
        $webgen_birthdate_birthdate_valid_part2['deutsch'] = "";
        
        $webgen_birthdate_birthdate_invalid['czech'] = "Nerozumím zadanému datu narození a nebudu moci rozpoznat Vaše astrologické znamení. Prosím vložte datum narození ve formátu 20.1.1950.";
        $webgen_birthdate_birthdate_invalid['english'] = "Birthdate is in non-standard format, so it is not possible do determine your astrological sign. Please enter the date of birth in format 20.1.1950.";
        $webgen_birthdate_birthdate_invalid['deutsch'] = "";        
        
        $webgen_birthdate_birthplace['czech'] = "Zadejte místo Vašeho narození.";
        $webgen_birthdate_birthplace['english'] = "Enter your place of birth.";
        $webgen_birthdate_birthplace['deutsch'] = "";
      
        $webgen_birthdate_birthplace_empty['czech'] = "Místo narození ".$nothing_it['czech'];
        $webgen_birthdate_birthplace_empty['english'] = "Place of birth ".$nothing_it['english'];
        $webgen_birthdate_birthplace_empty['deutsch'] = "";      
      
        $webgen_birthdate_birthplace_valid['czech'] = "Místo narození je";
        $webgen_birthdate_birthplace_valid['english'] = "Your place of birth is";
        $webgen_birthdate_birthplace_valid['deutsch'] = ""; 
 
        $webgen_birthdate_birthplace_invalid['czech'] = "Místo narození ".$nonstandard['czech'];
        $webgen_birthdate_birthplace_invalid['english'] = "Place of birth ".$nonstandard['english'];
        $webgen_birthdate_birthplace_invalid['deutsch'] = "";       
        
        // ********************************** WEBGEN_CV ****************************************************
        
        $webgen_cv_title['czech'] = "Vytvoření strukturovaného životopisu"; 
        $webgen_cv_title['english'] = "Curriculum Vitae";
        $webgen_cv_title['deutsch'] = "";        
        
        $webgen_cv_email_reuse['czech'] = "Jakou emailovou adresu chcete vložit do životopisu?";
        $webgen_cv_email_reuse['english'] = "Which email do you want to enter into the CV?";
        $webgen_cv_email_reuse['deutsch'] = "";

        $email_a['czech'] = "Vložit dříve zadaný email";
        $email_a['english'] = "Previously entered email";
        $email_a['deutsch'] = "";

        $email_b['czech'] = "Vložit jiný email";
        $email_b['english'] = "Other email";
        $email_b['deutsch'] = "";
        
        $email_c['czech'] = "Nevkládat email";
        $email_c['english'] = "None";
        $email_c['deutsch'] = "";

        $webgen_cv_email_reuse_valid['czech'] = "Byla vybrána možnost";
        $webgen_cv_email_reuse_valid['english'] = "You choose the option";
        $webgen_cv_email_reuse_valid['deutsch'] = "";

        $webgen_cv_address_reuse['czech'] = "Jakou adresu chcete vložit do životopisu?";
        $webgen_cv_address_reuse['english'] = "Which address do you want to enter into the CV?";
        $webgen_cv_address_reuse['deutsch'] = "";

        $address_a['czech'] = "Vložit dříve zadanou adresu";
        $address_a['english'] = "Previously entered address";
        $address_a['deutsch'] = "";

        $address_b['czech'] = "Vložit jinou adresu";
        $address_b['english'] = "Other address";
        $address_b['deutsch'] = "";
        
        $address_c['czech'] = "Nevkládat adresu";
        $address_c['english'] = "None";
        $address_c['deutsch'] = "";

        $webgen_cv_cellular_reuse['czech'] = "Jake telefonní číslo chcete vložit do životopisu?";
        $webgen_cv_cellular_reuse['english'] = "Which phone number do you want to enter into the CV?";
        $webgen_cv_cellular_reuse['deutsch'] = "";

        $cellular_a['czech'] = "Vložit dříve zadané číslo na mobilní telefon";
        $cellular_a['english'] = "Previously entered cellular number";
        $cellular_a['deutsch'] = "";

        $cellular_d['czech'] = "Vložit dříve zadané číslo na pevnou linku";
        $cellular_d['english'] = "Previously entered home phone number";
        $cellular_d['deutsch'] = "";
        
        $cellular_b['czech'] = "Vložit jiné číslo";
        $cellular_b['english'] = "Other phone number";
        $cellular_b['deutsch'] = "";
        
        $cellular_c['czech'] = "Nevkládat telefonní číslo";
        $cellular_c['english'] = "None";
        $cellular_c['deutsch'] = "";

        $webgen_cv_other_phone['czech'] = "Jiné telefonní číslo";
        $webgen_cv_other_phone['english'] = "Other number";
        $webgen_cv_other_phone['deutsch'] = "";

        $webgen_cv_nothing['czech'] = "Žádné číslo";
        $webgen_cv_nothing['english'] = "None";
        $webgen_cv_nothing['deutsch'] = "";

        $webgen_cv_cellular['czech'] = "Zadejte Vaše telefoní číslo.";
        $webgen_cv_cellular['english'] = "Enter your phone number";
        $webgen_cv_cellular['deutsch'] = "";
        
        $webgen_cv_cellular_empty['czech'] = "Vaše telefonní číslo ".$nothing_it['czech'];
        $webgen_cv_cellular_empty['english'] = "Your phone number ".$nothing_it['english'];
        $webgen_cv_cellular_empty['deutsch'] = "";
        
        $webgen_cv_cellular_valid['czech'] = "Číslo na telefon je";
        $webgen_cv_cellular_valid['english'] = "Your phone number is";
        $webgen_cv_cellular_valid['deutsch'] = "";
        
        $webgen_cv_cellular_invalid['czech'] = "Číslo na telefon ".$nonstandard['czech'];
        $webgen_cv_cellular_invalid['english'] = "Phone number ".$nonstandard['english'];
        $webgen_cv_cellular_invalid['deutsch'] = "";

        $webgen_cv_nationality['czech'] = "Zadejte Vaši národnost.";
        $webgen_cv_nationality['english'] = "Enter your nationality";
        $webgen_cv_nationality['deutsch'] = "";
        
        $webgen_cv_nationality_empty['czech'] = "Vaše národnost ".$nothing_she['czech'];
        $webgen_cv_nationality_empty['english'] = "Your nationality ".$nothing_she['english'];
        $webgen_cv_nationality_empty['deutsch'] = "";
        
        $webgen_cv_nationality_valid['czech'] = "Vaše národnost je";
        $webgen_cv_nationality_valid['english'] = "Your nationality is";
        $webgen_cv_nationality_valid['deutsch'] = "";
        
        $webgen_cv_nationality_invalid['czech'] = "Národnost ".$nonstandard['czech'];
        $webgen_cv_nationality_invalid['english'] = "Nationality ".$nonstandard['english'];
        $webgen_cv_nationality_invalid['deutsch'] = "";
        
        $webgen_cv_family['czech'] = "Zadejte Váš rodinný stav.";
        $webgen_cv_family['english'] = "Enter your marital status.";
        $webgen_cv_family['deutsch'] = "";
        
        $webgen_cv_family_empty['czech'] = "Váš rodinný stav ".$nothing_he['czech'];
        $webgen_cv_family_empty['english'] = "Your marital status ".$nothing_he['english'];
        $webgen_cv_family_empty['deutsch'] = "";
        
        $webgen_cv_family_valid['czech'] = "Rodinný stav je";
        $webgen_cv_family_valid['english'] = "Your marital status is";
        $webgen_cv_family_valid['deutsch'] = "";
        
        $webgen_cv_family_invalid['czech'] = "Rodinný stav ".$nonstandard['czech'];
        $webgen_cv_family_invalid['english'] = "Marital status ".$nonstandard['english'];
        $webgen_cv_family_invalid['deutsch'] = "";
        
        $webgen_cv_edu_from_init['czech'] = "Nyní budete zadávat informace o Vašem vzdělání. Zadejte rok začátku prvního studia. ".$mandatory['czech'];
        $webgen_cv_edu_from_init['english'] = "Now, you are entering the information about your education. Enter the inital year of the first education. ".$mandatory['english'];
        $webgen_cv_edu_from_init['deutsch'] = "";
        
        $webgen_cv_edu_from['czech'] = "Od roku.";
        $webgen_cv_edu_from['english'] = "From year";
        $webgen_cv_edu_from['deutsch'] = "";
        
        $webgen_cv_edu_from_empty['czech'] = "Rok začátku ".$nothing_he['czech']." Kurz bude vložen pouze v případě, že zadáte rok začátku studia.";
        $webgen_cv_edu_from_empty['english'] = "Initial year ".$nothing_he['english']." This information is mandatory.";
        $webgen_cv_edu_from_empty['deutsch'] = "";
        
        $webgen_cv_edu_from_valid['czech'] = "Rok začátku je";
        $webgen_cv_edu_from_valid['english'] = "Initial year is";
        $webgen_cv_edu_from_valid['deutsch'] = "";
        
        $webgen_cv_edu_from_invalid['czech'] = "Rok začátku ".$nonstandard['czech'];
        $webgen_cv_edu_from_invalid['english'] = "Initial year ".$nonstandard['english'];
        $webgen_cv_edu_from_invalid['deutsch'] = "";       
        
        $webgen_cv_edu_to['czech'] = "Zadejte rok ukončení studia.";
        $webgen_cv_edu_to['english'] = "Enter the final year.";
        $webgen_cv_edu_to['deutsch'] = "";
        
        $webgen_cv_edu_to_empty['czech'] = "Rok ukončení ".$nothing_he['czech'];
        $webgen_cv_edu_to_empty['english'] = "Final year ".$nothing_he['english'];
        $webgen_cv_edu_to_empty['deutsch'] = "";
        
        $webgen_cv_edu_to_valid['czech'] = "Rok ukončení je";
        $webgen_cv_edu_to_valid['english'] = "Final year is";
        $webgen_cv_edu_to_valid['deutsch'] = "";
        
        $webgen_cv_edu_to_invalid['czech'] = "Rok ukončení ".$nonstandard['czech'];
        $webgen_cv_edu_to_invalid['english'] = "Final year ".$nonstandard['english'];
        $webgen_cv_edu_to_invalid['deutsch'] = "";
        
        $webgen_cv_edu_degree['czech'] = "Zadejte stupeň vzdělání.";
        $webgen_cv_edu_degree['english'] = "Education qualification.";
        $webgen_cv_edu_degree['deutsch'] = "";
        
        $webgen_cv_edu_degree_valid['czech'] = "Byl vybrán stupeň vzdělání";
        $webgen_cv_edu_degree_valid['english'] = "Education qualification:";
        $webgen_cv_edu_degree_valid['deutsch'] = "";
        
        $degree_0['czech'] = "základní";
        $degree_0['english'] = "primary school";
        $degree_0['deutsch'] = "";

        $degree_1['czech'] = "odborné vyučení bez maturity";
        $degree_1['english'] = "indenture";
        $degree_1['deutsch'] = "";

        $degree_2['czech'] = "středoškolské nebo vyučení s maturitou";
        $degree_2['english'] = "high school";
        $degree_2['deutsch'] = "";
        
        $degree_3['czech'] = "vyšší odborné";
        $degree_3['english'] = "advanced vocational training";
        $degree_3['deutsch'] = "";
        
        $degree_4['czech'] = "bakalářské";
        $degree_4['english'] = "bachelor's degree";
        $degree_4['deutsch'] = "";
        
        $degree_5['czech'] = "vysokoškolské / univerzitní";
        $degree_5['english'] = "master degree";
        $degree_5['deutsch'] = "";
        
        $degree_6['czech'] = "MBA, MBT, postgraduální studium";
        $degree_6['english'] = "MBA, MBT, Ph.D. studies";
        $degree_6['deutsch'] = "";
        
        $degree_7['czech'] = "jiné";
        $degree_7['english'] = "other";
        $degree_7['deutsch'] = "";

        $webgen_cv_edu_title['czech'] = "Zadejte získaný titul.";
        $webgen_cv_edu_title['english'] = "Academic degree.";
        $webgen_cv_edu_title['deutsch'] = "";
        
        $webgen_cv_edu_title_empty['czech'] = "Získaný titul ".$nothing_he['czech'];
        $webgen_cv_edu_title_empty['english'] = "Academic degree ".$nothing_he['english'];
        $webgen_cv_edu_title_empty['deutsch'] = "";
        
        $webgen_cv_edu_title_valid['czech'] = "Získaný titul je";
        $webgen_cv_edu_title_valid['english'] = "Academic degree is";
        $webgen_cv_edu_title_valid['deutsch'] = "";
        
        $webgen_cv_edu_title_invalid['czech'] = "Získaný titul ".$nonstandard['czech'];
        $webgen_cv_edu_title_invalid['english'] = "Academic degree ".$nonstandard['english'];
        $webgen_cv_edu_title_invalid['deutsch'] = "";
        
        $webgen_cv_edu_school['czech'] = "Zadejte název vzdělávacího zařízení. ".$mandatory['czech'];
        $webgen_cv_edu_school['english'] = "Educational institution. ".$mandatory['english'];
        $webgen_cv_edu_school['deutsch'] = "";
        
        $webgen_cv_edu_school_empty['czech'] = "Název vzdělávacího zařízení ".$nothing_he['czech']." Kurz bude vložen pouze v případě, že zadáte název vzdělávacího zařízení.";
        $webgen_cv_edu_school_empty['english'] = "Educational institution ".$nothing_he['english']." This information is mandatory.";
        $webgen_cv_edu_school_empty['deutsch'] = "";
        
        $webgen_cv_edu_school_valid['czech'] = "Název vzdělávacího zařízení je";
        $webgen_cv_edu_school_valid['english'] = "Educational institution is";
        $webgen_cv_edu_school_valid['deutsch'] = "";
        
        $webgen_cv_edu_school_invalid['czech'] = "Název vzdělávacího zařízení ".$nonstandard['czech'];
        $webgen_cv_edu_school_invalid['english'] = "Educational institution ".$nonstandard['english'];
        $webgen_cv_edu_school_invalid['deutsch'] = "";
        
        $webgen_cv_edu_field['czech'] = "Zadejte studijní obor.";
        $webgen_cv_edu_field['english'] = "Field of study.";
        $webgen_cv_edu_field['deutsch'] = "";
        
        $webgen_cv_edu_field_empty['czech'] = "Studijní obor ".$nothing_he['czech'];
        $webgen_cv_edu_field_empty['english'] = "Field of study ".$nothing_he['english'];
        $webgen_cv_edu_field_empty['deutsch'] = "";
        
        $webgen_cv_edu_field_valid['czech'] = "Studijní obor je";
        $webgen_cv_edu_field_valid['english'] = "Field of study is";
        $webgen_cv_edu_field_valid['deutsch'] = "";
        
        $webgen_cv_edu_field_invalid['czech'] = "Studijní obor ".$nonstandard['czech'];
        $webgen_cv_edu_field_invalid['english'] = "Field of study ".$nonstandard['english'];
        $webgen_cv_edu_field_invalid['deutsch'] = "";
        
        $next_edu_button['czech'] = "Přidat další vzdělání či kurz.";
        $next_edu_button['english'] = "Next education or course.";
        $next_edu_button['deutsch'] = "";
        
        $next_edu_button_info['czech'] = "Tlačítko přidat další vzdělání či kurz.";
        $next_edu_button_info['english'] = "Next education or course button.";
        $next_edu_button_info['deutsch'] = "";          
        
        $webgen_cv_work_from_init['czech'] = "Nyní budete zadávat informace o Vaší praxi. Zadejte rok začátku prvního praxe. ".$mandatory['czech'];
        $webgen_cv_work_from_init['english'] = "Now, you are entering the information about your job experiences. Enter the inital year of the first job. ".$mandatory['english'];
        $webgen_cv_work_from_init['deutsch'] = "";
        
        $webgen_cv_work_from_empty['czech'] = "Rok začátku ".$nothing_he['czech']." Kurz bude vložen pouze v případě, že zadáte rok začátku praxe.";
        $webgen_cv_work_from_empty['english'] = "Initial year ".$nothing_he['english']." This information is mandatory.";
        $webgen_cv_work_from_empty['deutsch'] = "";
        
        
        $webgen_cv_work_companyname['czech'] = "Zadejte název firmy. ".$mandatory['czech'];
        $webgen_cv_work_companyname['english'] = "Company. ".$mandatory['english'];
        $webgen_cv_work_companyname['deutsch'] = "";
        
        $webgen_cv_work_companyname_empty['czech'] = "Název firmy ".$nothing_he['czech']." Praxe bude vložena pouze v případě, že zadáte název firmy.";
        $webgen_cv_work_companyname_empty['english'] = "Company ".$nothing_he['english']." This information is mandatory.";
        $webgen_cv_work_companyname_empty['deutsch'] = "";
        
        $webgen_cv_work_to['czech'] = "Zadejte rok ukončení praxe.";
        $webgen_cv_work_to['english'] = "Enter the final year.";
        $webgen_cv_work_to['deutsch'] = "";
        
        $webgen_cv_work_companyname_valid['czech'] = "Název firmy je";
        $webgen_cv_work_companyname_valid['english'] = "Company is";
        $webgen_cv_work_companyname_valid['deutsch'] = "";
        
        $webgen_cv_work_companyname_invalid['czech'] = "Název firmy ".$nonstandard['czech'];
        $webgen_cv_work_companyname_invalid['english'] = "Company title ".$nonstandard['english'];
        $webgen_cv_work_companyname_invalid['deutsch'] = "";

        $webgen_cv_work_sphere['czech'] = "Zadejte oblast podnikání.";
        $webgen_cv_work_sphere['english'] = "Sphere of business.";
        $webgen_cv_work_sphere['deutsch'] = "";
        
        $webgen_cv_work_sphere_empty['czech'] = "Oblast podnikání ".$nothing_she['czech'];
        $webgen_cv_work_sphere_empty['english'] = "Sphere of business ".$nothing_she['english'];
        $webgen_cv_work_sphere_empty['deutsch'] = "";
        
        $webgen_cv_work_sphere_valid['czech'] = "Oblast podnikání je";
        $webgen_cv_work_sphere_valid['english'] = "Sphere of business is";
        $webgen_cv_work_sphere_valid['deutsch'] = "";
        
        $webgen_cv_work_sphere_invalid['czech'] = "Oblast podnikání ".$nonstandard['czech'];
        $webgen_cv_work_sphere_invalid['english'] = "Sphere of business ".$nonstandard['english'];
        $webgen_cv_work_sphere_invalid['deutsch'] = "";

        $webgen_cv_work_pos['czech'] = "Zadejte dosaženou pozici.";
        $webgen_cv_work_pos['english'] = "Working position.";
        $webgen_cv_work_pos['deutsch'] = "";
        
        $webgen_cv_work_pos_empty['czech'] = "Dosažená pozice ".$nothing_she['czech'];
        $webgen_cv_work_pos_empty['english'] = "Working position ".$nothing_she['english'];
        $webgen_cv_work_pos_empty['deutsch'] = "";
        
        $webgen_cv_work_pos_valid['czech'] = "Dosažená pozice je";
        $webgen_cv_work_pos_valid['english'] = "Working position is";
        $webgen_cv_work_pos_valid['deutsch'] = "";
        
        $webgen_cv_work_pos_invalid['czech'] = "Dosažená pozice ".$nonstandard['czech'];
        $webgen_cv_work_pos_invalid['english'] = "Working position ".$nonstandard['english'];
        $webgen_cv_work_pos_invalid['deutsch'] = "";
        
        $webgen_cv_work_wload['czech'] = "Zadejte pracovní náplň na dané pozici.";
        $webgen_cv_work_wload['english'] = "Workload.";
        $webgen_cv_work_wload['deutsch'] = "";
        
        $webgen_cv_work_wload_empty['czech'] = "Pracovní náplň ".$nothing_she['czech'];
        $webgen_cv_work_wload_empty['english'] = "Workload ".$nothing_she['english'];
        $webgen_cv_work_wload_empty['deutsch'] = "";
        
        $webgen_cv_work_wload_valid['czech'] = "Pracovní náplň je";
        $webgen_cv_work_wload_valid['english'] = "Workload";
        $webgen_cv_work_wload_valid['deutsch'] = "";
        
        $webgen_cv_work_wload_invalid['czech'] = "Pracovní náplň ".$nonstandard['czech'];
        $webgen_cv_work_wload_invalid['english'] = "Workload ".$nonstandard['english'];
        $webgen_cv_work_wload_invalid['deutsch'] = "";        
        
        $next_work_button['czech'] = "Přidat další praxi.";
        $next_work_button['english'] = "Enter next work experiences.";
        $next_work_button['deutsch'] = "";
        
        $next_work_button_info['czech'] = "Tlačítko přidat další praxi.";
        $next_work_button_info['english'] = "Next work experiences button.";
        $next_work_button_info['deutsch'] = "";        

        $webgen_cv_knowledge['czech'] = "Osobní schopnosti a dovednosti";
        $webgen_cv_knowledge['english'] = "Personal skills";
        $webgen_cv_knowledge['deutsch'] = "";

        $webgen_cv_it['czech'] = "Znalost výpočetní techniky";
        $webgen_cv_it['english'] = "IT Knowledges";
        $webgen_cv_it['deutsch'] = "";
        
        $webgen_cv_it_degree['czech'] = "Zadejte na jaké úrovni je Vaše znalost výpočetní techniky.";
        $webgen_cv_it_degree['english'] = "Enter the level of your IT skills.";
        $webgen_cv_it_degree['deutsch'] = "";        
        
        $webgen_cv_it_degree_valid['czech'] = "Úroveň Vašich znalostí je";
        $webgen_cv_it_degree_valid['english'] = "Level of your IT skills is";
        $webgen_cv_it_degree_valid['deutsch'] = "";
        
        $it_0['czech'] = "žádná";
        $it_0['english'] = "none";
        $it_0['deutsch'] = "";         
                
        $it_1['czech'] = "základní";
        $it_1['english'] = "basic";
        $it_1['deutsch'] = "";  
        
        $it_2['czech'] = "uživatelské";
        $it_2['english'] = "standard user";
        $it_2['deutsch'] = "";  
        
        $it_3['czech'] = "nadstandardní uživatelská";
        $it_3['english'] = "advanced";
        $it_3['deutsch'] = "";  
        
        $it_4['czech'] = "odborná";
        $it_4['english'] = "expert";
        $it_4['deutsch'] = "";
        
        $webgen_cv_it_detail['czech'] = "Zadejte detailní popis IT znalostí.";
        $webgen_cv_it_detail['english'] = "Enter details about your IT skills.";
        $webgen_cv_it_detail['deutsch'] = "";        

        $webgen_cv_it_detail_empty['czech'] = "Detailní popis IT znalostí ".$nothing_it['czech'];
        $webgen_cv_it_detail_empty['english'] = "Details about your IT skills ".$nothing_they['english'];
        $webgen_cv_it_detail_empty['deutsch'] = ""; 
        
        $webgen_cv_it_detail_valid['czech'] = "IT znalosti jsou";
        $webgen_cv_it_detail_valid['english'] = "Details about your IT skills are";
        $webgen_cv_it_detail_valid['deutsch'] = ""; 
        
        $webgen_cv_it_detail_invalid['czech'] = "IT znalosti ".$nonstandard['czech'];
        $webgen_cv_it_detail_invalid['english'] = "Details about your IT skills ".$nonstandard['english'];
        $webgen_cv_it_detail_invalid['deutsch'] = ""; 

        $webgen_cv_lang['czech'] = "Jazykové znalosti";
        $webgen_cv_lang['english'] = "Languages";
        $webgen_cv_lang['deutsch'] = "";

        $webgen_cv_lang_type_init['czech'] = "Nyní budete zadávat informace o jazycích, které znáte. Vyberte první jazyk, který ovládáte.";
        $webgen_cv_lang_type_init['english'] = "Now, you are entering the information about the languages. Choose the language.";
        $webgen_cv_lang_type_init['deutsch'] = "";

        $webgen_cv_lang_type['czech'] = "Vyberte jazyk.";
        $webgen_cv_lang_type['english'] = "Choose the language.";
        $webgen_cv_lang_type['deutsch'] = "";
        
        $webgen_cv_lang_type_valid['czech'] = "Jazyk je";
        $webgen_cv_lang_type_valid['english'] = "Language is";
        $webgen_cv_lang_type_valid['deutsch'] = "";
        
        $l_0['czech'] = "čeština";
        $l_0['english'] = "Czech";
        $l_0['deutsch'] = "";       

        $l_1['czech'] = "afrikánština";
        $l_1['english'] = "Afrikaans";
        $l_1['deutsch'] = ""; 
        
        $l_2['czech'] = "angličtina";
        $l_2['english'] = " English";
        $l_2['deutsch'] = "";
        
        $l_3['czech'] = "bulharština";
        $l_3['english'] = "Bulgarian";
        $l_3['deutsch'] = "";
        
        $l_4['czech'] = "běloruština";
        $l_4['english'] = "Belorussian";
        $l_4['deutsch'] = "";
        
        $l_5['czech'] = "dánština";
        $l_5['english'] = "Danish ";
        $l_5['deutsch'] = "";
        
        $l_6['czech'] = "francouzština";
        $l_6['english'] = "French";
        $l_6['deutsch'] = "";
        
        $l_7['czech'] = "italština";
        $l_7['english'] = "Italian";
        $l_7['deutsch'] = "";
        
        $l_8['czech'] = "latina";
        $l_8['english'] = "Latin";
        $l_8['deutsch'] = "";
        
        $l_9['czech'] = "maďarština";
        $l_9['english'] = "Hungarian";
        $l_9['deutsch'] = "";        

        $l_10['czech'] = "makedonština";
        $l_10['english'] = "Macedonian";
        $l_10['deutsch'] = ""; 
                
        $l_11['czech'] = "nizozemština";
        $l_11['english'] = "Dutch";
        $l_11['deutsch'] = "";
        
        $l_12['czech'] = "norština";
        $l_12['english'] = "Norwegian";
        $l_12['deutsch'] = "";
        
        $l_13['czech'] = "němčina";
        $l_13['english'] = "German";
        $l_13['deutsch'] = "";
        
        $l_14['czech'] = "polština";
        $l_14['english'] = "Polish";
        $l_14['deutsch'] = "";
        
        $l_15['czech'] = "portugalština";
        $l_15['english'] = "Portugese";
        $l_15['deutsch'] = "";
        
        $l_16['czech'] = "rumunština";
        $l_16['english'] = "Rumanian";
        $l_16['deutsch'] = "";
        
        $l_17['czech'] = "ruština";
        $l_17['english'] = "Russian";
        $l_17['deutsch'] = "";
        
        $l_18['czech'] = "slovenština";
        $l_18['english'] = "Slovak";
        $l_18['deutsch'] = "";
        
        $l_19['czech'] = "slovinština";
        $l_19['english'] = "Slovene";
        $l_19['deutsch'] = "";
        
        $l_20['czech'] = "srbochorvatština";
        $l_20['english'] = "Serbo-Croatian";
        $l_20['deutsch'] = "";
        
        $l_21['czech'] = "srbština";
        $l_21['english'] = "Serbian";
        $l_21['deutsch'] = "";
        
        $l_22['czech'] = "španělština";
        $l_22['english'] = "Spanish";
        $l_22['deutsch'] = "";
        
        $l_23['czech'] = "švédština";
        $l_23['english'] = "Swedish";
        $l_23['deutsch'] = "";
        
        $l_24['czech'] = "ukrajinština";
        $l_24['english'] = "Ukrainian";
        $l_24['deutsch'] = "";
        
        $webgen_cv_lang_level['czech'] = "Vyberte úroveň, na které daný jazyk ovládáte.";
        $webgen_cv_lang_level['english'] = "Choose the level of knowledge.";
        $webgen_cv_lang_level['deutsch'] = "";

        $webgen_cv_lang_level_valid['czech'] = "Úroveň znalosti jazyka je";
        $webgen_cv_lang_level_valid['english'] = "Level of knowledge is";
        $webgen_cv_lang_level_valid['deutsch'] = "";
        
        $lang_0['czech'] = "základní / pasivní";
        $lang_0['english'] = "basic / passive";
        $lang_0['deutsch'] = "";

        $lang_1['czech'] = "mírně pokročilá";
        $lang_1['english'] = "pre-intermediate";
        $lang_1['deutsch'] = "";

        $lang_2['czech'] = "středně pokročilá";
        $lang_2['english'] = "intermediate";
        $lang_2['deutsch'] = "";
        
        $lang_3['czech'] = "pokročilá";
        $lang_3['english'] = "advanced";
        $lang_3['deutsch'] = "";
        
        $lang_4['czech'] = "výborná / rodilý mluvčí";
        $lang_4['english'] = "proficient";
        $lang_4['deutsch'] = "";      
        
        $next_lang_button['czech'] = "Přidat další jazyk.";
        $next_lang_button['english'] = "Enter the next language.";
        $next_lang_button['deutsch'] = "";  
        
        $next_lang_button_info['czech'] = "Tlačítko přidat další jazyk.";
        $next_lang_button_info['english'] = "Add the next language button.";
        $next_lang_button_info['deutsch'] = ""; 
        
        $webgen_cv_otherskill_info['czech'] = "Ostatní znalosti a dovednosti";
        $webgen_cv_otherskill_info['english'] = "Other skills and knowledge";
        $webgen_cv_otherskill_info['deutsch'] = "";
        
        $webgen_cv_otherskill['czech'] = "Zadejte ostatní znalosti a dovednosti";
        $webgen_cv_otherskill['english'] = "Enter your additional skills and knowledge.";
        $webgen_cv_otherskill['deutsch'] = "";
        
        $webgen_cv_otherskill_empty['czech'] = "Ostatní znalosti a dovednosti ".$nothing_they['czech'];
        $webgen_cv_otherskill_empty['english'] = "Additional skills and knowledge ".$nothing_they['english'];
        $webgen_cv_otherskill_empty['deutsch'] = "";
        
        $webgen_cv_otherskill_valid['czech'] = "Ostatní znalosti a dovednosti jsou";
        $webgen_cv_otherskill_valid['english'] = "Additional skills and knowledge are";
        $webgen_cv_otherskill_valid['deutsch'] = "";
        
        $webgen_cv_otherskill_invalid['czech'] = "Ostatní znalosti a dovednosti ".$nonstandard['czech'];
        $webgen_cv_otherskill_invalid['english'] = "Additional skills and knowledge ".$nonstandard['english'];
        $webgen_cv_otherskill_invalid['deutsch'] = "";

        $webgen_cv_driver_info['czech'] = "Řidičský průkaz";
        $webgen_cv_driver_info['english'] = "Driver License";
        $webgen_cv_driver_info['deutsch'] = "";
  
        $webgen_cv_driver['czech'] = "Zadejte pro jaké skupiny vozidel vlastníte řidičský průkaz. Jednotlivé skupiny oddělujte čárkou nebo pomlčkou.";
        $webgen_cv_driver['english'] = "Enter the driver license categories divided by dashes or commas.";
        $webgen_cv_driver['deutsch'] = "";
        
        $webgen_cv_driver_empty['czech'] = "Skupiny vozidel pro něž vlastníte řidičský průkaz ".$nothing_they['czech'];
        $webgen_cv_driver_empty['english'] = "Categories ".$nothing_they['english'];
        $webgen_cv_driver_empty['deutsch'] = "";
        
        $webgen_cv_driver_valid['czech'] = "Vlastníte řidičský průkaz skupiny";
        $webgen_cv_driver_valid['english'] = "Categories are";
        $webgen_cv_driver_valid['deutsch'] = "";
        
        $webgen_cv_driver_invalid['czech'] = "Zadání řidičského průkazu ".$nonstandard['czech'];
        $webgen_cv_driver_invalid['english'] = "Driver license category ".$nonstandard['english'];
        $webgen_cv_driver_invalid['deutsch'] = ""; 
  
  



  
  
        
               
        $webgen_cv_other_info['czech'] = "Ostatní informace";
        $webgen_cv_other_info['english'] = "Other information.";
        $webgen_cv_other_info['deutsch'] = "";
        
        $webgen_cv_other['czech'] = "Zadejte doplňující informace";
        $webgen_cv_other['english'] = "Enter additional information.";
        $webgen_cv_other['deutsch'] = "";
        
        $webgen_cv_other_empty['czech'] = "Doplňující informace ".$nothing_they['czech'];
        $webgen_cv_other_empty['english'] = "Additional information ".$nothing_they['english'];
        $webgen_cv_other_empty['deutsch'] = "";
        
        $webgen_cv_other_valid['czech'] = "Doplňující informace jsou";
        $webgen_cv_other_valid['english'] = "Additional information are";
        $webgen_cv_other_valid['deutsch'] = "";
        
        $webgen_cv_other_invalid['czech'] = "Doplňující informace ".$nonstandard['czech'];
        $webgen_cv_other_invalid['english'] = "Additional information ".$nonstandard['english'];
        $webgen_cv_other_invalid['deutsch'] = "";         
        
        // ********************************** WEBGEN_TEXTFIELD ************************************************\
        
        $webgen_tf_title['czech'] = "Vložení textu s případnou ilustrativní fotografií"; 
        $webgen_tf_title['english'] = "Text with the optional illustrative photography";
        $webgen_tf_title['deutsch'] = "";
        
        $webgen_tf_text['czech'] = "Zadejte text, který chcete do prezetace vložit.";
        $webgen_tf_text['english'] = "Enter the text";
        $webgen_tf_text['deutsch'] = "";
        
        $webgen_tf_text_empty['czech'] = "Text ".$nothing_he['czech'];
        $webgen_tf_text_empty['english'] = "Text ".$nothing_they['english'];
        $webgen_tf_text_empty['deutsch'] = ""; 
        
        $webgen_tf_text_valid['czech'] = "Zadaný text:";
        $webgen_tf_text_valid['english'] = "Entered text";
        $webgen_tf_text_valid['deutsch'] = ""; 
        
        $webgen_tf_text_invalid['czech'] = "Text ".$nonstandard['czech'];
        $webgen_tf_text_invalid['english'] = "Text ".$nonstandard['english'];
        $webgen_tf_text_invalid['deutsch'] = "";         
        
        $webgen_tf_photo_que['czech'] = "Vyberte, zde chcete";
        $webgen_tf_photo_que['english'] = "Choose the option";
        $webgen_tf_photo_que['deutsch'] = "";

        $webgen_tf_photo_que_valid['czech'] = "Byla vybrána možnost";
        $webgen_tf_photo_que_valid['english'] = "You choose";
        $webgen_tf_photo_que_valid['deutsch'] = "";
        
        $tf_photo_a['czech'] = "Vložit fotografii z Internetu";
        $tf_photo_a['english'] = "Insert the photo from the Internet";
        $tf_photo_a['deutsch'] = "";
        
        $tf_photo_b['czech'] = "Vložit fotografii z vlastního počítače";
        $tf_photo_b['english'] = "Insert the photo from your computer";
        $tf_photo_b['deutsch'] = "";       
        
        $tf_photo_c['czech'] = "Nevkládat ilustrativní fotografii";
        $tf_photo_c['english'] = "No photo";
        $tf_photo_c['deutsch'] = "";        
        
        $webgen_tf_align_que['czech'] = "Zadejte, zda chcete";
        $webgen_tf_align_que['english'] = "Choose, if you want to";
        $webgen_tf_align_que['deutsch'] = "";

        $webgen_tf_align_que_valid['czech'] = "Byla vybrána možnost";
        $webgen_tf_align_que_valid['english'] = "You choose to";
        $webgen_tf_align_que_valid['deutsch'] = ""; 
        
        $tf_align_a['czech'] = "Zarovnat text vlevo, a případnou fotografii umístit vpravo";
        $tf_align_a['english'] = "Align the text to the left and the photo will be on the right side (if it is entered)";
        $tf_align_a['deutsch'] = "";         
           
        $tf_align_b['czech'] = "Zarovnat text vpravo, a případnou fotografii umístit vlevo";
        $tf_align_b['english'] = "Align the text to the right and the photo will be on the left side (if it is entered)";
        $tf_align_b['deutsch'] = "";
        
        $tf_align_c['czech'] = "Zarovnat text vlevo";
        $tf_align_c['english'] = "Align the text to the left";
        $tf_align_c['deutsch'] = "";     
        
        $tf_align_d['czech'] = "Zarovnat text vpravo";
        $tf_align_d['english'] = "Align the text to the right";
        $tf_align_d['deutsch'] = "";
                
        $tf_align_check_c['czech'] = "Text bude zarovnán napravo.";
        $tf_align_check_c['english'] = "Text will be aligned to the right.";
        $tf_align_check_c['deutsch'] = "";
        
        $tf_align_check_d['czech'] = "Text bude zarovnán nalevo.";
        $tf_align_check_d['english'] = "Text will be aligned to the left.";
        $tf_align_check_d['deutsch'] = "";        
        
        $webgen_tf_add_button['czech'] = "Vložit další blok textu";
        $webgen_tf_add_button['english'] = "Add another text";
        $webgen_tf_add_button['deutsch'] = "";
        
        $webgen_tf_add_button_info['czech'] = "Tlačítko vložit další blok textu";
        $webgen_tf_add_button_info['english'] = "Add another text button";
        $webgen_tf_add_button_info['deutsch'] = "";               
        
        // ********************************** WEBGEN_FAVPHOTO *************************************************
     
        $webgen_favphoto_title['czech'] = "Vložení oblíbené fotografie"; 
        $webgen_favphoto_title['english'] = "Favourite picture or photo";
        $webgen_favphoto_title['deutsch'] = "";
        
        $webgen_favphoto_h1_error['czech'] = "Data o oblíbené fotografii nebyla zadána správně.";
        $webgen_favphoto_h1_error['english'] = "Incorect photograph information.";
        $webgen_favphoto_h1_error['deutsch'] = "";
           
        $webgen_favphoto_h2_empty['czech'] = "Nebyl zadán žádný soubor nebo nahrávaný soubor není ve správném formátu. Je nutné vložit obrázek ve formátu gif nebo jpeg.";
        $webgen_favphoto_h2_empty['english'] = "The file name is missing or the picture is in unsupported format. Supported formats are jpeg and gif.";
        $webgen_favphoto_h2_empty['deutsch'] = "";
        
        $webgen_favphoto_h2_big['czech'] = "Nahrávaný soubor je příliš velký. Je nutné vložit obrázek do velikosti 250KB.";
        $webgen_favphoto_h2_big['english'] = "Picture is too big. Maximum picture size is 250 KB.";
        $webgen_favphoto_h2_big['deutsch'] = "";
        
        $webgen_favphoto_h2_alt['czech'] = "Je nutné zadat alternativní popis fotografie.";
        $webgen_favphoto_h2_alt['english'] = "Alternative description is required.";
        $webgen_favphoto_h2_alt['deutsch'] = "";
        
        $webgen_favphoto_h2_unknown['czech'] = "Nastal neznámý problém s nahráním souboru. Prosím, pokuste se jej nahrát ještě jednou.";
        $webgen_favphoto_h2_unknown['english'] = "Uknown error. Please try to load the picture again.";
        $webgen_favphoto_h2_unknown['deutsch'] = "";
        
        $webgen_favphoto_h2_src['czech'] = "Zadání adresy oblíbeného obrázku je povinné. Prosím, zadejte ji.";
        $webgen_favphoto_h2_src['english'] = "Picture address missing. Please fill it in.";
        $webgen_favphoto_h2_src['deutsch'] = "";
        
        $webgen_favphoto_photo_alt['czech'] = "Vložte popis obrázku. ".$mandatory['czech'];
        $webgen_favphoto_photo_alt['english'] = "Enter the description of the picture. ".$mandatory['english'];
        $webgen_favphoto_photo_alt['deutsch'] = "";
        
        $webgen_favphoto_photo_src['czech'] = "Nyní zadejte internetovou adresu (URL) obrázku. ".$mandatory['czech'];
        $webgen_favphoto_photo_src['english'] = "Image address (URL). ".$mandatory['english'];
        $webgen_favphoto_photo_src['deutsch'] = "";
        
        $webgen_favphoto_photo_file['czech'] = "Nyní vyberte soubor.";
        $webgen_favphoto_photo_file['english'] = "Select a file";
        $webgen_favphoto_photo_file['deutsch'] = "";
        
        $webgen_favphoto_empty_alt['czech'] = "Popis obrázku ".$nothing_he['czech'];
        $webgen_favphoto_empty_alt['english'] = "Image description ".$nothing_he['czech'];
        $webgen_favphoto_empty_alt['deutsch'] = "";
        
        $webgen_favphoto_valid_alt['czech'] = "Popis obrázku je";
        $webgen_favphoto_valid_alt['english'] = "Image description is";
        $webgen_favphoto_valid_alt['deutsch'] = "";
        
        $webgen_favphoto_invalid_alt['czech'] = "Alternativní popis ".$nonstandard['czech'];
        $webgen_favphoto_invalid_alt['english'] = "The picture alternative description ".$nonstandard['english'];
        $webgen_favphoto_invalid_alt['deutsch'] = "";
        
        $webgen_favphoto_empty_src['czech'] = "Adresa obrázku ".$nothing_she['czech'];
        $webgen_favphoto_empty_src['english'] = "Address ".$nothing_she['english'];
        $webgen_favphoto_empty_src['deutsch'] = "";
        
        $webgen_favphoto_valid_src['czech'] = "Webová adresa obrázku je";
        $webgen_favphoto_valid_src['english'] = "Image URL is";
        $webgen_favphoto_valid_src['deutsch'] = "";
        
        $webgen_favphoto_invalid_src['czech'] = "Internetový odkaz ".$nonstandard['czech'];
        $webgen_favphoto_invalid_src['english'] = "Link ".$nonstandard['english'];
        $webgen_favphoto_invalid_src['deutsch'] = ""; 
        
  // *************************** WEBGEN_FEATURES *************************************
  
        $feat_title['czech'] = "Zadání informací o vkládaných aplikacích";     
        $feat_title['english'] = "Information about applications";
        $feat_title['deutsch'] = ""; 
        
        $feat_hour_que['czech'] = "Vyberte typ hodin pro Vaši stánku";
        $feat_hour_que['english'] = "Choose the type of your clock.";
        $feat_hour_que['deutsch'] = "";
        
        $feat_hour_a['czech'] = "Analogové hodiny";
        $feat_hour_a['english'] = "Analogue clocks";
        $feat_hour_a['deutsch'] = "";
        
        $feat_hour_b['czech'] = "Digitální hodiny";
        $feat_hour_b['english'] = "Digital clocks";
        $feat_hour_b['deutsch'] = "";
        
        $feat_hour_choice['czech'] = "Zvoleny";
        $feat_hour_choice['english'] = "You choose";
        $feat_hour_choice['deutsch'] = "";        
        
        $feat_que['czech'] = "Zadejte anketní otázku.";
        $feat_que['english'] = "Enter the question to your questionary.";
        $feat_que['deutsch'] = "";
        
        $feat_que_empty['czech'] = "Anketní otázka nebyla zadána.";
        $feat_que_empty['english'] = "Question have not been entered.";
        $feat_que_empty['deutsch'] = "";
        
        $feat_que_valid['czech'] = "Anketní otázka zní";
        $feat_que_valid['english'] = "Entered question is";
        $feat_que_valid['deutsch'] = "";
        
        $feat_que_invalid['czech'] = "Anketní otázka nebyla zadána ve správném formátu.";
        $feat_que_invalid['english'] = "Question have not been entered in correct format.";
        $feat_que_invalid['deutsch'] = "";
 
        
        $feat_answ['czech'] = "Zadejte první možnou odpověd na anketní otázku. Jakmile žádnou nezadáte bude zjišťování odpovědí ukončeno.";
        $feat_answ['english'] = "Enter the first possible answer to the questionary question. Acquiring answers will be finished when next question is not filled in.";
        $feat_answ['deutsch'] = "";
        
        $feat_answ_next['czech'] = "Zadejte další odpověď.";
        $feat_answ_next['english'] = "Enter the next answer.";
        $feat_answ_next['deutsch'] = "";
                
        $feat_answ_empty['czech'] = "Odpověď nebyla zadána.";
        $feat_answ_empty['english'] = "Answer has not been entered.";
        $feat_answ_empty['deutsch'] = "";        
        
        $feat_answ_emptyfirst['czech'] = "Nebyla zadána žádná možná odpověď na dotazník. Prosím vložte alespoň jednu možnou odpověď do formuláře.";
        $feat_answ_emptyfirst['english'] = "Any answer has not been entered. Please enter at least one possible answer to your question.";
        $feat_answ_emptyfirst['deutsch'] = "";
        
        $feat_answ_valid['czech'] = "Odpověď zní";
        $feat_answ_valid['english'] = "Answer is";
        $feat_answ_valid['deutsch'] = "";
        
        $feat_answ_invalid['czech'] = "Odpověď nebyla zadána ve správném formátu.";
        $feat_answ_invalid['english'] = "Answer is not in correct format.";
        $feat_answ_invalid['deutsch'] = "";
        
        $feat_answ_end['czech'] = "Zadávání odpovědí bylo ukončeno. ";
        $feat_answ_end['english'] = "Entering answers have been finished.";
        $feat_answ_end['deutsch'] = "";
 
 
        
        
             

  // *************************** WEBGEN_CSS ******************************************

        $webgen_css_title['czech'] = "Výběr grafického stylu";
        $webgen_css_title['english'] = "Graphical style";
        $webgen_css_title['deutsch'] = "";
        
        $webgen_css_h1['czech'] = "Vyberte jeden z následujících grafických stylů pro vzhled Vaší stránky.";
        $webgen_css_h1['english'] = "Choose one of the graphical styles for your presentation.";
        $webgen_css_h1['deutsch'] = "";
        
        $webgen_css_choice_pp1['czech'] = "Tmavomodře ladělý styl vhodný pro stránku s fotografií";
        $webgen_css_choice_pp1['english'] = "Dark blue style suitable for pages that contain photo.";
        $webgen_css_choice_pp1['deutsch'] = "";
        
        $webgen_css_choice_pp1_info['czech'] = "Tmavě modrý styl s hlavičkou, centralní častí obsahující základní informace a pravým sloupcem obsahujícím odkazy a aplikace. V hlavičče je fotografie umístěna na pravé straně.";
        $webgen_css_choice_pp1_info['english'] = "Blue style with heading and central part that contains basic information about you. Right side bar contains links and applications. The photo is on the right side of the heading.";
        $webgen_css_choice_pp1_info['deutsch'] = "";       
        
        $webgen_css_choice_pp2['czech'] = "Do zelena laděný styl s motivem slunečnice vhodný pro stránku bez fotografie.";
        $webgen_css_choice_pp2['english'] = "Green style suitable for pages without photo with sun-flower motive.";
        $webgen_css_choice_pp2['deutsch'] = "";
        
        $webgen_css_choice_pp2_info['czech'] = "Zelený styl styl s motivem slunečnice s hlavičkou, centralní častí obsahující základní informace a pravým sloupcem obsahujícím odkazy a aplikace.";
        $webgen_css_choice_pp2_info['english'] = "Green style with heading and central part that contains basic information about you. Right side bar contains links and applications.";
        $webgen_css_choice_pp2_info['deutsch'] = "";
        
        $webgen_css_choice_pp3['czech'] = "Světle modře ladený styl pro stránku s fotografií.";
        $webgen_css_choice_pp3['english'] = "Light blue style suitable for pages with photo.";
        $webgen_css_choice_pp3['deutsch'] = "";
        
        $webgen_css_choice_pp3_info['czech'] = "Světle modrý styl s hlavičkou, centralní častí obsahující základní informace a pravým sloupcem obsahujícím odkazy a aplikace. V hlavičče je fotografie umístěna na pravé straně. Barva pozadí je stínována od nejsytější modré nahoře po bílou u zápatí stránky.";
        $webgen_css_choice_pp3_info['english'] = "Light blue style with heading and central part that contains basic information about you. Right side bar contains links and applications. The photo is on the right side of the heading.";
        $webgen_css_choice_pp3_info['deutsch'] = "";
        
        $webgen_css_choice_pp4['czech'] = "Tyrkysově laděný styl vhodný pro stránku bez fotografie.";
        $webgen_css_choice_pp4['english'] = "Turqouise style suitable for pages without photo.";
        $webgen_css_choice_pp4['deutsch'] = "";
       
        $webgen_css_choice_pp4_info['czech'] = "Tyrkysový styl s hlavičkou, centralní častí obsahující základní informace a levým sloupcem obsahujícím odkazy a aplikace. Barva pozadí je tmavě modrá a jednotlivé typy informací jsou rovněž barevně odlišeny. Stránka obsahuje zápatí.";
        $webgen_css_choice_pp4_info['english'] = "Turqouise style with heading and central part that contains basic information about you. Left side bar contains links and applications. Different types of information are distinct using colors and page contains dark blue background.";
        $webgen_css_choice_pp4_info['deutsch'] = "";

        $webgen_css_choice_pp5['czech'] = "Do fialova laděný styl s motivem motýlů.";
        $webgen_css_choice_pp5['english'] = "Violet style with butterfly motive.";
        $webgen_css_choice_pp5['deutsch'] = "";
       
        $webgen_css_choice_pp5_info['czech'] = "Fialový styl s motivem motýlů. Obsahuje hlavičku, centralní část obsahující základní informace a levý sloupec obsahující odkazy a aplikace. Stránka má taktéž zápatí.";
        $webgen_css_choice_pp5_info['english'] = "Violet style with heading and central part that contains basic information about you. Left side bar contains links and applications. The page style is based on butterfly motive.";
        $webgen_css_choice_pp5_info['deutsch'] = "";
        
        $webgen_css_choice_pp6['czech'] = "Modře laděný styl.";
        $webgen_css_choice_pp6['english'] = "Violet style with butterfly motive.";
        $webgen_css_choice_pp6['deutsch'] = "";
       
        $webgen_css_choice_pp6_info['czech'] = "Modrý styl s hlavičkou, centralní častí obsahující základní informace a levým sloupcem obsahujícím odkazy a aplikace. V hlavičče je fotografie umístěna na levé straně. Fotka v hlavičce je na levé straně.";
        $webgen_css_choice_pp6_info['english'] = "Blue style with heading and central part that contains basic information about you. Left side bar contains links and applications. The photo is on the left side of the heading.";
        $webgen_css_choice_pp6_info['deutsch'] = "";

        $webgen_css_choice_info['czech'] = "Zvolili jste ";
        $webgen_css_choice_info['english'] = "You choose ";
        $webgen_css_choice_info['deutsch'] = "";





       // ********************************** WEBGEN_LINKS *************************************************
       
        $webgen_links_title['czech'] = "Výběr odkazů na stránku";
        $webgen_links_title['english'] = "Links";
        $webgen_links_title['deutsch'] = "";
        
        $webgen_links_h1['czech'] = "Vyberte odkazy, které chcete vložit do Vaší stránky.";         
        $webgen_links_h1['english'] = "Choose links that will be given into your presentation.";
        $webgen_links_h1['deutsch'] = "";
        
        $webgen_links_organisations['czech'] = "Organizace pomáhající nevidomým či jinak hendikepovaným lidem"; 
        $webgen_links_organisations['english'] = "Organization that helps blind people";
        $webgen_links_organisations['deutsch'] = "";
        
        $webgen_links_social['czech'] = "Sociální sítě"; 
        $webgen_links_social['english'] = "Social network";
        $webgen_links_social['deutsch'] = "";
        
        $webgen_links_chat['czech'] = "Chaty a diskuze"; 
        $webgen_links_chat['english'] = "Chat";
        $webgen_links_chat['deutsch'] = "";
        
        $webgen_links_browser['czech'] = "Prohlížeče Internetu"; 
        $webgen_links_browser['english'] = "Browser";
        $webgen_links_browser['deutsch'] = "";
        
        $webgen_links_news['czech'] = "Zpravodajské servery"; 
        $webgen_links_news['english'] = "News server";
        $webgen_links_news['deutsch'] = "";
        
        $webgen_links_search['czech'] = "Vyhledavače"; 
        $webgen_links_search['english'] = "Search engines";
        $webgen_links_search['deutsch'] = "";
        
        $webgen_links_dictionary['czech'] = "Slovníky"; 
        $webgen_links_dictionary['english'] = "Dictionary";
        $webgen_links_dictionary['deutsch'] = "";
        
        $webgen_links_maps['czech'] = "Mapy"; 
        $webgen_links_maps['english'] = "Map";
        $webgen_links_maps['deutsch'] = "";
        
        $webgen_links_client['czech'] = "Klientské programy pro online protokoly"; 
        $webgen_links_client['english'] = "Client aplication";
        $webgen_links_client['deutsch'] = "";
        
        $webgen_links_gallery['czech'] = "Galerie fotografií"; 
        $webgen_links_gallery['english'] = "Photo gallery";
        $webgen_links_gallery['deutsch'] = "";
        
        $webgen_links_game['czech'] = "Internetové hry"; 
        $webgen_links_game['english'] = "Web game";
        $webgen_links_game['deutsch'] = "";

        $webgen_links_other['czech'] = "Ostatní odkazy"; 
        $webgen_links_other['english'] = "Other links";
        $webgen_links_other['deutsch'] = "";
         
        $webgen_links_organisations_sons['czech'] = "Sjednocená organizace nevidomých a slabozrakých"; 
        $webgen_links_organisations_sons['english'] = "Sjednocená organizace nevidomých a slabozrakých";
        $webgen_links_organisations_sons['deutsch'] = "";
         
        $webgen_links_organisations_brailnet['czech'] = "BraillNet"; 
        $webgen_links_organisations_brailnet['english'] = "BraillNet";
        $webgen_links_organisations_brailnet['deutsch'] = "";
         
        $webgen_links_organisations_tyflo['czech'] = "TyfloCentrum Brno"; 
        $webgen_links_organisations_tyflo['english'] = "TyfloCentrum Brno";
        $webgen_links_organisations_tyflo['deutsch'] = "";
         
        $webgen_links_organisations_teir['czech'] = "Středisko Teiresiás"; 
        $webgen_links_organisations_teir['english'] = "Středisko Teiresiás";
        $webgen_links_organisations_teir['deutsch'] = "";
         
        $webgen_links_organisations_nrozp['czech'] = "Národní rada osob se zdravotním postižením ČR"; 
        $webgen_links_organisations_nrozp['english'] = "Národní rada osob se zdravotním postižením ČR";
        $webgen_links_organisations_nrozp['deutsch'] = "";
         
        $webgen_links_social_lide['czech'] = "Lidé"; 
        $webgen_links_social_lide['english'] = "Lidé";
        $webgen_links_social_lide['deutsch'] = "";
         
        $webgen_links_social_spoluzaci['czech'] = "Spolužáci"; 
        $webgen_links_social_spoluzaci['english'] = "Spolužáci";
        $webgen_links_social_spoluzaci['deutsch'] = "";
         
        $webgen_links_social_libimseti['czech'] = "Líbím se ti"; 
        $webgen_links_social_libimseti['english'] = "Líbím se ti";
        $webgen_links_social_libimseti['deutsch'] = "";
         
        $webgen_links_social_facebook['czech'] = "Facebook"; 
        $webgen_links_social_facebook['english'] = "Facebook";
        $webgen_links_social_facebook['deutsch'] = "";
         
        $webgen_links_social_myspace['czech'] = "My space";
        $webgen_links_social_myspace['english'] = "My space";
        $webgen_links_social_myspace['deutsch'] = "";
        
        $webgen_links_social_lastfm['czech'] = "last.fm";
        $webgen_links_social_lastfm['english'] = "last.fm";
        $webgen_links_social_lastfm['deutsch'] = "";
        
        $webgen_links_chat_xchat['czech'] = "XChat by Centrum"; 
        $webgen_links_chat_xchat['english'] = "XChat by Centrum";
        $webgen_links_chat_xchat['deutsch'] = "";
         
        $webgen_links_chat_forever['czech'] = "4ever chat"; 
        $webgen_links_chat_forever['english'] = "4ever chat";
        $webgen_links_chat_forever['deutsch'] = "";
         
        $webgen_links_browser_expl['czech'] = "Windows Internet Explorer"; 
        $webgen_links_browser_expl['english'] = "Windows Internet Explorer";
        $webgen_links_browser_expl['deutsch'] = "";
         
        $webgen_links_browser_opera['czech'] = "Opera";          
        $webgen_links_browser_opera['english'] = "Opera";
        $webgen_links_browser_opera['deutsch'] = "";
         
        $webgen_links_browser_firefox['czech'] = "Mozilla Firefox"; 
        $webgen_links_browser_firefox['english'] = "Mozilla Firefox";
        $webgen_links_browser_firefox['deutsch'] = "";
         
        $webgen_links_browser_safari['czech'] = "Safari"; 
        $webgen_links_browser_safari['english'] = "Safari";
        $webgen_links_browser_safari['deutsch'] = "";
         
        $webgen_links_browser_chrome['czech'] = "Google Chrome";                   
        $webgen_links_browser_chrome['english'] = "Google Chrome";
        $webgen_links_browser_chrome['deutsch'] = "";
         
        $webgen_links_browser_lynx['czech'] = "Lynx"; 
        $webgen_links_browser_lynx['english'] = "Lynx";
        $webgen_links_browser_lynx['deutsch'] = "";
         
        $webgen_links_browser_konqueror['czech'] = "Konqueror"; 
        $webgen_links_browser_konqueror['english'] = "Konqueror";
        $webgen_links_browser_konqueror['deutsch'] = "";
         
        $webgen_links_news_ihned['czech'] = "iHned"; 
        $webgen_links_news_ihned['english'] = "iHned";
        $webgen_links_news_ihned['deutsch'] = "";
         
        $webgen_links_news_idnes['czech'] = "Idnes";          
        $webgen_links_news_idnes['english'] = "Idnes";
        $webgen_links_news_idnes['deutsch'] = "";
         
        $webgen_links_news_lidovky['czech'] = "Lidovky.cz"; 
        $webgen_links_news_lidovky['english'] = "Lidovky.cz";
        $webgen_links_news_lidovky['deutsch'] = "";
         
        $webgen_links_news_aktualne['czech'] = "Aktuálně.cz"; 
        $webgen_links_news_aktualne['english'] = "Aktuálně.cz";
        $webgen_links_news_aktualne['deutsch'] = "";
         
        $webgen_links_news_tncz['czech'] = "tn.cz";  
        $webgen_links_news_tncz['english'] = "tn.cz";
        $webgen_links_news_tncz['deutsch'] = "";
        
        $webgen_links_news_novinky['czech'] = "Novinky.cz"; 
        $webgen_links_news_novinky['english'] = "Novinky.cz";
        $webgen_links_news_novinky['deutsch'] = "";
         
        $webgen_links_news_blesk['czech'] = "Blesk.cz"; 
        $webgen_links_news_blesk['english'] = "Blesk.cz";
        $webgen_links_news_blesk['deutsch'] = "";
         
        $webgen_links_search_google['czech'] = "Google"; 
        $webgen_links_search_google['english'] = "Google";
        $webgen_links_search_google['deutsch'] = "";
         
        $webgen_links_search_cuil['czech'] = "Cuil";          
        $webgen_links_search_cuil['english'] = "Cuil";
        $webgen_links_search_cuil['deutsch'] = "";
         
        $webgen_links_search_msn['czech'] = "Msn search"; 
        $webgen_links_search_msn['english'] = "Msn search";
        $webgen_links_search_msn['deutsch'] = "";
         
        $webgen_links_search_wikia['czech'] = "Wikia Search"; 
        $webgen_links_search_wikia['english'] = "Wikia Search";
        $webgen_links_search_wikia['deutsch'] = "";
         
        $webgen_links_search_yahoo['czech'] = "Yahoo! Search";
        $webgen_links_search_yahoo['english'] = "Yahoo! Search";
        $webgen_links_search_yahoo['deutsch'] = "";
        
        $webgen_links_search_seznam['czech'] = "Seznam"; 
        $webgen_links_search_seznam['english'] = "Seznam";
        $webgen_links_search_seznam['deutsch'] = "";
         
        $webgen_links_search_centrum['czech'] = "Centrum"; 
        $webgen_links_search_centrum['english'] = "Centrum";
        $webgen_links_search_centrum['deutsch'] = "";
         
        $webgen_links_search_atlas['czech'] = "Atlas";
        $webgen_links_search_atlas['english'] = "Atlas";
        $webgen_links_search_atlas['deutsch'] = "";
        
        $webgen_links_search_idos['czech'] = "Idos - jízdní řády";
        $webgen_links_search_idos['english'] = "Idos";
        $webgen_links_search_idos['deutsch'] = "";
        
        $webgen_links_dictionary_slovnik['czech'] = "Překladatelský slovník - slovnik.cz"; 
        $webgen_links_dictionary_slovnik['english'] = "Překladatelský slovník - slovnik.cz";
        $webgen_links_dictionary_slovnik['deutsch'] = "";
         
        $webgen_links_dictionary_sezslovnik['czech'] = "Překladatelský slovník na portálu seznam.cz"; 
        $webgen_links_dictionary_sezslovnik['english'] = "Překladatelský slovník na portálu seznam.cz";
        $webgen_links_dictionary_sezslovnik['deutsch'] = "";
         
        $webgen_links_dictionary_cizichslov['czech'] = "Slovník cizích slov"; 
        $webgen_links_dictionary_cizichslov['english'] = "Slovník cizích slov";
        $webgen_links_dictionary_cizichslov['deutsch'] = "";
        
        $webgen_links_dictionary_merr['czech'] = "Merriam - Webster";
        $webgen_links_dictionary_merr['english'] = "Merriam - Webster";
        $webgen_links_dictionary_merr['deutsch'] = "";
         
        $webgen_links_maps_mapy['czech'] = "Mapy.cz - mapy portálu Seznam";          
        $webgen_links_maps_mapy['english'] = "Mapy.cz - mapy portálu Seznam";
        $webgen_links_maps_mapy['deutsch'] = "";
         
        $webgen_links_maps_amapy['czech'] = "AMapy.cz - mapy portálu Atlas"; 
        $webgen_links_maps_amapy['english'] = "AMapy.cz - mapy portálu Atlas";
        $webgen_links_maps_amapy['deutsch'] = "";
         
        $webgen_links_maps_earth['czech'] = "Google Earth"; 
        $webgen_links_maps_earth['english'] = "Google Earth";
        $webgen_links_maps_earth['deutsch'] = "";
         
        $webgen_links_client_icq['czech'] = "Stránka oficiálního ICQ klienta";
        $webgen_links_client_icq['english'] = "Stránka oficiálního ICQ klienta";
        $webgen_links_client_icq['deutsch'] = "";
        
        $webgen_links_client_miranda['czech'] = "Všestranný komunikátor Miranda"; 
        $webgen_links_client_miranda['english'] = "Všestranný komunikátor Miranda";
        $webgen_links_client_miranda['deutsch'] = "";
         
        $webgen_links_client_qip['czech'] = "Všestranný komunikátor QIP"; 
        $webgen_links_client_qip['english'] = "Všestranný komunikátor QIP";
        $webgen_links_client_qip['deutsch'] = "";
         
        $webgen_links_client_skype['czech'] = "Skype - oficiální stránka"; 
        $webgen_links_client_skype['english'] = "Skype - oficiální stránka";
        $webgen_links_client_skype['deutsch'] = "";
         
        $webgen_links_client_jabber['czech'] = "Informace o protokolu Jabber";          
        $webgen_links_client_jabber['english'] = "Informace o protokolu Jabber";
        $webgen_links_client_jabber['deutsch'] = "";
         
        $webgen_links_gallery_flickr['czech'] = "Flickr"; 
        $webgen_links_gallery_flickr['english'] = "Flickr";
        $webgen_links_gallery_flickr['deutsch'] = "";
         
        $webgen_links_gallery_picasa['czech'] = "Picasa"; 
        $webgen_links_gallery_picasa['english'] = "Picasa";
        $webgen_links_gallery_picasa['deutsch'] = "";
         
        $webgen_links_gallery_rajce['czech'] = "Rajce.net";         
        $webgen_links_gallery_rajce['english'] = "Rajce.net";
        $webgen_links_gallery_rajce['deutsch'] = "";
         
        $webgen_links_gallery_mojefoto['czech'] = "Mojefoto.net"; 
        $webgen_links_gallery_mojefoto['english'] = "Mojefoto.net";
        $webgen_links_gallery_mojefoto['deutsch'] = "";
         
        $webgen_links_gallery_fotomat['czech'] = "Fotomat.com"; 
        $webgen_links_gallery_fotomat['english'] = "Fotomat.com";
        $webgen_links_gallery_fotomat['deutsch'] = "";
         
        $webgen_links_game_travian['czech'] = "Travian"; 
        $webgen_links_game_travian['english'] = "Travian";
        $webgen_links_game_travian['deutsch'] = "";
         
        $webgen_links_game_darkorbit['czech'] = "Dark Orbit";          
        $webgen_links_game_darkorbit['english'] = "Dark Orbit";
        $webgen_links_game_darkorbit['deutsch'] = "";
         
        $webgen_links_game_ikariam['czech'] = "Ikariam"; 
        $webgen_links_game_ikariam['english'] = "Ikariam";
        $webgen_links_game_ikariam['deutsch'] = "";
         
        $webgen_links_game_bittefight['czech'] = "Bitefight"; 
        $webgen_links_game_bittefight['english'] = "Bitefight";
        $webgen_links_game_bittefight['deutsch'] = "";
         
        $webgen_links_game_darkelf['czech'] = "Dark Elf";         
        $webgen_links_game_darkelf['english'] = "Dark Elf";
        $webgen_links_game_darkelf['deutsch'] = "";
                  
        $webgen_links_game_stargate['czech'] = "Star Gate Wars"; 
        $webgen_links_game_stargate['english'] = "Star Gate Wars";
        $webgen_links_game_stargate['deutsch'] = "";
        
        $webgen_links_other_wikipedia['czech'] = "Wikipedie - Otevřená encyklopedie";         
        $webgen_links_other_wikipedia['english'] = "Wikipedia - The Free Encyclopedia";
        $webgen_links_other_wikipedia['deutsch'] = "";
                  
        $webgen_links_other_youtube['czech'] = "You Tube"; 
        $webgen_links_other_youtube['english'] = "You Tube";
        $webgen_links_other_youtube['deutsch'] = "";        
        
        $webgen_links_undef['czech'] = "Nyní budete zadávat odkazy. Zadejte popis Vašeho prvního odkazu. Jakmile žádný nezadáte, bude zjišťování odkazů ukončeno.";
        $webgen_links_undef['english'] = "Enter the description of your first link. If you leave it blank, no other link will be required.";
        $webgen_links_undef['deutsch'] = "";
        
        $webgen_links_undef_emptyfirst['czech'] = "Nebyl zadán žádný odkaz.";
        $webgen_links_undef_emptyfirst['english'] = "Link has not been entered.";
        $webgen_links_undef_emptyfirst['deutsch'] = "";
        
        $webgen_links_undef_empty['czech'] = "Popis nebyl zadán.";
        $webgen_links_undef_empty['english'] = "Description has not been entered.";
        $webgen_links_undef_empty['deutsch'] = "";
        
        $webgen_links_undef_end['czech'] = "Zadávání odkazů bylo ukončeno.";
        $webgen_links_undef_end['english'] = "Entering has been finished.";
        $webgen_links_undef_end['deutsch'] = "";
        
        $webgen_links_undef_description['czech'] = "Zadejte popis dalšího odkazu.";
        $webgen_links_undef_description['english'] = "Enter the description of the next link.";
        $webgen_links_undef_description['deutsch'] = "";
        
        $webgen_links_undef_description_valid['czech'] = "Popis je";
        $webgen_links_undef_description_valid['english'] = "Description is";
        $webgen_links_undef_description_valid['deutsch'] = "";
        
        $webgen_links_undef_description_invalid['czech'] = "Popis obsahuje nestandardní znaky. Prosím zkontrolujte, zda byl zadán v pořádku.";
        $webgen_links_undef_description_invalid['english'] = "Description contains non-standard characters. Please check it.";
        $webgen_links_undef_description_invalid['deutsch'] = "";
        
        $webgen_links_undef_url['czech'] = "Zadejte webovou adresu odkazu.";
        $webgen_links_undef_url['english'] = "Insert the web address of your link.";
        $webgen_links_undef_url['deutsch'] = "";
        
        $webgen_links_undef_url_empty['czech'] = "Webová adresa nebyla zadána. Odkaz nebude do prezentace vložen.";
        $webgen_links_undef_url_empty['english'] = "Web address has not been entered and will not be generated.";
        $webgen_links_undef_url_empty['deutsch'] = "";
        
        $webgen_links_undef_url_valid['czech'] = "Webová adresa je";
        $webgen_links_undef_url_valid['english'] = "Web address is";
        $webgen_links_undef_url_valid['deutsch'] = "";
        
        $webgen_links_undef_url_invalid['czech'] = "Webová adresa nebyla zadána ve správném tvaru, prosím zkontrolujte ji.";        
        $webgen_links_undef_url_invalid['english'] = "Web address has not been given in correct format. Please, check it.";
        $webgen_links_undef_url_invalid['deutsch'] = ""; 

        // *************************** WEBGEN_CSS ******************************************

        $webgen_css_title['czech'] = "Výběr grafického stylu";
        $webgen_css_title['english'] = "Graphical style";
        $webgen_css_title['deutsch'] = "";
        
        $webgen_css_h1['czech'] = "Vyberte jeden z následujících grafických stylů pro vzhled Vaší stránky.";
        $webgen_css_h1['english'] = "Choose one graphical style for your presentation.";
        $webgen_css_h1['deutsch'] = "";
        
        $webgen_css_choice_roman['czech'] = "Styl vhodný pro stránku s fotografií";
        $webgen_css_choice_roman['english'] = "Style suitable for pages that contain photo.";
        $webgen_css_choice_roman['deutsch'] = "";
        
        $webgen_css_choice_petr['czech'] = "Styl vhodný pro stránku bez fotografie";
        $webgen_css_choice_petr['english'] = "Style suitable for pages without photo.";
        $webgen_css_choice_petr['deutsch'] = "";

  // *************************** WEBGEN_SHOWHTML ******************************************

        $webgen_showhtml_title['czech'] = "Odkaz na vygenerovanou prezentaci";
        $webgen_showhtml_title['english'] = "Generated presentation link";
        $webgen_showhtml_title['deutsch'] = "";
      
        $webgen_showhtml_h1['czech'] = "Vaše prezentace byla vygenerována.";
        $webgen_showhtml_h1['english'] = "Your presentation has been created.";
        $webgen_showhtml_h1['deutsch'] = "";
      
        $webgen_showhtml_link['czech'] = "Zobrazení Vaší stránky.";
        $webgen_showhtml_link['english'] = "Redirecting to your page.";
        $webgen_showhtml_link['deutsch'] = "";
        
        $webgen_showhtml_link_valid['czech'] = "Byla vybrána možnost";
        $webgen_showhtml_link_valid['english'] = "You choose the option";
        $webgen_showhtml_link_valid['deutsch'] = "";

        $webgen_showhtml_choice['czech'] = "Vyberte možnost, jak chcete získat vygenerovanou stránku";
        $webgen_showhtml_choice['english'] = "Choose the way, how you want to acquire you presentation";
        $webgen_showhtml_choice['deutsch'] = "";         
        
        $webgen_showhtml_choice_a['czech'] = "Odeslat odkaz a zkomprimovanou prezentaci na email.";
        $webgen_showhtml_choice_a['english'] = "Sent the link and .zip file to your email.";
        $webgen_showhtml_choice_a['deutsch'] = "";
        
        $webgen_showhtml_choice_b['czech'] = "Odeslat na email pouze odkaz.";
        $webgen_showhtml_choice_b['english'] = "Send the link only.";
        $webgen_showhtml_choice_b['deutsch'] = "";
        
        $webgen_showhtml_choice_c['czech'] = "Stránku neukládat na serveru, jen ji poslat na email.";
        $webgen_showhtml_choice_c['english'] = "Send page to your mail and do not show it the server.";
        $webgen_showhtml_choice_c['deutsch'] = "";
        
        $webgen_showhtml_choice_d['czech'] = "Pouze zobrazit vygenerovanou stránku.";
        $webgen_showhtml_choice_d['english'] = "Show the link to the presentation.";
        $webgen_showhtml_choice_d['deutsch'] = "";
        
        $webgen_showhtml_choice_email['czech'] = "Vyberte email, na který chcete poslat odkaz či vygenerovanou prezentaci";
        $webgen_showhtml_choice_email['english'] = "Choose your email.";
        $webgen_showhtml_choice_email['deutsch'] = "";

        $webgen_showhtml_choice_email_valid['czech'] = "Byl vybrán email";
        $webgen_showhtml_choice_email_valid['english'] = "You choose email";
        $webgen_showhtml_choice_email_valid['deutsch'] = "";
        
        $webgen_showhtml_choice_email_a['czech'] = "Zadaný email ";
        $webgen_showhtml_choice_email_a['english'] = "Email from the personal information";
        $webgen_showhtml_choice_email_a['deutsch'] = "";
        
        $webgen_showhtml_choice_email_b['czech'] = "Zadaný email ";
        $webgen_showhtml_choice_email_b['english'] = "Email from your CV";
        $webgen_showhtml_choice_email_b['deutsch'] = "";

        $webgen_showhtml_choice_email_c['czech'] = "Jiný email";
        $webgen_showhtml_choice_email_c['english'] = "Other email";
        $webgen_showhtml_choice_email_c['deutsch'] = "";
        
        $webgen_showhtml_button['czech'] = "Poslat informace na email a zobrazit stránku";
        $webgen_showhtml_button['english'] = "Send email and show the presentation";
        $webgen_showhtml_button['deutsch'] = "";   
        
        
  // ************************* Send_to_Email ***********************************************      
        
        
        $webgen_send_to_title['czech'] = "Odeslání emailu a přesměrovaní na vygenerovanou stránku";
        $webgen_send_to_title['english'] = "Email sending and redirection to your presentation";
        $webgen_send_to_title['deutsch'] = "";
        
        $webgen_send_to_predmet['czech'] = "Odkaz na vygenerovanou stránku aplikací WebGen";
        $webgen_send_to_predmet['english'] = "Link to the generated presentation by the WebGen system";
        $webgen_send_to_predmet['deutsch'] = "";
        
        $webgen_send_to_text['czech'] = "Adresa na vygenerovanou stranku je";
        $webgen_send_to_text['english'] = "Link to your presentation is";
        $webgen_send_to_text['deutsch'] = "";
        
        $webgen_send_to_email_send['czech'] = "E-mail byl odeslán.";
        $webgen_send_to_email_send['english'] = "Email has been send";
        $webgen_send_to_email_send['deutsch'] = "";
        
        $webgen_send_to_email_error['czech'] = "Nepodařilo se e-mail odeslat, ověřte zda jste připojeni k síti.";
        $webgen_send_to_email_error['english'] = "Email cannot be sent, please check your Internet connection.";
        $webgen_send_to_email_error['deutsch'] = "";
        
        $webgen_send_to_zip_error['czech'] = "Nelze vytvořit .zip archív. Prosím, kontaktujte vývojáře.";
        $webgen_send_to_zip_error['english'] = "The .zip archive cannot be created. Please contact the authors.";
        $webgen_send_to_zip_error['deutsch'] = "";
        
        $webgen_send_to_button['czech'] = "Pokračovat na zobrazení vygenerované stránky.";
        $webgen_send_to_button['english'] = "Continue to the generated presentation.";
        $webgen_send_to_button['deutsch'] = ""; 
                                     
     
  // ************************** GENEROVANI HTML A XML **************************************   
     
        // ******* CONTACT a HEADER *************
     
        $webgen_photo_silueta['czech'] = "Silueta";
        $webgen_photo_silueta['english'] = "Siluette";
        $webgen_photo_silueta['deutsch'] = "";
        
        $webgen_name_personal_page['czech'] = "Osobní stránka";
        $webgen_name_personal_page['english'] = "Personal Page";
        $webgen_name_personal_page['deutsch'] = "";    
      
        $webgen_name_menu_aboutme['czech'] = "O mně";
        $webgen_name_menu_aboutme['english'] = "About Me";
        $webgen_name_menu_aboutme['deutsch'] = ""; 
        
        $webgen_name_menu_discus['czech'] = "Diskuze";
        $webgen_name_menu_aboutme['english'] = "Discussion";
        $webgen_name_menu_aboutme['deutsch'] = "";
        
        $webgen_contact_contact_info_generation['czech'] = "Kontaktní informace";
        $webgen_contact_contact_info_generation['english'] = "Contact Information";
        $webgen_contact_contact_info_generation['deutsch'] = "";
        
        $webgen_contact_name_generation['czech'] = "Jméno";
        $webgen_contact_name_generation['english'] = "Full Name";
        $webgen_contact_name_generation['deutsch'] = "";
        
        $webgen_contact_email_generation['czech'] = "Email";
        $webgen_contact_email_generation['english'] = "E-mail";
        $webgen_contact_email_generation['deutsch'] = "";
        
        $webgen_contact_address_generation['czech'] = "Adresa";
        $webgen_contact_address_generation['english'] = "Home Address";
        $webgen_contact_address_generation['deutsch'] = "";
        
        $webgen_contact_cellular_generation['czech'] = "Mobilní telefon";
        $webgen_contact_cellular_generation['english'] = "Cell Phone";
        $webgen_contact_cellular_generation['deutsch'] = "";
        
        $webgen_contact_phone_generation['czech'] = "Pevná linka";
        $webgen_contact_phone_generation['english'] = "Home Phone";
        $webgen_contact_phone_generation['deutsch'] = "";
        
        $webgen_contact_fax_generation['czech'] = "Fax";
        $webgen_contact_fax_generation['english'] = "Fax";
        $webgen_contact_fax_generation['deutsch'] = "";
        
        $webgen_contact_icq_generation['czech'] = "ICQ";
        $webgen_contact_icq_generation['english'] = "ICQ";
        $webgen_contact_icq_generation['deutsch'] = "";
        
        $webgen_contact_skype_generation['czech'] = "Skype";
        $webgen_contact_skype_generation['english'] = "Skype";
        $webgen_contact_skype_generation['deutsch'] = "";
        
        $webgen_contact_msn_generation['czech'] = "MSN";
        $webgen_contact_msn_generation['english'] = "MSN";
        $webgen_contact_msn_generation['deutsch'] = "";
        
        $webgen_contact_irc_generation['czech'] = "IRC";
        $webgen_contact_irc_generation['english'] = "IRC";
        $webgen_contact_irc_generation['deutsch'] = "";
        
        $webgen_contact_jabber_generation['czech'] = "Jabber";
        $webgen_contact_jabber_generation['english'] = "Jabber";
        $webgen_contact_jabber_generation['deutsch'] = "";
        
        $webgen_contact_aim_generation['czech'] = "AIM";
        $webgen_contact_aim_generation['english'] = "AIM";
        $webgen_contact_aim_generation['deutsch'] = "";
 
            // **** UNI ****
 
        $webgen_u_s_info_generation['czech'] = "Informace o studiu na univerzitě";
        $webgen_u_s_info_generation['english'] = "Study at University";
        $webgen_u_s_info_generation['deutsch'] = "";
        
        $webgen_u_r_info_generation['czech'] = "Informace o práci na univerzitě";
        $webgen_u_r_info_generation['english'] = "Employment at University";
        $webgen_u_r_info_generation['deutsch'] = "";
        
        $webgen_u_s_university_generation['czech'] = "Univerzita";
        $webgen_u_s_university_generation['english'] = "University";
        $webgen_u_s_university_generation['deutsch'] = "";
        
        $webgen_u_s_faculty_generation['czech'] = "Fakulta";
        $webgen_u_s_faculty_generation['english'] = "Faculty";
        $webgen_u_s_faculty_generation['deutsch'] = "";
        
        $webgen_u_s_specialization_generation['czech'] = "Obor";
        $webgen_u_s_specialization_generation['english'] = "Field of Study";
        $webgen_u_s_specialization_generation['deutsch'] = "";
        
        $webgen_u_s_year_generation['czech'] = "Ročník";
        $webgen_u_s_year_generation['english'] = "Year of study";
        $webgen_u_s_year_generation['deutsch'] = "";
        
        $webgen_u_r_department_generation['czech'] = "Katedra";
        $webgen_u_r_department_generation['english'] = "Department";
        $webgen_u_r_department_generation['deutsch'] = "";
        
        $webgen_u_r_position_generation['czech'] = "Pracovní zařazení";
        $webgen_u_r_position_generation['english'] = "Job Position";
        $webgen_u_r_position_generation['deutsch'] = "";
        
        $webgen_u_r_office_generation['czech'] = "Kancelář";
        $webgen_u_r_office_generation['english'] = "Office";
        $webgen_u_r_office_generation['deutsch'] = "";
        
        $webgen_u_r_departmentphone_generation['czech'] = "Pracovní telefon";
        $webgen_u_r_departmentphone_generation['english'] = "Department Phone";
        $webgen_u_r_departmentphone_generation['deutsch'] = "";
        
        $webgen_u_r_hour_generation['czech'] = "Konzultační hodiny";
        $webgen_u_r_hour_generation['english'] = "Office Hours";
        $webgen_u_r_hour_generation['deutsch'] = "";
        
        $webgen_u_s_address_generation['czech'] = "Adresa";
        $webgen_u_s_address_generation['english'] = "Address";
        $webgen_u_s_address_generation['deutsch'] = "";
        
        $webgen_u_s_uniwww_generation['czech'] = "Webová prezentace univerzity";
        $webgen_u_s_uniwww_generation['english'] = "University Web Page";
        $webgen_u_s_uniwww_generation['deutsch'] = "";
        
        $webgen_u_s_uniwww_alt_generation['czech'] = "Webové stránky univerzity";
        $webgen_u_s_uniwww_alt_generation['english'] = "University Web Page";
        $webgen_u_s_uniwww_alt_generation['deutsch'] = "";
        
        $webgen_u_s_facwww_generation['czech'] = "Webová prezentace fakulty";
        $webgen_u_s_facwww_generation['english'] = "Faculty Web Page";
        $webgen_u_s_facwww_generation['deutsch'] = "";
        
        $webgen_u_s_facwww_alt_generation['czech'] = "Webové stránky fakulty";
        $webgen_u_s_facwww_alt_generation['english'] = "Faculty Web Page";
        $webgen_u_s_facwww_alt_generation['deutsch'] = "";
        
        $webgen_u_s_project_generation['czech'] = "Projekty";
        $webgen_u_s_project_generation['english'] = "Projects";
        $webgen_u_s_project_generation['deutsch'] = "";
        
        $webgen_u_s_project_name_generation['czech'] = "Název projektu";
        $webgen_u_s_project_name_generation['english'] = "Project Name";
        $webgen_u_s_project_name_generation['deutsch'] = "";
        
        $webgen_u_s_project_description_generation['czech'] = "Popis";
        $webgen_u_s_project_description_generation['english'] = "Description";
        $webgen_u_s_project_description_generation['deutsch'] = "";
        
        $webgen_u_s_project_coauthor_generation['czech'] = "Spoluautoři";
        $webgen_u_s_project_coauthor_generation['english'] = "Co-authors";
        $webgen_u_s_project_coauthor_generation['deutsch'] = "";
        
        $webgen_u_s_project_year_generation['czech'] = "Datum ukončení";
        $webgen_u_s_project_year_generation['english'] = "Completion Year";
        $webgen_u_s_project_year_generation['deutsch'] = "";
        
        $webgen_u_s_project_www_generation['czech'] = "Webová prezentace";
        $webgen_u_s_project_www_generation['english'] = "Web Page";
        $webgen_u_s_project_www_generation['deutsch'] = "";
        
            // ************** Firm ************
        
        $webgen_firm_info_generation['czech'] = "Informace o zaměstnání";
        $webgen_firm_info_generation['english'] = "Information about Employment";
        $webgen_firm_info_generation['deutsch'] = "";

        $webgen_firm_firmname_generation['czech'] = "Firma";
        $webgen_firm_firmname_generation['english'] = "Company";
        $webgen_firm_firmname_generation['deutsch'] = "";
    
        $webgen_firm_ic_generation['czech'] = "IČ";
        $webgen_firm_ic_generation['english'] = "Company ID";
        $webgen_firm_ic_generation['deutsch'] = "";
                
        $webgen_firm_direction_generation['czech'] = "Oblast podnikání";
        $webgen_firm_direction_generation['english'] = "Sphere of Business";
        $webgen_firm_direction_generation['deutsch'] = "";
          
        $webgen_firm_workload_generation['czech'] = "Pracovní náplň";
        $webgen_firm_workload_generation['english'] = "Workload";
        $webgen_firm_workload_generation['deutsch'] = "";
          
        $webgen_firm_position_generation['czech'] = "Dosažená pozice";
        $webgen_firm_position_generation['english'] = "Job Position";
        $webgen_firm_position_generation['deutsch'] = "";
          
        $webgen_firm_address_generation['czech'] = "Adresa";
        $webgen_firm_address_generation['english'] = "Address";
        $webgen_firm_address_generation['deutsch'] = "";
          
        $webgen_firm_www_generation['czech'] = "Webová prezentace";
        $webgen_firm_www_generation['english'] = "Web Pages";
        $webgen_firm_www_generation['deutsch'] = "";
          
        $webgen_firm_wwwfirmname_generation['czech'] = "Webová prezentace firmy";
        $webgen_firm_wwwfirmname_generation['english'] = "Company Web Presentation";
        $webgen_firm_wwwfirmname_generation['deutsch'] = "";
        
        $webgen_firm_add_generation['czech'] = "Doplňující informace";
        $webgen_firm_add_generation['english'] = "Additional information";
        $webgen_firm_add_generation['deutsch'] = "";
     
        $webgen_choice_hobby['czech'] = "Zájmy, koníčky";
        $webgen_choice_hobby['english'] = "Hobbies and interests";
        $webgen_choice_hobby['deutsch'] = "";
      
        $webgen_choice_knowledge['czech'] = "Znalosti, dovednosti";
        $webgen_choice_knowledge['english'] = "Knowledges and skills";
        $webgen_choice_knowledge['deutsch'] = "";

        $webgen_birthdate_info_generation['czech'] = "Informace o datu a místu narození";
        $webgen_birthdate_info_generation['english'] = "Date and Place of Birth";
        $webgen_birthdate_info_generation['deutsch'] = "";
        
        $webgen_birthdate_date_generation['czech'] = "Datum narození";
        $webgen_birthdate_date_generation['english'] = "Birthdate";
        $webgen_birthdate_date_generation['deutsch'] = "";
        
        $webgen_birthdate_sign_generation['czech'] = "Znamení";
        $webgen_birthdate_sign_generation['english'] = "Astrological Sign";
        $webgen_birthdate_sign_generation['deutsch'] = "";
        
        $webgen_birthdate_place_generation['czech'] = "Místo narození";
        $webgen_birthdate_place_generation['english'] = "Birthplace";
        $webgen_birthdate_place_generation['deutsch'] = "";
        
        









        
        
        
        
        // ******** GATE PHOTO ****************
         
        $webgen_favphoto_errror['czech'] = "NELZE zobrazit SVG grafiku!";
        $webgen_favphoto_errror['english'] = "Error in loading SVG file!";
        $webgen_favphoto_errror['deutch'] = "";
        
        $webgen_favphoto_dialogue['czech'] = "Zkoumání fotografie pomocí dialogu";
        $webgen_favphoto_dialogue['english'] = "Dialogue-based exploration";
        $webgen_favphoto_dialogue['deutsch'] = "";
              
        $webgen_favphoto_sonn['czech'] = "Zkoumání fotografie pomocí zvuků";
        $webgen_favphoto_sonn['english'] = "Sound-based exploration";
        $webgen_favphoto_sonn['deutsch'] = "";  






     
     
     
     
     
        $webgen_footer_generation['czech'] = "Datum poslední aktualizace";
        $webgen_footer_generation['english'] = "Last update";
        $webgen_footer_generation['deutsch'] = "";
     
    
    // ********************** CV ****************************************************
    
        $webgen_cv_headtitle_gen['czech'] = "Profesní životopis";
        $webgen_cv_headtitle_gen['english'] = "Curriculum Vitae";
        $webgen_cv_headtitle_gen['deutsch'] = "";         
    
        $webgen_cv_h1_gen['czech'] = "Profesní životopis";
        $webgen_cv_h1_gen['english'] = "Curriculum Vitae";
        $webgen_cv_h1_gen['deutsch'] = "";
        
        $webgen_flag_eu_gen['czech'] = "Vlajka EU";
        $webgen_flag_eu_gen['english'] = "EU Flag";
        $webgen_flag_eu_gen['deutsch'] = "";
        
        $webgen_cv_h2_pers_gen['czech'] = "Osobní informace";
        $webgen_cv_h2_pers_gen['english'] = "Personal Information";
        $webgen_cv_h2_pers_gen['deutsch'] = ""; 
        
        $webgen_cv_nationality_gen['czech'] = "Národnost";
        $webgen_cv_nationality_gen['english'] = "Nationality";
        $webgen_cv_nationality_gen['deutsch'] = ""; 
        
        $webgen_cv_family_gen['czech'] = "Rodinný stav";
        $webgen_cv_family_gen['english'] = "Marital Status";
        $webgen_cv_family_gen['deutsch'] = "";
        
        $webgen_cv_h2_edu_gen['czech'] = "Vzdělání a kurzy";
        $webgen_cv_h2_edu_gen['english'] = "Education";
        $webgen_cv_h2_edu_gen['deutsch'] = "";
        
        $webgen_cv_period_gen['czech'] = "Období (od – do)";
        $webgen_cv_period_gen['english'] = "Period (from - to)";
        $webgen_cv_period_gen['deutsch'] = "";
        
        $webgen_cv_school_gen['czech'] = "Organizace poskytující vzdělání";
        $webgen_cv_school_gen['english'] = "Institute";
        $webgen_cv_school_gen['deutsch'] = "";
        
        $webgen_cv_field_gen['czech'] = "Obor";
        $webgen_cv_field_gen['english'] = "Field of Study";
        $webgen_cv_field_gen['deutsch'] = "";

        $webgen_cv_title_gen['czech'] = "Získaný titul";
        $webgen_cv_title_gen['english'] = "University Degree";
        $webgen_cv_title_gen['deutsch'] = "";
        
        $webgen_cv_degree_gen['czech'] = "Úroveň v národní klasifikaci";
        $webgen_cv_degree_gen['english'] = "Level in classification";
        $webgen_cv_degree_gen['deutsch'] = "";
        
        $webgen_cv_h2_pract_gen['czech'] = "Pracovní zkušenosti";
        $webgen_cv_h2_pract_gen['english'] = "Work experiences";
        $webgen_cv_h2_pract_gen['deutsch'] = "";
        
        $webgen_cv_compname_gen['czech'] = "Jméno a adresa zaměstnavatele";
        $webgen_cv_compname_gen['english'] = "Name and the address of your employer.";
        $webgen_cv_compname_gen['deutsch'] = "";
        
        $webgen_cv_sphere_gen['czech'] = "Oblast podnikání nebo název odvětví";
        $webgen_cv_sphere_gen['english'] = "Sphere of bussiness";
        $webgen_cv_sphere_gen['deutsch'] = "";
        
        $webgen_cv_pos_gen['czech'] = "Dosažená pozice";
        $webgen_cv_pos_gen['english'] = "Achieved position";
        $webgen_cv_pos_gen['deutsch'] = "";
        
        $webgen_cv_wload_gen['czech'] = "Hlavní pracovní náplň a odpovědnost";
        $webgen_cv_wload_gen['english'] = "Workload";
        $webgen_cv_wload_gen['deutsch'] = "";     
        
        $webgen_cv_h2_skill_gen['czech'] = "Osobní schopnosti a dovednosti";
        $webgen_cv_h2_skill_gen['english'] = "Personal skills";
        $webgen_cv_h2_skill_gen['deutsch'] = "";
    
        $webgen_cv_it_degree_gen['czech'] = "Znalost výpočetní techniky";
        $webgen_cv_it_degree_gen['english'] = "IT knowledge";
        $webgen_cv_it_degree_gen['deutsch'] = "";
             
        $webgen_cv_it_detail_gen['czech'] = "Detailní popis IT znalostí";
        $webgen_cv_it_detail_gen['english'] = "Detailed description of your IT knowledges";
        $webgen_cv_it_detail_gen['deutsch'] = "";
        
        $webgen_cv_driver_gen['czech'] = "Řidičský průkaz";
        $webgen_cv_driver_gen['english'] = "Driver license";
        $webgen_cv_driver_gen['deutsch'] = "";
        
        $webgen_cv_h3_lang_gen['czech'] = "Jazyky";
        $webgen_cv_h3_lang_gen['english'] = "Languages";
        $webgen_cv_h3_lang_gen['deutsch'] = "";
        
        $webgen_cv_lang_type_gen['czech'] = "Jazyk";
        $webgen_cv_lang_type_gen['english'] = "Language";
        $webgen_cv_lang_type_gen['deutsch'] = "";
        
        $webgen_cv_lang_level_gen['czech'] = "Úroveň";
        $webgen_cv_lang_level_gen['english'] = "Level";
        $webgen_cv_lang_level_gen['deutsch'] = "";

        $webgen_cv_h2_other_gen['czech'] = "Doplňující informace";
        $webgen_cv_h2_other_gen['english'] = "Additional information";
        $webgen_cv_h2_other_gen['deutsch'] = "";
        
        $webgen_cv_h2_otherskill_gen['czech'] = "Další znalosti a dovednosti";
        $webgen_cv_h2_otherskill_gen['english'] = "Additional skills";
        $webgen_cv_h2_otherskill_gen['deutsch'] = "";



// ********************* NEDOSTUPNE STRANKY ******************************

        $webgen_under_construction_title['czech'] = "Systém ve vývoji";
        $webgen_under_construction_title['english'] = "Under construction";
        $webgen_under_construction_title['deutsch'] = "";

        $webgen_under_construction_h1['czech'] = "Omlouváme se, tato část systému je stále ve vývoji.";
        $webgen_under_construction_h1['english'] = "Sorry, this part of system is still under construction.";
        $webgen_under_construction_h1['deutsch'] = "";     

// ********************** BLOG *******************************************

// ******************** Blog_5 *******************************************

        $webgen_blog_name_title['czech'] = "Zadání názvu blogu"; 
        $webgen_blog_name_title['english'] = "Blog name";
        $webgen_blog_name_title['deutsch'] = "";

        $webgen_blog_name_name['czech'] = "Zadejte název Vaší blogové stránky. ".$mandatory['czech'];
        $webgen_blog_name_name['english'] = "Enter the blog name. ".$mandatory['english'];
        $webgen_blog_name_name['deutsch'] = "";

        $webgen_blog_name_empty_name['czech'] = "Název blogu ".$nothing_he['czech'];
        $webgen_blog_name_empty_name['english'] = "Blog name ".$nothing_he['english'];
        $webgen_blog_name_empty_name['deutsch'] = "";
        
        $webgen_blog_name_valid_name['czech'] = "Název blogu je";
        $webgen_blog_name_valid_name['english'] = "Blog name is";
        $webgen_blog_name_valid_name['deutsch'] = "";
     
        $webgen_blog_name_invalid_name['czech'] = "Zadaný název ".$nonstandard['czech'];
        $webgen_blog_name_invalid_name['english'] = "Blog name ".$nonstandard['english'];
        $webgen_blog_name_invalid_name['deutsch'] = "";

// ******************** Blog_6 *********************************************

        $webgen_blog_article_title['czech'] = "Vložení článku"; 
        $webgen_blog_article_title['english'] = "Articles";
        $webgen_blog_article_title['deutsch'] = "";

        $webgen_author_name_name['czech'] = "Zadejte jméno či přezívku autora článku. ".$mandatory['czech'];
        $webgen_author_name_name['english'] = "Enter the authors name or nickname. ".$mandatory['english'];
        $webgen_author_name_name['deutsch'] = "";

        $webgen_author_name_empty_name['czech'] = "Autor článku ".$nothing_he['czech'];
        $webgen_author_name_empty_name['english'] = "Author full name ".$nothing_he['english'];
        $webgen_author_name_empty_name['deutsch'] = "";
        
        $webgen_author_name_valid_name['czech'] = "Autorem článku je";
        $webgen_author_name_valid_name['english'] = "Author name is";
        $webgen_author_name_valid_name['deutsch'] = "";
        
        $webgen_author_name_empty_h2['czech'] = "Vyplňte autora u článku č.";
        $webgen_author_name_empty_h2['english'] = "Enter the name for the article number";        
        $webgen_author_name_empty_h2['deutsch'] = "";
     
        $webgen_author_name_invalid_name['czech'] = "Jméno autora je ".$nonstandard['czech'];
        $webgen_author_name_invalid_name['english'] = "Author name ".$nonstandard['english'];
        $webgen_author_name_invalid_name['deutsch'] = ""; 
        
        $webgen_blog_article_name_name['czech'] = "Zadejte název článku. ".$mandatory['czech'];
        $webgen_blog_article_name_name['english'] = "Enter the name of this article. ".$mandatory['english'];
        $webgen_blog_article_name_name['deutsch'] = "";

        $webgen_blog_article_name_empty_name['czech'] = "Název článku ".$nothing_he['czech'];
        $webgen_blog_article_name_empty_name['english'] = "Article name ".$nothing_he['english'];
        $webgen_blog_article_name_empty_name['deutsch'] = "";
        
        $webgen_blog_article_name_valid_name['czech'] = "Název článku je";
        $webgen_blog_article_name_valid_name['english'] = "Article name is";
        $webgen_blog_article_name_valid_name['deutsch'] = "";
     
        $webgen_blog_article_name_invalid_name['czech'] = "Zadaný název ".$nonstandard['czech'];
        $webgen_blog_article_name_invalid_name['english'] = "Article name ".$nonstandard['english'];
        $webgen_blog_article_name_invalid_name['deutsch'] = "";
        
        $webgen_author_article_name_empty_h2['czech'] = "Vyplňte název článku č.";
        $webgen_author_article_name_empty_h2['english'] = "Enter the article name of the article number";        
        $webgen_author_article_name_empty_h2['deutsch'] = "";
        
        $webgen_blog_article_text['czech'] = "Zadejte text článku. ".$mandatory['czech'];
        $webgen_blog_article_text['english'] = "Enter the text of this article. ".$mandatory['english'];
        $webgen_blog_article_text['deutsch'] = "";        

        $webgen_author_article_text_empty_h2['czech'] = "Vyplňte text článku č.";
        $webgen_author_article_text_empty_h2['english'] = "Enter the text of the article number";        
        $webgen_author_article_text_empty_h2['deutsch'] = "";             
        
        $new_article_button['czech'] = "Vytvořit další článek.";
        $new_article_button['english'] = "Create new article.";
        $new_article_button['deutsch'] = "";

        $end_button['czech'] = "Pokračovat na generování blogu.";
        $end_button['english'] = "Continue to blog generation.";
        $end_button['deutsch'] = "";

// ************************** Blog_7 ***************************************

       $webgen_css_choice_blog1['czech'] = "Do fialova laděný styl pro blog.";
       $webgen_css_choice_blog1['english'] = "Violet style for blog.";
       $webgen_css_choice_blog1['deutsch'] = "";
       
       $webgen_css_choice_blog2['czech'] = "Modrobílý styl pro blog.";
       $webgen_css_choice_blog2['english'] = "Blue and white style for blog.";
       $webgen_css_choice_blog2['deutsch'] = "";
          
       $webgen_css_choice_blog1_info['czech'] = "Styl obsahuje hlavičku, a jednotlivé články jsou laděny do fialové barvy.";
       $webgen_css_choice_blog1_info['english'] = "Style contains header and background of the articles are violet.";
       $webgen_css_choice_blog1_info['deutsch'] = "";
       
       $webgen_css_choice_blog2_info['czech'] = "Styl obsahuje modrou hlavičku s názvem blogu a jednotlivé články mají taktéž zvýrazněnou hlavičku na modrém pozadí. Články jsou vyobrazeny klasicky černým písmem na bílem pozadí.";
       $webgen_css_choice_blog2_info['english'] = "This style contains blue headings for main title and also for titles of the articles. Articles are presented using the black characters on white background.";
       $webgen_css_choice_blog2_info['deutsch'] = "";


// ******************** Gall_5 *******************************************

        $webgen_gall_name_title['czech'] = "Zadání názvu fotogalerie"; 
        $webgen_gall_name_title['english'] = "Photogallery name";
        $webgen_gall_name_title['deutsch'] = "";

        $webgen_gall_name_name['czech'] = "Zadejte název Vaší fotogalerie. ".$mandatory['czech'];
        $webgen_gall_name_name['english'] = "Enter the photogallery name. ".$mandatory['english'];
        $webgen_gall_name_name['deutsch'] = "";

        $webgen_gall_name_empty_name['czech'] = "Název fotogalerie ".$nothing_he['czech'];
        $webgen_gall_name_empty_name['english'] = "Photogallery name ".$nothing_he['english'];
        $webgen_gall_name_empty_name['deutsch'] = "";
        
        $webgen_gall_name_valid_name['czech'] = "Název fotogalerie je";
        $webgen_gall_name_valid_name['english'] = "Photogallery name is";
        $webgen_gall_name_valid_name['deutsch'] = "";
     
        $webgen_gall_name_invalid_name['czech'] = "Zadaný název ".$nonstandard['czech'];
        $webgen_gall_name_invalid_name['english'] = "Photogallery name ".$nonstandard['english'];
        $webgen_gall_name_invalid_name['deutsch'] = "";        
        
        $webgen_gall_photo_type['czech'] = "Zadejte, zda chcete vkládat:";
        $webgen_gall_photo_type['english'] = "Choose the type of photos you wolud like to insert.";
        $webgen_gall_photo_type['deutsch'] = "";
        
        $webgen_gall_photo_type_valid['czech'] = "Byla vybrána možnost";
        $webgen_gall_photo_type_valid['english'] = "You choose";
        $webgen_gall_photo_type_valid['deutsch'] = "";

        $next_photo_button['czech'] = "Přidat další fotku";
        $next_photo_button['english'] = "Add another photo";
        $next_photo_button['deutsch'] = "";

        $webgen_photo_count['czech'] = "Počet vložených fotografií: ";
        $webgen_photo_count['english'] = "Number of entered photos: ";
        $webgen_photo_count['deutsch'] = "";
        
        $webgen_photo_count_row['czech'] = "Zvolte počet fotek na řádku";
        $webgen_photo_count_row['english'] = "Choose the number of photos in one row.";
        $webgen_photo_count_row['deutsch'] = "";

        $webgen_photo_count_row_info1['czech'] = "Bylo zvoleno";
        $webgen_photo_count_row_info1['english'] = "You choose ";
        $webgen_photo_count_row_info1['deutsch'] = "";
        
        $webgen_photo_count_row_info2['czech'] = "fotek na jednom řádku.";
        $webgen_photo_count_row_info2['english'] = "photos in one row.";
        $webgen_photo_count_row_info2['deutsch'] = "";
                
    // ******************** Gall_5 *******************************************        

       $webgen_css_choice_gall1['czech'] = "Klasický styl pro fotogalerii.";
       $webgen_css_choice_gall1['english'] = "Violet style for photogallery.";
       $webgen_css_choice_gall1['deutsch'] = "";
       
       $webgen_css_choice_gall2['czech'] = "Modrobílý styl pro fotogalerii.";
       $webgen_css_choice_gall2['english'] = "Blue and white style for photogallery.";
       $webgen_css_choice_gall2['deutsch'] = "";
          
       $webgen_css_choice_gall1_info['czech'] = "Styl obsahuje hlavičku, a jednotlivé fotky jsou zobrazeny na šedém pozadí.";
       $webgen_css_choice_gall1_info['english'] = "Style contains header and photos are on the grey background.";
       $webgen_css_choice_gall1_info['deutsch'] = "";
       
       $webgen_css_choice_gall2_info['czech'] = "Styl obsahuje modrou hlavičku s názvem blogu a jednotlivé články mají taktéž zvýrazněnou hlavičku na modrém pozadí. Články jsou vyobrazeny klasicky černým písmem na bílem pozadí.";
       $webgen_css_choice_gall2_info['english'] = "This style contains blue headings for main title and also for titles of the articles. Articles are presented using the black characters on white background.";
       $webgen_css_choice_gall2_info['deutsch'] = "";        
        
        
// ******************* EDITACE OSOBNICH STRANEK ****************

        $webgen_edit_choice_title['czech'] = "Určení dat, která budou editována nebo odstraněna";
        $webgen_edit_choice_title['english'] = "Types of data that will be edited or deleted";

        $webgen_edit_choice_h2['czech'] = "Prosím označte informace, které chcete upravit nebo odstranit.";
        $webgen_edit_choice_h2['english'] = "Please select the information you would like to update or delete.";

        $webgen_edit_add_other['czech'] = "Přidat další (nevyplňené položky)";
        $webgen_edit_add_other['english'] = "Add other (unfilled fields)";

        $webgen_edit_edit['czech'] = "Editovat";
        $webgen_edit_edit['english'] = "Edit";

        $webgen_edit_editall['czech'] = "Editovat vše";
        $webgen_edit_editall['english'] = "Edit all";

        $webgen_edit_delete['czech'] = "Odstranit";
        $webgen_edit_delete['english'] = "Delete";

        $webgen_edit_deleteall['czech'] = "Odstranit vše";
        $webgen_edit_deleteall['english'] = "Delete all";        

// ******************** FUNCTIONS *****************************************

        $pp['czech'] = "Osobní stránky";  
        $pp['english'] = "Personal pages";
        $pp['deutsch'] = "";
        
        $blog['czech'] = "Blog";  
        $blog['english'] = "Blog pages";
        $blog['deutsch'] = "";

        $gall['czech'] = "Fotogalerie";  
        $gall['english'] = "Photogallery";
        $gall['deutsch'] = "";




        
// ******************* 401 ******************************************************

        $webgen_401_title['czech'] = "Chyba 401 - Chyba přihlášení";
        $webgen_401_title['english'] = "Error 401 - Authorization error";
        $webgen_401_title['deutsch'] = "";
        
        $webgen_401_h1['czech'] = "Chyba přihlášení";
        $webgen_401_h1['english'] = "Authorization error";
        $webgen_401_h1['deutsch'] = "";
        
        $webgen_401_h2['czech'] = "Nebylo možné ověřit Vaše přihlašovací údaje.";
        $webgen_401_h2['english'] = "System is unable to check your login and password.";
        $webgen_401_h2['deutsch'] = "";
        
        $webgen_401_p['czech'] = "Omlouváme se za způsobené nepříjemnosti. Přihlašování nebylo úspěšné z následujících důvodů:";
        $webgen_401_p['english'] = "We apologize for inconvenience. Authorization should not been succesful due to the following reasons:";
        $webgen_401_p['deutsch'] = "";
        
        $webgen_401_li1['czech'] = "nezadali jste přihlašovací údaje v úvodním dialogu,";
        $webgen_401_li1['english'] = "you have not entered login and password in the entering dialogue,";
        $webgen_401_li1['deutsch'] = "";
        
        $webgen_401_li2['czech'] = "nastala neznámá systému, která způsobila ztrátu Vašich údajů,";
        $webgen_401_li2['english'] = "an unexpectedted error has been occured,";
        $webgen_401_li2['deutsch'] = "";
        
        $webgen_401_li3['czech'] = "pokud zadáváte adresu ručně, je možné, že byla chybně vložena do adresního řádku vašeho prohlížeče. Prosím zkontrolujte, zda je zadaná správně.";
        $webgen_401_li3['english'] = "if you enter the web address manually, it is possible, that it was entered incorrectly. Please, check the address.";
        $webgen_401_li3['deutsch'] = "";


// ******************* 404 ******************************************************

        $webgen_404_title['czech'] = "Chyba 404 - Stránka nenalezena";
        $webgen_404_title['english'] = "Chyba 404 - Page not found";
        $webgen_404_title['deutsch'] = "";
        
        $webgen_404_h1['czech'] = "Chyba 404";
        $webgen_404_h1['english'] = "Error 404";
        $webgen_404_h1['deutsch'] = "";
        
        $webgen_404_h2['czech'] = "Požadovaná stránka nebyla nalezena.";
        $webgen_404_h2['english'] = "Requested page has not been found.";
        $webgen_404_h2['deutsch'] = "";
        
        $webgen_404_p['czech'] = "Omlouváme se za způsobené nepříjemnosti. Stránku není možné zobrazit z následujících důvodů:";
        $webgen_404_p['english'] = "We apologize for inconvenience. Page cannot be presented becouse one of the followig reasons:";
        $webgen_404_p['deutsch'] = "";
        
        $webgen_404_li1['czech'] = "stránka byla odstraněna,";
        $webgen_404_li1['english'] = "page was deleted,";
        $webgen_404_li1['deutsch'] = "";
        
        $webgen_404_li2['czech'] = "stránka byla přesunuta nebo byla přejmenována,";
        $webgen_404_li2['english'] = "page was replaced or renamed,";
        $webgen_404_li2['deutsch'] = "";
        
        $webgen_404_li3['czech'] = "pokud zadáváte adresu ručně, je možné, že byla chybně vložena do adresního řádku vašeho prohlížeče. Prosím zkontrolujte, zda je zadaná správně.";
        $webgen_404_li3['english'] = "if you enter the web address manually, it is possible, that it was entered incorrectly. Please, check the address.";
        $webgen_404_li3['deutsch'] = "";

        
?>
