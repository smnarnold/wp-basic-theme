<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonction personnalisés au besoin
	/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Ajoute le support des images de vignettes dans les billets (posts)
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Défini le menu princiapl de Wordpress
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'main-nav'	=>	__( 'Menu principal', 'montmorency' ), // Déclare le menu princiapl
		// Copiez et collez la ligne ci-dessus juste ici si vous voulez créer un autre menu, 
		// Vous n'avez qu'à changer le nom 'primary'
	)
);

/*-----------------------------------------------------------------------------------*/
/* Active la barre latérale de Wordpress
/*-----------------------------------------------------------------------------------*/
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

/*-----------------------------------------------------------------------------------*/
/* Ajoute les styles et scripts
/*-----------------------------------------------------------------------------------*/
function montmorency_scripts()  { 
	// ajoute d'une feuille de style
	wp_enqueue_style('main.css', get_stylesheet_directory_uri() . '/main.css');
	// ajoute d'un fichier javascript
	wp_enqueue_script( 'main', get_template_directory_uri() . '/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'montmorency_scripts' ); // Indique que le script doit être appelé
