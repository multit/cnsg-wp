<?php get_header(); ?>

<?php
get_template_part( 'mobile', get_post_format() );  
?>



<?php get_template_part( 'hp-icons-map', get_post_format() );   ?>





<section id="hp-slider">
  <div class="row">
    
                    <div class="flexslider">
                  <ul class="slides">
                      <li><img src="<?php bloginfo(template_directory ); ?>/images/slide01.jpg" alt=""></li>
                      <li><img src="<?php bloginfo(template_directory ); ?>/images/slide04.jpg" alt=""></li>
                  </ul>  
                  </div>
  </div>
</section>




  


     





<section id="news">
<div class="row">

    <div id="hp-news-container" class="grid js-masonry" data-masonry-options='{ "itemSelector": ".item"}'> 

    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              
             <div class="item columns small-12 medium-4 large-3">
                 <div class="hp-news">
                    <?php
                        $categoria = get_the_category();                      
                        $tt = $categoria[0]->taxonomy .'_' . $categoria[0]->term_id;                        
                        $rl_category_color = get_field('colore_della_categoria', $tt);

                    ?>
                     <div class="hp-news-bar colore01" style="background-color:<?php echo $rl_category_color; ?>"></div>
                     <div class="hp-news-occhiello"><?php echo $categoria[0]->name; ?></div>
                     <div class="hp-titolo-box"><a class="" href="<?php the_permalink(); ?>"><h2 style="color:<?php echo $rl_category_color; ?>;"><?php echo get_the_title(); ?></h1></a></div>
                     <div class="hp-news-dateinfo closed">Maggio 2015
                        <i class="fa fa-plus info-expander" id=""></i>
                        <div class="hp-news-info" id="info-panel-17">
                            <b>keywords:</b> people, market<br />
                            <b>region:</b> Africa, Oceania
                        </div>            
                     </div>
                     <div class="hp-news-testo"><?php echo get_the_content('continua'); ?></div>
                 </div>
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
      killer_charts_tag (3,3); ?>
    </div>

    <div class="columns show-for-medium-only">
    <?php  //killer_charts_tag (3,3); ?>
    </div>



  </div>
</section>
    





<?php get_footer(); ?>