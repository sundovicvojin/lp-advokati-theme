<?php
/**
 * Site header.
 *
 * @package LP_Advokati
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header" data-header>
    <div class="topbar">
        <p><?php esc_html_e('Pon - Pet: 09.00 - 17.00', 'lp-advokati'); ?></p>
        <a href="https://maps.google.com/?q=Internacionalnih%20brigada%2069%2C%20Beograd"><?php esc_html_e('Internacionalnih brigada 69, Beograd', 'lp-advokati'); ?></a>
    </div>

    <nav class="navbar" aria-label="<?php esc_attr_e('Glavna navigacija', 'lp-advokati'); ?>">
        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('LP Advokati početna', 'lp-advokati'); ?>">
            <?php echo lp_advokati_get_logo_markup(); ?>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">
            <span></span>
            <span></span>
            <span></span>
            <span class="sr-only"><?php esc_html_e('Otvori meni', 'lp-advokati'); ?></span>
        </button>

        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => 'div',
                'container_class'=> 'nav-links',
                'container_id'   => 'primary-nav',
                'menu_class'     => 'nav-menu',
                'depth'          => 1,
                'fallback_cb'    => false,
            ]);
        } else {
            ?>
            <div class="nav-links" id="primary-nav">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Početna', 'lp-advokati'); ?></a>
                <a href="<?php echo esc_url(lp_advokati_page_url('oblasti-rada')); ?>"><?php esc_html_e('Oblasti rada', 'lp-advokati'); ?></a>
                <a href="<?php echo esc_url(lp_advokati_page_url('o-nama')); ?>"><?php esc_html_e('O nama', 'lp-advokati'); ?></a>
                <a href="<?php echo esc_url(lp_advokati_page_url('nas-tim')); ?>"><?php esc_html_e('Naš tim', 'lp-advokati'); ?></a>
                <a href="<?php echo esc_url(lp_advokati_page_url('blog')); ?>"><?php esc_html_e('Blog', 'lp-advokati'); ?></a>
                <a href="<?php echo esc_url(lp_advokati_page_url('kontakt')); ?>"><?php esc_html_e('Kontakt', 'lp-advokati'); ?></a>
            </div>
            <?php
        }
        ?>
    </nav>
</header>
