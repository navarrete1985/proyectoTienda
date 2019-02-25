<div class="col-md-12">                        
    <div class="titulo bloqueflex">
        <h2> POST ENCONTRADOS:</h2>
    </div>  
    
    <div class="posts_table">
        <table>
            <tr class="head">
                <th>Fecha</th>
                <th>Titulo</th>
                <th>autor</th>
                <th>Categoria</th>
            </tr>    

<?php       while (have_posts()):
            the_post(); ?>   
                <tr>
                    <td><p><?php echo get_the_date('d-m-Y'); ?> ; <?php the_time('g: i a'); ?></p></td>
                    <td><a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a></td>
                    <td><p><?php the_author(); ?></p></td>
                    <td><p><?php the_category(); ?></p></td>
                </tr>
<?php       endwhile; ?>
        </table>                     
    </div> 
</div>