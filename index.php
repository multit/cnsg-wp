<?php get_header(); ?>

<?php
get_template_part( 'mobile', get_post_format() );  
?>

<div class="row show-for-medium-up">



    <div class="columns small-12 text-center">
        <!-- <p class="titolo_mega random_colored">What we do</p> -->
        <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-5 color-mega-map" >
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon01.png'); "><a class="font-colore01" href="">Basic Translational and Clinic Research</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon02.png'); "><a class="font-colore02" href="">Operational and Implementation Research</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon03.png'); "><a class="font-colore03" href="">Migration Biology</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon04.png'); "><a class="font-colore04" href="">Health Systems Research</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon05.png'); "><a class="font-colore05" href="">Education and Training - Capacity Building</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon06.png'); "><a class="font-colore06" href="">International Cooperation</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon07.png'); "><a class="font-colore07" href="">Partnership with International Organizations and with the UN</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon08.png'); "><a class="font-colore08" href="">Maternal, Newborn and Child Health (MNCH)</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon09.png'); "><a class="font-colore09" href="">Traditional and Integrated Medicine</a></li>
          <li style="background-image: url('<?php bloginfo(template_directory ); ?>/images/icon10.png'); "><a class="font-colore10" href="">Policy and Advocacy</a></li>
        </ul>        

    </div>




     <div class="columns small-12 text-center"><a href="#" id="show-mega-map"><b class="titolino random_colored" >our PROJECT full INDEX</b></a></div>





<section id="news">

    <div class="row  show-for-medium-up">
        <div class="columns large-10">


            <div class="row"><div class="columns">
              <p class="titolino">NEWS</p>
            </div></div>

            <div class="row"><div class="columns large10">

                <!-- <div class="columns large-12"> -->
                <div class="flexslider">
                  <ul class="slides">
                      <li><img src="<?php bloginfo(template_directory ); ?>/images/slide01.jpg" alt=""></li>
                      <li><img src="<?php bloginfo(template_directory ); ?>/images/slide04.jpg" alt=""></li>
                  </ul>  
                  </div>
                <!-- </div> -->
            </div></div>



            
<!-- for masonry  js-masonry"  data-masonry-options='{ "itemSelector": ".grid-item", "columnWidth": 200 }' -->     
<div class="row">

    <div id="hp-news-container" class="js-masonry" data-masonry-options='{ "itemSelector": ".item"}'> 

            <?php 

            // $query = new WP_Query();
            // if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 

              if ( have_posts() ) : while ( have_posts() ) : the_post();


            ?>
              


             <div class="columns medium-6 large-4 item">
                 <div class="hp-news">
                    <?php
                        $categoria = get_the_category();
                        $the_category_id = $categoria[0]->cat_ID;

                        if(function_exists('rl_color')){
                            $rl_category_color = rl_color($the_category_id);
                        }
                    ?>
                     <div class="hp-news-bar colore01" style="background-color:<?php echo $rl_category_color; ?>"></div>
                     <div class="hp-news-occhiello"><?php echo $categoria[0]->name; ?></div>
                     <div class="hp-titolo-box"><a class="hp-news-titolo" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
                     <div class="hp-news-dateinfo closed">Maggio 2015
                        <i class="fa fa-plus info-expander" id=""></i>
                        <div class="hp-news-info" id="info-panel-17">
                            <b>keywords:</b> people, market<br />
                            <b>region:</b> Africa, Oceania
                        </div>            
                     </div>
                     <div class="hp-news-testo"><?php echo get_the_content('continua'); ?></div>
                 </div>
             </div>

            <?php endwhile; ?>


        <?php else : ?>

                    Nessun Articolo presente.


        <?php endif; ?>

    </div>
</div>  <!-- end contenuto news -->
<!-- end for masonry news-->




        </div>
        <div class="columns large-2 show-for-large-up">
        <p class="titolino">Fast <b>Facts</b></p>
          <?php killer_charts_tag (1,3);  ?>


        </div>
    </div>

      
    


</section> <!-- End News Section -->

    


<?php get_footer(); ?>