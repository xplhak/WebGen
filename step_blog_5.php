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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_blog_name_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // naplneni dalsich kroku nacitani blogu
        $_SESSION['steps'] = array('1', '2', '3', '4', '5', '6', '7', '8', '9');

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_blog_5'] = array();  

        foreach ($_POST as $key => $value) {
            $_SESSION['step_blog_5']["$key"] = changeVar($value);
        }
    
        // kontrola, zda je zadano jmeno, ktere je povinne
        if (strlen($_SESSION['step_blog_5']['blog_name_data']) == 0 || strlen($_SESSION['step_blog_5']['user_name_data']) == 0) {
        
            $next_step = $_GET['step'];
            $next_type = $_GET['type'];
            header("Location: ./index.php?step={$next_step}&type={$next_type}");
            exit();
        }
    }
    
    // kontroluji si pole s kroky
    // echo implode(", ", $_SESSION['steps']);
    
    echo "<h1>".$webgen_blog_name_title[$language]."</h1>";
    
    if (isset($_SESSION['step_blog_5']['blog_name_data']) && strlen($_SESSION['step_blog_5']['blog_name_data']) == 0) {
        echo "<h2 class=\"error\">".$webgen_blog_name_empty_name[$language]."</h2>";
    }
    if (isset($_SESSION['step_blog_5']['user_name_data']) && strlen($_SESSION['step_blog_5']['user_name_data']) == 0) {
        echo "<h2 class=\"error\">".$webgen_name_empty_name[$language]."</h2>";
    }    
?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">       
    <ul class="clear">    
        <li>
            <label>
                <?php echo $webgen_blog_name_name[$language]; ?>
                <input type="text" name="blog_name_data" <?php if (!empty($_SESSION['step_blog_5']['blog_name_data'])) { echo "value=\"".$_SESSION['step_blog_5']['blog_name_data']."\""; } ?> onkeyup="prompt_check(this, 'span_name', '<?php echo $webgen_blog_name_empty_name[$language]; ?>', '<?php echo $webgen_blog_name_valid_name[$language]; ?>', '<?php echo $webgen_blog_name_invalid_name[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'blog_name')" />
            </label>  
        </li>
    
        <li>
            <label>
                <span id="span_name"></span> <?php echo $webgen_name_name[$language]; ?>
                <input type="text" name="user_name_data" <?php if (!empty($_SESSION['step_blog_5']['user_name_data'])) { echo "value=\"".$_SESSION['step_blog_5']['user_name_data']."\""; } ?> onkeyup="prompt_check(this, 'span_submit_button', '<?php echo $webgen_name_empty_name[$language]; ?>', '<?php echo $webgen_name_valid_name[$language]; ?>', '<?php echo $webgen_name_invalid_name[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'name')" />
            </label>  
        </li>
    </ul>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>    
  