@extends('layouts.app')

@section('content')
@include('layouts.header')
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                {{ $post->title }}
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('F, d Y') }}</li>
                <li class="cat">
                    In
                    <a href="#0">{{ $post->category->name }}</a>
                </li>
            </ul>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="/{{ $post->poster }}" alt="">
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <p>{{$post->content}}</p>
            <br>
        </div> <!-- end s-content__main -->

        @if(\Illuminate\Support\Facades\Auth::user())
        @if(\Illuminate\Support\Facades\Auth::user()->id == $post->user->id)
        <form method="post" action="{{ route('edit_post', ['postId' => $post->id]) }}">
            @csrf
            {{ method_field('PUT') }}
            <button type="submit" class="submit btn--primary:hover btn--medium">Edit</button>
        </form>
        @endif
        @endif

    </article>
    <div class="comments-wrap">

        <div id="comments" class="row">
            <div class="col-full">
                @if($post->comments->count() > 0)
                <h3 class="h2">{{ $post->comments->count() }} Comment(s)</h3>


                <!-- commentlist -->
                <ol class="commentlist">

                    @foreach($post->comments as $comment)
                    <li class="depth-1 comment">


                        <div class="comment__content">

                            <div class="comment__info">
                                <cite>{{ $comment->user->name }}</cite>

                                <div class="comment__meta">
                                    <time class="comment__time">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->created_at)->format('F, d, Y H:i') }}</time>
                                </div>
                            </div>

                            <div class="comment__text">
                                <p>{{ $comment->comment }}</p>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user())
                            @if(\Illuminate\Support\Facades\Auth::user()->id == $comment->user->id)
                            <form method="post" action="{{route('delete_comment', ['postId' => $comment->id])}}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="submit btn--primary:hover btn--medium">Delete comment</button>
                            </form>
                            @endif
                            @endif
                        </div>

                    </li> <!-- end comment level 1 -->
                    @endforeach
                </ol> <!-- end commentlist -->
                @endif

                <!-- respond
                    ================================================== -->
                @if(Auth::user())
                <div class="respond">

                    <h3 class="h2">Add Comment</h3>

                    <form name="contactForm" id="contactForm" method="post" action="{{route('create_comment', ['postId' => $post->id])}}">
                        @csrf
                        <fieldset>

                            <div class="message form-field">
                                <textarea name="comment" id="comment" class="full-width" placeholder="Your Message"></textarea>
                            </div>

                            <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>

                        </fieldset>
                    </form> <!-- end form -->

                </div> <!-- end respond -->
                @else
                <a href="/login">Login please to leave comment</a>
                @endif
            </div> <!-- end col-full -->

        </div> <!-- end row comments -->
    </div> <!-- end comments-wrap -->
</section>
@endsection