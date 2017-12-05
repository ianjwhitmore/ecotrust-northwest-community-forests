<?php wp_enqueue_script( array( 'map_api' ) ); ?>
<!-- 
=============================================
    Goolge-map
============================================== 
-->
<div>
    <div id="google-map-area">
        <div class="google-map-three" 
        id="contact-google-map" 
            data-map-lat="<?php echo wp_kses_post( $latitude );  ?>" 
            data-map-lng="<?php echo wp_kses_post( $longitude );  ?>" 
            data-icon-path="<?php echo esc_js( $map_img ); ?>" 
            data-map-title="<?php echo wp_kses_post( $title );  ?>" data-map-zoom="12">
        </div>
     </div>
</div>