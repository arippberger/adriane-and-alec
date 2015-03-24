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
//    wp_enqueue_style( 'owl-slider-css', plugins_url( 'assets/owl/v1/owl.carousel.css', __FILE__ ) );
//    wp_enqueue_style( 'owl-transitions-css', plugins_url( 'assets/owl/v1/owl.transitions.css', __FILE__ ) );
//    wp_enqueue_script( 'owl-slider-js', plugins_url( 'assets/owl/v1/owl.carousel.js', __FILE__ ), array('jquery'), null, true );
    wp_enqueue_style( 'owl-slider-css', plugins_url( 'assets/owl/v2/owl.carousel.css', __FILE__ ) );
    wp_enqueue_style( 'animate-css', plugins_url( 'assets/owl/v2/animate.css', __FILE__ ) );
    wp_enqueue_script( 'owl-slider-js', plugins_url( 'assets/owl/v2/owl.carousel.js', __FILE__ ), array('jquery'), null, true );
}

add_action( 'wp_enqueue_scripts', 'owl_plugin_scripts' );

function owl_plugin_shortcode() {
    $string = file_get_contents( plugins_url( 'owl.json', __FILE__ ) );
    //$string = '{"foo-bar": 12345}';
    $string = utf8_encode($string);
    $json = json_decode( $string, true );
    $navigation_text = '';
    foreach( $json['items'] as $key => $slide ) {
        $navigation_text .= "\"<i class='icon-chevron-right icon-white'><img src='" . plugins_url( $slide['img'], __FILE__ ) . "'></i>\",";
    }
    ob_start();
    ?>
        <?php //var_dump($string); ?>
        <?php //var_dump($json); ?>
        <div id="owl-demo" class="owl-carousel">
            <?php
            foreach( $json['items'] as $key => $slide ) :
                ?>
                    <div class="owl-slide" data-hash="<?php echo $slide['firstName']; ?>">
                        <img class="owl-img" src="<?php echo plugins_url( $slide['img'], __FILE__ ); ?>">
                        <div class="owl-desc">
                            <h3><?php echo $slide['firstName']; ?> <?php echo $slide['lastName']; ?><?php echo $slide['title'] ? ', ' . $slide['title'] : ''; ?></h3>
                            <p><?php echo $slide['desc']; ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php
            endforeach;
            ?>
        </div>
        <div class="owl-click-nav">
            <?php
            foreach( $json['items'] as $key => $slide ) :
                ?>
                <a href="#<?php echo $slide['firstName']; ?>"><img height="75" width="75" src="<?php echo plugins_url( $slide['thumb'], __FILE__ ); ?>"></a>
                <?php
            endforeach;
            ?>
            <div class="clearfix"></div>
        </div>
        <script>
        $(document).ready(function(){

            $('.owl-carousel').owlCarousel({
                items: 1,
                loop: false,
                center: true,
                URLhashListener: true,
                autoplayHoverPause: false,
                startPosition: 'URLHash',
                autoHeight: true,
//                animateIn: 'bounceInRight',
//                animateOut: 'bounceOutLeft',
//                animateIn: 'fadeInLeft',
//                animateOut: 'fadeOutRight',
                //margin:30,
                //stagePadding:30,
                smartSpeed:450,
//                nav: true,
//                navText: ["&lsaquo;","&rsaquo;"]
            });

            $('.owl-click-nav a').click(function(){
                $('.owl-click-nav a').removeClass('clicked');
                $(this).addClass('clicked');
            });

        })
        </script>

    <?php
	return ob_get_clean();
}

add_shortcode( 'owl-slider', 'owl_plugin_shortcode' );