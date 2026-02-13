// Register form submission
document.getElementById('register-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const alamat = document.getElementById('alamat').value;
    const nomorHandphone = document.getElementById('nomor-handphone').value;
    const jenisKelamin = document.getElementById('jenis-kelamin').value;
    const foto = document.getElementById('foto').value;
    console.log('Data register:', name, email, password, alamat, nomorHandphone, jenisKelamin, foto);
});
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    console.log('Data login:', email, password);
});
