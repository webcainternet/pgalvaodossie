<?php
the_post();
get_header();
?>

<div class="container">
  <div class="textblock">
    <h1 class="page__title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>
