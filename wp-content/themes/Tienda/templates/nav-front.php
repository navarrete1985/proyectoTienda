<?php 
    global  $current_slug;
?> 

<div class="inner-navigation">
	<ul id="menu-additional-menu" class="">
		<li id="menu-item-315" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-315">
			<a href="<?php echo get_option('home');?>"><span class="<?php if($current_slug == "home") {echo "is_active";};?>">Inicio</span></a>
		</li>
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a href="<?php echo get_page_link(get_page_by_title('blog')->ID); ?>"><span class="<?php if($current_slug == "blog") {echo "is_active";};?>">Blog</span></a>
		</li>		
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a  href="<?php echo get_page_link(get_page_by_title('about')->ID); ?>"><span class="<?php if($current_slug == "about") {echo "is_active";};?>">La empresa</span></a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a  href="<?php echo get_page_link(get_page_by_title('contact')->ID); ?>"><span class="<?php if($current_slug == "contact") {echo "is_active";};?>">Contacto</span></a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a  href="<?php echo get_page_link(get_page_by_title('archives')->ID); ?>"><span class="<?php if($current_slug == "archives") {echo "is_active";};?>">Archivos</span></a>
		</li>		

<?php
        if (is_user_logged_in) {
            $user = wp_get_current_user();
            $name = $user -> user_firstname;                    
?> 	
			<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
				<a href="<?php echo get_page_link(get_page_by_title('private')->ID); ?>"><?php echo $name; ?></a>
			</li>
<?php                    
        }else {
?>		
			<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
				<a  href="<?php echo get_page_link(get_page_by_title('customLogin')->ID); ?>" class="far fa-user fa-2x"></a>
			</li>
<?php
        }        
?>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
			<a href="<?php echo get_template_directory_uri ()?>/tienda/search" class="fas fa-search fa-2x"></a>
		</li>		
	</ul>
</div>   