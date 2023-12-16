<ul class="lang-list">
	<?php if(function_exists('pll_the_languages')):
		$languages = pll_the_languages(array(
			'echo' => 0,
			'show_flags' => 0,
			'show_names' => 1,
			'hide_if_no_translation' => 0,
			'hide_if_empty' => 0,
			'display_names_as' => 'slug',
			'force_home' => 1,
			'hide_current' => 0,
			'raw' => 1
		));

		foreach($languages as $lang) : $class = ($lang['current_lang']) ? 'active' : ''; ?>
			<li class="lang-list__item">
				<a class="lang-list__link <?= $class; ?>" href="<?= esc_url($lang['url']); ?>"><?= esc_html($lang['name']); ?></a>
			</li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>
