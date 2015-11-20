



        <a href="index.html" style="display:none">

          <div class="columns small-12 logo logo_large">
              <p class="logo_en">Italian Center For <b>Global Health</b></p>
              <p class="logo_ita">Centro Nazionale <b>per la Salute Globale</b></p>                
              <p class="logo_payoff">fightin health inequalities</p>
          </div>

      </a>
      <!-- end logo -->    

      <!-- <p class="titolo_mega random_colored">What we do</p> -->
      <div class="fullscreen-mega-map-container">
      <ul data-equalizer class="small-block-grid-2 medium-block-grid-3 large-block-grid-4 fullscreen-mega-map">

      <?php
      $args = array(
        'orderby' => 'name',
        'hide_empty' => 0,
        'exclude' => 1,
        'parent' => 0,
        'order' => 'ASC'
        );
      $categories = get_categories($args);
        foreach($categories as $category) {

              $tt = $category->taxonomy .'_' . $category->term_id;              
              $color = get_field('colore_della_categoria', $tt);

              $output .= '<li data-equalizer-watch class="fs-mega-map" bgc="'.$color.'" ><h3>' . $category->name . '</h3>';

              // Post o categorie questo il dilemma!!!
              // $taxonomy_name = $category->taxonomy;
              // $termchildren = get_term_children( $category->term_id, $taxonomy_name );
              //   foreach ( $termchildren as $child ) {
              //     $term = get_term_by( 'id', $child, $taxonomy_name );
              //     $output .= '<a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a>';
              //   }
                    
              // Post o categorie questo il dilemma
              $args = array( 
                          'category' => $category->term_id, 
                          'post_type' => 'progetto',
                          'order' => 'ASC'
                               );
              $myposts = get_posts( $args );
              foreach ( $myposts as $post ) {
                  setup_postdata( $post );
                  $link = get_permalink($post->ID);
                  $output .= '<a href="' . $link .'"><h5>'. $post -> post_title .'</h5></a>';
              }
              $output .= '</li>';

            } 

            echo $output;
            ?>
        </ul>
        </div>