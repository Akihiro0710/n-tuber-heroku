
<div class="row">
    <div class="col-6">
        <a class="btn btn-{{$gender === 1 ? '' : 'outline-'}}female btn-block"
           target="_top"
           href="{{route('votes.show', ['id' => $id, 'redirect_to' => $redirect_to, 'gender' => 1])}}">
            <img src="/images/female.png" alt="女" height="30">
        </a>
    </div>
    <div class="col-6">
        <a class="btn btn-{{$gender === 0 ? '' : 'outline-'}}male btn-block"
           target="_top"
           href="{{route('votes.show', ['id' => $id, 'redirect_to' => $redirect_to, 'gender' => 0])}}">
            <img src="/images/male.png" alt="男" height="30">
        </a>
    </div>
</div>
