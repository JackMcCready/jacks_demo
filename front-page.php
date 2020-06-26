<?php /* Template Name: Front Page Template*/ 
get_header(); ?>
<div class="front_page">
	<div class="container">
		<div class="row">
		<div class="fp-title">
      <?php if ( get_field('title') ) : ?>
        <h1><?php echo get_field('title'); ?></h1>
      <?php endif; ?>
    </div>
    <div class="fp-content-repeater">
      <?php if ( have_rows('repeater') ) : ?>
      
        <?php while( have_rows('repeater') ) : the_row(); ?>
        
          <div class="single-block col-md-4">
            <div class="image" style='background-image: url("<?php the_sub_field('image'); ?>");'></div>
            <?php if( get_sub_field('header') ) : ?>
              <h2><?php echo get_sub_field('header'); ?></h2>
            <?php endif; ?>
            <?php if( get_sub_field('content') ) : ?>
              <?php echo get_sub_field('content'); ?>
            <?php endif; ?>
            
          </div>
      
        <?php endwhile; ?>
      
      <?php endif; ?>
      
    </div>
		</div>
	</div>
</div>
<?php get_footer(); ?>