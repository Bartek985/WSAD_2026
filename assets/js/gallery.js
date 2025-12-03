(function(){
  const grid = document.getElementById('galleryGrid');
  const lightbox = document.getElementById('glightbox');
  const lbImg = document.getElementById('glightboxImg');
  const lbMeta = document.getElementById('glightboxMeta');
  const lbClose = document.getElementById('glightboxClose');
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
    document.body.style.overflow = 'hidden';
    document.getElementById('glightboxBox').focus();
  });
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
})();