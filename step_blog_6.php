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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_blog_article_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_blog_6'] = array();  

        foreach ($_POST as $key => $value) {
            $_SESSION['step_blog_6']["$key"] = changeVar($value);
        }
    
        // kontrola, zda je zadano vsechno - nazev, jmeno, text
        $pom = 0;
        $error = false;
        
        // nahrazeni odrazkovani v textareach
        foreach ($_SESSION['step_blog_6']["article_text_data"] as $key => $value) {
            $_SESSION['step_blog_6']["article_text_data"]["$key"] = mynl2br($value);
        }        
        
        while (isset($_SESSION['step_blog_6']['article_author_data'][$pom])) {
            if ((strlen($_SESSION['step_blog_6']['article_author_data'][$pom]) == 0 || strlen($_SESSION['step_blog_6']['article_name_data'][$pom]) == 0 || strlen($_SESSION['step_blog_6']['article_text_data'][$pom]) == 0) && (strlen($_SESSION['step_blog_6']['article_author_data'][$pom]) != 0 || strlen($_SESSION['step_blog_6']['article_name_data'][$pom]) != 0 || strlen($_SESSION['step_blog_6']['article_text_data'][$pom]) != 0)) {
                        
                    $next_step = $_GET['step'];
                    $next_type = $_GET['type'];
                    header("Location: ./index.php?step={$next_step}&type={$next_type}");
                    exit();            
            }
            
            $pom++;
        }          
    }
    
    echo "<h1>".$webgen_blog_article_title[$language]."</h1>";

    $pom = 0;
    
    while (isset($_SESSION['step_blog_6']['article_author_data'][$pom])) {
        if ((strlen($_SESSION['step_blog_6']['article_author_data'][$pom]) == 0 || strlen($_SESSION['step_blog_6']['article_name_data'][$pom]) == 0 || strlen($_SESSION['step_blog_6']['article_text_data'][$pom]) == 0) && (strlen($_SESSION['step_blog_6']['article_author_data'][$pom]) != 0 || strlen($_SESSION['step_blog_6']['article_name_data'][$pom]) != 0 || strlen($_SESSION['step_blog_6']['article_text_data'][$pom]) != 0)) {
            if (strlen($_SESSION['step_blog_6']['article_author_data'][$pom]) == 0) {
                echo "<h2 class=\"error\">".$webgen_author_name_empty_h2[$language]." ".($pom+1)."</h2>";
            }
            if (strlen($_SESSION['step_blog_6']['article_name_data'][$pom]) == 0) {
                echo "<h2 class=\"error\">".$webgen_author_article_name_empty_h2[$language]." ".($pom+1)."</h2>";
            }         
            if (strlen($_SESSION['step_blog_6']['article_text_data'][$pom]) == 0) {
                echo "<h2 class=\"error\">".$webgen_author_article_text_empty_h2[$language]." ".($pom+1)."</h2>";
            }           
        }
        $pom++;
    }     

?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">       
    <div id="div_articles">
        <ul class="ul_articles">    
            
            <li>
                <label>
                    <span class="span_article_name"></span> <?php echo $webgen_blog_article_name_name[$language]; ?>
                    <input type="text" name="article_name_data[]" onkeyup="prompt_clone_check(this, '.span_article_author', '<?php echo $webgen_blog_article_name_empty_name[$language]; ?>', '<?php echo $webgen_blog_article_name_valid_name[$language]; ?>', '<?php echo $webgen_blog_article_name_invalid_name[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'article_name', 'li')" />
                </label>  
            </li>
            
            <li>
                <label>
                    <span class="span_article_author"></span> <?php echo $webgen_author_name_name[$language]; ?>
                    <input type="text" name="article_author_data[]" onkeyup="prompt_clone_check(this, '.span_article_text', '<?php echo $webgen_author_name_empty_name[$language]; ?>', '<?php echo $webgen_author_name_valid_name[$language]; ?>', '<?php echo $webgen_author_name_invalid_name[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'article_author', 'li')" />
                </label>  
            </li>
    
            <li>
                <span class="span_article_text"></span> <?php echo $webgen_blog_article_text[$language]; ?>
                <textarea cols="75" rows="5" name="article_text_data[]"></textarea>
            </li>
            
            <li>
                <label>
                    <span id="span_new_article_button"></span> <span id="span_new_article_info"></span></label>
                    <input type="button" value="<?php echo $new_article_button[$language]; ?>" onclick="clone_articles(this)" />
                </label>
            </li>
        </ul>
    </div>
    
    <label>
        <span id="span_end_button"></span> <span id="span_end_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $end_button[$language]; ?>" />
    </label>

<!-- 
        - klonovat v ramci jednoho dokumentu 
        - predelat textarea
        - predelat id na class
        - dat id hlavnimu ul
        - klasicke klonovani jako u textfieldu
    
    -->
    


</form>    
  