@extends('layouts.index')
@section('main')
    <div class="container">
        @component('components.vote_button')
        @endcomponent
        <div class="row">
            @foreach($vtubers as $vtuber)
                <div class="col-3" style="margin-bottom: 32px">
                    <a href="{{route('vtubers.show', ['id' => $vtuber['id']])}}" class="card">
                        <img src="/images/{{$vtuber['thumbnail'] ? "vtubers/{$vtuber['thumbnail']}" : 'logo.png'}}"
                             alt=""
                             class="card-img-top" height="253">
                        <div class="card-body">
                            <h3 class="card-title">{{$vtuber['name']}}</h3>
                            <div class="text-right">
                                @if($vtuber['gender'] === 1)
                                    <span class="btn btn-state-female">
                                        <img src="/images/female.png" alt="女" height="30">
                                    </span>
                                @elseif($vtuber['gender'] === 0)
                                    <span class="btn btn-state-male">
                                        <img src="/images/male.png" alt="男" height="30">
                                    </span>
                                @else
                                    <span class="btn btn-state-gender">
                                        <img src="/images/gender.png" alt="未入力" height="30">
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
