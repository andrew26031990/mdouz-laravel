@extends('site.main')

@section('content')
    <div class="articles">
        <h2 class="page-title">{{$article[0]->title}}</h2>
        <div class="articles-content">
            <div class="article-content">
                <a data-fancybox="article-img" href="{{url($article[0]->thumbnail_base_url.'/'.$article[0]->thumbnail_path)}}" class="article-main-img-wrap">
                    <img class="services-slider-img img-responsive" src="{{($article[0]->thumbnail_base_url !== null || $article[0]->thumbnail_path !== null) ? url($article[0]->thumbnail_base_url.'/'.$article[0]->thumbnail_path) : url('frontend/img/nophoto.png')}}" alt="">
                    <span class="article-date">{{gmdate("d.m.Y", $article[0]->published_at)}}</span>
                </a>
                {!! html_entity_decode($article[0]->body) !!}
            </div>
            @if(count($article_attachment) > 0)
                @foreach($article_attachment as $article_att)
                    <div class="article-content">
                        <a style="color: white" href="{{url($article_att->base_url.'/'.$article_att->path)}}" download>Скачать</a>
                    </div>
                @endforeach
            @else
                <div class="article-content">
                    Вложения отсутствуют
                </div>
            @endif
        </div>
    </div>
@endsection
