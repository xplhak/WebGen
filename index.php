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

    session_start('webgen');
    error_reporting(E_ALL ^ E_NOTICE);



    // defaultny jazyk uzivatela
    $userlang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);

    // callback funkcia, ktora sa aplikuje na zdrojovy subor vygenerovanej stranky
    function callback($buffer) {
        return preg_replace('/%page-title%/', $GLOBALS['_page_title'], $buffer);
    }
  
    ob_start('callback');
  
    // rozne pomocne funkcie
    require_once 'functions.php';
    
    // jazykove mutace
    include_once './langs/langs.php';
    
    // nastaveni jazyka po nacteni od uzivatele PROBLEM: language se SESSION proste nejak vytrati :-(
    if (!empty($_SESSION['step_all_1']['language'])) {
        $language = $_SESSION['step_all_1']['language'];
    }
    // jen test, co se deje, pak smazat ...
    else {
        $language = 'english';
    }      
     
    // inicializacia krokov
    if (empty($_GET['step'])) {
        $_GET['step'] = '1';
        $_GET['type'] = 'all';
        $_SESSION['steps'] = array('1', '2', '3', '4');  
    }
         
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
    <head>
        <title>%page-title% - WebGen - <?php echo $webgen_info[$language]; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="cs" />
        <meta http-equiv="Pragma" content="no-cache" />
        
        <?php
        
            if (empty($_SESSION['step_all_2']['css_choice']) || $_SESSION['step_all_2']['css_choice'] != 'blind' || $_GET['step'] < 3) {
                echo "<link href=\"./css/base.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />";
            }
            
            // styl pre konkretny krok
            if (is_readable("./css/step_{$_GET['type']}_{$_GET['step']}.css")) {
                echo "<link href=\"./css/step_{$_GET['type']}_{$_GET['step']}.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />\n";
            }
            if (!empty($_SESSION['step_all_2']['css_choice']) && $_SESSION['step_all_2']['css_choice'] == 'glasses') {
                echo "<link href=\"./css/glasses.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />\n";
            }
         
         ?>
        <link rel="bookmark" href="http://lsd.fi.muni.cz/webgen/" title="<?php echo $webgen_info[$language]; ?>" />
        <script type="text/javascript">
            
            <?php
                // promenne ze SESSION do JS               
                // nejprve pridame vsem prvkum ve vzbranych polich addslashes()
                $_SESSION = array_htmlspecialchars_decode(array_map_r( 'addslashes', $_SESSION));                  
                
                // nahrajeme promenne do JS
                getJavascriptArray($_SESSION, 'session', $result);
                
                // vratime na puvodni hodnotu pomoci stripslashes()
                $_SESSION = array_htmlspecialchars(array_map_r( 'stripslashes', $_SESSION));           
                
                // ulozim si aktualni krok, kvuli napovede
                getJavascriptArray($_GET, 'get', $result);
                
                // nacteni nekterych promluv do js promennych
                getJavascriptArray($webgen_basic_info, 'webgen_basic_info', $result);
                getJavascriptArray($feat_answ_next, 'feat_answ_next', $result);
                getJavascriptArray($webgen_u_r_day, 'webgen_u_r_day', $result);
                getJavascriptArray($webgen_u_s_project_next, 'webgen_u_s_project_next', $result);
                getJavascriptArray($webgen_u_s_project_coauthor_next, 'webgen_u_s_project_coauthor_next', $result);
                getJavascriptArray($webgen_firm_direction_another, 'webgen_firm_direction_another', $result);
                getJavascriptArray($webgen_firm_workload_another, 'webgen_firm_workload_another', $result);
                getJavascriptArray($hobby_next, 'hobby_next', $result);
                getJavascriptArray($knowledge_next, 'knowledge_next', $result);
                getJavascriptArray($webgen_cv_edu_from, 'webgen_cv_edu_from', $result);
                getJavascriptArray($webgen_cv_lang_type, 'webgen_cv_lang_type', $result);
                getJavascriptArray($webgen_links_undef_description, 'webgen_links_undef_description', $result);
                
                echo $result;
                
                //console.log(session);
             ?> 
        </script>
        <script type="text/javascript" src="./jsc/jquery.js"></script>
        <script type="text/javascript" src="./jsc/webgen.js"></script>
        <?php
            
            $_SESSION = array_map_r('stripslashes', $_SESSION );
        
            // javascript pre konkretny krok
            if (is_readable("./jsc/step_{$_GET['type']}_{$_GET['step']}.js")) {
              echo "<script type=\"text/javascript\" src=\"./jsc/step_{$_GET['type']}_{$_GET['step']}.js\"></script>\n";
            }
        
         ?>
    </head>

    <body id="webgen">
        <div id="page-container">
        <?php
        

            // ak je pozadovana stranka fyzicky pritomna na disku, zobrazim prednostne ju
            // v pripade, ze nie je, generujem chybu 404 
            if (is_readable("./step_{$_GET['type']}_{$_GET['step']}.php")) {
                
                // kontrola, zda je uživatel zalogován
                if (($_GET['step'] != '1' && $_GET['step'] != '2') && $_SESSION['user_loged_in'] != true) {
                    require_once './401.php';
                    exit();
                }
                
                else {
                    require_once "./step_{$_GET['type']}_{$_GET['step']}.php";
                
                    // po spracovani odoslaneho formulara je redirect na dalsi krok
                    if (count($_POST)) {
                        $next_step = $_SESSION['steps'][array_search($_GET['step'], $_SESSION['steps']) + 1];
                        if (!isset($next_type)) {
                            $next_type = $_GET['type'];
                        }
                        header("Location: ./index.php?step={$next_step}&type={$next_type}");
                        exit();
                    }
                }

            } else {
                require_once './404.php';
            }

         ?>
        
        </div>
    </body>
</html> 

<?php   
    ob_end_flush();
?>