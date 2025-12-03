(function(){
  const grid = document.getElementById('galleryGrid');
  const lightbox = document.getElementById('glightbox');
  const lbImg = document.getElementById('glightboxImg');
  const lbMeta = document.getElementById('glightboxMeta');
  const lbClose = document.getElementById('glightboxClose');
  // otwieranie lightboxa po kliknięciu kafelka
  grid.addEventListener('click', function(e){
    const fig = e.target.closest('.gallery-item');
    if(!fig) return;
    const img = fig.querySelector('img');
    const src = img.getAttribute('data-full') || img.src;
    const alt = img.getAttribute('alt') || '';
    const caption = fig.querySelector('.gallery-caption')?.innerText || '';
    lbImg.src = src;
    lbImg.alt = alt;
    lbMeta.textContent = caption;
    lightbox.classList.add('open');
    // focus accessibility
    document.body.style.overflow = 'hidden';
    document.getElementById('glightboxBox').focus();
  });
  // zamykanie (klik tła / przycisk / ESC)
  function closeLB(){
    lightbox.classList.remove('open');
    lbImg.src = '';
    lbImg.alt = '';
    lbMeta.textContent = '';
    document.body.style.overflow = '';
  }
  lbClose.addEventListener('click', closeLB);
  lightbox.addEventListener('click', function(e){
    if(e.target === lightbox) closeLB();
  });
  document.addEventListener('keydown', function(e){
    if(e.key === 'Escape' && lightbox.classList.contains('open')) closeLB();
  });
  // Accessibility: trap focus minimal (focus glightboxBox on open)
  // (For full trap implementation consider focus-trap library)
})();