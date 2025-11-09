// pw length logic for functioning buttons instead of webkit spinners
const pwLengthInput = document.getElementById('length');

const pwLengthPlusOneBtn = document.getElementById('plusOne');
const pwLengthMinusOneBtn = document.getElementById('minusOne');
const max = parseInt(pwLengthInput.max);
const min = parseInt(pwLengthInput.min);

function incrementPwLength(event) {

    event.preventDefault();
    let currentValue = parseInt(pwLengthInput.value);

    if (currentValue < max) {
        return pwLengthInput.value = currentValue + 1
    }
}

function decrementPwLength(event) {

    event.preventDefault();
    let currentValue = parseInt(pwLengthInput.value);

    if (currentValue > min) {
        return pwLengthInput.value = currentValue - 1
    }
}

pwLengthPlusOneBtn.addEventListener('click', incrementPwLength);
pwLengthMinusOneBtn.addEventListener('click', decrementPwLength);