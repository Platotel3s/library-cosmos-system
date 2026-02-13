document.addEventListener('DOMContentLoaded', function () {

  var modalTambahPinjam = document.getElementById('modalTambahPinjam');
  var btnTambahPinjam = document.getElementById('tambahPinjam');
  var closeBtn = document.querySelector('.close');

  if (btnTambahPinjam && modalTambahPinjam) {

    btnTambahPinjam.addEventListener('click', function () {
      modalTambahPinjam.style.display = 'block';
      document.body.style.overflow = 'hidden';
    });

    function closeModal() {
      modalTambahPinjam.style.display = 'none';
      document.body.style.overflow = 'auto';
    }

    if (closeBtn) {
      closeBtn.addEventListener('click', closeModal);
    }

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && modalTambahPinjam.style.display === 'block') {
        closeModal();
      }
    });

  }

});

