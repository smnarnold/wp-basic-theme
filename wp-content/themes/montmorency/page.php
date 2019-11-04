<?php
/**
 * The template for displaying any single page.
 */

// Cette fonction appel le fichier header.php
get_header(); 

// Est-ce que nous avons des pages/billets à afficher ?
if ( have_posts() ) : 
	// Si oui, bouclons au travers
	while ( have_posts() ) : the_post(); 
?>

					<article class="post">
					
						<h1 class="title"><?php the_title(); // Display the title of the page ?></h1>
						
						<div class="the-content">
							<?php the_content(); 
							// This call the main content of the page, the stuff in the main text box while composing.
							// This will wrap everything in p tags
							?>
							
							<?php wp_link_pages(); // This will display pagination links, if applicable to the page ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; // OK, let's stop the page loop once we've displayed it ?>

			<?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>
			<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>