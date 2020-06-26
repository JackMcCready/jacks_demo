			
</div>
<footer>	
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-6">
				<div class="blurb">
					<strong>Blurb:</strong>
					<?php if ( get_field('blurb', 'option') ) : ?>
						<?php echo get_field('blurb', 'option'); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="address">
					<strong>Company Title:</strong>
					<?php if ( get_field('company_address', 'option') ) : ?>
						<p><?php echo get_field('company_address', 'option'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="contact-info">	
					<strong>Contact Us:</strong>
					<?php if ( get_field('telephone_number', 'option') ) : ?>
						<p><?php echo get_field('telephone_number', 'option'); ?></p>
					<?php endif; ?>
					<?php if ( get_field('email_address', 'option') ) : ?>
						<p><?php echo get_field('email_address', 'option'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="social-media">
					<?php if ( have_rows('social_media_links', 'option') ) : ?>

						<?php while( have_rows('social_media_links', 'option') ) : the_row(); ?>

								<a class="link" href="<?php the_sub_field('link'); ?>"> <?php the_sub_field('social_media_name'); ?> </a>

						<?php endwhile; ?>
					
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>
</body>
</html>
