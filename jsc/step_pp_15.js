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
        
        $("ul.ul_textfield li:eq(0) textarea").text(session['step_pp_15']['tf_text'][0].replace(/<br \/>/g, "\n"));
        $("ul.ul_textfield li:eq(1) select").val(session['step_pp_15']['tf_photo_que'][0]);
        
        if (session['step_pp_15']['tf_photo_que'][0] == "a") {
            $("ul.ul_textfield li:eq(2)").show();
            $("ul.ul_textfield li:eq(2) input").val(session['step_pp_15']['tf_photo_alt_data'][0]);
            $("ul.ul_textfield li:eq(3)").show();
            $("ul.ul_textfield li:eq(3) input").val(session['step_pp_15']['tf_photo_src_data'][0]);
            $("ul.ul_textfield li:eq(4)").hide();
        }
        
        if (session['step_pp_15']['tf_photo_que'][0] == "b") {
            $("ul.ul_textfield li:eq(2)").show();
            $("ul.ul_textfield li:eq(2) input").val(session['step_pp_15']['tf_photo_alt_data'][0]);
            $("ul.ul_textfield li:eq(4)").show();
        }
                
        $("ul.ul_textfield li:eq(5) select").val(session['step_pp_15']['tf_align_que'][0]);
        

        while (session['step_pp_15']['tf_text'][pom]) {
            
            $("ul.ul_textfield:first").clone().appendTo("#div_textfield");
            
            $("ul.ul_textfield:last li:eq(0) textarea").text(session['step_pp_15']['tf_text'][pom].replace(/<br \/>/g, "\n"));
            $("ul.ul_textfield:last li:eq(1) select").val(session['step_pp_15']['tf_photo_que'][pom]);
        
            if (session['step_pp_15']['tf_photo_que'][pom] == "a") {
                $("ul.ul_textfield:last li:eq(2)").show();
                $("ul.ul_textfield:last li:eq(2) input").val(session['step_pp_15']['tf_photo_alt_data'][pom]);
                $("ul.ul_textfield:last li:eq(3)").show();
                $("ul.ul_textfield:last li:eq(3) input").val(session['step_pp_15']['tf_photo_src_data'][pom]);
                $("ul.ul_textfield:last li:eq(4)").hide();
            }
            
            if (session['step_pp_15']['tf_photo_que'][pom] == "b") {
                $("ul.ul_textfield:last li:eq(2)").show();
                $("ul.ul_textfield:last li:eq(2) input").val(session['step_pp_15']['tf_photo_alt_data'][pom]);
                $("ul.ul_textfield:last li:eq(4)").show();
            }
                    
            $("ul.ul_textfield:last li:eq(5) select").val(session['step_pp_15']['tf_align_que'][pom]);
            
            pom++;
        }

    } catch (err) {}

});

function photo_choice(field, info) {
    var value = field.value;
    
    switch (value) {
        case 'a':
            $(".span_tf_photo_alt", $(field).parents().next("li")).text(info + " " + $("select[name='tf_photo_que[]'] option:eq(1)").text() + ". ");
            $(".span_tf_align_que", $(field).parents().next("li").next("li").next("li").next("li")).text("");
            $(field).parents().next("li").show();
            $(field).parents().next("li").next("li").show();
            $(field).parents().next("li").next("li").next("li").hide();
            break;
        case 'b':
            $(".span_tf_photo_alt", $(field).parents().next("li")).text(info + " " + $("select[name='tf_photo_que[]'] option:eq(2)").text() + ". ");
            $(".span_tf_align_que", $(field).parents().next("li").next("li").next("li").next("li")).text("");
            $(field).parents().next("li").show();
            $(field).parents().next("li").next("li").hide();
            $(field).parents().next("li").next("li").next("li").show();
            break;
        case 'c':
            $(".span_tf_align_que", $(field).parents().next("li").next("li").next("li").next("li")).text(info + " " + $("select[name='tf_photo_que[]'] option:eq(0)").text() + ". ");
            $(field).parents().next("li").hide();
            $(field).parents().next("li").next("li").hide();
            
            
            break;
    }
}

function align_check(field, button, info) {
    var value = field.value; 
    
    if (value == "a") {
        $(".span_next_tf_button", $(field).parents().next("li")).text(info + " " + $("select[name='tf_align_que[]'] option:eq(0)").text() + ". " + button);
    }
    else if (value == "b") {
        $(".span_next_tf_button", $(field).parents().next("li")).text(info + " " + $("select[name='tf_align_que[]'] option:eq(1)").text() + ". " + button);
    }
}

function clone_textfield(field) {

    if ($("li", $(field).parents().next("ul.ul_textfield")).size() == 0) {
        
        $("ul.ul_textfield:first").clone().appendTo("#div_textfield");
        $("ul.ul_textfield:last input:not(:last)").val("");
        $("ul.ul_textfield:last span").text("");
        $("ul.ul_textfield:last textarea").text("");
        $("ul.ul_textfield:last .tf_photo_alt").hide();
        $("ul.ul_textfield:last .tf_photo_url").hide();
        $("ul.ul_textfield:last .tf_photo_file").hide();
    }
}
