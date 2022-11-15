
// let doubleLeft=document.querySelector("#double-left");
// let asideBar=document.querySelector("#aside-bar");
// let span=document.querySelectorAll(".span");
// let list=document.querySelectorAll(".list");
// let fasolid=document.querySelectorAll(".fa-solid");
// let dashboardlist=document.querySelector(".dashboard-list");
// let listlogout=document.querySelector(".list-logout");
// let spanlogout=document.querySelector(".span-logout");
// let doubleRight=document.querySelector("#double-right");
// let link=document.querySelectorAll(".link");
// doubleLeft.addEventListener('click',(e)=>{
//     asideBar.style.width="80px";
//     console.log(span);
//     span.forEach(span=>{
//         span.style.display="none";
//     })
//     list.forEach(list=>{
//         list.style.paddingTop=".6em";
//         list.style.paddingButtom=".6em";
//         list.style.paddingleft=".6em";
//         list.style.paddingRight="0";
//         list.style.textAlign="center";
//     })
//     fasolid.forEach(fasolid=>{
//         fasolid.style.fontSize="20px";
//     })
//     dashboardlist.style.marginLeft="0";
//     listlogout.style.width="65px";
//     listlogout.style.padding=".6em 0";
//     listlogout.style.marginLeft=".4em";

//     listlogout.style.textAlign="center";
//     spanlogout.style.display="none";
//     doubleRight.style.display="block";
//     doubleLeft.style.display="none";

// });
// doubleRight.addEventListener("click",(i)=>{
//     asideBar.style.width="240px";
//     span.forEach(span=>{
//         span.style.display="block";
//         span.style.marginLeft="1em";
//     })
//     list.forEach(list=>{
//         list.style.padding=".7em .8em";
//         list.style.textAlign="center";
//     })
//     link.forEach(link=>{
//         link.style.display="flex";
//         link.style.alignItems="center";
//     })
   
//     listlogout.style.width="190px";
//     listlogout.style.padding=".7em .8em";
//     listlogout.style.marginLeft="5%";

//     spanlogout.style.display="block";
//     doubleRight.style.display="none";
//     doubleLeft.style.display="block";
// })
let doubleft=document.querySelector("#double-left");
let doublright=document.querySelector("#double-right");

let asidebar=document.querySelector("#aside-bar");
let sectiondashboards=document.querySelector("#section-dashboards");
let dashboardMenu=document.querySelector(".dashboard-menu");
let close=document.querySelector("#close");


doubleft.onclick = function(){
    asidebar.classList.add("active");
    doubleft.style.display="none";
    doublright.style.display="block";
    sectiondashboards.classList.add("active");
}
doublright.onclick = function(){
    asidebar.classList.remove("active");
    doublright.style.display="none";
    doubleft.style.display="block";
    sectiondashboards.classList.remove("active");
}
dashboardMenu.onclick = function(){
    asidebar.classList.toggle("showmenu");
}