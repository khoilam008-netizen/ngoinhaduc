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
                <table style="width: 753px; height: 660px;">
                    <tbody>
                        <tr style="height: 27px;">
                            <td style="width: 931px; height: 27px; text-align: center;" colspan="6">
                                <h2><span style="font-size: 16px; font-family: Arial;">CÁC KHOÁ HỌC TIẾNG ĐỨC<br /></span></h2>
                            </td>
                        </tr>
                        <tr style="height: 27px;">
                            <td style="width: 630px; height: 27px; border-bottom: 1px solid #333333;" colspan="3">
                                <ul style="margin-bottom: 0;">
                                    <li><span style="font-size: 14px;">Học theo khung tham chiếu Châu Âu GER</span></li>
                                    <li><span style="font-size: 14px;">Giáo viên được đào tạo chuyên nghiệp</span></li>
                                    <li><span style="font-size: 14px;">Giáo viên có bề dày kinh nghiệm chấm thi, làm thi</span></li>
                                    <li><span style="font-size: 14px;">Sách (In nguyên bản của Đức) miễn phí</span></li>
                                    <li><span style="font-size: 14px;">Trang thiết bị dạy học tiên tiến nhất</span></li>
                                </ul>
                            </td>
                            <td style="width: 301px; height: 27px; text-align: center; border-bottom: 1px solid #333333;">
                                <span style="font-size: 16px;"><strong> </strong>
                                    <img decoding="async" class="aligncenter wp-image-740 size-full" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/dang-ky-hoc.png" width="159" height="80" />
                                </span>
                                <a class='btn-link' target='_blank' href='https://ngoinhaducindanang.com.vn/dang-ky/dang-ky-nhap-hoc/'>Đăng ký học</a>
                            </td>
                        </tr>
                        <tr style="height: 22px;">
                            <td style="width: 116px; height: 22px; text-align: center; padding-left: 0px; padding-right: 0px; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong>THỜI GIAN</strong></span>
                            </td>
                            <td style="width: 148px; height: 22px; text-align: center; padding-left: 0px; padding-right: 0px; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong> CẤP ĐỘ</strong></span>
                            </td>
                            <td style="height: 22px; text-align: center; padding-left: 0px; padding-right: 0px; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong> GIỜ HỌC</strong></span>
                            </td>
                            <td style="width: 153px; height: 22px; text-align: center; padding-left: 0px; padding-right: 0px; border: 1px solid #333333; background-color: #bcbdc0;">
                                <span style="font-size: 14px;"><strong>THỜI GIAN (Tuần)</strong></span>
                            </td>
                        </tr>
                        <tr style="height: 27.6875px;">
                            <td style="width: 116px; height: 108.688px; text-align: center;" rowspan="4">
                                <p><strong><span style="font-size: 14px;">Sáng</span></strong></p>
                            </td>
                            <td style="width: 148px; height: 27.6875px; text-align: center;"><span style="font-size: 14px;"><strong>A1</strong></span></td>
                            <td style="height: 108.688px; text-align: center;" rowspan="4">
                                <span style="font-size: 14px;">Thứ 2,3,4,5,6</span>
                                <p><span style="font-size: 14px;">8.00 giờ -11.30giờ</span></p>
                            </td>
                            <td style="width: 153px; height: 27.6875px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 27px;">
                            <td style="width: 148px; height: 27px; text-align: center;"><span style="font-size: 14px;"> <strong>A2</strong></span></td>
                            <td style="width: 153px; height: 27px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 27px;">
                            <td style="width: 148px; height: 27px; text-align: center;"><span style="font-size: 14px;"> <strong>B1</strong></span></td>
                            <td style="width: 153px; height: 27px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 27px;">
                            <td style="width: 148px; height: 27px; text-align: center;"><span style="font-size: 14px;"> <strong>B2.1/B2.2/B2.3</strong></span></td>
                            <td style="width: 153px; height: 27px; text-align: center;"><span style="font-size: 14px;">4 </span></td>
                        </tr>
                        <tr style="height: 25px;">
                            <td style="width: 116px; height: 142px; text-align: center;" rowspan="6"><strong><span style="font-size: 14px;">Tối</span></strong></td>
                            <td style="width: 148px; height: 25px; text-align: center;"><strong><span style="font-size: 14px;">A1.1</span></strong></td>
                            <td style="height: 142px; text-align: center;" rowspan="6">
                                <span style="font-size: 14px;"><span style="font-size: 14px;">Thứ 2/4/6</span></span>
                                <p><span style="font-size: 14px;">18.00 giờ -20.45 giờ</span></p>
                                <p>&nbsp;</p>
                            </td>
                            <td style="width: 153px; height: 25px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 24px;">
                            <td style="width: 148px; height: 24px; text-align: center;"><strong><span style="font-size: 14px;"> A1.2<br /></span></strong></td>
                            <td style="width: 153px; height: 24px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 24px;">
                            <td style="width: 148px; height: 24px; text-align: center;"><strong><span style="font-size: 14px;">A2.1</span></strong></td>
                            <td style="width: 153px; height: 24px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 148px; height: 23px; text-align: center;"><strong><span style="font-size: 14px;">A2.2</span></strong></td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 148px; height: 23px; text-align: center;"><strong><span style="font-size: 14px;">B1.1/B1.2</span></strong></td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 148px; height: 23px; text-align: center;"><span style="font-size: 14px;"><strong>B2.1/B2.2/B2.3</strong></span></td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">8 </span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 116px; height: 92px; text-align: center;" rowspan="4"><strong><span style="font-size: 14px;">Luyện thi</span></strong></td>
                            <td style="width: 148px; height: 23px; text-align: center;"><span style="font-size: 14px;"><strong>A1</strong></span></td>
                            <td style="height: 92px; text-align: center;" rowspan="4">
                                <span style="font-size: 14px;">Lớp luyện thi được tổ chức 3 tuần trước lịch thi hàng tháng. B1/B2 học ôn theo modul! </span>
                            </td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">25 tiết</span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 148px; height: 23px; text-align: center;"><span style="font-size: 14px;"><strong>A2</strong></span></td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">30 tiết</span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 148px; height: 23px; text-align: center;"><span style="font-size: 14px;"><strong>B1</strong></span></td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">48 tiết</span></td>
                        </tr>
                        <tr style="height: 23px;">
                            <td style="width: 148px; height: 23px; text-align: center;"><strong><span style="font-size: 14px;">B2</span></strong></td>
                            <td style="width: 153px; height: 23px; text-align: center;"><span style="font-size: 14px;">48 tiết</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p><strong>Đặc biệt: Từ khóa học thứ 2, học viên được tặng 500,000 VND/ lớp tối, 1,000,000 VND/ lớp cấp tốc sáng.</strong></p>
            <p>THÔNG TIN ĐĂNG KÝ HỌC GỒM: HỌ TÊN &#8211; NGÀY THÁNG NĂM SINH &#8211; NƠI SINH &#8211; ĐIỆN THOẠI &#8211; EMAIL CỦA HỌC VIÊN</p>
            <p>Gửi về <a href="mailto:ngoinhaducindanang@gmail.com"><strong>dangkyhocdanang@gmail.com</strong></a>, hoặc điền biểu mẫu tại <a href="https://ngoinhaducindanang.com.vn/dang-ky/dang-ky-nhap-hoc/"><strong>Đăng ký nhập học</strong></a></p>
        </main>

        @include('partials.sidebar', ['sidebar_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg'])
    </div>
</div>

<div id="imageGallery">
    <div class="container">
        <h2>Thư viện</h2>
        <div class="image-galleries">
            {{-- Gallery items --}}
            <div class="image-gallery">
                <a class="post-thumb" href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg" data-sub-html="<h5>Tham quan lớp học 1</h5>">
                    <img width="370" height="242" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353-370x242.jpg" class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="" decoding="async" loading="lazy" />
                    <div class="gallery-summary">
                        <h5>Tham quan lớp học 1</h5>
                        <p>-</p>
                        <p>Chủ đề: Lớp học vui</p>
                    </div>
                </a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0353.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0355.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0355.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0357.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0357.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0366.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0366.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0370.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0370.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0382.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0382.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0389.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0389.jpg" alt="" style="display: none;"></a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0393.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0393.jpg" alt="" style="display: none;"></a>
            </div>
            {{-- More gallery items can be added here following the same structure --}}
            <div class="image-gallery">
                <a class="post-thumb" href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483.jpg" data-sub-html="<h5>Tham quan lớp học 2</h5>">
                    <img width="370" height="242" src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0483-370x242.jpg" class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="" decoding="async" loading="lazy" />
                    <div class="gallery-summary">
                        <h5>Tham quan lớp học 2</h5>
                        <p>-</p>
                        <p>Chủ đề: Lớp học vui</p>
                    </div>
                </a>
                <a href="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0416.jpg" data-sub-html=""><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0416.jpg" alt="" style="display: none;"></a>
                {{-- Truncating for brevity in this scratch create --}}
            </div>
        </div>
    </div>
</div>
@endsection
