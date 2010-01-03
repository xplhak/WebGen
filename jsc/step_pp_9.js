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
       
    var next = webgen_u_r_day[session['step_all_1']['language']];
    var pom = 1;
    
    try {
        
        if (session['step_pp_9']['hour_day_data'][0]) {
            $("#li_hours li").show();
            
            $("ul.ul_hours li:eq(0) input").val(session['step_pp_9']['hour_day_data'][0]);
            $("ul.ul_hours li:eq(1) input").val(session['step_pp_9']['hour_from_data'][0]);
            $("ul.ul_hours li:eq(2) input").val(session['step_pp_9']['hour_to_data'][0]);         
        
            while (session['step_pp_9']['hour_day_data'][pom]) {
                $("ul.ul_hours:last").clone().appendTo("#li_hours");
                
                $("ul.ul_hours:last li:eq(0) input").val(session['step_pp_9']['hour_day_data'][pom]);
                $("ul.ul_hours:last li:eq(1) input").val(session['step_pp_9']['hour_from_data'][pom]);
                $("ul.ul_hours:last li:eq(2) input").val(session['step_pp_9']['hour_to_data'][pom]);            
                
                $("ul.ul_hours:last li:eq(0) .hours_label").text(next);
                pom++;
            }
            
            $("ul.ul_hours:last").clone().appendTo("#li_hours");
            $("ul.ul_hours:last li input").val("");
            $("ul.ul_hours:last li:eq(1)").hide();
            $("ul.ul_hours:last li:eq(2)").hide(); 
          
          $("#ul_quest .que_label:last").text(next);
        }
    } catch(err) {}
    
    
    var next = webgen_u_s_project_next[session['step_all_1']['language']];
    var coauth = webgen_u_s_project_coauthor_next[session['step_all_1']['language']];
    var pom = 1;
    
    try {
        $("ul.ul_projects li:eq(0) input").val(session['step_pp_9']['project_name_data'][0]);
        $("ul.ul_projects li:eq(1) input").val(session['step_pp_9']['project_description_data'][0]);
        $("ul.ul_projects li:eq(4) input").val(session['step_pp_9']['project_year_data'][0]);
        if (session['step_pp_5']['university_projectpages'] == 'yes') {
            $("ul.ul_projects li:eq(5) input").val(session['step_pp_9']['project_www_data'][0]);                
        }
        
        var copom = 0;
        
        while (session['step_pp_9']['project_coauthor0_data'][copom]) {
              
            if (copom == 0) {
                $("ul.ul_projects li:eq(2) input").val(session['step_pp_9']['project_coauthor0_data'][0]);
            }
            else {
                $("li.li_coauthors:first").clone().appendTo(".ul_coauthors");
                $("li.li_coauthors:last input").val(session['step_pp_9']['project_coauthor0_data'][copom]);
                $("li.li_coauthors:last .coauthor_info").text(coauth);
            } 
            
            copom++;
        }

        while (session['step_pp_9']['project_name_data'][pom]) {
            $("ul.ul_projects").clone().appendTo("#li_projects");
            $("ul.ul_projects:last .li_coauthors:not(:first)").remove();
            $("ul.ul_projects:last input:not(:last)").val("");
            $("ul.ul_projects:last .span_university_project").text("");
            $("#li_projects .span_university_project_info:last").text(next);
        
            $("ul.ul_projects:last li:eq(0) input").val(session['step_pp_9']['project_name_data'][pom]);
            $("ul.ul_projects:last li:eq(1) input").val(session['step_pp_9']['project_description_data'][pom]);
            $("ul.ul_projects:last li:eq(4) input").val(session['step_pp_9']['project_year_data'][pom]);
            if (session['step_pp_5']['university_projectpages'] == 'yes') {
                $("ul.ul_projects:last li:eq(5) input").val(session['step_pp_9']['project_www_data'][pom]);                
            }
        
            copom = 0;

            while (session['step_pp_9']['project_coauthor'+pom+'_data'][copom]) { 
               
                if (copom == 0) {
                    $("ul.ul_projects:last li:eq(2) input").val(session['step_pp_9']['project_coauthor'+pom+'_data'][0]);
                    $("ul.ul_projects:last .li_coauthors input").attr("name", "project_coauthor"+pom+"_data[]");  
                }
                else {
                    $("li.li_coauthors:first").clone().appendTo(".ul_coauthors:last");
                    $("li.li_coauthors:last input").val(session['step_pp_9']['project_coauthor'+pom+'_data'][copom]);
                    $("li.li_coauthors:last .coauthor_info").text(coauth);
                    $("ul.ul_projects:last .li_coauthors input").attr("name", "project_coauthor"+pom+"_data[]");      
                } 
                
                copom++;
            }

            pom++;       
        }
           
    } catch(err) {}
});


function hours(field, span, next, empty, emptyfirst, valid, invalid, end, submit_info, type) {
    var str = field.value;
       
    if (span[0] != ".") {
        span = "#"+span;
    }
    else {
        span = span + ":first";
    }   
    
    if (str.length > 0) {
        if ($("label", $(field).parents().next("ul")).size() < 1) {            
        
            $("ul.ul_hours:last").clone().appendTo("#li_hours");
            $("ul.ul_hours:last input").val("");
            $("ul.ul_hours:last .span_university_hour").text("");
            
            $("li.hours_invisible").show();
            $("ul.ul_hours:last li.hours_invisible").hide();
            
            $("#li_hours .hours_label:last").text(next);
        }
        
        $(span).text("");
        
        if (checkDay(str)) {
            $("span.span_university_from", $(field).parents().next("li")).css({color: '#000000'});
            $("span.span_university_from", $(field).parents().next("li")).text(valid + " " + str);
        } else {
            $("span.span_university_from", $(field).parents().next("li")).css({color: '#DF0000'});
            $("span.span_university_from", $(field).parents().next("li")).text(invalid);
        }        
        
        if (span == "span_submit_button") { $("#span_submit_button_info").html(""); }
        
    } else {
        
        if ($("label", $(field).parents().next("ul")).size() > 0 && $("li:first input", $(field).parents().next("ul")).val() == "") { 
            $(field).parents().next("ul").remove();
            $("ul.ul_hours:last li.hours_invisible").hide();
        }
        
        if ($("#li_hours ul.ul_hours").size() == 1) {
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

function clone_project(field, str, coauth) {
    
    if ($("li", $(field).parents().next("ul")).size() == 0 && $("input[name='project_name_data[]']", $(field).parents("ul.ul_projects")).val() != '') {
        $("ul.ul_projects:first").clone().appendTo("#li_projects");
        $("ul.ul_projects:last .li_coauthors:not(:first)").remove();
        $("ul.ul_projects:last .li_coauthors input").attr("name", "project_coauthor"+($("#li_projects ul.ul_projects").index($($(field).parents("ul.ul_projects:last")))+1)+"_data[]");
        $("ul.ul_projects:last input:not(:last)").val("");
        $("ul.ul_projects:last span").text("");

        $("ul.ul_projects:last .coauthor_info").text(coauth);
        $("ul.ul_projects:last .span_university_project_info").text(str);
    }
}

function coauthors(field, span, next, empty, emptyfirst, valid, invalid, end, submit_info, type) {
    var str = field.value;
       
    if (str.length > 0) {        
        if ($("label", $(field).parents().next("li.li_coauthors")).size() < 1) {   
            $("li.li_coauthors:first", $($(field).parents("ul.ul_projects:last"))).clone().appendTo($(field).parents(".ul_coauthors"));
            $("ul.ul_projects .li_coauthors input", $($(field).parents("ul.ul_projects:last"))).attr("name", "project_coauthor"+($("#li_projects ul.ul_projects").index($($(field).parents("ul.ul_projects:last"))))+"_data[]");
            $("li.li_coauthors:last input", $($(field).parents("ul.ul_projects:last"))).val("");
            $(".ul_coauthors .coauthor_info:last", $($(field).parents("ul.ul_projects:last"))).text(next);
        }
        
        var validation = true;
        
        if (checkCoauthor(str)) {
            $(".span_university_coauthor:last", $(field).parents().next("li")).css({color: '#000000'});
            $(".span_university_coauthor:last", $(field).parents().next("li")).text(valid + " "+str+". ");
        } else { 
            $(".span_university_coauthor:last", $(field).parents().next("li")).css({color: '#DF0000'});
            $(".span_university_coauthor:last", $(field).parents().next("li")).text(invalid);
        }
        
        
        
    } else {
        if ($("label", $(field).parents().next("li.li_coauthors")).size() > 0 && $("input", $(field).parents().next("li")).val() == "") {
                       
            $(field).parents("li").next(".li_coauthors").remove();
        }
        else {
            $(".span_university_coauthor", $(field).parents().next("li")).text(end);
        }
        
        if ($("li.li_coauthors", $(field).parents("ul.ul_coauthors")).size() == 1) {
            $(span).text(emptyfirst);
        } else {
            $(span).text(empty);
        }
    }
}


function checkDay (num) {
        return true;
    //  var re = /^[^~<>?§@$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}

function checkCoauthor (num) {
        return true;
    //  var re = /^[^~<>?§!@#$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}