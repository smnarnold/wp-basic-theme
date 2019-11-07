<?php 
/**
 * 	Modèle de la barre latérale (Sidebar).
 *  (N'affiche que si spécifié dans l'admin)
*/

if ( ! dynamic_sidebar( 'sidebar' ) ) : 
	/* Si l'éditeur n'a rien mit dans la barre latérale dans l'admin, affichons le module suivant */ ?>
	<aside>
		<h3>
			<?php _e( 'Archives', 'naked' ); 
			/* Archives - Titre traduisable */  ?>
		</h3>
		<ul>
			<?php 
				wp_get_archives( array( 'type' => 'monthly' ) ); 
				/* Affiche les archives par mois */
			?>
		</ul>
	</aside>
<?php endif; 
 
 // Fermeture de la barre latérale (Sidebar) ?>