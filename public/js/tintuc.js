jQuery(document).ready(function($) {

      $('.toogle-input').click(function(event) {
        /* Act on the event */
        $('.search-form').addClass('visible-search-form');
      });
      $('.closeIcon').click(function(event) {
        /* Act on the event */
        $('.search-form').removeClass('visible-search-form');
      });
      $('.menu-main nav ul li').click(function(){
          $(this).siblings().removeClass('active-down-ul');
          $(this).toggleClass('active-down-ul');
      });

       $('.icon-hamburger').click(function(){
        $('.menu-main nav').toggleClass('active-menu-mobile');
      });
        $('.icon-hamburger').click(function(){
        $('.icon-hamburger').toggleClass('toogle-icon-close');
      });
});