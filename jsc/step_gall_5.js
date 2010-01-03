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
    
    var pom = 1;
    
    try {
        
        $("ul.ul_photo li:eq(0) input").val(session['step_gall_5']['gall_photo_alt_data'][0]);
        
        if (session['step_gall_5']['gall_photo_type_data'] == "a") {
            $("ul.ul_photo li:eq(1)").hide();
            $("ul.ul_photo li:eq(2)").show();
            $("ul.ul_photo li:eq(2) input").val(session['step_gall_5']['gall_photo_src_data'][0]);
        }
        else {
            $("ul.ul_photo li:eq(1)").show();
            $("ul.ul_photo li:eq(2)").hide();
        }       

        while (session['step_gall_5']['gall_photo_alt_data'][pom]) {
            
            $("ul.ul_photo:first").clone().appendTo("#li_photo");
            
            $("ul.ul_photo:last li:eq(0) input").val(session['step_gall_5']['gall_photo_alt_data'][pom]);
            
            if (session['step_gall_5']['gall_photo_type_data'] == "a") {
                $("ul.ul_photo:last li:eq(2) input").val(session['step_gall_5']['gall_photo_src_data'][pom]);
            }
            
            $("#number").text(parseInt($("#number").text())+1);
            pom++;
        }

    } catch (err) {}

});

function gall_check(field, info) {
    var value = field.value;
    
    switch (value) {
        case 'a':
            $("#li_photo span").text("");
            $(".span_gall_photo_alt:first", $(field).parents().next("li")).text(info + " " + $("select[name='gall_photo_type_data'] option:eq(0)").text() + ". ");
            $(".gall_photo_url").show();
            $(".gall_photo_file").hide();
            
            break;
        case 'b':
            $("#li_photo span").text("");
            $(".span_gall_photo_alt:first", $(field).parents().next("li")).text(info + " " + $("select[name='gall_photo_type_data'] option:eq(1)").text() + ". ");
            $(".gall_photo_file").show();
            $(".gall_photo_url").hide();
            break;
    }
}


function clone_photo(field) {

    if ($("li", $(field).parents().next("ul.ul_photo")).size() == 0 && $("input[name='gall_photo_alt_data[]']", $(field).parents("ul.ul_photo")).val() != '' && ($("input[name='gall_photo_file_data[]']", $(field).parents("ul.ul_photo")).val() != '' || $("input[name='gall_photo_src_data[]']", $(field).parents("ul.ul_photo")).val() != '' ) && ($("input[name='gall_photo_src_data[]']", $(field).parents("ul.ul_photo")).val() == '' || checkURL($("input[name='gall_photo_src_data[]']", $(field).parents("ul.ul_photo")).val()))) {
        
        $("ul.ul_photo:first").clone().appendTo("#li_photo");
        $("ul.ul_photo:last input:not(:last)").val("");
        $("ul.ul_photo:last span").text("");
    
        $("#number").text(parseInt($("#number").text())+1);
    }
}

function count_row(field, info1, info2, button) {
    var value = field.value;
    
    $("#span_submit_button").text(info1 + " " + value + " " + info2);
    $("#span_submit_button_info").text(button);
}

function isUrl(s) {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
}








