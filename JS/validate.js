
function ValidateLogIn(){
  var login_error=document.getElementById('errors_login');
  var mail=document.forms["loginform"]["email"];
  var password=document.forms["loginform"]["password"];
  var errore_mail="";
  var errore_password="";
  //controllo mail
  if(!validateEmail(mail.value)){
    errore_mail="L'e-mail non e' valida.";
  }
  else{
    errore_mail="";
  }
  document.getElementById("error_mail").textContent=errore_mail;
  document.getElementById("error_mail").style.color="red";
  document.getElementById("error_mail").hidden=false;
  //controllo password
  if(!validatePassword(password.value)){
    errore_password="La password non e' valida";
  }
  else{
    if(shortPassword(password.value)){
      errore_password="La password e' troppo corta";
    }
  }
  document.getElementById("error_password").textContent=errore_password;
  document.getElementById("error_password").style.color="red";
  document.getElementById("error_password").hidden=false;
  if(errore_password=="" && errore_mail==""){
    return true;
  }
  return false;

}
function ValidateSignup(){}



function validateEmail(mail){
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
  return (false)
}
function validatePassword(password){
   if(/^[a-z0-9]{0,12}$/.test(password)){
    return true;
  }
  return false;
}
function shortPassword(password){
  if(/^[a-z0-9]{0,5}$/.test(password)){
    return true;
  }
  return false;
}







