<?php
/**
 * Shared CTA and contact section for inner pages.
 *
 * @package LP_Advokati
 */
?>
<section class="feature-band feature-band--inner">
    <div>
        <p class="eyebrow"><?php esc_html_e('Budite sigurni u svoje odluke', 'lp-advokati'); ?></p>
        <h2><?php esc_html_e('Nemojte dozvoliti da pravne prepreke uspore vaš poslovni rast.', 'lp-advokati'); ?></h2>
    </div>
    <a class="button button-primary" href="<?php echo esc_url(lp_advokati_page_url('kontakt')); ?>"><?php esc_html_e('Kontaktirajte nas', 'lp-advokati'); ?></a>
</section>

<section class="section contact contact--inner" id="kontakt">
    <div class="contact-copy">
        <p class="eyebrow"><?php esc_html_e('Kontakt informacije', 'lp-advokati'); ?></p>
        <h2><?php esc_html_e('Naša adresa', 'lp-advokati'); ?></h2>
        <p><?php esc_html_e('Internacionalnih brigada 69, Beograd 11000, Srbija.', 'lp-advokati'); ?></p>
    </div>
    <div class="contact-details">
        <a href="mailto:office@lp.rs">office@lp.rs</a>
        <a href="tel:+381113283300">+381 11 328 33 00</a>
        <a href="tel:+381113283301">+381 11 328 33 01</a>
        <span><?php esc_html_e('Internacionalnih brigada 69, Beograd', 'lp-advokati'); ?></span>
    </div>
</section>
