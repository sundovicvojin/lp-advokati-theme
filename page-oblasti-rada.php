<?php
/**
 * Template Name: Oblasti rada
 * Page template - Oblasti rada.
 *
 * @package LP_Advokati
 */

get_header();

$paged = max(1, get_query_var('paged'));

$practice_query = new WP_Query([
    'post_type'      => 'cea-service',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
]);
?>
<main class="practice-areas-page">

    <section class="practice-areas-hero">
        <div class="container">

            <div class="practice-areas-header">
                <span class="practice-areas-label">
                    <?php esc_html_e('Oblasti rada', 'lp-advokati'); ?>
                </span>

                <h1 class="practice-areas-title">
                    <?php the_title(); ?>
                </h1>

                <p class="practice-areas-subtitle">
                    <?php esc_html_e('Pravna ekspertiza prilagodjena savremenim poslovnim i privatnim izazovima.', 'lp-advokati'); ?>
                </p>
            </div>

        </div>
    </section>

    <section class="practice-areas-section">
        <div class="container">

            <?php if ($practice_query->have_posts()) : ?>

                <div class="practice-areas-grid">

                    <?php while ($practice_query->have_posts()) : ?>

                        <?php
                        $practice_query->the_post();

                        $excerpt_source = has_excerpt()
                            ? get_the_excerpt()
                            : wp_strip_all_tags(get_the_content());

                        $excerpt = wp_trim_words(
                            wp_strip_all_tags($excerpt_source),
                            20,
                            '...'
                        );
                        ?>

                        <article <?php post_class('practice-area-card'); ?>>

                            <a class="practice-area-card__link" href="<?php the_permalink(); ?>">

                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="practice-area-card__image-wrapper">
                                        <?php the_post_thumbnail('large', [
                                            'class'    => 'practice-area-card__image',
                                            'loading'  => 'lazy',
                                            'decoding' => 'async',
                                        ]); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="practice-area-card__content">

                                    <span class="practice-area-card__tag">
                                        <?php esc_html_e('Procitaj vise', 'lp-advokati'); ?>
                                    </span>

                                    <h2 class="practice-area-card__title">
                                        <?php the_title(); ?>
                                    </h2>

                                    <?php if ('' !== trim($excerpt)) : ?>
                                        <div class="practice-area-card__excerpt">
                                            <p><?php echo esc_html($excerpt); ?></p>
                                        </div>
                                    <?php endif; ?>

                                </div>

                            </a>

                        </article>

                    <?php endwhile; ?>

                </div>

                <?php if ($practice_query->max_num_pages > 1) : ?>

                    <nav class="archive-pagination" style="margin-top: 2rem;" aria-label="Pagination">
                        <?php
                        echo paginate_links([
                            'total'   => $practice_query->max_num_pages,
                            'current' => $paged,
                            'mid_size' => 1,
                            'prev_text' => '&larr;',
                            'next_text' => '&rarr;',
                        ]);
                        ?>
                    </nav>

                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>

                <div class="empty-state">
                    <p class="practice-areas-label">
                        <?php esc_html_e('Uskoro', 'lp-advokati'); ?>
                    </p>

                    <h2>
                        <?php esc_html_e('Oblasti rada trenutno nisu dostupne.', 'lp-advokati'); ?>
                    </h2>
                </div>

            <?php endif; ?>

        </div>
    </section>

    <section class="section feature-band">

        <div>
            <p class="eyebrow">
                <?php esc_html_e('Budite sigurni u svoje odluke', 'lp-advokati'); ?>
            </p>

            <h2>
                <?php esc_html_e('Nemojte dozvoliti da pravne prepreke uspore vas poslovni rast.', 'lp-advokati'); ?>
            </h2>
        </div>

        <a class="button button-primary" href="<?php echo esc_url(home_url('/kontakt')); ?>">
            <?php esc_html_e('Kontaktirajte nas', 'lp-advokati'); ?>
        </a>

    </section>

</main>
<?php
get_footer();
