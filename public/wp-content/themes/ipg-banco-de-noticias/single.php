<?php the_post(); ?>

<?php get_header(); ?>

<div class="container">
  <div class="highlight-img">
    <?php the_post_thumbnail('full_image'); ?>
  </div>

  <div class="textblock">
    <h1 class="page__title"><?php the_title() ?></h1>

    <div class="clearfix">
      <?php the_content(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
