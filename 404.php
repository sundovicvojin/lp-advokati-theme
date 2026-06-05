

<?php
get_header();
?>

<main class="error-404-page">

    <section class="error-404-section">
        <div class="container">

            <div class="error-404-content">

                <span class="error-404-label">
                    404 ERROR
                </span>

                <h1 class="error-404-title">
                    Stranica nije pronadjena
                </h1>

                <p class="error-404-text">
                    Stranica koju trazite vise ne postoji, premestena je ili URL adresa nije pravilno uneta.
                </p>

                <div class="error-404-actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="primary-btn">
                        Nazad na pocetnu
                    </a>
                </div>

            </div>

        </div>
    </section>

</main>

<?php
get_footer();