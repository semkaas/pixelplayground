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

function updateLokaleHighscore(eindScore) {
    let huidigeTopScore = localStorage.getItem('lokaleTopscore') || 0;
    if (eindScore > huidigeTopScore) {
        localStorage.setItem('lokaleTopscore', eindScore);
    }
}
let opgeslagenScore = localStorage.getItem('lokaleTopscore') || 0;
document.getElementById("highscore").textContent = "Hoogste score lokaal: " + opgeslagenScore;