<?php
/**
 * @package melinda
 */
?>

<?php if (melinda_categorized_blog()) { ?>
	<div class="post-grid_category">
		<?php the_category(' '); ?>
	</div>
<?php } ?>
