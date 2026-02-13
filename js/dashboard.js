document.addEventListener('DOMContentLoaded',function(){
    const navLinks=document.querySelectorAll('.nav-tabs a');
    const icons={
      'Dashboard':'fas fa-tachometer-alt',
      'Buku':'fas fa-book',
      'Peminjaman':'fas fa-exchange-alt',
      'Member':'fas fa-user-plus',
    };
    navLinks.forEach(link=>{
      const text=link.textContent.trim();
      if (icons[text]) {
        const icon=document.createElement('i');
        icon.className=icons[text];
        link.prepend(icon);
      }
    });
    const userInfo = document.querySelector('.user-info');
    if (userInfo) {
        userInfo.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
        
        userInfo.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    }
    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                e.preventDefault();
            }
        });
    }
    const allLinks = document.querySelectorAll('a[href]');
    allLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.href && !this.href.includes('logout')) {
                const main = document.querySelector('main');
                if (main) {
                    main.style.opacity = '0.7';
                    main.style.transition = 'opacity 0.3s ease';
                }
            }
        });
    });
});
