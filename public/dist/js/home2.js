var search = document.getElementById('search');
var logo = document.getElementById('logo');
var buttton = document.getElementsByClassName(".button");

var yearlist = document.getElementById('yearlist');
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector(".nav-menu");
const table = document.querySelector(".card");
hamburger.addEventListener("click", () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle("active");
    // document.getElementByClassName("card").style.display = "none";

})
document.querySelectorAll('.nav-link').forEach(n => n.addEventListener('click', () => {
    hamburger.classList.remove("active");
    navMenu.classList.remove('active');
}))







function buttonClick2() {
    if (yearlist.style.display == "none") {
        yearlist.style.display = "block";
    } else {
        yearlist.style.display = "none";
    }
}

function myOpacity(i) {
    var overlay = document.querySelector('#overlay' + i);

    overlay.style.opacity = "1";
}

function tvOpacity(i) {
    var overlay = document.querySelector('#tvoverlay' + i);

    overlay.style.opacity = "1";
}

function myNoOpacity(i) {
    var overlay = document.querySelector('#overlay' + i);

    overlay.style.opacity = "0";
}



function tvOpacity1(i) {
    var overlay = document.querySelector('#tvoverlay1' + i);

    overlay.style.opacity = "1";
}

function tvNoOpacity2(i) {
    var overlay = document.querySelector('#tvoverlay1' + i);

    overlay.style.opacity = "0";
}
$('.owl-carousel').owlCarousel({
    items: 2,
    dots: false,
    nav: true,
    navText: navText,
    margin: 15,
    responsive: {
        500: {
            items: 2
        },
        1280: {
            items: 4
        },
        1600: {
            items: 6
        }
    }
})