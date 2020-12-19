@extends('site.main')

@section('content')
    <div class="articles">
        <!--h1></h1-->
        <h2 class="page-title">
            {{$category[0]->title}}
        </h2>
        <div class="articles-content">
            @if(count($articles_from_category) > 0)
                <div class="articles-block-wrapper">
                    @foreach($articles_from_category as $articles)
                        <div class="articles-block">
                            <div class="articles-block-top">
                                <a href="{{url(Request::url().'/'.$articles->slug)}}" class="articles-block-img-wrapper">
                                    <video class="articles-block-img-wrapper" controls>
                                        <source src = "{{url($articles->video_base_url.'/'.$articles->video_path)}}" type="video/mp4">
                                    </video>
                                </a>
                                <a href="{{url(Request::url().'/'.$articles->slug)}}"
                                   class="articles-block-title"
                                   title="{{$articles->title}}">{{$articles->title}}</a>
                            </div>
                            <!--<div class="articles-block-bottom">
                                <p class="articles-block-text">{!! html_entity_decode($articles->description) !!}</p>
                            </div>-->
                        </div>
                    @endforeach
                </div>

                <ul class="pagination">
                    <li><a href="{{$articles_from_category->previousPageUrl()}}">«</a></li>
                    <li><a href="{{$articles_from_category->nextPageUrl()}}">»</a></li>
                </ul>
            @else
                @if(app()->getLocale() == 'uz')
                    Ma'lumotlar yangilanmoqda
                @elseif(app()->getLocale() == 'ru')
                    Данные обновляются
                @else
                    Data is being updated
                @endif
            @endif
        </div>
    </div>
@endsection
