@extends( 'layouts.app' )



@section('content')
    <div id="app">
        <div class="row mt-5">
            <div class="col-12 p-3">
                <img src="{{ $article->img }}" alt="" class="border rounded mx-auto d-block">
                <h5 class="mt-5">{{ $article->title }}</h5>
                <p>
                    @foreach( $article->tags as $tag )

                        @if( $loop->last )
                            <span class="tag">{{ $tag->label }}</span>
                        @else
                            <span class="tag">{{ $tag->label }} |</span>
                        @endif

                    @endforeach
                </p>
                <p class="card-text">{{ $article->body }}</p>
                <p>Опубликованно: <i>{{ $article->createdAtForHuman() }}</i></p>
            </div>
        </div>

        <hr>

        <div class="row">
            <form action="">
                <div class="mb-3">
                    <label for="commentSubject" class="form-label">Тема комментария</label>
                    <input type="text" class="form-control" id="commentSubject">
                </div>
                <div class="mb-3">
                    <label for="commentBody" class="form-label">Комментарий</label>
                    <textarea class="form-control" id="commentBody" rows="3"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>


            <hr class="mt-3">
                @foreach( $article->comments as $comment )
                    <div class="mb-3 card">
                        <p>
                            <img src="https://via.placeholder.com/50/333/fff/?text=User" alt="">
                            <strong>{{ $comment->subject }}</strong>
                        </p>
                        {{ $comment->body }}
                        <p>
                            {{ $comment->createdAtForHumans() }}
                        </p>
                    </div>



                @endforeach


    </div>
@endsection



























