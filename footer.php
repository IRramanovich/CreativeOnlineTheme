<div class="container specProgect">
    <div class="specProgectContent">
        <a href="/">
            <img src="assets/img/specProgect.png">
        </a>
        <div class="itemContent">
            <div class="topRow">
                <div class="itemTags">
                    <span>#спецпроект</span>
                </div>
            </div>
            <div class="itemTitle">
                <span>Медовые миксы Jola от украинского агентства Tough Slate Design</span>
            </div>
            <div class="itemDescription">
                <span>Украинское креативное агентство Tough Slate Design разработала дизайн этикетки и упаковки</span>
            </div>
            <div class="itemViews">
                <span>1254</span>
            </div>
        </div>
    </div>
</div>
<div class="container footer">
    <div class="row">
        <div class="col-4 socialMedia">
            <div class="socialLabel">Подпишись!</div>
            <div class="socialButtonContainer">
                <div class="facebook"></div>
                <div class="tweeter"></div>
                <div class="instagram"></div>
            </div>
        </div>
        <div class="col-4 footerLogo">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/footerLogo.png">
        </div>
        <div class="col-4 subscribeContainer">
            <div class="subscriberLabel">Подписатся на рассылку</div>
            <div class="subsscribeContent">
                <input type="text" class="subscribeInputText" placeholder="Введите свой e-mail">
                <input type="button" class="subscribeButton" value="Подписаться">
                <div class="subscribeContentLibel"><span>Включить уведомления.</span> Спама не будет.</div>
            </div>
        </div>
    </div>
</div>
</div><!-- end wrapper -->
<footer>
    <div class="container footerFullScreen">
        <div class="row">
            <div class="col-4 leftFooter">
                <div>© 2017 BYTHEWAY. CREATIVE ONLINE</div>
                <div> PUBLISHING HOUSE IDEW MEDIA BELARUS </div>
            </div>
            <div class="col-4 middleFooter">
                <span>IDEW MEDIA belarus</span>
                <span>ПРОЕКТЫ</span>
                <span>КОНТАКТЫ</span>
            </div>
            <div class="col-4 rightFooter">
                <div>ПРИ ЛЮБОМ ИСПОЛЬЗОВАНИИ МАТЕРИАЛОВ BTW.BY </div>
                <div> ССЫЛКА (ДЛЯ САЙТОВ - ГИПЕРССЫЛКА НА BWT.BY) ОБЯЗАТЕЛЬНА</div>
            </div>
        </div>
    </div>
</footer>
<div id="fullMenu">
    <div class="container">
        <div class="menuContent">
            <div class="mainFullMenu">
                <div class="fullmenuItem">новости</div>
                <div class="fullmenuItem">pro.обзор</div>
                <div class="fullmenuItem">кейсы</div>
                <div class="fullmenuItem">бизнес</div>
                <div class="fullmenuItem">технологии</div>
                <div class="fullmenuItem">интервью</div>
                <div class="fullmenuItem">фестиввали</div>
            </div>
            <div class="subFullMenu">
                <div class="fullmenuItem">цифра дня</div>
                <div class="fullmenuItem">фото дня</div>
                <div class="fullmenuItem">вакансии</div>
            </div>
            <div class="litleFullMenu">
                <div class="fullmenuItem">о проекте</div>
                <div class="fullmenuItem">фото дня</div>
                <div class="fullmenuItem">контакты</div>
            </div>
            <div class="socialFullMenu">
                <div class="facebook"></div>
                <div class="tweeter"></div>
                <div class="instagram"></div>
            </div>

        </div>
    </div>
</div>

<div id="popupSubscribe">
    <div class="container">
        <div class="popupSubscribeContent">
            <div class="mainPopupSubscribe">
                <div class="popupSubscribeTitle">
                    <span>Отлично!</span>
                </div>
                <div class="popupSubscribeMessage">
                    <span>
                       Каждную неделю мы будем отправлять Вам самые важные новости, оюзоры и самые креативные кейсы.
                    </span>
                </div>
                <div class="popupSubscribeLink">
                    <span>Вернуться</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer() ?>
<script type="application/javascript">
    $(function(){

        var elem = $('#mainMenuContainer');

        $('.menuButton').on('click', function() {
            $('#fullMenu').show();
        });

        $('#fullMenu').on('click', function () {
            $(this).hide();
        });

        $('.subscribeButton').on('click', function() {
            $('#popupSubscribe').show();
        });

        $('.popupSubscribeLink').on('click', function() {
            $('#popupSubscribe').hide();
        });

        $(window).scroll(function(){

            var top = window.pageYOffset;
            var left = $('.mainContent')[0].getBoundingClientRect().left;
            var cl = elem[0].className;
            if (top >= 116) {
                if ((cl.indexOf('fixedMenu') == -1)){
                    elem[0].className += ' fixedMenu';
                }
            } else if(top <= 116) {
                if (cl.indexOf('fixedMenu') !== -1){
                    elem[0].className = elem[0].className.substr(0, 9);
                }
            }
        });



    });
</script>
</body>
</html>
