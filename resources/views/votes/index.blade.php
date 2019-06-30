@extends('layouts.index')
@section('main')
    <div class="container">
        <h1>あなたのネカマ判定率は<span style="font-size: 2em; font-weight: 500">{{$rate}}</span>%！</h1>
        <div class="m-4">
            <div style="border: 2px solid #ccc; display: flex; height: 20px">
                <div style="flex-basis: {{$rate}}%; background-color: #f66d9b"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="/images/vtubers/{{$image}}" height="200" width="200">
            </div>
            <h2 class="col-8" style="font-style: italic; display: flex; align-items: center">「{{$comment}}」</h2>
        </div>
    </div>
@endsection
