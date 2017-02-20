<?php
/**
 * @package melinda
 */
?>

<?php if (melinda_categorized_blog()) { ?>
	<div class="post-metro_category">
		<?php the_category(' '); ?>
	</div>
<?php } ?>
