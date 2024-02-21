// Initialize the slide index to the first slide
let slideIndex = 1;

// Display the first slide
displaySlide(slideIndex);

// Function to change the slide
function changeSlide(n) {
    displaySlide(slideIndex += n);
}

// Function to set the current slide
function currentSlide(n) {
    // Display the current slide
    displaySlide(slideIndex = n);
}

// Function to display a slide
function displaySlide(n) {
    let i;
    let slides = document.getElementsByClassName("custom-slider");
    let dots = document.getElementsByClassName("dot");
    let titles = ["start-title", "loupe-title", "temps-title", "rotation-title", "quizz-title-1", "quizz-title-2", "quizz-title-3"];

    // If the slide index is greater than the number of slides, reset it to the first slide
    if (n > slides.length) {slideIndex = 1}
    // If the slide index is less than 1, set it to the last slide
    if (n < 1) {slideIndex = slides.length}
    // Hide all slides
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    // Remove the active class from all dots
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    // Display the current slide
    slides[slideIndex-1].style.display = "block";
    // Add the active class to the current dot
    dots[slideIndex-1].className += " active";

    // Hide all titles
    titles.forEach(title => {
        document.getElementById(title).style.display = "none";
    });

    // If the slide index is less than or equal to the number of titles, display the current title
    if (slideIndex <= titles.length) {
        document.getElementById(titles[slideIndex - 1]).style.display = "block";
    }
}

// Add event listener for the previous button
document.querySelector('.prev').addEventListener('click', function() {
    changeSlide(-1);
});

// Add event listener for the next button
document.querySelector('.next').addEventListener('click', function() {
    changeSlide(1);
});

// Add event listener for the arrow keys
window.addEventListener('keydown', function(event) {
    if (event.key === "ArrowLeft") {
        changeSlide(-1);
    }
    else if (event.key === "ArrowRight") {
        changeSlide(1);
    }
});