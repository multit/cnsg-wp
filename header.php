<!doctype html>
<html class="no-js" lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNSG</title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/libraries.min.css">    
<!--     <link rel="stylesheet" href="<?php //bloginfo('template_directory'); ?>/css/app.min.css">
 -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app_override.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/stili_paragrafo.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/logo.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/navigazione-top.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/small_screens.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/mobile.css">
    



    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.min.js"></script>

    <?php wp_head(); ?>


  </head>
  <body>





<header class="show-for-medium-up">

<!-- Site mega map -->
    <div id="projects_map_mega">
    
        <!-- logo per big screens -->
        <div class="row show-for-large-up"><a href="index.html">

            <div class="columns small-12 logo logo_large">
                <p class="logo_en">Italian Center For <b>Global Health</b></p>
                <p class="logo_ita">Centro Nazionale <b>per la Salute Globale</b></p>                
                <p class="logo_payoff">fightin health inequalities</p>
            </div>

        </a></div>
        <!-- end logo -->
        
    
    <div class="row ">
        <div class="columns small-12 sitemap">
         <b>Project Areas</b>   

    
<!-- // Menu con wp_nav_menu() & Menu_Principale_Walker extends Walker  -->
        <?php 
        $args = array (
            'menu' => 'Menu Categorie',
            'depth' => 3,
            'container' => false,
            // 'items_wrap' => '%3$s',
            'link_before' => '<h3>',
            'link_after' => '</h3>',
            'menu_class' => 'medium-block-grid-2 large-block-grid-5',
            'walker' => new Menu_Principale_Walker()
        );
        wp_nav_menu($args);

        ?>
 
       </div> </div></div>

     <!-- End Site mega map -->
    
    
    
    <!-- Site popup map -->
    <div id="projects_map" class="show-for-medium-up">
    <div class="row ">
        <div class="columns small-12 sitemap">
         <b>Project Areas</b>   


        <!-- // Menu con wp_nav_menu() & Menu_Principale_Walker extends Walker  -->

        <?php 
        $args = array (
            'menu' => 'Menu Categorie',
            'depth' => 3,
            'container' => false,
            // 'items_wrap' => '%3$s',
            'link_before' => '<h3>',
            'link_after' => '</h3>',
            'menu_class' => 'medium-block-grid-3 large-block-grid-6',
            'walker' => new Menu_Principale_Walker()
        );
        wp_nav_menu($args);

        ?>

        
       </div> </div></div>
     <!-- End Site popoup map -->




  
     <!-- Start navigazione fixed -->
    
    <nav class="menutop">
        <div class="menutop-box">

        <div class="row menutop">
    
            <div class="columns large-12 show-for-small-only">
              <h3 class="random_colored">Italian Center for Global Health<i class="fa fa-bars"></i></h3>
            </div>
    
            <div class="columns medium-8 show-for-medium-up">
                <ul class="inline-list">
                    <li><a href=""><h3>Mission</h3></a></li>
                    <li><a href=""><h3>Staff</h3></a></li>
                    <li><a href="#" id="menutop_projects"><h3>Projects&nbsp;<i id="menuarrow"class="fa fa-chevron-down" style="display:inline"></i></h3></a></li>
                    <li><a href=""><h3>News</h3></a></li>
                    <li><a href=""><h3>Search</h3></a></li>
                </ul>
            </div>
    
            <div class="columns medium-4 show-for-medium-up ">

                <ul class="inline-list right" id="scelta_lingua">
                    <li><a href=""><h3>ITA</h3></a></li>
                    <li><a href=""><h3>EN</h3></a></li>
                </ul>              

                <ul id="social" class="inline-list right" style="overflow:visible">
                <li><h3>
                  <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></li></span>
                </h3>
                <li><h3>
                  <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></li></span>
                </h3>
                <li><h3>
                  <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-rss fa-stack-1x fa-inverse"></i></li></span>
                </h3>
                </ul>


            </div>
    
        </div>      
      <!-- End menutop -->  
        </div>




        <!-- logo per big screens -->
        <div class="row show-for-large-up"><a href="<?php bloginfo('url'); ?>">
            <div class="columns small-12 logo logo_large <?php (is_home())  ? print 'animated' :'' ?>"  id="logo-animato">
                <p class="logo_en">Italian Center For <b>Global Health</b></p>
                <p class="logo_ita">Centro Nazionale <b>per la Salute Globale</b></p>                
                <p class="logo_payoff">fightin health inequalities</p>
            </div>
        </a></div>
        <!-- end logo -->
            

    </nav>  <!-- end navigazione fixed -->


        <!-- Spacer per logo fixed grande -->
      
            <div class="row show-for-large-up">
                <div id="logo-spacer" class=" <?php (is_home())  ? print 'animated' :'' ?>">&nbsp;</div>
            </div>
      

        <!-- logo per medium and small screens -->
        <div class="row show-for-medium-down "><a href="<?php bloginfo('url'); ?>">

            <div class="columns show-for-medium-only text-center logo logo_medium">
                <p>
                    Italian Center For <b>Global Health</b>
                </p>
                <p class="logo_payoff">fightin health inequalities medium</p>
            </div>
            
            <div class="columns show-for-small-only text-center logo logo_small">
                <p>
                    Italian Center For <br><b>Global Health</b>
                </p>
                <p class="logo_payoff">fightin health inequalities</p>               
            </div>

        
        </a></div>
        <!-- end logo per medium and small screens -->



</header>


