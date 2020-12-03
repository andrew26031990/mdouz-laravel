<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- <base href="/"> -->

    <title>Министерство Дошкольного Образования Узбекистана</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token"
          content="MvqGIB4vQo31W5jK3yji5h2yMT0ej93kkisGcpne-t91tLRDU14OyaAj_vK3d7ONWOt3Sl_2saahfmU6tIGx7Q==">

    <!-- Template Basic Images Start -->
    <link rel="icon" href="http://mdo.uz/img/favicon1.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="http://mdo.uz/img/apple-touch-icon-180x180.png">
    <!-- Template Basic Images End -->

    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#000">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="{{url('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/main.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/pgwslider.min.css')}}" rel="stylesheet">
</head>
<body>

<header class="header">

    <div class="header-top">
        <div class="container">
            <div class="header-top-content">
                <div class="header-top-link">
                    <a id="specialButton" href="#" style="z-index: 999">
                        <img src="{{url('frontend/icons/eye_icon.png')}}" width="30px" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ"/>
                    </a>
                    <a id="specialButton" href="{{$socials[1]->link}}" style="z-index: 999">
                        <img src="{{url('frontend/icons/facebook_icon.png')}}" width="30px"/>
                    </a>
                    <a id="specialButton" href="{{$socials[3]->link}}" style="z-index: 999">
                        <img src="{{url('frontend/icons/instagram_icon.png')}}" width="30px"/>
                    </a>
                    <a id="specialButton" href="{{$socials[0]->link}}" style="z-index: 999">
                        <img src="{{url('frontend/icons/telegram_icon.png')}}" width="30px"/>
                    </a>
                    <a id="specialButton" href="{{$socials[2]->link}}" style="z-index: 999">
                        <img src="{{url('frontend/icons/youtube_icon.png')}}" width="30px"/>
                    </a>
                </div>

                <div class="header-top-right">
                    <ul class="header-lang">
                        @foreach($language as $lang)
                            <li>
                                <a class="{{$lang->url == app()->getLocale() ? 'active' : ''}}" lang_url="{{$lang->url}}" href="{{url($lang->url.'/'.$lang->slug)}}">
                                    {{$lang->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <form action="http://mdo.uz/ru/article" method="GET" class="header-search">
                        <p class="header-search-field-wrap">
                            {{--<input type="text" name="s" class="header-search-field">--}}
                            <div class="ya-site-form ya-site-form_inited_no" data-bem="{&quot;action&quot;:&quot;https://yandex.ru/search/site/&quot;,&quot;arrow&quot;:false,&quot;bg&quot;:&quot;transparent&quot;,&quot;fontsize&quot;:12,&quot;fg&quot;:&quot;#000000&quot;,&quot;language&quot;:&quot;ru&quot;,&quot;logo&quot;:&quot;rb&quot;,&quot;publicname&quot;:&quot;Поиск по сайту mdo.uz&quot;,&quot;suggest&quot;:true,&quot;target&quot;:&quot;_self&quot;,&quot;tld&quot;:&quot;ru&quot;,&quot;type&quot;:2,&quot;usebigdictionary&quot;:true,&quot;searchid&quot;:2435748,&quot;input_fg&quot;:&quot;#000000&quot;,&quot;input_bg&quot;:&quot;#ffffff&quot;,&quot;input_fontStyle&quot;:&quot;normal&quot;,&quot;input_fontWeight&quot;:&quot;normal&quot;,&quot;input_placeholder&quot;:&quot;&quot;,&quot;input_placeholderColor&quot;:&quot;#000000&quot;,&quot;input_borderColor&quot;:&quot;#7f9db9&quot;}">
                                <form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8">
                                    <input type="hidden" name="searchid" value="2435748"/>
                                    <input type="hidden" name="l10n" value="ru"/>
                                    <input type="hidden" name="reqenc" value=""/>
                                    <input type="search" class="header-search-field" name="text" value=""/>
                                    <input type="submit" value="Найти"/>
                                </form>
                            </div>
                            <style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
                        </p>
                        <button type="button" class="header-search-btn" aria-label="search"><img
                                src="{{url('frontend/img/seach.png')}}" alt="">
                        </button>
                    </form>
                    <div class="burger d-flex d-lg-none">
                        <input type="checkbox" id="burgerBtn" class="burger-checkbox d-none">
                        <label for="burgerBtn">
                            <img src="{{url('frontend/img/burger.png')}}" alt="burger">
                        </label>
                    </div>
                    <nav class="header-nav">
                        <ul class="header-menu">
                            {{--menu--}}
                            @if($menu)
                                @include('site.menu.menu', ['items'=>$menu->roots()])
                            @endif
                            {{--menu--}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-middle-content">
                <a href="/" class="header-logo">
                    <img src="{{url('frontend/img/ru-logo.png')}}" alt="logo">
                </a>
                <nav class="header-nav">

                    <ul class="header-menu">
                        {{--menu--}}
                        @if($menu)
                            @include('site.menu.menu', ['items'=>$menu->roots()])
                        @endif
                        {{--menu--}}
                    </ul>
                </nav>
                <p class="header-gerb">
                    <img src="{{url('frontend/img/gerb.png')}}"
                         alt="Республика Узбекистан">
                    Республика Узбекистан </p>
            </div>

        </div>
    </div>
</header>

<main class="main">
    <div class="container">
        <div class="wrapper">
            <aside class="sidebar">
                <div class="dao-search-block">
                    <a href="http://old.mdo.uz/" class="dao-search-block-link">статистика</a>
                    <div style="width: 100%;height: 40%;border-bottom: 1px solid white;">
                        <div style="width: 63%; position: relative;">
                            <div>
                                <img style="margin-top: 5px" src="{{url('frontend/img/baby-boy.svg')}}" />
                            </div>
                            <div style="width: 100%">
                                <div style="float: right;background-color: white;">sdfsdfssdfsfsdf</div>
                                <div style="float: right;background-color: white;">sdfsdfssdfsfsdf</div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%;height: 60%;border-bottom: 1px solid white;">
                        <div style="width: 63%; position: relative;">
                            <img style="margin-top: 5px" src="{{url('frontend/img/school.svg')}}" />
                            <div style="float: right">sdfsdfssdfsfsdf</div>
                        </div>
                    </div>
                </div>
                <div class="dao-search-block">
                    <img style="width: 100%; height: 100%;margin-bottom: 58px;"
                         src="{{url('frontend/img/borekan_zorekan.png')}}">
                    <a href="" class="dao-search-block-link">Журнал bor ekan zor ekan</a>
                </div>
                <div class="tenders-block">
                    <div class="tenders-block-content">
                        <div class="title-wrap">
                            <h2 class="title"><img
                                    src="{{url('frontend/img/graph.png')}}" alt="">Тендерные
                                торги</h2>
                            <div class="tenders-block-slider-dots">
                                <button role="button" class="owl-dot active"><span></span></button>
                                <button role="button" class="owl-dot"><span></span></button>
                            </div>
                        </div>
                        <div class="owl-carousel tenders-block-slider owl-loaded owl-drag">


                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                     style="transform: translate3d(-900px, 0px, 0px); transition: all 0s ease 0s; width: 2700px;">
                                    <div class="owl-item cloned" style="width: 450px;">
                                        <div class="tenders-block-slider-item">
                                            <p class="tenders-block-slider-item-date">26 ноября 2019</p>
                                            <p class="tenders-block-slider-item-text"></p>
                                            <a href="http://mdo.uz/ru/article/view"
                                               class="tenders-block-slider-item-link">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 450px;">
                                        <div class="tenders-block-slider-item">
                                            <p class="tenders-block-slider-item-date">24 апреля 2020</p>
                                            <p class="tenders-block-slider-item-text"></p>
                                            <a href="http://mdo.uz/ru/article/view"
                                               class="tenders-block-slider-item-link">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 450px;">
                                        <div class="tenders-block-slider-item">
                                            <p class="tenders-block-slider-item-date">26 ноября 2019</p>
                                            <p class="tenders-block-slider-item-text"></p>
                                            <a href="http://mdo.uz/ru/article/view"
                                               class="tenders-block-slider-item-link">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 450px;">
                                        <div class="tenders-block-slider-item">
                                            <p class="tenders-block-slider-item-date">24 апреля 2020</p>
                                            <p class="tenders-block-slider-item-text"></p>
                                            <a href="http://mdo.uz/ru/article/view"
                                               class="tenders-block-slider-item-link">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 450px;">
                                        <div class="tenders-block-slider-item">
                                            <p class="tenders-block-slider-item-date">26 ноября 2019</p>
                                            <p class="tenders-block-slider-item-text"></p>
                                            <a href="http://mdo.uz/ru/article/view"
                                               class="tenders-block-slider-item-link">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 450px;">
                                        <div class="tenders-block-slider-item">
                                            <p class="tenders-block-slider-item-date">24 апреля 2020</p>
                                            <p class="tenders-block-slider-item-text"></p>
                                            <a href="http://mdo.uz/ru/article/view"
                                               class="tenders-block-slider-item-link">Подробнее...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev"></button>
                                <button type="button" role="presentation" class="owl-next"></button>
                            </div>
                        </div>
                        <a href="http://mdo.uz/ru/news/tags/tendernye-torgi" class="tenders-block-show-all">Смотреть
                            все...</a>
                    </div>
                </div>

                <div class="sidebar-contacts d-none d-md-block">
                    <div class="sidebar-contacts-content">
                        <p class="sidebar-contacts-phone-text">Телефон доверия</p>
                        <a href="tel:+998 (71) 239-33-79" class="sidebar-contacts-phone">
                            <img src="{{url('frontend/img/phone-1.png')}}"
                                 alt="Телефон доверия">
                            +998 (71) 239-33-79 </a>
                        {{url('/')}}
                        <p class="sidebar-contacts-callback-text">Обратная связь</p>
                        <a href="http://support.mdo.uz/" class="sidebar-contacts-callback-btn">
                            <img src="{{url('frontend/img/speach.png')}}"
                                 alt="Жалобы и предложения">
                            Жалобы и предложения </a>
                    </div>
                </div>
            </aside>
            <div class="main-content" style="width: 100%;">

                @yield('content')
                <div class="ministries">
                    <a href="https://president.uz/" target="_blank" class="ministries-block">
                        <img src="{{url('frontend/img/gerb-small.png')}}"
                             alt="Официальный Веб-сайт Президента Республики Узбекистан">
                        <p>Официальный Веб-сайт Президента Республики Узбекистан</p>
                    </a>
                    <a href="http://constitution.uz/" target="_blank" class="ministries-block">
                        <img src="{{url('frontend/img/const_uz.png')}}"
                             alt="Конституция Республики Узбекистан">
                        <p>Конституция Республики Узбекистан</p>
                    </a>
                    <a href="https://my.gov.uz/" target="_blank" class="ministries-block">
                        <img src="{{url('frontend/img/my_gov_uz.png')}}"
                             alt="Единый портал интерактивных государственных услуг">
                        <p>Единый портал интерактивных государственных услуг</p>
                    </a>
                    <a href="https://data.gov.uz/" target="_blank" class="ministries-block">
                        <img src="{{url('frontend/img/data_gov_uz.png')}}"
                             alt="Портал открытых данных Республики Узбекистан">
                        <p>Портал открытых данных Республики Узбекистан</p>
                    </a>
                </div>

            </div>
            <div class="sidebar-contacts d-block d-md-none">
                <div class="sidebar-contacts-content">
                    <p class="sidebar-contacts-phone-text">Телефон доверия</p>
                    <a href="tel:+998 (71) 239-33-79" class="sidebar-contacts-phone"><img
                            src="{{url('frontend/img/phone-1.png')}}" alt="">+998 (71)
                        239-33-79</a>
                    <p class="sidebar-contacts-callback-text">Обратная связь</p>
                    <button class="sidebar-contacts-callback-btn"><img
                            src="{{url('frontend/img/speach.png')}}"
                            alt="Жалобы и предложения">Жалобы и предложения
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer-content">


            <div class="footer-block">
                <p class="footer-block-title">Открытые данные</p>
                <ul class="footer-block-menu">
                    <li><a href="http://mdo.uz/ru/news/otkrytye-dannye">Статистика</a></li>
                    <li><a href="http://mdo.uz/ru/news/struktura-ministerstva">О гендерном равенстве</a></li>
                    <li><a href="http://mdo.uz/ru/news/vakansii">О вакансиях</a></li>
                </ul>
            </div>
            <div class="footer-block">
                <p class="footer-block-title">Тендеры, объявления, финансы</p>
                <ul class="footer-block-menu">
                    <li><a href="http://mdo.uz/ru/news/grafik-priema-obrasenij">О тендерах</a></li>
                    <li><a href="http://mdo.uz/ru/news/poradok-obrasenij">Объявления</a></li>
                    <li><a href="http://mdo.uz/ru/news/virtualnaa-priemnaa">О финансовых учетах</a></li>
                </ul>
            </div>

            <div class="footer-block contacts">
                <p class="footer-block-title">Контакты</p>
                <p class="footer-block-contact"><img
                        src="{{url('frontend/img/pin.png')}}" alt="">100070, Город
                    Ташкент, Мирабадский район, улица Амира Темура, 17</p>
                <p class="footer-block-contact"><img
                        src="{{url('frontend/img/mail.png')}}" alt="">E-mail: <a
                        href="mailto:devon@mdo.uz">devon@mdo.uz</a></p>
            </div>
        </div>
    </div>
</footer>

<div>
</div>
{{--<!--[if lt IE 9]>--}}
{{--<script src="/assets/c1b83f63/dist/html5shiv.min.js"></script>--}}
{{--<![endif]-->--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        let pgwSlider = $('.pgwSlider').pgwSlider({
            'listPosition': 'left',
            'verticalCentering': true,
            'adaptiveHeight': true
        });
        pgwSlider.stopSlide();
    });
</script>
<script src="{{url('frontend/js/Popper.js')}}"></script>
<script src="{{url('frontend/js/pgwslider.min.js')}}"></script>
<script src="{{url('frontend/js/libs.min.js')}}"></script>
<script src="{{url('frontend/js/custom.js')}}"></script>
<script src="{{url('frontend/js/common.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>
{{--<script src="https://lidrekon.ru/slep/js/jquery.js"></script>--}}
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>
</body>
</html>
