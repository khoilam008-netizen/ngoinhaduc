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
                <table style="width: 932px; height: 1676px;">
                    <tbody>
                        <tr style="height: 46px;">
                            <td style="width: 759px; height: 46px;" colspan="3">
                                <h1 style="text-align: center;"><strong><span style="font-size: 20px;">LỊCH THI GOETHE ZERTIFIKAT</span></strong></h1>
                            </td>
                        </tr>
                        <tr style="height: 278px;">
                            <td style="width: 537.625px; border-bottom: 1px solid #555555; height: 278px;" colspan="2">
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
                            <td style="width: 221.375px; border-bottom: 1px solid #555555; height: 278px;">
                                <span style="font-size: 14px;">
                                    <img decoding="async" class="aligncenter size-full wp-image-669" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/nut-dang-ky.jpg" alt="nut-dang-ky" width="200" height="147" />
                                </span>
                                <p style="text-align: center;"><a href="https://ngoinhaducindanang.com.vn/dang-ky/dang-ky-du-thi/">ĐĂNG KÝ THI</a></p>
                            </td>
                        </tr>
                        <tr style="height: 4px;">
                            <td style="width: 135px; text-align: center; background-color: #bcbdc0; border: 1px solid #555555; height: 4px;">
                                <p><span style="font-size: 16px;"><strong> THÁNG</strong></span></p>
                            </td>
                            <td style="width: 402.625px; text-align: center; background-color: #bcbdc0; border: 1px solid #555555; height: 4px;">
                                <p><span style="font-size: 16px;"><strong>ĐĂNG KÝ THI BẮT ĐẦU TỪ 8 GIỜ SÁNG NGÀY DƯỚI ĐÂY</strong></span></p>
                            </td>
                            <td style="width: 221.375px; text-align: center; background-color: #bcbdc0; border: 1px solid #555555; height: 4px;">
                                <p><span style="font-size: 16px;"><strong>NGÀY THI</strong></span></p>
                            </td>
                        </tr>
                        @php
                            $months = [
                                'T1/2026' => ['reg' => '–', 'exam' => '–'],
                                'T2' => ['reg' => '–', 'exam' => '–'],
                                'T3' => ['reg' => '–', 'exam' => '–'],
                                'T4' => ['reg' => '–', 'exam' => '–'],
                                'T5' => ['reg' => '–', 'exam' => '–'],
                                'T6' => ['reg' => '–', 'exam' => '–'],
                                'T7' => ['reg' => '–', 'exam' => '–'],
                                'T8' => ['reg' => '–', 'exam' => '–'],
                                'T9' => ['reg' => '–', 'exam' => '–'],
                                'T10' => ['reg' => '–', 'exam' => '–'],
                                'T11' => ['reg' => '–', 'exam' => '–'],
                                'T12' => ['reg' => '–', 'exam' => '–'],
                            ];
                        @endphp
                        @foreach($months as $month => $data)
                        <tr style="height: 27px;">
                            <td style="width: 135px; text-align: center; height: 27px;"><span style="font-size: 20px;"><strong>{{ $month }}</strong></span></td>
                            <td style="width: 402.625px; text-align: center; height: 27px;">
                                <p><strong><span style="font-size: 20px;">{!! $data['reg'] !!}</span></strong></p>
                            </td>
                            <td style="width: 221.375px; height: 27px; text-align: center;"><strong><span style="font-size: 20px;">{!! $data['exam'] !!}</span></strong></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

        @include('partials.sidebar', ['sidebar_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0510.jpg'])
    </div>
</div>

<div id="imageGallery">
    <div class="container">
        <h2>Thư viện</h2>
        <div class="image-galleries">
            <div class="image-gallery">
                <a class="post-thumb" href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg" data-sub-html="<h5>Tham quan lớp học 1</h5>">
                    <img width="370" height="242" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353-370x242.jpg" class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="" decoding="async" loading="lazy" />
                    <div class="gallery-summary">
                        <h5>Tham quan lớp học 1</h5>
                        <p>-</p>
                        <p>Chủ đề: Lớp học vui</p>
                    </div>
                </a>
            </div>
            {{-- Simplified gallery for now --}}
        </div>
    </div>
</div>
@endsection
