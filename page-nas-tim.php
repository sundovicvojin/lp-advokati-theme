<?php
/**
 * Template Name: Naš tim
 * Page template - Naš tim.
 *
 * @package LP_Advokati
 */

if (!function_exists('lp_advokati_template_field')) {
    function lp_advokati_template_field(int $post_id, array $keys): string
    {
        foreach ($keys as $key) {
            $value = function_exists('get_field') ? get_field($key, $post_id) : '';

            if ('' === $value || null === $value) {
                $value = get_post_meta($post_id, $key, true);
            }

            if (is_array($value)) {
                $value = $value['url'] ?? $value['title'] ?? '';
            }

            if (is_string($value) && '' !== trim($value)) {
                return trim($value);
            }
        }

        return '';
    }
}

get_header();


$igor = get_page_by_path('igor-prsic', OBJECT, 'cea-team');
$ana  = get_page_by_path('dr-ana-lazarevic', OBJECT, 'cea-team');

$featured_query = new WP_Query([
    'post_type'      => 'cea-team',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'post_name__in'  => ['igor-prsic', 'dr-ana-lazarevic'],
    'orderby'        => 'post_name__in',
]);

$team_query = new WP_Query([
    'post_type'      => 'cea-team',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'post__not_in'   => [
        $igor ? $igor->ID : 0,
        $ana ? $ana->ID : 0,
    ],
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
]);

$social_fields = [
    'linkedin'  => ['label' => __('LinkedIn', 'lp-advokati'), 'keys' => ['linkedin_url', 'linkedin']],
    'email'     => ['label' => __('Email', 'lp-advokati'), 'keys' => ['email', 'email_address']],
    'phone'     => ['label' => __('Telefon', 'lp-advokati'), 'keys' => ['phone', 'telefon']],
    'website'   => ['label' => __('Web', 'lp-advokati'), 'keys' => ['website_url', 'website']],
    'facebook'  => ['label' => __('Facebook', 'lp-advokati'), 'keys' => ['facebook_url', 'facebook']],
    'instagram' => ['label' => __('Instagram', 'lp-advokati'), 'keys' => ['instagram_url', 'instagram']],
];
?>
<main class="archive-main archive-main--team">
    <section class="section archive-hero gsap-section" aria-labelledby="team-title">
        <!-- <div class="section-heading">
            <div>
                <p class="eyebrow"><?php esc_html_e('Naš tim', 'lp-advokati'); ?></p>
                <h1 id="team-title"><?php the_title(); ?></h1>
            </div>
        </div> -->

        <div class="team-hero-intro">

            <div class="team-hero-intro__box">

                <div class="team-hero-intro__content">

                <span class="team-hero-intro__label">
                    <?php esc_html_e('L&P Advokati', 'lp-advokati'); ?>
                </span>

                <h2 class="team-hero-intro__title">
                    <?php esc_html_e('Upoznajte naš tim pravnih eksperata.', 'lp-advokati'); ?>
                </h2>

                <p class="team-hero-intro__text">
                    <?php esc_html_e('Naš tim čine iskusni advokati i pravni savetnici fokusirani na strateški pristup, efikasnu komunikaciju i dugoročnu podršku klijentima.', 'lp-advokati'); ?>
                </p>

            </div>

                </div>

            </div>

        </div>
    </section>

    <section class="section expertise archive-listing" aria-label="<?php esc_attr_e('Članovi tima', 'lp-advokati'); ?>">
        <?php if ($featured_query->have_posts()) : ?>
            <div class="practice-grid archive-card-grid team-card-grid team-card-grid--featured">
                <?php while ($featured_query->have_posts()) : ?>
                    <?php
                    $featured_query->the_post();
                    $post_id     = get_the_ID();
                    $position    = lp_advokati_template_field($post_id, ['position', 'pozicija', 'job_title', 'role']);
                    $description_source = has_excerpt()
                        ? get_the_excerpt()
                        : wp_strip_all_tags(get_the_content());
                    $description = wp_trim_words(wp_strip_all_tags($description_source), 30, '...');
                    ?>
                    <article <?php post_class('archive-card team-card gsap-card'); ?>>
                        <a class="archive-card__media team-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', ['loading' => 'lazy', 'decoding' => 'async']); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/team.webp'); ?>" width="1000" height="687" alt="">
                            <?php endif; ?>
                        </a>
                        <div class="archive-card__body">
                            <?php if ('' !== $position) : ?>
                                <span><?php echo esc_html($position); ?></span>
                            <?php endif; ?>
                            <h2 class="archive-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <?php if ('' !== trim($description)) : ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>

                            <a class="button button-primary archive-card__button" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Pročitaj više', 'lp-advokati'); ?>
                            </a>

                            <div class="team-card__socials" aria-label="<?php esc_attr_e('Društveni i kontakt linkovi', 'lp-advokati'); ?>">
                                <?php foreach ($social_fields as $type => $field) : ?>
                                    <?php
                                    $url = lp_advokati_template_field($post_id, $field['keys']);

                                    if ('' === $url) {
                                        continue;
                                    }

                                    if ('email' === $type && is_email($url)) {
                                        $url = 'mailto:' . $url;
                                    } elseif ('phone' === $type) {
                                        $url = 'tel:' . preg_replace('/[^0-9+]/', '', $url);
                                    }
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" <?php echo in_array($type, ['email', 'phone'], true) ? '' : 'target="_blank" rel="noopener noreferrer"'; ?>>
                                        <?php echo esc_html($field['label']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php if ($team_query->have_posts()) : ?>
            <div class="practice-grid archive-card-grid team-card-grid">
                <?php while ($team_query->have_posts()) : ?>
                    <?php
                    $team_query->the_post();
                    $post_id     = get_the_ID();
                    $position    = lp_advokati_template_field($post_id, ['position', 'pozicija', 'job_title', 'role']);
                    $description_source = has_excerpt()
                        ? get_the_excerpt()
                        : wp_strip_all_tags(get_the_content());
                    $description = wp_trim_words(wp_strip_all_tags($description_source), 30, '...');
                    ?>
                    <article <?php post_class('archive-card team-card gsap-card'); ?>>
                        <a class="archive-card__media team-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', ['loading' => 'lazy', 'decoding' => 'async']); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/team.webp'); ?>" width="1000" height="687" alt="">
                            <?php endif; ?>
                        </a>
                        <div class="archive-card__body">
                            <?php if ('' !== $position) : ?>
                                <span><?php echo esc_html($position); ?></span>
                            <?php endif; ?>
                            <h2 class="archive-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <?php if ('' !== trim($description)) : ?>
                                <p><?php echo esc_html($description); ?></p>
                            <?php endif; ?>

                            <a class="button button-primary archive-card__button" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Pročitaj više', 'lp-advokati'); ?>
                            </a>

                            <div class="team-card__socials" aria-label="<?php esc_attr_e('Društveni i kontakt linkovi', 'lp-advokati'); ?>">
                                <?php foreach ($social_fields as $type => $field) : ?>
                                    <?php
                                    $url = lp_advokati_template_field($post_id, $field['keys']);

                                    if ('' === $url) {
                                        continue;
                                    }

                                    if ('email' === $type && is_email($url)) {
                                        $url = 'mailto:' . $url;
                                    } elseif ('phone' === $type) {
                                        $url = 'tel:' . preg_replace('/[^0-9+]/', '', $url);
                                    }
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" <?php echo in_array($type, ['email', 'phone'], true) ? '' : 'target="_blank" rel="noopener noreferrer"'; ?>>
                                        <?php echo esc_html($field['label']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="empty-state gsap-card">
                <p class="eyebrow"><?php esc_html_e('Uskoro', 'lp-advokati'); ?></p>
                <h2><?php esc_html_e('Članovi tima trenutno nisu dostupni.', 'lp-advokati'); ?></h2>
                <p><?php esc_html_e('Za direktan kontakt sa kancelarijom koristite kontakt podatke na sajtu.', 'lp-advokati'); ?></p>
                <a class="button button-primary" href="<?php echo esc_url(lp_advokati_page_url('kontakt')); ?>">
                    <?php esc_html_e('Kontaktirajte nas', 'lp-advokati'); ?>
                </a>
            </div>
        <?php endif; ?>
    </section>

    <?php get_template_part('template-parts/cta-contact'); ?>
</main>
<?php
get_footer();
