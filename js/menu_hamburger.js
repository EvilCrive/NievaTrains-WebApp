function buttonclick() {
  var x = document.getElementById("myLinks");
  var y = document.getElementById("myLinks2");
  if (x.style.display === "none" && y.style.display === "none") {
    x.style.display = "block";
    y.style.display = "block";
  } else {
    x.style.display = "none";
    y.style.display = "none";
  }

}
