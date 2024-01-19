let menubutton=document.querySelector('#menu-btn');
let navbar=document.querySelector('.header .navbar');
let searchForm=document.querySelector('.header .search-form');//select the searchbar
let searchbarclosebutton=document.getElementById('searchbarclosebutton');

let loginForm=document.querySelector('.header .login-form');//select the loginform
let loginformcloseButton=document.querySelector('.header .login-form #close-button');


let SignUpForm=document.querySelector('.header .signUp-form');//select the SignUpform
let SignUpformcloseButton=document.querySelector('.header .signUp-form #close-button');




let productBnnerNextbtn=document.querySelector('.products .navigation .next-btn');
let productBnnerPrevbtn=document.querySelector('.products .navigation .prev-btn');
let productBnnerSlides=document.querySelectorAll('.productslide');
let productBnnerslideIcons=document.querySelectorAll('.slide-icon');
let productBnnernumberslideIcons=productBnnerSlides.length;

let adminloginbutton=document.getElementById('adminloginbutton');

// //admin login function
adminloginbutton.addEventListener('submit',function(){
    console.log('Insert admin login button'); 
   
    alert("Redirect user to main Dashboard"); 
    window.location.href='maindashboard.php';
}
);


//Product Slide show JS Automatic slide show
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("productslide");

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "flex";
    slides[slideIndex - 1].classList.add('active');
}

setInterval(function() {
    plusSlides(1);
}, 5000); // Auto-advance every 2 seconds


//End of the Slide show function

//menu button in navigation bar process
menubutton.onclick=()=>{
    console.log("menu Button onclick");
    menubutton.classList.toggle('fa-times');
    navbar.classList.toggle('active-navbar');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
}

//Search Button in navigation bar process
document.querySelector('#search-btn').onclick=()=>{
    console.log('inside search  button');
    searchForm.classList.toggle('active');
    navbar.classList.remove('active-navbar');
    menubutton.classList.remove('fa-times');
    loginForm.classList.remove('active');
   
};

//Login button in navigation bar process
document.querySelector('#login-btn').onclick=()=>{
    console.log('inside Login  button');
    loginForm.classList.toggle('active');
    navbar.classList.remove('active-navbar');
    menubutton.classList.remove('fa-times');
    searchForm.classList.remove('active');
};

//login form-close button process
loginformcloseButton.onclick=()=>{
    console.log('inside Login form close button');
    loginForm.classList.remove('active');
}


//search form-close button process
searchbarclosebutton.onclick=()=>{
    console.log('inside search bar close button');
    searchForm.classList.remove('active');
}



navbar.onclick=()=>{
    console.log('inside nav bar onlick');
    navbar.classList.remove('active-navbar');
    menubutton.classList.remove('fa-times');
}

menubutton.onscroll=()=>{
    console.log('inside menubutton scroll');
    menubutton.classList.remove('fa-times');
    navbar.classList.remove('active-navbar');
}


//productshome.php js functions
//1.login button click









