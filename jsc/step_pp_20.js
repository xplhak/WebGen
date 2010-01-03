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

function analyze_send_choice(field, email_pers, email_cv, link_valid, button, button_link) {
    var value = field.value;
    
    if (value == "a" || value == "b" || value == "c") {
        
        if (email_pers || email_cv) {
        
            $("#email_send_choice").show();
            
            if (value == "a") {
                $("#span_email_send_choice").html(link_valid + ' ' + $("select[name='send_choice'] option:eq(0)").text());
            } else if (value == "b") {
                $("#span_email_send_choice").html(link_valid + ' ' + $("select[name='send_choice'] option:eq(1)").text());
            } else if (value == "c") {
                $("#span_email_send_choice").html(link_valid + ' ' + $("select[name='send_choice'] option:eq(2)").text());
            }
        } else {    
            $("#email_send").show();
        }                    
        
        $("#button_send input").val(button);
    
    } else {

        $("#email_send_choice").hide();
        $("#email_send").hide();
        $("#button_send input").val(button_link);
    
    }
}

function email_choice(field, email_pers, email_cv, email_valid, button, show_button, link_valid, email_c) {
    var value = field.value;
    
    if (value == "a" || value == "b") {
        $("#email_send").hide();
        
        $("#span_submit_button").removeClass();
        $("#span_submit_button").toggleClass("normal_span");
        
        if (value == "a" && email_pers) {
            $("#span_submit_button").html(email_valid + " " + session['step_pp_8']["email_data"] + ". " + button + " " + show_button + ". ");
        }
        else if (value == "b" && email_cv) {
            $("#span_submit_button").html(email_valid + " " + session['step_pp_14']["email_cv_data"] + ". " + button + " " + show_button + ". ");
        }                
    }
    
    else {     
        $("#email_send").show();
        $("#span_submit_button").html("");
        $("#span_submit_button_info").html("");
        $("#span_email").html(link_valid + " " + email_c + ". ");
    
    }
}