var modal = document.getElementById('modal');
var btn = document.getElementById('myBtn');
var span = document.getElementsByClassName('close')[0]; // Perbaikan: [0] untuk ambil elemen pertama

btn.onclick = function() {
  modal.style.display = 'block';
}

span.onclick = function() {
  modal.style.display = 'none';
}

// Perbaikan event klik di luar modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}

// Tambahan: tutup modal dengan tombol ESC
document.onkeydown = function(event) {
  if (event.key === "Escape") {
    modal.style.display = 'none';
  }
}
