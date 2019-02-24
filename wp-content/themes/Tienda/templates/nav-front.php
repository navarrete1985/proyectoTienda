<div class="inner-navigation">
	<ul id="menu-additional-menu" class="">
		<li id="menu-item-315" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-315">
			<a href="<?php echo get_option('home');?>">Inicio</a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a href="<?= get_site_url() ?>/tienda"/>Tienda</a>
		</li>
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a href="<?php echo get_page_link(get_page_by_title('blog')->ID); ?>">Blog</a>
		</li>		
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a href="<?php echo get_page_link(get_page_by_title('about')->ID); ?>">La empresa</a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a href="<?php echo get_page_link(get_page_by_title('contact')->ID); ?>">Contacto</a>
		</li>
		
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
			<a href="<?php echo get_template_directory_uri ()?>/tienda/login" class="far fa-user fa-2x"></a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314 ">
			<a href="<?php echo get_template_directory_uri ()?>/tienda/search" class="fas fa-search fa-2x"></a>
		</li>		
		
	</ul>
</div>   