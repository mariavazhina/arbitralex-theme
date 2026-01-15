<?php
/**
 * Template part: Author card (no Gravatar, no ACF)
 * Path: template-parts/author-card.php
 *
 * Usage:
 * get_template_part('template-parts/author-card', null, ['user_id' => get_the_author_meta('ID')]);
 */

$user_id = 0;

if ( isset( $args['user_id'] ) ) {
	$user_id = (int) $args['user_id'];
}

if ( ! $user_id ) {
	$user_id = (int) get_the_author_meta( 'ID' );
}

$user = get_userdata( $user_id );
if ( ! $user ) {
	return;
}

$first = get_user_meta( $user_id, 'first_name', true );
$last  = get_user_meta( $user_id, 'last_name', true );
$name  = trim( $first . ' ' . $last );

if ( ! $name ) {
	$name = $user->display_name;
}

$bio = get_user_meta( $user_id, 'description', true );

// Author photo stored in user meta (set by you): either URL or attachment ID.
$photo_meta = get_user_meta( $user_id, 'author_photo', true );

$photo_url = '';
$photo_alt = $name;

if ( $photo_meta ) {
	// If it's numeric, treat as attachment ID.
	if ( is_numeric( $photo_meta ) ) {
		$img = wp_get_attachment_image_src( (int) $photo_meta, 'thumbnail' );
		if ( $img && ! empty( $img[0] ) ) {
			$photo_url = $img[0];
		}
	} else {
		// Otherwise treat as URL.
		$photo_url = esc_url_raw( $photo_meta );
	}
}
?>

<section class="details-card post-author" aria-label="<?php echo esc_attr( $name ); ?>">

  <?php if ( is_single() ) : ?>
    <h2 class="title-small"><?php esc_html_e( 'Author', 'textdomain' ); ?></h2>
  <?php endif; ?>  

	<div class="author-card-img" aria-hidden="true">
		<?php if ( $photo_url ) : ?>
			<img
				src="<?php echo esc_url( $photo_url ); ?>"
				alt="<?php echo esc_attr( $photo_alt ); ?>"
				loading="lazy"
				decoding="async"
			/>
		<?php else : ?>
			<!-- Fallback avatar (no Gravatar) -->
			<svg class="author-card__fallback" viewBox="0 0 64 64" role="img" aria-label="<?php echo esc_attr( $photo_alt ); ?>">
				<circle cx="32" cy="24" r="12"></circle>
				<path d="M8 58c4-14 16-20 24-20s20 6 24 20"></path>
			</svg>
		<?php endif; ?>
	</div>

	<h3 class="title-small"><?php echo esc_html( $name . ', ' . ARBITRALEX_COMPANY_NAME ); ?></h3>
  <?php if ( $bio && is_single() ) : ?>
		<p class="author-card-content"><?php echo esc_html( $bio ); ?></p>
	<?php endif; ?>

</section>