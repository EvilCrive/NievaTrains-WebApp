function buttonclick() {
  var x = document.getElementById("hrow3");
  var y = document.getElementById("content");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function openMenuUser(){
  if(document.getElementById("menuUser").style.display==="block"){
    document.getElementById("menuUser").style.display="none";
  }else document.getElementById("menuUser").style.display="block";
}
document.addEventListener("DOMContentLoaded", function(){
  
document.getElementById("prova123").addEventListener("onclick",openMenuUser());
})