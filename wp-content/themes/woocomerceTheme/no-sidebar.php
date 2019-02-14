<?php
/**
 * Template Name: Полная ширина
 */

get_header(); ?>
					<?php

					while ( have_posts() ) : the_post();
						if ( is_order_received_page() ) :
							?>
							<div class="row">
							<div class="col-md-6 col-md-offset-3">
						<?php endif; ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php

								the_content();
								?>
							</div><!-- .entry-content -->

						</article><!-- #post-<?php the_ID(); ?> -->
						<?php

						if ( is_order_received_page() ) :
							?>
							</div></div>
						<?php endif;
					endwhile; // End of the loop.
					?>
<?php

get_footer();
