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
        <main class="main">
            <div class="contact-map">
                <div class="container">
                    <iframe style="border: 0;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1917.0171231660102!2d108.22020265790809!3d16.063712574704123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDAzJzQ5LjQiTiAxMDjCsDEzJzE2LjciRQ!5e0!3m2!1svi!2s!4v1466161870093"
                        width="800" height="440" frameborder="0" allowfullscreen="allowfullscreen"></iframe><br />
                </div>
            </div>
            <h2><span style="font-size: 28px;"><strong>Trung tâm Đức ngữ Ngôi nhà Đức</strong></span></h2>
            <p><span style="font-size: 14px;">● <strong>Địa chỉ:</strong> K31/2 Lê Hồng Phong, Đà Nẵng ●
                    Tel.<strong>:</strong> + 84 (0236) 3565 783 ● Di động: + 84 90428 1801 (thứ 2,3, 4, 5, 6, 13h30-
                    17h00)</span><br />
                <span style="font-size: 14px;"> ● Email đăng ký học: <a
                        href="mailto:ngoinhaducindanang@gmail.com"><strong><span
                                style="text-decoration: underline;">ngoinhaducindanang@gmail.com</span></strong></a>
                    ● Email đăng ký thi: <a href="mailto:dangkythidanang@gmail.com"><strong><span
                                style="text-decoration: underline;">dangkythidanang@gmail.com</span></strong></a></span>
            </p>
        </main>
    </div>
</div>
@endsection
