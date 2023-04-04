@extends("components.base")
@section("content")
    <div class="page">
        <h2 class="tab-title">Fat Lip</h2>
        <p class="tab-performer">Sum41</p>
        <div class="tab"></div>
        <div class="response-wrapper">
            <img class="empty-like-icon" src="{{url('images/empty-heart.png')}}" alt="empty heart">
            <p class="counter">179</p>
            <img class="comment-icon" src="{{url('images/comment.png')}}" alt="comment">
            <p class="counter">3</p>
        </div>
        <form class="comment-editor">
        <textarea rows="3" placeholder="Leave a comment..."></textarea>
        <button type="submit">Post Comment</button>
        </form>
        <div class="comments-wrapper">
            <div class="comment">
                <p class="comment-name">User01</p>
                <p class="comment-date">2 days ago</p>
                <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia porro asperiores enim, necessitatibus temporibus sunt quos soluta labore, molestiae ipsa aut veniam nemo perferendis eius. Soluta suscipit sunt consequuntur odio!</p>
            </div>
            <div class="comment">
                <p class="comment-name">ProGuitarist_13</p>
                <p class="comment-date">3 days ago</p>
                <p class="comment-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, nulla alias asperiores aliquid quidem libero laboriosam, architecto vitae inventore quia ex incidunt tempore cumque in dolore dicta placeat ad illo? Perspiciatis at, minus magni possimus voluptas non adipisci nostrum, ducimus molestias error fugiat! Ab, tempore doloribus. Maxime suscipit reprehenderit est!</p>
            </div>
            <div class="comment">
                <p class="comment-name">Slash_Official</p>
                <p class="comment-date">10 days ago</p>
                <p class="comment-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, ad.</p>
            </div>
        </div>
    </div>
@endsection