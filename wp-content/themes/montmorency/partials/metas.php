<div class="meta">
  <?php echo get_the_category_list(); 
  /* Affiche sous forme de liens les catégories auquel ce billet appartient */ ?>

  <?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); 
  /* Affiche les tags associés à ce billet séparés par des espaces (&nbsp;) et un | */ ?>
</div>