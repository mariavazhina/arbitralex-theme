<?php
/**
 * Category archive template
 * File: category.php
 */

get_header();
get_template_part('parts/header-menu');

/**
 * Reading time (optional helper).
 */
if ( ! function_exists( 'nikka_reading_time' ) ) {
	function nikka_reading_time( $content = '' ) : int {
		$text  = wp_strip_all_tags( $content );
		$words = str_word_count( $text );
		$wpm   = 200;
		return max( 1, (int) ceil( $words / $wpm ) );
	}
}

/**
 * Show all posts on one page (no pagination).
 * This affects only this request. If you prefer, do it via pre_get_posts in functions.php.
 */
global $wp_query;
$query_obj = get_queried_object();

$args = [
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'cat'            => isset( $query_obj->term_id ) ? (int) $query_obj->term_id : 0,
	'orderby'        => 'date',
	'order'          => 'DESC',
];

$all_posts = new WP_Query( $args );
?>

<main id="primary" class="page-blog">

	<header class="blog-header">
		<h1 class="blog-title">
			<?php single_cat_title(); ?>
		</h1>
		<hr class="hr-short">

		<?php
		$cat_desc = category_description();
		if ( $cat_desc ) :
			?>
			<p class="blog-description">
				<?php echo wp_kses_post( $cat_desc ); ?>
		</p>
		<?php endif; ?>
	</header>

	<?php if ( $all_posts->have_posts() ) : ?>
		<section class="posts-list" aria-label="<?php esc_attr_e( 'Posts list', 'textdomain' ); ?>">

			<?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="post-card__media">
							<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
								<?php the_post_thumbnail( 'large', [ 'class' => 'post-card__image', 'loading' => 'lazy' ] ); ?>
							</a>
						</figure>
					<?php endif; ?>

					<div>

						<header>
							<h2 class="title-mid">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
						</header>

						<div class="post-meta">
							<time class="post-date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
							  <?php echo esc_html( get_the_date() ); ?>
						  </time>

              <span class="post-reading">
								<?php
									$mins = nikka_reading_time( get_the_content( null, false ) );
									printf(
										/* translators: %s: minutes */
										esc_html__( '%s min read', 'textdomain' ),
										esc_html( (string) $mins )
									);
									?>
							</span>	
            </div>

					  <div class="post-excerpt"><?php the_excerpt(); ?></div>
						<?php
              get_template_part(
	            'parts/author-card',
	            null,
	            [ 'user_id' => (int) get_the_author_meta( 'ID' ) ]
              );
            ?>
					</div>
				</article>
			<?php endwhile; ?>

		</section>

	<?php else : ?>

		<p class="archive-empty">
			<?php esc_html_e( 'No posts found in this category.', 'textdomain' ); ?>
		</p>

	<?php endif; ?>

</main>

<?php
wp_reset_postdata();
get_footer();
