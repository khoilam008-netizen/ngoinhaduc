@extends('layouts.main')

@section('title', 'Đăng ký nhập học – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-36 page-child parent-pageid-34 dang-ky-nhap-hoc sidebar-primary')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Đăng ký nhập học</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Đăng ký." href="#" class="post post-page">
                    <span property="name">Đăng ký</span>
                </a>
                <meta property="position" content="2">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Đăng ký nhập học</span>
                <meta property="position" content="3">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <p><strong>LIÊN TỤC KHAI GIẢNG MỚI &#8211; NHANH TAY ĐĂNG KÝ HỌC NÀO!</strong></p>

            <p><strong><mark style="background-color:rgba(0, 0, 0, 0)"
                        class="has-inline-color has-vivid-red-color">CẢNH BÁO LỪA ĐẢO:</mark> Chúng tôi chỉ có một
                    trụ sở duy nhất tại K31/2 Lê Hồng Phong, phường Hải Châu, Đà Nẵng. Fanpage của chúng tôi không
                    tồn tại từ tháng 12/2024. <mark style="background-color:rgba(0, 0, 0, 0)"
                        class="has-inline-color has-vivid-red-color">Các fanpage hiện đang mạo danh chúng tôi và
                        tuyển sinh qua fanpage LÀ GIẢ MẠO.</mark></strong></p>

            <div role="form" class="wpcf7" id="wpcf7-f185-p36-o1" lang="vi" dir="ltr">
                <div class="screen-reader-response"></div>
                <form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="aps-contact-form">
                        <h2>Điền đầy đủ thông tin đăng ký nhập học</h2>
                        <div class="field-group">
                            <label>Họ và tên (*)</label>
                            <span class="wpcf7-form-control-wrap your-name">
                                <input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
                            </span>
                        </div>
                        <div class="field-group">
                            <div class="field">
                                <label>Ngày tháng năm sinh (*)</label>
                                <span class="wpcf7-form-control-wrap your-birth">
                                    <input type="text" name="your-birth" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="dd/mm/yyyy" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Nơi sinh (*)</label>
                                <span class="wpcf7-form-control-wrap your-birth-place">
                                    <input type="text" name="your-birth-place" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
                                </span>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field">
                                <label>Số hộ chiếu (*)</label>
                                <span class="wpcf7-form-control-wrap your-pid">
                                    <input type="text" name="your-pid" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Giới tính (*)</label>
                                <span class="wpcf7-form-control-wrap your-sex">
                                    <select name="your-sex" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="field-group">
                            <label>Đăng ký khóa học (*)</label>
                            <span class="wpcf7-form-control-wrap your-course">
                                <input type="text" name="your-course" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" />
                            </span>
                        </div>
                        <div class="field-group">
                            <div class="field">
                                <label>Điện thoại (*)</label>
                                <span class="wpcf7-form-control-wrap your-tel">
                                    <input type="tel" name="your-tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Email (*)</label>
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" />
                                </span>
                            </div>
                        </div>
                        <div class="field-group group-submit">
                            <div class="field">
                                <label>Nội dung (*)</label>
                                <span class="wpcf7-form-control-wrap your-message">
                                    <textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea>
                                </span>
                            </div>
                            <div class="field">
                                <input type="submit" value="Gửi" class="wpcf7-form-control wpcf7-submit" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        @include('partials.sidebar', ['sidebar_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0489.jpg'])
    </div>
</div>
@endsection
