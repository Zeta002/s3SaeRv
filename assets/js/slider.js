
//----------------------------------------------------------//
//                          Class                           //
//----------------------------------------------------------//

class Carrousel {
    constructor(title, slidesData) {
        this.title = title;
        this.slidesData = slidesData;
        this.indexCurrentSlide = 1;

        // init slide[] and all html element slide
        this.initSlides();

        // init slide container and add element of this.slidesData
        this.initSlideContainer();

        this.initCaroussel();

        // update display
        this.showSlides()
    }


    initDot(){
        this.dots = [];
        for(let i = 0; i < this.slides.length; ++i) {
            let span = document.createElement("span");
            span.classList.add("dot");
            span.onclick = () => this.changeSlide(i+1);
            this.dots.push(span);
            this.dotContainer.appendChild(span);
        }
    }

    initDotContainer(){
        this.dotContainer = document.createElement("div");
        this.dotContainer.classList.add("slide-dot");
        this.initDot();

        this.carrousselContainer.appendChild(this.dotContainer);
    }


    initSlides() {
        this.slides = [];
        for (let i = 0; i < this.slidesData.length; ++i) {
            let slide = new Slide(this.slidesData[i].text, this.slidesData[i].imageSrc);
            this.slides.push(slide);
        }
    }

    initSlideContainer() {
        this.slideContainer = document.createElement("div");

        this.slideContainer.innerText = "";
        this.slideContainer.classList.add("slider-container");

        let title = document.createElement("h1");
        title.innerText = this.title;
        this.slideContainer.appendChild(title);

        for (let i = 0; i < this.slides.length; ++i) {
            this.slideContainer.appendChild(this.slides[i].slider);
        }

        let prev = document.createElement("a");
        prev.innerText = "❮";
        prev.classList.add("prev");
        prev.onclick = () => this.previousSlide();
        this.slideContainer.appendChild(prev);

        let next = document.createElement("a");
        next.innerText = "❯";
        next.classList.add("next");
        next.onclick = () => this.nextSlide();
        this.slideContainer.appendChild(next);
    }

    initCaroussel() {
        this.carrousselContainer = document.createElement("div");
        this.carrousselContainer.classList.add("carroussel-container");
        this.carrousselContainer.appendChild(this.slideContainer);

        let br = document.createElement("br");
        this.carrousselContainer.appendChild(br);

        this.initDotContainer();
    }

    nextSlide() {
        this.changeSlide(this.indexCurrentSlide += 1);
    }

    previousSlide() {
        this.changeSlide(this.indexCurrentSlide -= 1);
    }

    changeSlide(newCurrentSlide) {
        this.indexCurrentSlide = newCurrentSlide;
        this.showSlides(this.indexCurrentSlide);
    }


    showSlides() {

        if (this.indexCurrentSlide > this.slides.length) {
            this.indexCurrentSlide = 1;
        }
        if (this.indexCurrentSlide < 1) {
            this.indexCurrentSlide = this.slides.length;
        }
        for (let i = 0; i < this.slides.length; i++) {
            this.slides[i].slider.style.display = "none";
        }
        for (let i = 0; i < this.dots.length; i++) {
            this.dots[i].className = this.dots[i].className.replace(" active", "");
        }
        this.slides[this.indexCurrentSlide - 1].slider.style.display = "block";
        this.dots[this.indexCurrentSlide - 1].className += " active";
    }
}

class Slide {
    constructor(text, image) {
        this.text = text;
        // lien de l'image
        this.image = image;
        // init this.slider
        this.init();
    }

    init() {
        this.slider = document.createElement("div");
        let text = document.createElement("p");
        let img = document.createElement("img");

        text.innerText = this.text;
        img.src = this.image;

        this.slider.classList.add("custom-slider", "fade");
        img.classList.add("slide-img");

        this.slider.appendChild(text);
        this.slider.appendChild(img);

    }
}




//----------------------------------------------------------//
//                      Slide Data                          //
//----------------------------------------------------------//


// Données pour les slides

const screenData = [
    {
        text: 'Quand vous arrivez sur la page \"jouer\", vous pouvez remarquer la présence d\'un bouton situé en haut a gauche de l\'écran',
        imageSrc: '/assets/images/screen/img_1.png'
    },
    {
        text: 'Cliqué dessus et vous pourrez profiter du jeu en plein écran',
        imageSrc: '/assets/images/screen/img_2.png'
    },
];

const hoursData = [
    {
        text: 'Vous trouverez ici les boutons vous permettant de changer l\'heure de la simulation',
        imageSrc: '/assets/images/hour/img_1.png'
    },
    {
        text: 'Vous pouvez entrer dirrectement une heure précise grace au dropdown de l\'heure',
        imageSrc: '/assets/images/hour/img_2.png'
    },
    {
        text: 'Ou encore faire défiler la journée avec le slider situé juste en dessous',
        imageSrc: '/assets/images/hour/img_3.png'
    },
    {
        text: 'Ou encore faire défiler la journée avec le slider situé juste en dessous',
        imageSrc: '/assets/images/hour/img_4.png'
    },
    {
        text: 'Ou encore faire défiler la journée avec le slider situé juste en dessous',
        imageSrc: '/assets/images/hour/img_5.png'
    },
    {
        text: 'Ou encore faire défiler la journée avec le slider situé juste en dessous',
        imageSrc: '/assets/images/hour/img_6.png'
    },
    {
        text: 'Ou encore faire défiler la journée avec le slider situé juste en dessous',
        imageSrc: '/assets/images/hour/img_7.png'
    }
];



const dateData = [
    {
        text: 'Vous trouverez ici les boutons vous permettant de changer la date de la simulation',
        imageSrc: '/assets/images/date/img_1.png'
    },
    {
        text: 'Vous pouvez entrer dirrectement un jour et un mois précis grace au deux dropdowns de la date',
        imageSrc: '/assets/images/date/img_2.png'
    },
    {
        text: 'Ou encore faire défiler les jours avec le slider situé juste en dessous',
        imageSrc: '/assets/images/date/img_3.png'
    },
    {
        text: 'Ou encore faire défiler les jours avec le slider situé juste en dessous',
        imageSrc: '/assets/images/date/img_4.png'
    },
    {
        text: 'Ou encore faire défiler les jours avec le slider situé juste en dessous',
        imageSrc: '/assets/images/date/img_5.png'
    }
];

const cameraData = [
    {
        text: 'Vous trouverez ici les boutons vous permettant de bouger l\'apperçut de la caméra',
        imageSrc: '/assets/images/camera/img_1.png'
    },
    {
        text: 'Le quizz est apparue. Maintenant sert toi de tes connaissances et des sliders pour répondre aux questions',
        imageSrc: '/assets/images/camera/img_2.png'
    },
    {
        text: 'Ensuite pour finir valide ta réponse',
        imageSrc: '/assets/images/camera/img_3.png'
    },
    {
        text: 'Ou encore faire défiler les jours avec le slider situé juste en dessous',
        imageSrc: '/assets/images/camera/img_4.png'
    },
    {
        text: 'Ou encore faire défiler les jours avec le slider situé juste en dessous',
        imageSrc: '/assets/images/camera/img_5.png'
    }
];

const playData = [
    {
        text: 'Vous trouverez ici les boutons vous permettant de gérer le lancement de la simulation. Celle ci sera automatiquement en mode play au lancement de l\'application',
        imageSrc: '/assets/images/play/img_1.png'
    },
    {
        text: 'Clicker sur pause pour arreter la simulation',
        imageSrc: '/assets/images/play/img_2.png'
    },
    {
        text: 'Clicker sur play pour lancer la simulation',
        imageSrc: '/assets/images/play/img_3.png'
    },
    {
        text: 'Clicker sur accelerate pour accélérer le déroulement de la simulation',
        imageSrc: '/assets/images/play/img_4.png'
    },
    {
        text: 'Pour vous aider à vous repérer vous pouvez regarder en bas à droite de la fenêtre, cela vous indiquera l\'heure le la simulation.',
        imageSrc: '/assets/images/play/img_5.png'
    }
];

const quizzData = [
    {
        text: 'pour accéder au quizz il suffit de clické sur le bouton start',
        imageSrc: '/assets/images/quizz/img_1.png'
    },
    {
        text: 'Le quizz est apparue. Maintenant sert toi de tes connaissances et des sliders pour répondre aux questions',
        imageSrc: '/assets/images/quizz/img_3.png'
    },
    {
        text: 'Ensuite pour finir valide ta réponse',
        imageSrc: '/assets/images/quizz/img_4.png'
    }
];




//----------------------------------------------------------//
//                          Sript                           //
//----------------------------------------------------------//

let c1 = new Carrousel("Mode Plein Ecran", screenData);
let c2 = new Carrousel("Le Cycle jour / nuit", hoursData);
let c3 = new Carrousel("Le Cycle Des Saisons", dateData);
let c4 = new Carrousel("Mouvement Caméra", cameraData);
let c5 = new Carrousel("Gérer La Simulation", playData);
let c6 = new Carrousel("Quizz", quizzData);

document.body.appendChild(c1.carrousselContainer);
document.body.appendChild(c2.carrousselContainer);
document.body.appendChild(c3.carrousselContainer);
document.body.appendChild(c4.carrousselContainer);
document.body.appendChild(c5.carrousselContainer);
document.body.appendChild(c6.carrousselContainer);




