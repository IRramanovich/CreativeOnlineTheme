<!-- start first row -->
<?php

$article_items = place_preview_sort();
$flag = false;
foreach ($article_items as $article_row_item) {
    $row_lenght = 0;
?>
    <div class="row">
        <?php
        foreach ($article_row_item as $article_single_item) {
            $post_id = $article_single_item->ID;
            $post_types = get_the_terms($post_id, 'preview_type');
            $row_lenght += $GLOBALS['item_price_place'][$post_types[0]->slug];
            switch ($post_types[0]->slug) {
                case "dig_image":
                    $locate_template = locate_template("index_template/preview_template/big_preview_item.php");
                    if( $locate_template ) {
                        require $locate_template;
                    }
                    else {
                        // Файл не найден
                        print ("template not found");
                    }
                    break;
                case "middle_image":
                    $locate_template = locate_template("index_template/preview_template/middle_preview_item.php");
                    if( $locate_template ) {
                        require $locate_template;
                    }
                    else {
                        // Файл не найден
                        print ("template not found");
                    }
                    break;
                case "small_image":
                    $locate_template = locate_template("index_template/preview_template/small_preview_item.php");
                    if( $locate_template ) {
                        require $locate_template;
                    }
                    else {
                        // Файл не найден
                        print ("template not found");
                    }
                    break;
            }
        }
        if ($row_lenght < 4) {
            $template_uri = "index_template/bunner_template/single_bunner.php";
            if ($flag) {
                $template_uri = "index_template/bunner_template/vacansy_item.php";
                $flag = !$flag;
            }
            $locate_template = locate_template($template_uri);
            if( $locate_template ) {
                require $locate_template;
                $flag = !$flag;
            }
            else {
                // Файл не найден
                print ("template not found");
            }
        }
        ?>
    </div>
<!-- end first row -->
<?php
}
?>