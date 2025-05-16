<?php
    $columns_number = !empty($args['columns_number']) ? $args['columns_number'] : aiero_get_theme_mod('project_archive_columns_number');
    $item_class     = !empty($args['item_class']) ? $args['item_class'] : 'project-item-wrapper';
    $text_position  = !empty($args['text_position']) ? $args['text_position'] : 'outside';
    $listing_type   = !empty($args['listing_type']) ? $args['listing_type'] : 'grid';
    $content_type   = !empty($args['content_type']) ? $args['content_type'] : '';
    $excerpt_length = !empty($args['excerpt_length']) ? $args['excerpt_length'] : '';
    $read_more_text = !empty($args['read_more_text']) ? $args['read_more_text'] : esc_html__('Explore more', 'aiero');
    $audio_text     = !empty($args['audio_text']) ? $args['audio_text'] : esc_html__('Listen speech', 'aiero');
    $audio_content_image_even = !empty($args['audio_content_image_even']) ? $args['audio_content_image_even'] : '';
    $audio_content_image_odd = !empty($args['audio_content_image_odd']) ? $args['audio_content_image_odd'] : '';
    $counter        = isset($args['counter']) ? $args['counter'] : 0;
?>

<div <?php post_class($item_class); ?>>
    <div class="project-item">
    	<?php 
    		if( $listing_type === 'grid' || $listing_type === 'masonry') { 
    			if ( $text_position === 'inside' ) { ?>
    				<div class="project-item-link">
			            <?php
		            		echo '<span class="project-item-media">';
			                    echo aiero_portfolio_grid_media_output(null, $columns_number, $listing_type);
			                echo '</span>';
			                if ( !empty(aiero_taxonomy_output('aiero_project_category')) ) {
		                        echo '<div class="project-item-categories">';
		                            echo aiero_taxonomy_output('aiero_project_category', '', true, null, '<span class="button-inner"></span>');
		                        echo '</div>';
		                    }
		                	echo '<span class="project-item-content-wrapper">';
		                		if ( !empty(get_the_title()) ) {
		                            echo '<span class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></span>';
		                        }
		                        if ( $listing_type === 'grid' ) {
		                        	echo '<span class="project-item-content">';
				                    	if ( !empty(get_the_excerpt()) ) {
				                    		echo '<span class="post-excerpt">';
						                        if (!empty($excerpt_length)) {
						                            echo substr(get_the_excerpt(), 0, $excerpt_length);
						                        } else {
						                            the_excerpt();
						                        }
						                    echo '</span>';
				                    	}			                        
				                		echo '<span class="post-more-button">';
					                        echo '<a href="' . esc_url(get_the_permalink()) .'">' . esc_html($read_more_text) . '</a>';
					                    echo '</span>';
				                    echo '</span>';
		                        }			                    
		                    echo '</span>';
			            ?>
		        	</div>
    			<?php } 
    			else { ?>
    				<a href="<?php the_permalink(); ?>" class="project-item-link">
			            <?php
		            		echo '<span class="project-item-media">';
			                    echo aiero_portfolio_grid_media_output(null, $columns_number, $listing_type);
			                echo '</span>';
			            ?>
			        </a>
			        <?php 
			        echo '<div class="project-item-content">';			        	
	                    if ( !empty(aiero_taxonomy_output('aiero_project_category')) ) {
	                        echo '<div class="project-item-categories">';
	                            echo aiero_taxonomy_output('aiero_project_category', '', true, null, '<span class="button-inner"></span>');
	                        echo '</div>';
	                    }
	                    if (!empty(get_the_title())) {
	                        echo '<div class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></div>';
	                    }
	                    if ( $listing_type === 'grid' ) {
	                    	if ( !empty(get_the_excerpt()) ) {
	                    		echo '<span class="post-excerpt">';
			                        if (!empty($excerpt_length)) {
			                            echo substr(get_the_excerpt(), 0, $excerpt_length);
			                        } else {
			                            the_excerpt();
			                        }
			                    echo '</span>';
	                    	}			                        
	                		echo '<span class="post-more-button">';
		                        echo '<a href="' . esc_url(get_the_permalink()) .'">' . esc_html($read_more_text) . '</a>';
		                    echo '</span>';
                        }
	                echo '</div>';
    			} ?>
    		<?php }
    		elseif( $listing_type === 'slider' ) {
				echo '<span class="project-item-content">';
					if( $content_type === 'audio' ) {
						$thumbnails = rwmb_meta('project_audio_image', ['limit' => 1]);
						if( !empty($thumbnails)) {
							$thumbnail = reset($thumbnails);
							echo '<span class="project-audio-image">';
								echo '<img src="' . esc_url($thumbnail['url']) . '" alt="' . esc_attr($thumbnail['alt']) . '"/>';
							echo '</span>';
						}
						if ( $counter % 2 == 0 && !empty($audio_content_image_even) ) {
							echo '<span class="project-audio-content-image">';
	                    		echo wp_kses_post($audio_content_image_even);
	                    	echo '</span>';
	                    } elseif ( $counter % 2 == 1 && !empty($audio_content_image_odd) ) {
	                    	echo '<span class="project-audio-content-image">';
	                    		echo wp_kses_post($audio_content_image_odd);
	                    	echo '</span>';
	                    }
						echo '<span class="project-audio-content-wrapper">';							
							if ( !empty(get_the_title()) ) {
		                        echo '<span class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></span>';
		                    }		                    
							$audios = rwmb_meta('project_audio_file', ['limit' => 1]);
							if ( !empty($audios) ) {
								$audio = reset($audios);
								echo '<span class="project-audio-wrapper">';
									echo '<audio src="' . esc_url($audio['url']) . '">Your browser does not support the audio element.</audio>';
									echo '<button class="aiero-button play-audio">';
										echo esc_html($audio_text);
										echo ' <span class="button-inner"></span>';
									echo '</a>';
								echo '</span>';
							}
						echo '</span>';
					}
    				if ( $content_type !== 'audio' ) {
    					if ( !empty(aiero_taxonomy_output('aiero_project_category')) ) {
	                        echo '<div class="project-item-categories">';
	                            echo aiero_taxonomy_output('aiero_project_category', '', true, null, '<span class="button-inner"></span>');
	                        echo '</div>';
	                    }
	                    if ( !empty(get_the_title()) ) {
	                    	echo '<span class="post-title">' . get_the_title() . '</span>';
	                    }
                    }
                echo '</span>';
                if( $content_type !== 'audio' ) {
                	echo '<span class="project-slider-item-wrapper">';
	        			echo '<span class="project-item-media">';
		                    echo aiero_portfolio_grid_media_output(null, $columns_number, $listing_type);
		                echo '</span>';	                		
		                echo '<span class="project-item-content">';
		                	if ( !empty(aiero_taxonomy_output('aiero_project_category')) ) {
		                        echo '<div class="project-item-categories">';
		                            echo aiero_taxonomy_output('aiero_project_category', '', true, null, '<span class="button-inner"></span>');
		                        echo '</div>';
		                    }
		                	if (!empty(get_the_title())) {
		                        echo '<span class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></span>';
		                    }
		                    echo '<span class="post-excerpt-wrapper">';
		                		echo '<span class="post-excerpt">';
			                        if (!empty($excerpt_length)) {
			                            echo substr(get_the_excerpt(), 0, $excerpt_length);
			                        } else {
			                            the_excerpt();
			                        }
			                    echo '</span>';
		                		echo '<span class="post-more-button">';
			                        echo '<a href="' . esc_url(get_the_permalink()) .'">' . esc_html($read_more_text) . '</a>';
			                    echo '</span>';
		                    echo '</span>';
		                echo '</span>';
		            echo '</span>';
                }        		
    		}
    		elseif( $listing_type === 'modern' ) { ?>
    			<div class="project-item-modern-header">
    				<span class="project-item-modern-year"><?php echo esc_html(aiero_get_post_option('project_year')); ?></span>
    				<h4 class="project-item-modern-title"><?php echo get_the_title(); ?></h4>
    			</div>
    			<div class="project-item-modern-content">
    				<div class="project-item-media">
    					<a href="<?php echo esc_url(get_the_permalink()) ?>">
			                <?php echo aiero_portfolio_grid_media_output(null, $columns_number, $listing_type); ?>
			            </a>
		            </div>
		            <div class="post-excerpt">
                        <?php 
	                        if (!empty($excerpt_length)) {
	                            echo substr(get_the_excerpt(), 0, $excerpt_length);
	                        } else {
	                            the_excerpt();
	                        }
                        ?>
                    </div>
                    <div class="post-more-button">
                        <a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo esc_html($read_more_text); ?></a>
                    </div>
    			</div>
    		<?php
    		}
    		elseif( $listing_type === 'cards' ) { ?>
    			<div class="project-item-link">
    				<?php
    					if( !empty(aiero_get_prepared_img_url('project_cards_image')) ) { ?>
    						<span class="project-item-media">
			                	<img src="<?php echo aiero_get_prepared_img_url('project_cards_image');?>" class="project-cards-image"/>
			                </span>
    					<?php }
    				?>
    				<div class="project-item-content">
    					<?php
	    					if ( !empty(aiero_taxonomy_output('aiero_project_category')) ) { ?>
		                        <div class="project-item-categories">
		                            <?php echo aiero_taxonomy_output('aiero_project_category', '', true, null, '<span class="button-inner"></span>'); ?>
		                        </div>
		                    <?php }
		                    if( !empty(get_the_title()) ) { ?>
	    						<div class="post-title">
				                	<a href="<?php echo esc_url(get_the_permalink())?>"><?php echo get_the_title(); ?></a>
				                </div>
	    					<?php }
		                ?>
    				</div>
    				<span class="post-more-button">
                        <a href="<?php echo esc_url(get_the_permalink());?>"><?php echo esc_html($read_more_text); ?></a>
                    </span>
	            </div>
    		<?php }
    	?>
        
    </div>
</div>