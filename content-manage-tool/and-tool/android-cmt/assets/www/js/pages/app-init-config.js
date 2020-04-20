var Android;
var AndroidSession;
function progressLoader(){
 var count=1;
 var progress=false; /* true - 100 to 1 false - 1 to 100 */
 setInterval(function(){ 
  document.getElementById("progressDisplay").innerHTML=htmlCore.progressbar(count,'orange',20,true);
  if(progress==false){ count++; }
  else {  count--; }
  if(count>1 && count>=100){ progress=true; }
  if(count==1) { progress=false; }
 }, 1000);
}

$(document).ready(function(){
 progressLoader();
});