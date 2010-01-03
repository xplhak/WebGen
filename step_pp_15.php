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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_tf_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_15'] = array();

        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_15']["$key"] = changeVar($value);
        }
        
        // nahrazeni odrazkovani v textareach
        foreach ($_SESSION['step_pp_15']["tf_text"] as $key => $value) {
            $_SESSION['step_pp_15']["tf_text"]["$key"] = mynl2br($value);
        }

        
        if (!empty($_FILES)) {
            $_SESSION['step_pp_15']['photo_file_upload'] = $_FILES;
        } 
    
        $pom = 0;
    
        while ($_SESSION['step_pp_15']['tf_photo_alt_data'][$pom]) {
            if ($_SESSION['step_pp_15']['tf_photo_que'][$pom] == 'b') {
                
                $dirname = "./tmp/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_4']['presentation_name'];
              
                umask(0000);
          
                if (!file_exists("./tmp/".$_SESSION['step_all_2']['user_name'])) {
                    mkdir("./tmp/".$_SESSION['step_all_2']['user_name'], 0777);
                }
              
                if (!file_exists($dirname)) {
                    mkdir($dirname, 0777);
                }
                
                move_uploaded_file($_SESSION['step_pp_15']['photo_file_upload']['tf_photo_file_data']['tmp_name'][$pom], $dirname."/".$_SESSION['step_pp_15']['photo_file_upload']['tf_photo_file_data']['name'][$pom]);
                chmod($dirname."/".$_SESSION['step_pp_15']['photo_file_upload']['tf_photo_file_data']['name'][$pom], 0777);
            }
        
            $pom++;
        }
    }
    
    echo "<h1>".$webgen_tf_title[$language]."</h1>";  
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">  
    
    <div id="div_textfield">
        <ul class="ul_textfield">    
            <li> 
                <label>
                    <span class="span_tf_text"></span> <?php echo $webgen_tf_text[$language]; ?>
                    <textarea cols="75" rows="4" name="tf_text[]" onkeyup="prompt_clone_check(this, '.span_tf_photo_que', '<?php echo $webgen_tf_text_empty[$language]; ?>', '<?php echo $webgen_tf_text_valid[$language]; ?>', '<?php echo $webgen_tf_text_invalid[$language]; ?>', '', 'text', 'li')"></textarea>
                </label>
            </li>
            
            <li> 
                <label>
                    <span class="span_tf_photo_que"></span> <?php echo $webgen_tf_photo_que[$language]; ?>
                    <select name="tf_photo_que[]" onkeyup="photo_choice(this, '<?php echo $webgen_showhtml_link_valid[$language]; ?>')" onclick="photo_choice(this, '<?php echo $webgen_showhtml_link_valid[$language]; ?>')">
                        <option value="c"><?php echo $tf_photo_c[$language]; ?></option>
                        <option value="a"><?php echo $tf_photo_a[$language]; ?></option>
                        <option value="b"><?php echo $tf_photo_b[$language]; ?></option>
                    </select>    
                </label>
            </li>
            
            <li class="tf_photo_alt" style="display: none;">
                <label>
                    <span class="span_tf_photo_alt"></span> <?php echo $webgen_photo_photo_alt[$language]; ?>
                    <input type="text" name="tf_photo_alt_data[]" onkeyup="prompt_clone_check(this, '.span_tf_photo_url', '<?php echo $webgen_photo_empty_alt[$language]; ?>', '<?php echo $webgen_photo_valid_alt[$language]; ?>', '<?php echo $webgen_photo_invalid_alt[$language]; ?>', '', 'alt', 'li', '.span_tf_photo_file')" />
                </label>
            </li>
            
            <li class="tf_photo_url" style="display: none;">
                <label>
                    <span class="span_tf_photo_url"></span> <?php echo $webgen_photo_photo_src[$language]; ?>
                    <input type="text" name="tf_photo_src_data[]" onkeyup="prompt_clone_check(this, '.span_tf_align_que', '<?php echo $webgen_photo_empty_src[$language]; ?>', '<?php echo $webgen_photo_valid_src[$language]; ?>', '<?php echo $webgen_photo_invalid_src[$language]; ?>', '', 'url', 'li', '.span_tf_align_que')"/>
                </label>
            </li>
            
            <li class="tf_photo_file" style="display: none;">
                <label>
                    <span class="span_tf_photo_file"></span> <?php echo $webgen_photo_photo_file[$language]; ?>
                    <input type="file" name="tf_photo_file_data[]" />            
                </label>
            </li>
                           
            <li> 
                <label>
                    <span class="span_tf_align_que"></span> <?php echo $webgen_tf_align_que[$language]; ?>
                    <select name="tf_align_que[]" onclick="align_check(this, '<?php echo $webgen_tf_add_button_info[$language]; ?>', '<?php echo $webgen_showhtml_link_valid[$language]; ?>')" onkeyup="align_check(this, '<?php echo $webgen_tf_add_button_info[$language]; ?>', '<?php echo $webgen_showhtml_link_valid[$language]; ?>')">
                        <option value="a"><?php echo $tf_align_c[$language]; ?></option>
                        <option value="b"><?php echo $tf_align_d[$language]; ?></option>
                    </select>    
                </label>
            </li>
       
            <li>
                <label>
                    <span class="span_next_tf_button"></span> <span class="span_next_tf_button_info"></span>
                    <input type="button" value="<?php echo $webgen_tf_add_button[$language]; ?>" onclick="clone_textfield(this)" />
                </label>
            </li>
        </ul>
    </div>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>