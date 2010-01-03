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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_favphoto_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_17'] = array(); 

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_17']["$key"] = changeVar($value);
        }
    
        // ulozeni promennych typu $_FILES do $_SESSION
        if (!empty($_FILES)) {
            $_SESSION['step_pp_17']['photo_file_upload'] = $_FILES;
        }  
          
        // kontrola, zda je zadan alternativni popis
        // pokud uzivatel zadava URL je take kontrola, ze je zadano a ve spravnem formatu
        // pokud se vklada soubor tak musi byt vlozen, jeho velikost nesmi presahnout 500 kB a musi se jednat o obrazek. 
        
        // regularni vyraz pro url
        $r = "/^((http|https|ftp):\/\/)?[a-zA-Z0-9]+([-_\.]?[a-zA-Z0-9])*\.[a-zA-Z0-9]{2,4}(\/{1}[-_~&=\?\.a-zA-Z0-9]*)*$/";
        
        if ((strlen($_SESSION['step_pp_17']['favphoto_alt_data']) == 0) || ($_SESSION['step_pp_5']['favphoto_file'] == "url" && ((strlen($_SESSION['step_pp_17']['favphoto_src_data']) == 0) || !preg_match($r, $_SESSION['step_pp_17']['favphoto_src_data']))) || ($_SESSION['step_pp_5']['favphoto_file'] == "file" && (!isImage($_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['type']) || ($_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['size'] > 2621440))))  {
            
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }
        
        if ($_SESSION['step_pp_5']['favphoto_file'] == "file") {
            
            $dirname = "./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'];
          
            umask(0000);
      
            if (!file_exists("./tmp/".$_SESSION['step_all_2']['user_name'])) {
                mkdir("./tmp/".$_SESSION['step_all_2']['user_name'], 0777);
            }
          
            if (!file_exists($dirname)) {
                mkdir($dirname, 0777);
            }
            
            move_uploaded_file($_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['tmp_name'], $dirname."/".$_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['name']);
            chmod($dirname."/".$_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['name'], 0777);
        }
    }
    
    echo "<h1>".$webgen_favphoto_title[$language]."</h1>";
    
    // osetreni chyby na vstupu
    if (isset($_SESSION['step_pp_17']['favphoto_alt_data'])) {
        if (strlen($_SESSION['step_pp_17']['favphoto_alt_data']) == 0) {
            echo "<h2 class=\"error\">".$webgen_photo_h2_alt[$language]."</h2>";
        }
        
        $r = "/^((http|https|ftp):\/\/)?[a-zA-Z0-9]+([-_\.]?[a-zA-Z0-9])*\.[a-zA-Z0-9]{2,4}(\/{1}[-_~&=\?\.a-zA-Z0-9]*)*$/";
        
        if ($_SESSION['step_pp_5']['favphoto_file'] == "url") {
            if (strlen($_SESSION['step_pp_17']['favphoto_src_data']) == 0) {
                echo "<h2 class=\"error\">".$webgen_photo_empty_src[$language]."</h2>";
            } elseif (!preg_match($r, $_SESSION['step_pp_17']['favphoto_src_data'])) {
                echo "<h2 class=\"error\">".$webgen_photo_invalid_src[$language]."</h2>";
            }
        } elseif ($_SESSION['step_pp_5']['favphoto_file'] == "file") {
            if ($_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['size'] > 2621440) {
                echo "<h2 class=\"error\">".$webgen_photo_h2_big[$language]."</h2>";
            }
            if (!isImage($_SESSION['step_pp_17']['photo_file_upload']['favphoto_copy_data']['type'])) {
                echo "<h2 class=\"error\">".$webgen_photo_h2_empty[$language]."</h2>";
            }
        }
    }
     
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">  
    <ul class="clear">        
        <li>
            <label>
                <?php echo $webgen_favphoto_photo_alt[$language]; ?>
                <input type="text" name="favphoto_alt_data" <?php if (!empty($_SESSION['step_pp_17']['favphoto_alt_data'])) { echo "value=\"".$_SESSION['step_pp_17']['favphoto_alt_data']."\""; } ?> onkeyup="prompt_check(this,  '<?php  echo "span_favphoto_src"; ?>', '<?php echo $webgen_favphoto_empty_alt[$language]; ?>', '<?php echo $webgen_favphoto_valid_alt[$language]; ?>', '<?php echo $webgen_favphoto_invalid_alt[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'alt')" />
            </label>
        </li>
        
        <?php
            
            if ($_SESSION['step_pp_5']['favphoto_file'] == "url") {
            
        ?>
        <li>    
            <label>
                <span id="span_favphoto_src"></span> <?php echo $webgen_favphoto_photo_src[$language]; ?>
                <input type="text" name="favphoto_src_data" <?php if (!empty($_SESSION['step_pp_17']['favphoto_src_data'])) { echo "value=\"".$_SESSION['step_pp_17']['favphoto_src_data']."\""; } ?> onkeyup="prompt_check(this,  'span_submit_button', '<?php echo $webgen_favphoto_empty_src[$language]; ?>', '<?php echo $webgen_favphoto_valid_src[$language]; ?>', '<?php echo $webgen_favphoto_invalid_src[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'url')"  />
            </label>
        </li>
        <?php
            
            } else {
            
        ?>
        <li>  
            <label>
                <span id="span_photo_src"></span> <?php echo $webgen_photo_photo_file[$language]; ?>
                <input type="file" name="favphoto_copy_data" accept="image/*,text/plain" />
            </label>
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