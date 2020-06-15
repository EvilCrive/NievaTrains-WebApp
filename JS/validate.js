function ValidateComment(){
  var t=document.getElementById('controlLogged');
  if(t.textContent==="1"){
    return true;
  }else{
    alert("Non sei loggato");
    return false;
  }
}


function ValidateLogIn(){
  var login_error=document.getElementById('errors_login');
  var mail=document.forms["loginform"]["email"];
  var password=document.forms["loginform"]["password"];
  var errore_mail="";
  var errore_password="";

  //controllo password
  if(!validatePassword(password.value)){
    errore_password="La password non e' valida";
  }
  if(password.value.length<6){
    errore_password="La password e' troppo corta.";
  }
  if(password.value.length>12){
    errore_password="La password e' troppo lunga.";
  }
  document.getElementById("error_password_login").textContent=errore_password;
  document.getElementById("error_password_login").style.color="red";
  document.getElementById("error_password_login").hidden=false;
  if(errore_password=="" && errore_mail==""){
    return true;
  }
  return false;

}


function ValidateSignUp(){

  //controllo mail
  var mail=document.forms["signupform"]["email"];
  var errore_mail="";
  if(!validateEmail(mail.value)){
    errore_mail="L'e-mail non e' valida."
  }else{
    errore_mail="";
  }
  document.getElementById("error_mail_signup").textContent=errore_mail;
  document.getElementById("error_mail_signup").style.color="red";
  document.getElementById("error_mail_signup").hidden=false;

  //controllo nome
  var name=document.forms["signupform"]["Nome"];
  var error_name="";
  if(!validateName(name.value)){
    error_name="Il nome non e' valido."
  }
  if(name.value.length<3){
    error_name="Il nome e' troppo corto";
  }
  if(name.value.length>12){
    error_name="Il nome e' troppo lungo.";
  }
  document.getElementById("error_name").textContent=error_name;
  document.getElementById("error_name").style.color="red";
  document.getElementById("error_name").hidden=false;

  //controllo cognome
  var surname=document.forms["signupform"]["Cognome"];
  var error_surname="";
  if(!validateName(surname.value)){
    error_surname="Il cognome non e' valido."
  }
  if(name.value.length<3){
    error_surname="Il cognome e' troppo corto";
  }
  if(name.value.length>12){
    error_surname="Il cognome e' troppo lungo.";
  }
  document.getElementById("error_surname").textContent=error_surname;
  document.getElementById("error_surname").style.color="red";
  document.getElementById("error_surname").hidden=false;

  //controllo username
  var username=document.forms["signupform"]["Username"];
  var error_username="";
  if(!validatePassword(username.value)){
    error_username="L'username non e' valido."
  }
  if(username.value.length<6){
    error_username="L'username e' troppo corto";
  }
  if(username.value.length>12){
    error_username="Il nome e' troppo lungo.";
  }
  document.getElementById("error_username").textContent=error_username;
  document.getElementById("error_username").style.color="red";
  document.getElementById("error_username").hidden=false;

  //controllo password
  var password=document.forms["signupform"]["password"];
  var errore_password="";
  if(!validatePassword(password.value)){
    errore_password="La password non e' valida";
  }
  if(password.value.length<6){
    errore_password="La password e' troppo corta.";
  }
  if(password.value.length>12){
    errore_password="La password e' troppo lunga.";
  }
  document.getElementById("error_password_signup").textContent=errore_password;
  document.getElementById("error_password_signup").style.color="red";
  document.getElementById("error_password_signup").hidden=false;
  
  //controllo conferma password
  var errore_confirmpassword="";
  if(password.value!==document.forms["signupform"]["confirmpassword"].value){
    errore_confirmpassword="Le password sono diverse!";
  }
  document.getElementById("error_confirmpassword").textContent=errore_confirmpassword;
  document.getElementById("error_confirmpassword").style.color="red";
  document.getElementById("error_confirmpassword").hidden=false;
  
  //controllo finale
  if(errore_mail==="" && error_name==="" && error_surname==="" && error_username==="" && errore_password==="" && errore_confirmpassword===""){
    return true;
  }
  return false;
}


function validateEmail(mail){
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
  return (false)
}


function validatePassword(password){
   if(/^[A-Za-z0-9]{3,12}$/.test(password)){
    return true;
  }
  return false;
}


function validateName(name){
  if(/^[A-Za-z]{3,12}$/.test(name)){
    return true;
  }
  return false;
}






