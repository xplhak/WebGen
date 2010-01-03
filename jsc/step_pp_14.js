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
       
    var next_edu = webgen_cv_edu_from[session['step_all_1']['language']];
    var next_lang = webgen_cv_lang_type[session['step_all_1']['language']];
    
    var pom = 1;
    
    try {
        if (session['step_pp_14']['edu_title_data'][0]) {
            $("ul.ul_education li:eq(3)").show();
            $("ul.ul_education li:eq(3) input").val(session['step_pp_14']['edu_title_data'][0]);
        }

        $("ul.ul_education li:eq(0) input").val(session['step_pp_14']['edu_from_data'][0]);
        $("ul.ul_education li:eq(1) input").val(session['step_pp_14']['edu_to_data'][0]);
        $("ul.ul_education li:eq(2) select").val(session['step_pp_14']['edu_degree_data'][0]);        
        $("ul.ul_education li:eq(4) input").val(session['step_pp_14']['edu_school_data'][0]);
        $("ul.ul_education li:eq(5) input").val(session['step_pp_14']['edu_field_data'][0]);        
        
        $("ul.ul_work li:eq(0) input").val(session['step_pp_14']['work_from_data'][0]);
        $("ul.ul_work li:eq(1) input").val(session['step_pp_14']['work_to_data'][0]);
        $("ul.ul_work li:eq(2) input").val(session['step_pp_14']['work_companyname_data'][0]);        
        $("ul.ul_work li:eq(3) input").val(session['step_pp_14']['work_sphere_data'][0]); 
        $("ul.ul_work li:eq(4) input").val(session['step_pp_14']['work_pos_data'][0]);
        $("ul.ul_work li:eq(5) input").val(session['step_pp_14']['work_wload_data'][0]);           
        
        $("ul.ul_lang li:eq(0) select").val(session['step_pp_14']['lang_type_data'][0]);
        $("ul.ul_lang li:eq(1) select").val(session['step_pp_14']['lang_level_data'][0]);                 
        
        while (session['step_pp_14']['edu_from_data'][pom]) {
            
            $("ul.ul_education:first").clone().appendTo("#li_education");
            
            if (session['step_pp_14']['edu_title_data'][pom]) {
                $("ul.ul_education:last li:eq(3)").show();
                $("ul.ul_education:last li:eq(3) input").val(session['step_pp_14']['edu_title_data'][pom]);
            }

            $("ul.ul_education:last li:eq(0) input").val(session['step_pp_14']['edu_from_data'][pom]);
            $("ul.ul_education:last li:eq(1) input").val(session['step_pp_14']['edu_to_data'][pom]);
            $("ul.ul_education:last li:eq(2) select").val(session['step_pp_14']['edu_degree_data'][pom]);        
            $("ul.ul_education:last li:eq(4) input").val(session['step_pp_14']['edu_school_data'][pom]);
            $("ul.ul_education:last li:eq(5) input").val(session['step_pp_14']['edu_field_data'][pom]);               
            
            $("ul.ul_education:last .education_info").text(next_edu);
            
            pom++;
        }

        pom = 1;
        
        while (session['step_pp_14']['work_from_data'][pom]) {
            
            $("ul.ul_work:first").clone().appendTo("#li_work");
            
            $("ul.ul_work:last li:eq(0) input").val(session['step_pp_14']['work_from_data'][pom]);
            $("ul.ul_work:last li:eq(1) input").val(session['step_pp_14']['work_to_data'][pom]);
            $("ul.ul_work:last li:eq(2) input").val(session['step_pp_14']['work_companyname_data'][pom]);        
            $("ul.ul_work:last li:eq(3) input").val(session['step_pp_14']['work_sphere_data'][pom]); 
            $("ul.ul_work:last li:eq(4) input").val(session['step_pp_14']['work_pos_data'][pom]);
            $("ul.ul_work:last li:eq(5) input").val(session['step_pp_14']['work_wload_data'][pom]);            
            
            $("ul.ul_work:last .work_info").text(next_edu);
            
            pom++;
        }

        pom = 1;
        
        while (session['step_pp_14']['lang_type_data'][pom]) {
            
            $("ul.ul_lang:first").clone().appendTo("#li_lang");
            
            $("ul.ul_lang:last li:eq(0) select").val(session['step_pp_14']['lang_type_data'][pom]);
            $("ul.ul_lang:last li:eq(1) select").val(session['step_pp_14']['lang_level_data'][pom]);          
            
            $("ul.ul_lang:last .lang_info").text(next_lang);
            
            pom++;
        }    
    } catch(err) {}
});

function choice_check(field, span_que, span_basic, span_next, valid, a, b, c, d) {
    var value = field.value;
    
    $("#"+span_basic).removeClass();
    $("#"+span_basic).toggleClass("normal_span");
    $("#"+span_next).removeClass();
    $("#"+span_next).toggleClass("normal_span");
    
    
    switch (value) {
        case 'a': 
            a = a[0].toLowerCase() + a.substring(1);
            show_hide(span_que, "hide", span_next);
            $("#"+span_next).html(valid + " " + a + ". ");
            break;
          
        case 'b':
            show_hide(span_que, "show", span_next);
            $("#"+span_basic).html(valid + " " + b.toLowerCase() + ". ");
            break;
        
        case 'c':
            show_hide(span_que, "hide", span_next);
            $("#"+span_next).html(valid + " " + c.toLowerCase() + ". ");
            break;
        
        case 'd': 
            d = d[0].toLowerCase() + d.substring(1);
            show_hide(span_que, "hide", span_next);
            $("#"+span_next).html(valid + " " + d + ". ");
            break;
        
        default: $("#"+span_next).html(valid + ": " + a + ". ");
    }
}

function show_hide(span, view, nextspan) {
    
    if (view == "show") {
        $("#"+span).show();
        $("#"+nextspan).html("");
    }
    else {
        $("#"+span).hide();
        $("#"+nextspan).html("");
    }
}

function edu_degree_check(field, span, span2, prompt, el) {
    value = field.value;
    
    if (value < 3) {
        $(span2+":first", $(field).parents().next(el).next(el)).text(prompt + " " + $("select[name='edu_degree_data[]'] option:eq("+value+")").text() + ".");
        $(field).parents().next(".li_edu_title:first").hide();
    }
    else {
        $(span+":first", $(field).parents().next(el)).text(prompt + " " + $("select[name='edu_degree_data[]'] option:eq("+value+")").text() + ".");
        $(field).parents().next(".li_edu_title:first").show();
    }
}

function clone_education(field, str) {
    
    if ($("li", $(field).parents().next("ul.ul_education")).size() == 0 && $("input[name='edu_from_data[]']", $(field).parents("ul.ul_education")).val() != '' && $("input[name='edu_school_data[]']", $(field).parents("ul.ul_education")).val() != '') {
        $("ul.ul_education:first").clone().appendTo("#li_education");
        $("ul.ul_education:last input:not(:last)").val("");
        $("ul.ul_education:last span").text("");
        $("ul.ul_education:last .li_edu_title").hide();

        $("ul.ul_education:last .education_info").text(str);
    }   
}

function clone_work(field, str) {
    
    if ($("li", $(field).parents().next("ul.ul_work")).size() == 0 && $("input[name='work_from_data[]']", $(field).parents("ul.ul_work")).val() != '' && $("input[name='work_companyname_data[]']", $(field).parents("ul.ul_work")).val() != '') {
        $("ul.ul_work:first").clone().appendTo("#li_work");
        $("ul.ul_work:last input:not(:last)").val("");
        $("ul.ul_work:last span").text("");

        $("ul.ul_work:last .work_info").text(str);
    }   
}


function degree_check(field, span, valid, name, add_info) {
    var value = field.value;
       
    $(span, $(field).parents().next("li")).text(valid + " " + $("select[name='"+name+"'] option:eq("+value+")").text() + ". ");

    if (span == ".span_next_lang_button") {
        $(span+"_info").text(add_info);
    }

}

function clone_lang(field, str) {
    
    if ($("li", $(field).parents().next("ul.ul_lang")).size() == 0) {
        $("ul.ul_lang:first").clone().appendTo("#li_lang");
        $("ul.ul_lang:last input:not(:last)").val("");
        $("ul.ul_lang:last span").text("");

        $("ul.ul_lang:last .lang_info").text(str);
    }   
}

