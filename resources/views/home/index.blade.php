@extends('layouts.app')

@section('main_section')

<section class="s-pageheader @if(request()->routeIs('home')) s-pageheader--home @endif">
    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="index.html">
                    <img src="/images/logo.svg" alt="Homepage">
                </a>
            </div> <!-- end header__logo -->

            <ul class="header__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->

            <a class="header__search-trigger" href="#0"></a>

            <div class="header__search">

                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Search for:</span>
                        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div> <!-- end header__search -->


            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Site Navigation</h2>

                <ul class="header__nav">
                    <li class="current"><a href="{{route('home')}}" title="">Home</a></li>
                    <li class="has-children">
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                            @foreach ($allCategories as $category)
                            <li><a href="{{ route('posts_by_id', ['categoryId' => $category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="has-children">
                        <a href="#0" title="">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="single-video.html">Video Post</a></li>
                            <li><a href="single-audio.html">Audio Post</a></li>
                            <li><a href="single-gallery.html">Gallery Post</a></li>
                            <li><a href="single-standard.html">Standard Post</a></li>
                        </ul>
                    </li>
                    <li><a href="style-guide.html" title="">Styles</a></li>
                    <li><a href="about.html" title="">About</a></li>
                    <li><a href="contact.html" title="">Contact</a></li>
                </ul> <!-- end header__nav -->
                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </div> <!-- header-content -->
    </header> <!-- header -->

    <div class="pageheader-content row">
        <div class="col-full">

            <div class="featured">
                <div class="featured__column featured__column--big">
                    <div class="entry" style="background-image:url('{{  $bigFeaturePost->poster }}');">

                        <div class="entry__content">
                            <span class="entry__category"><a href="#0">{{ $bigFeaturePost->category->name }}</a></span>

                            <h1><a href="{{ route('show_post', ['postId' => $bigFeaturePost->id]) }}" title="">{{ $bigFeaturePost->title }}</a></h1>

                            <div class="entry__info">
                                <a href="#0" class="entry__profile-pic">
                                    <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="#0">{{ $bigFeaturePost->user->name }}</a></li>
                                    <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bigFeaturePost->created_at)->format('F, d Y') }}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->
                </div> <!-- end featured__big -->
                <div class="featured__column featured__column--small">
                    @foreach($featuredPosts['normal'] as $featuredPost)
                    <div class="entry" style="background-image:url('{{ $featuredPost->poster }}');">

                        <div class="entry__content">
                            <span class="entry__category"><a href="#">{{ $featuredPost->category->name }}</a></span>

                            <h1><a href="{{ route('show_post', ['postId' => $featuredPost->id]) }}" title="">{{ $featuredPost->title }}</a></h1>

                            <div class="entry__info">
                                <a href="#0" class="entry__profile-pic">
                                    <img class="avatar" src="images/avatars/user-03.jpg" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="#0">{{ $featuredPost->user->name }}</a></li>
                                    <li>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$featuredPost->created_at)->format('F, d Y') }}</li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->
                    @endforeach
                </div> <!-- end featured__small -->
            </div>
        </div>
    </div>
</section>
@include('home.posts')
@endsection