<?php 

/*
    Copyright (c) 2009 Jiří Uhýrek, Jaromír Plhák

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




    $_page_title = $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_user_title[$language];
    
    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_all_2'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_all_2']["$key"] = $value;
        }
        
        //osetreni prazdneho retezce
        // osetreni ze byl pozadovan novy ucet, ale adresar byl jiy vytvoren
        // osetreni ze bylo pozadovano prihlaseni se k uctu, ale adresar s uctem jeste nebyl vytvoren.
        // osetreni, ze login je aspon tri znaky dlouhy
        $r = "/^[a-zA-Z0-9]{1}[a-zA-Z0-9.\-_]{2}[a-zA-Z0-9.\-_]*$/";
        
        if (($_SESSION['step_all_2']['user_account'] == 'enrolment') && (isUserFree($_SESSION['step_all_2']['user_name']) === true) || ($_SESSION['step_all_2']['user_account'] == 'registration') && (isUserFree($_SESSION['step_all_2']['user_name']) === false) || (strlen($_SESSION['step_all_2']['user_name']) == 0) || !preg_match($r, $_SESSION['step_all_2']['user_name'])) {
            
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }


        // pokud se hesla a kontrola hesla pri registraci neshoduji ...
        if ($_SESSION['step_all_2']['user_account'] == 'registration' && ($_SESSION['step_all_2']['user_pass'] != $_SESSION['step_all_2']['user_pass_rep'] )) {
            $_SESSION['step_all_2']['pass_rep'] = true;
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }

        // vytvorime zaznam v profilech
        
        if (!file_exists("./profiles/".$_SESSION['step_all_2']['user_name'].".xml")) {

            $file=fopen("./profiles/".$_SESSION['step_all_2']['user_name'].".xml","w");
            
            fwrite($file, "<?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n");
            fwrite($file, "<user xsi:noNamespaceSchemaLocation=\"http://andromeda.fi.muni.cz/~xplhak/webgen/xml/scheme/users.xsd\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">\n"); 
            fwrite($file, "\t\t\t<login>".$_SESSION['step_all_2']['user_name']."</login>\n");
            fwrite($file, "\t\t\t<style>".$_SESSION['step_all_2']['css_choice']."</style>\n");
            fwrite($file, "\t\t\t<password>".hash('sha256',$_SESSION['step_all_2']['user_name'].$_SESSION['step_all_2']['user_pass'])."</password>\n");
            fwrite($file, "</user>\n");
                
            fclose($file);
            chmod("./profiles/".$_SESSION['step_all_2']['user_name'].".xml", 0777);

            // vymazani hodnoty hesla ze sessions
            $_SESSION['step_all_2']['user_pass'] = '';
            $_SESSION['step_all_2']['user_pass_rep'] = '';
            $_SESSION['user_loged_in'] = true;
            
            // vytvorim adresar, aby byl uzivatel vytvoren
            
            umask(0000);
            
            if (!file_exists("./presentations/".$_SESSION['step_all_2']['user_name'])) {
                mkdir("./presentations/".$_SESSION['step_all_2']['user_name'], 0777);
            }
            

        } else {

            // kontrola hesla
            $xml = simplexml_load_file("./profiles/".$_SESSION['step_all_2']['user_name'].".xml");  
            $pass_hash = $xml->password;

            if ($pass_hash == hash('sha256',$_SESSION['step_all_2']['user_name'].$_SESSION['step_all_2']['user_pass'])) {

              // vymazani hesla ze sessions
              // vymazani hodnoty hesla ze sessions
              $_SESSION['step_all_2']['user_pass'] = '';
              $_SESSION['step_all_2']['user_pass_rep'] = '';
              $_SESSION['user_loged_in'] = true;


              $_SESSION['step_all_2']['bad_login_or_password'] = true;
              // upravit zaznam, pokud uz byl vytvoren 
              
              if ($_SESSION['step_all_2']['css_change'] == 'on') {
                  $file=fopen("./profiles/".$_SESSION['step_all_2']['user_name'].".xml","w");
                  
                  fwrite($file, "<?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n");
                  fwrite($file, "<user xsi:noNamespaceSchemaLocation=\"http://andromeda.fi.muni.cz/~xplhak/webgen/xml/scheme/users.xsd\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">\n"); 
                  fwrite($file, "\t\t\t<login>".$xml->login."</login>\n");
                  fwrite($file, "\t\t\t<style>".$_SESSION['step_all_2']['css_choice']."</style>\n");
                  fwrite($file, "\t\t\t<password>".$xml->password."</password>\n");
                  fwrite($file, "</user>\n");
          
                  fclose($file);
              }
            } else {
              // heslo  nesedi
              $_SESSION['step_all_2']['bad_login_or_pass'] = true;
              $next_step = $_GET['step'];
              $next_type = $_GET['type'];
              header("Location: ./index.php?step={$next_step}&type={$next_type}");
              exit();
            }
        }
    }

?>

<h1><?php echo $webgen_user_title[$language]; ?></h1>

<?php
    
    if (isset($_SESSION['step_all_2']['user_name'])) {
        if (strlen($_SESSION['step_all_2']['user_name']) == 0) {
            echo "<h2 class=\"error\">".$webgen_user_enrolment_name_empty[$language]."</h2>";
        }
        else {
            $r = "/^[a-zA-Z0-9]{1}[a-zA-Z0-9.\-_]{2}[a-zA-Z0-9.\-_]*$/";
            if (!preg_match($r, $_SESSION['step_all_2']['user_name'])) {
                echo "<h2 class=\"error\">".$webgen_user_enrolment_name_short[$language]."</h2>";
            }
            elseif ($_SESSION['step_all_2']['user_account'] == 'enrolment' && isUserFree($_SESSION['step_all_2']['user_name']) === true) {
                echo "<h2 class=\"error\">".$webgen_user_enrolment_problem[$language]."</h2>";
            } elseif ($_SESSION['step_all_2']['user_account'] == 'registration' && isUserFree($_SESSION['step_all_2']['user_name']) === false) {
                echo "<h2 class=\"error\">".$webgen_user_registration_duplicate[$language]."</h2>";
            }
        }

        if ($_SESSION['step_all_2']['bad_login_or_pass'] == true) {
          echo "<h2 class=\"error\">".$webgen_user_enrolment_bad_login_or_pass[$language]."</h2>";
          $_SESSION['step_all_2']['bad_login_or_pass'] = false;
        } elseif ($_SESSION['step_all_2']['pass_rep'] == true) {
          echo "<h2 class=\"error\">".$webgen_user_registration_pass_not_match_rep[$language]."</h2>";
          $_SESSION['step_all_2']['pass_rep'] = false;
        }
    }

?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <ul class="clear">
        <li>
            <label>
                <input type="radio" name="user_account" value="enrolment" <?php if (!isset($_SESSION['step_all_2']['user_account']) || $_SESSION['step_all_2']['user_account'] != 'registration') { echo "checked=\"checked\""; } ?> onclick="add_pass('<?php echo $webgen_user_choice_info[$language]." ".$webgen_user_enrolment[$language]; ?>')" />
                <?php echo $webgen_user_enrolment[$language]; ?>
            </label>
        </li>
        
        <li>
            <label>
                <input type="radio" name="user_account" value="registration" <?php if ($_SESSION['step_all_2']['user_account'] == 'registration') { echo "checked=\"checked\""; } ?> onclick="remove_pass('<?php echo $webgen_user_choice_info[$language]." ".$webgen_user_registration[$language]; ?>')" />
                <?php echo $webgen_user_registration[$language]; ?>
            </label>
        </li>        
        
        <li>
            <label>
                <span id="span_user_name"></span> <?php echo $webgen_user_enrolment_name[$language] ?>
                <input type="text" name="user_name" <?php if (!empty($_SESSION['step_all_2']['user_name'])) { echo "value=\"".$_SESSION['step_all_2']['user_name']."\""; } else { echo "value=\"\""; } ?> onkeyup="prompt_check(this, 'span_password', '<?php echo $webgen_user_enrolment_name_empty[$language]; ?>', '<?php echo $webgen_user_enrolment_name_valid[$language]; ?>', '<?php echo $webgen_user_enrolment_name_invalid[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'login', '<?php echo $webgen_user_enrolment_problem[$language]; ?>', '<?php echo $webgen_user_registration_duplicate[$language]; ?>')" />
            </label>
        </li>
        
        <li>    
            <label>
                <span id="span_password"> </span> <?php echo $webgen_user_pass[$language]; ?>
                <input type="password" name="user_pass" />
            </label>
        </li>
        
        <li id="li_pass_repeat" <?php if ($_SESSION['step_all_2']['user_account'] != 'registration') { echo "style=\"display: none;\""; } ?> >
            <label>
                <span id="span_password_rep"></span> <?php echo $webgen_user_pass_rep[$language]; ?>
                <input type="password" name="user_pass_rep" />
            </label>
        </li>
        
        <li id="li_css_change" <?php if (!isset($_SESSION['step_all_2']['user_name']) || isUserFree($_SESSION['step_all_2']['user_name'])) { echo "style=\"display: none;\""; } ?> >
            <label>
                <span id="span_css_change"></span> <?php echo $webgen_css_change[$language]; ?>
                <input type="checkbox" id="css_change" name="css_change" <?php if (isset($_SESSION['step_all_2']['css_change'])) { echo "checked=\"checked\""; } ?> onclick="show_choice()" />
            </label>
        </li>
        
        <div id="div_css_choice" <?php if (($_SESSION['step_all_2']['user_account'] != 'registration' && !isset($_SESSION['step_all_2']['css_change'])) || !isset($_SESSION['step_all_2']['user_account'])) { echo "style=\"display: none;\""; } ?> >
            
            <p><?php echo $webgen_css_choice[$language]; ?></p>
            
            <li>
                <label>
                    <input type="radio" name="css_choice" value="blind" <?php if ($_SESSION['step_all_2']['css_choice'] == 'blind') { echo "checked=\"checked\""; } ?> />
                    <?php echo $webgen_css_blind[$language]; ?>
                </label>
            </li>
             
            <li>
                <label>
                    <input type="radio" name="css_choice" value="classic" <?php if ($_SESSION['step_all_2']['css_choice'] == 'classic' || !isset($_SESSION['step_all_2']['css_choice'])) { echo "checked=\"checked\""; } ?> />
                    <?php echo $webgen_css_classic[$language]; ?>
                </label>
            </li>
               
            <li>
                <label>
                    <input type="radio" name="css_choice" value="glasses" <?php if ($_SESSION['step_all_2']['css_choice'] == 'glasses') { echo "checked=\"checked\""; } ?> />
                    <?php echo $webgen_css_weak[$language]; ?>
                </label>
            </li>
        </div>
    </ul>
    
    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>














