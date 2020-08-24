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
  if(document.getElementById("menuUser").classList.contains("hidden")){
    document.getElementById("menuUser").classList.remove("hidden");
  }else document.getElementById("menuUser").classList.add("hidden")
}
