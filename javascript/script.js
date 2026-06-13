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


// Functie om te controleren en op te slaan
function updateLokaleHighscore(eindScore) {
    // Haal de huidige opgeslagen topscore op, of start op 0
    let huidigeTopScore = localStorage.getItem('lokaleTopscore') || 0;

    // Als de nieuwe score hoger is, overschrijf dan de oude
    if (eindScore > huidigeTopScore) {
        localStorage.setItem('lokaleTopscore', eindScore);
    }
}

// Hoe je het weergeeft bij het inladen van de pagina:
let opgeslagenScore = localStorage.getItem('lokaleTopscore') || 0;
// Zet dit in een bestaand HTML element, bijvoorbeeld:
document.getElementById("highscore").textContent = "Hoogste score lokaal: " + opgeslagenScore;