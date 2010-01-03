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

    header('HTTP/1.0 401 Unauthorized');
    $_page_title = $webgen_401_title[$language];

?>
 
<h1><?php echo $webgen_401_h1[$language]; ?></h1>

<h2 class="error"><?php echo $webgen_401_h2[$language]; ?></h2>

<p><?php echo $webgen_401_p[$language]; ?></p>

<ul class="http_err">
    <li class="http_err"><?php echo $webgen_401_li1[$language]; ?></li> 
    <li class="http_err"><?php echo $webgen_401_li2[$language]; ?></li>
    <li class="http_err"><?php echo $webgen_401_li3[$language]; ?></li>
</ul>
