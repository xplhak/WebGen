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

    $language = $_GET["lang"];

    $title["czech"] = "Nápověda - WebGen - Generování webové stránky pomocí dialogu";
    $title["english"] = "Help - WebGen - Generation of the web page using a dialogue";

    $h1["czech"] = "Výběr jazyka - nápověda";
    $h1["english"] = "Language choice - help";

    $p1["czech"] = "Nápověda";
    $p1["english"] = "Help";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
    <head>
        <title><?php echo $title[$language]; ?></title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="cs" />
        <meta http-equiv="Pragma" content="no-cache" />
        <link href="../css/help.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    
    <body>
        <h1><?php echo $h1[$language]; ?></h1>
        
        <p><?php echo $p1[$language]; ?></p>


    
    </body>
</html>