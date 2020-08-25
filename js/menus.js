function buttonclick() {
  var x = document.getElementById("hrow3");
  if (x.classList.contains("hidden")) {
    x.classList.remove("hidden");
  } else {
    x.classList.add("hidden");
  }
}

function openMenuUser(){
  if(document.getElementById("menuUser").classList.contains("hidden")){
    document.getElementById("menuUser").classList.remove("hidden");
  }else{
    document.getElementById("menuUser").classList.add("hidden");
  }
}
