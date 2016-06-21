<?php

$data_page = get_search_query();

get_header();

$Parsedown = new Parsedown();

$titulo = get_option('_ipg_busca_titulo', '');
$conteudo = $Parsedown->text(get_option('_ipg_busca_conteudo', ''));
$imagem = get_option('_ipg_busca_imagem', '');

?>

<div class="container">
  <?php if (!have_posts()): ?>
    <h1 class="page__title"><?php echo $titulo ?></h1>

    <?php if ($imagem != ''): ?>
      <img src="<?php echo $imagem; ?>">
    <?php endif; ?>

    <div class="textblock">
      <?php echo $conteudo ?>
    </div>
  <?php else: ?>
    <h1 class="page__title page__title--search">Resultado da busca para: <span class="page__title--searched"><?php echo $data_page ?></span></h1>

    <div class="filters">
      <?php ipg_get_partial('archive-filters'); ?>
    </div>

    <ul class="search-result__list">
      <?php while (have_posts()): the_post();  ?>
        <?php
          $type = get_post_type();
        ?>
        <?php if ($type == 'pesquisas'): ?>
          <?php ipg_get_partial('search-result-pesquisas'); ?>
        <?php elseif ($type == 'fontes'): ?>
          <?php ipg_get_partial('search-result-fontes'); ?>
        <?php elseif ($type == 'violencias'): ?>
          <?php ipg_get_partial('search-result-violencias'); ?>
        <?php else: ?>
          <?php ipg_get_partial('search-result-generico'); ?>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </ul>
  <?php endif; ?>

  <?php ipg_get_partial('pagination', array(
    'base_url' => get_bloginfo('url')
  )); ?>
</div>

<?php get_footer(); ?>
