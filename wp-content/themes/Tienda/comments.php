    <ul class="media-list">  
<?php    
    $args2 = array(
            'style' => 'ul',
            'avatar_size' => 72,
            'type' => 'comment', 
        );
    
    wp_list_comments($args2);
?>
    </ul>  
<?php
    $args = array(
            'title_reply' => '<h4 class="comments-title font-alt">¿Y tu qué opinas?</h4>',
            'comment_notes_before' => '<p>Tu e-mail no se mostrará.</p>',
        );
    
    comment_form($args);
?>  
    
