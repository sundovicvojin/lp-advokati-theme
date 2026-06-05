<?php
/**
 * Theme setup and performance/SEO helpers.
 *
 * @package LP_Advokati
 */

if (!defined('ABSPATH')) {
    exit;
}

function lp_advokati_setup(): void
{
    load_theme_textdomain('lp-advokati', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height'      => 270,
        'width'       => 270,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => __('Glavna navigacija', 'lp-advokati'),
    ]);
}
add_action('after_setup_theme', 'lp_advokati_setup');

function lp_advokati_assets(): void
{
    $theme_version = wp_get_theme()->get('Version');
    $asset_path    = get_template_directory() . '/assets/theme.css';

    wp_enqueue_style(
        'lp-advokati-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Marcellus&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'lp-advokati-theme',
        get_template_directory_uri() . '/assets/theme.css',
        ['lp-advokati-fonts'],
        file_exists($asset_path) ? (string) filemtime($asset_path) : $theme_version
    );

    wp_enqueue_script(
        'lp-advokati-theme',
        get_template_directory_uri() . '/assets/theme.js',
        [],
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'lp_advokati_assets');

function lp_advokati_primary_menu_labels(array $items): array
{
    foreach ($items as $item) {
        if ('Usluge' === trim((string) $item->title)) {
            $item->title = __('Oblasti rada', 'lp-advokati');
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'lp_advokati_primary_menu_labels');

function lp_advokati_resource_hints(array $urls, string $relation_type): array
{
    if ('preconnect' === $relation_type) {
        $urls[] = 'https://fonts.googleapis.com';
        $urls[] = [
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
    }

    return $urls;
}
add_filter('wp_resource_hints', 'lp_advokati_resource_hints', 10, 2);

function lp_advokati_meta_description(): void
{
    if (is_admin()) {
        return;
    }

    if (is_front_page()) {
        $description = 'L&P Advokatska kancelarija u Beogradu se ističe kao lider u Srbiji u oblastima privrednog, imovinskog i radnog prava. Više od 20 godina uspešnog poslovanja.';
    } elseif (is_singular() && has_excerpt()) {
        $description = get_the_excerpt();
    } else {
        $description = get_bloginfo('description');
    }

    $description = trim(wp_strip_all_tags((string) $description));

    if ('' === $description) {
        return;
    }

    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
}
add_action('wp_head', 'lp_advokati_meta_description', 1);

function lp_advokati_schema(): void
{
    if (!is_front_page()) {
        return;
    }

    $schema = [
        '@context'  => 'https://schema.org',
        '@type'     => 'LegalService',
        'name'      => 'Advokatska kancelarija Lazarević & Pršić',
        'alternateName' => ['LP Advokati', 'L&P Advokati'],
        'url'       => home_url('/'),
        'logo'      => get_template_directory_uri() . '/assets/logo.png',
        'image'     => get_template_directory_uri() . '/assets/hero.webp',
        'telephone' => '+381113283300',
        'email'     => 'office@lp.rs',
        'address'   => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Internacionalnih brigada 69',
            'addressLocality' => 'Beograd',
            'postalCode'      => '11000',
            'addressCountry'  => 'RS',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name'  => 'Srbija',
        ],
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens'     => '09:00',
                'closes'    => '17:00',
            ],
        ],
        'knowsAbout' => [
            'Privredno pravo',
            'Imovinsko pravo',
            'Radno pravo',
            'Korporativno pravo',
            'Zaštita žiga',
        ],
    ];

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'lp_advokati_schema', 20);

function lp_advokati_get_logo_markup(): string
{
    $name = get_bloginfo('name') ?: 'LP Advokati';

    if (has_custom_logo()) {
        $logo_id = (int) get_theme_mod('custom_logo');
        $logo    = wp_get_attachment_image(
            $logo_id,
            'full',
            false,
            [
                'alt'      => $name,
                'decoding' => 'async',
            ]
        );

        if ($logo) {
            return $logo . '<span>' . esc_html($name) . '</span>';
        }
    }

    return sprintf(
        '<img src="%1$s" width="270" height="270" alt="%2$s"><span>%3$s</span>',
        esc_url(get_template_directory_uri() . '/assets/logo.png'),
        esc_attr($name),
        esc_html('Lazarević & Pršić')
    );
}

function lp_advokati_page_url(string $slug): string
{
    if ('blog' === $slug) {
        $posts_page_id = (int) get_option('page_for_posts');

        if ($posts_page_id > 0) {
            return get_permalink($posts_page_id) ?: home_url('/blog/');
        }
    }

    $page = get_page_by_path($slug);

    if ($page instanceof WP_Post) {
        return get_permalink($page) ?: home_url('/' . trim($slug, '/') . '/');
    }

    return home_url('/' . trim($slug, '/') . '/');
}

function lp_advokati_register_service_post_type(): void
{
    register_post_type('cea-service', [
        'labels' => [
            'name'          => __('Oblasti rada', 'lp-advokati'),
            'singular_name' => __('Oblast rada', 'lp-advokati'),
        ],

        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,

        'rewrite' => [
            'slug'       => 'oblasti',
            'with_front' => false,
        ],

        'capability_type' => 'post',
        'has_archive'     => false,
        'hierarchical'    => false,
        'menu_position'   => 20,

        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ],

        'show_in_rest' => true,
    ]);
}
add_action('init', 'lp_advokati_register_service_post_type');

function lp_advokati_register_team_post_type(): void
{
    register_post_type('cea-team', [
        'labels' => [
            'name'          => __('Nas tim', 'lp-advokati'),
            'singular_name' => __('Clan tima', 'lp-advokati'),
        ],

        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,

        'rewrite' => [
            'slug'       => 'tim',
            'with_front' => false,
        ],

        'capability_type' => 'post',
        'has_archive'     => false,
        'hierarchical'    => false,

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],

        'show_in_rest' => true,
    ]);
}
add_action('init', 'lp_advokati_register_team_post_type');