<?php

/*
    Copyright (c) 2009 Jaromír Plhák, Jiří Uhýrek

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

    $_page_title = $step_desc[$language]." ".(array_search($_GET['step'], $_SESSION['steps'])+1)." - ".$webgen_delete_title[$language];


    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych
   
        // presmerovani zpet na editaci

        $next_step = "3";
        $next_type = "all";
        header("Location: ./index.php?step={$next_step}&type={$next_type}");
        exit();  
    }

    echo "<h1>".$webgen_delete_title[$language]."</h1>"; 

    if ((strlen($_SESSION['step_all_2']['user_name']) > 2) && (strlen($_SESSION['step_all_3']['delete_presentation_name']) > 2)) {
        if (recursive_remove_directory("./presentations/".$_SESSION['step_all_2']['user_name']."/".$_SESSION['step_all_3']['delete_presentation_name'])) {
            echo "<h2 class=\"ok\">".$webgen_delete_info[$language]." ".$_SESSION['step_all_3']['delete_presentation_name']." ".$webgen_delete_info2[$language]."</h2>";
        }
        else {
            echo "<h2 class=\"error\">".$webgen_delete_error[$language]."</h2>";
        }
    } else {
        echo "<h2 class=\"error\">".$webgen_delete_error[$language]."</h2>";
    }
    
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <input name="empty" type="hidden" />
    
    <label>
        <span id="span_submit_button"></span> <span id="span_submit_button_info"> </span></label>
        <input id="submit_button" type="submit" value="<?php echo $webgen_delete_button[$language]; ?>" />
    </label>
</form>
