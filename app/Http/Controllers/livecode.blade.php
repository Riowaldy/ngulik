<html style="margin:0px;background-color:white;">
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Cheter | HTML live editor</title>
    <style>
        #blahvlahblah{background-color:#e34141;color:white;position:fixed;right:0px;top:0px;font-family: monospace;padding:10px;margin:10px;border-radius:10px;transition:all 0.5s;opacity:0;}   
    #hovertoshowtheultimateboxblahblahblahblahblahbla:hover #blahvlahblah{
        opacity:1;display:block;
        }
    </style>
</head>
<body onload="Onload()" style="margin:0px;background-color:#111;">
    
    <div id="previewbfhskjbnfuiosbjionlsguilabfnuylwnzbfurafyuidywerhdfijovcuicvnznvrieaolnufbiaoelzyfnufggggggggggggggggggggggggggggggggggggggggggggggggggggggggggbxteaztezhdzklbtreykzbyf" style="height:50%;width:100%;overflow:scroll;background-color:white;">
    
    </div><div style="height:50%;overflow:scroll;background-color:#111;"><table style="height:100%;width:100%;border-width: 0px;margin:0px;border-width:0px;padding:0px;"><tr><td style="background-color:grey;border-width:0px;"> <span style="border-width:0px;width:100%;padding-top:5px;line-height: 40px;display:inline-block;background-color:grey;height:100%;color:white;text-align:center;font-family: monospace;font-size:15px;margin:0px;padding:0px;border-width:0px;border-color:#111;padding-top:5px;" id="no">1
    </span></td><td style="margin:0px;padding:0px;border-width:0px;border-color:#111;border-width:0px;
"><textarea style="border-width:0px;line-height: 40px;font-family:monospace;font-size:15px;
    width:100%;min-height:100%;height:auto;background-color:#111;color:blue;overflow: hidden; outline:none;" wrap="off" id="textfdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjshrnufosgurosnbruosnugromsusgiugsinlginlnflnhdbjhvjbkjfkjfggfhjhffdfdkdkdfhkdskhfkjafdhfkeewietwqiuwtweiugfvbbvyubbvyygsyugrigf" onKeyPress="enterpressalert(event, this)"> </textarea></td></tr></table></div>
   <div style="background-color:#111;padding:10px;padding-bottom:90px;color:white;font-family:monospace;"><h1 style="color:white;font-family:monospace;font-size:20px;padding:30px;">Cheter |Live HTML editor. Preview any HTML live online</h1>
   <center>developed by <a style="text-decoration:none;font-family:monospace;color:white;border-style:solid;border-radius:20px;padding:20px;background-color:#2e2e2e;" href="https://abhay-s.github.io">Abhay Saxena</a></center> <br><br>quickly see the output of you html online only and even save it in browser onliy! this is meant for HTML developers.to view all projects by abhay saxena click the abhay saxena button.This is open source thus you may get get source on <a href="https://github.com/abhay-s/Cheter">github</a> . </div>
    <div style="color:white;padding:15px;position:fixed;bottom:10px;left:10px;max-height:25px;max-width:25px;background-color:#3064d8;border-radius:50%;box-shadow:5px 5px 5px rgba(1,1,1,0.5);" id="hovertoshowtheultimateboxblahblahblahblahblahbla" onclick="saveitonLocal()"><i class="material-icons">&#xE161;</i><div id="blahvlahblah">Click this to save your code. Just visit this page again on same device to view your saved code! Remember , not to clear browser data.</div></div>
   
<div style="position:fixed;top:10px;left:-400px;background-color:#111;padding:10px;color:white;font-family:monospace;transition:all 2s;width:auto;overflow:hidden;" id="sgjiooooobnfdriojehbieohhhhhhhhhhhhhhhhhhj">
    Unsuccessful in saving</div>
   
    <script>
    function Onload(){
       
            document.getElementById("textfdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjshrnufosgurosnbruosnugromsusgiugsinlginlnflnhdbjhvjbkjfkjfggfhjhffdfdkdkdfhkdskhfkjafdhfkeewietwqiuwtweiugfvbbvyubbvyygsyugrigf").value = localStorage.getItem("htmlcode");
        setInterval(function(){
            var text = document.getElementById("textfdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjshrnufosgurosnbruosnugromsusgiugsinlginlnflnhdbjhvjbkjfkjfggfhjhffdfdkdkdfhkdskhfkjafdhfkeewietwqiuwtweiugfvbbvyubbvyygsyugrigf").value;
            
            document.getElementById("previewbfhskjbnfuiosbjionlsguilabfnuylwnzbfurafyuidywerhdfijovcuicvnznvrieaolnufbiaoelzyfnufggggggggggggggggggggggggggggggggggggggggggggggggggggggggggbxteaztezhdzklbtreykzbyf").innerHTML = text;
        
            
        } , 200);
       
    }
        
        
        function enterpressalert(e, textarea){
var code = (e.keyCode ? e.keyCode : e.which);
if(code == 13) { 
    //Enter keycode
var lines=textarea.value.match(/\n/g).length + 1;
    document.getElementById("no").innerHTML= "1";
    var numberoflines = 0;
   for ( numberoflines = 2; numberoflines < lines+1; numberoflines++) { 
      document.getElementById("no").innerHTML= document.getElementById("no").innerHTML +"<br>"+ numberoflines;
}
}
    if(code == 8) { 
    //Enter keycode
var lines=textarea.value.match(/\n/g).length + 1;
    document.getElementById("no").innerHTML= "1";
    var numberoflines = 0;
   for ( numberoflines = 2; numberoflines < lines+1; numberoflines++) { 
      document.getElementById("no").innerHTML= document.getElementById("no").innerHTML +"<br>"+ numberoflines;
}
    }

}
   
        
        
        
        function saveitonLocal(){
             var text = document.getElementById("textfdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjshrnufosgurosnbruosnugromsusgiugsinlginlnflnhdbjhvjbkjfkjfggfhjhffdfdkdkdfhkdskhfkjafdhfkeewietwqiuwtweiugfvbbvyubbvyygsyugrigf").value;
        if (typeof(Storage) !== "undefined") {
    // Store
    localStorage.setItem("htmlcode",text );
    // Retrieve
    document.getElementById("textfdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjshrnufosgurosnbruosnugromsusgiugsinlginlnflnhdbjhvjbkjfkjfggfhjhffdfdkdkdfhkdskhfkjafdhfkeewietwqiuwtweiugfvbbvyubbvyygsyugrigf").value = localStorage.getItem("htmlcode");
             document.getElementById("sgjiooooobnfdriojehbieohhhhhhhhhhhhhhhhhhj").innerHTML = "Successfully saved your file"; document.getElementById("sgjiooooobnfdriojehbieohhhhhhhhhhhhhhhhhhj").style.left = "0px";
            setTimeout(function(){document.getElementById("sgjiooooobnfdriojehbieohhhhhhhhhhhhhhhhhhj").style.left = "-400px";} , 5000);
} else {
  document.getElementById("sgjiooooobnfdriojehbieohhhhhhhhhhhhhhhhhhj").innerHTML = "unsuccessful in saving your file";  document.getElementById("sgjiooooobnfdriojehbieohhhhhhhhhhhhhhhhhhj").style.left = "0px";
}    
            
        }
        
    </script>
    </body>
</html>