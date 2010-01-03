<?php
/*
    Copyright (c) 2009 Petr Šigut

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
?>

<h2>Kniha návštěv</h2>

<form action="gb_add.php?action=add" method="post" name="form" onSubmit="return checkFields();">    
    <ul class="clear">
        <li>
            <label>
                Jméno:
                <input name="name" />
            </label>
        </li>
        
        <li>
            <label>
                Email:
                <input name="email" value="@" />
            </label>
        </li>
        
        <li>
            <label>
                WWW stránky:
                <input name="url" value="http://" />
            </label>
        </li>
    
        <li>
            <textarea name="msg" id="msg" rows="5" cols="45"></textarea>
        </li>
        
        <li>
            <label>
                Jsem spamovací robot? (napište "ne" pro uložení příspěvku)
                <input name="spam" value="ano" />
            </label>
        </li>
        
        <li>
            <input type="button" value="Zanechat vzkaz" Accesskey="Z" onclick="add_news()" />
        </li>
    </ul>
</form>

<hr />

<div id="messages">
<?php
  /*
   * Zobrazi zpravy s guest booku
   */

   $data = File("gb_data.txt");
   $lines = count($data) - 1;

   for ($i = $lines ; $i != -1; $i--):
     list($name, $email, $url, $msg, $date) = explode("|", $data[$i]);
?>


    <div class="gb_msg">
        <div class="gb_header">
            <span><?php echo Date("d. F H:i", $date); ?></span>
            
            <?php
              
                if ($email == "@" || $email == "") {
                    echo $name;
                } else {
                    echo "<a href=\"mailto:$email\">".$name."</a>";
                }
                
                if ($url != "http://") {
                    echo "&nbsp;&nbsp; <a href=\"$url\">". $url."</a>";
                }
                
            ?>
        </div>
    
        <div class="gb_content">
            <?php echo $msg;?>
        </div>
    </div>
<?php
   
   endfor;

?>
</div>