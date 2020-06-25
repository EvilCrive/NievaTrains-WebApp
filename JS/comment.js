function ValidateComment(){
  var alfa=document.forms['commentform']['comment'].value;
  if(alfa===""){
    document.getElementById('commentRequired').textContent="Scrivi il commento";
    return false;
  }
    if(document.forms['commentform']['controlLogged'].textContent==="1"){
    return true;
  }else{
    alert("Non sei loggato");
    return false;
  }
}

function Alertunlogged(){
  if(document.forms['commentform']['controlLogged'].textContent==="1"){
    return true;
  }else{
    alert("Non sei loggato");
    return false;
  }
}
