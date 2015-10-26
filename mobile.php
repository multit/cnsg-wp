<!-- 

 _____ ______   ________  ________  ___  ___       _______    
|\   _ \  _   \|\   __  \|\   __  \|\  \|\  \     |\  ___ \     
\ \  \\\__\ \  \ \  \|\  \ \  \|\ /\ \  \ \  \    \ \   __/|    
 \ \  \\|__| \  \ \  \\\  \ \   __  \ \  \ \  \    \ \  \_|/__  
  \ \  \    \ \  \ \  \\\  \ \  \|\  \ \  \ \  \____\ \  \_|\ \ 
   \ \__\    \ \__\ \_______\ \_______\ \__\ \_______\ \_______\
    \|__|     \|__|\|_______|\|_______|\|__|\|_______|\|_______|
                                                                                                                                
 -->



<div class="off-canvas-wrap show-for-small-only" data-offcanvas>
  <div class="inner-wrap">

    <a class="left-off-canvas-toggle" href="#" ><i class="fa fa-bars"></i></a>

    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu">


    <ul class="off-canvas-list left-menu-mobile">
          <?php 
          wp_list_categories( array(
              'orderby'=>'ID',
              'depth' => 0, 
              'hide_empty' => false, 
              'exclude' => 1,    
<<<<<<< HEAD
              'walker' => new Walker_Menu_Mobile(),
=======
              'walker' => new Walker_Menu_Progetti(),
>>>>>>> 1f709d166a844b40abbba5a383816cfbc6df5cc5
              'title_li' => ''
              ));
              ?>
    </ul>   

    </aside>

    <!-- main content goes here -->

        <div class="row show-for-small-only ">
          <a href="index.html">

            <div class="columns text-center logo logo_small">
                <p>
                    Italian Center For<br><b>Global Health</b>
                </p>
                <p class="logo_payoff">fightin health inequalities medium</p>
            </div>
          </a>
        </div>



    <!-- end main content goes here -->

    <!-- close the off-canvas menu -->
    <a class="exit-off-canvas"></a>

  </div>
</div>




<!--
  _______   ________   ________          _____ ______   ________  ________  ___  ___       _______      
|\  ___ \ |\   ___  \|\   ___ \        |\   _ \  _   \|\   __  \|\   __  \|\  \|\  \     |\  ___ \     
\ \   __/|\ \  \\ \  \ \  \_|\ \       \ \  \\\__\ \  \ \  \|\  \ \  \|\ /\ \  \ \  \    \ \   __/|    
 \ \  \_|/_\ \  \\ \  \ \  \ \\ \       \ \  \\|__| \  \ \  \\\  \ \   __  \ \  \ \  \    \ \  \_|/__  
  \ \  \_|\ \ \  \\ \  \ \  \_\\ \       \ \  \    \ \  \ \  \\\  \ \  \|\  \ \  \ \  \____\ \  \_|\ \ 
   \ \_______\ \__\\ \__\ \_______\       \ \__\    \ \__\ \_______\ \_______\ \__\ \_______\ \_______\
    \|_______|\|__| \|__|\|_______|        \|__|     \|__|\|_______|\|_______|\|__|\|_______|\|_______|
                                                                                                       
                                                                                                       
                                                                                                       -->