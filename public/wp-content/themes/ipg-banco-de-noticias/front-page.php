<?php
get_header();

$Parsedown = new Parsedown();

$destaque = $Parsedown->text(get_option('_ipg_home_destaque', ''));
$conteudo = $Parsedown->text(get_option('_ipg_home_conteudo', ''));
$button_text = get_option('_ipg_home_botao', '');
$button_link = get_option('_ipg_home_link_button', '');

$link_video = get_option('_ipg_home_link_video', '');

$link_video = wp_oembed_get($link_video);
?>

<div class="js-full-page-no-header full-page fp-box vertical-align">

  <div class="container vertical-align__child">
    <div class="row">
      <div class="col-sm-5 content-video">
        <?php echo $link_video; ?>
      </div>
      <div class="col-sm-7 content-text">
        <h2 class="fp-box__title"><?php echo $destaque ?></h2>
        <div class="fp-box__info"><?php echo $conteudo ?><a class="link" href="<?php echo $button_link ?>"><?php echo $button_text ?></a></div>
      </div>
    </div>


    <!-- <form class="fp-box__form" action="index.html" method="post" accept-charset="utf-8">
      <input class="fp-box__input" type="text" name="name" placeholder="Insira aqui o que deseja buscar">
      <button class="fp-box__button" type="submit" name="button"><span><?php echo esc_attr_x( 'Buscar', 'submit button' ); ?></span></button>
    </form> -->

    <div class="fp--box__search">
      <?php get_search_form(); ?>
    </div>

  </div>
</div>


<?php get_footer(); ?>
