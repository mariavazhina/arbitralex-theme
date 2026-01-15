<?php
$slug = $args['slug'] ?? '';

$cta_variants = [

  'home' => [
    'class'       => 'cta-light',
    'title'       => 'Ready to Discuss Your Case?',
    'button_text' => 'Book Free 30 minutes meeting',
    'cta_image'   => 'book-a-section',
  ],

  'litigation'    => [
    'class'       => 'cta-beige',
    'title'       => 'Discuss your litigation matter',
    'button_text' => 'Book Free 30 minutes meeting',
    'cta_image'   => 'book-a-section-litigation',
  ],

  'counsel-profile'    => [
    'class'       => 'cta-navy',
    'title'       => 'Discuss legal representation in arbitration',
    //'subtitle'    => 'For legal representation in arbitration:',
    'button_text' => 'Book Free 30 minutes meeting',
    'cta_image'   => 'book-a-section',
  ],

  'arbitrator-profile'    => [
    'class'       => 'cta-beige',
    'title'       => 'For arbitrator appointments:',
//    'button_text' => 'Book Pre-Appointment Interview via AksConsult',
    'button_text' => 'Book Pre-Interview via AksConsult',
    'cta_image'   => 'book-a-section-litigation',
  ],

  'mediation'    => [
    'class'       => 'cta-beige',
    'title'       => 'Interested In Mediation Services?',
    'button_text' => 'Schedule Consultation via AksConsult',
    'cta_image'   => 'book-a-section-mediation',
    //'cta_bottom'  => false,
  ],

  'about'    => [
    'class'       => 'cta-beige',
    'title'       => 'Ready to Discuss Your Case?',
    'button_text' => 'Book Free 30 minutes meeting',
    'cta_image'   => 'book-a-section',
    //'cta_bottom'  => false,
  ],
];

$data = $cta_variants[$slug] ?? null;

if (!$data) {
  return; 
}

$class       = $data['class'] ?? '';
$title       = $data['title'];
$subtitle    = $data['subtitle'] ?? '';
$button_text = $data['button_text'] ?? '';
$image_src   = theme_img(($data['cta_image'] ?? '') . '.jpg');
$cta_bottom  = $data['cta_bottom'] ?? true;

?>
  
  <section class="section section-cta <?php echo $class ?>">
    <div class="container">
      <div><img src="<?php echo $image_src; ?>" loading="lazy" decoding="async"></div>
      <div class="section-cta-text">
        <h2 class="title-extra"><?php echo $title ?></h2>
        <?php if ($subtitle) : ?><h3 class="title-small"><?php echo $subtitle ?></h3><?php endif ?>
        <a href="" title="<?php echo $button_text ?>" class="btn <?php if ($class == 'cta-navy') : ?>btn-beige<?php else : ?>btn-navy<?php endif ?>"><?php echo $button_text ?></a>
        <?php if ($cta_bottom) : ?>
          <ul>
            <li>Flexible scheduling</li>
            <li>•</li>
            <li>Virtual meetings available</li>
            <li>•</li>
            <li>No obligation</li>
          </ul>
        <?php endif ?>  
      </div>
    </div>
  </section>