<footer class="footer">
  <nav aria-label="Footer menu">
    <?php
      wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'fallback_cb' => false,
        'menu_class' => 'footer-menu container'
        ]);
    ?>
  </nav>
  <div class="container">
    <section class="footer-content">
      <a class="footer-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Home">
        <?php echo svg_icon('arbitralex-logo-main-vertical'); ?>
      </a>
      <hr class="hr-short">  
      <div>
        <p class="footer-title">Location</p>
        <p class="footer-text">Toronto, Ontario, Canada</p>
      </div>
      <hr class="hr-short">    
      <div>
        <p class="footer-title">Related Services</p>
        <p class="footer-text">Arbitration & Mediation via AksConsult</p>
        <p class="footer-link">
          <a title="Arbitration & Mediation via AksConsult" href="http://aksresolution.com" target="_blank">aksresolution.com</a>
          <?php echo svg_icon('arrow-tr'); ?>
        </p>
      </div>
      <hr class="hr-short">    
      <div>
        <p class="footer-title">Contact</p>
        <p class="footer-text">Marina Akchurina 
          <a class="linkid" href="https://www.linkedin.com/in/marina-akchurina-fciarb-23325325/" target="_blank" aria-label="LinkedIn">
            <?php echo svg_icon('linkedin'); ?>
          </a>
        </p>        
        <p class="footer-link">
          <a href="mailto:makchurina@arbitralexlegal.com">makchurina@arbitralexlegal.com</a>
        </p>
      </div>
    </section>

    <section class="footer-copy">
      <div class="disclaimer"><strong>IMPORTANT NOTICE</strong> The information on this website is for general informational purposes only and does not constitute legal advice. Contacting us does not create an attorney-client relationship. We cannot represent you until we confirm there are no conflicts of interest and we enter into a written retainer agreement.</div>
      <div>
       <p>© 2026 <?php echo esc_html( ARBITRALEX_COMPANY_NAME_FULL ); ?>. All rights reserved.</p>
       <nav aria-label="Terms & Privacy menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'footer_copy',
          'container' => false,
          'fallback_cb' => false,
          ]);
          ?>
        </nav>
     </div>
    </section>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>