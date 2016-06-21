<?php

the_post();
$post_id = get_the_ID();

get_header();

$cf_tipos = explode(",", get_post_meta($post_id, '_cf_tipos', true));

$args = array(
    'post__in' => $cf_tipos,
    'post_type' => 'violencias',
    'posts_per_page' => -1
);

$link = get_post_meta($post_id, '_cf_link', true);

$query = new WP_Query($args);

$actual_page = 'pesquisas';
$separator = '';

$instituicao = array(
  'page' => $actual_page,
  'title' => 'Instituição/Orgão',
  'separator' => $separator,
  'taxonomy' => 'instituicao',
  'param' => 'iis'
);

$ambito = array(
  'page' => $actual_page,
  'title' => 'Âmbito',
  'separator' => $separator,
  'taxonomy' => 'ambito',
  'param' => 'iam'
);

$ano = array(
  'page' => $actual_page,
  'title' => 'Ano',
  'separator' => $separator,
  'taxonomy' => 'ano',
  'param' => 'ian'
);

?>

<div class="container">
  <?php ipg_get_partial('social-media'); ?>

  <div class="page--result__box">
    <div class="row">
      <div class="col-sm-4">
        <div class="page--result__image">
          <?php the_post_thumbnail('full_image'); ?>
        </div>
      </div>
      <div class="col-sm-8">
        <h1 class="page--result__title"><?php the_title(); ?></h1>

        <span class="page--result__info">
          <?php ipg_the_link_term($instituicao); ?>
        </span>

        <span class="page--result__info"><?php ipg_the_link_term($ambito); ?></span>

        <span class="page--result__info">
          <?php ipg_the_link_term($ano); ?>
        </span>
      </div>
    </div>

    <div class="textblock">
      <?php the_content(); ?>

      <a class="page__button page__button--download-pdf" href="<?php echo $link; ?>" target="_blank">Faça o Download da pesquisa completa</a>
    </div>

    <ul class="page--result__topics-list">
      <span class="page--result__topics-title">Temas</span>

      <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();  ?>
        <li class="page--result__topics-item">
          <a class="page--result__topics-link page--result__topics-link--<?php echo $post->post_name; ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </li>
        <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>
    </ul>
  </div>
</div>

<?php ipg_get_partial('highlights-whole'); ?>
<a class="mobile-menu__text--arrow go-to-top js-go-to-top" href="#"><span class="icon icon-arrow-up"></span></a>
<?php get_footer(); ?>
