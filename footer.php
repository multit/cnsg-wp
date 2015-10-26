



<!-- 
 ___  ________   ___  ________  ___  ________          ________ ________  ________  _________  _______   ________     
|\  \|\   ___  \|\  \|\_____  \|\  \|\   __  \        |\  _____|\   __  \|\   __  \|\___   ___|\  ___ \ |\   __  \    
\ \  \ \  \\ \  \ \  \\|___/  /\ \  \ \  \|\  \       \ \  \__/\ \  \|\  \ \  \|\  \|___ \  \_\ \   __/|\ \  \|\  \   
 \ \  \ \  \\ \  \ \  \   /  / /\ \  \ \  \\\  \       \ \   __\\ \  \\\  \ \  \\\  \   \ \  \ \ \  \_|/_\ \   _  _\  
  \ \  \ \  \\ \  \ \  \ /  /_/__\ \  \ \  \\\  \       \ \  \_| \ \  \\\  \ \  \\\  \   \ \  \ \ \  \_|\ \ \  \\  \| 
   \ \__\ \__\\ \__\ \__|\________\ \__\ \_______\       \ \__\   \ \_______\ \_______\   \ \__\ \ \_______\ \__\\ _\ 
    \|__|\|__| \|__|\|__|\|_______|\|__|\|_______|        \|__|    \|_______|\|_______|    \|__|  \|_______|\|__|\|__|
                                                                                                                      
 -->




<footer class="footer show-for-medium-up">
  <div class="footer-container show-for-medium-up">
  <div class="row">
    <div class="columns small-6 offset-3 small-centered">
      <h3>Centro nazionale per la salute globale</h3>      
      <b class="paragrafo-stretto">Sed non tortor sodales quam auctor elementum. Donec hendrerit nunc eget elit pharetra pulvinar. Suspendisse id tempus tortor. Aenean luctus, elit commodo laoreet commodo, justo nisi consequat massa, sed vulputate quam urna quis eros. Donec vel.</b>
    </div>
    


    <?php 

    $defaults = array(
      'theme_location'  => '',
      'menu'            => 'Menu Principale',
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 3,
      //'walker'          => ''
      'walker'          => new Custom_Walker_Nav_Menu()
      // 'walker' => new Walker_Menu_Project()
    );

    wp_nav_menu($defaults); 


    ?>

  
  </div>
  </div>
</footer>




    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/libraries.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/foundation.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/app.min.js"></script>
   
	<?php wp_footer(); ?>


  </body>
</html>