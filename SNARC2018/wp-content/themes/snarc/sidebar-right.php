
<?php
//$srcURL = "http://localhost/SNARC2018/wp-content/themes/snarc/";
?>
<div class="snarc_sidebar2">

<?php
if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
	<?php  dynamic_sidebar( 'home_right_1' ); ?>
	</div> <!-- #primary-sidebar -->
<?php  endif; ?>

</div><!-- end .sidebar2 -->
