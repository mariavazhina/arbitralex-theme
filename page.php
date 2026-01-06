<?php get_header(); ?>
<?php get_template_part('parts/header-menu'); ?>

<main class="page-inner">

  <?php the_content(); ?>

  <?php
    $slug = is_front_page()
    ? 'home'
    : get_post_field('post_name', get_queried_object_id());

  get_template_part('parts/page-cta',
    null,
    [
      'slug' => $slug,
    ]
  );
?>

</main>

<?php get_footer(); ?>