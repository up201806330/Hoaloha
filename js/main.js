'use strict'

let loginButton = document.getElementById('loginButton');
if (loginButton != null) loginButton.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'flex';});

let closeButton = document.getElementById('closeButton');
if (closeButton != null) closeButton.addEventListener('click', function() {document.querySelector('.login-container').style.display = 'none';});
