@extends('layouts.main')

@section('title', 'Lịch thi – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-26 lich-thi sidebar-primary')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Lịch thi</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Lịch thi</span>
                <meta property="position" content="2">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="block-table table-responsive" id="">
                <table style="width: 100%;">
                    <tbody>
                        <tr style="height: 46px;">
                            <td style="height: 46px;" colspan="3">
                                <h1 style="text-align: center;"><strong><span style="font-size: 20px;">LỊCH THI GOETHE ZERTIFIKAT</span></strong></h1>
                            </td>
                        </tr>
                        <tr style="height: 278px;">
                            <td style="border-bottom: 1px solid #555555; height: 278px;" colspan="2">
                                <span style="font-size: 14px;">
                                    <img decoding="async" class="aligncenter wp-image-1063" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/GI_Pruefungszentrum_green_sRGB_2-e1480662784550-300x226-300x226.png" width="197" height="149" />
                                </span>
                                <ul style="padding-left: 20px;">
                                    <li><span style="font-size: 14px;">Tại Ngôi nhà Đức diễn ra các kỳ thi lấy chứng chỉ quốc tế tiếng Đức do Goethe-Institut cấp.</span></li>
                                    <li><span style="font-size: 14px;">Mỗi tháng thí sinh có thể gửi đăng ký thi các cấp độ từ A1 đến B2.</span></li>
                                    <li><span style="text-decoration: underline;"><strong><a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2020/10/Cam_ket_bao_mat_thong_tin_PKP.pdf">Cam kết bảo mật thông tin</a></strong></span></li>
                                    <li><span style="text-decoration: underline;"><a href="https://drive.google.com/file/d/1AuYdrVjuZck9iJVwlwusmhp8G9Ld1yB7/view?usp=drive_link"><strong>Quy chế thi</strong></a></span> và <span style="text-decoration: underline;"><strong><a href="https://www.goethe.de/ins/vn/vi/sta/han/prf.html">Quy chế tổ chức thi đối với các cấp độ A1-C1</a></strong></span></li>
                                    <li><strong><a href="https://drive.google.com/file/d/1hCKP8RIb4Ywe094BXoqff9QLSFwaH-OH/view?usp=drive_link">Hướng dẫn đăng ký thi qua link</a></strong></li>
                                    <li><span style="font-size: 16px;"><strong><span style="text-decoration: underline;"><a href="https://drive.google.com/file/d/1cC8ZOC0asrf6AC0Jk-w4cojbyA6gpyVW/view?usp=drive_link">Lệ phí thi</a> </span></strong></span></li>
                                    <li><span style="font-size: 16px;"><a href="https://www.goethe.de/ins/vn/vi/spr/kon/stu.html" target="_blank" rel="noopener noreferrer"><span style="text-decoration: underline;"><strong>Bạn cần có những kiến thức gì?</strong></span></a></span></li>
                                </ul>
                            </td>
                            <td style="border-bottom: 1px solid #555555; height: 278px; text-align: center; vertical-align: middle;">
                                <span style="font-size: 14px;">
                                    <img decoding="async" class="aligncenter size-full wp-image-669" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/nut-dang-ky.jpg" alt="nut-dang-ky" width="200" height="147" />
                                </span>
                                <p style="text-align: center; margin-top: 10px;"><a href="{{ route('dang-ky.du-thi') }}" class="btn-link" style="display:inline-block; padding:8px 16px; background:#a2c037; color:#fff; text-decoration:none; border-radius:4px; font-weight:bold;">ĐĂNG KÝ THI</a></p>
                            </td>
                        </tr>
                        <tr style="height: 4px;">
                            <td style="width: 150px; text-align: center; background-color: #bcbdc0; border: 1px solid #555555; padding: 10px 0;">
                                <p style="margin: 0;"><span style="font-size: 16px;"><strong>THÁNG</strong></span></p>
                            </td>
                            <td style="text-align: center; background-color: #bcbdc0; border: 1px solid #555555; padding: 10px 0;">
                                <p style="margin: 0;"><span style="font-size: 16px;"><strong>ĐĂNG KÝ THI BẮT ĐẦU TỪ 8 GIỜ SÁNG NGÀY DƯỚI ĐÂY</strong></span></p>
                            </td>
                            <td style="width: 250px; text-align: center; background-color: #bcbdc0; border: 1px solid #555555; padding: 10px 0;">
                                <p style="margin: 0;"><span style="font-size: 16px;"><strong>NGÀY THI</strong></span></p>
                            </td>
                        </tr>
                        @if(!empty($examSchedules) && $examSchedules->isNotEmpty())
                            @foreach($examSchedules as $exam)
                            <tr style="height: 35px;">
                                <td style="text-align: center; border: 1px solid #ccc; padding: 10px;"><span style="font-size: 18px;"><strong>{{ $exam->month }}</strong></span></td>
                                <td style="text-align: center; border: 1px solid #ccc; padding: 10px;">
                                    <p style="margin: 0;"><strong><span style="font-size: 18px;">{!! $exam->registration_date_info !!}</span></strong></p>
                                </td>
                                <td style="text-align: center; border: 1px solid #ccc; padding: 10px;"><strong><span style="font-size: 18px;">{!! $exam->exam_date_info !!}</span></strong></td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </main>

        @include('partials.sidebar')
    </div>
</div>

<div id="imageGallery">
    <div class="container">
        <h2>Thư viện</h2>
        <div class="image-galleries">
            @if(!empty($galleries) && $galleries->isNotEmpty())
                @foreach($galleries as $gallery)
                <div class="image-gallery">
                    <a class="post-thumb" href="{{ $gallery->cover_image ?? '#' }}" data-sub-html="<h5>{{ $gallery->title }}</h5>">
                        <img width="370" height="242" src="{{ $gallery->cover_image ?? '#' }}" class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="{{ $gallery->title }}" decoding="async" loading="lazy" />
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
                                <img src="{{ $img->image_path }}" alt="" style="display: none;">
                            </a>
                            @endif
                        @endforeach
                    @endif
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
