$(document).ready(function() {
    $("#center").load("./page_files/center.php");
});

function newpage_dialogue(type) {
    if (type == "svg") {
        var pict_url = document.getElementById("img_gate_photo").data;
    } else {
        var pict_url = document.getElementById("img_gate_photo").src;       
    }
    
    var url="http://andromeda/~xplhak/index.php";
    
    url=url+"?src="+pict_url;
      
    window.open(url); 
  }

  function newpage_sonn(type) {
    
    if (type == "svg") {
      var pict_url = document.getElementById("img_gate_photo").data;
    } else {
      var pict_url = document.getElementById("img_gate_photo").src;       
    }
    
    var url="http://www.fi.muni.cz/~xplhak/sonification.php";
    
    url=url+"?src="+pict_url;
    
    window.open(url);
  }

function set_content(field, target) {
    $("#center").load(target);
}