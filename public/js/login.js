const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const signUpSubmit = document.getElementById('singUpSubmit');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signUpSubmit.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});