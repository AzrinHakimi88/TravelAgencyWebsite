document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const showLogin = document.getElementById('show-login');
    const showSignup = document.getElementById('show-signup');

    showLogin.addEventListener('click', function () {
        loginForm.classList.remove('hidden');
        signupForm.classList.add('hidden');
    });

    showSignup.addEventListener('click', function () {
        signupForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
    });
});


