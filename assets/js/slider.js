var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("custom-slider");
    var dots = document.getElementsByClassName("dot");
    var startTitle = document.getElementById("start-title");
    var loupeTitle = document.getElementById("loupe-title");
    var tempsTitle = document.getElementById("temps-title");
    var rotationTitle = document.getElementById("rotation-title");
    var quizzTitle1 = document.getElementById("quizz-title-1");
    var quizzTitle2 = document.getElementById("quizz-title-2");
    var quizzTitle3 = document.getElementById("quizz-title-3");

    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";

    // Cachez tous les titres
    startTitle.style.display = "none";
    loupeTitle.style.display = "none";
    tempsTitle.style.display = "none";
    quizzTitle1.style.display = "none";
    quizzTitle2.style.display = "none";
    quizzTitle3.style.display = "none";

    // Affichez le titre approprié en fonction de la diapositive actuellement affichée
    if (slideIndex === 1) {
        startTitle.style.display = "block";
    } else if (slideIndex === 2) {
        loupeTitle.style.display = "block";
    } else if (slideIndex === 3) {
        tempsTitle.style.display = "block";
    } else if (slideIndex === 4) {
        tempsTitle.style.display = "block";
    } else if (slideIndex === 5) {
        rotationTitle.style.display = "block";
    } else if (slideIndex === 6) {
        quizzTitle1.style.display = "block";
    } else if (slideIndex === 7) {
        quizzTitle2.style.display = "block";
    } else if (slideIndex === 8) {
        quizzTitle3.style.display = "block";
    }
}