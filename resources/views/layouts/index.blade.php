@extends('layouts.common')
@section('body')
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
                aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--<a class="navbar-brand" href="#">Navbar</a>--}}
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item{{\Route::current()->getName() == 'home' ? ' active' : ''}}">
                    <a class="nav-link" href="{{route('home')}}">ランダム</a>
                </li>
                <li class="nav-item{{\Route::current()->getName() == 'vtubers.index' ? ' active' : ''}}">
                    <a class="nav-link" href="{{route('vtubers.index')}}">Vtuber</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('main')
@endsection
