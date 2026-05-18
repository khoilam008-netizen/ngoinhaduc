@extends('layouts.main')

@section('title', 'Liên hệ – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-40 page-parent lien-he')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Liên hệ</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Liên hệ</span>
                <meta property="position" content="2">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main" style="width: 100%;">
            <div class="contact-map" style="margin-bottom: 30px;">
                <iframe style="border: 0; width: 100%; max-width: 100%;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1917.0171231660102!2d108.22020265790809!3d16.063712574704123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDAzJzQ5LjQiTiAxMDjCsDEzJzE2LjciRQ!5e0!3m2!1svi!2s!4v1466161870093"
                    height="440" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
            <h2><span style="font-size: 28px;"><strong>{{ $globalSettings['site_name'] ?? 'Trung tâm Đức ngữ Ngôi nhà Đức' }}</strong></span></h2>
            <p style="font-size: 16px; line-height: 1.8;">
                ● <strong>Địa chỉ:</strong> {{ $globalSettings['address'] ?? 'K31/2 Lê Hồng Phong, Đà Nẵng' }}<br />
                ● <strong>Tel.:</strong> <a href="tel:{{ $globalSettings['phone_link'] ?? '+842363565783' }}">{{ $globalSettings['phone'] ?? '+ 84 (0236) 3565 783' }}</a><br />
                ● <strong>Email đăng ký học:</strong> <a href="mailto:{{ $globalSettings['email_hoc'] ?? 'ngoinhaducindanang@gmail.com' }}"><strong><span style="text-decoration: underline;">{{ $globalSettings['email_hoc'] ?? 'ngoinhaducindanang@gmail.com' }}</span></strong></a><br />
                ● <strong>Email đăng ký thi:</strong> <a href="mailto:{{ $globalSettings['email_thi'] ?? 'dangkythidanang@gmail.com' }}"><strong><span style="text-decoration: underline;">{{ $globalSettings['email_thi'] ?? 'dangkythidanang@gmail.com' }}</span></strong></a>
            </p>
        </main>
    </div>
</div>
@endsection
