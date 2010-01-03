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
       
    var next = webgen_firm_direction_another[session['step_all_1']['language']];
    
    var pom = 1;
    try {
        if (session['step_pp_10']['direction_data'][0] != '') {
            $("li.direction_copy:last input").val(session['step_pp_10']['direction_data'][0]);
        
            while (session['step_pp_10']['direction_data'][pom]) {
                $("li.direction_copy:last").clone().appendTo("#ul_direction");
                $("li.direction_copy:last input").val(session['step_pp_10']['direction_data'][pom]);
                $("#ul_direction .direction_label:last").text(next);
                pom++;
            }
            
            $("li.direction_copy:last").clone().appendTo("#ul_direction");
            $("li.direction_copy:last input").val("");
            $("#ul_direction .direction_label:last").text(next);
        }
    }
    catch(err) {}

    var next = webgen_firm_workload_another[session['step_all_1']['language']];
    
    var pom = 1;
    try {
        if (session['step_pp_10']['workload_data'][0]) {
            $("li.workload_copy:last input").val(session['step_pp_10']['workload_data'][0]);
        
            while (session['step_pp_10']['workload_data'][pom]) {
                $("li.workload_copy:last").clone().appendTo("#ul_workload");
                $("li.workload_copy:last input").val(session['step_pp_10']['workload_data'][pom]);
                $("#ul_workload .workload_label:last").text(next);
                pom++;
            }
            
            $("li.workload_copy:last").clone().appendTo("#ul_workload");
            $("li.workload_copy:last input").val("");
            $("#ul_workload .workload_label:last").text(next);
        }
    }
    catch(err) {}
});



function direction(field, span, next, empty, emptyfirst, valid, invalid, end, submit_info, type) {
    var str = field.value;
     
    if (span[0] != ".") {
        span = "#"+span;
    }
    else {
        span = span + ":first";
    }
       
    if (str.length > 0) {
        
        if ($("label", $(field).parents().next("li.direction_copy")).size() < 1) {
            $("li.direction_copy:last").clone().appendTo("#ul_direction");
            $("li.direction_copy:last input").val("");
            $("#ul_direction .direction_label:last").text(next);
        }
        
        $(span).text("");
        $("#span_submit_button_info").html("");
        
        
        if (checkDirection(str)) {
            $(".span_firm_direction", $(field).parents().next("li")).css({color: '#000000'});
            $(".span_firm_direction", $(field).parents().next("li")).text(valid + " "+str+". ");
        } else {
            $(".span_firm_direction", $(field).parents().next("li")).css({color: '#DF0000'});
            $(".span_firm_direction", $(field).parents().next("li")).text(invalid);
        }   
        
    } else {
        
        if ($("label", $(field).parents().next("li.direction_copy")).size() > 0 && $("#ul_direction input:last").val()=="") {
            $("#ul_direction li.direction_copy:last").remove();
        }
        
        $(".span_firm_direction", $(field).parents().next("li")).text(empty);
        
        if ($("#ul_direction li").size() == 1) {
            $(span).css({color: '#DF0000'});
            $(span).text(emptyfirst);
        } else {
            $(span).css({color: '#000000'});
            $(span).text(end);
        }
        
        if (span == "span_submit_button") {
            $("#span_submit_button_info").html(submit_info);
        }
    }
}


function workload(field, span, next, empty, emptyfirst, valid, invalid, end, submit_info, type) {
    var str = field.value;
    
    if (span[0] != ".") {
        span = "#"+span;
    }
    else {
        span = span + ":first";
    }
       
    if (str.length > 0) {
        if ($("label", $(field).parents().next("li")).size() < 2) {
            $("li.workload_copy:last").clone().appendTo("#ul_workload");
            $("li.workload_copy:last input").val("");
            $("#ul_workload .workload_label:last").text(next);
        }
        
        $(span).text("");
        $("#span_submit_button_info").html("");
        
        
        if (checkWorkload(str)) {
            $(".span_firm_workload", $(field).parents().next("li")).css({color: '#000000'});
            $(".span_firm_workload", $(field).parents().next("li")).text(valid + " "+str+". ");
        } else {
            $(".span_firm_workload", $(field).parents().next("li")).css({color: '#DF0000'});
            $(".span_firm_workload", $(field).parents().next("li")).text(invalid);
        }   
        
    } else {
        if ($("label", $(field).parents().next("li")).size() > 1 && $("#ul_workload input:last").val()=="") {
            $("#ul_workload li.workload_copy:last").remove();    
        }
        
        $(".span_firm_workload", $(field).parents().next("li")).text(empty);
        
        if ($("#ul_workload li").size() == 1) {
            $(span).css({color: '#DF0000'});
            $(span).text(emptyfirst);
        } else {
            $(span).css({color: '#000000'});
            $(span).text(end);
        }
        
        if (span == "span_submit_button") {
            $("#span_submit_button_info").html(submit_info);
        }
    }
}

function checkWorkload (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkDirection (num) {
        return true;
    //  var re = /^[^~<>?§@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}