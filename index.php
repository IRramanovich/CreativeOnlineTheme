<?php get_header(); ?>
<body>
<div class="wrapper container">
    <div class="bunnerContainerFull">
        <img src="<?php echo get_template_directory_uri();?>/assets/img/bunner/fullBanner.jpg">
    </div>
    <header>
        <div class="container" id="mainMenuContainer">
            <div class="row">
                <div class="col-1 logo">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/mainLogo.jpg">
                </div>
                <div class="col-11 menu">
                    <div class="row mainMenu">
                        <div class="menuHeader">
                            <div>Creative</div>
                            <div>Online</div>
                        </div>
                        <div class="col-10 menuItem">
                            <ul>
                                <li>Новости</li>
                                <li>pro.обзор</li>
                                <li>кейсы</li>
                                <li>бизнес</li>
                                <li>технологии</li>
                                <li>фестивали</li>
                            </ul>
                        </div>
                        <div class="menuButton">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="row subMenu">
                        <div class="weather">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <span>Минск +12</span>
                        </div>
                        <div class="exchangeRate" >
                            <span class="dollars"><span>$</span> 1.952</span>
                            <span class="euro"><span>€</span> 2.080</span>
                            <span class="rubel"><span>R</span> 103.02</span>
                        </div>
                        <div class="subMenuMiddle" >
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <span>цифра дня</span>
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <span>фото дня</span>
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <span>вакансии</span>
                            <i class="fa fa-circle" aria-hidden="true"></i>
                        </div>
                        <div class="subMenuRight">
                            <span>о проекте</span>
                            <span>реклама</span>
                            <span>контакты</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- start main container -->
    <div class="container mainContent" >
        <!-- start first row -->

        <div class="row">
            <?php
            $query = new WP_Query( 'post_type=post' );

            $article_items = [];

            foreach( $query->posts as $post){
                $row = [];
                $count_item_in_row = 0;

                $post_type = get_the_trems($post->ID, 'preview_type');

                switch ($post_type->slug) {
                    case 'dig_image':
                        $count_item_in_row += 2;
                        break;
                    case 'middle_image':
                        $count_item_in_row += 1;
                        break;
                    case 'small_image':
                        $count_item_in_row += 1;
                        break;
                }

                if ($count_item_in_row < 4) {
                    $row[] = $post;
                } elseif ($count_item_in_row == 4) {

                } elseif ($count_item_in_row > 4) {

                }
            }
            wp_reset_postdata();
            while ( $query->have_posts() ) {
                $query->the_post();
                $post_id = get_the_ID();
                //the_title(); // выведем заголовок поста
                $post_types = get_the_terms($post_id, 'preview_type');
//                var_dump($post_types);
                switch ($post_types[0]->slug) {

                    case "dig_image":
                        ?>
                        <div class="item double">
                            <a href="/">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bigItem.jpg">
                            </a>
                            <div class="itemContent">
                                <div class="topRow">
                                    <div class="itemLabel">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/videoWhite.jpg">
                                    </div>
                                    <div class="itemDate">
                                        <span>22 мая 2017</span>
                                    </div>
                                </div>
                                <div class="itemTags">
                                    <span>#кейсы</span>
                                </div>
                                <div class="itemTitle">
                                    <span>Провокационные рекламные кампании: 20 примеров с сексуальным контентом</span>
                                </div>
                                <div class="itemDescription">
                                    <span>Работает ли секс в рекламе?</span>
                                </div>
                                <div class="itemViews">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    case "middle_image":
                        ?>
                        <div class="item medium">
                            <a href="/">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mediumItem.jpg">
                            </a>
                            <div class="itemContent">
                                <div class="topRow">
                                    <div class="itemLabel">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/videoWhite.jpg">
                                    </div>
                                    <div class="itemTags">
                                        <span>#интервью</span>
                                    </div>
                                </div>
                                <div class="itemDate">
                                    <span>22 мая 2017</span>
                                </div>
                                <div class="itemTitle">
                                    <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                                </div>
                                <div class="itemViews">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    case "small_image":
                        ?>
                        <div class="item single">
                            <div class="itemImg">
                                <a href="/">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/smallItem.jpg">
                                </a>
                            </div>
                            <div class="itemTitle">
                                <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                            </div>
                            <div class="itemRow">
                                <div class="itemTags">
                                    <span>#кейсы</span>
                                </div>
                                <div class="itemViews">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>

                        <?php
                        break;
                }
            }
             ?>
            <div class="item single banner">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/bunner/sideBanner.jpg">
                </a>
            </div>
        </div>
        <!-- end first row -->
        <!-- start second row -->
        <div class="row">
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="vacansyContainer">
                    <div class="vacansyHeader">
                        <i class="fa fa-circle" aria-hidden="true"></i>
                        <span>Вакансии</span>
                    </div>
                    <div class="vaconsyItem">
                        <span class="vacansyName">Консалтинговое агентство «МаркСист» и бизнес-школа «КАПИТАЛ» приглашают в команду</span>
                        <span class="vacansyPosition">маркетерак</span>
                    </div>
                    <div class="vaconsyItem">
                        <span class="vacansyName">UNFPA Country Office in Belarus looks for Project </span>
                        <span class="vacansyPosition">Communication/Advocacy Specialist</span>
                    </div>
                    <div class="vaconsyItem">
                        <span class="vacansyName">Агентство Vondel ищет </span>
                        <span class="vacansyPosition">аккаунт-менеджера</span>
                    </div>
                    <div class="vaconsyItem">
                        <span class="vacansyName">HOT Vacancy: Uber is looking for </span>
                        <span class="vacansyPosition">Communications Specialist</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end second row -->
        <!-- start third row -->
        <div class="row">
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item double">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/bigItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemDate">
                            <span>22 мая 2017</span>
                        </div>
                    </div>
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemTitle">
                        <span>Провокационные рекламные кампании: 20 примеров с сексуальным контентом</span>
                    </div>
                    <div class="itemDescription">
                        <span>Работает ли секс в рекламе?</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri();?>/assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end third row -->
        <!-- start fourth row -->
        <div class="row">
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item medium">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/mediumItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemTags">
                            <span>#интервью</span>
                        </div>
                    </div>
                    <div class="itemDate">
                        <span>22 мая 2017</span>
                    </div>
                    <div class="itemTitle">
                        <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- start fourth row -->
        <!-- start pagination -->
        <div class="row pagination">
            <div class="paginationContainer">
                <span class="activPage">1</span>
                <span>2</span>
                <span>3</span>
                <span class="nexPage">
                       <i class="fa fa-angle-right" aria-hidden="true"></i>
                   </span>
                <span class="endPage">
                       <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                   </span>
            </div>
        </div>
        <!-- end pagination -->
    </div>
    <!-- end main container -->
    <div class="container bunnerContainerFull">
        <img src="<?php echo get_template_directory_uri();?>/assets/img/bunner/fullBanner.jpg">
    </div>
    <div class="container newsContent heading">
        <div class="row">
            <h2>Новости</h2>
        </div>
        <div class="row">
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemListContainer">
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- items list container -->
            </div>
        </div>
    </div><!-- end newsContent-->
    <div class="container proViewContent heading">
        <div class="row">
            <h2>pro.обзор</h2>
        </div>
        <div class="row">
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single bunner">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/bunner/sideBunner_2.png">
            </div>
        </div>
    </div><!-- end proViewContent-->
    <div class="container casesContent heading">
        <div class="row">
            <h2>Кейсы</h2>
        </div>
        <div class="row">
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end casesContent-->
    <div class="container businessContent heading">
        <div class="row">
            <h2>Бизнес</h2>
        </div>
        <div class="row">
            <div class="item double">
                <a href="/">
                    <img src="assets/img/bigItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemDate">
                            <span>22 мая 2017</span>
                        </div>
                    </div>
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemTitle">
                        <span>Провокационные рекламные кампании: 20 примеров с сексуальным контентом</span>
                    </div>
                    <div class="itemDescription">
                        <span>Работает ли секс в рекламе?</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item single">
                <div class="itemImg">
                    <a href="/">
                        <img src="assets/img/smallItem.jpg">
                    </a>
                </div>
                <div class="itemTitle">
                    <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                </div>
                <div class="itemRow">
                    <div class="itemTags">
                        <span>#кейсы</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div> <!-- single item -->
            <div class="item single">
                <div class="itemListContainer">
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="itemListItem">
                        <div class="itemContentIcon">
                            <img src="assets/img/icon/videoGreen.jpg">
                        </div>
                        <div class="itemListContentContainer">
                            <div class="itemListTitle">
                                <span>Агентство Archer Troy еще раз напомнило о безопасности во время</span>
                            </div>
                            <div class="itemListStat">
                                <div class="itemListEye">
                                    <span>1254</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- items list container -->
            </div>
        </div>
    </div><!-- end businessContent -->
    <div class="container casesContent heading">
        <div class="row">
            <h2>Интервью</h2>
        </div>
        <div class="row">
            <div class="item medium">
                <a href="/">
                    <img src="assets/img/mediumItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemTags">
                            <span>#интервью</span>
                        </div>
                    </div>
                    <div class="itemDate">
                        <span>22 мая 2017</span>
                    </div>
                    <div class="itemTitle">
                        <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item medium">
                <a href="/">
                    <img src="assets/img/mediumItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemTags">
                            <span>#интервью</span>
                        </div>
                    </div>
                    <div class="itemDate">
                        <span>22 мая 2017</span>
                    </div>
                    <div class="itemTitle">
                        <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item medium">
                <a href="/">
                    <img src="assets/img/mediumItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemTags">
                            <span>#интервью</span>
                        </div>
                    </div>
                    <div class="itemDate">
                        <span>22 мая 2017</span>
                    </div>
                    <div class="itemTitle">
                        <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
            <div class="item medium">
                <a href="/">
                    <img src="assets/img/mediumItem.jpg">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemLabel">
                            <img src="assets/img/icon/videoWhite.jpg">
                        </div>
                        <div class="itemTags">
                            <span>#интервью</span>
                        </div>
                    </div>
                    <div class="itemDate">
                        <span>22 мая 2017</span>
                    </div>
                    <div class="itemTitle">
                        <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end casesContent-->
    <div class="container bunnerContainerFull">
        <img src="<?php echo get_template_directory_uri();?>/assets/img/bunner/fullBanner.jpg">
    </div>
    <div class="container bestForMonth heading">
        <div class="row">
            <h2>Лучшее за месяц</h2>
        </div>
        <div class="row">
            <div class="col-8 bestMonthContainer">
                <div class="row">
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 bestMonthSingle">
                        <div class="itemImg">
                            <a href="/">
                                <img src="assets/img/smallItem.jpg">
                            </a>
                        </div>
                        <div class="itemTitle">
                            <span>Режиссер «Вечного сияния чистого разума» снял 10-минутный фильм на iPhone для Apple</span>
                        </div>
                        <div class="itemRow">
                            <div class="itemTags">
                                <span>#кейсы</span>
                            </div>
                            <div class="itemViews">
                                <span>1254</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 specialProgestContainer double">
                <a href="/">
                    <img src="assets/img/bigItem-2.png">
                </a>
                <div class="itemContent">
                    <div class="topRow">
                        <div class="itemTags">
                            <span>кейс месяца</span>
                        </div>
                    </div>
                    <div class="itemDate">
                        <span>22 мая 2017</span>
                    </div>
                    <div class="itemTitle">
                        <span>Агентство Archer Troy еще раз напомнило о безопасности во время вождения</span>
                    </div>
                    <div class="itemViews">
                        <span>1254</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bunnerContainer">
        <img src="<?php echo get_template_directory_uri();?>/assets/img/bunner/banner.png">
    </div>

<?php get_footer(); ?>