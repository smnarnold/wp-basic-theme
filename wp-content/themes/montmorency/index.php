<?php
/**
 * Modèle générique au cas où Wordpress ne trouve pas un modèle
 * À utiliser comme fallback seulement.
 */

// Cette fonction appel le fichier header.php
get_header(); 

// Est-ce que nous avons des pages/billets qui correspondent à notre requête ?
// Dans le cas de la page d'accueil, les billets les plus récents serons affichés
if ( have_posts() ) : 
	// Si oui, bouclons au travers pour tous les afficher
	while ( have_posts() ) : the_post(); 
?>

	<article>
		<?php the_post_thumbnail('large'); // Vignette large du billet ?>

		<h2>
			<a href="<?php the_permalink(); // Lien du billet ?>">
				<?php the_title(); // Titre du billet ?>
			</a>
		</h2>

		<?php 
			the_time('d/m/Y'); // Date de publication

			if( comments_open() ) : // Si les commentaire son permis
				// Indique le nombre de commentaires, ainsi qu'un lien pour les voir
				comments_popup_link( __( 'Commentaire', 'break' ), __( '1 Commentaire', 'break' ), __( '% Commentaires', 'break' ) ); 
			?>
		<?php endif; ?>

		<?php the_content('Continue...'); 
		/* Affiche le contenu principal de la page 
			 'Continue...' sera affiché sous forme de lien pour tronquer le contenu du billet/page 
			 si l'admin à inscrit un commentaire <!-- more --> dans son contenu.
		*/ ?>
							
		<?php wp_link_pages(); 
		/* Pagination, si applicable */ ?>

		<?php get_template_part( 'partials/metas' ); ?>
	</article>

<?php endwhile; // Fermeture de la boucle ?>
	
<?php get_template_part( 'partials/pagination' ); 
/* Pagination vers le billet précédent et suivant */?>

<?php else : // Si aucune page/billet correspondant n'a été trouvé ?>
	<h2>Oh oh, désolé la requête demandé n'a pas été trouvée</h2>
	<img src="https://media.giphy.com/media/3HLMNi9U0yb4CDldVO/giphy.gif" alt="Non trouvée">
<?php endif; 

// Appel le fichier footer.php
get_footer(); ?>