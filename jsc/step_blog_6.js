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
        $("ul.ul_articles li:eq(0) input").val(session['step_blog_6']['article_author_data'][0]);
        $("ul.ul_articles li:eq(1) input").val(session['step_blog_6']['article_name_data'][0]);
        $("ul.ul_articles li:eq(2) textarea").text(session['step_blog_6']['article_text_data'][0].replace(/<br \/>/g, "\n"));
        
        while (session['step_blog_6']['article_author_data'][pom] || session['step_blog_6']['article_name_data'][pom] || session['step_blog_6']['article_text_data'][pom]) {
            
            $("ul.ul_articles:first").clone().appendTo("#div_articles");
            
            $("ul.ul_articles:last li:eq(0) input").val(session['step_blog_6']['article_author_data'][pom]);
            $("ul.ul_articles:last li:eq(1) input").val(session['step_blog_6']['article_name_data'][pom]);
            $("ul.ul_articles:last li:eq(2) textarea").text(session['step_blog_6']['article_text_data'][pom].replace(/<br \/>/g, "\n"));
            
            pom++;
        }

        
    } catch (err) {}
});

function clone_articles(field) {
    if ($("li", $(field).parents().next("ul.ul_articles")).size() == 0 && $("input[name='article_name_data[]']", $(field).parents("ul.ul_articles")).val() != '' && $("input[name='article_author_data[]']", $(field).parents("ul.ul_articles")).val() != '' && $("textarea[name='article_text_data[]']", $(field).parents("ul.ul_articles")).size() > 0) {
        
        $("ul.ul_articles:first").clone().appendTo("#div_articles");
        $("ul.ul_articles:last input:not(:last)").val("");
        $("ul.ul_articles:last span").text("");
        $("ul.ul_articles:last textarea").text("");
    }
}







