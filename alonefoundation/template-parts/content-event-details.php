<div class="col-md-8">
    <div class="post-event-details">
        <div class="event-heading">
            <div class="event-post-thumb">
                <!-- <img src="http://theme.bearsthemes.com/wordpress/alone-foundation/wp-content/uploads/2017/07/event1.jpg" alt="#"> -->
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="entry-heading-text"> 
                <?php the_title('<h4 class="title">','</h4>'); ?>
                <div class="event-cat-list">
                    <?php echo get_the_term_list(get_the_ID(), 'tax_alone_event', '', ', ', '');   ?>
                </div>
            </div>
        </div>
        <div class="event-extra-meta">   
            <div class="details-event-button">                                   
                <a class="btn btn-default" href="#">Google Calendar</a>
                <a class="btn btn-default" href="#">Ical Export</a>
            </div>
            <ul class="details-event">
                <?php if ((rwmb_meta('start_time'))):  ?>
                    <li itemprop="startDate">
                        <b>Start: </b> <?php rwmb_the_value('start_time', array( 'format' => 'F j, Y @H:i' ) );?> 
                    </li>
                <?php  endif;?>
                <?php if ((rwmb_meta('end_time'))):  ?>
                    <li itemprop="endDate">
                        <li><b>End: </b> <?php rwmb_the_value('end_time', array( 'format' => 'F j, Y @H:i' ) );?> </li>
                    </li>
                <?php  endif;?>
                <?php if ((rwmb_meta('speakers_name'))):  ?>  
                    <li><b>Speakers: </b> <?php echo rwmb_meta('speakers_name');?></li>
                <?php  endif;?>                
            </ul>
        </div>
        <div class="event-content clearfix">
            <?php the_content();?>
        </div>
        <div class="event-sharing social-share-entry d-flex align-items-center ">
            <span>Sharing: </span>
            <div class="share-post-wrap alone-project">
                <div class="share-post-wrap alone-project">
                        <a class="share-post-item color-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>&amp;src=sdkpreparse"  data-toggle="tooltip" data-placement="top" title="Facebook">
                            <div class="font-awosome-svg">
                                <img class="facebook-svg" src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/facebook-f.svg" alt="">
                            </div>
                        </a>

                        <a class="share-post-item color-twitter" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank" data-toggle="tooltip" data-placement="top">
                            <!-- <i class="fab fa-twitter"></i> -->
                            <div class="font-awosome-svg">
                                <img src="<?php echo get_template_directory_uri();?>//asset/fontawesome/svgs/brands/twitter.svg" alt="">
                            </div>
                        </a>

                        <a class="share-post-item color-google-plus"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="top" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  target="_blank"> 
                            <!-- <i class="fab fa-google-plus-g"></i> -->
                            <div class="font-awosome-svg">
                                <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/google-plus-g.svg" alt="">
                            </div>
                        </a>

                        <a class="share-post-item color-linkedin"  href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Share on LinkedIn"  target="_blank" data-toggle="tooltip" data-placement="top" >
                            <!-- <i class="fab fa-linkedin-in"></i> -->
                            <div class="font-awosome-svg">
                                <img src="<?php echo get_template_directory_uri();?>/asset/fontawesome/svgs/brands/linkedin-in.svg" alt="">
                            </div>
                        </a>
 
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="sidebar-widget">
        <div class="location-info event-location" >
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span itemprop="name">
                <?php
                
                    if ((rwmb_meta('location_details'))):  
                       echo rwmb_meta( 'location_details');
                    endif; 

                    if ((rwmb_meta('apply_lastdate'))):  
                        rwmb_the_value('apply_lastdate', array( 'format' => 'F j, Y @H:i' ) );
                    endif; ?>
            </span>
            <div id="map" style="">
                
            <?php
            if ((rwmb_meta('google_map'))):  
                $args = array(
                'width'        => '100%',
                'height'       => '350px',
                'zoom'         => 16,
                'marker'       => true,
                'marker_icon'  => get_template_directory_uri().'/asset/img/icon/facebook-placeholder-for-locate-places-on-maps.png',
                'marker_title' => 'Click me',
                'info_window'  => '<h3>Title</h3><p>Content</p>.',
            );
            echo rwmb_meta( 'google_map', $args );
            endif;

             ?>



            </div>
        </div>
      <!--   <div class="event-booking-form-wrap">
            <div class="heading-bpooking-form">
                <h4 class="title">Book Online</h4>
                <p class="note-book-form">will be closed until date  <?php
                        // if ((rwmb_meta('apply_lastdate'))):  
                        //     rwmb_the_value('apply_lastdate', array( 'format' => 'F j, Y @H:i' ) );
                        // endif;
                     ?>
                </p>
            </div>
            <form method="POST" class="form" data-event-booking-form="">
                <div class="form-group">
                    <label>Space * <span class="optional">(Maximum 3 spaces per booking)</span></label>
                    <input type="number" name="maximum_spaces_per_booking" min="1" max="3" step="1" value="1" required="">
                </div>
                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" value="" required="">
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" value="" required="">
                </div>
                <div class="form-group">
                    <label>Phone *</label>
                    <input type="text" name="phone" required="">
                </div>
                <div class="form-group">
                    <label>Comment</label>
                    <textarea name="comment" rows="5"></textarea>
                </div>
                <p class="event-note">
                Note: This is the definite date after which bookings will be closed for this event, regardless of individual ticket settings above. Default value will be the event start date.        </p>
                <div class="event-price d-flex justify-content-between">
                    <label>Price</label>
                    <span class="amount"> $2.99 </span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <span class="space-user-book">Booked: 0 / 300</span>
                    </div>
                    <div class="col-4 text-right">
                        <input type="hidden" name="id"  >
                        <button class="btn btn-submit" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>  -->  
    </div>
</div>