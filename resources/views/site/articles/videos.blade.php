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
                                    <span class="articles-block-date">{{gmdate("d.m.Y", $articles->created_at)}}</span>
                                    <video controls="" poster="{{($articles->photo_base_path !== null || $articles->photo_path !== null) ? url($articles->photo_base_path.'/'.$articles->photo_path) : url('frontend/img/nophoto.png')}}">
                                        <source src = "{{url($articles->video_base_url.'/'.$articles->video_path)}}" type="video/mp4">
                                    </video>
                                </a>
                                <a href="{{url(Request::url().'/'.$articles->slug)}}"
                                   class="articles-block-title"
                                   title="{{$articles->title}}">{{$articles->title}}</a>
                            </div>
                            <div class="articles-block-bottom">
                                <p class="articles-block-text">{!! html_entity_decode($articles->description) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <ul class="pagination">
                    <li><a href="{{$articles_from_category->previousPageUrl()}}">«</a></li>
                    <li><a href="{{$articles_from_category->nextPageUrl()}}">»</a></li>
                </ul>
            @else
                Нет статей
            @endif
        </div>
    </div>
@endsection
