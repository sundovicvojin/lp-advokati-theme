<?php
/*
Template Name: Kontakt
*/

get_header();
?>

<main class="kontakt-page">

    <section class="kontakt-hero">
        <div class="container">

            <div class="kontakt-hero-content">
                <span class="kontakt-label">
                    LP ADVOKATI
                </span>

                <h1 class="kontakt-title">
                    Kontakt
                </h1>

                <p class="kontakt-subtitle">
                    Stupite u kontakt sa nasim timom za pravnu podrsku, konsultacije i poslovne upite.
                </p>
            </div>

        </div>
    </section>

    <section class="kontakt-content-section">
        <div class="container">

            <div class="kontakt-layout">



                <div class="kontakt-main-content">

                    <div class="kontakt-info">

                        <h2 class="kontakt-info-title">
                            Kontakt informacije
                        </h2>

                        <p class="kontakt-info-text">
                            Za sve poslovne upite, molimo da nas kontaktirate isključivo putem LinkedIn profila naših
                            Managing Partnera:
                        </p>

                        <div class="kontakt-linkedin-links">

                            <a href="https://rs.linkedin.com/in/igor-prsic-494bb3263?trk=people-guest_people_search-card"
                                target="_blank" rel="noopener noreferrer" class="kontakt-linkedin-link">
                                Igor Pršić
                            </a>

                            <a href="https://rs.linkedin.com/in/ana-lazarevic-phd-3b210960" target="_blank"
                                rel="noopener noreferrer" class="kontakt-linkedin-link">
                                dr Ana Lazarević
                            </a>

                        </div>

                    </div>

                    <?php
                    while (have_posts()):
                        the_post();

                        the_content();

                    endwhile;
                    ?>

                </div>

                <aside class="kontakt-sidebar">

                    <div class="kontakt-card">
                        <span class="kontakt-card-label">Adresa</span>

                        <h3>
                            Internacionalnih brigada 69
                        </h3>

                        <p>
                            11000 Beograd, Srbija
                        </p>
                    </div>

                    <div class="kontakt-card">
                        <span class="kontakt-card-label">Telefon</span>

                        <a href="tel:+381113283300">
                            +381 11 328 33 00
                        </a>

                        <a href="tel:+381113283301">
                            +381 11 328 33 01
                        </a>

                        <a href="tel:+381113283717">
                            +381 11 328 37 17
                        </a>
                    </div>

                    <div class="kontakt-card">
                        <span class="kontakt-card-label">Radno vreme</span>

                        <p>
                            Ponedeljak — Petak
                        </p>

                        <strong>
                            09:00 — 17:00
                        </strong>
                    </div>

                </aside>

            </div>

        </div>
    </section>

</main>

<?php
get_footer();