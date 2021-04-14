var checkPassword = function() {
    $message = '<i class="far fa-times-circle"></i> Les deux mots de passe ne correspondent pas.'
    $isDisaled = true;

    if (document.getElementById('password').value == document.getElementById('password_confirm').value){
       $message = '';
       $isDisaled = false;
    }

    document.getElementById('message_password').innerHTML = $message;
    document.getElementById('submit').disabled = $isDisaled;
   
}

function LogoutMessage(text){
   var x=document.getElementById("toast");
   x.classList.add("show");
   x.innerHTML=text;

   setTimeout(function(){
     x.classList.remove("show");
     window.location.href = '../';
   },2000);
 }