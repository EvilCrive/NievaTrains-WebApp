document.addEventListener("DOMContentLoaded", function(){
let boolean=0;
modifytext(boolean);
document.getElementById("imga").addEventListener("click",
function(){
    switch(boolean){
        case 0:
           document.getElementById("imga").classList.add("selected");
            boolean=1;
            break;
        case 1:
            document.getElementById("imga").classList.remove("selected");
            boolean=0;
            break; 
        case 2:
            document.getElementById("imgb").classList.remove("selected");
            document.getElementById("imga").classList.add("selected");
            boolean=1;
            break; 
        case 3:  
            document.getElementById("imgc").classList.remove("selected");
            document.getElementById("imga").classList.add("selected");
            boolean=1;
            break;             
    }
    modifytext(boolean);
})
document.getElementById("imgb").addEventListener("click",
function(){
    switch(boolean){
        case 0:
            document.getElementById("imgb").classList.add("selected");
            boolean=2;
            break;
        case 1:
            document.getElementById("imga").classList.remove("selected");
            document.getElementById("imgb").classList.add("selected");
            boolean=2;
            break; 
        case 2:
            document.getElementById("imgb").classList.remove("selected");
            boolean=0;
            break; 
        case 3:  
            document.getElementById("imgc").classList.remove("selected");
            document.getElementById("imgb").classList.add("selected");
            boolean=2;
            break;             
    }
    modifytext(boolean);
})
document.getElementById("imgc").addEventListener("click",
function(){

    switch(boolean){
        case 0:
            document.getElementById("imgc").classList.add("selected");
            boolean=3;
            break;
        case 1:
            document.getElementById("imga").classList.remove("selected");
            document.getElementById("imgc").classList.add("selected");
            boolean=3;
            break; 
        case 2:
            document.getElementById("imgb").classList.remove("selected");
            document.getElementById("imgc").classList.add("selected");
            boolean=3;
            break; 
        case 3:  
            document.getElementById("imgc").classList.remove("selected");
            boolean=0;
            break;             
    }
    modifytext(boolean);
})

});


function modifytext(variable){

    switch(variable){
        case 0:
            document.getElementById("imgscelta").textContent="Hai scelto l'immagine:";
            break;
        case 1:
            document.getElementById("imgscelta").textContent="Hai scelto l'immagine: A";
            break;
        case 2:
            document.getElementById("imgscelta").textContent="Hai scelto l'immagine: B";
            break;
        case 3:
            document.getElementById("imgscelta").textContent="Hai scelto l'immagine: C";
            break;
    }
    document.forms['signupform']['selectimg'].textContent= document.getElementById("imgscelta").textContent;
    
}