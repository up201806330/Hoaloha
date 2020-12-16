'use strict'
// Floating object buttons' listeners 
let loginButton = document.getElementById('loginButton');
if (loginButton != null) loginButton.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'flex';});

let closeButtonLogin = document.getElementById('closeButtonLogin');
if (closeButtonLogin != null) closeButtonLogin.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'none';});

let searchButton = document.getElementById('searchButton');
if (searchButton != null) searchButton.addEventListener('click', function() {document.querySelector('.search-container').style.display = 'flex';});

let closeButtonSearch = document.getElementById('closeButtonSearch');
if (closeButtonSearch != null) closeButtonSearch.addEventListener('click', function() {document.querySelector('.search-container').style.display = 'none';});

let favouritesButton = document.getElementById('favouritesButton');
if (favouritesButton != null) favouritesButton.addEventListener('click', function() {document.querySelector('.favourites-container').style.display = 'flex';});

let closeButtonFavourites = document.getElementById('closeButtonFavourites');
if (closeButtonFavourites != null) closeButtonFavourites.addEventListener('click', function() {document.querySelector('.favourites-container').style.display = 'none';});

let adoptButton = document.getElementById('adoptButton');
if (adoptButton != null) adoptButton.addEventListener('click', function() {document.querySelector('.adopt-container').style.display = 'flex';});

let closeButtonAdopt = document.getElementById('closeButtonAdopt');
if (closeButtonAdopt != null) closeButtonAdopt.addEventListener('click', function() {document.querySelector('.adopt-container').style.display = 'none';});

// Collapsible section listener
let buttonId = document.getElementById('about-us-button-id');
if (buttonId != null) {
    buttonId.addEventListener("click", function() {
        let namesId = document.getElementById('about-us-names-id');
        namesId.classList.toggle("is-active");
    });
}

// Range sliders (Source: https://codepen.io/joosts/pen/rNLdxvK)
var thumbsize = 14;

function draw(slider,splitvalue) {

    /* set function vars */
    var min = slider.querySelector('.min');
    var max = slider.querySelector('.max');
    var lower = slider.querySelector('.lower');
    var upper = slider.querySelector('.upper');
    var legend = slider.querySelector('.legend');
    var thumbsize = parseInt(slider.getAttribute('data-thumbsize'));
    var rangewidth = parseInt(slider.getAttribute('data-rangewidth'));
    var rangemin = parseInt(slider.getAttribute('data-rangemin'));
    var rangemax = parseInt(slider.getAttribute('data-rangemax'));

    /* set min and max attributes */
    min.setAttribute('max',splitvalue);
    max.setAttribute('min',splitvalue);

    /* set css */
    min.style.width = parseInt(thumbsize + ((splitvalue - rangemin)/(rangemax - rangemin))*(rangewidth - (2*thumbsize)))+'px';
    max.style.width = parseInt(thumbsize + ((rangemax - splitvalue)/(rangemax - rangemin))*(rangewidth - (2*thumbsize)))+'px';
    min.style.left = '0px';
    max.style.left = parseInt(min.style.width)+'px';
    min.style.top = lower.offsetHeight+'px';
    max.style.top = lower.offsetHeight+'px';
    legend.style.marginTop = min.offsetHeight+'px';
    slider.style.height = (lower.offsetHeight + min.offsetHeight + legend.offsetHeight)+'px';
    
    /* correct for 1 off at the end */
    if(max.value>(rangemax - 1)) max.setAttribute('data-value',rangemax);

    /* write value and labels */
    max.value = max.getAttribute('data-value'); 
    min.value = min.getAttribute('data-value');
    lower.innerHTML = min.getAttribute('data-value');
    upper.innerHTML = max.getAttribute('data-value');

}

function init(slider) {
    /* set function vars */
    var min = slider.querySelector('.min');
    var max = slider.querySelector('.max');
    var rangemin = parseInt(min.getAttribute('min'));
    var rangemax = parseInt(max.getAttribute('max'));
    var avgvalue = (rangemin + rangemax)/2;
    var legendnum = slider.getAttribute('data-legendnum');

    /* set data-values */
    min.setAttribute('data-value',rangemin);
    max.setAttribute('data-value',rangemax);
    
    /* set data vars */
    slider.setAttribute('data-rangemin',rangemin); 
    slider.setAttribute('data-rangemax',rangemax); 
    slider.setAttribute('data-thumbsize',thumbsize); 
    slider.setAttribute('data-rangewidth',slider.offsetWidth);

    /* write labels */
    var lower = document.createElement('span');
    var upper = document.createElement('span');
    lower.classList.add('lower','value');
    upper.classList.add('upper','value');
    lower.appendChild(document.createTextNode(rangemin));
    upper.appendChild(document.createTextNode(rangemax));
    slider.insertBefore(lower,min.previousElementSibling);
    slider.insertBefore(upper,min.previousElementSibling);
    
    /* write legend */
    var legend = document.createElement('div');
    legend.classList.add('legend');
    var legendvalues = [];
    for (var i = 0; i < legendnum; i++) {
        legendvalues[i] = document.createElement('div');
        var val = Math.round(rangemin+(i/(legendnum-1))*(rangemax - rangemin));
        legendvalues[i].appendChild(document.createTextNode(val));
        legend.appendChild(legendvalues[i]);

    } 
    slider.appendChild(legend);

    /* draw */
    draw(slider,avgvalue);

    /* events */
    min.addEventListener("input", function() {update(min);});
    max.addEventListener("input", function() {update(max);});
}

function update(el){
    /* set function vars */
    var slider = el.parentElement;
    var min = slider.querySelector('#min');
    var max = slider.querySelector('#max');
    var minvalue = Math.floor(min.value);
    var maxvalue = Math.floor(max.value);
    
    /* set inactive values before draw */
    min.setAttribute('data-value',minvalue);
    max.setAttribute('data-value',maxvalue);

    var avgvalue = (minvalue + maxvalue)/2;

    /* draw */
    draw(slider,avgvalue);
}

var sliders = document.querySelectorAll('.min-max-slider');
sliders.forEach( function(slider) {
    init(slider);
});

// Shows browser confirm window to confirm pressing of approval / refusal of a proposal
function approvalOrRefusalBox(isApproval, idUser, idTopic){
    if (isApproval){
        if (confirm("Are you sure you approve this proposal? (This will finalize this animals posting)")) window.location.replace("../actions/action_approve_proposal.php?idUser=" + idUser + "&idTopic=" + idTopic);
    }
    else if (!isApproval){
        if (confirm("Are you sure you want to refuse this proposal?")) window.location.replace("../actions/action_refuse_proposal.php?idUser=" + idUser + "&idTopic=" + idTopic);
    }
}

//Image selector in edit_profile.php
const wrapper = document.querySelector(".wrapper");
const fileName = document.querySelector(".file-name");
const defaultBtn = document.querySelector("#default-btn");
const customBtn = document.querySelector("#custom-btn");
const cancelBtn = document.querySelector("#cancel-btn i");
const img = document.querySelector(".image img");
let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
defaultBtn.addEventListener("change", function(){
    const file = this.files[0];
    var result;
    if(file){
        document.querySelector(".change-photo-container .wrapper img").style.objectFit = "cover";
        const reader = new FileReader();
        reader.onload = function(){
        result = reader.result;
        img.src = result;
        console.log(img.src);
        wrapper.classList.add("active");
        }
        cancelBtn.addEventListener("click", function(){
            img.src = "../assets/dog.png";
            document.querySelector(".change-photo-container .wrapper img").style.objectFit = "contain";
        wrapper.classList.remove("active");
        })
        reader.readAsDataURL(file);
    }
    return false
});

/* Animal photo SlideShow */
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
