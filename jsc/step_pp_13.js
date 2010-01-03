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

function birth_check(field, next, empty, valid, invalid, submit_info, type, valid2, lang) {
    var str = field.value;
    var validation = true;
   
    if (type == "birthdate") { if (checkBirthdate(str)) { validation = true; } else { validation = false; }}
    if (type == "birthplace") { if (checkBirthplace(str)) { validation = true; } else { validation = false; }}
   
    if (removeSpace(str).length < 1) {
        $("#"+next).removeClass();
        $("#"+next).toggleClass("red");
        $("#"+next).html(empty + " ");
    }
    
    else { 
        if (validation) {
            $("#"+next).removeClass();
            $("#"+next).toggleClass("normal_span");
           
            if (valid2 == "") {
                $("#"+next).html(valid + " " + str + ". ");
            }
            else {
                $("#"+next).html(valid + " " + str + ". " + valid2 + " " + getSign(replaceToComma(str), lang) +". ");
            }     
        }
        else {
            $("#"+next).removeClass();
            $("#"+next).toggleClass("red");
            $("#"+next).html(invalid + " " + valid + " " + str + ". ");
       } 
    }
   
    if (next == "span_submit_button") {
        $("#span_submit_button_info").html(submit_info);
    }
}

// nahrad lomitka a pomlcky za tecky

function replaceToComma(str) {
    str = str.replace(/\//g, ".");
    str = str.replace(/-/g, ".");
           
    return str;
}


function checkBirthdate(num) {
    //  return true;
        var re = /^0?([1-9]|[12][0-9]|3[01])(\.|\/|-) ?0?([1-9](\.|\/|-)|1[0-2](\.|\/|-)|ledna|unora|brezna|dubna|kvetna|cervna|cervence|srpna|zari|rijna|listopadu|prosince) ?(20[0-9]{2}|19[0-9]{2})$/;
        return num.search(re) == 0;
}

function checkBirthplace(num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function getDay(bd) {

    var resStr = '';
    
    if (bd.charAt(1) == '.') {
        resStr = bd.substring(0,1);
    }
    else if (bd.charAt(2) == '.') {
        resStr = bd.substring(0,2);
    }
    else if (bd.charAt(3) == '.') {
        resStr = bd.substring(0,3);
    }
    
    var result = resStr;
    return result;
}

function removeDiacritic(input) {
    sdiak = "áčďéěíňó šťúů ýřžÁČĎĚÍŇÓ ŠŤÚŮ ÝŘŽ"; 
    bdiak = "acdeeino stuu yrzACDEINO STUU YRZ"; 
    output = "";
        
    for (i = 0; i < input.length; i++) { 
        if (sdiak.indexOf(input.charAt(i)) != -1) { 
              output += bdiak.charAt(sdiak.indexOf(input.charAt(i))); 
        }
        else {
          output += input.charAt(i);
        }
    }  
    
    return output; 
}

   
function getMonth(bd) {
    if (removeDiacritic(bd).toLowerCase().indexOf("ledna") > -1) {
        return 1;
    }
    else if (removeDiacritic(bd).toLowerCase().indexOf("unora") > -1) {
        return 2;
    }
    else if (removeDiacritic(bd).toLowerCase().indexOf("brezna") > -1) {
        return 3;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("dubna") > -1) {
        return 4;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("kvetna") > -1) {
        return 5;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("cervna") > -1) {
        return 6;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("cervence") > -1) {
        return 7;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("srpna") > -1) {
        return 8;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("zari") > -1) {
        return 9;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("rijna") > -1) {
        return 10;
    } 
    else if (removeDiacritic(bd).toLowerCase().indexOf("listopadu") > -1) {
        return 11;
    }
    else if (removeDiacritic(bd).toLowerCase().indexOf("prosince") > -1) {
        return 12;
    }
    else {
        firstInd = bd.indexOf('.');
            
        while (bd.charAt(firstInd+1) == ' ' || bd.charAt(firstInd) == '0') {
            firstInd++;
        }
  
        secondInd = bd.indexOf('.', firstInd + 1);
        return bd.substring(firstInd + 1, secondInd);
    }    
}

function getYear(bd) {
    return bd.substring(bd.length - 4)
}

function getSign(bd, lang) {
    var sign = '';
        
    if (lang == "czech") {
        if (getMonth(bd) == 1) { if (getDay(bd) <= 20) { sign = "Kozoroh"; } else { sign = "Vodnář"; } }
        if (getMonth(bd) == 2) { if (getDay(bd) <= 20) { sign = "Vodnář"; } else { sign = "Ryby"; } }
        if (getMonth(bd) == 3) { if (getDay(bd) <= 20) { sign = "Ryby"; } else { sign = "Beran"; } }
        if (getMonth(bd) == 4) { if (getDay(bd) <= 20) { sign = "Beran"; } else { sign = "Býk"; } }  
        if (getMonth(bd) == 5) { if (getDay(bd) <= 21) { sign = "Býk"; } else { sign = "Blíženci"; } }
        if (getMonth(bd) == 6) { if (getDay(bd) <= 21) { sign = "Blíženci"; } else { sign = "Rak"; } }
        if (getMonth(bd) == 7) { if (getDay(bd) <= 22) { sign = "Rak"; } else { sign = "Lev"; } }
        if (getMonth(bd) == 8) { if (getDay(bd) <= 22) { sign = "Lev"; } else { sign = "Panna"; } }
        if (getMonth(bd) == 9) { if (getDay(bd) <= 23) { sign = "Panna"; } else { sign = "Váhy"; } }
        if (getMonth(bd) == 10) { if (getDay(bd) <= 23) { sign = "Váhy"; } else { sign = "Štír"; } }
        if (getMonth(bd) == 11) { if (getDay(bd) <= 22) { sign = "Štír"; } else { sign = "Střelec"; } }
        if (getMonth(bd) == 12) { if (getDay(bd) <= 21) { sign = "Střelec"; } else { sign = "Kozoroh"; } }         
    }
    else {
        if (getMonth(bd) == 1) { if (getDay(bd) <= 20) { sign = "The Sea-goat"; } else { sign = "The Water Carrier"; } }
        if (getMonth(bd) == 2) { if (getDay(bd) <= 20) { sign = "The Water Carrier"; } else { sign = "The Two Fish"; } }
        if (getMonth(bd) == 3) { if (getDay(bd) <= 20) { sign = "The Two Fish"; } else { sign = "The Ram"; } }
        if (getMonth(bd) == 4) { if (getDay(bd) <= 20) { sign = "The Ram"; } else { sign = "The Bull"; } }  
        if (getMonth(bd) == 5) { if (getDay(bd) <= 21) { sign = "The Bull"; } else { sign = "The Twins"; } }
        if (getMonth(bd) == 6) { if (getDay(bd) <= 21) { sign = "The Twins"; } else { sign = "The Crab"; } }
        if (getMonth(bd) == 7) { if (getDay(bd) <= 22) { sign = "The Crab"; } else { sign = "The Lion"; } }
        if (getMonth(bd) == 8) { if (getDay(bd) <= 22) { sign = "The Lion"; } else { sign = "The Virgin"; } }
        if (getMonth(bd) == 9) { if (getDay(bd) <= 23) { sign = "The Virgin"; } else { sign = "The Scales"; } }
        if (getMonth(bd) == 10) { if (getDay(bd) <= 23) { sign = "The Scales"; } else { sign = "The Scorpion"; } }
        if (getMonth(bd) == 11) { if (getDay(bd) <= 22) { sign = "The Scorpion"; } else { sign = "The Archer"; } }
        if (getMonth(bd) == 12) { if (getDay(bd) <= 21) { sign = "The Archer"; } else { sign = "The Sea-goat"; } }
    }

    document.getElementById("sign_data").setAttribute('value', sign);
    return sign;
}
