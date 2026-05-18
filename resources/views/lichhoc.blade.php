@extends('layouts.main')

@section('title', 'Lịch học – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-19570 lich-hoc sidebar-primary')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Lịch học</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Lịch học</span>
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
                        <tr style="height: 27px;">
                            <td style="height: 27px; text-align: center;" colspan="4">
                                <h2><span style="font-size: 16px; font-family: Arial;">CÁC KHOÁ HỌC TIẾNG ĐỨC<br /></span></h2>
                            </td>
                        </tr>
                        <tr style="height: 27px;">
                            <td style="height: 27px; border-bottom: 1px solid #333333;" colspan="3">
                                <ul style="margin-bottom: 0;">
                                    <li><span style="font-size: 14px;">Học theo khung tham chiếu Châu Âu GER</span></li>
                                    <li><span style="font-size: 14px;">Giáo viên được đào tạo chuyên nghiệp</span></li>
                                    <li><span style="font-size: 14px;">Giáo viên có bề dày kinh nghiệm chấm thi, làm thi</span></li>
                                    <li><span style="font-size: 14px;">Sách (In nguyên bản của Đức) miễn phí</span></li>
                                    <li><span style="font-size: 14px;">Trang thiết bị dạy học tiên tiến nhất</span></li>
                                </ul>
                            </td>
                            <td style="height: 27px; text-align: center; border-bottom: 1px solid #333333;">
                                <span style="font-size: 16px;"><strong> </strong>
                                    <img decoding="async" class="aligncenter wp-image-740 size-full" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/dang-ky-hoc.png" width="159" height="80" />
                                </span>
                                <a class='btn-link' target='_blank' href='{{ route("dang-ky.nhap-hoc") }}'>Đăng ký học</a>
                            </td>
                        </tr>
                        <tr style="height: 22px;">
                            <td style="width: 120px; height: 22px; text-align: center; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong>THỜI GIAN</strong></span>
                            </td>
                            <td style="width: 150px; height: 22px; text-align: center; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong> CẤP ĐỘ</strong></span>
                            </td>
                            <td style="height: 22px; text-align: center; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong> GIỜ HỌC</strong></span>
                            </td>
                            <td style="width: 150px; height: 22px; text-align: center; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong>THỜI GIAN (Tuần)</strong></span>
                            </td>
                        </tr>

                        {{-- Sáng --}}
                        @if(!empty($coursesSang) && $coursesSang->isNotEmpty())
                            @foreach($coursesSang as $idx => $course)
                                <tr>
                                    @if($idx == 0)
                                    <td style="text-align: center; vertical-align: middle; border: 1px solid #ccc;" rowspan="{{ count($coursesSang) }}">
                                        <p><strong><span style="font-size: 14px;">Sáng</span></strong></p>
                                    </td>
                                    @endif
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;"><strong>{{ $course->level }}</strong></span></td>
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;">{!! nl2br(e($course->schedule_time)) !!}</span></td>
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;">{{ $course->duration }}</span></td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Tối --}}
                        @if(!empty($coursesToi) && $coursesToi->isNotEmpty())
                            @foreach($coursesToi as $idx => $course)
                                <tr>
                                    @if($idx == 0)
                                    <td style="text-align: center; vertical-align: middle; border: 1px solid #ccc;" rowspan="{{ count($coursesToi) }}">
                                        <p><strong><span style="font-size: 14px;">Tối</span></strong></p>
                                    </td>
                                    @endif
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;"><strong>{{ $course->level }}</strong></span></td>
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;">{!! nl2br(e($course->schedule_time)) !!}</span></td>
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;">{{ $course->duration }}</span></td>
                                </tr>
                            @endforeach
                        @endif

                        {{-- Luyện thi --}}
                        @if(!empty($coursesLuyenThi) && $coursesLuyenThi->isNotEmpty())
                            @foreach($coursesLuyenThi as $idx => $course)
                                <tr>
                                    @if($idx == 0)
                                    <td style="text-align: center; vertical-align: middle; border: 1px solid #ccc;" rowspan="{{ count($coursesLuyenThi) }}">
                                        <p><strong><span style="font-size: 14px;">Luyện thi</span></strong></p>
                                    </td>
                                    @endif
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;"><strong>{{ $course->level }}</strong></span></td>
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;">{!! nl2br(e($course->schedule_time)) !!}</span></td>
                                    <td style="text-align: center; border: 1px solid #ccc;"><span style="font-size: 14px;">{{ $course->duration }}</span></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <p><strong>Đặc biệt: Từ khóa học thứ 2, học viên được tặng 500,000 VND/ lớp tối, 1,000,000 VND/ lớp cấp tốc sáng.</strong></p>
            <p>THÔNG TIN ĐĂNG KÝ HỌC GỒM: HỌ TÊN &#8211; NGÀY THÁNG NĂM SINH &#8211; NƠI SINH &#8211; ĐIỆN THOẠI &#8211; EMAIL CỦA HỌC VIÊN</p>
            <p>Gửi về <a href="mailto:{{ $globalSettings['email_hoc'] ?? 'ngoinhaducindanang@gmail.com' }}"><strong>{{ $globalSettings['email_hoc'] ?? 'ngoinhaducindanang@gmail.com' }}</strong></a>, hoặc điền biểu mẫu tại <a href="{{ route('dang-ky.nhap-hoc') }}"><strong>Đăng ký nhập học</strong></a></p>
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
