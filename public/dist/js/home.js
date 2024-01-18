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