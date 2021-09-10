<!DOCTYPE html>
<html lang="de">

<?php include('head.php') ?>
<?php include('header.php') ?>

	<body>
		<main>
			<div class="page-content">
				<?php
				if ( have_posts() ) :
		        while ( have_posts() ) : the_post();?>
		          	<h1>
		            	<?php the_title();?>
		          	</h1>
								<?php
								the_content();
								$current_page_ID = $post->ID;
								$sub_pages = new WP_QUERY(array('post_type'=>'page', 'post_parent'=>$current_page_ID, 'orderby'=>'menu_order', 'order'=>'ASC'));
								if ( $sub_pages->have_posts() ):
										while( $sub_pages->have_posts() ): $sub_pages->the_post();?>
												<h2 id="<?php echo($post->post_name)?>">
							            <?php the_title();?>
							          </h2>
												<?php
												the_content();
												$current_sub_page_ID = $post->ID;
												$sub_sub_pages = new WP_QUERY(array('post_type'=>'page', 'post_parent'=>$current_sub_page_ID, 'orderby'=>'menu_order', 'order'=>'ASC'));
												if ( $sub_sub_pages->have_posts() ):
														while( $sub_sub_pages->have_posts() ): $sub_sub_pages->the_post();?>
																<h3 id="<?php echo($post->post_name)?>">
											            <?php the_title();?>
											          </h3>
																<?php
																the_content();
																$current_sub_sub_page_ID = $post->ID;
																$sub_sub_sub_pages = new WP_QUERY(array('post_type'=>'page', 'post_parent'=>$current_sub_sub_page_ID, 'orderby'=>'menu_order', 'order'=>'ASC'));
																if ( $sub_sub_sub_pages->have_posts() ):
																		while( $sub_sub_sub_pages->have_posts() ): $sub_sub_sub_pages->the_post();?>
																				<h4>
															            <?php the_title();?>
															          </h4>
																				<?php
																				the_content();
																		endwhile;
																endif;
														endwhile;
												endif;
										endwhile;
								endif;
		       	endwhile;
						wp_reset_query();
		    endif;
		    ?>
			</div>
		</main>
	</body>
</html>
