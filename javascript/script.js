cookie = document.querySelector("#cookie");
counter = document.querySelector("#cookie-counter");
count = 0;
cookie.addEventListener("click", kaas);
function kaas(){
counter.innerHTML = count++;
}
