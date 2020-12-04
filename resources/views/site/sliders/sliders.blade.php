@extends('site.main')

@section('content')
<div class="main-content-first-block">

    <div class="competitions" style="width: 100%;">
        <ul class="pgwSlider">
            @foreach($latest_news as $lat_news)
                <li>
                    <img style="width: 0;height: 0"
                         src="{{url($lat_news->thumbnail_base_url.'/'.$lat_news->thumbnail_path)}}"
                         alt="{{$lat_news->at_title}}" data-description="{{$lat_news->at_description}}">
                    <span style="height: 100%; font-weight: bold;background-color: #e9a41b; font-size: 12px; line-height: 3em">{{$lat_news->at_title}}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="main-news">
    <div class="title-wrap">
        <h2 class="title"><img src="{{url('frontend/img/signal.png')}}"
                               alt="">Новости министерства</h2>
        <div class="main-news-slider-controls">
        </div>
    </div>
    <div class="owl-carousel main-news-slider owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage"
                 style="transform: translate3d(-1070px, 0px, 0px); transition: all 0s ease 0s; width: 3924px;">
                @foreach($latest_news as $lat_news)
                    <div class="owl-item active" style="width: 356.667px;">
                        <article class="main-news-slider-item">
                            <a href="{{URL::to('/').'/'.app()->getLocale().'/'.$lat_news->at_slug}}"
                               class="main-news-slider-item-img-wrap">
                                <img class="pressa-img img-responsive"
                                     src="{{url($lat_news->thumbnail_base_url.'/'.$lat_news->thumbnail_path)}}"
                                     alt="{{$lat_news->at_title}}"
                                     title="{{$lat_news->at_title}}">
                                <time datetime="2019-04-22">{{date("d.m.y", $lat_news->published_at)}}</time>
                            </a>
                            <footer>
                                <a href="{{URL::to('/').'/'.app()->getLocale().'/'.$lat_news->at_slug}}"
                                   class="main-news-slider-item-title"
                                   title="{{$lat_news->at_title}}">{{$lat_news->at_title}}</a>
                            </footer>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="owl-dots disabled"></div>
    </div>
</div>
@endsection
