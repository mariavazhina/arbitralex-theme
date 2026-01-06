<?php get_header(); ?>

<?php get_template_part('parts/header-menu'); ?>

<main class="page-home">
  <section class="section hero-1">
    <nav class="container home-nav"></nav>
    <div class="hero">
      <div></div>
      <div>    
          <h1 class="title-big">Navigating complex <strong>business disputes</strong> across North America, Europe & Eurasia</h1>
          <a href="" title="Book Free 30-Min Consultation" class="btn btn-beige">Book Free 30-Min Consultation</a>
      </div>
    </div>  
  </section>

  <section class="section hero hero-2">
    <div>
      <h2>Disputes Resolution Lawyer&nbsp;• Arbitrator • Mediator</h2>
      <h3 class="title-extra">Marina Akchurina</h3>
    </div>
    <div>
      <img src="<?php echo theme_img('home-hero.jpg'); ?>" loading="lazy" decoding="async">
    </div>
  </section>

  <section class="section profile">
    <div class="container">
      <div>
        <div class="profile-title">
          <h2 class="title-small">About ArbitraLex</h2>
        </div>
      </div>  
      <div class="profile-text">
        <h3 class="title-mid">As a triple-qualified lawyer (Ontario, New York, and Russia), Marina provides unique insights into cross-border disputes across North America, Russia, and Central Asia, <strong>with particular focus on Kazakhstan, Uzbekistan, Armenia, and Georgia.</strong></h3>
        <p>Trained in both civil law and common law traditions, she brings a rare dual perspective that enables her to bridge different legal systems and anticipate how disputes will be analyzed across jurisdictions.</p>
        <a href="" title="About ArbitraLex" class="btn btn-navy">Learn More</a>
      </div>
      <img src="<?php echo theme_img('home-about-1.jpg'); ?>" loading="lazy" decoding="async">
      <div class="profile-sign">
        <img src="<?php echo theme_img('home-about-2.jpg'); ?>" loading="lazy" decoding="async">
        <?php echo svg_icon('arbitralex-logo-sign'); ?>
      </div>
    </div>
  </section>

  <section class="section expertise">
    <div class="container">
      <div class="expertise-1">
        <h2 class="title-mid">Expertise<br>at a Glance</h2>
        <img src="<?php echo theme_img('Marina-Akchurina-expretise.jpg'); ?>" alt="Marina Akchurina - Disputes Resolution Lawyer" loading="lazy"
    decoding="async">
      </div>
      <div class="expertise-2 card-navy">
        <h3 class="title-big">Dispute Resolution Lawyer</h3>
        <p>International and Domestic Arbitration</p>
        <p>Arbitral award enforcement & Set-aside</p>
        <p>Contract disputes in Ontario</p>
      </div>
      <div class="expertise-3 card-beige">
        <h3 class="title-big">Mediator</h3>
        <a href="" title="Mediator">
          <p>Facilitating business-focused solutions</p>
          <?php echo svg_icon('arrow-tr'); ?>
        </a>  
      </div>
      <div class="expertise-4 card-gray">
        <h3 class="title-big">Arbitrator</h3>
        <a href="" title="Arbitrator">
          <p>Resolving complex international disputes</p>
          <?php echo svg_icon('arrow-tr'); ?>
        </a>
      </div>
    </div>
  </section>

  <section class="section experience">
    <div class="container">
      <h2 class="title-small">Professional Standing</h2>
      <h3 class="title-big">Experience: 13 years at Cleary Gottlieb&nbsp;& 4&nbsp;years as an <strong>independent practitioner</strong></h3>
      <hr class="hr-short">
      <ul>
        <li>
          <h4 class="title-mid">Admitted</h4>
          <p>Ontario  •  New York<br>Russia</p>
        </li>
        <li>
          <h4 class="title-mid">Fellow</h4>
          <p>Chartered Institute of Arbitrators</p>
        </li>
        <li>
          <h4 class="title-mid">Languages</h4>
          <p>English  •  Russian<br>French</p>
        </li>
      </ul>
    </div>
  </section>

  <section class="section advantages">
    <div class="container">
      <div class="advantages-title">
        <h2 class="title-extra">Strategic Advantages</h2>
        <div>
          <p>Marina's approach focuses on early dispute prevention, creative problem-solving, and the development of cost-effective dispute resolution strategies.</p>
          <a href="" title="Approach to Services" class="btn btn-beige">Approach to Services</a>
        </div>
      </div>
      <ul class="advantages-list">
       <li>
        <h4 class="title-small">Direct engagement</h4>
       </li>
       <li>
        <h4 class="title-small">Boutique practice efficiency</h4>
       </li>
       <li>
        <h4 class="title-small">Cross-cultural fluency</h4>
       </li>
       <li>
        <h4 class="title-small">Purpose-built teams</h4>
       </li>
       <li>
        <h4 class="title-small">Global reach, local insight</h4>
       </li>
      </ul>
    </div>
  </section>

  <section class="section testimonials">
    <div class="container">
      <h2 class="title-small">What Clients Say</h2>
      <div class="testimonial-card">
        <p>"Marina is a master of international arbitration... delivering clear and practical advice in 'bet the company' situations." </p>
        <span>— Cameron Murphy, Profile Investment</span>
      </div>
    </div>
  </section>

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


