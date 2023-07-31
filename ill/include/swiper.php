<!--呼び出しているswiperバージョンが古いのか動作がおかしい -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="/wp-content/themes/ill/img/front/video.png" alt="image1"></div>
    <div class="swiper-slide"><img src="/wp-content/themes/ill/img/front/video.png" alt="image2"></div>
    <div class="swiper-slide"><img src="/wp-content/themes/ill/img/front/video.png" alt="image3"></div>
    <div class="swiper-slide"><img src="/wp-content/themes/ill/img/front/video.png" alt="image4"></div>
    <div class="swiper-slide"><img src="/wp-content/themes/ill/img/front/video.png" alt="image5"></div>
  </div>
  <div class="swiper-pagination"></div>
</div>

<script>
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    loop: true,
    on: {
      slideChange: function() {
        var activeIndex = this.realIndex;
        var paginationBullets = document.querySelectorAll('.swiper-pagination-bullet');
        paginationBullets.forEach(function(bullet, index) {
          if (index === activeIndex) {
            bullet.classList.add('swiper-pagination-bullet-active');
          } else {
            bullet.classList.remove('swiper-pagination-bullet-active');
          }
        });
      }
    }
  });
</script>