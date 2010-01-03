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

function cutMessage($string) { //zajisti rozumnou max. velikost prispevku

}

function cleanField($string) {
    $string = trim($string);
    $string = strip_tags($string);
    $string = str_replace("|", "&brvbar", $string);

    return $string;
}

function cleanMessage($string) {
    
    global $gbAllowedTags;
    $string = trim($string);
    $string = strip_tags($string, $gbAllowedTags);
    $string = str_replace("|", "&brvbar;", $string);
    $string = str_replace("\"", "&quot;", $string);
    $string = str_replace("\n", "<br>", $string);
    $string = str_replace("\r", "", $string);
    $string = stripslashes($string);
    
    return $string;
}

    $name = $_POST["name"];
    $email = $_POST["email"];
    $url = $_POST["url"];    
    $msg = $_POST["msg"];
    $spam = $_POST["spam"];
    
    if ($spam == "no") {
        $name = cleanField($name);
        $email = cleanField($email);
        $url = cleanField($url);
        $msg = cleanMessage($msg);
        $date = Time();
        $ip = $_SERVER["REMOTE_ADDR"];
        
        $newEntry = $name."|".$email."|".$url."|".$msg."|".$date."|".$ip;
        
        $fp = fopen("gb_data.txt", "a");
        
        fwrite($fp, $newEntry."\n");
        fclose($fp);
        
        echo Date("d. F H:i", Time());
        //echo "true";
            
    } else {
    
        echo false;
    }


?>
