<?php $build_folder = get_template_directory_uri() . 'assets/' ?>

<!DOCTYPE html>
<html class="fixed-block" <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="Description" content="<?php bloginfo('description'); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>

	<?php load_template( get_template_directory() . '/helpers/fonts.php', true );?>
    <?php wp_head();?>

<!--	--><?php // $lang = pll_current_language();?>

<!--	--><?php // $languages = pll_the_languages(array('raw' => 1)); ?>
	
</head>

<body <?php body_class(); ?>>
	<?php load_template( get_template_directory() . '/components/custom_header.php', true );?>
<main>
