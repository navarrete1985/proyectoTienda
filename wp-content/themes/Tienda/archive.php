<?php
    get_header();
    the_post();
?>

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
    <?php             
						    if ( have_posts() ) {    
						            // Hallamos el total de post devueltos
						            $total_results = $wp_the_query->post_count;
						            if ( $total_results > 1) {
						                        $results = $total_results." POSTS";
						            }else{
						                        $results = $total_results." POST";
						            };
						    }else{
						            $results = "ENTRADAS";
						    }

						 if ( have_posts() ) {  

						          if ( is_category() ) {
						              // visualizamos la descripción de la categoría
						              $title_archives = 'Category Archives for:  '. '<span class="searchwords2">' . single_cat_title( '', false ) . ' </span>' ;

						          } elseif ( is_tag() ) {
						              // visualizamos la descripción del tag
						              $title_archives = 'Tag Archives for:  ' .'<span class="searchwords2">' . single_tag_title( '', false ) . '</span>' ;

						          } elseif ( is_author() ) {
						              /* accedemos al primer posts, de esta forma podemos acceder
						               * al autor con el que estamos tratando, si es el caso
						              */
						              the_post();
						              $title_archives = 'Author Archives for: ' . '<span class="vcard"><a class="url fn n searchwords" href="' 
						              . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) 
						              . '" rel="me">' . get_the_author() . '</a> </span>';
						              /* Como hemos llamado a the_post() antes, necesitamos
						               * volver al principio del LOOP para recorrerlo correctamente
						               * sin saltarnos el primer post que devuelva
						               */
						              rewind_posts();

						          } elseif ( is_day() ) {
						            $title_archives = 'Daily Archives:  ' . '<span class="searchwords">' . get_the_date() . ' </span>'  ;

						          } elseif ( is_month() ) {
						            $title_archives = 'Monthly Archives:  ' . '<span class="searchwords">' . get_the_date( 'F Y' ) . ' </span>'  ;

						          } elseif ( is_year() ) {
						            $title_archives = ' Yearly Archives:  ' . '<span class="searchwords">' . get_the_date( 'Y' ) . ' </span>'  ;
						          } else {
						            $title_archives = 'Archives '  ;
						          }
      							?>

        <div class="wrapper">
            <section id="portada" class="module-header default-height parallax bg-light bg-light-60 bg-film bloqueflex" data-background="<?php echo bloginfo('template_directory') . '/assets/img/default.jpg';?>">
                <div class="container">
                    <div class="row justify-content-center">
                        <h1><?php echo $title_archives;?></h1>
                    </div>
                </div>
            </section>

            <div class="container">
                <!-- Start post-content Area -->
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header2">
                                <h2><?php echo $results;?>&nbsp;ENCONTRADOS </h2>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Título</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php /* Start the Loop again */ ?>
                                        <?php while ( have_posts() ) : the_post();  
			                  get_template_part('templates/content', 'list');  
			              endwhile; ?>
                                </tbody>
                            </table>

                            <?php
        // Previous/next page navigation.
                    echo '<div class="text-center"><hr>';
                    the_posts_pagination( array(
                        'prev_text'          => 'Previous page' ,
                        'next_text'          => 'Next page' ,
                        'title_li' => null,
                        'before_page_number' => '<span class="meta-nav screen-reader-text"> </span>',
                    ) );
                    echo '</div><br/><br /><br />';
        ?>
                                <?php    
        } else {
                echo 'No post founds ...';
            };
            //    wp_reset_postdata(); 
        ?>
                        </div>
                    </div>

                </section>
                <!-- End post-content Area -->

            </div>
            <!-- Blog end-->
            <?php
    get_footer();
?>