@extends('layouts.main')

@section('title', ($post->title ?? 'Ngôi nhà Đức') . ' – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-10 page-child parent-pageid-8 ngoi-nha-duc sidebar-primary')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>{{ $post->title ?? 'Ngôi nhà Đức' }}</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Giới thiệu." href="#" class="post post-page">
                    <span property="name">Giới thiệu</span>
                </a>
                <meta property="position" content="2">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">{{ $post->title ?? 'Ngôi nhà Đức' }}</span>
                <meta property="position" content="3">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="block-content">
                @if(!empty($post) && !empty($post->content))
                    {!! $post->content !!}
                @else
                    <p style="text-align: justify;"><span style="font-size: 14px;"><span style="font-size: 32px;">N</span><span style="font-size: 16px;">gôi Nhà Đức tại Đà Nẵng là một <span style="color: #000000;"><strong><a style="color: #000000; text-decoration: underline;" href="https://www.daad-vietnam.org/vi/hoc-tap-va-nghien-cuu-tai-duc/hoc-tieng-duc/hoc-tieng-duc-tai-viet-nam/">trung tâm ngoại ngữ uy tín</a></strong></span> với các khoá học chất lượng...</span></span></p>
                @endif
            </div>
        </main>

        @include('partials.sidebar')
    </div>
</div>
@endsection
