<div style="margin-bottom: 32px">
    <a href="{{route('movies.show', ['id' => $movie['id'], 'redirect_to' => $redirect_to])}}" class="modaal-iframe card">
        <img class="card-img-top" src="http://img.youtube.com/vi/{{$movie['youtube_id']}}/default.jpg" width="200"
             height="150">
        <div class="card-body">
            <p class="card-text">{{$movie['title']}}</p>
        </div>
    </a>
</div>
