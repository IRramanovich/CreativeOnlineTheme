<?php
//глобальные переменные
global $item_price_place;
$item_price_place = array(
    'dig_image' => 2,
    'middle_image' =>  1,
    'small_image' => 1
);
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
        'jquery_my',
        get_template_directory_uri() . '/skripts/jquery-3.2.1.js',
        null,
        '3.2.1',
        true
    );

    wp_enqueue_script('jquery_my');
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

//Функция сортировки постов по строкам для выводв
function place_preview_sort() {
    $query = new WP_Query( 'post_type=post' );
    $article_items = [];

    $item_place_map = [3, 4, 3, 4, 4];

    foreach($item_place_map as $item_plase){

        $row = [];
        $count_item_in_row = 0;
        $deferred_posts = [];
        while (($count_item_in_row < $item_plase) && (count($query->posts) > 0)) {
            $post = array_shift($query->posts);
            $post_type = get_the_terms($post->ID, 'preview_type');
            $current_occupied_place = $count_item_in_row + $GLOBALS['item_price_place'][$post_type[0]->slug];

            if ($current_occupied_place < $item_plase) {
                $row[] = $post;
                $count_item_in_row = $current_occupied_place;
            } elseif ($current_occupied_place == $item_plase) {
                $row[] = $post;
                $count_item_in_row = $current_occupied_place;
                $article_items[] = $row;
                $row = [];
                if (count($deferred_posts) > 0) {
                    $query->post = array_merge($deferred_posts, $query->post);
                    $deferred_posts = [];
                }
            } elseif ($current_occupied_place > $item_plase) {
                $deferred_posts[] = $post;
            }
        }

        if (count($row) > 0) {
            $article_items[] = $row;
        }
    }

    return $article_items;
}


































