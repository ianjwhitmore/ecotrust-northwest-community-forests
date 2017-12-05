<?php
///----Blog widgets---

/// Recent Posts 
class Bunch_Recent_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_Post', /* Name */esc_html__('Ollo Recent Posts','ollo'), array( 'description' => esc_html__('Show the recent posts', 'ollo' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Recent Posts -->
        <div class="footer-latest-news">
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
                <?php $query_string = 'posts_per_page='.$instance['number'];
                if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
                
                $this->posts($query_string);
                ?>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Latest News', 'ollo');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'ollo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'ollo'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
				<?php while( $query->have_posts() ): $query->the_post(); ?>
                
                    <div class="single-news">
                        <h5><a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a></h5>
                        <?php $term_list = wp_get_post_terms(get_the_id(), 'category', array("fields" => "names")); ?>
                        <span><?php echo get_the_date('M j, Y');?>  /  <?php echo implode( ', ', (array)$term_list );?></span>
                    </div> <!-- /.single-news -->
                
                <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

///----footer widgets---
//About Us
class Bunch_About_us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Abous_us', /* Name */esc_html__('Ollo Abous Us','ollo'), array( 'description' => esc_html__('Show the information about company', 'ollo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            
            <div class="footer-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $instance['logo_url'] ); ?>" alt="<?php esc_html_e('Logo', 'ollo'); ?>"></a>
                <p><?php echo wp_kses_post($instance['content']); ?></p>
            </div> <!-- /.footer-logo -->

            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_url'] = strip_tags($new_instance['logo_url']);
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_url = ($instance) ? esc_attr($instance['logo_url']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_url')); ?>"><?php esc_html_e('Footer Logo Url: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_url')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_url')); ?>" type="text" value="<?php echo esc_attr($logo_url); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'ollo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>   
		<?php 
	}
	
}

///----Subscribe Form widget---
//
class Bunch_Subscribe_form extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Subscribe_form', /* Name */esc_html__('Ollo Subscribe Form','ollo'), array( 'description' => esc_html__('Show the Subscribe Form', 'ollo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = $instance['title'];
		
		echo wp_kses_post($before_widget);?>
        
        <div class="footer-subscribe">
            <h6><?php echo wp_kses_post( $title ); ?></h6>
            <p><?php echo wp_kses_post( $instance['description'] );  ?></p>
            <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                <input name="email" type="text" placeholder="Enter your e-mail">
                <input type="hidden" id="uri3" name="uri" value="<?php echo esc_attr( $instance['feed_id'] );  ?>">
                <button type="submit" class="tran3s ch-p-bg-color"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
            </form>
        </div> <!-- /.footer-subscribe -->

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['description'] = $new_instance['description'];
		$instance['feed_id'] = $new_instance['feed_id'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$description = ($instance) ? esc_attr($instance['description']) : '';
		$feed_id = ( $instance ) ? esc_attr($instance['feed_id']) : '';?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:', 'ollo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" ><?php echo wp_kses_post($description); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('feed_id')); ?>"><?php esc_html_e('Feed Burner Id:', 'ollo'); ?></label>
            <input placeholder="" class="widefat" id="<?php echo esc_attr($this->get_field_id('feed_id')); ?>" name="<?php echo esc_attr($this->get_field_name('feed_id')); ?>" type="text" value="<?php echo esc_attr($feed_id); ?>" />
        </p>        
                
		<?php 
	}
	
}


///----Download List widget---
//
/// Recent Posts 
class Bunch_Recent_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_News', /* Name */esc_html__('Ollo Recent News','ollo'), array( 'description' => esc_html__('Show the recent News', 'ollo' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Recent Posts -->
        <div class="sidebar-recent-news">
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
                
                <ul>
            
					<?php $query_string = 'posts_per_page='.$instance['number'];
                    if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
                    
                    $this->posts($query_string);
                   ?>
               </ul>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent News', 'ollo');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'ollo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'ollo'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string); 
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
				<?php while( $query->have_posts() ): $query->the_post(); ?>
                
                        <li class="clearfix">
                        	<?php the_post_thumbnail('ollo_110x100', array('class' => 'float-left'));?>
                            <div class="post float-left">
                                <h6>
                                    <a href="<?php echo esc_url(get_permalink(get_the_id())); ?>" class="tran3s"><?php the_title();?></a>
                                </h6>
                                <ul>
                                    <li>
                                        <a href="" class="tran3s"><i class="tran3s fa fa-comment" aria-hidden="true"></i> <?php comments_number( 0 ); ?></a>
                                    </li>
                                </ul>
                            </div> <!-- /.post -->
                        </li>
                        
                <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


///----Newletter Form widget---
//
class Bunch_Newsletter_form extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Newsletter_form', /* Name */esc_html__('Right Flooring Newsletter Form','ollo'), array( 'description' => esc_html__('Show the Newsletter Form', 'ollo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = $instance['title'];
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            
            <div class="newsletter">
                <h6><?php echo wp_kses_post( $title ); ?></h6>
                <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                    <input type="text" name="name" placeholder="<?php esc_html_e( 'Name', 'ollo' ); ?>">
                    <input type="hidden" id="uri2" name="uri" value="<?php echo esc_attr($instance['feed_id']); ?>">
                    <input type="email" name="email" placeholder="<?php esc_html_e( 'Email', 'ollo' ); ?>">
                    <input type="submit" class="tran3 p-bg-color theme-button hvr-float-shadow" value="<?php esc_html_e( 'SUBSCRIBE  Now', 'ollo' ); ?>">
                </form> 
            </div> <!-- /.newsletter -->
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['feed_id'] = $new_instance['feed_id'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$feed_id = ($instance) ? esc_attr($instance['feed_id']) : '';?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('feed_id')); ?>"><?php esc_html_e('FeedBurner ID:', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('feed_id')); ?>" name="<?php echo esc_attr($this->get_field_name('feed_id')); ?>" type="text" value="<?php echo esc_attr($feed_id); ?>" />
        </p>      
                
		<?php 
	}
	
}

/// Recent Services
class Bunch_servies extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_servies', /* Name */esc_html__('Right Flooring Services Sidebar','ollo'), array( 'description' => esc_html__('Show the Services Sidebar', 'ollo' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="sidebar-list">
            <ul>
                <?php 
                $args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
                if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
                    
                $this->posts($args);
                ?>
            </ul>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'ollo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'ollo'), 'selected'=>$cat, 'taxonomy' => 'portfolio_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args); 
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

/// Recent Services
class Bunch_projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_projects', /* Name */esc_html__('Right Flooring Projects Sidebar','ollo'), array( 'description' => esc_html__('Show the Projects Sidebar', 'ollo' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="sidebar-list">
            <ul>
                <?php 
                $args = array('post_type' => 'bunch_projects', 'showposts'=>$instance['number']);
                if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => (array)$instance['cat']));
                    
                $this->posts($args);
                ?>
            </ul>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'ollo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'ollo'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'ollo'), 'selected'=>$cat, 'taxonomy' => 'portfolio_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args); 
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); ?>
            <li><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}