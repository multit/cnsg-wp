<div class="row hp-icons-map">
    <div class="columns small-12 text-center">
        <!-- <p class="titolo_mega random_colored">What we do</p> -->
        <ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6 hp-icons-map" >

<?php
$args = array(
  'orderby' => 'name',
  'parent' => 0,
  'hide_empty' => 0,
  'exclude' => 1,
  'order' => 'ASC'
  );
$categories = get_categories($args);
  foreach($categories as $category) {
    $tt = $category->taxonomy .'_' . $category->term_id;
    $icon = get_field('icona_della_categoria', $tt);
    $color = get_field('colore_della_categoria', $tt);


    //print_r($category);
    // echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
        echo '<li style="color:'.$color.';" ><i class="'. $icon .' hpicons"></i>';
        echo $category->name;
        echo '</li>';
    // echo '<p> Description:'. $category->description . '</p>';
    // echo '<p> Post Count: '. $category->count . '</p>';  
      } 
?>
        </ul>        

    </div>

  
    


</div>      