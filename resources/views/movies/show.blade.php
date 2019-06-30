@extends('layouts.common')
@section('body')
    <div class="p-4">
        <iframe width="100%" height="360" src="https://www.youtube.com/embed/{{$movie['youtube_id']}}"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        <h1 class="mt-4">{{$movie['title']}}</h1>
        @component('components.vote_gender')
            @slot('gender', $movie['gender'])
            @slot('id', $movie['vtuber_id'])
            @slot('redirect_to', $redirect_to)
        @endcomponent
        <a href="{{route('vtubers.show', ['id' => $movie['vtuber_id']])}}" class="btn btn-danger mt-4 md-4"
           target="_top">チャンネルへ</a>
    </div>
@endsection
