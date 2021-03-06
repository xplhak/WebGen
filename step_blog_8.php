<?php

/*
    Copyright (c) 2009 Jarom�r Plh�k

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

        $_SESSION['step_blog_8'] = array();
       
        foreach ($_POST as $key => $value) {
            $_SESSION['step_blog_8']["$key"] = $value;
        }

        $r = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";
    
        if ($_SESSION['step_blog_8']['send_choice'] == 'd') {
            
            $url = getUrl($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_4']['presentation_name'], $fname);
            
            header("Location: {$url}");
            exit();
        } elseif (strlen($_SESSION['step_blog_8']['email_send_data']) == 0 || !preg_match($r, $_SESSION['step_blog_8']['email_send_data'])) {
            
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit(); 
        }
    }
    
    echo "<h1>".$webgen_showhtml_title[$language]."</h1>"; 
    
    $r = "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/";

    if (isset($_SESSION['step_blog_8']['email_send_data']) && $_SESSION['step_blog_8']['send_choice'] != "d") {
        if (strlen($_SESSION['step_blog_8']['email_send_data']) == 0) {
            echo "<h2 class=\"error\">".$webgen_contact_email_empty[$language]."</h2>";
        } elseif (!preg_match($r, $_SESSION['step_blog_8']['email_send_data'])) {
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

    $file=fopen($fname,"w");
  
    fwrite($file, "<?xml version=\"1.0\" encoding=\"UTF-8\"?".">\n");
 
    fwrite($file, "<presentation lastModified=\"".date("d. m. Y")."\" author=\"".$_SESSION['step_all_2']['user_name']."\" presentationName=\"".$_SESSION['step_all_4']['presentation_name']."\" presentationType=\"blog\" xsi:noNamespaceSchemaLocation=\"c:\web\WWW\local\xml\scheme\webgen.xsd\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">\n");
            
        fwrite($file, "\t<style>\n");
            fwrite($file, "\t\t<language>".$language."</language>\n");
            fwrite($file, "\t\t<css>".$_SESSION['step_blog_7']['css_choice'].".css</css>\n");
            fwrite($file, "\t\t<xsl>blog.xslt</xsl>\n");                   
        fwrite($file, "\t</style>\n\n");
        
        fwrite($file, "\t<blogData>\n");
            fwrite($file, "\t\t<title>".$_SESSION['step_blog_5']['blog_name_data']."</title>\n");
            fwrite($file, "\t\t<person>\n");
            fwrite($file, "\t\t\t<fullName>".$_SESSION['step_blog_5']['user_name_data']."</fullName>\n");
            fwrite($file, "\t\t</person>\n");
            
            fwrite($file, "\t\t<articles>\n");
  
            $pom = 0;
            while (!empty($_SESSION['step_blog_6']['article_text_data'][$pom])) {
                fwrite($file, "\t\t\t<article>\n");    
                    fwrite($file, "\t\t\t\t\t\t<title>".correctOutput($_SESSION['step_blog_6']['article_name_data'][$pom])."</title>\n");
                    fwrite($file, "\t\t\t\t\t\t<author>".correctOutput($_SESSION['step_blog_6']['article_author_data'][$pom])."</author>\n");
                    fwrite($file, "\t\t\t\t\t\t<date>".date("d. m. Y")."</date>\n");
                    fwrite($file, "\t\t\t\t\t\t<text>".correctOutput($_SESSION['step_blog_6']['article_text_data'][$pom])."</text>\n");
                fwrite($file, "\t\t\t</article>\n");
                $pom = $pom+1;
            }
                
            fwrite($file, "\t\t</articles>\n");
        fwrite($file, "\t</blogData>\n");
    fwrite($file, "</presentation>\n");
  
  fclose($file);
  chmod($fname, 0777);       

// ***************** Funkce ************************************************
                    



// ***************** KOPIROVANI SOUBORU ************************************

    // ikonky informujici o validite stranky
    
    copy("./icons/xhtml.png", $dirname."/img/xhtml.png");
    chmod($dirname."/img/xhtml.png", 0777);
    
    copy("./icons/css.png", $dirname."/img/css.png");
    chmod($dirname."/img/css.png", 0777);  

// ********************* blog1 *************************************************

    if ($_SESSION['step_blog_7']['css_choice'] == "blog1") {
        copy("./themes/blog1/style.css", $dirname."/blog1.css");
        chmod($dirname."/blog1.css", 0777);        

    }

// ********************* blog2 **************************************************

    else if ($_SESSION['step_blog_7']['css_choice'] == "blog2") {
        copy("./themes/blog2/style.css", $dirname."/blog2.css");
        chmod($dirname."/blog2.css", 0777);     
        
        copy("./themes/blog2/img/header.gif", $dirname."/img/header.gif");
        chmod($dirname."/img/header.gif", 0777); 
        
        copy("./themes/blog2/img/bar.gif", $dirname."/img/bar.gif");
        chmod($dirname."/img/bar.gif", 0777);         
    }

// ******************* PROVEDENI XSL TRANSFORMACE HLAVNI STRANKA ********************************

    // na�ten� dokumentu XML
    $xml = new DomDocument();
    $xml->load($fname);
    
    // na�ten� stylu XSLT dle vybraneho jazyka
    $xsl = new DomDocument();
    
    if ('czech' == $_SESSION['step_all_1']['language']) {
        $xsl->load("./xml/xslt/blog_cz.xsl"); 
    } else {
        $xsl->load("./xml/xslt/blog_en.xsl"); 
    }        

    // vytvo�en� procesoru XSLT

    $proc = new xsltprocessor();
    $proc->registerPhpFunctions();
    $proc->importStylesheet($xsl);
    
    // proveden� transformace a vyps�n� v�sledku

    $newdom = $proc->transformToDoc($xml);
    $newdom->save($dirname."/".$_SESSION['step_all_4']['presentation_name'].".php"); 

    deleteXmlHeading($dirname."/".$_SESSION['step_all_4']['presentation_name'].".php");

    chmod($dirname."/".$_SESSION['step_all_4']['presentation_name'].".php", 0744);

// ***************** ZJISTI URL VYSLEDNE STRANKY ****************************************************

    $url = getUrl($_SESSION['step_all_2']['user_name'], $_SESSION['step_all_4']['presentation_name'], $fname);
    
    $_SESSION['step_blog_8']['page_url'] = $url;

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    
    <ul class="clear">
        <li>
            <label>
                <?php echo $webgen_showhtml_choice[$language].":"; ?>
                <select name="send_choice" onkeyup="analyze_send_choice(this, '<?php echo $webgen_showhtml_link_valid[$language]; ?>', '<?php echo $webgen_showhtml_button[$language]; ?>', '<?php echo $webgen_send_to_button[$language]; ?>')" onclick="analyze_send_choice(this, '<?php echo $webgen_showhtml_link_valid[$language]; ?>', '<?php echo $webgen_showhtml_button[$language]; ?>', '<?php echo $webgen_send_to_button[$language]; ?>')" >
                    <option value="a" <?php if ($_SESSION['step_blog_8']['send_choice'] == 'a') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_a[$language]; ?></option>
                    <option value="b" <?php if ($_SESSION['step_blog_8']['send_choice'] == 'b') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_b[$language]; ?></option>
                    <option value="c" <?php if ($_SESSION['step_blog_8']['send_choice'] == 'c') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_c[$language]; ?></option>
                    <option value="d" <?php if ($_SESSION['step_blog_8']['send_choice'] == 'd') { echo "selected=\"selected\""; } ?> ><?php echo $webgen_showhtml_choice_d[$language]; ?></option>
                </select>
            </label>
        </li>
        
        <li id="email_send" <?php if ($_SESSION['step_blog_8']['send_choice'] == "d") { echo "style=\"display: none;\""; } ?> >
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