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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_send_to_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // pokud je predchozi volba spojena se smazanim - presmerovani zpet na editaci
        if ("c" == $_SESSION['step_pp_20']['send_choice']) {
            
            // smazani promennych ze session
            
            for ($i = 3; $i <= 21; $i++) {
                $_SESSION["step_pp_{$i}"] = array();
            }
            
            $next_step = "3";
            $next_type = "all";
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }
        else {
            header("Location: ".$_SESSION['step_pp_20']['page_url']);
            exit();
        }
    }
    
    echo "<h1>".$webgen_send_to_title[$language]."</h1>";  

?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
<?php

    // zjistuji, kam se ma email poslat
    if (isset($_SESSION['step_pp_20']['send_email_choice'])) {    
        if ($_SESSION['step_pp_20']['send_email_choice'] == "a") {
        
            $email = $_SESSION['step_pp_8']['email_data'];
        
        } elseif ($_SESSION['step_pp_20']['send_email_choice'] == "b") {
        
            $email = $_SESSION['step_pp_14']['email_cv_data'];
        
        } elseif ($_SESSION['step_pp_20']['send_email_choice'] == "c") {
            
            $email = $_SESSION['step_pp_20']['email_send_data'];
        }
    } else {
        $email = $_SESSION['step_pp_20']['email_send_data'];
    }
     
    // ****************** odeslání emailu bez prilohy **********************************
    
    function autoUTF($s)    {
        // detect UTF-8
        if (preg_match('#[\x80-\x{1FF}\x{2000}-\x{3FFF}]#u', $s))
            return $s;
        // detect WINDOWS-1250
        if (preg_match('#[\x7F-\x9F\xBC]#', $s))
            return iconv('WINDOWS-1250', 'UTF-8', $s);
        // assume ISO-8859-2
        return iconv('ISO-8859-2', 'UTF-8', $s);
    }

    $predmet = "=?utf-8?B?".base64_encode(autoUTF($webgen_send_to_predmet[$language]))."?=";
    $text = $webgen_send_to_text[$language].": ".$_SESSION['step_pp_20']['page_url'];
    $from = "webgen.system@gmail.com";
    
    if ("b" == $_SESSION['step_pp_20']['send_choice']) {
    
        include_once "./library/mime_mail.inc";
        
        # create object instance
        $mail = new mime_mail;

        # set all data slots
        $mail->from    = $from;
        $mail->to      = $email;
        $mail->subject = $predmet;
        $mail->body    = $text;
        
        
        
        # send e-mail
        if ($mail->send()) {
            echo "<h2 class=\"ok\">".$webgen_send_to_email_send[$language]."</h2>";
        }
        else {
            echo "<h2 class=\"error\">".$webgen_send_to_email_error[$language]."</h2>";
        }
    }
    
    else {

        // ****************** Vytvoreni zipu a poslani v priloze ******************************

        $dirname = "./presentations/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'];
        $zipdir = "./presentations/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name']."/zip_file";
        
        umask(0000);
        
        if (!file_exists($zipdir)) {
            mkdir($zipdir, 0777);
        }
        
        
        $zip = new ZipArchive();
        $filename = $zipdir."/".$_SESSION['step_all_4']['presentation_name'].".zip";
        
        // smazat soubor, pokud existuje
        if (file_exists($filename)) {
            unlink($filename);
        }        
        
        if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
            echo "<h2 class=\"error\">".$webgen_send_to_zip_error[$language]." ".$filename."</h2>";
        }
    
        addFolderToZip($dirname, $zip, $_SESSION['step_all_4']['presentation_name']);

        $zip->close();
        
        chmod($filename, 0777);
    
        // odeslani emailu s prilohou 
        
        include_once "./library/mime_mail.inc";
        
        $content_type = "application/octet-stream";

        # read a JPEG picture from the disk
        
        $fd = fopen($filename, "r");
        $data = fread($fd, filesize($filename));
        fclose($fd);
        
        # create object instance
        $mail = new mime_mail;
        
        # set all data slots
        $mail->from    = $from;
        $mail->to      = $email;
        $mail->subject = $predmet;
        $mail->body    = $text;

        
        # append the attachment
        
        $filename = $zipdir."/".$_SESSION['step_all_4']['presentation_name'].".zip";
        $mail->add_attachment($data, $filename, $content_type);
        
        # send e-mail
        
        if ($mail->send()) {
            echo "<h2 class=\"ok\">".$webgen_send_to_email_send[$language]."</h2>";
        }
        else {
            echo "<h2 class=\"error\">".$webgen_send_to_email_error[$language]."</h2>";
        }
    
        if ("c" == $_SESSION['step_pp_20']['send_choice']) {
            if ((strlen($_SESSION['step_all_2']['user_name']) > 2) && (strlen($_SESSION['step_all_4']['presentation_name']) > 2)) {
                recursive_remove_directory("./presentations/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name']);
            } else {
                echo "<h2 class=\"error\">".$webgen_delete_error[$language]."</h2>";
            }
        }
    }    
?>
    <input name="empty" type="hidden" />
    
    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php if ("c" == $_SESSION['step_pp_20']['send_choice']) { echo $webgen_delete_button[$language]; } else { echo $submit_button_page[$language]; } ?>" />
    </label>
</form>