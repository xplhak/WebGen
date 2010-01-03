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
       
    var next = feat_answ_next[session['step_all_1']['language']];
    
    var pom = 1;
    try {
        if (session['step_pp_18']['features_quest_answer'][0] != '' || session['step_pp_18']['features_quest_answer'][1] != '') {
            
            $("li.quest_copy:last input").val(session['step_pp_18']['features_quest_answer'][0]);
        
            while (session['step_pp_18']['features_quest_answer'][pom]) {
                $("li.quest_copy:last").clone().appendTo("#ul_quest");
                $("li.quest_copy:last input").val(session['step_pp_18']['features_quest_answer'][pom]);
                $("#ul_quest .que_label:last").text(next);
                pom++;
            }
            
            $("li.quest_copy:last").clone().appendTo("#ul_quest");
            $("li.quest_copy:last input").val("");
            $("#ul_quest .que_label:last").text(next);
        }
    }
    catch(err) {}
});

function hour_select(field, choice) {
    var pom = 0;

    if (field.value == 'b') {
        pom++;
    }

    $("#span_features_que").text(choice + " " + $("select[name='features_hour_que'] option:eq("+pom+")").text() + ".");
}

function answer(field, span, next, empty, emptyfirst, valid, invalid, end, submit_info, type) {
    var str = field.value;
       
    if (str.length > 0) {
        
        
        if ($("label", $(field).parents().next("li")).size() < 1) {
            $("li.quest_copy:last").clone().appendTo("#ul_quest");
            $("li.quest_copy:last input").val("");
            $("#ul_quest .que_label:last").text(next);
        }

        
        $("#"+span).text("");
        $("#span_submit_button_info").html("");
        
        if (checkAnswer(str)) {
            $(".que_echo", $(field).parents().next("li")).css({color: '#000000'});
            $(".que_echo", $(field).parents().next("li")).text(valid + " "+str+". ");
        } else {
            $(".que_echo", $(field).parents().next("li")).css({color: '#DF0000'});
            $(".que_echo", $(field).parents().next("li")).text(invalid);
        }
          
        

    } else {
        if ($("label", $(field).parents().next("li")).size() > 0 && $("#ul_quest input:last").val()=="") {
            $("#ul_quest li.quest_copy:last").remove();
            
        }
        
        if ($("#ul_quest li").index($("li:last")) == 0) {
            $("#"+span).css({color: '#DF0000'});
            $("#"+span).text(emptyfirst);
        } else {
            $("#"+span).css({color: '#000000'});
            $("#"+span).text(end);
        }
        
        if (span == "span_submit_button") {
            $("#span_submit_button_info").html(submit_info);
        }
    }
}        
    
function checkAnswer (num) {
        return true;
    //  var re = /^[^~<>?§@$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}



