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

$(document).ready(function() {   

// Napoveda a zmacknuti CTRL + q

var isCtrl = false;

$(document).keyup(function (e) {
	if(e.which == 17) isCtrl=false;
}).keydown(function (e) {
	if(e.which == 17) isCtrl=true;
	if(e.which == 81 && isCtrl == true) {
		
        //run code for CTRL+Q -- ie, save!
        var lang = $("input[name='language']:checked").attr('value');
        
        try {
            if (session['step_all_1']['language']) {
                lang = session['step_all_1']['language'];
            }
        } catch(err) {}
        
        window.open("http://andromeda.fi.muni.cz/~xplhak/webgen/help/step_"+get['type']+"_"+get['step']+"_help.php?lang="+lang);
        
        return false;
	}
});

});

// ********* Odstrani mezery na zacatku promluvy, promluva se tvari jako by nebylo nic zadano *********

function removeSpace(str) {
    for (i=0; i < 6; i++) {
        str = str.replace(/^[ ,.;-]+$/, "");
    }

    return str;
}

// ******************** Odstraneni dvou tecek na konci promluvy **************************************** 

function removeLastTwoComma(str) {
    if (str.charAt(str.length - 1) == '.' &&  str.charAt(str.length - 2) == '.') {
        return str.substring(0, str.length - 1);
    }
    else return str;
}
  
// ************************ Kontrola vstupu a vypsani echa **************************************
  
function prompt_check(field, next, empty, valid, invalid, submit_info, type, additional_info, additional_info2) {
     
    // promenna urcujici, zda se bude menit trida promluvy, pokud je prazdna  
    
    var changeclass = true;
    
    // promenna str obsahu aktualni reteyec vlozeny uzivatelem do policka formulare
    
    var str = field.value;
    
    // resi dlouhe retezce bez mezer, aby se zobrazily alespon trochu lidsky
    
    str = div_words(str);
    
    // poresit jestli je dalsi element dan pomoci id nebo class
    
    if (next[0] != ".") {
        next = "#"+next;
    }
    else {
        next = next + ":first";
    }
          
    // ********* Kontrola, zda je promìnná podle zadaného regulárního výrazu **********************
        
        // promenna slouzici k zjisteni, zda je dany vstup zadany ve spravnem formatu - kontroluje se oproti regularnimu vyrazu
    
        var validation = true;
           
        // kontrola step_pp_6
        
        if (type == "name") { if (checkName(str)) { validation = true; } else { validation = false; }}
        if (type == "title") { changeclass = false; if (checkTitle(str)) { validation = true; } else { validation = false; }}
        
        // kontrola step_pp_7
        
        if (type == "alt") { if (checkAlt(str)) { validation = true; } else { validation = false; }}
        if (type == "url") { if (checkURL(str)) { validation = true; } else { validation = false; }}
        
        // kontrola step_pp_8
         
        if (type == "email") { if (checkEmail(str)) { validation = true; } else { validation = false; }}
        if (type == "street") { if (checkStreet(str)) { validation = true; } else { validation = false; }}
        if (type == "housenumber") { if (checkHouseNumber(str)) { validation = true; } else { validation = false; }}
        if (type == "city") { if (checkCity(str)) { validation = true; } else { validation = false; }}
        if (type == "postcode") { if (checkPostcode(str)) { validation = true; } else { validation = false; }}
        if (type == "state") { changeclass = false; if (checkState(str)) { validation = true; } else { validation = false; }}
        if (type == "phone") { if (checkPhone(str)) { validation = true; } else { validation = false; }}
        if (type == "icq") { if (checkIcq(str)) { validation = true; } else { validation = false; }}
        if (type == "skype") { if (checkSkype(str)) { validation = true; } else { validation = false; }}
        if (type == "msn") { if (checkMsn(str)) { validation = true; } else { validation = false; }}
        if (type == "irc") { if (checkIrc(str)) { validation = true; } else { validation = false; }}
        if (type == "jabber") { if (checkJabber(str)) { validation = true; } else { validation = false; }}
        if (type == "aim") { if (checkAim(str)) { validation = true; } else { validation = false; }}
       
        // kontrola step_pp_9

        if (type == "university") { if (checkUniversity(str)) { validation = true; } else { validation = false; }}
        if (type == "faculty") { if (checkFaculty(str)) { validation = true; } else { validation = false; }}
        if (type == "specialization") { if (checkSpecialization(str)) { validation = true; } else { validation = false; }}
        if (type == "yearschool") { if (checkYearSchool(str)) { validation = true; } else { validation = false; }}    
        if (type == "department") { if (checkDepartment(str)) { validation = true; } else { validation = false; }}
        if (type == "position") { if (checkPosition(str)) { validation = true; } else { validation = false; }}
        if (type == "office") { if (checkOffice(str)) { validation = true; } else { validation = false; }}
        if (type == "www") { if (checkWWW(str)) { validation = true; } else { validation = false; }}
        
        // kontrola step_pp_10
        
        if (type == "firmname") { if (checkFirmname(str)) { validation = true; } else { validation = false; }}
        if (type == "ic") { if (checkIc(str)) { validation = true; } else { validation = false; }}
        if (type == "additional") { if (checkAdditional(str)) { validation = true; } else { validation = false; }}

        // kontrola step_pp_14
           
        if (type == "nationality") { if (checkNationality(str)) { validation = true; } else { validation = false; }}
        if (type == "family") { if (checkFamily(str)) { validation = true; } else { validation = false; }}
       
        // kontrola step_pp_19
       
        if (type == "question") { if (checkQuestion(str)) { validation = true; } else { validation = false; }}
       
           
    // ********************** Vypsání promìnné do elementu z promìnné next *************************************
         
        if (removeSpace(str).length < 1) {

            if (changeclass) {
                if (next[0] != ".") {
                    $(next).removeClass();
                    $(next).toggleClass("red");
                } else {
                    $(next).css({color: '#DF0000'});
                }
            }
            else {
                if (next[0] != ".") {
                    $(next).removeClass();
                    $(next).toggleClass("normal_span");
                }
                else {
                    $(next).css({color: '#DF0000'});
                }
            }
            
            $(next).html(empty + " ");   
            
        } else { 
            
            if (validation) {
                if (changeclass) {
                    if (next[0] != ".") {
                        $(next).removeClass();
                        $(next).toggleClass("normal_span");
                    } else {
                        $(next).css({color: '#000000'});
                    }
                }
                $(next).html(removeLastTwoComma(valid + " " + str + ".")+" ");          
            
            } else {
                if (changeclass) {
                    if (next[0] != ".") {
                        $(next).removeClass();
                        $(next).toggleClass("red");
                    } else {
                        $(next).css({color: '#DF0000'});
                    }
                }
                $(next).html(removeLastTwoComma(invalid + " " + valid + " " + str + ".")+" ");
            }
        }
    
        // pokud je dalsim elementem tlacitko submit, pridaj take oznaceni o tom, ze je tam toto tlacitko
    
        if (next == "#span_submit_button") {
            $("#span_submit_button_info").html(submit_info);
        }
             
    // ********************** Speciální funkce pro step_all_2 **********************************
    
        if (type == 'login' && str.length > 0) {            
            
            $.get("./ajax/ajax_step_all_2.php", { user_name: str }, function(data){
                if (data == true && $("input:radio[@user_account]:checked").val() == 'registration') {
                    $(next).removeClass();
                    $(next).toggleClass("red");
                    $(next).text(additional_info2);
                }
                else if (data == false && $("input:radio[@user_account]:checked").val() == 'enrolment') {
                    $(next).removeClass();
                    $(next).toggleClass("red");
                    $(next).text(additional_info);
                    $("#div_css_choice").hide();
                    $("#li_css_change").hide();
                }
                else if (data == true && $("input:radio[@user_account]:checked").val() == 'enrolment') {
                    $("#li_css_change").show();
                    
                    // pokud profil existuje, tak nacist ulozenou hodnotu
                    $.get("./ajax/ajax_step_all_2_2.php", { user_name: $("input[name='user_name']").val() }, function(data){
                        $("input[name='css_choice'][value="+data+"]").attr('checked', 'checked');
                    }); 
                    
                    if ($("#css_change:checked").val() == 'on') {
                        $("#div_css_choice").show(); 
                    }
                    else {
                        $("#div_css_choice").hide();
                    }
                }               
            });       
        }
     
    // ********************** Speciální funkce pro step_all_3 **********************************  
        
        if (type == 'presentation' && str.length > 0) {
            
            if (str != '.' && str != '..') {
            
                $.get("./ajax/ajax_step_all_3.php", { user_name: additional_info2, pres_name:  str }, function(data){

                    if (data == true) {
                        $(next).removeClass();
                        $(next).toggleClass("red");
                        $(next).html(additional_info);
                    }

                });
            
            }
        }
   
    
    // ********************** Speciální funkce pro step_pp_14 ***********************************   
    
        var i;
        for (i = 1; i < 10; i++) {
            
            var ret = "#span_next_edu_button_"+i;
            if (next == ret) {
                $("#span_next_edu_button_"+i+"_info").html(additional_info);
            }
            
            var ret2 = "#span_next_work_button_"+i;
            if (next == ret2) {
                $("#span_next_work_button_"+i+"_info").html(additional_info);
            }           
        }   
}

// obdoba okomentovane prompt_check pro klonovane elementy
function prompt_clone_check(field, next, empty, valid, invalid, submit_info, type, el, additional_info) {
    

     
    var changeclass = true;
    var str = field.value;
    
    // resi dlouhe retezce bez mezer, aby se zobrazily alespon trochu lidsky
    
    str = div_words(str);     
    
    var validation = true;
    
        // kontrola step_pp_9
        
        if (type == "hour") { if (checkHour(str)) { validation = true; } else { validation = false; }}
        if (type == "project") { if (checkProject(str)) { validation = true; } else { validation = false; }}
        if (type == "description") { if (checkDescription(str)) { validation = true; } else { validation = false; }}
        if (type == "year") { if (checkYear(str)) { validation = true; } else { validation = false; }}
        if (type == "www") { if (checkWWW(str)) { validation = true; } else { validation = false; }}
    
        // kontrola step_pp_14
        
        if (type == "title") { if (checkTitle(str)) { validation = true; } else { validation = false; }}
        if (type == "school") { if (checkSchool(str)) { validation = true; } else { validation = false; }}
        if (type == "specialization") { if (checkSpecialization(str)) { validation = true; } else { validation = false; }}
    
        // kontrola step_pp_14
    
        if (type == "text") { if (checkText(str)) { validation = true; } else { validation = false; }}
        if (type == "alt") { if (checkAlt(str)) { validation = true; } else { validation = false; }}
        if (type == "url") { if (checkURL(str)) { validation = true; } else { validation = false; }}

        // ************************************************************************************************ //
           
    if (removeSpace(str).length < 1) {
        $(next+":first", $(field).parents().next(el)).css({color: '#DF0000'});
        $(next+":first", $(field).parents().next(el)).text(empty + " ");
    
    } else { 
        if (validation) {
             $(next+":first", $(field).parents().next(el)).css({color: '#000000'});
             $(next+":first", $(field).parents().next(el)).text(removeLastTwoComma(valid + " " + str + ".")+" ");          
        }
        else {
             $(next+":first", $(field).parents().next(el)).css({color: '#DF0000'});
             $(next+":first", $(field).parents().next(el)).text(removeLastTwoComma(invalid + " " + valid + " " + str + ".")+" ");
        }
    }   
    
    if (next == "span_submit_button") {
        $("#span_submit_button_info").html(submit_info);
    }

    // kdyz je nasledujici element tlacitko, ktere umoznuje pridat dalsi projekt, tak pridam jeste info 
    if (next == ".span_next_project") {
            $(next+"_button_info", $(field).parents().next(el)).html(additional_info);
    } 

    // kdyz je nasledujici element tlacitko, ktere umoznuje pridat dalsi vzdelani, tak pridam jeste info 
    if (next == ".span_next_edu_button") {
            $(".span_next_edu_button_info", $(field).parents().next(el)).html(additional_info);
    } 

    // kdyz je nasledujici element tlacitko, ktere umoznuje pridat dalsi praxe, tak pridam jeste info 
    if (next == ".span_next_work_button") {
            $(".span_next_work_button_info", $(field).parents().next(el)).html(additional_info);
    } 

    
    
    // osetreni v pripade textu, kdy neni jasny jestli bude po alt nasledovat span_file nebo span_url
    if (next == ".span_tf_photo_url" || next == ".span_tf_align_que") {
        if (removeSpace(str).length < 1) {
            $(additional_info+":first", $(field).parents().next(el).next(el)).text(empty + " ");
        
        } else { 
            if (validation) {
                 $(additional_info+":first", $(field).parents().next(el).next(el)).text(removeLastTwoComma(valid + " " + str + ".")+" ");          
            }
            else {
                 $(additional_info+":first", $(field).parents().next(el).next(el)).text(removeLastTwoComma(invalid + " " + valid + " " + str + ".")+" ");
            }
        }
    }
    
    if (next == ".span_gall_photo_file") {
        if (removeSpace(str).length < 1) {
            $(additional_info+":first", $(field).parents().next(el).next(el)).text(empty + " ");
        
        } else { 
            if (validation) {
                 $(additional_info+":first", $(field).parents().next(el).next(el)).text(removeLastTwoComma(valid + " " + str + ".")+" ");          
            }
            else {
                 $(additional_info+":first", $(field).parents().next(el).next(el)).text(removeLastTwoComma(invalid + " " + valid + " " + str + ".")+" ");
            }
        }
    }
    
    //************************************************************************************************
    
}




// ******** Funkce, ktere budou overovat, zda je dany vstup v poradku podle pozadovaneho regularniho vyrazu ************

function checkName (num) {      // kontrola jmena uzivatele
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkTitle (num) { // kontrola titulu
        return true;
  //    var re = /^[a-zA-Z. ]+$/;
  //    return num.search(re) == 0;
}

function checkAlt (num) {       // kontrola alternativniho popisu fotografie
    return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkURL (num) {       // kontrola spravnosti URL adresy
      var re = /^((http|https|ftp):\/\/)?[a-zA-Z0-9]+([-_\.]?[a-zA-Z0-9])*\.[a-zA-Z0-9]{2,4}(\/{1}[-_~&=\?\.a-z0-9]*)*$/;
      
      return num.search(re) == 0;
}

function checkEmail (num) {     // kontrola emailu
    //  return true;
    var re = /^[_a-zA-Z0-9\.\-]+@[_a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,4}$/;
    return num.search(re) == 0;
}

function checkStreet (num) {        // kontrola nazvu ulice
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkHouseNumber (num) {       // kontrola cisla domu
        return true;
    //    var re = /^[0-9a /]+?$/;
    //  return num.search(re) == 0;
}

function checkCity (num) {      // kontrola nazvu mesta
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkPostcode (num) {      // kontrola PSC
        return true;
    // var re = /^[0-9]{3}( )?[0-9]{2}$/;
    // return num.search(re) == 0;
}

function checkState (num) {     // kontrola nazvu statu
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkPhone (num) {     // kontrola telefonniho cisla
        return true;
    //  var re = /^(((00)|[+])[0-9]{3})?[0-9]{9}$/;
    //  return num.search(re) == 0;
}

function checkIcq (num) {       // kontrola uzivatelskeho jmena pro protokol icq
        return true;
    //    var re = /^$/;
    //    return num.search(re) == 0;
}

function checkSkype (num) {     // kontrola uzivatelskeho jmena pro komunikator skype
        return true;
    //    var re = /^$/;
    //    return num.search(re) == 0;
}

function checkMsn (num) {       // kontrola uzivatelskeho jmena pro msn
        return true;
    //    var re = /^$/;
    //    return num.search(re) == 0;
}

function checkIrc (num) {       // kontrola uzivatelskeho jmena pro irc
        return true;
    //    var re = /^$/;
    //    return num.search(re) == 0;
}

function checkJabber (num) {        // kontrola uzivatelskeho jmena pro jabber
        return true;
    //    var re = /^$/;
    //    return num.search(re) == 0;
}

function checkAim (num) {       // kontrola uzivatelskeho jmena pro protokol aim
        return true;
    //    var re = /^$/;
    //    return num.search(re) == 0;
}

function checkUniversity (num) {        // kontrola nazvu univerzity
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
} 
 
function checkFaculty (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkSpecialization (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
} 

function checkYearSchool (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkDepartment (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkPosition (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkOffice (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkWWW (num) {
    //  return true;
        var re = /^(http:\/\/)?[a-zA-Z0-9]+([-_\.]?[a-zA-Z0-9])*\.[a-zA-Z0-9]{2,4}(\/{1}[-_~&=\?\.a-z0-9]*)*$/;
        return num.search(re) == 0;
}

function checkFirmname (num) {
        return true;
    //  var re = /^[^~<>?§#$^*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkIc (num) {
        return true;
    //  var re = /^[0-9]{8}$/;
    //  return num.search(re) == 0;
}

function checkAdditional (num) {
        return true;
    //  var re = /^$/;
    //  return num.search(re) == 0;
} 

function checkNationality (num) {
        return true;
    //  var re = /^$/;
    //  return num.search(re) == 0;
} 

function checkFamily (num) {
        return true;
    //  var re = /^$/;
    //  return num.search(re) == 0;
} 

function checkQuestion (num) {
        return true;
    //  var re = /^$/;
    //  return num.search(re) == 0;
} 

// ****************** Prompt_clone_check ********************************

function checkHour (num) {
        return true;
    //  var re = /^[^~<>?§@$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkProject (num) {
        return true;
    //  var re = /^[^~<>?§@$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}


function checkDescription (num) {
        return true;
    //  var re = /^[^~<>?§@$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkYear (num) {
    //  return true;
        var re = /^(19[0-9]{2})|(20[0-9]{2})$/;
        return num.search(re) == 0;
} 

function checkSchool (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkText (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

// *********************************** vypise moznost z radio buttonu *******************

function show_echo(info, submit_info) {   
    $("#span_submit_button").html(info+". ");
    $("#span_submit_button_info").html(submit_info);
}

// ************************ nelezne slova delsi nez 100 znaku a rozdeli je na dve po padesati znacich

function div_words(text) {
    var text_array = text.split(" ");
    var result = "";
    
    for (i=0; i<= (text_array.length - 1); i++) {        
        
        if (text_array[i].length > 100) {
            text_array[i] = text_array[i].substr(0, 75) + " " + text_array[i].substr(75, 75) + " " + text_array[i].substr(150, 75) + " " + text_array[i].substr(225, 75) + " " + text_array[i].substr(300, 75) + " " + text_array[i].substr(375, 75) + " " + text_array[i].substr(450, 75) + " " + text_array[i].substr(525, 75) + " " + text_array[i].substr(600, 75) + " " + text_array[i].substr(675);
        }
        
        if (i==0) { result = text_array[0]; } else { result += " " + text_array[i];  } 
    }

    return result;
}




