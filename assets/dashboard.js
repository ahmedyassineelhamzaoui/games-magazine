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

let inputSerch=document.querySelector("#input-search");

let submitSearch=document.querySelector("#submit-search");
submitSearch.disabled = true;

inputSerch.addEventListener('keyup', e => {

    if (e.target.value == "") {
        submitSearch.disabled = true;
    }
    else {
        submitSearch.disabled = false;
    }
  });