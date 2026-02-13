document.addEventListener('DOMContentLoaded', function() {
  var modalTambahBuku = document.getElementById('modalTambahBuku');
  var modalTambahPenulis=document.getElementById('modalTambahPenulis');
  var modalTambahPenerbit=document.getElementById('modalTambahPenerbit');
  var modalTambahGenre=document.getElementById('modalTambahGenre');
  var modalEditBuku=document.getElementById('modalEditBuku');
  var btnTambahPenulis=document.getElementById('tambahPenulis');
  var btnTambahBuku = document.getElementById('tambahBuku');
  var btnTambahPenerbit=document.getElementById('tambahPenerbit');
  var btnTambahGenre=document.getElementById('tambahGenre');
  var btnEditBuku=document.getElementById('editBuku');
  var closeBtn = document.querySelector('.close');
  
  if (btnTambahBuku && modalTambahBuku && btnTambahPenulis && modalTambahPenulis && btnTambahPenerbit && modalTambahPenerbit && btnTambahGenre && modalTambahGenre && btnEditBuku && modalEditBuku) {
    btnTambahBuku.addEventListener('click', function() {
      modalTambahBuku.style.display = 'block';
      document.body.style.overflow = 'hidden';
    });
    btnTambahPenulis.addEventListener('click',function(){
      modalTambahPenulis.style.display='block';
      document.body.style.overflow='hidden';
    });
    btnTambahPenerbit.addEventListener('click',function(){
      modalTambahPenerbit.style.display='block';
      document.body.style.overflow='hidden';
    });
    btnTambahGenre.addEventListener('click',function(){
      modalTambahGenre.style.display='block';
      document.body.style.overflow='hidden';
    });
    if (closeBtn) {
      closeBtn.addEventListener('click', function() {
        closeModal();
      });
    }
    modalTambahBuku.addEventListener('click', function(event) {
      if (event.target === modalTambahBuku) {
        closeModal();
      }
    });
    modalTambahPenulis.addEventListener('click',function(event){
      if (event.target===modalTambahPenulis) {
        closeModal();
      }
    });
    modalTambahPenerbit.addEventListener('click',function(event){
      if (event.target===modalTambahPenerbit) {
        closeModal();
      }
    });
    modalTambahGenre.addEventListener('click',function(event){
      if (event.target===modalTambahGenre) {
        closeModal();
      }
    });
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape' && modalTambahBuku.style.display === 'block' || event.key==='Escape' && modalTambahPenulis.style.display==='block' || event.key==='Escape' && modalTambahPenerbit.style.display==='block' || event.key==='Escape' && modalTambahGenre.style.display==='block') {
        closeModal();
      }
    });
    
    function closeModal() {
      modalTambahBuku.style.display = 'none';
      modalTambahPenulis.style.display='none';
      modalTambahPenerbit.style.display='none';
      modalTambahGenre.style.display='none';
      document.body.style.overflow = 'auto';
    }
  }
  var editButtons = document.querySelectorAll('.action-buttons a');
  editButtons.forEach(function(btn) {
    if (btn.classList.contains('btn-edit')) {
      btn.style.backgroundColor = '#ffc107';
      btn.style.color = '#000';
      btn.style.padding = '5px 10px';
      btn.style.borderRadius = '4px';
      btn.style.textDecoration = 'none';
      btn.style.display = 'inline-block';
      btn.style.marginRight = '5px';
    }
    if (btn.classList.contains('btn-delete')) {
      btn.style.backgroundColor = '#dc3545';
      btn.style.color = '#fff';
      btn.style.padding = '5px 10px';
      btn.style.borderRadius = '4px';
      btn.style.textDecoration = 'none';
      btn.style.display = 'inline-block';
    }
  });

});

