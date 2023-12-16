<?php
// Устанавливаем версию темы
if (!defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

// Подключение основных стилей и скриптов
function connect__assets() {
	wp_enqueue_style('main_style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
	wp_enqueue_script('main_script', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'connect__assets');

// Наши  технологии

function theme_setup() {
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');


function create_technologies_post_type() {
	register_post_type('technologies', array(
		'labels' => array(
			'name' => 'Технологии',
			'singular_name' => 'Технология',
			'add_new' => 'Добавить технологию',
			'add_new_item' => 'Добавить новую технологию',
			'edit_item' => 'Редактировать технологию',
			'new_item' => 'Новая технология',
			'view_item' => 'Просмотр технологии',
			'search_items' => 'Искать технологии',
			'not_found' => 'Технологии не найдены',
			'not_found_in_trash' => 'В корзине технологии не найдены',
			'all_items' => 'Все технологии',
			'menu_name' => 'Технологии'
		),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'technologies'),
		'supports' => array('title', 'thumbnail'),
		'menu_icon' => 'dashicons-hammer'
	));
}

add_action('init', 'create_technologies_post_type');


// Изменение меток для стандартных типов постов
function change_post_labels() {
	global $wp_post_types;

// Получение объекта post
	$post_object = $wp_post_types['post'];

// Изменение меток
	$post_object->labels->name = 'Наша команда';
	$post_object->labels->singular_name = 'Разработчик';
	$post_object->labels->add_new = 'Добавить разработчика';
	$post_object->labels->add_new_item = 'Добавить разработчика';
	$post_object->labels->edit_item = 'Редактировать разработчика';
	$post_object->labels->new_item = 'Новый разработчик';
	$post_object->labels->view_item = 'Просмотреть разработчика';
	$post_object->labels->search_items = 'Искать разработчика';
	$post_object->labels->not_found = 'Разработчики не найдены';
	$post_object->labels->not_found_in_trash = 'В корзине разработчика не найдены';
	$post_object->labels->all_items = 'Все разработчики';
	$post_object->labels->menu_name = 'Наша команда';
	$post_object->labels->name_admin_bar = 'Разработчика';

	add_theme_support('post-thumbnails');
}

add_action('init', 'change_post_labels');

// Изменение иконки стандартных типов постов
function change_post_icon() {
	global $menu;
	$icon_class = 'dashicons-groups';
	foreach ($menu as $key => $value) {
		if ($menu[$key][2] == 'edit.php') {
			$menu[$key][6] = $icon_class;
		}
	}
}
add_action('admin_menu', 'change_post_icon');

function remove_post_taxonomies() {
	unregister_taxonomy_for_object_type('category', 'post');
	unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'remove_post_taxonomies');


// Записи проэктов
function create_custom_post_projects() {
	// Регистрация кастомного типа записи
	$args = array(
		'labels' => array(
			'name'                  => 'Наши проекты', // общее название для типа записи
			'singular_name'         => 'Проект', // название для одной записи этого типа
			'menu_name'             => 'Наши проекты', // название меню
			'name_admin_bar'        => 'Проект', // строка для добавления через админ-бар
			'add_new'               => 'Добавить новый', // для добавления новой записи
			'add_new_item'          => 'Добавить новый проект', // заголовок для добавления новой записи
			'new_item'              => 'Новый проект', // текст для новой записи
			'edit_item'             => 'Редактировать проект', // для редактирования записи
			'view_item'             => 'Просмотреть проект', // для просмотра записи
			'all_items'             => 'Все проекты', // для всех записей этого типа
			'search_items'          => 'Искать проекты', // для поиска записей этого типа
			'parent_item_colon'     => 'Родительский проект:', // для родительской записи
			'not_found'             => 'Проекты не найдены', // если записи не найдены
			'not_found_in_trash'    => 'В корзине проектов не найдено', // если в корзине нет записей
		),

		'public' => true,
		'has_archive' => true,
		'supports' => array('title'),
		'menu_icon' => 'dashicons-portfolio'
	);

	register_post_type('our_projects', $args);
}

add_action('init', 'create_custom_post_projects');

function create_project_taxonomies() {
	// Добавление новой таксономии иерархического типа, как категории
	$labels = array(
		'name'              => 'Категории проектов',
		'singular_name'     => 'Категория проекта',
		'search_items'      => 'Искать категории проектов',
		'all_items'         => 'Все категории проектов',
		'parent_item'       => 'Родительская категория проекта',
		'parent_item_colon' => 'Родительская категория проекта:',
		'edit_item'         => 'Изменить категорию проекта',
		'update_item'       => 'Обновить категорию проекта',
		'add_new_item'      => 'Добавить новую категорию проекта',
		'new_item_name'     => 'Название новой категории проекта',
		'menu_name'         => 'Категории проектов',
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'project-category'),
	);

	register_taxonomy('project_category', array('our_projects'), $args);
}

add_action('init', 'create_project_taxonomies', 0);




function register_menu() {
	register_nav_menus(array(
		'main_nav' => 'Основное меню'
	));
}
add_action('after_setup_theme', 'register_menu');

function disable_plugin_updates($value) {
	if (isset($value) && is_object($value)) {
		if (isset($value->response) && is_array($value->response)) {
			foreach ($value->response as $plugin => $data) {
				unset($value->response[$plugin]);
			}
		}
	}
	return $value;
}
add_filter('site_transient_update_plugins', 'disable_plugin_updates');

function remove_head_scripts() {
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	remove_action('wp_head', 'wp_print_styles', 99);
	remove_action('wp_head', 'wp_enqueue_style', 99);

	add_action('wp_footer', 'wp_print_scripts', 5);
	add_action('wp_footer', 'wp_enqueue_scripts', 5);
	add_action('wp_footer', 'wp_print_head_scripts', 5);
	add_action('wp_head', 'wp_print_styles', 30);
	add_action('wp_head', 'wp_enqueue_style', 30);

	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('global-styles');
	wp_dequeue_style('classic-theme-styles');

	wp_deregister_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'remove_head_scripts');

// Отключение автоматических тегов в Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// опций ACF
if (function_exists('acf_add_options_sub_page')) {
	acf_add_options_sub_page();
}

// Подключение helpers
load_template(get_template_directory() . '/helpers/string_translates.php', true);
load_template(get_template_directory() . '/components/main_top.php', true);
