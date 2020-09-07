function ValidateLogin(){
    //prendo input dall'html
    var email=document.forms["loginform"]["email"];
    var password=document.forms["loginform"]["password"];
    var errors="";
    var bool=1;
    //controllo email
    if(!validateEmail(email.value)){
        errors=errors.concat("<li>Email non valida</li>");
        bool=0;
    }
    //controllo password
    if(!validatePassword(password.value)){
        errors=errors.concat("<li>Password non valida:");
        errors=errors.concat("<ol><li>(lunghezza da 6 a 12 caratteri)</li><li>(caratteri solo alfanumerici)</li></ol>");
        errors=errors.concat("</li>");
        bool=0;
    }
    //check finale
    if(bool==0){
        document.getElementById("errori_login").innerHTML='<ul>'+errors+'</ul>';
        return false;
    }
    else    return true;
}
function ValidateSignup(){
    //prendo input dall'html
    var nome=document.forms["signupform"]["nome"];
    var cognome=document.forms["signupform"]["cognome"]; 
    var email=document.forms["signupform"]["email"]; 
    var username=document.forms["signupform"]["username"]; 
    var password=document.forms["signupform"]["password"]; 
    var conferma=document.forms["signupform"]["conferma_password"];
    var bool=1;
    var errors="";
    //controllo nome
    if(!validateName(nome.value)){
        errors=errors.concat("<li>Nome non valido:");
        errors=errors.concat("<ol><li>(lunghezza da 3 a 12 caratteri)</li><li>(caratteri solo alfanumerici)</li></ol>");
        errors=errors.concat("</li>");
        bool=0;
    }
    //controllo cognome
    if(!validateName(cognome.value)){
        errors=errors.concat("<li>Cognome non valido:");
        errors=errors.concat("<ol><li>(lunghezza da 3 a 12 caratteri)</li><li>(caratteri solo alfanumerici)</li></ol>");
        errors=errors.concat("</li>");
        bool=0;
    }
    //controllo email
    if(!validateEmail(email.value)){
        errors=errors.concat("<li>Email non valida</li>");
        bool=0;
    }
    //controllo username
    if(!validatePassword(password.value)){
        errors=errors.concat("<li>Username non valido:");
        errors=errors.concat("<ol><li>(lunghezza da 6 a 12 caratteri)</li><li>(caratteri solo alfanumerici)</li></ol>");
        errors=errors.concat("</li>");
        bool=0;
    }
    //controllo password
    if(!validatePassword(password.value)){
        errors=errors.concat("<li>Password non valida:");
        errors=errors.concat("<ol><li>(lunghezza da 6 a 12 caratteri)</li><li>(caratteri solo alfanumerici)</li></ol>");
        errors=errors.concat("</li>");
        bool=0;
    }
    //controllo confermapassword
    if(!validatePassword(conferma.value)){
        errors=errors.concat("<li>Conferma Password non valida:");
        errors=errors.concat("<ol><li>(lunghezza da 6 a 12 caratteri)</li><li>(caratteri solo alfanumerici)</li></ol>");
        errors=errors.concat("</li>");
        bool=0;
    }
    //controllo se password = conferma password
    if(password.value!==conferma.value){
        errors=errors.concat("<li>Password e Conferma Password non sono uguali</li>");
        bool=0;
    }
    //check finale
    if(bool==0){
        document.getElementById("errori_registrazione").innerHTML='<ul>'+errors+'</ul>';
        return false;
    }
    else    return true;
    
}
function ValidateComment(){
    var testo=document.forms["commentform"]["testoCommento"];
    if (/^[a-zA-z0-9 ]{3,500}$/.test(testo.value)) return true;
    else{
        document.getElementById("commentRequired").textContent="Commento non valido!(min 3 caratteri, max 500)";
        return false;
    }
}
function ValidateCreazioneTreno(){
    var array=document.forms["addTrenoform"];
    var errors="";
    //controllo nome
    if(!(/^[a-zA-z0-9 ]{4,50}$/.test(array["nome"].value))){
        errors=errors.concat("<li>Nome non valido<ol><li>4-50 caratteri, alfanumerici</li></ol></li>");
    }
    //controllo costruttore
    if(!(/^[a-zA-z0-9 ()&]{4,50}$/.test(array["costruttore"].value))){
        errors=errors.concat("<li>Costruttore non valido<ol><li>4-50 caratteri, alfanumerici</li></ol></li>");
    }
    //controllo velocita
    if(!(/^[0-9]{1,3}$/.test(array["velocita"].value))){
        errors=errors.concat("<li>Velocita' non valida<ol><li>numero da 1 a 3 cifre</li></ol></li>");
    }
    //controllo anno 
    
    if(!(/^[0-9]{4}$/.test(array["anni"].value))){
        errors=errors.concat("<li>Anno non valido<ol><li>Numero da 4 cifre</li></ol></li>");
    }
    //controllo descrizione
    if(!(/^.{10,}$/.test(array["descrizione"].value))){
        errors=errors.concat("<li>Descrizione non valida<ol><li>Descrizione troppo corta, almeno 10 caratteri</li></ol></li>");
    }
    if(errors!==""){
        document.getElementById("errori_newtreno").innerHTML='<ul>'+errors+'</ul>';
        return false;
    }else  return true;
}
function ValidateModificaTreno(){
    var array=document.forms["modifyTrenoform"];
    var errors="";
    //controllo nome
    if(!(/^[a-zA-z0-9 ]{4,50}$/.test(array["nome"].value))){
        errors=errors.concat("<li>Nome non valido<ol><li>4-50 caratteri, alfanumerici</li></ol></li>");
    }
    //controllo costruttore
    if(!(/^[a-zA-z0-9 ()&]{4,50}$/.test(array["costruttore"].value))){
        errors=errors.concat("<li>Costruttore non valido<ol><li>4-50 caratteri, alfanumerici</li></ol></li>");
    }
    //controllo velocita
    if(!(/^[0-9]{1,3}$/.test(array["velocita"].value))){
        errors=errors.concat("<li>Velocita' non valida<ol><li>numero da 1 a 3 cifre</li></ol></li>");
    }
    //controllo anno 
    
    if(!(/^[0-9]{4}$/.test(array["anni"].value))){
        errors=errors.concat("<li>Anno non valido<ol><li>Numero da 4 cifre</li></ol></li>");
    }
    //controllo descrizione
    if(!(/^.{10,}$/.test(array["descrizione"].value))){
        errors=errors.concat("<li>Descrizione non valida<ol><li>Descrizione troppo corta, almeno 10 caratteri</li></ol></li>");
    }
    if(errors!==""){
        document.getElementById("errori_newtreno").innerHTML='<ul>'+errors+'</ul>';
        return false;
    }else  return true;
}
function ValidateAdminForm(){
    var user=document.forms["adminForm"]["user"];
    var pin=document.forms["adminForm"]["pin"];
    var errors="";
    if(!(/^\w{3,}$/.test(user.value)))  errors=errors.concat("<li>Errore USER:<ol><li>Minimo 3 caratteri, alfanumerici</li></ol></li>");
    if(!(/^\w{3,}$/.test(pin.value)))   errors=errors.concat("<li>Errore PIN:<ol><li>Minimo 3 caratteri, alfanumerici</li></ol></li>");
    if(errors!==""){
        document.getElementById("errori_adminlogin").innerHTML='<ul>'+errors+'</ul>';
        return false;
    }else   return true;
}
function validateEmail(mail){
    if (/^(\w)+@(\w{3,10})+.(\w{2,3})$/.test(mail)) return true;
    else    return false;
}
function validatePassword(password){
    if(/^[A-Za-z0-9]{6,12}$/.test(password))    return true;
    else    return false;
}
function validateName(password){
    if(/^[A-Za-z0-9]{3,12}$/.test(password))    return true;
    else    return false;
}