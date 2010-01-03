<?php
/*
    Copyright (c) 2009 Karel Vaculík

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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 

<html>                                                                  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css" media="screen">
         <!--
           #clockdiv {
             height: 150px;
             width: 150px;
           }
           img {
             position: fixed;
           }
           #background {
           z-index: 5;
           }
           #hhand {
           z-index: 6;
           }
           #mhand {
           z-index: 7;
           }
           #shand {
           z-index: 8;
           }
           #glass {
           z-index: 9;
           }
         //-->
        </style>
 
        <script type="text/javascript">
            function startTime() {
                var today = new Date();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                
                m=checkTime(m);
                s=checkTime(s);
                h=checkTime(correctHours(h, m));                                                                  
                document.getElementById("hhand").setAttribute("src","images_analogue_clock/hhand/"+h+".png");
                document.getElementById("mhand").setAttribute("src","images_analogue_clock/mhand/"+m+".png");
                document.getElementById("shand").setAttribute("src","images_analogue_clock/shand/"+s+".png");
                t=setTimeout('startTime()',500);
            }
            
            function checkTime(i){
                if (i<10) {
                i="0"+i;
                }
                return i;       
                }
                function correctHours(h, m){
                h = h % 12;
                h = h * 5;
                m = (m - (m % 12)) / 12;
                h = h + m;
                return h;             
            }
            
            function changeClockSkin(value) {
                document.getElementById("background").setAttribute("src","images_analogue_clock/clock/"+value+".png");
            }
        </script>
    </head>
 
    <body onload="startTime();">
        <select onchange="changeClockSkin(this.value)">
            <option value="black" selected="true">černé</option> 
            <option value="blue">modré</option>
            <option value="gray">šedobílé</option>
            <option value="green">zelené</option>
            <option value="orange">oranžové</option>
            <option value="pink">růžové</option>
            <option value="red">červené</option>
            <option value="yellow">žluté</option>
        </select> 
  
        <div id="clockdiv">
            <img id="background" src="images_analogue_clock/clock/black.png" border="0" height="150" width="150">
            <img id="glass" src="images_analogue_clock/clock/glass.png" border="0" height="150" width="150">
            <img id="hhand" src="" border="0" height="150" width="150">
            <img id="mhand" src="" border="0" height="150" width="150">
            <img id="shand" src="" border="0" height="150" width="150">
        </div>
    </body>                                                                 
</html>
