document.addEventListener("DOMContentLoaded", function(){
document.getElementById("imga").addEventListener("click",
function(){
    alert("a")
    document.getElementById("imga").classList.add("selected");
})
document.getElementById("imgb").addEventListener("click",
function(){
    alert("b")
})
document.getElementById("imgc").addEventListener("click",
function(){
    alert("c")
})
});