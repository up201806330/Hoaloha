'use strict'

let loginButton = document.getElementById('loginButton');
if (loginButton != null) loginButton.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'flex';});

let closeButtonLogin = document.getElementById('closeButtonLogin');
if (closeButtonLogin != null) closeButtonLogin.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'none';});

let searchButton = document.getElementById('searchButton');
if (searchButton != null) searchButton.addEventListener('click', function() {document.querySelector('.search-container').style.display = 'flex';});

let closeButtonSearch = document.getElementById('closeButtonSearch');
if (closeButtonSearch != null) closeButtonSearch.addEventListener('click', function() {document.querySelector('.search-container').style.display = 'none';});


let collapsible = document.getElementById('collapsible');
collapsible.addEventListener("click", function() {
    var content = collapsible.nextElementSibling;
    if (content.style.display === "block") {
    content.style.display = "none";
    } else {
    content.style.display = "block";
    }
});