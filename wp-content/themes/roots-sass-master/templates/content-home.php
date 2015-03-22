<div class="main" role="main">
    <div class="wrap container-fluid full-width" role="document">
        <div class="content row">
            <!-- <main class="main" role="main"> -->
                <div class="row">
                    <div class="intro-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/aa-steps.jpg" alt="...">
                    </div>
                </div>
            <!-- </main> -->
        </div>
    </div>
    <div class="wrap container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>