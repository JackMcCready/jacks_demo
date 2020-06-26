<?php get_header(); ?>
<div class="single-collection-page">
  <div class="container">
    <?php
      $this_page_id = get_the_ID();
      $defaultBanner = '';
      if(get_field('featured_banner')):
        $defaultBanner = get_field('featured_banner');
      else:
        $defaultBanner = get_field('default_collection_banner','option');
      endif; 
    ?>
    <div id="banner">
      <div class="banner-item" style="background-image:url(<?php echo $defaultBanner; ?>);">
        <div class="flexer">
          <div class="flexer-item">
            <div class="banner-text">
              <p style="text-align: center; text-transform:uppercase;">
                <strong><?php the_title(); ?></strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <?php
        $collection_prefix = '';
        if(get_the_category()[0]) {
          $collection_prefix = ' ' . get_the_category()[0]->name . ' ';
        }
        ?>
        <h1><?php echo $collection_prefix; ?>COLLECTIONS</h1>
      </div>
      <div class="col-md-4">
        <select class="selectpicker collection-picker" data-size="7" data-live-search="true" data-width="100%">
          <?php 
          $query = new WP_Query(array(
            'posts_per_page' => 600, 
            'post_type' => 'collections',
            'orderby' => 'category'
          )); 

          // $selectArray = '';

          // title
          $this_collection_title = get_the_title();
          echo '<option>' . get_the_category(get_the_ID())[0]->name . ' - ' . $this_collection_title . '</option>';

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              if($this_collection_title == get_the_title())
                continue;

              // $optionBit = '<option href="' . get_the_permalink() . '">' . get_the_category(get_the_ID())[0]->name . ' - ' . get_the_title() . '</option>';              
              // $selectArray[$this_collection_title] = $optionBit;

              echo '<option href="' . get_the_permalink() . '">' . get_the_category(get_the_ID())[0]->name . ' - ' . get_the_title() . '</option>';
            }
          }
          wp_reset_query();

          ?>
        </select>
      </div>
    </div>
</div>
<div class="grey-25">
  <div class="container padding-top-30">
    <div class="row">
      <div class="col-sm-7">
        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
            ?>
            <div class="white-box-collection active">
              <div class="row">
                <?php if(has_post_thumbnail()): ?>
                <div class="col-sm-4">
                  <?php the_post_thumbnail('medium'); ?>
                </div>
                <?php endif; ?>
                <div class="col-sm-8">
                  <?php 
                    echo '<h3>' . get_the_title() . '</h3>';
                    the_content(); 
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <?php 
                  $website_disable = '';
                  if(!get_field('website_link')):
                    $website_disable = 'disabled';
                  endif;
                  if(get_field('website_link')):
                    ?><a target="_blank" href="<?php echo get_field('website_link'); ?>"><?php
                  endif;
                  ?>
                  <div class="btn btn-default" <?php echo $website_disable; ?>>
                    VISIT WEBSITE
                  </div>
                  <?php if(get_field('website_link')): ?>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="col-sm-6">
                  <div class="btn btn-primary btn-enquire" enquire="<?php echo get_the_ID(); ?>">
                    ENQUIRE NOW
                  </div>
                </div>
              </div>
            </div>
            <?php
          endwhile;
        endif;
        wp_reset_query();
        wp_reset_postdata();

        $collection_prefix = '';
        if(get_the_category()[0]) {
          $cat_id = get_the_category()[0]->cat_ID;
          $args = array(
              'post_type' => 'collections',
              'posts_per_page' => 24,
              'tax_query' => array(
                  array(
                      'taxonomy' => 'category',
                      'field' => 'ID', //can be set to ID
                      'terms' => $cat_id //if field is ID you can reference by cat/term number
                  )
              )
          );
          $query = new WP_Query( $args ); 
          if ( $query->have_posts() ):

            while ( $query->have_posts() ):
              $query->the_post(); 

              $extra_category = '';
              $is_hotel = false;

              if($this_page_id == get_the_ID()) {
                continue;
              }

              if(has_category('hotel')) {
                $is_hotel = true;
                $extra_category = ' cyan-box';
              }

              ?>
              <div class="white-box-collection<?php echo $extra_category; ?>">
                <div class="row">
                  <?php if($is_hotel == false): ?>
                  <div class="col-sm-4">
                    <?php the_post_thumbnail('medium'); ?>
                  </div>
                  <?php endif; ?>
                  <div class="col-sm-<?php if($is_hotel == true): ?>12<?php else: ?>8<?php endif; ?>">
                    <?php 
                      echo '<h3>' . get_the_title() . '</h3>';
                      the_content(); 
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <?php 
                    $website_disable = '';
                    if(!get_field('website_link')):
                      $website_disable = 'disabled';
                    endif;
                    
                    if(get_field('website_link')):
                      ?><a target="_blank" href="<?php echo get_field('website_link'); ?>"><?php
                    endif;
                    ?>
                    <div class="btn btn-default" <?php echo $website_disable; ?>>
                      VISIT WEBSITE
                    </div>
                    <?php if(get_field('website_link')): ?>
                      </a>
                    <?php endif; ?>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn btn-primary btn-enquire" enquire="<?php echo get_the_ID(); ?>">
                      ENQUIRE NOW
                    </div>
                  </div>
                </div>
              </div>
              <?php
            endwhile;
          endif;

          wp_reset_query();
          wp_reset_postdata();
        }

        ?>
      </div>
      <div class="col-sm-5">
        <div class="white-box-collection holiday-box-collection">
          <?php the_field('enquiry_form_collections','option'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>