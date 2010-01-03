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
                #hodiny {
                    position: fixed; 
                }
            
                #vnitrek {
                    padding-left: 5px;
                    position: relative;
                }
            
                img {
                    /*margin-left: 0px; 
                    margin-right: -4px; */
                    padding: 0px 0px 0px 0px;
                    border-width: 0px 0px 0px 0px; 
                }
            //-->
        </style>
        
        <script type="text/javascript">

            var t;
            var color = "red";
            
            function startTime() {
                var today = new Date();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                
                firstnum = (h - (h % 10)) / 10;
                secondnum = h % 10;
                thirdnum = (m - (m % 10)) / 10;
                fourthnum = m % 10;
                fifthnum = (s - (s % 10)) / 10;
                sixthnum = s % 10;                   
                document.getElementById("firstnum").setAttribute("src","images_digital_clock/"+color+"/"+firstnum+".png");
                document.getElementById("secondnum").setAttribute("src","images_digital_clock/"+color+"/"+secondnum+".png");
                document.getElementById("firstdots").setAttribute("src","images_digital_clock/"+color+"/dots.png");
                document.getElementById("thirdnum").setAttribute("src","images_digital_clock/"+color+"/"+thirdnum+".png");
                document.getElementById("fourthnum").setAttribute("src","images_digital_clock/"+color+"/"+fourthnum+".png");
                document.getElementById("seconddots").setAttribute("src","images_digital_clock/"+color+"/dots.png");
                document.getElementById("fifthnum").setAttribute("src","images_digital_clock/"+color+"/"+fifthnum+".png");
                document.getElementById("sixthnum").setAttribute("src","images_digital_clock/"+color+"/"+sixthnum+".png");
                t=setTimeout('startTime()',500);
            }
            
            function checkTime(i){
                if (i<10) {
                    i="0"+i;
                }
                return i;       
            }
            
            function changeClockSkin(value) {
                window.clearTimeout(t);
                color = value;
                startTime();
            }
        </script>
    </head>
 
    <body onload="startTime();">
        <select onchange="changeClockSkin(this.value)"> 
            <option value="red" selected="true">červené</option>
            <option value="blue">modré</option>
            <option value="yellow">žluté</option> 
            <option value="green">zelené</option>
            <option value="pink">růžové</option>
            <option value="white">bílé</option>
        </select> 
        
        <div id="clockdiv">
            <img id="hodiny" src="images_digital_clock/background.png" title="hodinytmp" border="0" height="60" width="150">
        
            <div id="vnitrek"><img id="firstnum" src="images_digital_clock/red/0.png" height="60" width="20"><img id="secondnum" src="images_digital_clock/red/0.png" height="60" width="20"><img id="firstdots" src="images_digital_clock/red/dots.png" height="60" width="10"><img id="thirdnum" src="images_digital_clock/red/0.png" height="60" width="20"><img id="fourthnum" src="images_digital_clock/red/0.png" height="60" width="20"><img id="seconddots" src="images_digital_clock/red/dots.png" height="60" width="10"><img id="fifthnum" src="images_digital_clock/red/0.png" height="60" width="20"><img id="sixthnum" src="images_digital_clock/red/0.png" height="60" width="20">
            </div>                   
        </div>
                                      
    </body>                                                                 
</html>
