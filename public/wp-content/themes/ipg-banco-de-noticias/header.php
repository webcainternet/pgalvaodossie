<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/favicon-32x32.png">

  <link rel="apple-touch-icon-precomposed" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/favicon-32x32.png">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/favicon-32x32.png">
  <link rel="icon" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/favicon-32x32.png" sizes="32x32">
  <link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/favicon.ico" />
  <link rel="icon" sizes="16x16 32x32" href="<?php echo bloginfo('template_url'); ?>/public/images/raw/favicon/favicon.ico">

  <title><?php wp_title('|'); ?></title>

  <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ 'Lato:400,300italic,400italic,900italic:latin', 'Montserrat:700:latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  </script>

  <?php wp_head(); ?>

  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-45202455-1']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>

<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=<?php echo FB_APP_ID; ?>";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div class="main-content">
    <header class="header">
      <div class="container">
        <a class="header__mobile-toggle js-toggle-menu" data-key="header-menu" href="#"><span class="icon icon-menu5"></span></a>

        <a class="header__brand" href="<?php echo home_url(); ?>">
            <?php ipg_get_svg('selo_2'); ?>
        </a>

        <div class="header__menu" data-key="header-menu">
          <?php
            $header_menu_args = array(
              'theme_location' => 'header_menu'
            );
            wp_nav_menu($header_menu_args);
          ?>

          <div class="header__menu-mobile">
            <?php
              $mobile_menu_args = array(
                'theme_location' => 'mobile_menu'
              );
              wp_nav_menu($mobile_menu_args);
            ?>
          </div>
        </div>

        <a class="header__search js-toggle-search" href="#">
          <span class="icon icon-search2"></span>
          <span class="icon icon-svg-close"><?php ipg_get_svg('close'); ?></span>
        </a>
      </div>

      <div class="header__cover js-full-page">
        <div class="header__cover-form">
          <div class="container">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </header>

    <div class="page-wrapper js-padding-top">
