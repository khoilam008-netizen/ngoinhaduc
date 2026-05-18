@extends('layouts.main')

@section('title', 'Thư viện ảnh – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-28 page-child parent-pageid-30 thu-vien-anh-1')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Thư viện ảnh</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Thư viện." href="#" class="post post-page">
                    <span property="name">Thư viện</span>
                </a>
                <meta property="position" content="2">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Thư viện ảnh</span>
                <meta property="position" content="3">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="image-galleries">
                @if(!empty($galleries) && $galleries->isNotEmpty())
                    @foreach($galleries as $gallery)
                    <div class="image-gallery">
                        <a class="post-thumb" href="{{ $gallery->cover_image ?? '#' }}" data-sub-html="<h5>{{ $gallery->title }}</h5>">
                            <img fetchpriority="high" decoding="async" width="370" height="242" src="{{ $gallery->cover_image ?? '#' }}" class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="{{ $gallery->title }}" />
                            <div class="gallery-summary">
                                <h5>{{ $gallery->title }}</h5>
                                <p>-</p>
                                <p>{{ $gallery->description }}</p>
                            </div>
                        </a>

                        @if($gallery->images->isNotEmpty())
                            @foreach($gallery->images as $img)
                                @if($img->image_path !== $gallery->cover_image)
                                <a href="{{ $img->image_path }}" data-sub-html="<h5>{{ $img->caption ?? $gallery->title }}</h5>">
                                    <img decoding="async" src="{{ $img->image_path }}" alt="" style="display: none;">
                                </a>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    @endforeach
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
