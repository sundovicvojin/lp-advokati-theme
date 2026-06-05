<?php
get_header();
?>

<?php while (have_posts()):
    the_post(); ?>

    <main class="single-team-page">

        <section class="single-team-hero section">
            <div class="container">

                <div class="single-team-hero__grid">

                    <div class="single-team-hero__media">

                        <?php if (has_post_thumbnail()): ?>

                            <div class="single-team-hero__image">
                                <?php the_post_thumbnail('full'); ?>
                            </div>

                            <?php
                            $linkedin = get_post_meta(get_the_ID(), 'cea_team_linkedin', true);

                            if ($linkedin):
                                ?>

                                <div class="single-team-socials">

                                    <a
                                        href="<?php echo esc_url($linkedin); ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="single-team-socials__linkedin"
                                    >

                                        <span class="single-team-socials__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M8.34 17V10.67H6.26V17H8.34M7.3 9.8A1.2 1.2 0 1 0 7.3 7.4A1.2 1.2 0 0 0 7.3 9.8M17.74 17V13.53C17.74 11.68 16.75 10.42 14.85 10.42C13.93 10.42 13.31 10.93 13.06 11.41V10.67H11V17H13.06V13.76C13.06 12.9 13.22 12.07 14.29 12.07C15.35 12.07 15.37 13.06 15.37 13.82V17H17.74Z" />
                                            </svg>
                                        </span>

                                        <span class="single-team-socials__text">
                                            LinkedIn profil
                                        </span>

                                    </a>

                                </div>

                            <?php endif; ?>

                        <?php endif; ?>

                    </div>

                    <div class="single-team-hero__content">

                        <span class="single-team-hero__eyebrow">
                            <?php esc_html_e('L&P Advokati', 'lp-advokati'); ?>
                        </span>

                        <h1 class="single-team-hero__title">
                            <?php the_title(); ?>
                        </h1>

                        <?php
                        $position = get_post_meta(get_the_ID(), 'team_position', true);
                        ?>

                        <?php if (!empty($position)): ?>

                            <div class="single-team-hero__position">
                                <?php echo esc_html($position); ?>
                            </div>

                        <?php endif; ?>

                        <div class="single-team-hero__description content-body">
                            <?php the_content(); ?>
                        </div>

                    </div>

                </div>

            </div>
        </section>

        <section class="section feature-band">

            <div>
                <p class="eyebrow">
                    <?php esc_html_e('Kontakt', 'lp-advokati'); ?>
                </p>

                <h2>
                    <?php esc_html_e('Potrebna vam je pravna pomoc?', 'lp-advokati'); ?>
                </h2>
            </div>

            <a class="button button-primary" href="<?php echo esc_url(home_url('/kontakt')); ?>">
                <?php esc_html_e('Zakazite konsultacije', 'lp-advokati'); ?>
            </a>

        </section>

    </main>

<?php endwhile; ?>

<?php
get_footer();
