// Sign-in form validation
let signinForm=document.querySelector("#signin_form");
let inputFeldemail=document.querySelector("#input-feld-email");
let inputFeldpassword=document.querySelector("#input-feld-password");
let signinEmailerreur=document.querySelector("#signin-email-erreur");
let signinPassworderreur=document.querySelector("#signin-password-erreur")
signinEmailerreur.style.display="none";
signinEmailerreur.style.color="red";
signinEmailerreur.style.textAlign="left";
signinPassworderreur.style.display="none";
signinPassworderreur.style.color="red";
signinPassworderreur.style.textAlign="left";


let emailRegex=/^[^-_.][a-zA-Z0-9-_.]+@[a-z]+.[a-z]{2,3}$/
let passwordRegex=/^[a-zA-Z0-9-_.@#]{8,14}$/


signinForm.addEventListener('submit',(e)=>{
   if(!emailRegex.test(signinForm.email.value)){
    inputFeldemail.style.border="2px solid red";
    signinEmailerreur.style.display="block";
    e.preventDefault();
   }
   if(!passwordRegex.test(signinForm.pasword.value)){
    inputFeldpassword.style.border="2px solid red";
    signinPassworderreur.style.display="block";
    e.preventDefault();
   }
})
inputFeldemail.onclick=()=>{
    inputFeldemail.style.border="none";
    signinEmailerreur.style.display="none";
}
inputFeldpassword.onclick=()=>{
    inputFeldpassword.style.border="none"
    signinPassworderreur.style.display="none";

}
