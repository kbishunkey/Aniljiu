(function ($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
  var bstarter = {
    // All pages
    common: {
      init: function () {

        this.expandNavbarOnClickSearch();

        this.add_pretty_photo_gallery();//add pretty photo gallery

        this.scrollToElement();
        this.scrollDown();
        this.scrollToTop();
        this.mobileMenuToggle();


      },






      expandNavbarOnClickSearch: function () {

        // TO DO: work on search animation

        var form_container = $('.js-search-box-to-expand');


        $('.js-expand-search').on('click', function (e) {

          form_container.removeClass('u-hidden');
          $('#navbar-search-input').focus();
          form_container.addClass('animated bounceInRight');
          e.preventDefault();

        });


        $('.js-close-search').on('click', function (e) {

          form_container.removeClass('animated fadeOut');
          form_container.addClass('u-hidden');
          $('.js-expand-search').focus();

          e.preventDefault();
        });


      },



      add_pretty_photo_gallery: function () {

        if ($("a[rel^='rocksite-resize-photo']").length > 0) {

          $("a[rel^='rocksite-resize-photo']").prettyPhoto();
        }

      },




      mobileMenuToggle: function () {

        // expand mobile menu

        var $mobileMenu = $('.js-mobile-menu');
        var $htmlDom = $('html');

        $('.js-toggle-mobile').on('click', function (e) {



          $buttonToglle = $(this);



          $mobileMenu.toggleClass('---active');
          $mobileMenu.find('li:first-child a').focus();

          $htmlDom.toggleClass('u-no-scrool-html');

          $buttonToglle.toggleClass('-close-btn-wrapper');

          $buttonToglle.find('.rocksite-m-bars').toggleClass('-close-btn');

          e.preventDefault();




        });

        $mobileMenu.find('li:first-child a').on('keydown', function (e) {

          ShiftTab(e, $('.js-expand-search'));

        });

        $('.js-toggle-mobile').on('keydown', function (e) {

          if($(this).hasClass('-close-btn-wrapper')) {



            if(!e.shiftKey) {


              if(e.keyCode ==9 ) {

                e.preventDefault();

                $mobileMenu.find('li:first-child a').focus();
              }

            }

          }



        });

        $mobileMenu.find('.-has-children').prepend('<button class="rocksite-m-nav-menu__item__submenu-toggle -js-menu-toggle">toogle menu</button>');



        // expand submenu

        $mobileMenu.find('.-has-children > a, .-js-menu-toggle').on('click', function(e) {

          if($(this).attr('href')=='#') {
            e.preventDefault();
          }



          $(this).parent().toggleClass('--open');


        });



      },




      scrollToElement: function () {

        //$('body').scrollspy({target: '#rocksite-spy-scroll-nav', offset: 50});

        $(".js-scroll-to-menu a").on('click', function () {


          var $container = $(this);
          var $parent_container = $container.parents('.js-scroll-to-menu');
          var containerTo = $container.attr('href');
          var offset = 1 * $parent_container.data('scroll-offset');


          $('html, body').animate({
            scrollTop: $(containerTo).offset().top - offset
          }, 2000);

        });

      },

      scrollDown: function() {


        $('.js-scroll-down').on('click', function(e) {

          var $btn = $(this);
          var containerTo = $btn.attr('href');

          e.preventDefault();
          $('html, body').animate({
            scrollTop: $(containerTo).offset().top
          }, 500, 'linear');
        });


      },

      scrollToTop: function () {

        $btnTop = $('#scroll-top-top');

        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
            $btnTop.addClass('slideInUp');
          } else {
            $btnTop.removeClass('slideInUp');
          }
        });

        //Click event to scroll to top
        $btnTop.click(function () {
          $('html, body').animate({scrollTop: 0}, 800);
          return false;
        });

      },

      fixedNavbar: function() {

        var $navbar = $('.js-fixed-navbar'),
            $menuBar = $('.js-menu-to-resize'),

            scrollClass = '-fixed-header',
            menuClass = '-resized-menu',
            activateAtY = 20;

        if($navbar.hasClass('js-fixed-navbar')) {

          if($(window).scrollTop() > activateAtY) {
            deactivateHeader();
          } else {
            activateHeader();
          }

        }



        function deactivateHeader() {
          if (!$navbar.hasClass(scrollClass)&& !$menuBar.hasClass(menuClass)) {
            $navbar.addClass(scrollClass);
            $menuBar.addClass(menuClass);
          }
        }

        function activateHeader() {
          if ($navbar.hasClass(scrollClass) && $menuBar.hasClass(menuClass)) {
            $navbar.removeClass(scrollClass);
            $menuBar.removeClass(menuClass);
          }
        }



      },


    },
    // Home
    home: {
      init: function () {



      }
    },


  };

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function (func, funcname, args) {
      var namespace = bstarter;
      funcname = (funcname === undefined) ? 'init' : funcname;
      if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function () {
      UTIL.fire('common');

      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {

        UTIL.fire(classnm);
      });
    }
  };

  $(document).ready(UTIL.loadEvents);


  $(window).scroll(function () {

    bstarter.common.fixedNavbar();

  });


  $(window).load(function () {
    smartlib_preloader();

  });


  function smartlib_preloader() {

    imageSources = []
    $('img').each(function () {
      var sources = $(this).attr('src');
      imageSources.push(sources);
    });
    if ($(imageSources).load()) {
      $('.rocksite-m-preloader').fadeOut('slow');
    }
  }


  /*Fix double click Ipad*/

  $('body').on('touchstart', '*', function () {   //listen to touch
    var jQueryElement = $(this);
    var element = jQueryElement.get(0); // find tapped HTML element
    if (!element.click) {
      var eventObj = document.createEvent('MouseEvents');
      eventObj.initEvent('click', true, true);
      element.dispatchEvent(eventObj);
    }
  });

  function ShiftTab(evt, goto) {
    var e = event || evt; // for trans-browser compatibility
    var charCode = e.which || e.keyCode; // for trans-browser compatibility



    if (e.shiftKey) {
      if (charCode === 9) {

        goto.focus();
        return false;
      }

    } else {
      return true;
    }

  }

})(jQuery); // Fully reference jQuery after this point.




