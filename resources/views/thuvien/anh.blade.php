@extends('layouts.main')

@section('title', 'Thư viện ảnh 1 – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-28 page-child parent-pageid-30 thu-vien-anh-1')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Thư viện ảnh 1</h1>
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
                <span property="name">Thư viện ảnh 1</span>
                <meta property="position" content="3">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="image-galleries">
                @php
                    $galleries = [
                        [
                            'title' => 'Tham quan lớp học 1',
                            'main_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353-370x242.jpg',
                            'full_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg',
                            'topic' => 'Lớp học vui',
                            'images' => [
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0355.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0357.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0366.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0370.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0382.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0389.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0393.jpg',
                            ]
                        ],
                        [
                            'title' => 'Tham quan lớp học 2',
                            'main_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483-370x242.jpg',
                            'full_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483.jpg',
                            'topic' => 'Lớp học vui',
                            'images' => [
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0416.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0429.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0432.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0440.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0441.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0453.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0477.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0485.jpg',
                            ]
                        ],
                        [
                            'title' => 'Tham quan lớp học 3',
                            'main_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505-370x242.jpg',
                            'full_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505.jpg',
                            'topic' => 'Lớp học vui',
                            'images' => [
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0489.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0510.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0546.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0571.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse2.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse3.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse4.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse5.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse6.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse7.jpg',
                            ]
                        ],
                        [
                            'title' => 'Tham quan lớp học 4',
                            'main_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse13-370x242.jpg',
                            'full_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse13.jpg',
                            'topic' => 'Lớp học vui',
                            'images' => [
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse9.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse10.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse11.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse13.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross1.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross2.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross5.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/P1020383.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/P1020397.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/P1020399.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/TEAM1.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Thay-Johannes.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Thay-Paul.jpg',
                                'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/ThayPaul2.jpg',
                            ]
                        ]
                    ];
                @endphp

                @foreach($galleries as $gallery)
                <div class="image-gallery">
                    <a class="post-thumb" href="{{ $gallery['full_img'] }}" data-sub-html="<h5>{{ $gallery['title'] }}</h5>">
                        <img fetchpriority="high" decoding="async" width="370" height="242" src="{{ $gallery['main_img'] }}" class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="" />
                        <div class="gallery-summary">
                            <h5>{{ $gallery['title'] }}</h5>
                            <p>-</p>
                            <p>Chủ đề: {{ $gallery['topic'] }}</p>
                        </div>
                    </a>

                    @foreach($gallery['images'] as $img)
                        @if($img !== $gallery['full_img'])
                        <a href="{{ $img }}" data-sub-html="">
                            <img decoding="async" src="{{ $img }}" alt="" style="display: none;">
                        </a>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
