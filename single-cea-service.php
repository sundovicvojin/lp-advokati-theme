<?php
/**
 * Single post template.
 *
 * @package LP_Advokati
 */

get_header(); ?>

<main class="content-main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article class="content-article">

                <header class="content-header">
                    <p class="eyebrow">
                        Oblasti rada
                    </p>

                    <h1><?php the_title(); ?></h1>
                </header>

                <div class="content-body">
                    <?php the_content(); ?>
                </div>

            </article>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>