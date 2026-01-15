<?php get_header();

get_template_part('parts/header-menu');

/**
 * Simple reading time estimate (optional).
 */
if ( ! function_exists( 'nikka_reading_time' ) ) {
	function nikka_reading_time( $content = '' ) {
		$text  = wp_strip_all_tags( $content );
		$words = str_word_count( $text );
		$wpm   = 200; // average reading speed
		$mins  = max( 1, (int) ceil( $words / $wpm ) );
		return $mins;
	}
}

?>
<main id="primary" class="page-post">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>

				<header class="post-hero">					
					<div class="post-meta">
						<time class="post-hero__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					</div>
					<h1 class="title-big"><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="post-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="post-cover">
						<?php
							the_post_thumbnail(
								'full',
								[
									'class'   => 'post-cover__image',
									'loading' => 'eager',
								]
							);
						?>
					</figure>
				<?php endif; ?>

				<section class="post-body">
					<div class="post-content">

							<?php the_content(); ?>

							<?php
								wp_link_pages(
									[
										'before' => '<nav class="post-pagination" aria-label="' . esc_attr__( 'Post pages', 'textdomain' ) . '">',
										'after'  => '</nav>',
									]
								);
							?>

					</div>

					<!-- Right: Details + Author -->
					<aside class="post-aside" aria-label="<?php esc_attr_e( 'Post details', 'textdomain' ); ?>">

							<section class="details-card">
								<h2 class="title-small"><?php esc_html_e( 'Details', 'textdomain' ); ?></h2>

								<dl>
									<dt><?php esc_html_e( 'Date', 'textdomain' ); ?></dt>
									<dd>
										<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
											<?php echo esc_html( get_the_date() ); ?>
										</time>
									</dd>

									<dt><?php esc_html_e( 'Category', 'textdomain' ); ?></dt>
									<dd>
										<?php
												$cats = get_the_category();
												if ( $cats ) {
													$out = [];
													foreach ( $cats as $cat ) {
														$out[] = '<a href="' . esc_url( get_category_link( $cat ) ) . '">' . esc_html( $cat->name ) . '</a>';
													}
													echo implode( ', ', $out ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												} else {
													echo esc_html__( 'Uncategorized', 'textdomain' );
												}
											?>
									</dd>
									<dt><?php esc_html_e( 'Reading', 'textdomain' ); ?></dt>
									<dd>
										<?php
											$mins = nikka_reading_time( get_the_content( null, false ) );
											printf(
												/* translators: %s: minutes */
												esc_html__( '%s min', 'textdomain' ),
												esc_html( (string) $mins )
											);
										?>
									</dd>
								</dl>
							</section>

							<?php
              	get_template_part(
	            	'parts/author-card',
	            	null,
	            	[ 'user_id' => (int) get_the_author_meta( 'ID' ) ]
              	);
            	?>

						</aside>

				</section>
			</article>

		<?php endwhile; ?>
	<?php endif; ?>

</main>
<?php get_footer(); ?>
