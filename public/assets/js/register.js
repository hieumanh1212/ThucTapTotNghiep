// function recaptchaDataCallbackRegister(response){
// $('#hiddenRecaptchaRegister').val(response);
// $('#hiddenRecaptchaRegisterError').html('');
// }

// function recaptchaExpireCallbackRegister(){
// $('#hiddenRecaptchaRegister').val('');
// }



// const form = document.getElementById('form');
// const username = document.getElementById('username');
// const email = document.getElementById('email');
// const password = document.getElementById('password');
// const password2 = document.getElementById('password2');
// const recaptchaResponse = document.getElementById("hiddenRecaptchaRegister");
// const checkbox = document.getElementById('remeber');
// const errorcheck = document.getElementById('errorcheckbox');

// form.addEventListener('submit', e => {
//     e.preventDefault();

//     validateInputs();
// });


// const setError = (element, message) => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.error');

//     errorDisplay.innerText = message;
//     inputControl.classList.add('error');
//     inputControl.classList.remove('success')
// }

// const setSuccess = element => {
//     const inputControl = element.parentElement;
//     const errorDisplay = inputControl.querySelector('.error');

//     errorDisplay.innerText = '';
//     inputControl.classList.add('success');
//     inputControl.classList.remove('error');
// };

// const isValidEmail = email => {
//     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// }

// const validateInputs = () => {
//     const usernameValue = username.value.trim();
//     const emailValue = email.value.trim();
//     const passwordValue = password.value.trim();
//     const password2Value = password2.value.trim();
//     const recaptchaValue = recaptchaResponse.value.trim();
//     const errorcheckValue = errorcheck.value;

//     // Username
//     if(usernameValue === '') {
//         setError(username, 'Bạn phải nhập tên đăng nhập');
//     } else {
//         setSuccess(username);
//     }

//     // Email
//     if(emailValue === '') {
//         setError(email, 'Bạn phải nhập Email');
//     } else if (!isValidEmail(emailValue)) {
//         setError(email, 'Email phải có định dạng abc@gmail.com');
//     } else {
//         setSuccess(email);
//     }

//     // Password
//     if(passwordValue === '') {
//         setError(password, 'Bạn phải nhập mật khẩu');
//     } else if (passwordValue.length < 8 ) {
//         setError(password, 'Mật khẩu tối thiểu 8 ký tự.')
//     } else {
//         setSuccess(password);
//     }

//     // ConfirmPassword
//     if(password2Value === '') {
//         setError(password2, 'Hãy xác nhận lại mật khẩu');
//     } else if (password2Value !== passwordValue) {
//         setError(password2, "Mật khẩu không trùng khớp");
//     } else {
//         setSuccess(password2);
//     }

//     // Recaptcha
//     if (recaptchaValue === "") {
//         setError(recaptchaResponse, 'Hãy xác minh');
//     }else {
//         setSuccess(recaptchaResponse);
//     }

//     //Checkbox
//     if(!checkbox.checked){
//         errorcheck.innerHTML = 'Bạn chưa xác nhận điều khoản';
//     }else {
//         errorcheck.innerHTML = '';
//     }
    
// };
