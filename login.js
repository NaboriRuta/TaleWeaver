function setFormMessage(formElement, type, msg) {
    const msgElement = formElement.querySelector('.form-msg');
    msgElement.textContent = msg;
    msgElement.classList.remove('success-msg', 'incorrect-credential');
    msgElement.classList.add(type)
}

function setInputError(inputElement, msg) {
    inputElement.classList.add('input-err');
    inputElement.parentElement.querySelector(".err-msg").textContent = msg;
}

function clearInputError(inputElement) {
    inputElement.classList.remove('err-msg');
    inputElement.parentElement.querySelector(".err-msg").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector('#login');
    const newAccForm = document.querySelector('#newAcc');

    document.querySelector('#createAccount').addEventListener('click', e => {
        e.preventDefault();
        loginForm.classList.add('hidden');
        newAccForm.classList.remove('hidden');
    });
    document.querySelector('#toLogin').addEventListener('click', e => {
        e.preventDefault();
        newAccForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
    });

    loginForm.addEventListener('submit', e => {
        e.preventDefault();
        setFormMessage(loginForm, 'incorrect-credential', "Incorrect Username/Password");
    });
    document.querySelectorAll('.input').forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === 'createPass' && e.target.value.length > 0 && e.target.value.length < 8) {
                setInputError(inputElement, "Password must be at least 8 characters long");
            }
            if (e.target.id === "confirm" && !(e.target.value === document.querySelector('#createPass').value)) {
                setInputError(inputElement, "Password must match")
            }
            if (e.target.id === "addEmail" && e.target.value.length > 0 && !(e.target.value.includes("@"))) {
                setInputError(inputElement, "Must be a valid email")
            }
            if (e.target.id === "createUsername" && e.target.value.length > 0 && e.target.value.includes(" ")) {
                setInputError(inputElement, "There must be no spaces in your username")
            }
            if (e.target.id === "createUsername" && e.target.value.length > 0 && e.target.value.length < 5) {
                setInputError(inputElement, "Username must be at least 5 characters")
            }
        });
        inputElement.addEventListener("input", () => {
            clearInputError(inputElement);
        });
    });
});