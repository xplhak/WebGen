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

function add_news() {
    doFocus();
    
    if (checkFields()) {
        $.post("./page_files/gb_add.php", { name: $("input[name='name']").val(), email: $("input[name='email']").val(), url: $("input[name='url']").val(), msg: $("#msg").val(), spam: $("input[name='spam']").val()  }, function(data){

            if (data != false) {
                
                $("#messages").prepend("<div class=\"gb_msg\">");
                $("div .gb_msg:first").append("<div class=\"gb_header\">");
                $("div .gb_header:first").append("<span>"+data+"</span>");
                if ($("input[name='email']").val() != '@' && $("input[name='email']").val() != '') {
                    $("div .gb_header:first").append(" <a href=\"mailto:"+$("input[name='email']").val()+"\">"+$("input[name='name']").val()+"</a>");
                } else {
                    $("div .gb_header:first").append(" "+$("input[name='name']").val());
                }
                
                $("div .gb_msg:first").append("<div class=\"gb_content\">");
                $("div .gb_content:first").text($("#msg").val());
            
                $("input[name='name']").val("");
                $("input[name='email']").val("@");
                $("input[name='url']").val("http://");
                $("#msg").val("");
                $("input[name='spam']").val("yes");
            }
            else {
                alert("PLease change the answer to the spam bot question.")
            }      
        });
    }
}

// Placing the cursor on the first field of the form (the name field)
function doFocus() {
  document.form.name.focus();
}

function checkFields() {
    uName = $("input[name='name']").val();
    
    if (uName == "") {
        alert('Please enter your name.');
        doFocus();
        return false;
    }

    else {
        uText = $("#msg").val();
        
        if (uText == "") {
            alert('Please enter the message.');
            doFocus();
            return false;
        } else {
            return true;
        }
    }
}

