  'use strict';

var app = (function(document, $) {
	var docElem = document.documentElement,
		_userAgentInit = function() {
			docElem.setAttribute('data-useragent', navigator.userAgent);
		},
		_init = function() {

			$(document).foundation();
            // needed to use joyride
            // doc: http://foundation.zurb.com/docs/components/joyride.html
            $(document).on('click', '#start-jr', function () {
                $(document).foundation('joyride', 'start');
            });
			_userAgentInit();

			// SVG / PNG sostituisce i svg con PNG per i browser più vecchi
			// Per ora abbiamo solo il logo 
			  if(!Modernizr.svg) {
			    $('img[src*="svg"]').attr('src', function () {
			    return $(this).attr('src').replace('.svg', '.png');
			  });
			}

			// Flexslider 
			$('.flexslider').flexslider({
			    animation: 'slide',
          controlNav: false,
          slideshowSpeed: 5000
			  });



      $(document).foundation({
  equalizer: {
    equalize_on_stack: true
    // before_height_change: function(){
    //   // do something before the height changes
    // },
    // after_height_change: function(){
    //   // do something after the height changes
    //   console.log('Valori altezza cambiati');
    // }  
  }
});

      // Colora gli elementi del menu fullscreen
      $('li.fs-mega-map').each(function(index, el) {
              $(this).hover(function() {
                /* Stuff to do when the mouse enters the element */
                var bgcolor = $(this).attr('bgc');
                $(this).css('backgroundColor', bgcolor);
              }, function() {
                /* Stuff to do when the mouse leaves the element */
                $(this).css('backgroundColor', 'transparent');
              });
      });


      // Mostra la mappa full screen del sito
      // Comandi dal link
      $('#show-mega-map').click(function(event) {

          event.preventDefault();
          if ($('#fullscreen-mega-map').css('display') === 'none') {
            $('body').css({overflow:'hidden'});            
            $('#fullscreen-mega-map').css({overflow:'auto', top:0});
            TweenLite.fromTo ('#fullscreen-mega-map' , 0.8, {opacity:0}, {opacity:1,display:'block'});         
          } else{
            TweenMax.to('#fullscreen-mega-map', 0.6, {opacity:0});
          }
      });      
      // Chiude la mappa
      $('#fullscreen-mega-map').click(function(event) {        
          //event.preventDefault();
          if ($(this).css('display') === 'block') {                
            TweenLite.fromTo ($(this) , 0.2, {opacity:1}, {opacity:0,display:'none'});
            $('body').css('overflow', 'auto');
            $('li.menu-btn').each(function(index, el) {
                $(this).css({'backgroundColor':'transparent'});                
            });
          }
      });    


      // Colora titolini in maniera random
      $( '.random_colored' ).each(function( index ) {            
            var message = $( this ).text();
            var lun_message = message.length;
            var colors = new Array('#88101D','#AC9865','#615931','#25545D','#C89B67','#AC502A','#008173','#735079','#8A8444','#956F3E');
            var lun_colors = colors.length;
            var newHtml = '';

            for (var i = 0; i < lun_message; i++) {
                var randomnumber=Math.floor(Math.random()*lun_colors);              
                newHtml += '<span style="color:' + colors[randomnumber] + ';">' + message[i] + '</span>';
                // newHtml += '<span style=\'color:' + colors[i] + ';\'>' + message[i] + '</span>';
                //i = ( i >= lun_colors ? 0 : i )
            }
            $( this ).html(newHtml) ;
      });


      // Apre il menu superiore con la mappa dei progeti
      $('#menutop_projects').click(function(event) {
          // if ($('#projects_map').css('height') === '0px') {
          //   TweenMax.set('#projects_map',{height:'auto'});
          //   TweenMax.from('#projects_map',0.5,{height:0,ease:Quad.easeOut});
          //   $( 'i#menuarrow' ).replaceWith( '<i id="menuarrow" class="fa fa-chevron-up" style="display:inline"></i>' );
          // } else{
          //   TweenMax.to('#projects_map', 0.6, {height:0});
          //   $( 'i#menuarrow' ).replaceWith( '<i id="menuarrow" class="fa fa-chevron-down" style="display:inline"></i>' );
          // }
          event.preventDefault();
          if ($('#fullscreen-mega-map').css('display') === 'none') {
            $('body').css('overflow', 'hidden');
            $(this).parent().css('backgroundColor', '#EFEFE8');
            $('#fullscreen-mega-map').css('overflow', 'auto');
            // var momY = $(window).scrollTop();
            // console.log("Scroll top" + momY);
            TweenLite.fromTo ('#fullscreen-mega-map' , 0.3, {opacity:0}, {opacity:0.95,display:'block', top:$(window).scrollTop()});
            $( 'i#menuarrow' ).replaceWith( '<i id="menuarrow" class="fa fa-chevron-up" style="display:inline"></i>' );         
          } else{
            TweenMax.to('#fullscreen-mega-map', 0.6, {opacity:0, display:'none'});
            $(this).parent().css('backgroundColor', 'transparent');
            $('body').css('overflow', 'auto');
            $( 'i#menuarrow' ).replaceWith( '<i id="menuarrow" class="fa fa-chevron-down" style="display:inline"></i>' );
          }          

          
      });



      // $(function() {
      //     $.scrollify({
      //       section : 'section',
      //      // offset:-280
      //     });
      //   });


  },   // end init function


      _animazione_logo = function() {

            // variabili altezza maassima di scrollspay e dimensioni CSS iniziali e finali
            var scrollspay_max = 200;

            var endVal = {
              'hb' : parseInt( $('#logo-animato').css('background-size') , 10),
              'pt' : parseInt( $('#logo-animato').css('padding-top') , 10),
              'mt' : parseInt( $('#logo-animato').css('margin-top') , 10),
              'bm' : parseInt( $('#logo-spacer.animated').css('height') , 10),
            };

            var beginVal = {
              'hb' : 160,  // Dimensione iniziale logo
              'pt' : 180,
              'mt' : 40,
              'bm' : 310  // Altezza del logo-spacer.animated
            };      
            
            // Imposta lo stato iniziale

            if ( $(window).scrollTop() < scrollspay_max) {

              $('#logo-spacer.animated').css('height', beginVal.bm );
              $('.logo_large.animated').css({
                      paddingTop: beginVal.pt,
                      marginTop: beginVal.mt,
                      backgroundSize: beginVal.hb
               });
              
            }


          

            var calcola_percent = function (begin,end,perc) {
                var diff = begin - end;
                var percentuale = (diff / 100) * perc;
                return percentuale;
            };

            $(window).scrollspy({ 
                 min: 0 ,
                 max: scrollspay_max,

                 onEnter: function(element, position) {
                  //TweenMax.to('.logo',0.4,{ 'padding-top':beginVal['pt'], 'background-size':beginVal['hb'], 'margin-top':beginVal['mt']  });
                  
                 },
                 onLeave: function(element, position) {   
                    console.log('leave');
                    //TweenMax.to('div.logo_large.animated',0.8,{ 'padding-top':endVal['pt'], 'background-size':endVal['hb'], 'margin-top':endVal['mt']  });
                    $('div.logo_large.animated').css({ 'padding-top':endVal.pt, 'background-size':endVal.hb, 'margin-top':endVal.mt });
                    $('#logo-spacer.animated').css({'height': endVal.bm});
                 },
                 onTick: function(element, position) {

                    var perc = 100 * position.top / scrollspay_max;
                    perc = perc.toFixed(0);  // Percentuale dal top
                    var bgdiff_abs =  beginVal.hb - calcola_percent( beginVal.hb,endVal.hb,perc ).toFixed(0);
                    var ptdiff_abs =  beginVal.pt - calcola_percent( beginVal.pt,endVal.pt,perc ).toFixed(0);
                    var mtdiff_abs =  beginVal.mt - calcola_percent( beginVal.mt,endVal.mt,perc ).toFixed(0);
                    var bmdiff_abs =  beginVal.bm - calcola_percent( beginVal.bm,endVal.bm,perc ).toFixed(0);


                    TweenMax.to('div.logo_large.animated',0.4,{ 'padding-top':ptdiff_abs, 'background-size':bgdiff_abs, 'margin-top':mtdiff_abs });
                    TweenMax.to('#logo-spacer.animated',0.8,{'height': bmdiff_abs });


                 }
           });

      };  // end animazione minore
	return {
		init: _init,
    animazioneLogo: _animazione_logo
	};

})(document, jQuery);



(function() {
	  app.init();
    app.animazioneLogo();
})();

