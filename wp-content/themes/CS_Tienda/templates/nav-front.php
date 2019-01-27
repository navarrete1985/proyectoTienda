<div class="inner-navigation">
	<ul id="menu-additional-menu" class="">
		<li id="menu-item-315" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-315">
			<a href="<?php echo get_option('home');?>">Home</a>
		</li>
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a href="<?php echo get_page_link(get_page_by_title('blog')->ID); ?>">Blog</a>
		</li>		
		<li id="menu-item-313" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-313">
			<a href="<?php echo get_page_link(get_page_by_title('about')->ID); ?>">About</a>
		</li>
		<li id="menu-item-314" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-314">
			<a href="<?php echo get_page_link(get_page_by_title('contact')->ID); ?>">Contact</a>
		</li>
	</ul>
</div>