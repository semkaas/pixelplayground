let lightanddark = document.getElementById("lightdark");
document.documentElement.dataset.mode = localStorage.getItem("theme");

function switchMode(){
    if(document.documentElement.dataset.mode != "dark"){
       document.documentElement.dataset.mode = 'dark';
       localStorage.setItem("theme", "dark");
}
else{
    document.documentElement.dataset.mode = "light";
    localStorage.setItem("theme", "light");
}
}
lightanddark.addEventListener('click', switchMode);