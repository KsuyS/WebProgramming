document.addEventListener("DOMContentLoaded", () => {
    const userData =
    {
        email: '',
        password: '',
    }

    const emailInput = document.getElementById('email_input');
    const passwordInput = document.getElementById('password_input');
    const passwordIcon = document.getElementById('pass-icon');

    function onEmailInputChange(event) {
        userData.email = event.target.value;
    }

    function onPasswordInputChange(event) {
        userData.password = event.target.value;
    }

    function validation(form) {
        function removeError(input) {
            const parent = input.parentNode
            if (input.classList.contains('form-error')) {
                input.classList.remove('form-error')
                parent.querySelector('.label-error').remove()
            }

        }

        function createError(input) {
            input.classList.add('form-error')
            const parent = input.parentNode
            const errorLabel = document.createElement('label')
            errorLabel.textContent = 'Filed is required.'
            errorLabel.classList.add('label-error')
            parent.append(errorLabel)
        }

        let result = true
        const allInputs = form.querySelectorAll('input')
        for (const input of allInputs) {
            removeError(input)
            if (input.value == "") {
                createError(input)
                result = false
            }

        }

        const mess = document.querySelector('.status-of-form__mess')
        const messBox = mess.parentNode

        if (result) {
            if (messBox.classList.contains('status-of-form_error')) {
                messBox.classList.remove('status-of-form_error')
            }
            messBox.classList.add('status-of-form_correct')
        } else {
            mess.textContent = "A-Ah! Check all fields!"
            if (messBox.classList.contains('status-of-form_correct')) {
                messBox.classList.remove('status-of-form_correct')
            }
            messBox.classList.add('status-of-form_error')
        }

        return result
    }

    function FormSubmit(event) {
        event.preventDefault();
        let form = document.forms['logForm'];
        if (validation(form)) {
            var json = JSON.stringify(userData)
            fetch("api-login.php", {
                method: "POST",
                body: json
            }).then(function (response) {
                console.log(response.status)
                if (response.status == 200) {
                    window.location.href = 'http://localhost/admin';
                } else {
                    const mess = document.querySelector('.status-of-form__mess')
                    const messBox = mess.parentNode

                    mess.textContent = "Incorrect email or password"
                    messBox.classList.add('status-of-form_error')
                }
            }).catch(function (error) {
                //... 
            });
        }
        console.log(userData)

    }

    function initEventListener() {
        logForm.addEventListener('submit', FormSubmit)
        emailInput.addEventListener('input', onEmailInputChange)
        passwordInput.addEventListener('input', onPasswordInputChange)
        passwordIcon.addEventListener('click', () => {
            if (passwordInput.getAttribute('type')
                === 'password') {
                passwordInput.setAttribute('type', 'text');
            }
            else {
                passwordInput.setAttribute('type', 'password');
            }
        })
    }

    initEventListener();
});