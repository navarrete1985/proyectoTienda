    <div class="posts_table">
        <table>
            <tr class="head">
                <th><?php _e("Fecha"); ?></th>
                <th><?php _e("Titulo"); ?></th>
                <th><?php _e("autor"); ?></th>
                <th><?php _e("Categoria"); ?></th>
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
