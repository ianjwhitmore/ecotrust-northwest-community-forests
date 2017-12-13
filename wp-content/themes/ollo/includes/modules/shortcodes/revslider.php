<?php if($slider_slug): ?>

	<!--Main Slider-->
	<div class="rev_slider_wrapper">
        <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
        <div id="charity-main-banner" class="rev_slider" data-version="5.0.7">
        	<?php if( ($slider_slug) && function_exists ( 'putRevSlider' ) ) putRevSlider( $slider_slug ); ?>
        </div>
    </div>

<?php endif; ?>