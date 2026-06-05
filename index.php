<?php
/**
 * Default template.
 *
 * @package LP_Advokati
 */

get_header();
?>
<main class="content-main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article <?php post_class('content-article'); ?>>
                <header class="content-header">
                    <h1><?php the_title(); ?></h1>
                </header>
                <div class="content-body">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>

        <nav class="pagination-nav" aria-label="<?php esc_attr_e('Navigacija objava', 'lp-advokati'); ?>">
            <?php the_posts_pagination(); ?>
        </nav>
    <?php else : ?>
        <article class="content-article">
            <h1><?php esc_html_e('Sadržaj nije pronađen', 'lp-advokati'); ?></h1>
            <p><?php esc_html_e('Tražena stranica trenutno nije dostupna.', 'lp-advokati'); ?></p>
        </article>
    <?php endif; ?>
</main>
<?php
get_footer();
