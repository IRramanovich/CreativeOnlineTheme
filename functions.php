<?php
// подключаем стили и скрипты
function creative_theme_style() {
    wp_register_style(
        'font_awesome',
        get_template_directory_uri() . '/css/font-awesome.css',
        null,
        '4.7.0',
        'screen'
    );

    wp_register_style(
        'font_ProximaNova',
        get_template_directory_uri() . '/css/font-ProximaNova.css',
        null,
        '1.0',
        'screen'
    );

    wp_register_style(
        'font_Merriweather',
        get_template_directory_uri() . '/css/font-Merriweather.css',
        null,
        '1.0',
        'screen'
    );

    wp_register_style(
        'bootstrap',
        get_template_directory_uri() . '/css/bootstrap.css',
        null,
        '1.0',
        'screen'
    );

    wp_register_style(
        'bootstrap_grid',
        get_template_directory_uri() . '/css/bootstrap-grid.css',
        null,
        '1.0',
        'screen'
    );

    wp_register_style(
        'bootstrap_reboot',
        get_template_directory_uri() . '/css/bootstrap-reboot.css',
        null,
        '1.0',
        'screen'
    );

    wp_register_style(
        'main_style',
        get_template_directory_uri() . '/css/style.css',
        null,
        '1.0',
        'screen'
    );

    wp_enqueue_style('font_awesome');
    wp_enqueue_style('font_ProximaNova');
    wp_enqueue_style('font_Merriweather');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('bootstrap_grid');
    wp_enqueue_style('bootstrap_reboot');
    wp_enqueue_style('main_style');
}

function creative_theme_script() {
    wp_register_script(
        'jquery',
        get_template_directory_uri() . '/skripts/jquery-3.2.1.js',
        null,
        '3.2.1',
        true
    );
}

add_action('wp_enqueue_scripts', 'creative_theme_style');

add_action('wp_enqueue_scripts', 'creative_theme_script');

//подключаем миниатюру статьи
add_theme_support( 'post-thumbnails', array( 'post' ) );

//добавляем возможность выбора типа превь записи в качестве кастомной таксономии
function add_new_taxonomi() {
    register_taxonomy(
        'preview_type',
        array('post'),
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Тип превью',
                'singular_name' => 'Превью',
                'search_items' =>  'Найти превью',
                'popular_items' => 'Популярные превью',
                'all_items' => 'Все превью',
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => 'Редактировать превью',
                'update_item' => 'Обновить превью',
                'add_new_item' => 'Добавить новый тип превью',
                'new_item_name' => 'Название нового типа превью',
                'separate_items_with_commas' => 'Разделяйте превью запятыми',
                'add_or_remove_items' => 'Добавить или удалить превью',
                'choose_from_most_used' => 'Выбрать из наиболее сачто используемых превью',
                'menu_name' => 'Типы превью'
            ),
            'public' => true,
            'show_in_nav_mneu' => true,
            'show_ui' => true,
            'show_tagcloud' => false,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'platform',
                'hierarchical' => false
            ),
        )
    );
}

add_action('init', 'add_new_taxonomi', 0);

//


































