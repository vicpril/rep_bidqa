<?php

function ProjectTheme_my_account_area_awaiting_completion_function()
{
	
		global $current_user, $wpdb, $wp_query;
		get_currentuserinfo();
		$uid = $current_user->ID;
		
?>
    	<div id="content" class="account-main-area">
        
        
          
				
                
                <?php
				
				global $current_user;
				get_currentuserinfo();
				$uid = $current_user->ID;
				
				
				global $wp_query;
				$query_vars = $wp_query->query_vars;
				$post_per_page = 10;				
				
			
		
					
				$outstanding = array( 
                    array(
						'key' => 'outstanding',
						'value' => "1",
						'compare' => '='
                        ),
                    
                    array(
						'key' => 'mark_coder_delivered',
						'value' => "1",
						'compare' => '='
                        ),
                    
					);	
                
                
				
				$args = array('post_type' => 'project', 'author' => $uid, 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => $post_per_page,
				'paged' => $query_vars['paged'], 'meta_query' => array($outstanding));
				
				query_posts( $args);

				

				if(have_posts()) :
				while ( have_posts() ) : the_post();
					projectTheme_get_post_awaiting_compl();
				endwhile;
				
				if(function_exists('wp_pagenavi')):
				wp_pagenavi(); endif;
				
				 else:
				echo '<div class="my_box3 border_bottom_0"> <div class="box_content">   ';
				_e("There are no projects yet.",'ProjectTheme');
				echo '</div>  </div> ';
				endif;
				
				wp_reset_query();
				
				?>
                
      
        
  		</div>      
<?php
		ProjectTheme_get_users_links();

}
	
?>