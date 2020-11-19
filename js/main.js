'use strict'

document.getElementById('loginButton').addEventListener('click', function() {
    document.querySelector('.login-container').style.display = 'flex';
});
document.getElementById('closeButton').addEventListener('click', function() {
    document.querySelector('.login-container').style.display = 'none';
});
