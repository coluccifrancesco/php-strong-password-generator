const copyPwBtn = document.getElementById('copy-pw-button')

// Function to copy the generated pw
function copyToClipboard(event) {

    event.preventDefault();

    // Get the alert div
    const alertDiv = document.getElementById('alertDiv');

    // Get the string
    const generatedPassword = document.getElementById('generatedPassword').textContent;

    // Copies the string
    navigator.clipboard.writeText(generatedPassword);

    // Password is copied
    console.log('Password copied!');

    // Show the alert after 1ms
    setTimeout(() => {

        // Populate the html
        alertDiv.innerHTML = '<h3 id="alertText" class="mt-5 mb-0 py-3 px-4 mx-auto text-center">Password copied<i class="fa-regular fa-copy ms-4"></i></h3>';

        // Get alert text
        const alertText = document.getElementById('alertText');

        // Add class 'hide' to the alertText after 1s
        setTimeout(() => {

            alertText.classList.add('hide');

        }, 1000);

    }, 1);

    // Remove the html after 5s
    setTimeout(() => { alertDiv.innerHTML = '' }, 5000);
}

copyPwBtn.addEventListener('click', copyToClipboard);