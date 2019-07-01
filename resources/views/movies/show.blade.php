@extends('layouts.common')
@section('body')
    <div class="p-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <iframe width="100%" height="360"
                            src="https://www.youtube.com/embed/{{$movie['youtube_id']}}?autoplay=1"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
            <div class="row">
                <h1 class="col-9">{{$movie['title']}}</h1>
                <div class="col-3">
                    <a href="{{route('vtubers.show', ['id' => $movie['vtuber_id']])}}" class="btn btn-danger btn-block"
                       style="float: right"
                       target="_top">チャンネルへ</a>
                </div>
            </div>
            @component('components.vote_gender')
                @slot('gender', $movie['gender'])
                @slot('id', $movie['vtuber_id'])
                @slot('redirect_to', $redirect_to)
            @endcomponent
        </div>
    </div>
@endsection
