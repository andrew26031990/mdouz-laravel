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

    <link href="{{url('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/main.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/custom.css')}}" rel="stylesheet">
</head>
<body>

<header class="header">

    <div class="header-top">
        <div class="container">
            <div class="header-top-content">
                <a href="https://pm.gov.uz/ru#/authorities/1/173/_info" class="header-top-link">
                        <span>
                            <img src="{{url('frontend/img/write.png')}}"
                                 alt="Виртуальная приемная">
                            Виртуальная приемная                        </span>
                </a>
                <a href="http://mdo.uz/ru/news/struktura-ministerstva" class="header-top-link">
                        <span>
                            <img src="{{url('frontend/img/global.png')}}"
                                 alt="О структуре">
                            О структуре                        </span>
                </a>
                <a id="specialButton" href="#"><img src="https://lidrekon.ru/images/special.png" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" /></a>
                <div class="header-top-right">
                    <ul class="header-lang">
                        @foreach($language as $lang)
                            <li><a class="{{$lang->id == 3 ? 'active' : ''}}" lang_url="{{$lang->url}}" href="{{$lang->url}}">{{$lang->name}}</a></li>
                        @endforeach
                    </ul>
                    <form action="http://mdo.uz/ru/article" method="GET" class="header-search">
                        <p class="header-search-field-wrap">
                            <input type="text" name="s" class="header-search-field">
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
                                @include('site.menu', ['items'=>$menu->roots()])
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="header-middle-content">
                <a href="http://mdo.uz/" class="header-logo">
                    <img src="{{url('frontend/img/ru-logo.png')}}" alt="logo">
                </a>
                <nav class="header-nav">

                    <ul class="header-menu">
                    @if($menu)
                        @include('site.menu', ['items'=>$menu->roots()])
                    @endif
                        {{--<li class="header-menu-item"><a href="http://mdo.uz/ru/news/tags/press-centr"
                                                        class="header-menu-link">Пресс-центр</a>
                            <ul class="header-submenu">
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/video"
                                                                   class="header-submenu-link">Видео</a></li>
                                <li class="header-submenu-item"><a
                                        href="http://mdo.uz/ru/news/tags/novosti-ministerstva"
                                        class="header-submenu-link">Новости министерства</a></li>
                            </ul>
                        </li>
                        <li class="header-menu-item"><a href="http://mdo.uz/ru/news/tags/ministerstvo"
                                                        class="header-menu-link">Министерство</a>
                            <ul class="header-submenu">
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/news/tags/gender-equity"
                                                                   class="header-submenu-link">Гендерное равенство</a>
                                </li>
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/news/tags/tendernye-torgi"
                                                                   class="header-submenu-link">Тендерные торги</a></li>
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/news/tags/konkursnye-torgi"
                                                                   class="header-submenu-link">Конкурсные торги</a></li>
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/news/tags/o-ministerstve"
                                                                   class="header-submenu-link">О Министерстве</a></li>
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/news/tags/otkrytye-dannye"
                                                                   class="header-submenu-link">Открытые данные</a></li>
                                <li class="header-submenu-item"><a
                                        href="http://mdo.uz/ru/news/tags/institut-perepodgotovki-i-povysenia-kvalifikacii-rukovoditelej-i-specialistov-doskolnyh-obrazovatelnyh-ucrezdenij"
                                        class="header-submenu-link">Институт переподготовки и повышения квалификации
                                        руководителей и специалистов дошкольных образовательных учреждений</a></li>
                            </ul>
                        </li>
                        <li class="header-menu-item"><a href="http://mdo.uz/ru/news/tags/dokumenty"
                                                        class="header-menu-link">Документы</a>
                            <ul class="header-submenu">
                                <li class="header-submenu-item"><a href="http://mdo.uz/ru/news/tags/ukazy"
                                                                   class="header-submenu-link">Указы</a></li>
                            </ul>
                        </li>--}}
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
dsfsfsdf
                    </div>
                    <div style="width: 100%;height: 60%;">
sdsdfsdfsd
                    </div>
                </div>
                <div class="dao-search-block">
                    <img style="width: 100%; height: 100%;margin-bottom: 58px;" src="{{url('frontend/img/borekan_zorekan.png')}}">
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
                        <p class="sidebar-contacts-callback-text">Обратная связь</p>
                        <a href="http://support.mdo.uz/" class="sidebar-contacts-callback-btn">
                            <img src="{{url('frontend/img/speach.png')}}"
                                 alt="Жалобы и предложения">
                            Жалобы и предложения </a>
                    </div>
                </div>
            </aside>
            <div class="main-content" style="width: 100%;">

                <div class="main-content-first-block">

                    <div class="competitions">
                        <h2 class="title">Конкурсные торги</h2>
                        <div class="competitions-block">
                            <p class="competitions-block-date">21 июля 2019</p>
                            <p class="competitions-block-text">Конкурс на закупку необходимого обеспечения для
                                полноценной работы сотрудников</p>
                            <a href="http://mdo.uz/ru/news/konkurs-na-zakupku" class="competitions-block-link">Подробнее...</a>
                        </div>
                        <div class="competitions-block">
                            <p class="competitions-block-date">17 февраля 2020</p>
                            <p class="competitions-block-text"></p>
                            <a href="http://mdo.uz/ru/article/view" class="competitions-block-link">Подробнее...</a>
                        </div>
                        <a href="http://mdo.uz/ru#" class="competitions-link"><span>Смотреть все</span></a>
                    </div>

                    <div class="main-slider-wrap">
                        <div class="owl-carousel main-slider owl-loaded owl-drag">


                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                     style="transform: translate3d(-3200px, 0px, 0px); transition: all 0s ease 0s; width: 12160px;">
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/jwkVMXTmyQ-z0JwOz273D4-WVW0I0p1y.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/WjuUrtqhhoMJitCfrAw06k3OQc0iXXaQ.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/TRjTLZUc5KrnD2n56Dz7hw2Z_pgcVFfc.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/1b_IHJ2Kc5KIIvyxP59wFViVEVo4D4Ve.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/562xo5M6kwQfRx0RP_t6Mk8-lGnAsz55.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 640px;">
                                        <div class="item active"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/IgqFY7WtCEdE9gRtmB4T-BcJVcEpt5zl.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/xZB1KbXOSvrCkSJtqTvDmMoKlr5MQikU.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/uNpIA6gK2116Fj-gamp2I49KYFwEgdOb.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/oCulOL9LNsFSSEzXMj38cS6uHMiOJEI5.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/jwkVMXTmyQ-z0JwOz273D4-WVW0I0p1y.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/WjuUrtqhhoMJitCfrAw06k3OQc0iXXaQ.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/TRjTLZUc5KrnD2n56Dz7hw2Z_pgcVFfc.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/1b_IHJ2Kc5KIIvyxP59wFViVEVo4D4Ve.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/562xo5M6kwQfRx0RP_t6Mk8-lGnAsz55.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item active"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/IgqFY7WtCEdE9gRtmB4T-BcJVcEpt5zl.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/xZB1KbXOSvrCkSJtqTvDmMoKlr5MQikU.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/uNpIA6gK2116Fj-gamp2I49KYFwEgdOb.jpg"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/oCulOL9LNsFSSEzXMj38cS6uHMiOJEI5.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 640px;">
                                        <div class="item"><img
                                                src="./Министерство Дошкольного Образования Узбекистана_files/jwkVMXTmyQ-z0JwOz273D4-WVW0I0p1y.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev"></button>
                                <button type="button" role="presentation" class="owl-next"></button>
                            </div>
                        </div>
                        <div class="main-slider-dots">
                            <button role="button" class="owl-dot active"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                            <button role="button" class="owl-dot"><span></span></button>
                        </div>
                    </div>
                </div>
                <div class="main-news">
                    <div class="title-wrap">
                        <h2 class="title"><img src="{{url('frontend/img/signal.png')}}"
                                               alt="">Новости министерства</h2>
                        <div class="main-news-slider-controls">
                            <button type="button" role="presentation" class="owl-prev"></button>
                            <button type="button" role="presentation" class="owl-next"></button>
                        </div>
                    </div>
                    <div class="owl-carousel main-news-slider owl-loaded owl-drag">


                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                 style="transform: translate3d(-1070px, 0px, 0px); transition: all 0s ease 0s; width: 3924px;">
                                <div class="owl-item cloned" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/v-taskente-otkroetsa-filial-rossijskogo-gosudarstvenno-pedagogiceskogo-universiteta-im-a-i-gercena"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/p9W9LrwIFSy0MjUxPaci_b16IhR7BS01.jpg"
                                                 alt="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена"
                                                 title="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена">
                                            <time datetime="2019-04-22">12 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/v-taskente-otkroetsa-filial-rossijskogo-gosudarstvenno-pedagogiceskogo-universiteta-im-a-i-gercena"
                                               class="main-news-slider-item-title"
                                               title="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена">​В
                                                Ташкенте откроется филиал Российского государственно педаго...</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/put-k-progressu-uzbekistan---rossia"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/IaGK86jYs2udfguC-0JwpBp3d6OVau9V.jpg"
                                                 alt="Путь к прогрессу: Узбекистан – Россия "
                                                 title="Путь к прогрессу: Узбекистан – Россия ">
                                            <time datetime="2019-04-22">11 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/put-k-progressu-uzbekistan---rossia"
                                               class="main-news-slider-item-title"
                                               title="Путь к прогрессу: Узбекистан – Россия ">Путь к прогрессу:
                                                Узбекистан – Россия </a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/o-vstrece-s-delegaciej-avstralii"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/-ZahMT33nnS9CMeoN3bc6W05ioKI1jJR.jpg"
                                                 alt="​О встрече с делегацией Австралии"
                                                 title="​О встрече с делегацией Австралии">
                                            <time datetime="2019-04-22">6 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/o-vstrece-s-delegaciej-avstralii"
                                               class="main-news-slider-item-title"
                                               title="​О встрече с делегацией Австралии">​О встрече с делегацией
                                                Австралии</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item active" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/rabota-elektronnoj-oceredi-v-doo-vozobnovilas-15-oktabra"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/s0cPY64X7vMOgt2g_epl6A2aAM8_M4Dy.jpg"
                                                 alt="Работа электронной очереди в ДОО возобновилась 15 октября"
                                                 title="Работа электронной очереди в ДОО возобновилась 15 октября">
                                            <time datetime="2019-04-22">15 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/rabota-elektronnoj-oceredi-v-doo-vozobnovilas-15-oktabra"
                                               class="main-news-slider-item-title"
                                               title="Работа электронной очереди в ДОО возобновилась 15 октября">Работа
                                                электронной очереди в ДОО возобновилась 15 октября</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item active" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/ob-izucenii-azykov-v-doo-uzbekistana"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/1KuC_Q_G2kHhPpvzAH-gHzC_DP1px8sq.jpg"
                                                 alt="Об изучении языков в ДОО Узбекистана"
                                                 title="Об изучении языков в ДОО Узбекистана">
                                            <time datetime="2019-04-22">15 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/ob-izucenii-azykov-v-doo-uzbekistana"
                                               class="main-news-slider-item-title"
                                               title="Об изучении языков в ДОО Узбекистана">Об изучении языков в ДОО
                                                Узбекистана</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item active" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/v-taskente-otkroetsa-filial-rossijskogo-gosudarstvenno-pedagogiceskogo-universiteta-im-a-i-gercena"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/p9W9LrwIFSy0MjUxPaci_b16IhR7BS01.jpg"
                                                 alt="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена"
                                                 title="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена">
                                            <time datetime="2019-04-22">12 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/v-taskente-otkroetsa-filial-rossijskogo-gosudarstvenno-pedagogiceskogo-universiteta-im-a-i-gercena"
                                               class="main-news-slider-item-title"
                                               title="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена">​В
                                                Ташкенте откроется филиал Российского государственно педаго...</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/put-k-progressu-uzbekistan---rossia"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/IaGK86jYs2udfguC-0JwpBp3d6OVau9V.jpg"
                                                 alt="Путь к прогрессу: Узбекистан – Россия "
                                                 title="Путь к прогрессу: Узбекистан – Россия ">
                                            <time datetime="2019-04-22">11 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/put-k-progressu-uzbekistan---rossia"
                                               class="main-news-slider-item-title"
                                               title="Путь к прогрессу: Узбекистан – Россия ">Путь к прогрессу:
                                                Узбекистан – Россия </a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/o-vstrece-s-delegaciej-avstralii"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/-ZahMT33nnS9CMeoN3bc6W05ioKI1jJR.jpg"
                                                 alt="​О встрече с делегацией Австралии"
                                                 title="​О встрече с делегацией Австралии">
                                            <time datetime="2019-04-22">6 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/o-vstrece-s-delegaciej-avstralii"
                                               class="main-news-slider-item-title"
                                               title="​О встрече с делегацией Австралии">​О встрече с делегацией
                                                Австралии</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/rabota-elektronnoj-oceredi-v-doo-vozobnovilas-15-oktabra"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/s0cPY64X7vMOgt2g_epl6A2aAM8_M4Dy.jpg"
                                                 alt="Работа электронной очереди в ДОО возобновилась 15 октября"
                                                 title="Работа электронной очереди в ДОО возобновилась 15 октября">
                                            <time datetime="2019-04-22">15 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/rabota-elektronnoj-oceredi-v-doo-vozobnovilas-15-oktabra"
                                               class="main-news-slider-item-title"
                                               title="Работа электронной очереди в ДОО возобновилась 15 октября">Работа
                                                электронной очереди в ДОО возобновилась 15 октября</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/ob-izucenii-azykov-v-doo-uzbekistana"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/1KuC_Q_G2kHhPpvzAH-gHzC_DP1px8sq.jpg"
                                                 alt="Об изучении языков в ДОО Узбекистана"
                                                 title="Об изучении языков в ДОО Узбекистана">
                                            <time datetime="2019-04-22">15 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/ob-izucenii-azykov-v-doo-uzbekistana"
                                               class="main-news-slider-item-title"
                                               title="Об изучении языков в ДОО Узбекистана">Об изучении языков в ДОО
                                                Узбекистана</a>
                                        </footer>
                                    </article>
                                </div>
                                <div class="owl-item cloned" style="width: 356.667px;">
                                    <article class="main-news-slider-item">
                                        <a href="http://mdo.uz/ru/news/v-taskente-otkroetsa-filial-rossijskogo-gosudarstvenno-pedagogiceskogo-universiteta-im-a-i-gercena"
                                           class="main-news-slider-item-img-wrap">
                                            <img class="pressa-img img-responsive"
                                                 src="./Министерство Дошкольного Образования Узбекистана_files/p9W9LrwIFSy0MjUxPaci_b16IhR7BS01.jpg"
                                                 alt="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена"
                                                 title="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена">
                                            <time datetime="2019-04-22">12 октября 2020</time>
                                        </a>
                                        <footer>
                                            <a href="http://mdo.uz/ru/news/v-taskente-otkroetsa-filial-rossijskogo-gosudarstvenno-pedagogiceskogo-universiteta-im-a-i-gercena"
                                               class="main-news-slider-item-title"
                                               title="​В Ташкенте откроется филиал Российского государственно педагогического университета им. А. И. Герцена">​В
                                                Ташкенте откроется филиал Российского государственно педаго...</a>
                                        </footer>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
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
                <p class="footer-block-title">О Министерстве</p>
                <ul class="footer-block-menu">
                    <li><a href="http://mdo.uz/ru/news/struktura-ministerstva">Структура министерства</a></li>
                    <li><a href="http://mdo.uz/ru/news/vakansii">Вакансии</a></li>
                    <li><a href="http://mdo.uz/ru/news/otkrytye-dannye">Открытые данные</a></li>
                </ul>
            </div>
            <div class="footer-block">
                <p class="footer-block-title">Обращения в Министерство</p>
                <ul class="footer-block-menu">
                    <li><a href="http://mdo.uz/ru/news/grafik-priema-obrasenij">График приема обращений</a></li>
                    <li><a href="http://mdo.uz/ru/news/poradok-obrasenij">Порядок обращений</a></li>
                    <li><a href="http://mdo.uz/ru/news/virtualnaa-priemnaa">Виртуальная приемная</a></li>
                    <li><a href="http://mdo.uz/ru/news/telefony-doveria">Телефоны доверия</a></li>
                </ul>
            </div>


            <div class="footer-block">
                <p class="footer-block-title">Публикации:</p>
                <ul class="footer-block-menu">
                    <li><a href="http://mdo.uz/ru/news/tags/novosti-ministerstva">Новости</a></li>
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
<!--[if lt IE 9]>
<script src="/assets/c1b83f63/dist/html5shiv.min.js"></script>
<![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('frontend/js/Popper.js')}}"></script>
<script src="{{url('frontend/js/libs.min.js')}}"></script>
<script src="{{url('frontend/js/custom.js')}}"></script>
<script src="{{url('frontend/js/common.js')}}"></script>
<script src="{{url('frontend/js/main.js')}}"></script>
<script src="https://lidrekon.ru/slep/js/jquery.js"></script>
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>
</body>
</html>
