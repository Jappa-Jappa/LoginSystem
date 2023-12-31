//to show password
const floatingPassword = document.getElementById('floatingPassword');
const exampleCheck1 = document.getElementById('exampleCheck1');

exampleCheck1.addEventListener('change', function(){
    floatingPassword.type = this.checked?'text' : 'password';
});

// //after submit register form redirect to log in form
// const myForm2 = document.getElementById('myForm2');

//   // Menambahkan event listener pada formulir untuk menanggapi pengiriman
//   myForm2.addEventListener('submit', function(event) {
//     // Mencegah formulir dikirim secara default
//     event.preventDefault();

//     // Menampilkan alert
//     alert('Congratulation for submitting your account klik OK to log in');

//     // Mengarahkan ke halaman lain (contoh: https://example.com)
//     window.location.href = 'login.php';
//   });