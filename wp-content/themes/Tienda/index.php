<?php

    global $wp;
    $current_slug = add_query_arg(array(), $wp -> request);

    get_header();
?>

<!-- Header-->
<header class="header">
	<div class="container">
		<div class="inner-header">
			<a class="inner-brand" href="../index.html">
				<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />
				<img class="brand-light" src="<?php echo bloginfo('template_directory') . '/img/uploads/2017/05/additional-logo.png';?>" style="max-height: 60px;" />
			</a>
		</div>
<?php
		get_template_part('templates/nav','front');
?>
	</div>
</header>

<div class="wrapper">
<!--    <section  id="portada" class="module-header default-height parallax bg-light bg-light-60 bg-film bloqueflex" data-background="<?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!-------------------- Inicio Post Quote ---------------------------------->
<!--                <div  id="content-quote" class="col-sm-12">-->
<!--  Inicio del loop  -->
<!--< ?php-->
<!--					$args = array(-->
<!--						'post_format' => 'post-format-quote',-->
<!--						'posts_per_page' => 6,-->
<!--					);-->
								
<!--					$post_quote = new WP_Query($args);-->
								
<!--					if ($post_quote -> have_posts()):-->
<!--						while ($post_quote -> have_posts()):-->
<!--							$post_quote -> the_post();-->
<!--							get_template_part('templates/content',get_post_format());-->
<!--						endwhile;	-->
<!--					endif;-->
<!--					wp_reset_postdata();-->
<!--?>-->
<!--  Fin del loop  -->
<!--                </div>-->
<!-------------------- Fin Post Quote ------------------------------------->				
<!--            </div>-->
<!--        </div>-->
<!--    </section>	-->
	
	<section class="module-header bg-light bg-light-60" data-background="<?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>" style="background-image: none; background-attachment: scroll; background-size: auto;" data-jarallax-original-styles="background-image: url('<?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>');">
            
	<!--<section  id="portada" class="module-header default-height parallax bg-light bg-light-60 bg-film bloqueflex" data-background="< ?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>">-->
	<!--	<div class="wrapper">-->
            <!--<section class="module parallax bg-light bg-light-60" data-background="<?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>">-->
                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-3"></div>-->
                        <div class="col-sm-12">
                            <div class="blog-quote-parallax tms-slides owl-carousel">
                                <?php
									$args = array(
										'post_format' => 'post-format-quote',
										'posts_per_page' => 6,
									);
									
									$post_quote = new WP_Query($args);
												
									if ($post_quote -> have_posts()):
										while ($post_quote -> have_posts()):
											$post_quote -> the_post();
								?>
								<div class="tms-item">
								    <div class="tms-content">
								        <p><?= get_the_content(); ?></p>
								    </div>
								</div>
								<?php
										endwhile;	
									endif;
									wp_reset_query();
								?>
                            </div>
                        </div>
                        <!--<div class="col-md-3"></div>-->
                    </div>
                    <!--Fin de row-->
        <!--        </div>-->
            <!--</section>-->
        <!--</div>-->
    </section>
    
    <section class="module" id="sectionB2">
        <div class="container">    
<!-------------------- Inicio Post Destacado ---------------------------------->
	        <div class="row destacado">
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
					get_template_part('templates/last',get_post_format());
				endif;
				wp_reset_postdata();
?>
<!--  Fin del loop  -->
	        </div>
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
							'tax_query' => array( 
					                        	array(
					                            	'taxonomy' => 'post_format',
					                                'field' => 'slug',
					                                'terms' => array('post-format-quote'),
					                                'operator' => 'NOT IN'
					                            ),
					                        ),							
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




