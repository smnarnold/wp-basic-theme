<?php
/**
 * Modèle permettant d'afficher un billet (Post).
 */

// Appel le fichier header.php
get_header(); 

// Avons-nous des billets à afficher ?
if ( have_posts() ) : 
	// Si oui, bouclons au travers les billets (logiquement, il n'y en aura qu'un)
	while ( have_posts() ) : the_post(); 
?>

	<article>
		<h2>
			<?php the_title(); 
			/* Titre du billet */ ?>
		</h2>

		<?php if( get_field('imdb_url') ): ?>
			<a href="<?php the_field('imdb_url'); ?>">IMDB</a>
		<?php endif; ?>

		<div class="post-meta">
			<?php the_time('d.m.Y');
			/* Indique quand le billet fut publié
				 https://codex.wordpress.org/fr:Modifier_Date_et_Heure */ ?>
			<?php the_author();
			/* Affiche le username de l'auteur du billet */ ?>
		</div>
		
		<?php the_content(); 
		/* Affiche le contenu principal du billet */ ?>
		
		<?php wp_link_pages(); 
		/* Pagination, si applicable */ ?>

		<?php get_template_part( 'partials/metas' ); 
		// Appel le fichier metas.php dans le dossier partials ?>
	</article>
<?php endwhile; // Fermeture de la boucle ?>
		
<?php
	/* comments_open() valide si nous authorisons les commentaires 
		 '0' != get_comments_number() valide si il y a au moins un commentaire
		 Si l'une des précédentes conditions est vraie, nous affichons le template de commentaires par défaut de Wordpress
	*/ 
	if ( comments_open() || '0' != get_comments_number() ) {
		comments_template( '', true );
	}
?>

<?php else : // Si aucun billet (Post) correspondant n'a été trouvé ?>
	<h2>Oh oh, aucun billet n'a été trouvé</h2>
	<img src="https://media.giphy.com/media/ZYX2ZNBPHmlmfc7Fcj/giphy.gif" alt="Aucun billet trouvé">
<?php endif; 

// Appel le fichier footer.php
get_footer(); ?>
