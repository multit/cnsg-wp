<?php get_header(); ?>

<?php
get_template_part( 'mobile', get_post_format() );  
?>


<section>
<?php get_template_part( 'hp-icons-map', get_post_format() );   ?>
</section>




<section id="hp-slider">
  <div class="row">
    
               <!--      <div class="flexslider">
                  <ul class="slides">
                      <li><img src="<?php //bloginfo(template_directory ); ?>/images/slide01.jpg" alt=""></li>
                      <li><img src="<?php //bloginfo(template_directory ); ?>/images/slide04.jpg" alt=""></li>
                  </ul>  
                  </div> -->
                  <img src="<?php bloginfo(template_directory ); ?>/images/HP-big.jpg" alt="">
  </div>
</section>




  


     





<section id="news">
<div class="row">

    <div id="hp-news-container" class="grid js-masonry" data-masonry-options='{ "itemSelector": ".hp-news", "animated":true}'> 

    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              
             <div class="hp-news columns small-12 medium-4 large-3">

                    <?php
                      // Settiamo alcune variabili
                      $categorie = get_the_terms( $post->ID, "progetto" );

                      $parent = get_term($categorie[0]->parent,"progetto" );
                      if ($parent->term_id) {
                          $rl_res = $parent->taxonomy . '_' .  $parent->term_id;
                          $rl_category_color = get_field('colore_della_categoria',$rl_res );
                          $nome_categoria = $parent->name;
                      } else {
                          //print_r($categorie[0]);
                          $rl_res = $categorie[0]->taxonomy . '_' .  $categorie[0]->term_id;
                          $rl_category_color = get_field('colore_della_categoria',$rl_res );
                          $nome_categoria = $categorie[0]->name;
                      }
                      

                    ?>
                     <div class="hp-news-bar" style="background-color:<?php echo $rl_category_color; ?>"></div>
                     <div class="hp-news-occhiello"><?php echo $nome_categoria ?></div>
                     <div class="hp-titolo-box"><a class="" href="<?php the_permalink(); ?>">
                      <h2 style="color:<?php //echo $rl_category_color; ?>;"><?php echo the_title(); ?></h1></a></div>
                     <div class="hp-news-dateinfo closed"><?php echo get_the_date(); ?>
                        <i class="fa fa-bars info-expander" id="" panel="info-panel-<?php the_ID(); ?>" ></i>
                        <div class="hp-news-info" id="info-panel-<?php the_ID(); ?>">
                            <b>keywords: </b><?php the_tags(""); ?><br />
                            <b>region: </b><a href="<?php get_term_link( the_field('regione_geografica') ); ?>"><?php the_field('regione_geografica') ?></a>
                        </div>            
                     </div>
                     <div class="hp-news-testo"><?php echo get_the_content('continua'); ?></div>
                 


             </div>  <!-- End div Item -->

            <?php endwhile; ?>


      <?php else : ?>
                  Nessuna news presente.
      <?php endif; ?>

    </div>
</div> <!-- end for masonry news-->

</div>
</section> <!-- End News Section -->




<section id="charts">
  <div class="row">
    <div class="section-title titolino"><span class="random_colored">Fast </span><b class="random_colored">Facts</b></div>      
    
    <div class="columns show-for-medium-up">
    <?php 
      // Parametri num colonne, munero dei grafici
      // Attenzione che se il canvas è a visibility=0 da' errore provare con foundation6?
      killer_charts_tag (4,4); ?>
    </div>





  </div>
</section>
    



<section id="mission">
  <div class="row"><div class="columns text-center">
    <div class="section-title titolino"><span class="random_colored">Our </span><b class="random_colored">Mission</b></div> 
    <p class="titolo big">Vivamus fermentum semper porta. Nunc diam velit, adipiscing ut tristique vitae</p>
   <p class="data"> sagittis vel odio. Maecenas convallis ullamcorper ultricies. Curabitur ornare, ligula semper consectetur sagittis, nisi diam iaculis v</p>
    <p>elit, id fringilla sem nunc vel mi. Nam dictum, odio nec pretium volutpat, arcu ante placerat erat, non tristique elit urna et turpis. Quisque mi metus, ornare sit amet fermentum et, tincidunt et orci. Fusce eget orci a orci congue vestibulum. Ut dolor diam, elementum et vestibulum eu, porttitor vel elit. Curabitur venenatis pulvinar tellus gravida ornare. Sed et erat faucibus nunc euismod ultricies ut id justo. Nullam cursus suscipit nisi, et ultrices justo sodales nec. Fusce venenatis facilisis lectus ac semper. Aliquam at massa ipsum. Quisque bibendum purus convallis nulla ultrices ultricies. Nullam aliquam, mi eu aliquam tincidunt, purus velit laoreet tortor, viverra pretium nisi quam vitae mi. Fusce vel volutpat elit. Nam sagittis nisi dui.
      
      Suspendisse lectus leo, consectetur in tempor sit amet, placerat quis neque. Etiam luctus porttitor lorem, sed suscipit est rutrum non. Curabitur lobortis nisl a enim congue semper. Aenean commodo ultrices imperdiet. Vestibulum ut justo vel sapien venenatis tincidunt. Phasellus eget dolor sit amet ipsum dapibus condimentum vitae quis lectus. Aliquam ut massa in turpis dapibus convallis. Praesent elit lacus, vestibulum at malesuada et, ornare et est. Ut augue nunc, sodales ut euismod non, adipiscing vitae orci. Mauris ut placerat justo. Mauris in ultricies enim. Quisque nec est eleifend nulla ultrices egestas quis ut quam. Donec sollicitudin lectus a mauris pulvinar id aliquam urna cursus. Cras quis ligula sem, vel elementum mi. Phasellus non ullamcorper urna.    
        </p></div>
  </div>
</section>

<section id="staff">
  <div class="row">
    <div class="section-title titolino"><span class="random_colored">Our </span><b class="random_colored">Staff</b></div> 
  </div>
</section>



<section id="test">
  <div class="row">area test slide

  <?php 

  $bigslides = get_post(251);
  //echo $bigslides->post_content;
  $output = do_shortcode($bigslides->post_content);
  echo $output;
  ?>
  </div>
</section>



<?php get_footer(); ?>