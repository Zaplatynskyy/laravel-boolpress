@extends('layouts.app')

@section('content')
<div class="container">
    <div class="titolo my-2">
        <strong>Nome :</strong>
        <h2 class="d-inline-block">{{$tag->name}}</h2>
    </div>

    <div class="slug my-2">
        <strong>Slug :</strong>
        <h5 class="d-inline-block">{{$tag->slug}}</h5>
    </div>

    <div class="slug my-2">
        <strong>Post associati :</strong>
        <ol>
            @foreach ($tag->posts as $post)
                <li>
                    <a href="{{route('posts.show', $post->id)}}">
                        {{$post->title}}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="date my-2">
        <div class="created"><strong>Data creazione :</strong> <span>{{$tag->created_at}}</span></div>
        <div class="updated"><strong>Ultima modifica :</strong> <span>{{$tag->updated_at}}</span></div>
    </div>
</div>
@endsection