<?php
/**
 * Modèle de la page par défaut
 * Ce modèle sera utilisé si Wordpress ne sait pas quel modèle utiliser pour une page
 */

// Cette fonction appel le fichier header.php
get_header(); 

// Est-ce que nous avons des billets qui correspondent à notre requête ?
// Dans le cas de la page d'accueil, les billets les plus récents serons affichés
if ( have_posts() ) : 
	// Si oui, bouclons au travers pour tous les afficher
	while ( have_posts() ) : the_post(); 
?>

	<article class="post">
		<?php the_post_thumbnail('large'); // Lien vers la vignette ?>

		<h2>
			<a href="<?php the_permalink(); // Lien du billet ?>">
				<?php the_title(); // Titre du billet ?>
			</a>
		</h2>

		<div class="post-meta">
			<?php 
				the_time('d/m/Y'); // Date de publication
				if( comments_open() ) : // Indique le nombre de commentaire ainsi qu'un lien pour les voir
					comments_popup_link( __( 'Commentaire', 'break' ), __( '1 Commentaire', 'break' ), __( '% Commentaires', 'break' ) ); 
				?>
			<?php endif; ?>
		</div>
		
		<div class="the-content">
			<?php the_content( 'Continue...' ); 
			// This call the main content of the post, the stuff in the main text box while composing.
			// This will wrap everything in p tags and show a link as 'Continue...' where/if the
			// author inserted a <!-- more --> link in the post body
			?>
			
			<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>

		<?php get_template_part( 'partials/metas' ); ?>
	</article>

<?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts ?>
	
	<!-- pagintation -->
	<?php get_template_part( 'partials/pagination' ); ?>

<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
	<article class="post error">
		<h1 class="404">Il n'y a aucun billet</h1>
	</article>
<?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) 

// Cette fonction appel le fichier footer.php
get_footer(); 
?>