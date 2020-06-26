<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-xs-12">
			<?php
			if (have_posts()) :

				while (have_posts()) : the_post();

					the_content();

				endwhile;

			endif;
			?>
		</div>
		<div class="col-md-4 col-xs-12">

		</div>
	</div>
</div>
<?php get_footer(); ?>