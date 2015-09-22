<?php
/*
 *Template Name: Testimonial Plugin
 */
get_header();
?>
  <!-- Portfolio start -->
  <section id="portfolio" class="pfblock_innre">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="pfblock-header wow fadeInUp">
            <h2 class="pfblock-title" style="margin-top:50px;">Testimonials</h2>
            <div class="pfblock-line"></div>
          </div>
        </div>
      </div><!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <section class="comment-list">
                      <?php
                      $counter = "0";
                      $mypost = array( 'post_type' => 'testimonials' );
                      $loop = new WP_Query( $mypost );
                      ?>
                      <?php while ( $loop->have_posts() ) : $loop->the_post();?>
                      <?php if ($counter == "1") { ?>
                      <article class="row">
                        <div class="col-sm-2 hidden-xs">
                          <figure class="thumbnail">
                            <?php the_post_thumbnail( array( 155, 155 ) ); ?>
                          </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                          <div class="panel panel-default arrow left">
                            <div class="panel-body">
                              <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i> <?php the_title(); ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('g:i a'); ?></div>
                              </header>
                              <div class="comment-post" style="margin-top:20px;">
                                <?php the_content(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </article>
                      <?php $counter = "0"; } else { ?>
                      <article class="row">
                        <div class="col-md-10 col-sm-10">
                          <div class="panel panel-default arrow right">
                            <div class="panel-body">
                              <header class="text-right">
                                <div class="comment-user"><i class="fa fa-user"></i> <?php the_title(); ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('g:i a'); ?></div>
                              </header>
                              <div class="comment-post" style="margin-top:20px; text-align:right;">
                                <?php the_content(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 col-sm-2 hidden-xs">
                          <figure class="thumbnail">
                            <?php the_post_thumbnail( array( 155, 155 ) ); ?>
                          </figure>
                        </div>
                      </article>
                      <?php $counter = "1"; } ?>
                      <?php endwhile; ?>
                    </section>
                </div>
            </div>
    </div><!-- .contaier -->
  </section>
  <!-- Portfolio end -->
  <?php wp_reset_query(); ?>
<?php get_footer(); ?>
