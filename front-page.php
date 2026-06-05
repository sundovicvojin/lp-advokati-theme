<?php
/**
 * Front page template.
 *
 * @package LP_Advokati
 */

get_header();
?>
<main id="top">
    <section class="hero" aria-labelledby="hero-title">
        <picture class="hero-media">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/hero.webp'); ?>"
                width="1920"
                height="1280"
                alt="<?php esc_attr_e('Tim advokatske kancelarije LP Advokati', 'lp-advokati'); ?>"
                fetchpriority="high"
                decoding="async"
            >
        </picture>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="eyebrow"><?php esc_html_e('LP advokati | L&P Advokati', 'lp-advokati'); ?></p>
            <h1 id="hero-title"><?php esc_html_e('Advokatska kancelarija po meri lidera na srpskom tržištu.', 'lp-advokati'); ?></h1>
            <p class="hero-copy">
                <?php esc_html_e('Više od 20 godina kvaliteta i pouzdanosti. Renomirani u oblasti privrednog, imovinskog i radnog prava.', 'lp-advokati'); ?>
            </p>
            <div class="hero-actions">
                <a class="button button-primary" href="<?php echo esc_url(lp_advokati_page_url('usluge')); ?>"><?php esc_html_e('Oblasti našeg rada', 'lp-advokati'); ?></a>
                <a class="button button-secondary" href="<?php echo esc_url(lp_advokati_page_url('kontakt')); ?>"><?php esc_html_e('Kontaktirajte nas', 'lp-advokati'); ?></a>
            </div>
        </div>
    </section>

    <section class="trust-strip" aria-label="<?php esc_attr_e('Ključni podaci', 'lp-advokati'); ?>">
        <div>
            <strong>20+</strong>
            <span><?php esc_html_e('godina', 'lp-advokati'); ?></span>
        </div>
        <div>
            <strong>15+</strong>
            <span><?php esc_html_e('advokata', 'lp-advokati'); ?></span>
        </div>
        <div>
            <strong>12+</strong>
            <span><?php esc_html_e('privrednih oblasti', 'lp-advokati'); ?></span>
        </div>
        <div>
            <strong>200+</strong>
            <span><?php esc_html_e('klijenata', 'lp-advokati'); ?></span>
        </div>
    </section>

    <section class="section intro" id="o-nama">
        <div class="section-text">
            <p class="eyebrow"><?php esc_html_e('Osnovano 2005.', 'lp-advokati'); ?></p>
            <h2><?php esc_html_e('Advokatsko ortačko društvo Lazarević & Pršić advokati', 'lp-advokati'); ?></h2>
            <p>
                <?php esc_html_e('Naše advokatsko ortačko društvo se ističe kao lider u Srbiji u oblastima privrednog, imovinskog i radnog prava. Orijentisano prema korporativnim klijentima, ovo društvo kombinuje visoku profesionalnost i konstantnu podršku sa proaktivnim i kreativnim pristupima rešavanju problema, posebno u turbulentnom tržištu sa čestim promenama pravnih propisa.', 'lp-advokati'); ?>
            </p>
        </div>
        <div class="intro-panel" aria-label="<?php esc_attr_e('Način rada', 'lp-advokati'); ?>">
            <div>
                <span><?php esc_html_e('Pravi izbor', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Stručnost kojoj verujete', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Profesionalizam, odgovornost i proaktivnost u svakodnevnoj podršci klijentima.', 'lp-advokati'); ?></p>
            </div>
            <div>
                <span><?php esc_html_e('Naša dostignuća', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Ponosni na velike uspehe koji su za nama', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Kreativno i proaktivno pristupanje problemima nas je dovelo do sjajnih rezultata.', 'lp-advokati'); ?></p>
            </div>
            <div>
                <span><?php esc_html_e('Podstrek za budućnost', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Pomeramo granice u brizi o klijentima', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Ovo je samo podstrek da u budućnosti pomeramo granice u brizi o svojim klijentima.', 'lp-advokati'); ?></p>
            </div>
        </div>
    </section>

    <section class="section expertise" id="oblasti">
        <div class="section-heading">
            <div>
                <p class="eyebrow"><?php esc_html_e('Sfere rada', 'lp-advokati'); ?></p>
                <h2><?php esc_html_e('Oblasti pravne ekspertize', 'lp-advokati'); ?></h2>
            </div>
        </div>
        <div class="practice-grid">
            <article>
                <span><?php esc_html_e('Pročitaj više', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Korporativno i trgovinsko pravo', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Korporativno i trgovinsko pravo. Znamo da posao nije završen okončanjem postupka.', 'lp-advokati'); ?></p>
            </article>
            <article>
                <span><?php esc_html_e('Pročitaj više', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Osnivanje udruženja', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('U savremenom društvu sloboda udruživanja je fundamentalno ljudsko pravo.', 'lp-advokati'); ?></p>
            </article>
            <article>
                <span><?php esc_html_e('Pročitaj više', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Likvidacija privrednog društva', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('U privrednom životu ponekad nastane potreba za sprovođenjem likvidacije.', 'lp-advokati'); ?></p>
            </article>
            <article>
                <span><?php esc_html_e('Pročitaj više', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Zaštita žiga', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Pojam i funkcije žiga. Zaštićeni znak kojim se obeležava roba ili usluga.', 'lp-advokati'); ?></p>
            </article>
            <article>
                <span><?php esc_html_e('Pročitaj više', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Promena pravne forme', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Kako firma raste ili se menja, prelazak u drugi oblik može biti potreban korak.', 'lp-advokati'); ?></p>
            </article>
            <article>
                <span><?php esc_html_e('Pročitaj više', 'lp-advokati'); ?></span>
                <h3><?php esc_html_e('Privredno, imovinsko i radno pravo', 'lp-advokati'); ?></h3>
                <p><?php esc_html_e('Renomirani u oblastima koje su ključne za stabilno poslovanje i rast klijenata.', 'lp-advokati'); ?></p>
            </article>
        </div>
    </section>

    <section class="feature-band">
        <div>
            <p class="eyebrow"><?php esc_html_e('Budite sigurni u svoje odluke', 'lp-advokati'); ?></p>
            <h2><?php esc_html_e('Nemojte dozvoliti da pravne prepreke uspore vaš poslovni rast.', 'lp-advokati'); ?></h2>
        </div>
        <a class="button button-primary" href="<?php echo esc_url(lp_advokati_page_url('kontakt')); ?>"><?php esc_html_e('Kontaktirajte nas', 'lp-advokati'); ?></a>
    </section>

    <section class="section team" id="tim">
        <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/team.webp'); ?>"
            width="1000"
            height="687"
            alt="<?php esc_attr_e('LP advokatski tim u kancelariji', 'lp-advokati'); ?>"
            loading="lazy"
            decoding="async"
        >
        <div class="section-text">
            <p class="eyebrow"><?php esc_html_e('Potrebna Vam je pravna pomoć?', 'lp-advokati'); ?></p>
            <h2><?php esc_html_e('Naš advokatski tim Vam je na raspolaganju.', 'lp-advokati'); ?></h2>
            <p>
                <?php esc_html_e('Pravni servis orijentisan ka korporativnim klijentima. Profesionalizam. Odgovornost. Proaktivnost.', 'lp-advokati'); ?>
            </p>
            <a class="text-link" href="<?php echo esc_url(lp_advokati_page_url('kontakt')); ?>"><?php esc_html_e('Kontaktirajte nas', 'lp-advokati'); ?></a>
        </div>
    </section>

    <section class="section contact" id="kontakt">
        <div class="contact-copy">
            <p class="eyebrow"><?php esc_html_e('Kontakt informacije', 'lp-advokati'); ?></p>
            <h2><?php esc_html_e('Naša adresa', 'lp-advokati'); ?></h2>
            <p><?php esc_html_e('Internacionalnih brigada 69, Beograd 11000, Srbija.', 'lp-advokati'); ?></p>
        </div>
        <div class="contact-details">
            <a href="tel:+381113283300">+381 11 328 33 00</a>
            <a href="tel:+381113283301">+381 11 328 33 01</a>
            <span><?php esc_html_e('Internacionalnih brigada 69, Beograd', 'lp-advokati'); ?></span>
        </div>
    </section>
</main>
<?php
get_footer();
