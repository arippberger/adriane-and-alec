<?php
/*
Plugin Name: WP Owl Slider
Version: 0.1-alpha
Description: PLUGIN DESCRIPTION HERE
Author: YOUR NAME HERE
Author URI: YOUR SITE HERE
Plugin URI: PLUGIN SITE HERE
Text Domain: owl-slider
Domain Path: /languages
*/


/**
 * Proper way to enqueue scripts and styles
 */
function owl_plugin_scripts() {
    wp_enqueue_style( 'owl-slider-css', plugins_url( 'assets/owl.carousel.css', __FILE__ ) );
    wp_enqueue_script( 'owl-slider-js', plugins_url( 'assets/owl.carousel.js', __FILE__ ), array('jquery'), null, true );
}

add_action( 'wp_enqueue_scripts', 'owl_plugin_scripts' );

function owl_plugin_shortcode() {
    ob_start();
    ?>

    <?php
	return ob_get_clean();
}

add_shortcode( 'owl-slider', 'owl_plugin_shortcode' );


$("#owl-demo").owlCarousel({
    navigation: true,
    navigationText: [
    "<i class='icon-chevron-left icon-white'></i>",
    "<i class='icon-chevron-right icon-white'></i>"
    ],
    beforeInit : function(elem){
    //Parameter elem pointing to $("#owl-demo")
    random(elem);
}

  });

  $("#owl-demo").owlCarousel({
    jsonPath : 'json/customData.json',
    jsonSuccess : customDataSuccess,
    navigationText: [
        "<i class='icon-chevron-left icon-white'></i>",
        "<i class='icon-chevron-right icon-white'></i>"
        <?php foreach()
    ],
  });

  function customDataSuccess(data){
      var content = "";
      for(var i in data["items"]){

          var img = data["items"][i].img;
       var alt = data["items"][i].alt;

       content += "<img src=\"" +img+ "\" alt=\"" +alt+ "\">"
    }
    $("#owl-demo").html(content);
  }