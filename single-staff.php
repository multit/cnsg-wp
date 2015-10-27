<?php get_header(); ?>


<?php setup_postdata($post); ?>

<section id="single-article" class="single_article">

  <article>
    <div class="row">
  
        
        <div class="columns medium-2">
          <div class="first-row-padded">
            <?php get_template_part( 'share-template', get_post_format() );  ?>            
            </div>
            <?php the_post_thumbnail( 'medium', array( 'class' => 'staff-big-image' ) ); ?>
        </div>
        
        <!-- begin colonna articolo -->
        <div class="columns medium-6">
          <div class="first-row-padded">
          <h3 style="color:#AC9865">ICGH Staff members</h3>
          <h1 ><?php the_title(); ?></h1>
          </div>       
          <?php the_content( ); ?>      

        </div>

        <div class="columns medium-3 show-for-medium-up">

        <div class="first-row-padded"></div>       
        <div class="right-column">
            <h2 class="">Projects</h2><br >
              <?php 
              $categorie = get_the_category( );               
              foreach ($categorie as $categoria) {
                $args=array(
                  'category'       =>  $categoria->term_id,
                  'post_type'      => 'progetto',
                  'post_status'    => 'publish',
                );
                $progetti = get_posts( $args );                
                  $proj .= '<a href="'. esc_url( get_permalink( $progetti[0]->ID ) ) .'"><h4>' . $progetti[0]->post_title . '</h4></a>';
              }
              echo $proj; ?>
            </p>            
        </div>
        </div>
        
       </article>
       <!-- end colonna articolo -->

        
                
    </div>
   
  </article>
</section>


<?php get_footer(); ?>