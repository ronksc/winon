<?php
/**
 * @package melinda
 */
?>

<div class="post-masonry_meta">

	<span class="post-masonry_date"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time></span>

	<?php if (!post_password_required() && comments_open() && get_comments_number() != 0) { ?>
		<a href="<?php comments_link(); ?>" class="post-masonry_comments"><span class="icon-speech-bubble"></span> <?php comments_number('0', '1', '%'); ?></a>
	<?php } ?>

</div>
