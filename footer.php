<?php
/**
 * Site footer.
 *
 * @package LP_Advokati
 */
?>
<footer class="footer">

    <div class="footer__top">

        <div class="footer__box footer__about">
            <h3><?php esc_html_e('O nama', 'lp-advokati'); ?></h3>
            <p><?php esc_html_e('Pravna podrška za privredna društva, preduzetnike i fizička lica.', 'lp-advokati'); ?></p>
        </div>

        <div class="footer__box footer__contact">
            <h3><?php esc_html_e('Kontakt', 'lp-advokati'); ?></h3>
            <p><a href="mailto:office@lp.rs">office@lp.rs</a></p>
            <p>Pon - Pet: 09:00 - 17:00</p>
        </div>

        <div class="footer__box footer__navigation">
            <h3><?php esc_html_e('Navigacija', 'lp-advokati'); ?></h3>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Početna</a></li>
                <li><a href="<?php echo esc_url(home_url('/o-nama')); ?>">O nama</a></li>
                <li><a href="<?php echo esc_url(home_url('/nas-tim')); ?>">Naš tim</a></li>
                <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
            </ul>
        </div>

        <div class="footer__box footer__location">
            <h3><?php esc_html_e('Lokacija', 'lp-advokati'); ?></h3>
            <p>Internacionalnih brigada 69</p>
            <p>Beograd, Srbija</p>
        </div>

    </div>

    <div class="footer__bottom">
        <p>&copy; <?php echo esc_html(gmdate('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Sva prava zadržana.', 'lp-advokati'); ?></p>
        <p>Created by <a href="https://www.instagram.com/devbyvojin/" target="_blank">@devbyvojin</a></p>
    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>
