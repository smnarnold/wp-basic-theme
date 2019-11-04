<?php
/**
 * The template for displaying any single post.
 */

// Cette fonction appel le fichier header.php
get_header(); 

// Est-ce que nous avons des billets à afficher ?
if ( have_posts() ) : 
	// Si oui, bouclons au travers de ces billets (il n'y en aura logiquement qu'un)
	while ( have_posts() ) : the_post(); 
?>

			<article class="post">
			
				<h1 class="title">
					<?php the_title(); ?>
				</h1>

				<div class="post-meta">
					<?php the_time('d.m.Y'); // Display the time it was published ?>
					<?php the_author(); //  post author ?>
				</div>
				
				<?php the_content(); 
				// This call the main content of the post, the stuff in the main text box while composing.
				// This will wrap everything in p tags
				?>
				
				<?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
				<?php get_template_part( 'partials/metas' ); ?>
			</article>
		<?php endwhile; // OK, let's stop the post loop once we've displayed it ?>
		
		<?php
			// If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>

	<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
		<article class="post error">
			<h1 class="404">Nothing has been posted like that yet</h1>
		</article>
	<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
