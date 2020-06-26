<?php /* Template Name: About Us Template*/ 
get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-xs-12">
            <div class="main-content-wrap">
                <?php
                if (have_posts()) :

                    while (have_posts()) : the_post();

                        the_content();

                    endwhile;

                endif;
                ?>
            </div>
        </div>
		<div class="col-md-4 col-xs-12">
            <div class="menu-wrap">
                <?php wp_nav_menu( array('menu' => 'About Menu') ); ?>
            </div>
		</div>
	</div>
</div>
<?php get_footer(); ?>