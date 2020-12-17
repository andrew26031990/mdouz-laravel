@extends('site.main')

@section('content')
    <div class="articles">

        <h2 class="page-title">{{$article[0]->title}}</h2>
        <div class="articles-content">
            <div class="article-content">
                <video class="articles-block-video" controls="">
                    <source src="{{url($article[0]->video_base_url.'/'.$article[0]->video_path)}}" type="video/mp4">
                </video>
                {!! html_entity_decode($article[0]->description) !!}
            </div>
        </div>
    </div>
@endsection
