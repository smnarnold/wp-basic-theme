<div class="avengers-grid">
  <?php
    $superheros = new WP_Query('post_type=Superheros');
    while ($superheros->have_posts()) : $superheros->the_post(); ?>

    <div class="hero">
      <?php if (has_post_thumbnail( $superheros->ID ) ): ?>
        <div class="picture">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php endif; ?>

      <?php if( get_field('citation') ): ?>
        <blockquote class="quote"><?php the_field('citation'); ?></blockquote>
      <?php endif; ?>

      <div class="description"><?php echo get_the_content(); ?></div>
    </div>
  <?php endwhile; wp_reset_postdata(); ?>
</div>