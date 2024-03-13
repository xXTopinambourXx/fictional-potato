const carrousel = document.getElementById("carrousel");
console.log("test");

for (const el of carrousel.children) {
    el.classList.add("hidden");
}

carrousel.children[0].classList.remove("hidden");

let indexCarrousel = 1;

function afficherElCarrousel(){
    console.log(indexCarrousel);
    const el = carrousel.children[indexCarrousel];
    carrousel.children[(indexCarrousel == 0 ? carrousel.children.length : indexCarrousel) - 1].classList.add("hidden");
    el.classList.remove("hidden")
    indexCarrousel += 1;
    if(indexCarrousel == carrousel.children.length){
        indexCarrousel = 0;
    }
}


setInterval(afficherElCarrousel, 6500);