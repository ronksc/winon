<?php
/**
 * @package melinda
 */
?>

<div class="post-single-meta">

	<span class="post-single-meta_date"><?php esc_html_e('Posted on', 'melinda'); ?> <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time></span>

	<span class="post-single-meta_separator">/</span>

	<?php esc_html_e("by", 'melinda'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="post-single-meta_author-lk"><?php the_author(); ?></a>

	<?php if (melinda_categorized_blog()) { ?>
		<span class="post-single-meta_separator">/</span>
		<span class="post-single-meta_cats"><?php esc_html_e("in", 'melinda'); ?> <?php the_category(', '); ?></span>
	<?php } ?>

	<?php if (!post_password_required() && comments_open() && get_comments_number() != 0) { ?>
		<span class="post-single-meta_separator">/</span>
		<span class="post-single-meta_comments"><a href="<?php comments_link(); ?>"><i class="fa fa-comment comment-icon"></i> <?php comments_number( esc_html__('No comments', 'melinda'), esc_html__('1 comment', 'melinda'), esc_html__('% comments', 'melinda') ); ?></a></span>
	<?php } ?>

</div>

<header class="post-single-h-w">
	<?php the_title( '<h1 class="post-single-h">', '</h1>' ); ?>
</header>