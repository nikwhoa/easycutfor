<?php

use Wpshop\Core\Advertising;
use Wpshop\Core\Core;

$core        = theme_container()->get(Core::class);
$advertising = theme_container()->get(Advertising::class);

?>

</div>
<!--.site-content-inner-->
</div>
<!--.site-content-->

<div class="block-after-site <?php echo apply_filters('bono_site_content_classes', 'fixed') ?>"><?php echo $advertising->show_ad('after_site_content'); ?></div>

<?php do_action(THEME_SLUG . '_after_site_content') ?>

<?php get_template_part('template-parts/footer/footer') ?>

<?php if ($core->get_option('arrow_display')) : ?>
	<button type="button" class="scrolltop js-scrolltop" <?php echo $core->get_option('arrow_mob_display') ? ' data-mob="on"' : '' ?>></button>
<?php endif ?>


</div><!-- #page -->

<?php wp_footer(); ?>
<?php $core->the_option('code_body') ?>

<?php do_action(THEME_SLUG . '_before_body') ?>

<?php get_template_part('template-parts/footer/init-slider') ?>





<script>
	if (window.location.pathname.charAt(1) == 'e' && window.location.pathname.charAt(2) == 'n' && window.location.pathname.charAt(3) == '/') {
		// 	function cartLoop() {
		// 		if (document.getElementsByClassName('woocommerce-mini-cart__total total')[0]) {
		// 			document.getElementsByClassName('woocommerce-mini-cart__total total')[0].getElementsByTagName('strong')[0].innerHTML = 'Subtotal';
		// 			setTimeout(cartLoop, 10);
		// 		} else {
		// 			setTimeout(cartLoop, 10);
		// 		}
		// 	}
		function cartLoop2() {
			if (document.getElementsByClassName('header-cart__title')[0].innerHTML && document.getElementsByClassName('header-cart__title')[0].innerHTML !== 'Cart') {
				document.getElementsByClassName('header-cart__title')[0].innerHTML = 'Cart';
			} else {
				setTimeout(cartLoop2, 10);
			}
		}

		function cartLoop3() {
			if (document.getElementsByClassName('woocommerce-mini-cart__buttons buttons')[0]) {
				if (document.getElementsByClassName('button wc-forward')[0].innerHTML !== 'View Cart') {
					document.getElementsByClassName('button wc-forward')[0].innerHTML = 'View Cart';
					document.getElementsByClassName('button wc-forward')[0].setAttribute('href', '/en/cart/');
				}
				if (document.getElementsByClassName('button checkout wc-forward')[0].innerHTML !== 'Checkout') {
					document.getElementsByClassName('button checkout wc-forward')[0].innerHTML = 'Checkout';
					document.getElementsByClassName('button checkout wc-forward')[0].setAttribute('href', '/en/checkout/');
				}
				setTimeout(cartLoop3, 10);
			} else {
				setTimeout(cartLoop3, 10);
			}
		}
		// 	setTimeout(cartLoop, 10);
		setTimeout(cartLoop2, 10);
		setTimeout(cartLoop3, 10);
	}
	if (window.location.pathname.charAt(1) == 'e' && window.location.pathname.charAt(2) == 'e' && window.location.pathname.charAt(3) == '/') {
		if (document.getElementsByClassName('add_to_cart_button')) {
			for (var i = 0; i < document.getElementsByClassName('add_to_cart_button').length; i++) {
				document.getElementsByClassName('add_to_cart_button')[i].innerHTML = 'Osta';
			}
		}

		function cartModal3() {
			if (document.getElementsByClassName('woocommerce-mini-cart__total')[0] !== undefined) {
				if (document.getElementsByClassName('woocommerce-mini-cart__total')[0].getElementsByTagName('strong')[0].innerHTML !== 'Vahesumma') {
					document.getElementsByClassName('woocommerce-mini-cart__total')[0].getElementsByTagName('strong')[0].innerHTML = 'Vahesumma';
				}
			}
			setTimeout(cartModal3, 200);
		}

		function cartModal2() {
			if (document.getElementsByClassName('header-cart__title')[0].innerHTML !== 'Ostukorv') {
				document.getElementsByClassName('header-cart__title')[0].innerHTML = 'Ostukorv';
			}
			setTimeout(cartModal2, 200);
		}

		function cartModal() {
			if (document.getElementsByClassName('woocommerce-mini-cart__buttons buttons').length > 0) {
				if (document.getElementsByClassName('woocommerce-mini-cart__buttons buttons')[0].getElementsByClassName('button wc-forward')[0].innerHTML !== 'Vaata ostukorvi') {
					document.getElementsByClassName('button wc-forward')[0].innerHTML = 'Vaata ostukorvi';
					document.getElementsByClassName('button wc-forward')[0].setAttribute('href', '/ee/cart/');
				}
				if (document.getElementsByClassName('woocommerce-mini-cart__buttons buttons')[0].getElementsByClassName('button checkout wc-forward')[0].innerHTML !== 'Maksma') {
					document.getElementsByClassName('button checkout wc-forward')[0].innerHTML = 'Maksma';
					document.getElementsByClassName('button checkout wc-forward')[0].setAttribute('href', '/ee/checkout/');
				}
			}
			setTimeout(cartModal, 200);
		}
		setTimeout(cartModal, 500);
		setTimeout(cartModal2, 500);
		setTimeout(cartModal3, 500);
		setTimeout(cartLoop, 10);
		setTimeout(cartLoop2, 10);


	}
</script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
	const swiper = new Swiper('.swiper-container', {
		speed: 400,
		autoplay: true,
		pauseOnMouseEnter: true,
		//   disableOnInteraction: true
	});
	const swiperSlider = document.querySelector('.swiper-container')
	swiperSlider.addEventListener('mouseover', () => {
		swiper.autoplay.stop()
	})
	swiperSlider.addEventListener('mouseleave', () => {
		swiper.autoplay.start()
	})
</script>


</body>

</html>