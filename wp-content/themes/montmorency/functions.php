<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonction personnalisées au besoin
	/*-----------------------------------------------------------------------------------*/

/* Ajoute le support des images de vignettes dans les billets (posts) */
add_theme_support( 'post-thumbnails' );

/* Défini le menu princiapl de Wordpress */
register_nav_menus( 
	array(
		'main-nav'	=>	__( 'Menu principal', 'montmorency' ), // Déclare le menu princiapl
		// Copiez et collez la ligne ci-dessus juste ici si vous voulez créer un autre menu, 
		// Vous n'avez qu'à changer le nom 'primary'
	)
);

/* Active la barre latérale de Wordpress */
function montmorency_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'montmorency_register_sidebars' );

/* Ajoute les styles et scripts */
function basic_style_and_js()  { 
	/* ajoute d'une feuille de style */
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	//* ajoute d'un fichier javascript */
	wp_enqueue_script( 'main', get_template_directory_uri() . '/main.js', array(), false, true );
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