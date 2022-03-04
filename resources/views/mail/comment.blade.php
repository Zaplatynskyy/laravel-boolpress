<h3>Nuovo commento al post: {{$post->title}}</h3>
<a href="{{route('posts.show', $post->id)}}">
    <button type="button" class="btn btn-primary">Visualizza</button>
</a>