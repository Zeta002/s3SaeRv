
let slideIndex = 1;


displaySlide(slideIndex);


function changeSlide(n) {
    displaySlide(slideIndex += n);
}


function currentSlide(n) {
    displaySlide(slideIndex = n);
}


function displaySlide(n) {
    let i;
    let slides = document.getElementsByClassName("custom-slider");
    let dots = document.getElementsByClassName("dot");
    let titles = ["start-title", "loupe-title", "temps-title", "rotation-title", "quizz-title-1", "quizz-title-2", "quizz-title-3"];

    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";

    // Hide all titles
    titles.forEach(title => {
        document.getElementById(title).style.display = "none";
    });

    // Display the appropriate title based on the currently displayed slide
    if (slideIndex <= titles.length) {
        document.getElementById(titles[slideIndex - 1]).style.display = "block";
    }
}


window.addEventListener('keydown', function(event) {
    switch (event.key) {
        case "ArrowLeft":
            // Left arrow key pressed
            changeSlide(-1);
            break;
        case "ArrowRight":
            // Right arrow key pressed
            changeSlide(1);
            break;
    }
});