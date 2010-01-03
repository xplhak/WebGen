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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_gall_name_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // naplneni dalsich kroku nacitani blogu
        $_SESSION['steps'] = array('1', '2', '3', '4', '5', '6', '7', '8');

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_gall_5'] = array();  

        foreach ($_POST as $key => $value) {
            $_SESSION['step_gall_5']["$key"] = changeVar($value);
        }
 
 /*   
        // kontrola, zda je zadano jmeno, ktere je povinne
        if (strlen($_SESSION['step_blog_5']['blog_name_data']) == 0 || strlen($_SESSION['step_blog_5']['user_name_data']) == 0) {
        
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }*/   
   
    }
  
    echo "<h1>".$webgen_gall_name_title[$language]."</h1>";

/*    
    if (isset($_SESSION['step_blog_5']['blog_name_data']) && strlen($_SESSION['step_blog_5']['blog_name_data']) == 0) {
        echo "<h2 class=\"error\">".$webgen_blog_name_empty_name[$language]."</h2>";
    }
    if (isset($_SESSION['step_blog_5']['user_name_data']) && strlen($_SESSION['step_blog_5']['user_name_data']) == 0) {
        echo "<h2 class=\"error\">".$webgen_name_empty_name[$language]."</h2>";
    }
*/
    
?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">       
    <ul class="clear">    
        <li>
            <label>
                <?php echo $webgen_gall_name_name[$language]; ?>
                <input type="text" name="gall_name_data" <?php if (!empty($_SESSION['step_gall_5']['gall_name_data'])) { echo "value=\"".$_SESSION['step_gall_5']['gall_name_data']."\""; } ?> onkeyup="prompt_check(this, 'span_name', '<?php echo $webgen_gall_name_empty_name[$language]; ?>', '<?php echo $webgen_gall_name_valid_name[$language]; ?>', '<?php echo $webgen_gall_name_invalid_name[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'gall_name')" />
            </label>  
        </li>
    
        <li>
            <label>
                <span id="span_name"></span> <?php echo $webgen_name_name[$language]; ?>
                <input type="text" name="user_name_data" <?php if (!empty($_SESSION['step_gall_5']['user_name_data'])) { echo "value=\"".$_SESSION['step_gall_5']['user_name_data']."\""; } ?> onkeyup="prompt_check(this, 'span_gall_photo_type', '<?php echo $webgen_name_empty_name[$language]; ?>', '<?php echo $webgen_name_valid_name[$language]; ?>', '<?php echo $webgen_name_invalid_name[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'name')" />
            </label>  
        </li>
        
        <li> 
            <label>
                <span id="span_gall_photo_type"></span> <?php echo $webgen_gall_photo_type[$language]; ?>
                <select name="gall_photo_type_data" onkeyup="gall_check(this, '<?php echo $webgen_gall_photo_type_valid[$language]; ?>', 'li')" onclick="gall_check(this, '<?php echo $webgen_gall_photo_type_valid[$language]; ?>', 'li')" >
                    <option value="a" <?php if ($_SESSION['step_gall_5']['gall_photo_type_data'] == "a") { echo "selected=\"selected\""; } ?> ><?php echo $webgen_choice_photo_file_b[$language]; ?></option>
                    <option value="b" <?php if ($_SESSION['step_gall_5']['gall_photo_type_data'] == "b") { echo "selected=\"selected\""; } ?> ><?php echo $webgen_choice_photo_file_a[$language]; ?></option>
                    
                </select>
            </label>
        </li>
        
        <li id="li_photo">
            <ul class="ul_photo">
                <li class="gall_photo_alt">
                    <label>
                        <span class="span_gall_photo_alt"></span> <?php echo $webgen_photo_photo_alt[$language]; ?>
                        <input type="text" name="gall_photo_alt_data[]" onkeyup="prompt_clone_check(this, '.span_gall_photo_file', '<?php echo $webgen_photo_empty_alt[$language]; ?>', '<?php echo $webgen_photo_valid_alt[$language]; ?>', '<?php echo $webgen_photo_invalid_alt[$language]; ?>', '', 'alt', 'li', '.span_gall_photo_url')" />
                    </label>
                </li>
                
                <li class="gall_photo_file" style="display: none;">
                    <label>
                        <span class="span_gall_photo_file"></span> <?php echo $webgen_photo_photo_file[$language]; ?>
                        <input type="file" name="gall_photo_file_data[]" />            
                    </label>
                </li>
                
                <li class="gall_photo_url">
                    <label>
                        <span class="span_gall_photo_url"></span> <?php echo $webgen_photo_photo_src[$language]; ?>
                        <input type="text" name="gall_photo_src_data[]" onkeyup="prompt_clone_check(this, '.span_next_photo_button', '<?php echo $webgen_photo_empty_src[$language]; ?>', '<?php echo $webgen_photo_valid_src[$language]; ?>', '<?php echo $webgen_photo_invalid_src[$language]; ?>', '', 'url', 'li')"/>
                    </label>
                </li>
            
                <li>
                    <label>
                        <span class="span_next_photo_button"></span> <span class="span_next_work_button_info"></span>
                        <input type="button" value="<?php echo $next_photo_button[$language]; ?>" onclick="clone_photo(this)" />
                    </label>
                </li>
            </ul>
        </li>
    
        <li style = "display: none;">
            <label>
                 <span class="span_gall_photo_count"><?php echo $webgen_photo_count[$language]; ?> <i id="number">1</i> </span> <?php echo $webgen_photo_count_row[$language]; ?>
                <select name="gall_photo_count_row" onkeyup="count_row(this, '<?php echo $webgen_photo_count_row_info1[$language]; ?>', '<?php echo $webgen_photo_count_row_info2[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>')" onclick="count_row(this, '<?php echo $webgen_photo_count_row_info1[$language]; ?>', '<?php echo $webgen_photo_count_row_info2[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>')">
                    <option <?php if ($_SESSION['step_gall_5']['gall_photo_count_row'] == "3") { echo "selected=\"selected\""; } ?> >3</option>
                    <option <?php if ($_SESSION['step_gall_5']['gall_photo_count_row'] == "4") { echo "selected=\"selected\""; } ?> >4</option>
                    <option <?php if ($_SESSION['step_gall_5']['gall_photo_count_row'] == "5") { echo "selected=\"selected\""; } ?> >5</option>
                </select>
            </label>
        </li>
    
    
    </ul>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>    
  