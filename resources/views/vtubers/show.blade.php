@extends('layouts.index')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-4 text-center">
                <img src="/images/{{$vtuber['thumbnail'] ? "vtubers/{$vtuber['thumbnail']}" : 'logo.png'}}" alt=""
                     height="253" width="253" class="rounded">
                <h3 class="mt-4 md-4">{{$vtuber['name']}}</h3>
                @component('components.vote_gender')
                    @slot('gender', $vtuber['gender'])
                    @slot('id', $vtuber['id'])
                    @slot('redirect_to', $redirect_to)
                @endcomponent
                <p class="mt-4">{!! $vtuber['description'] !!}</p>
            </div>
            <div class="offset-1"></div>
            <div class="col-7">
                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-6">
                            @component('components.movie')
                                @slot('movie', $movie)
                                @slot('redirect_to', $redirect_to)
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
