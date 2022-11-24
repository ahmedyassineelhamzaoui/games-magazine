const formProduct=document.querySelector("#form-product");
let erreurPicture=document.querySelector("#erreur-picture")
let erreurTitle=document.querySelector("#erreur-title")
let erreurPrice=document.querySelector("#erreur-price")
let erreurAmount=document.querySelector("#erreur-amount")

let erreurDescription=document.querySelector("#erreur-description")
erreurPicture.style.display="none"
erreurPicture.style.color="red"

erreurTitle.style.display="none"
erreurTitle.style.color="red"

erreurPrice.style.display="none"
erreurPrice.style.color="red"

erreurAmount.style.display="none"
erreurAmount.style.color="red"

erreurDescription.style.display="none"
erreurDescription.style.color="red"

formProduct.addEventListener('submit',(e)=>{

let productTitle=document.querySelector("#product-title")
let productFile=document.querySelector("#product-file")
let productPrice=document.querySelector("#product-price")
let productAmount=document.querySelector("#product-amount")
let productDescription=document.querySelector("#product-description")


    if(formProduct.title.value==""){
        productTitle.style.border="2px solid red"
        erreurPicture.style.display="block"
        e.preventDefault();
    }
    if(formProduct.image.value==""){
        productFile.style.border="2px solid red"
        erreurTitle.style.display="block"
        e.preventDefault();
    }
    if(formProduct.price.value==""){
        productPrice.style.border="2px solid red"
        erreurPrice.style.display="block"
        e.preventDefault();
    }
    if(formProduct.amount.value==""){
        productAmount.style.border="2px solid red"
        erreurAmount.style.display="block"
        e.preventDefault();
    }
    if(formProduct.description.value==""){
        productDescription.style.border="2px solid red"
        erreurDescription.style.display="block"
        e.preventDefault();
    }

    productTitle.onclick=()=>{
        productTitle.style.border=""
        erreurPicture.style.display="none"

    }
    productFile.onclick=()=>{
        productFile.style.border=""
        erreurTitle.style.display="none"

    }
    productPrice.onclick=()=>{
        productPrice.style.border=""
        erreurPrice.style.display="none"

    }
    productAmount.onclick=()=>{
        productAmount.style.border=""
        erreurAmount.style.display="none"

    }
    productDescription.onclick=()=>{
        productDescription.style.border=""
        erreurDescription.style.display="none"
    }
    
})