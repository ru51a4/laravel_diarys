@extends('layouts.app')

@section('content')


    <div class="row d-flex justify-content-center">
        <div class="col-9 m-4 bg-light">
            <h1 class="display-5 fw-bold">{{$posts[0]["diary"]["name"]}}</h1>
            <p class="col-md-8 fs-4">{{$posts[0]["diary"]["description"]}}</p>
        </div>
    </div>
    <div class="row">
        <div class="d-flex flex-column justify-content-start">
            @foreach ($posts as $post)
                <div class="col-12 card d-flex flex-row">
                    <div class="card-avatar d-flex flex-column justify-content-start">
                        <div class="nickname">
                            <b>{{$post["user"]["name"]}}</b>
                            <p class="status">
                                @if($post['user']['statuses'])
                                    @foreach($post['user']['statuses'] as $status)
                                        {{$status["name"]}}<br>
                                    @endforeach
                                @else
                                    {{"блогер" }}
                                @endif
                            </p>
                        </div>
                        <img class="avatar"
                             src="{{$post["user"]["avatar"] ? $post["user"]["avatar"] : "http://ufland.moy.su/camera_a.gif"}}">
                    </div>
                    <div class="card-body diary">
                        <p class="card-text"> {!! $post["message"] !!}
                        </p>
                        @if($post["user"]["name"] == $user["name"])
                            <div class="card-bottom">
                                <a href="/editpost/{{$post["diary"]["id"]}}/{{$post["id"]}}">edit</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row add-post">
        <div class="mt-3">
            <form action="/post/{{$idDiary}}" method="post" class="col-12">
                @csrf
                <div>
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                                  rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-2">Добавить</button>
                </div>
            </form>
        </div>
    </div>





@endsection