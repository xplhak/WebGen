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
    
    $_page_title =  $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$knowledge_title[$language];

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych

        // smazani obsahu nevyplnenych promennych
        $_SESSION['step_pp_12'] = array();
        
        foreach ($_POST as $key => $value) {
            $_SESSION['step_pp_12']["$key"] = changeVar($value);
        }
    }
    
    echo "<h1>".$knowledge_title[$language]."</h1>";  
?>


<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    <ul id="ul_knowledges" class="clear">
        <li class="knowledges_copy">
            <label>
                <span class="span_knowledges"></span> <span class="knowledges_label"><?php echo $knowledge_knowledge1[$language]; ?></span>
                <input name="knowledge_data[]" type="text" onkeyup="knowledges(this, 'span_submit_button', '<?php echo $knowledge_next[$language]; ?>', '<?php echo $knowledge_emptyprev[$language]; ?>', '<?php echo $knowledge_emptyfirst[$language]; ?>', '<?php echo $knowledge_valid[$language]; ?>', '<?php echo $knowledge_invalid[$language]; ?>', '<?php echo $knowledge_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'knowledge')" onfocus="knowledges(this, 'span_submit_button', '<?php echo $knowledge_next[$language]; ?>', '<?php echo $knowledge_emptyprev[$language]; ?>', '<?php echo $knowledge_emptyfirst[$language]; ?>', '<?php echo $knowledge_valid[$language]; ?>', '<?php echo $knowledge_invalid[$language]; ?>', '<?php echo $knowledge_end[$language]; ?>', '<?php echo $submit_button_info[$language]; ?>', 'knowledge')" />
            </label>
        </li>
    </ul>

    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"></span></label>
        <input id="submit_button" type="submit" value="<?php echo $submit_button[$language]; ?>" />
    </label>
</form>