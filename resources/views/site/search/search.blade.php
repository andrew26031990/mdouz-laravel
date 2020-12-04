@extends('site.main')

@section('content')
    <div class="articles">
        <!--h1></h1-->
        <h2 class="page-title">
            Результаты поиска
        </h2>
        <div class="articles-content">
            <div class="articles-block-wrapper">
                @foreach($articles as $article)
                    <div class="articles-block">
                        <div class="articles-block-top">
                            <a href="{{url(app()->getLocale().'/'.$article->slug.'/'.$article->slug)}}"
                               class="articles-block-img-wrapper">
                                <p class="articles-block-date">{{gmdate("d.m.Y", $article->date_published)}}</p>
                                <img class="pressa-slider-img img-responsive"
                                     src="{{($article->base_url !== null || $article->image_name !== null) ? url($article->base_url.'/'.$article->image_name) : url('frontend/img/nophoto.png')}}"
                                     alt="{{$article->title}}"
                                     title="{{$article->title}}">
                            </a>
                            <a href="{{url(app()->getLocale().'/'.$article->slug.'/'.$article->slug)}}"
                               class="articles-block-title"
                               title="{{$article->title}}">{{$article->title}}</a>
                        </div>
                        <div class="articles-block-bottom">
                            <p class="articles-block-text">{{$article->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <ul class="pagination">
                <li><a href="{{$articles->previousPageUrl()}}">«</a></li>
                <li><a href="{{$articles->nextPageUrl()}}">»</a></li>
            </ul>
        </div>
    </div>
@endsection
