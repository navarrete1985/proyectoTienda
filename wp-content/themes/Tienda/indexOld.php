<?php
    get_header();
?>

<!-- Preloader
<div class="page-loader">
	<div class="loader">Loading...</div>
</div>
 Preloader end-->

<!-- Header-->
<header class="header">
	<div class="container">
		<div class="inner-header">
			<a class="inner-brand" href="../index.html">
				<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/main-logo.png';?>" style="max-height: 60px;"/>
				<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png';?>" style="max-height: 60px;" />
			</a>
		</div>
<?php
		get_template_part('templates/nav','front');
?>
	</div>
</header>
<!-------------------- Inicio Post Destacado ---------------------------------->
<!--  Inicio del loop  -->
<?php
	$args = array(
		'post_type' => array ('post'),
		'posts_per_page' => 1,
		'tax_query' => array( 
                        	array(
                            	'taxonomy' => 'post_format',
                                'field' => 'slug',
                                'terms' => array(
                                	         'post-format-gallery', 
                                             'post-format-link', 
                                             'post-format-image', 
                                             'post-format-quote', 
                                             'post-format-audio'
                                    		),
                                'operator' => 'NOT IN'
                            ),
                        ),        
	);
				
	$post_destacado = new WP_Query($args);
				
	if ($post_destacado -> have_posts()):
		$post_destacado -> the_post();
		$ID_destacado = $post -> ID;
	endif;
	wp_reset_postdata();
					
/*-- Fin del loop --> */
	get_template_part('templates/last',get_post_format());
?>	
<!-------------------- Fin Post Destacado ------------------------------------->				

				
<!-------------------- Inicio Posts del Blog ---------------------------------->				
				<div class="row">
					<div class="col-sm-8">
						<div class="row blog-masonry">
<!-- inicio del lopp -->	
<?php 
							$paged = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
							$args = array(
								'posts_per_page' => 4,
								'paged' => $paged,
								'post__not_in' => array($ID_destacado),
							);

						    $custom_query = new WP_Query($args);
						    if ( $custom_query->have_posts() ): 
						    	while ($custom_query->have_posts()): 
						    		$custom_query->the_post(); 
									get_template_part('templates/content', get_post_format()); 
								endwhile; 
							endif;
							wp_reset_query();						
?>						
<!-- fin del loop -->					
						</div>
<!-------------------- Fin Posts del Blog ------------------------------------->				

<!-- Pagination-->
						<div class="row">
							<div class="col-sm-12">
<?php
								$args = array(
											'mid_size' => 2,
											'prev_text' => __('Atras','textdomain'),
											'next-text' => __('Onward','textdomain')				
										);
										
								the_posts_pagination($args);
?>
<!--								<ul class="pagination font-alt">
									<li class="active">
										<span>1</span>
									</li>
									<li>
										<a href="page/2/index.html">2</a>
									</li>
									<li class="next">
										<a href="page/2/index.html" ><i class="fa fa-angle-right"></i></a>
									</li>
									<li class="prev"></li>
								</ul>   -->
							</div>
						</div>
<!-- Pagination end-->
					</div>

<!-- Sidebar-->
					<div class="col-sm-4">
						<?php get_sidebar(); ?>
					</div>
<!-- Sidebar end-->
				</div>
			
			</div>
		</section>
<!-- Blog end-->

<?php
    get_footer();
?>
