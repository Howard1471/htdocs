
<?php
//$srcURL = "http://localhost/SNARC2018/wp-content/themes/snarc/";
?>
<div class="snarc_sidebar1">
    <ul class="snarc_nav">
		<?php
        wp_nav_menu( array( 
            'theme_location' => 'visitor_menu', 
            'container_class' => 'custom-menu-class' ) ); 
        ?>
	</ul>

	<?php if ( is_active_sidebar( 'home_left_1' ) ) : ?>
        <!--<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">-->
            <?php dynamic_sidebar( 'home_left_1' ); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>
</div><!-- end of snarc_sidebar1 -->
