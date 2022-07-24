<?php
/**
 * ****************************************************************************
 *
 *   НЕ РЕДАКТИРУЙТЕ ЭТОТ ФАЙЛ
 *   DON'T EDIT THIS FILE
 *
 *   После обновления Вы потереяете все изменения. Используйте дочернюю тему
 *   After update you will lose all changes. Use child theme
 *
 *   https://docs.wpshop.ru/start/child-themes
 *
 * *****************************************************************************
 *
 * @package bono
 */

use Wpshop\TheTheme\Features\CompareProducts;
use Wpshop\TheTheme\Features\Favorite;
use Wpshop\TheTheme\Widget\MiniCart;

$wpshop_core        = theme_container()->get( \Wpshop\Core\Core::class );
$header_block_order = $wpshop_core->get_option( 'header_block_order' );
$header_block_order = explode( ',', $header_block_order );

$header_style = ( $header_style = $wpshop_core->get_option( 'header_style_type' ) ) ? ' site-header--' . $header_style : '';

?>

<?php do_action( THEME_SLUG . '_before_header' ) ?>

<header id="masthead" class="site-header<?php echo $header_style ?> <?php $wpshop_core->the_option( 'header_width' ) ?>" itemscope itemtype="http://schema.org/WPHeader">
    <div class="site-header-inner <?php $wpshop_core->the_option( 'header_inner_width' ) ?>">

        <div class="humburger js-humburger"><span></span><span></span><span></span></div>

        <?php foreach ( $header_block_order as $order ) {

            if ( $order == 'site_branding' ) {
                get_template_part( 'template-parts/header/site', 'branding' );
            }

            $header_html_block_1 = $wpshop_core->get_option( 'header_html_block_1' );
            if ( $order == 'header_html_block_1' && ! empty ( $header_html_block_1 ) ) { ?>
                <div class="header-html-1">
                    <?php echo do_shortcode( $header_html_block_1 ) ?>
                </div>
            <?php }

            if ( $order == 'header_social' ) {
                get_template_part( 'template-parts/blocks/social', 'links' );
            }

            if ( $order == 'top_menu' ) {
                get_template_part( 'template-parts/navigation/top' );
            }

            $header_html_block_2 = $wpshop_core->get_option( 'header_html_block_2' );
            if ( $order == 'header_html_block_2' && ! empty( $header_html_block_2 ) ) { ?>
                <div class="header-html-2">
                    <?php echo do_shortcode( $header_html_block_2 ) ?>
                </div>
            <?php }

            if ( $order == 'header_search' ) { ?>
                <?php $search_type = $wpshop_core->get_option( 'header_search_type' ) ?>

                <div class="header-search header-search--<?php echo $search_type ?>">

                    <?php if ( $search_type == 'compact' ): ?>
                        <span class="header-search-ico js-header-search-ico"></span>
                    <?php endif; ?>

                    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <label>
                            <span class="screen-reader-text"><?php echo __( 'Search for:', THEME_TEXTDOMAIN ) ?></span>
                            <input type="search" class="search-field" placeholder="<?php echo __( 'Search', THEME_TEXTDOMAIN ) ?>..." value="" name="s">
                        </label>
                        <button type="submit" class="search-submit"></button>
                    </form>
                </div>
            <?php }

            if ( $order == 'header_phone_number' && $wpshop_core->get_option( 'header_phone_number' ) ) {
                ?>
                <div class="header-phone">
                    <?php
                    $phones = $wpshop_core->get_option( 'header_phone_number' );
                    $phones = explode( "\n", $phones );
                    $phones = array_map( 'trim', $phones );
                    $phones = array_filter( $phones );
                    foreach ( $phones as $phone ) {
                        $phone_parts = explode( "//", $phone );
                        $phone_parts = array_map( 'trim', $phone_parts );
                        $phone_clean = preg_replace( '/[^\d+]/ui', '', wp_strip_all_tags( $phone_parts[0] ) );

                        $phone_clean = apply_filters( 'bono_header_phone_clean', $phone_clean, $phone_parts );

                        echo '<div class="header-phone__item">';
                        echo '<a href="tel:' . urlencode( $phone_clean ) . '">';
                        echo $phone_parts[0];
                        if ( ! empty( $phone_parts[1] ) ) {
                            echo '<br><small>' . $phone_parts[1] . '</small>';
                        }
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php
            }

            $favorite = theme_container()->get( Favorite::class );
            if ( $order == 'header_favorite' && $favorite->enabled() ) {
                ?>
                <a href="<?php echo $favorite->get_page_url() ?>"
                   title="<?php echo __( 'Favorite', THEME_TEXTDOMAIN ) ?>"
                   class="header-cart__link header-favorite header-favorite--vis js-header-favorite">
                    <?php if ( $favorite->show_counter() ): ?>
                        <?php $favorite_count = $favorite->count() ?>
                        <sup style="opacity: 1;<?php echo apply_filters( 'bono_favorite:counter:show_zero', (bool) $favorite_count ) ? '' : 'display:none;' ?>">
                            <?php echo $favorite_count ?>
                        </sup>
                    <?php endif ?>
                </a>
                <?php
            }

            $compare_products = theme_container()->get( CompareProducts::class );
            if ( $order == 'header_compare' && $compare_products->enabled() ) {
                ?>
                <a href="<?php echo $compare_products->get_page_url() ?>"
                   title="<?php echo __( 'Compare Products', THEME_TEXTDOMAIN ) ?>"
                   class="header-cart__link header-compare header-compare--vis js-header-compare">
                    <?php if ( $compare_products->show_counter() ): ?>
                        <?php $compare_count = $compare_products->count() ?>
                        <sup style="opacity: 1;<?php echo apply_filters( 'bono_compare_products:counter:show_zero', (bool) $compare_count ) ? '' : 'display:none;' ?>">
                            <?php echo $compare_count ?>
                        </sup>
                    <?php endif ?>
                </a>
                <?php
            }

            if ( $order == 'header_cart' && apply_filters( 'bono_enabled_minicart', true ) ) {
                the_widget( MiniCart::class, 'title=', [
                    'wc_cart_widget_args' => [

                    ],
                ] );
            }

        } ?>

    </div>
</header><!-- #masthead -->

<?php do_action( THEME_SLUG . '_after_header' ) ?>
