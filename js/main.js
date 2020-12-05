'use strict'

let loginButton = document.getElementById('loginButton');
if (loginButton != null) loginButton.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'flex';});

let closeButton = document.getElementById('closeButton');
if (closeButton != null) closeButton.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'none';});

let collapsible = document.getElementById('collapsible');
collapsible.addEventListener("click", function() {
    var content = collapsible.nextElementSibling;
    if (content.style.display === "block") {
    content.style.display = "none";
    } else {
    content.style.display = "block";
    }
});