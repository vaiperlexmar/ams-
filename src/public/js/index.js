'use strict';

const formArea = document.querySelector("#container");

const loginDiv = document.getElementById("login-side");
const signupDiv = document.getElementById("signup-side");

const switchEffect = document.querySelectorAll('.switch-animation a');

// Sign Up Form Appearance

switchEffect[0].addEventListener('click', () => {
    loginDiv.style.transform = 'translateX(-100%)';
    signupDiv.style.transform = 'translateX(0)';
})

// Login Form Appearance

switchEffect[1].addEventListener('click', () => {
    loginDiv.style.transform = 'translateX(0)';
    signupDiv.style.transform = 'translateX(100%)';
})