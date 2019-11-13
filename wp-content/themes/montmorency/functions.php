<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonctions personnalisées au besoin
	/*-----------------------------------------------------------------------------------*/

/* Ajoute le support des images de vignettes dans les billets (posts) */
add_theme_support( 'post-thumbnails' );

register_nav_menus(array(
	'main-menu'	=>	__( 'Menu principal', 'Menu principal du site' ), 
	/* Déclare le menu principal
			Dupliquer la ligne ci-dessus si vous désirez créer un autre menu, 
			Vous n'avez qu'à changer le nom 'main-menu' */
));

function create_sidebars() {
	register_sidebar(array(	
		'name' => __( 'Barre laterale principale', 'Barre latérale principale du site' ),
	));
	/* Déclare la barre latérale principale.
		 Dupliquer le bloc ci-dessus si vous désirez créer une autre barre latérale. 
		 Vous n'avez qu'à changer le nom 'Barre laterale principale' et la description 'Barre latérale principale du site' */
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'create_sidebars' );

/* Ajoute les styles et scripts */
function basic_style_and_js()  { 
	/* ajoute d'une feuille de style */
	wp_enqueue_style( 'style.css', get_stylesheet_directory_uri() . '/style.css' );
	/* ajoute d'un fichier javascript */
	wp_enqueue_script( 'main.js', get_template_directory_uri() . '/main.js', array(), false, true );
}

/* Indique que le script doit être appelé */
add_action( 'wp_enqueue_scripts', 'basic_style_and_js' ); 

/*
 * Ajoute un type de post personnalisé
 * Voir https://wpmarmite.com/snippet/creer-custom-post-type/
 */
function create_post_type() {
	/* Différentes dénominations de notre custom post type dans l'admin */
	$labels = array(
		/* Nom au pluriel */
		'name' => _x( 'Superheros', 'Post Type General Name'),
		/* Nom au singulier */
		'singular_name' => _x( 'Superhero', 'Post Type Singular Name'),
		/* Libellé affiché dans le menu */
		'menu_name' => __( 'Superheros'),
		/* Différents libellés de l'administration */
		'all_items' => __( 'Tous les superheros'),
		'view_item' => __( 'Voir les superheros'),
		'add_new_item' => __( 'Ajouter un nouveau superhero'),
		'add_new' => __( 'Ajouter'),
		'edit_item' => __( 'Editer le superhero'),
		'update_item' => __( 'Modifier le superhero'),
		'search_items' => __( 'Rechercher un superhero'),
		'not_found' => __( 'Non trouvé'),
		'not_found_in_trash' => __( 'Non trouvé dans la corbeille'),
	);
	
	// Options supplémentaires pour notre custom post type
	$args = array(
		'labels' => $labels,
		// Options de champs dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical' => false,
		'public' => true,
		'has_archive' => true,
		'rewrite' => array( 'slug' => 'superheros'),
	);
	
	// Enregistrement de notre custom post type nommé "superheros" et de ses arguments
	register_post_type( 'superheros', $args );
}

/* Active nos billets (posts) personnalisés */
add_action( 'init', 'create_post_type' );