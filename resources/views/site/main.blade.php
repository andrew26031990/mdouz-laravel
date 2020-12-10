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
    <link rel="stylesheet" href="{{url('css/timeline.min.css')}}" />
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
                    <form action="{{route('search')}}" method="GET" class="header-search">
                        <p class="header-search-field-wrap show">
                            <input type="text" name="search_field" class="header-search-field">
                        </p>
                        <button type="button" class="header-search-btn" aria-label="search"><img src="{{url('frontend/img/seach.png')}}" alt=""></button>
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
                    @if(app()->getLocale() == 'uz')
                        <img src="{{url('frontend/img/logo-uz.png')}}" alt="logo">
                    @elseif(app()->getLocale() == 'ru')
                        <img src="{{url('frontend/img/logo-ru.png')}}" alt="logo">
                    @else
                        <img src="{{url('frontend/img/logo-en.png')}}" alt="logo">
                    @endif
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
                    @if(app()->getLocale() == 'uz')
                        Узбекистон республикаси
                    @elseif(app()->getLocale() == 'ru')
                        Республика Узбекистан
                    @else
                        The Republic of Uzbekistan
                    @endif
                </p>
            </div>

        </div>
    </div>
</header>

<main class="main">
    <div class="container">
        <div class="wrapper">
            <aside class="sidebar">
                <div class="dao-search-block">
                    <div style="width: 100%;height: 50%;border-bottom: 1px solid white;text-align: center;">
                        <div style="width: 60%; height: 100%; margin: 0 auto; position: relative">
                            <div style="top: 20px; left: 0; position: absolute">
                                <img src="{{url('frontend/img/baby-boy.svg')}}" />
                            </div>
                            <div style="height: 100%; width: 70%; right: 0;position: absolute">
                                <div style="width: 100%; height: 50%; position: relative">
                                    <div style="position: absolute; top: 30px; background-color: white; padding: 5px">
                                        <b>количество воспитанников</b>
                                    </div>
                                </div>
                                <div style="width: 100%; height: 50%; position: relative">
                                    <div style="position: absolute; top: 10px; color: white">
                                        <b>3000000</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%;height: 50%;border-bottom: 1px solid white;">
                        <div style="width: 60%; height: 100%; margin: 0 auto; position: relative">
                            <div style="top: 20px; left: 0; position: absolute">
                                <img src="{{url('frontend/img/school.svg')}}" />
                            </div>
                            <div style="height: 100%; width: 70%; right: 0;position: absolute">
                                <div style="width: 100%; height: 50%; position: relative">
                                    <div style="position: absolute; top: 30px; background-color: white; padding: 5px">
                                        <b>количество учреждений</b>
                                    </div>
                                </div>
                                <div style="width: 100%; height: 50%; position: relative">
                                    <div style="position: absolute; top: 10px; color: white">
                                        <b>15000</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dao-search-block">
                    <img style="width: 100%; height: 100%;margin-bottom: 58px;"
                         src="{{url('frontend/img/borekan_zorekan.png')}}">
                    <a href="http://mdo.local/{{app()->getLocale()}}/bor-ekan-zor-ekan" class="dao-search-block-link">Bor ekan zor ekan</a>
                </div>
                <div class="tenders-block">
                    <div class="tenders-block-content">
                        <div class="title-wrap">
                            @if(count($tendering) > 0)
                                <h2 class="title"><img
                                        src="{{url('frontend/img/graph.png')}}" alt="">{{$tendering[0]->act_title}}</h2>

                            @else
                                Нет статей
                            @endif
                            <div class="tenders-block-slider-dots">
                                <button role="button" class="owl-dot"><span></span></button>
                            </div>
                        </div>
                        <div class="owl-carousel tenders-block-slider owl-loaded owl-drag">


                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                     style="transform: translate3d(-900px, 0px, 0px); transition: all 0s ease 0s; width: 2700px;">
                                    @if(count($tendering) > 0)
                                        @foreach($tendering as $tender)
                                            <div class="owl-item" style="width: 450px;">
                                                <div class="tenders-block-slider-item">
                                                    <p class="tenders-block-slider-item-date">{{$tender->at_title}}</p>
                                                    <p class="tenders-block-slider-item-text"></p>
                                                    <a href="{{url(app()->getLocale().'/'.$tender->act_slug.'/'.$tender->at_slug)}}"
                                                       class="tenders-block-slider-item-link">Подробнее...</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        Нет статей
                                    @endif
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <button type="button" role="presentation" class="owl-prev"></button>
                                <button type="button" role="presentation" class="owl-next"></button>
                            </div>
                        </div>
                        {{--<a href="http://mdo.uz/ru/news/tags/tendernye-torgi" class="tenders-block-show-all">Смотреть
                            все...</a>--}}
                    </div>
                </div>

                <div class="sidebar-contacts d-none d-md-block">
                    <div class="sidebar-contacts-content">
                        @foreach($portals as $portal)
                            @if($portal->ksi_id == 43)
                                <p class="sidebar-contacts-phone-text">{{$portal->ksit_comment}}</p>
                                <a href="tel:{{$portal->ksit_value}}" class="sidebar-contacts-phone">
                                    @if($portal->ksi_base_url != null || $portal->ksi_path != null)
                                        <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}"
                                             alt="{{$portal->ksit_comment}}">
                                    @endif
                                    {{$portal->ksit_value}} </a>
                            @endif
                        @endforeach
                        @foreach($portals as $portal)
                            @if($portal->ksi_id == 44)
                                {{--<p class="sidebar-contacts-callback-text">{{$portal->ksit_comment}}</p>--}}
                                <a href="{{$portal->ksit_value}}" target="_BLANK" class="sidebar-contacts-phone">
                                    @if($portal->ksi_base_url != null || $portal->ksi_path != null)
                                        <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}"
                                             alt="{{$portal->ksit_comment}}">
                                    @endif
                                    {{$portal->ksit_comment}} </a>
                            @endif
                        @endforeach
{{--                        <p class="sidebar-contacts-phone-text">Телефон доверия</p>
                        <a href="tel:+998 (71) 239-33-79" class="sidebar-contacts-phone">
                            <img src="{{url('frontend/img/phone-1.png')}}"
                                 alt="Телефон доверия">
                            +998 (71) 239-33-79 </a>--}}
                        {{--<p class="sidebar-contacts-callback-text">Обратная связь</p>
                        <a href="http://support.mdo.uz/" class="sidebar-contacts-callback-btn">
                            <img src="{{url('frontend/img/speach.png')}}"
                                 alt="Жалобы и предложения">
                            Жалобы и предложения </a>--}}
                    </div>
                </div>
            </aside>
            <div class="main-content" style="width: 100%;">

                @yield('content')
                <div class="ministries">
                    @foreach($portals as $portal)
                        @if($portal->ksi_id == 6 || $portal->ksi_id == 17 || $portal->ksi_id == 22 || $portal->ksi_id == 24)
                            <a href="{{$portal->ksit_value}}" target="_blank" class="ministries-block">
                                <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}"
                                     alt="{{$portal->ksit_comment}}">
                                <p>{{$portal->ksit_comment}}</p>
                            </a>
                        @endif
                    @endforeach

                </div>

            </div>
            <div class="sidebar-contacts d-block d-md-none">
                <div class="sidebar-contacts-content">
                    @foreach($portals as $portal)
                        @if($portal->ksi_id == 43)
                            <p class="sidebar-contacts-phone-text">{{$portal->ksit_comment}}</p>
                            <a href="tel:{{$portal->ksit_value}}" class="sidebar-contacts-phone">
                                @if($portal->ksi_base_url != null || $portal->ksi_path != null)
                                    <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}"
                                         alt="{{$portal->ksit_comment}}">
                                @endif
                                {{$portal->ksit_value}} </a>
                        @endif
                    @endforeach
                    @foreach($portals as $portal)
                        @if($portal->ksi_id == 44)
                            {{--<p class="sidebar-contacts-callback-text">{{$portal->ksit_comment}}</p>--}}
                                <button class="sidebar-contacts-callback-btn">
                                @if($portal->ksi_base_url != null || $portal->ksi_path != null)
                                    <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}"
                                         alt="{{$portal->ksit_comment}}">
                                @endif
                                {{$portal->ksit_comment}} </button>
                        @endif
                    @endforeach
                    {{--<p class="sidebar-contacts-phone-text">Телефон доверия</p>
                    <a href="tel:+998 (71) 239-33-79" class="sidebar-contacts-phone"><img
                            src="{{url('frontend/img/phone-1.png')}}" alt="">+998 (71)
                        239-33-79</a>
                    <p class="sidebar-contacts-callback-text">Обратная связь</p>
                    <button class="sidebar-contacts-callback-btn"><img
                            src="{{url('frontend/img/speach.png')}}"
                            alt="Жалобы и предложения">Жалобы и предложения
                    </button>--}}
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer-content">


            <div class="footer-block">
                @if(app()->getLocale() == 'uz')
                    <p class="footer-block-title">Ommaviy ma'lumotlar</p>
                @elseif(app()->getLocale() == 'ru')
                    <p class="footer-block-title">Открытые данные</p>
                @else
                    <p class="footer-block-title">Open data</p>
                @endif

                <ul class="footer-block-menu">
                    @foreach($bottom_articles as $bottom)
                        @if($bottom->id == 633 || $bottom->id == 632 || $bottom->id == 634)
                            <li>
                                <a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/{{$bottom->act_slug}}/{{$bottom->at_slug}}">{{$bottom->at_title}}</a>
                            </li>
                        @endif
                        {{--<li><a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/otkrytye-dannye/statistika">Статистика</a></li>
                        <li><a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/otkrytye-dannye/o-gendernom-ravenstve">О гендерном равенстве</a></li>
                        <li><a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/otkrytye-dannye/o-vakansiyah">О вакансиях</a></li>--}}
                    @endforeach
                </ul>
            </div>
            <div class="footer-block">
                @if(app()->getLocale() == 'uz')
                    <p class="footer-block-title" style="width: 420px;">Tenderlar, e'lonlar, moliya</p>
                @elseif(app()->getLocale() == 'ru')
                    <p class="footer-block-title" style="width: 420px;">Тендеры, объявления, финансы</p>
                @else
                    <p class="footer-block-title" style="width: 420px;">Tenders, announcements, finances</p>
                @endif

                <ul class="footer-block-menu">
                    @foreach($bottom_articles as $bottom)
                        @if($bottom->id == 635 || $bottom->id == 636 || $bottom->id == 637)
                            <li>
                                <a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/{{$bottom->act_slug}}/{{$bottom->at_slug}}">{{$bottom->at_title}}</a>
                            </li>
                        @endif
                        {{--<li><a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/otkrytye-dannye/statistika">Статистика</a></li>
                        <li><a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/otkrytye-dannye/o-gendernom-ravenstve">О гендерном равенстве</a></li>
                        <li><a href="http://{{$_SERVER['SERVER_NAME']}}/{{app()->getLocale()}}/otkrytye-dannye/o-vakansiyah">О вакансиях</a></li>--}}
                    @endforeach
                </ul>
            </div>

            <div class="footer-block contacts">
                @foreach($portals as $portal)
                    @if($portal->ksi_id == 45)
                        @if(app()->getLocale() == 'uz')
                            <p class="footer-block-title">Aloqalar</p>
                        @elseif(app()->getLocale() == 'ru')
                            <p class="footer-block-title">Контакты</p>
                        @else
                            <p class="footer-block-title">Contacts</p>
                        @endif
                        <p class="footer-block-contact">
                            @if($portal->ksi_base_url != null || $portal->ksi_path != null)
                                <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}" alt="">
                            @endif
                            {{$portal->ksit_value}}
                        </p>
                    @endif
                @endforeach
                @foreach($portals as $portal)
                    @if($portal->ksi_id == 46)
                        <p class="footer-block-contact">
                            @if($portal->ksi_base_url != null || $portal->ksi_path != null)
                                <img src="{{url($portal->ksi_base_url.'/'.$portal->ksi_path)}}" alt="">
                            @endif
                            E-mail: <a href="mailto:{{$portal->ksit_value}}">{{$portal->ksit_value}}</a>
                        </p>
                    @endif
                @endforeach
                {{--<p class="footer-block-title">Контакты</p>
                <p class="footer-block-contact"><img
                        src="{{url('frontend/img/pin.png')}}" alt="">100070, Город
                    Ташкент, Мирабадский район, улица Амира Темура, 17</p>
                <p class="footer-block-contact"><img
                        src="{{url('frontend/img/mail.png')}}" alt="">E-mail: <a
                        href="mailto:devon@mdo.uz">devon@mdo.uz</a></p>--}}
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
            'adaptiveHeight': true,
         });
        pgwSlider.stopSlide();
        $('.pgwSlider .ps-current img').css('height', '300px')
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
<script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
</body>
</html>
