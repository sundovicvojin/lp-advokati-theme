<?php
/**
 * Template Name: Blog
 * Page template - Blog.
 *
 * @package LP_Advokati
 */

get_header();

$paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$blog_query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => (int) get_option('posts_per_page', 9),
    'paged' => $paged,
    'ignore_sticky_posts' => true,
]);
?>
<main class="archive-main archive-main--blog">
    <section class="section archive-hero gsap-section" aria-labelledby="blog-title">
        <!-- <div class="section-heading">
            <div>
                <span class="about-label">
                    <?php esc_html_e('Blog i novosti', 'lp-advokati'); ?>
                </span>
                <h1 id="blog-title">
                    <?php esc_html_e('Blog i pravne novosti', 'lp-advokati'); ?>
                </h1>
            </div>
        </div> -->

        <div class="team-hero-intro">

            <div class="team-hero-intro__box">

                <div class="team-hero-intro__content">

                    <span class="team-hero-intro__label">
                        <?php esc_html_e('L&P Advokati', 'lp-advokati'); ?>
                    </span>

                    <h2 class="team-hero-intro__title">
                        <?php esc_html_e('Pravne analize, saveti i aktuelnosti.', 'lp-advokati'); ?>
                    </h2>

                    <p class="team-hero-intro__text">
                        <?php esc_html_e('Pratite stručne tekstove, pravne novosti i praktične savete iz oblasti privrednog, radnog, građanskog i drugih grana prava.', 'lp-advokati'); ?>
                    </p>

                </div>

            </div>

        </div>
    </section>

    <section class="section expertise archive-listing" aria-label="<?php esc_attr_e('Blog objave', 'lp-advokati'); ?>">
        <?php if ($blog_query->have_posts()): ?>
            <div class="practice-grid archive-card-grid team-card-grid">
                <?php while ($blog_query->have_posts()): ?>
                    <?php
                    $blog_query->the_post();
                    $categories = get_the_category();
                    $category = !empty($categories) ? $categories[0] : null;
                    $excerpt_source = has_excerpt()
                        ? get_the_excerpt()
                        : wp_strip_all_tags(get_the_content());
                    $excerpt = wp_trim_words(wp_strip_all_tags($excerpt_source), 30, '...');
                    ?>
                    <article <?php post_class('archive-card team-card archive-card--post gsap-card'); ?>>
                        <a class="archive-card__media team-card__media" href="<?php the_permalink(); ?>"
                            aria-label="<?php the_title_attribute(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', ['loading' => 'lazy', 'decoding' => 'async']); ?>
                            <?php else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/office.webp'); ?>" width="1000"
                                    height="667" alt="">
                            <?php endif; ?>
                        </a>
                        <div class="archive-card__body">
                            <?php if ($category instanceof WP_Term): ?>
                                <span><?php echo esc_html($category->name); ?></span>
                            <?php else: ?>
                                <span><?php echo esc_html(get_the_date('d.m.Y')); ?></span>
                            <?php endif; ?>
                            <h2 class="archive-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <?php if ('' !== trim($excerpt)): ?>
                                <p><?php echo esc_html($excerpt); ?></p>
                            <?php endif; ?>
                            <a class="button button-primary archive-card__button" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Pročitaj više', 'lp-advokati'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            $pagination = paginate_links([
                'total' => (int) $blog_query->max_num_pages,
                'current' => $paged,
                'mid_size' => 1,
                'prev_text' => __('Prethodna', 'lp-advokati'),
                'next_text' => __('Sledeća', 'lp-advokati'),
            ]);
            ?>
            <?php if ($pagination): ?>
                <nav class="pagination-nav archive-pagination"
                    aria-label="<?php esc_attr_e('Navigacija blog objava', 'lp-advokati'); ?>">
                    <?php echo wp_kses_post($pagination); ?>
                </nav>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <div class="empty-state gsap-card">
                <p class="eyebrow"><?php esc_html_e('Uskoro', 'lp-advokati'); ?></p>
                <h2><?php esc_html_e('Blog objave trenutno nisu dostupne.', 'lp-advokati'); ?></h2>
                <p><?php esc_html_e('Novi tekstovi i pravni uvidi biće objavljeni uskoro.', 'lp-advokati'); ?></p>
            </div>
        <?php endif; ?>
    </section>

    <?php get_template_part('template-parts/cta-contact'); ?>
</main>
<?php
get_footer();
