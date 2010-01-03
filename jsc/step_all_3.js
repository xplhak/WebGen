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

function show_pres1_names(err, ok, submit) {
    $("#presentation_list1").show();
    $("#presentation_list2").hide();
    $("#presentation_list2 input").attr("checked", false);
    
    if ($("input[name='edit_presentation_name']:checked").val() == undefined) {
        $("#span_submit_button").html(err);
        $("#span_submit_button_info").html(submit);
    } else {
        $("#span_submit_button").html(ok + " " + $("input[name='edit_presentation_name']:checked").val() + ". ");
        $("#span_submit_button_info").html(submit);
    }
}

function show_newpres_name() {
    $("#presentation_list1").hide();
    $("#presentation_list2").hide();
    
    $("#span_submit_button").html("");
    $("#span_submit_button_info").html("");
}

function show_pres2_names(err, ok, submit) {
    $("#presentation_list1").hide();
    $("#presentation_list1 input").attr("checked", false);
    $("#presentation_list2").show();
    
    if ($("input[name='delete_presentation_name']:checked").val() == undefined) {
        $("#span_submit_button").html(err);
        $("#span_submit_button_info").html(submit);
    } else {
        $("#span_submit_button").html(ok + " " + $("input[name='delete_presentation_name']:checked").val() + ". ");
        $("#span_submit_button_info").html(submit);
    }
}

function show_echo(field, str, info, submit_info) {
    
    $("#span_submit_button").removeClass();
    $("#span_submit_button").toggleClass("normal_span");
    $("#span_submit_button").html(info+" "+str+". ");
    $("#span_submit_button_info").html(submit_info);
}