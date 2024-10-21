// Function for change header color when scrolling
($(document).ready(function() {
    changeHeaderColor();
}));

function changeHeaderColor() {
    $(window).bind('scroll', function(){
        var gap = 50;
        if($(window).scrollTop() > gap){
            $('header').addClass('navactive');
        }else{
            $('header').removeClass('navactive');
        }
    })}

// script for review swiper
var swiper = new Swiper(".review-slider", {
        spaceBetween:20,
        slidesPerView: 3,
        autoplay:{
            delay: 2000,
            disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });    


// navigation active link 
const pathName = window.location.pathname;
const pageName = pathName.split('/').pop();
console.log(pageName);

if(pageName == "Home.php"){
    document.getElementById("home").classList.add("activeLink");
}
if(pageName == "Menu.php"){
    document.getElementById("menu").classList.add("activeLink");
}
if(pageName == "Reservation.php"){
    document.getElementById("reservation").classList.add("activeLink");
}
if(pageName == "Pre-Order.php"){
    document.getElementById("preOrder").classList.add("activeLink");
}
if(pageName == "About.php"){
    document.getElementById("about").classList.add("activeLink");
}
if(pageName == "Events.php"){
    document.getElementById("events").classList.add("activeLink");
}
if(pageName == "Gallery.php"){
    document.getElementById("gallery").classList.add("activeLink");
}
if(pageName == "Contact.php"){
    document.getElementById("contact").classList.add("activeLink");
}



// Adding scroll animations    
const bookTable = document.getElementById("animate");
const dow = document.querySelector(".dow");
const preorder = document.querySelector(".pre-order");
const OH = document.querySelector(".OH");
const promotions = document.querySelector(".promotions");
const parking = document.querySelector(".parking");
const dowcontainer = document.querySelector(".dow-container");


const options = {
    threshold: 0.1,
    rootMargin: "0px 0px 50px 0px",
    root: null
};

const observer = new IntersectionObserver(function(entries){
    entries.forEach(entry=>{
        
        const intersecting = entry.isIntersecting;
        if(intersecting){
            entry.target.classList.add("blendIn");
            entry.target.classList.add("opacityon");
            observer.unobserve(entry.target);
        }else{
            entry.target.classList.remove("blendIn");
            entry.target.classList.remove("opacityon");
        }
    });

}, options);

    observer.observe(bookTable);
    observer.observe(dow);
    observer.observe(preorder);
    observer.observe(OH);
    observer.observe(promotions);
    observer.observe(parking);
    observer.observe(dowcontainer);


    







