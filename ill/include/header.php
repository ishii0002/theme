<header>
  <div class="header__container">
    <div class="header__logo">
      <a href="#"><img src="/wp-content/themes/ill/img/front/logo.png" alt="Logo"></a>
    </div>
    <nav class="header__nav">
      <ul>
        <li><a href="#">サービス</a></li>
        <li><a href="#">製品情報</a></li>
        <li><a href="#">ニュースリリース</a></li>
        <li><a href="#">会社情報</a></li>
        <li><a href="#">新着情報</a></li>
				<li><a href="#" class="contact"><span>お問い合わせ</span></a></li>
      </ul>
    </nav>
    <div class="header__menu-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</header>

<script>

const menuIcon = document.querySelector('.header__menu-icon');
const nav = document.querySelector('.header__nav');
const links = document.querySelectorAll('.header__nav a');
const header = document.querySelector('header');
let newImgSrc = '/wp-content/themes/ill/img/front/logo.png'; // 初期値を設定する

menuIcon.addEventListener('click', () => {
  nav.classList.toggle('header__nav--active');
  menuIcon.classList.toggle('header__menu-icon--active');

  if (nav.classList.contains('header__nav--active')) {
    header.classList.add('header__nav--active');
    newImgSrc = '/wp-content/themes/ill/img/front/logo_sp.png';
    document.querySelector('.contact span').style.color = '#ffffff';
  } else {
    header.classList.remove('header__nav--active');
    newImgSrc = '/wp-content/themes/ill/img/front/logo.png';
    document.querySelector('.contact span').style.color = '#004BB1';
  }
  document.querySelector('.header__logo img').src = newImgSrc;
  
  // 追加するコード
  if (menuIcon.classList.contains('active')) {
    document.querySelectorAll('.header__menu-icon span').forEach((span) => {
      span.style.backgroundColor = '#ffffff';
    });
  } else {
    document.querySelectorAll('.header__menu-icon span').forEach((span) => {
      span.style.backgroundColor = '#333333';
    });
  }



	if (menuIcon.classList.contains('header__menu-icon--active')) {
  document.querySelectorAll('.header__menu-icon span').forEach((span) => {
    span.style.backgroundColor = '#ffffff';
  });
	} else {
		document.querySelectorAll('.header__menu-icon span').forEach((span) => {
			span.style.backgroundColor = '#333333';
		});
	}



// 追加するコード
if (menuIcon.classList.contains('header__menu-icon--active')) {
    document.querySelectorAll('.header__menu-icon span')[0].style.backgroundColor = 'transparent';
    document.querySelectorAll('.header__menu-icon span')[1].style.backgroundColor = 'transparent';
    document.querySelectorAll('.header__menu-icon span')[2].style.backgroundColor = 'transparent';
    document.querySelectorAll('.header__menu-icon span')[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
    document.querySelectorAll('.header__menu-icon span')[2].style.transform = 'rotate(-45deg) translate(7px, -7px)';
  } else {
    document.querySelectorAll('.header__menu-icon span')[0].style.backgroundColor = '#333333';
    document.querySelectorAll('.header__menu-icon span')[1].style.backgroundColor = '#333333';
    document.querySelectorAll('.header__menu-icon span')[2].style.backgroundColor = '#333333';
    document.querySelectorAll('.header__menu-icon span')[0].style.transform = 'rotate(0) translate(0)';
    document.querySelectorAll('.header__menu-icon span')[2].style.transform = 'rotate(0) translate(0)';
  }





	if (menuIcon.classList.contains('header__menu-icon--active')) {
document.querySelectorAll('.header__menu-icon span').forEach((span) => {
span.style.backgroundColor = '#ffffff';
});
} else {
document.querySelectorAll('.header__menu-icon span').forEach((span) => {
span.style.backgroundColor = '#333333';
});
menuIcon.style.backgroundColor = 'transparent';
}



// 追加するコード
if (menuIcon.classList.contains('header__menu-icon--active')) {
    document.querySelectorAll('.header__menu-icon span')[1].style.backgroundColor = '#004bb1';
  } else {
    document.querySelectorAll('.header__menu-icon span')[1].style.backgroundColor = '';
  }

});
</script>