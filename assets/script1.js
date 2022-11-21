let signupForm=document.querySelector("#signup_form")
let signupEmail=document.querySelector("#email")
let signupPass=document.querySelector("#password")
let signupUsername=document.querySelector("#username")
let signupSelect=document.querySelector("#signup_select")
let usernameSignupfeld=document.querySelector("#username_signup_feld")
let emailSignupfeld=document.querySelector("#email_signup_feld")
let passwordSignupfeld=document.querySelector("#password_signup_feld")
let usernameMmessageerreur=document.querySelector("#username-message-erreur")
let selectMessageerreur=document.querySelector("#select-message-erreur")
let emailMessageerreur=document.querySelector("#email-message-erreur")
let passwordmessageerreur=document.querySelector("#password-message-erreur")
let mailExist=document.querySelector("#mail-exist");
let emailRegex=/^[^-_.][a-zA-Z0-9-_.]+@[a-z]+.[a-z]{2,3}$/
let usernameRegex=/^[^-_.][a-zA-Z0-9-_.]{2,8}$/
let passwordRegex=/^[^-_.@#][a-zA-Z0-9-_.@#]{8,14}$/


usernameMmessageerreur.style.color="red"
usernameMmessageerreur.style.display="none"
usernameMmessageerreur.style.textAlign="left"


selectMessageerreur.style.color="red"
selectMessageerreur.style.display="none"
selectMessageerreur.style.textAlign="left"


emailMessageerreur.style.color="red"
emailMessageerreur.style.display="none"
emailMessageerreur.style.textAlign="left"


passwordmessageerreur.style.color="red"
passwordmessageerreur.style.display="none"
passwordmessageerreur.style.textAlign="left"

mailExist.style.color="red";
mailExist.style.display="none";





signupForm.addEventListener('submit',(e)=>{
      
      if(!passwordRegex.test(signupForm.pasword.value)){
        passwordSignupfeld.style.border="2px solid red"
        passwordmessageerreur.style.display="block"
        e.preventDefault()
       }
       if(!emailRegex.test(signupForm.email.value)){
        emailSignupfeld.style.border="2px solid red"
        emailMessageerreur.style.display="block"
        e.preventDefault()

       }
       
       if(!usernameRegex.test(signupForm.username.value)){
        usernameSignupfeld.style.border="2px solid red"
        usernameMmessageerreur.style.display="block"
        e.preventDefault()
       }
})
emailSignupfeld.onclick=()=>{
    emailSignupfeld.style.border="none"
    emailMessageerreur.style.display="none"
}
passwordSignupfeld.onclick=()=>{
    passwordSignupfeld.style.border="none"
    passwordmessageerreur.style.display="none"
}
usernameSignupfeld.onclick=()=>{
    usernameSignupfeld.style.border="none"
    usernameMmessageerreur.style.display="none"
}
