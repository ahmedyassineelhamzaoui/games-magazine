let formProfil=document.querySelector("#form-profil");
let profileUsername=document.querySelector("#profile-username");
let profileEmail=document.querySelector('#profile-email');
let erreurUsername=document.querySelector("#erreur-username");
let erreurEmail=document.querySelector("#erreur-email");
let profilePassword=document.querySelector("#profile-password");

let emailRegex=/^[^-_.][a-zA-Z0-9-_.]+@[a-z]+.[a-z]{2,3}$/
let  userRegex=/^[^-_.][a-zA-Z0-9-_.]{2,10}$/
profilePassword.disabled = true;


formProfil.addEventListener('submit',(e)=>{
   
    if(!emailRegex.test(formProfil.emailprofile.value)){
        profileEmail.style.border="2px solid red";
        erreurEmail.classList.remove("d-none");
        e.preventDefault();
    }
     if(!userRegex.test(formProfil.username.value)){
        profileUsername.style.border="2px solid red";
        erreurUsername.classList.remove("d-none");
        e.preventDefault();
    }
    profileUsername.onclick=()=>{
        profileUsername.style.border="";
        erreurUsername.classList.add("d-none");
    }
    profileEmail.onclick=()=>{
        profileEmail.style.border="";
        erreurEmail.classList.add("d-none");

    }
  
})