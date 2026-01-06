<?php
$slug = $args['slug'] ?? '';

$cta_variants = [

  'home' => [
    'class'       => 'cta-light',
    'title'       => 'Ready to Discuss Your Case?',
    'button_text' => 'Book 30-Min Free Introductory Meeting',
    'cta_image'   => 'book-a-section',
  ],

  'litigation'    => [
    'class'       => 'cta-beige',
    'title'       => 'Discuss your litigation matter',
    'button_text' => 'Book 30-Minute Free Introductory Virtual Meeting',
    'cta_image'   => 'book-a-section-litigation',
  ],

];

$data = $cta_variants[$slug] ?? null;

if (!$data) {
  return; 
}

$class       = $data['class'] ?? '';
$title       = $data['title'];
$button_text = $data['button_text'] ?? '';
$image_src = theme_img(($data['cta_image'] ?? '') . '.jpg');

?>
  
  <section class="section section-cta <?php echo $class ?>">
    <div class="container">
      <div><img src="<?php echo $image_src; ?>" loading="lazy" decoding="async"></div>
      <div class="section-cta-text">
        <h2 class="title-extra"><?php echo $title ?></h2>
        <a href="" title="<?php echo $button_text ?>" class="btn btn-navy"><?php echo $button_text ?></a>
        <ul>
          <li>Flexible scheduling</li>
          <li>•</li>
          <li>Virtual meetings available</li>
          <li>•</li>
          <li>No obligation</li>
        </ul>
      </div>
    </div>
  </section>