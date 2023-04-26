@extends("components.base")
@section("content")
    <div class="page">
        <h2 class="tab-title">{{ $tab->title }}</h2>
        <p class="tab-performer">{{ $tab->performer }}</p>
        <div class="button-wrapper">
            <button id="play">Play</button>
            <button id="stop" disabled>Stop</button>
            @if(Auth::user()->id == $tab->user_id)
            <a class="btn blue-btn" href="{{ route('edit', [$tab->id]) }}">Edit</a>
            @endif
        </div>
        <div class="tab read-only">
            <input class="bpm" type="number" value="{{ $tab->tempo }}">
            <input class="hidden-tab" style="display: none;" value="{{ $tab->tab }}">
        </div>
        <div class="response-wrapper">
            <img class="empty-like-icon" src="{{url('images/empty-heart.png')}}" alt="empty heart">
            <p class="counter">{{ $tab->likes->count() }}</p>
            <img class="comment-icon" src="{{url('images/comment.png')}}" alt="comment">
            <p class="counter">{{ $tab->comments->count() }}</p>
        </div>
        <form class="comment-editor">
        <textarea rows="3" placeholder="Leave a comment..."></textarea>
        <button type="submit">Post Comment</button>
        </form>
        <div class="comments-wrapper">
            @foreach($tab->comments as $comment)
            <div class="comment">
                <p class="comment-name">{{ $comment->user->username }}</p>
                <p class="comment-date">2 days ago</p>
                <p class="comment-text">{{ $comment->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @vite(['resources/js/tabgenerator.js', 'resources/js/tabplayer.js', 'resources/js/buttons.js'])
@endsection