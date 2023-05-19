const burger = document.querySelector('.fa-bars');
const nav = document.querySelector('.header-nav');

function toggleNav(){
    nav.classList.toggle('nav-active');
    burger.classList.toggle('fa-times');
}

burger.addEventListener('click', function(){
    toggleNav();
});