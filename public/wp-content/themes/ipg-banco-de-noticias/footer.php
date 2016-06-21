<?php

global $page_has_highlights;

$jquery_cdn_url = 'https://ajax.googleapis.com/ajax/libs/jquery/';
$jquery_cdn_url .= JQUERY_VERSION;
$jquery_cdn_url .= '/jquery.min.js';

$jquery_js_name = (ENV == 'production') ? 'jquery.min.js' : 'jquery.js';
$jquery_js_url = get_bloginfo('template_url');
$jquery_js_url .= '/public/js/' . $jquery_js_name;

$footer_menu_args = array(
  'theme_location' => 'footer_menu'
);
?>

        <footer class="footer">
          <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                  <span class="footer__text">Realização</span>
                  <a class="footer__brand" href="http://www.agenciapatriciagalvao.org.br/" target="_blank">
                    <img class="footer__brand-image footer__brand-image--ipg" src="<?php echo get_template_directory_uri(); ?>/public/images/ipg.jpg" alt="" />
                  </a>
                </div>
                <div class="col-xs-12 col-sm-7">
                  <span class="footer__text">Apoio</span>

                  <div class="col-xs-4">
                    <a class="footer__support-brand" href="http://www.fundosocialelas.org/falesemmedo/" target="_blank">
                      <img class="footer__brand-image" src="<?php echo get_template_directory_uri(); ?>/public/images/fale-sem-medo.jpg" alt="" />
                    </a>
                  </div>

                  <div class="col-xs-4">
                    <a class="footer__support-brand" href="http://www.fundosocialelas.org/" target="_blank">
                      <img class="footer__brand-image" src="<?php echo get_template_directory_uri(); ?>/public/images/elas.jpg" alt="" />
                    </a>
                  </div>

                  <div class="col-xs-4">
                    <a class="footer__support-brand" href="https://www.facebook.com/institutoavon" target="_blank">
                      <img class="footer__brand-image" src="<?php echo get_template_directory_uri(); ?>/public/images/avon.jpg" alt="" />
                    </a>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-2">
                  <span class="footer__text">Desenvolvimento</span>
                  <div class="col-xs-12">
                    <a class="footer__support-brand" href="http://42i.com.br" target="_blank">
                      <span class="footer__brand-image footer__brand-image--42i"><?php ipg_get_svg('42i'); ?></span>
                    </a>
                  </div>
                </div>
            </div>

            <div class="footer__menu">
              <?php wp_nav_menu($footer_menu_args); ?>
            </div>

            <span class="footer__text footer__text--copyright">© Instituto Patrícia Galvão</span>

          </div>
        </footer>

      </div>
    </div>

    <?php if (isset($page_has_highlights) && $page_has_highlights === true): ?>
      <?php ipg_get_partial('highlights-mobile'); ?>
    <?php endif; ?>

    <script src="<?php echo $jquery_cdn_url; ?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $jquery_js_url; ?>"><\/script>')</script>

    <?php wp_footer(); ?>
  </body>
</html>
