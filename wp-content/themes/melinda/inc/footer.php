<div class="main-f-top">
	<div class="container">
		<div class="row">
			<?php if (get_theme_option('footer--col_1') && is_active_sidebar('footer_1')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('footer--col_1')); ?>">
					<?php dynamic_sidebar('footer_1'); ?>
				</div>
			<?php } ?>
			<?php if (get_theme_option('footer--col_2') && is_active_sidebar('footer_2')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('footer--col_2')); ?>">
					<?php dynamic_sidebar('footer_2'); ?>
				</div>
			<?php } ?>
			<?php if (get_theme_option('footer--col_3') && is_active_sidebar('footer_3')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('footer--col_3')); ?>">
					<?php dynamic_sidebar('footer_3'); ?>
				</div>
			<?php } ?>
			<?php if (get_theme_option('footer--col_4') && is_active_sidebar('footer_4')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('footer--col_4')); ?>">
					<?php dynamic_sidebar('footer_4'); ?>
				</div>
			<?php } ?>
			<?php if (get_theme_option('footer--col_5') && is_active_sidebar('footer_5')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('footer--col_5')); ?>">
					<?php dynamic_sidebar('footer_5'); ?>
				</div>
			<?php } ?>
			<?php if (get_theme_option('footer--col_6') && is_active_sidebar('footer_6')) { ?>
				<div class="col-sm-<?php echo absint(get_theme_option('footer--col_6')); ?>">
					<?php dynamic_sidebar('footer_6'); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
