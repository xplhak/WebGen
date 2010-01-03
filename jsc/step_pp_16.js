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
       
    var next = webgen_links_undef_description[session['step_all_1']['language']];
    var pom = 1;
    
    try {
        if (session['step_pp_16']['link_url_data'][0] || session['step_pp_16']['link_description_data'][0]) {
            $("#li_links li").show();
            
            $("ul.ul_links li:eq(0) input").val(session['step_pp_16']['link_description_data'][0]);
            $("ul.ul_links li:eq(1) input").val(session['step_pp_16']['link_url_data'][0]);      
        }
    
        while (session['step_pp_16']['link_url_data'][pom] || session['step_pp_16']['link_url_data'][pom+1]) {
            $("ul.ul_links:last").clone().appendTo("#li_links");
            
            $("ul.ul_links:last li:eq(0) input").val(session['step_pp_16']['link_description_data'][pom]);
            $("ul.ul_links:last li:eq(1) input").val(session['step_pp_16']['link_url_data'][pom]);           
            
            $("ul.ul_links:last li:eq(0) .links_label").text(next);
            
            pom++;
        }
        
        $("ul.ul_links:last").clone().appendTo("#li_links");
        $("ul.ul_links:last li input").val("");
        $("ul.ul_links:last li:eq(1)").hide();
    
    } catch(err) {}
});
    
function pack_links(check, uncheck, type) {
    if ($("#links_"+type+"_pack_info").html() == uncheck) {
        $("#links_"+type+"_pack_info").html(check);
        $("#"+type+"_list").show();
    }
    else if ($("#links_"+type+"_pack_info").html() == check) {
        $("#links_"+type+"_pack_info").html(uncheck);
        $("#"+type+"_list").hide();
    }
}

function links_info(field, span, next, empty, emptyfirst, valid, invalid, end, submit_info, type) {
    var str = field.value;
       
    if (str.length > 0) {
        if ($("label", $(field).parents().next("ul")).size() < 1) {            
  
            $("ul.ul_links:last").clone().appendTo("#li_links");
            $("ul.ul_links:last input").val("");
            $("ul.ul_links:last .span_university_hour").text("");
            
            $(field).parents().next("li").show();
            $("ul.ul_links:last li.links_invisible").hide();
            
            $("#li_links .links_label:last").text(next);
        
        }
        
        $("#"+span).text("");
    
        if (checkDescription(str)) {
            $(".span_links_url", $(field).parents().next("li")).css({color: '#000000'});
            $(".span_links_url", $(field).parents().next("li")).text(valid + " " + str + ". ");
        } else {
            $(".span_links_url", $(field).parents().next("li")).css({color: '#DF0000'});
            $(".span_links_url", $(field).parents().next("li")).text(invalid);
        }     
 
    } else {
        
        if ($("label", $(field).parents().next("ul")).size() > 0 && $("li:first input", $(field).parents().next("ul")).val() == "") { 
            $(field).parents().next("ul").remove();
            $(field).parents().next("li").hide();
        }
        else {
            $(".span_links_url", $(field).parents().next("li")).text(empty);
        }
        
        if ($("#li_links ul").index($("ul:last")) == 0) {
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

function checkDescription (num) {
        return true;
    //  var re = /^[^~<>?§@$^&*`°;+=´%/():|\[\]\\]+$/;
    //  return num.search(re) == 0;
}