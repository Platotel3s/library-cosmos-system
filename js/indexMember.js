document.addEventListener('DOMContentLoaded',function(){
  var modalTambahMember=document.getElementById('modalTambahMember');
  var btnTambahMember=document.getElementById('tambahMember');
  var closeBtn=document.querySelector('.close');

  if (btnTambahMember && modalTambahMember) {
    btnTambahMember.addEventListener('click',function(){
      modalTambahMember.style.display='block';
      document.body.style.overflow='hidden';
    });
    function closeModal() {
      modalTambahMember.style.display='none';
    }
    if(closeBtn) {
      closeBtn.addEventListener('click',function(){
        closeModal();
      });
    }
    document.addEventListener('keydown',function(event){
      if (event.key==='Escape' && modalTambahMember.style.display==='block') {
        closeModal();
      }
    });
  }
});
