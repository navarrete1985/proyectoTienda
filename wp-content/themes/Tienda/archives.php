<?php
	/*
		Template Name: archives	
	*/

    global $wp;
    $current_slug = add_query_arg(array(), $wp -> request);

    $before1 = '<div class="small-archive-text"><h5>';
    $before2 = '</h5><ul>';
    $after = '</ul></div>';
    $pattern = '/<\/a> \(([0-9]+)\)/';                                           // localiza el número
    $pattern1 = '~(&nbsp;)(\(\d++\))~';                                          // localiza el &nbsp
    $pattern2 = '/[\(\)]/';                                                      // localizamos paréntesis      
    $replacement = '</a><span>\\1 posts</span>';   
    $replacement1 = '$1<span>$2 posts</span>';  
    $replacement2 = '';     
    
	get_header();
?>
<!-- Header-->
	<header class="header">
			<div class="container">
				<div class="inner-header">
					<a class="inner-brand" href="../index.html">
						<img class="brand-dark" src="<?php echo bloginfo('template_directory') . '/assets/img/minelli.png';?>" style="max-height: 35px;" />					
					</a>
				</div>

				<div class="inner-navigation">
					<?php get_template_part('templates/nav','front'); ?>
				</div>
			</div>
		</header>
<!-- Header end-->

	<div class="wrapper">
		<section id="header-archives" class="imgResponsiveTop module-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="h3 font-alt">Archivos</h1>
						<h1 class="h4 font-alt">Todo junto para tí</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="module">
			<div class="container">
				<div class="row blog-masonry">
<!-- Archivos-->
<!--------------------- LISTADO DE los 6 últimos post   ----------------------->
					<div class="col-sm-6 post-item">
	           		    <div class="post-block">
<?php
		                    $args = array(
		                        'type' => 'postbypost',
		                        'limit' => 6,
		                        'echo' => false
		                        );
		                    echo $before1 . 'Últimos posts' . $before2 . wp_get_archives($args) . $after;    
?>
		                </div>
            		</div>  
<!----------------- FIN LISTADO DE los 6 últimos post   ----------------------->            

<!------------------------ LISTADO DE Categorías    --------------------------->
					<div class="col-sm-6 post-item">
		                <div class="post-block">
<?php
		                    $args = array(
		                            'title_li' => '',
		                            'show_count' => true,
		                            'echo' => 0
		                        );
		                    $categorias = $before1 . 'Categorías' . $before2 . wp_list_categories($args);  
		                    $categorias = preg_replace($pattern, $replacement, $categorias);
		                    echo $categorias . $after;
?>
						</div>
 	                </div>
<!-------------------- FIN LISTADO DE Categorías    --------------------------->

<!------------------------   LISTADO DE Autores     --------------------------->
					<div class="col-sm-6 post-item">
 		               <div class="post-block">
<?php
		                    $args = array(
		                            'orderby' => 'postcount',
		                            'order' => 'ASC',
		                            'optioncount' => true, 
		                            'hide_empty' => false,
		                            'echo' => 0
		                        );
		                    $autores = $before1 . 'Autores' . $before2 . wp_list_authors($args);
		                    $autores = preg_replace($pattern, $replacement, $autores);
		                    echo $autores . $after; 
		
?>
    		            </div>
					</div>
<!---------------------- FIN LISTADO DE Autores     --------------------------->

<!--------------------------   LISTADO DE Tags     ---------------------------->
		            <div class="col-sm-6 post-item">
		                <div class="post-block">
<?php
		                    $args = array(
		                            'orderby' => 'count',
		                            'order' => 'ASC',
		                            'number' => 10
		                        );
		                    $tags = get_tags($args);
		                    echo $before1 . 'Tags' . $before2;
		                    foreach ($tags as $tag) {
		                        $link = get_tag_link($tag -> term_id);
		                        echo '<li><a href="' . $link . '">' . $tag -> name . '</a><span>' . $tag -> count . ' post</span></li>';
		                    }
		                    echo $after;
?>
		                </div>
		            </div>    
<!-------------------------FIN LISTADO DE Tags     ---------------------------->

<!----------------------   LISTADO POR Autores     ---------------------------->
<?php
		            $args = array(
		                    'fields' => array(
		                            'display_name',
		                            'ID'
		                        ),
		                );
		                
		            $autoresInd = get_users($args);
		            foreach ($autoresInd as $autor){
?>                
	                <div class="col-sm-6 post-item">
	                    <div class="post-block">
<?php
		                    echo $before1 . 'Post de: ' . $autor -> display_name . $before2;
		                    $args = array(
		                            'author' => $autor -> ID,
		                            'orderby' => 'date',
		                            'order' => 'ASC'
		                        );
		                    $posts_autor = get_posts($args);
		                    foreach ($posts_autor as $post) {
		                        echo '<li><a href="' . get_permalink($post -> ID) . '">' . $post -> post_title . '</a></li>';
		                    }
		                    echo $after;
?>                        
	                    </div>
	                </div>    
<?php
            }
?>
<!-------------------- FIN LISTADO POR Autores     ---------------------------->

<!------------------- LISTADO DE los post 6 meses ult.  ----------------------->
		            <div class="col-sm-6 post-item">
		                <div class="post-block">
<?php
			                $args = array(
			                        'type' => 'monthly',
			                        'limit' => 6,
			                        'show_post_count' => 1,
			                        'echo' => 0
			                    );    
			                $mensuales = $before1 . 'Post de los 6 ult. meses' . $before2  . wp_get_archives($args);
			                $mensuales = preg_replace($pattern1, $replacement1, $mensuales);                         //localizmos el caracter &nbsp para poner las clases
			                $mensuales = preg_replace($pattern2, $replacement2, $mensuales);                         // quitamos los paréntesis    
			                echo $mensuales . $after;
?>                
		                </div>
		            </div>    
<!--------------- FIN LISTADO DE los post 6 meses ult.  ----------------------->
 
<!----------------- LISTADO DE los 6 post más comentados  --------------------->
		            <div class="col-sm-6 post-item">
		                <div class="post-block">  
<?php
		                    $args = array(
		                            'post_type' => 'post',
		                            'orderby' => 'comment_count',
		                            'post_per_page' => 6,
		                            'comment_count' => array(
		                                    array(
		                                        'valor' => 1,
		                                        'compare' => '> ='
		                                        ),
		                                    ),
		                            
		                        );
		                    $postCount = new WP_Query($args);
		                    echo $before1 . 'Post más populares' . $before2;
		                    while ($postCount -> have_posts()):
		                        $postCount -> the_post();
		                        $numComments = get_comments_number($post -> ID);
		
		                        $html = '<li><a href="' . get_the_permalink($post -> ID) . '">' . $post -> post_title . '</a>';
		                        $html = $html . '<span>' . $numComments . ' com.</span></li>';
		                        echo $html;
		                    endwhile;   
		                    echo $after;
?>
		                </div>
		            </div>    
<!------------- FIN LISTADO DE los 6 post más comentados  --------------------->


<!-- End Archivos-->
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>