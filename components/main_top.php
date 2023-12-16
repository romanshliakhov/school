<?php function display_main_top_section($tagname = 'h1', $title = '', $text = '') { ?>
	<div class="main-top">
		<?php if ($title): ?>
			<<?php echo $tagname; ?> class="main-top__title">
			<?php echo $title; ?>
			</<?php echo $tagname; ?>>
		<?php endif; ?>

		<?php if ($text): ?>
			<div class="main-top__text">
				<?php echo $text; ?>
			</div>
		<?php endif; ?>
	</div>
<?php } ?>