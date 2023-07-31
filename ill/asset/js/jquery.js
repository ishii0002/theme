// ----------------------------------------
// サイト全体のJSを記述するファイル
// ----------------------------------------

// ---------- ページ内とページ内からのアンカーリンク ----------
$(function () {
	var headerHeight = $('#header').outerHeight() + 20; //headerの高さを取得
	var urlHash = location.hash;
	if (urlHash) {
		$('body,html').stop().scrollTop(0);
		setTimeout(function () {
			var target = $(urlHash);
			var position = target.offset().top - headerHeight;
			$('body,html').stop().animate({ scrollTop: position }, 500);
		}, 100);
	}
	$('a[href^="#"]').click(function () {
		var href = $(this).attr('href');
		var target = $(href);
		var position = target.offset().top - headerHeight;
		$('body,html').stop().animate({ scrollTop: position }, 500);
	});
});





// ---------- ハンバーガーメニュー テキスト切り替え ----------
$(function () {
	$('.js__header__hamburger').on('click', function () {
		if ($(".js__header__buttonName").text() === 'CLOSE') {
			$(".js__header__buttonName").text('MENU');
		} else {
			$(".js__header__buttonName").text('CLOSE');
		}
	});
});

// ---------- ハンバーガーメニューのボタン 三本線の動作 ----------
$(function () {
	$('#js__buttonHamburger').click(function () {
		$('body').toggleClass('is-drawerActive');

		if ($(this).attr('aria-expanded') == 'false') {
		$(this).attr('aria-expanded', true);
		} else {
		$(this).attr('aria-expanded', false);
		}
	});
	$('.js__header__globalNav a').on('click', function () {
		if (window.innerWidth <= 1767) {
		$('#js__buttonHamburger').click(); 
		}
	});
});

// ---------- ハンバーガーメニューの設定 モーダル ----------
$(function () {
	// var navFlg = false;
	$('#js__buttonHamburger').on('click', function () {    
	// $('.menu__line').toggleClass('active');
	$('.js__header__globalNav').fadeToggle();
	// if (!navFlg) {
	// 	$('.header__globalNavMenuItem').each(function (i) {
	// 	$(this).delay(i * 0).animate({
	// 		'opacity': 1,
	// 	}, 0);
	// 	});
	// 	navFlg = true;
	// } else {
	// 	$('.header__globalNavMenuItem').css({
	// 	'opacity': 0,
	// 	});
	// 	navFlg = false;
	// }
	});
});





// ---------- メインビジュアル  swiper ----------
$(function () {
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        autoplay: {
            delay: 2000,   //切替わる時間 2秒
            disableOnInteraction: false,
        },
        speed: 4000,  //切替わるスピード 4秒
        effect: 'fade',   //アニメーション  slide・fade・cube・coverflow・flip
    });
});



// ---------- お問い合わせフォーム エラー時、自動スクロール ----------
$(function () {
  document.addEventListener( 'wpcf7invalid', function( event ) {
	var position = $('.contactWrapper').offset().top;   //移動場所を指定
	$('html, body').animate({
	scrollTop: position
	}, 500);    //スピード
	}, false );
});




