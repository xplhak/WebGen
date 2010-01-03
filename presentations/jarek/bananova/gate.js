// JavaScript Document

      function newpage_dialogue(type) {
        if (type == "svg") {
          var pict_url = document.getElementById("img_gate_photo").data;
        }
        else {
          var pict_url = document.getElementById("img_gate_photo").src;
//        var pict_alt = document.getElementById("img_gate_photo").alt;        
        }
        
//        var url="http://www.fi.muni.cz/~xplhak/dialogue.php";
        var url="http://andromeda/~xplhak/index.php";
        
        url=url+"?src="+pict_url;
//        url=url+"&alt="+pict_alt;
//        url=url+"&sid="+Math.random();  
        window.open(url); 
      }
  
      function newpage_sonn(type) {
        
        if (type == "svg") {
          var pict_url = document.getElementById("img_gate_photo").data;
        }
        else {
          var pict_url = document.getElementById("img_gate_photo").src;
//        var pict_alt = document.getElementById("img_gate_photo").alt;        
        }
        
        var url="http://www.fi.muni.cz/~xplhak/sonification.php";
        
        url=url+"?src="+pict_url;
//        url=url+"&alt="+pict_alt;
//        url=url+"&sid="+Math.random();  
        window.open(url);
      }
