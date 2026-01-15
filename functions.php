<?php
/**
 * ArbitraLex Theme functions
 */

/* --------------------------------------------------------------------------
 * Theme setup
 * -------------------------------------------------------------------------- */

add_action('after_setup_theme', function () {

  // Let WordPress handle <title>
  add_theme_support('title-tag');

  // Thumbnails
  add_theme_support('post-thumbnails');

  // HTML5 markup
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
  ]);

  // Navigation menu
  register_nav_menus([
    'primary' => 'Primary menu',        
    'footer'  => 'Footer main menu',
    'footer_copy'  => 'Footer bottom menu',
    'header_left' => 'Header: Left menu',
    'header_right' => 'Header: Right menu',
  ]);
});


/* --------------------------------------------------------------------------
 * Enqueue styles
 * -------------------------------------------------------------------------- */

add_action('wp_enqueue_scripts', function () {

  // Google Fonts (Raleway)
  wp_enqueue_style(
    'arbitralex-google-fonts',
    'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap',
    [],
    null
  );

  // Main theme stylesheet
  wp_enqueue_style(
    'arbitralex-theme',
    get_stylesheet_uri(),
    ['arbitralex-google-fonts'],
    wp_get_theme()->get('Version')
  );
});


function theme_scripts() {

  wp_enqueue_script(
    'mobile-menu',
    get_template_directory_uri() . '/assets/js/mobile-menu.js',
    [],
    null,
    true // footer
  );

}
add_action('wp_enqueue_scripts', 'theme_scripts');


/* --------------------------------------------------------------------------
 * Resource hints (preconnect for Google Fonts)
 * -------------------------------------------------------------------------- */

add_filter('wp_resource_hints', function ($urls, $relation_type) {
  if ($relation_type === 'preconnect') {
    $urls[] = 'https://fonts.googleapis.com';
    $urls[] = [
      'href' => 'https://fonts.gstatic.com',
      'crossorigin' => true,
    ];
  }
  return $urls;
}, 10, 2);


/* --------------------------------------------------------------------------
 * Cleanup (optional, but nice)
 * -------------------------------------------------------------------------- */

// Remove emoji scripts
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove WP version
remove_action('wp_head', 'wp_generator');



// Inline SVG

function svg_icon($name, $class = 'icon') {
  $file = get_template_directory() . "/assets/svg/{$name}.svg";
  if (!file_exists($file)) return '';

  $svg = file_get_contents($file);
  $svg = preg_replace('/<svg\b/', '<svg class="'.esc_attr($class).'"', $svg, 1);

  return $svg;
}

// Images path

function theme_img($path) {
  return esc_url( get_template_directory_uri() . '/assets/pics/' . ltrim($path, '/') );
}


add_action('init', function () {
	$user_id  = 2;   // <-- ID пользователя-автора
	$photo_id = 214; // <-- attachment ID картинки

	update_user_meta($user_id, 'author_photo', $photo_id);
});

define( 'ARBITRALEX_COMPANY_NAME', 'ArbitraLex' );
define( 'ARBITRALEX_COMPANY_NAME_FULL', 'ArbitraLex Professional Corporation' );

function arbitralex_svg_icon_shortcode( $atts ) {
	$atts = shortcode_atts(
		[
			'name'  => '',
			'class' => '',
		],
		$atts
	);

	if ( empty( $atts['name'] ) || ! function_exists( 'svg_icon' ) ) {
		return '';
	}

	ob_start();
	echo svg_icon( $atts['name'], $atts['class'] ?? '' );
	return ob_get_clean();
}

add_shortcode( 'icon', 'arbitralex_svg_icon_shortcode' );