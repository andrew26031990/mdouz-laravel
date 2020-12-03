@extends('site.main')

@section('content')
    <div class="articles">
        <!--h1></h1-->
        <h2 class="page-title">
            {{$category[0]->title}}
        </h2>
        <div class="articles-content">
            <div class="articles-block-wrapper">
                @foreach($articles_from_category as $articles)
                    <div class="articles-block">
                        <div class="articles-block-top">
                            <a href="{{url(Request::url().'/'.$articles->slug)}}"
                               class="articles-block-img-wrapper">
                                <p class="articles-block-date">{{gmdate("d.m.Y", $articles->date_published)}}</p>
                                <img class="pressa-slider-img img-responsive"
                                     src="{{($articles->base_url !== null || $articles->image_name !== null) ? url($articles->base_url.'/'.$articles->image_name) : url('frontend/img/nophoto.png')}}"
                                     alt="{{$articles->title}}"
                                     title="{{$articles->title}}">
                            </a>
                            <a href="{{url(Request::url().'/'.$articles->slug)}}"
                               class="articles-block-title"
                               title="{{$articles->title}}">{{$articles->title}}</a>
                        </div>
                        <div class="articles-block-bottom">
                            <p class="articles-block-text">{{$articles->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <ul class="pagination">
                <li><a href="{{$articles_from_category->previousPageUrl()}}">«</a></li>
                <li><a href="{{$articles_from_category->nextPageUrl()}}">»</a></li>
            </ul>
        </div>
    </div>
@endsection
