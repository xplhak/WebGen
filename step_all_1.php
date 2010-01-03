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

    // spracovanie formulara
    if (count($_POST)) {
        // sem spracovanie/osetrenie prislich premennych
        
        $_SESSION['step_all_1']['language'] = $_POST['language'];
    }

    switch ($userlang) {
        case "cs":
            $_page_title = 'Krok '.$_GET['step'].' - Výběr jazyka';
            echo "<h1>Vítejte v systému WebGen. Prosím, zvolte si jazyk, ve kterém si přejete pracovat.</h1>";
            echo "<h2 class=\"ok\">".$webgen_basic_info['czech']."</h2>";
            
            break;
        default:
            $_page_title = 'Step '.$_GET['step'].' - Choose your language';
            echo "<h1>Welcome to the WebGen system. Please, choose your language.</h1>";
            echo "<h2 class=\"ok\">".$webgen_basic_info['english']."</h2>";
    }
 
 ?>

<form action="." method="post">
    <ul class="clear">
        <li>
            <label>
                <input type="radio" name="language" <?php if ($_SESSION['step_all_1']['language'] == 'czech' || !isset($_SESSION['step_all_1']['language'])) { echo "checked=\"checked\""; } ?> value="czech" rel="Pokračovat" />
                Čeština
            </label>
        </li>
        
        <li>
            <label>
                <input type="radio" name="language" <?php if ($_SESSION['step_all_1']['language'] == 'english') { echo "checked=\"checked\""; } ?> value="english" rel="Continue" />
                English
            </label>
        </li>

        <!--    <li>
            <label>
                <input type="radio" name="language" value="deutsch" onclick="set_submit_button('Weiter')" />
                Deutsch
            </label>
        </li>

        <li>
            <label>
                <input type="radio" name="language" value="french" onclick="set_submit_button('Continuer')" />
                Français
            </label>
        </li>          
        -->                     
    </ul>
    
    <input id="submit_button" type="submit" value="Pokračovat" />
</form>
