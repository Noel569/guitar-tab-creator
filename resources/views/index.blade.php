@extends("components.base")
@section("content")
    <div class="page">
        <h1 class="front-page-title">Guitar Tab Creator</h1>
        <h2 class="front-page-subtitle">
            Create your own tab and share it with others!
            <br>
            Browse other tabs and have fun!
        </h2>
        <form class="search-wrapper">
            <input type="text" id="search" placeholder="Find your song">
            <button type="submit">Search</button>
        </form>
        <div class="tab-list">
            <div class="tab-card" href="#">
                <div class="tab-card-front">
                    <h2>Pieces</h2>
                    <p class="tab-performer">Sum41</p>
                    <p class="tab-maker">By: User01</p>
                    <p>Tuning: Standard</p>
                    <div class="tab-card-response-wrapper">
                        <div class="tab-card-likes">
                            <img class="tab-card-like-icon" src="img/heart.png" alt="tab-card-likes">
                            <p>12</p>
                        </div>
                        <div class="tab-card-comments">
                            <img class="tab-card-comment-icon" src="img/comment.png" alt="tab-card-comments">
                            <p>2</p>
                        </div>
                    </div>
                </div>
                <div class="tab-card-back">
                    <a class="btn tab-btn" href="http://127.0.0.1:5500/tab.html">View</a>
                </div>
            </div>
            <div class="tab-card" href="#">
                <div class="tab-card-front">
                    <h2>History</h2>
                    <p class="tab-performer">Story Untold</p>
                    <p class="tab-maker">By: User01</p>
                    <p>Tuning: Standard</p>
                    <div class="tab-card-response-wrapper">
                        <div class="tab-card-likes">
                            <img class="tab-card-like-icon" src="img/heart.png" alt="tab-card-likes">
                            <p>12</p>
                        </div>
                        <div class="tab-card-comments">
                            <img class="tab-card-comment-icon" src="img/comment.png" alt="tab-card-comments">
                            <p>2</p>
                        </div>
                    </div>
                </div>
                <div class="tab-card-back">
                    <a class="btn tab-btn" href="http://127.0.0.1:5500/tab.html">View</a>
                </div>
            </div>
            <div class="tab-card" href="#">
                <div class="tab-card-front">
                    <h2>What's My Age Again?</h2>
                    <p class="tab-performer">blink-182</p>
                    <p class="tab-maker">By: User01</p>
                    <p>Tuning: Standard</p>
                    <div class="tab-card-response-wrapper">
                        <div class="tab-card-likes">
                            <img class="tab-card-like-icon" src="img/heart.png" alt="tab-card-likes">
                            <p>12</p>
                        </div>
                        <div class="tab-card-comments">
                            <img class="tab-card-comment-icon" src="img/comment.png" alt="tab-card-comments">
                            <p>2</p>
                        </div>
                    </div>
                </div>
                <div class="tab-card-back">
                    <a class="btn tab-btn" href="http://127.0.0.1:5500/tab.html">View</a>
                </div>
            </div>
            <div class="tab-card" href="#">
                <div class="tab-card-front">
                    <h2>Dirty Little Secrets</h2>
                    <p class="tab-performer">The All-American Rejects</p>
                    <p class="tab-maker">By: User01</p>
                    <p>Tuning: Standard</p>
                    <div class="tab-card-response-wrapper">
                        <div class="tab-card-likes">
                            <img class="tab-card-like-icon" src="img/heart.png" alt="tab-card-likes">
                            <p>12</p>
                        </div>
                        <div class="tab-card-comments">
                            <img class="tab-card-comment-icon" src="img/comment.png" alt="tab-card-comments">
                            <p>2</p>
                        </div>
                    </div>
                </div>
                <div class="tab-card-back">
                    <a class="btn tab-btn" href="http://127.0.0.1:5500/tab.html">View</a>
                </div>
            </div>
        </div>
    </div>
@endsection