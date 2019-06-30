@extends('layouts.index')
@section('main')
    <div class="container">
        <img src="/images/logo.png" alt="怒りのネカマ晒し　Vtuber編" class="logo mb-4">
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-4 mb-4">
                    @component('components.movie')
                        @slot('movie', $movie)
                        @slot('redirect_to', route('home'))
                    @endcomponent
                </div>
            @endforeach
        </div>
    </div>
@endsection
