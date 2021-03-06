<?php 
    global  $current_slug;
?> 

<div class="inner-navigation">
	<ul id="menu-additional-menu" class="">
		<li id="menu-item-315" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-315">
			<a href="<?php echo get_option('home');?>"><span class="texto <?php if($current_slug == "home") {echo "is_active";};?>"><?php _e("Inicio"); ?></span></a>
		</li>
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a href="<?php echo get_page_link(get_page_by_title('blog')->ID); ?>"><span class="texto <?php if($current_slug == "blog") {echo "is_active";};?>"><?php _e("Blog"); ?></span></a>
		</li>		
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a  href="<?php echo get_page_link(get_page_by_title('about')->ID); ?>"><span class="texto <?php if($current_slug == "about") {echo "is_active";};?>"><?php _e("La empresa"); ?></span></a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a  href="<?php echo get_page_link(get_page_by_title('contact')->ID); ?>"><span class=" texto<?php if($current_slug == "contact") {echo "is_active";};?>"><?php _e("Contacto"); ?></span></a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a  href="https://proyecto-tienda-navarrete.c9users.io/tienda/index/main"><span class="texto"><?php _e("Tienda"); ?></span></a>
		</li>		
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a  href="<?php echo get_page_link(get_page_by_title('archives')->ID); ?>"><span class="texto <?php if($current_slug == "archives") {echo "is_active";};?>"><?php _e("Archivos"); ?></span></a>
		</li>
		
	<!--	<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
			<a  href="<?php /*echo get_page_link(get_page_by_title('customLogin')->ID);*/ ?>" class="far fa-user fa-2x"></a>
		</li> -->
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
			<a href="<?php echo get_template_directory_uri ()?>/tienda/search" class="fas fa-search fa-2x"></a>
		</li>			
<?php
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            $name = $user -> user_firstname;                    
?> 	
			<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
				<a class="perfil" href="<?php echo get_page_link(get_page_by_title('private')->ID); ?>"><?php echo $name; ?></a>
			</li>
<?php                    
        }else {
?>		
			<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
				<a  href="<?php echo get_page_link(get_page_by_title('customLogin')->ID); ?>" class="far fa-user fa-2x"></a>
			</li>
<?php
        }   
        
		$idioma = getLanguage();
		
		enviar_consola($idioma);

		if($idioma == "es"){
?>			
			<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
				<img id="lang" data-lang="es" src="<?php echo bloginfo('template_directory') . '/assets/img/flagUSsmall.png'; ?>">
			</li>
<?php			
		} else {
?>			
			<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
				<img id="lang" data-lang="en" src="<?php echo bloginfo('template_directory') . '/assets/img/flagESsmall.png'; ?>">
			</li>
<?php			
		}
?>
	</ul>
</div>   