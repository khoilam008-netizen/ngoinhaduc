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

            {!! $globalSettings['warning_notice'] ?? '<p><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">CẢNH BÁO LỪA ĐẢO:</mark> Chúng tôi chỉ có một trụ sở duy nhất tại K31/2 Lê Hồng Phong, phường Hải Châu, Đà Nẵng. Fanpage của chúng tôi không tồn tại từ tháng 12/2024. <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-vivid-red-color">Các fanpage hiện đang mạo danh chúng tôi và tuyển sinh qua fanpage LÀ GIẢ MẠO.</mark></strong></p>' !!}

            @if(session('success'))
                <div style="padding:15px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:4px; margin-bottom:20px; font-size:16px;">
                    <strong>Thành công!</strong> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div style="padding:15px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:4px; margin-bottom:20px; font-size:16px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div role="form" class="wpcf7" id="wpcf7-f185-p36-o1" lang="vi" dir="ltr">
                <form action="{{ route('dang-ky.nhap-hoc.store') }}" method="post" class="wpcf7-form">
                    {{ csrf_field() }}
                    <div class="aps-contact-form">
                        <h2>Điền đầy đủ thông tin đăng ký nhập học</h2>
                        <div class="field-group">
                            <label>Họ và tên (*)</label>
                            <span class="wpcf7-form-control-wrap your-name">
                                <input type="text" name="full_name" value="{{ old('full_name') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" />
                            </span>
                        </div>
                        <div class="field-group">
                            <div class="field">
                                <label>Ngày tháng năm sinh (*)</label>
                                <span class="wpcf7-form-control-wrap your-birth">
                                    <input type="text" name="birth_date" value="{{ old('birth_date') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" placeholder="dd/mm/yyyy" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Nơi sinh (*)</label>
                                <span class="wpcf7-form-control-wrap your-birth-place">
                                    <input type="text" name="birth_place" value="{{ old('birth_place') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" />
                                </span>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="field">
                                <label>Số hộ chiếu / CMND / CCCD (*)</label>
                                <span class="wpcf7-form-control-wrap your-pid">
                                    <input type="text" name="passport_number" value="{{ old('passport_number') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Giới tính (*)</label>
                                <span class="wpcf7-form-control-wrap your-sex">
                                    <select name="gender" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" required aria-required="true">
                                        <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="field-group">
                            <label>Đăng ký khóa học (*)</label>
                            <span class="wpcf7-form-control-wrap your-course">
                                <input type="text" name="course_name" value="{{ old('course_name') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" placeholder="Ví dụ: Lớp A1 Sáng" />
                            </span>
                        </div>
                        <div class="field-group">
                            <div class="field">
                                <label>Điện thoại (*)</label>
                                <span class="wpcf7-form-control-wrap your-tel">
                                    <input type="tel" name="phone" value="{{ old('phone') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required" required aria-required="true" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Email (*)</label>
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="email" name="email" value="{{ old('email') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required" required aria-required="true" />
                                </span>
                            </div>
                        </div>
                        <div class="field-group group-submit">
                            <div class="field">
                                <label>Ghi chú / Lời nhắn</label>
                                <span class="wpcf7-form-control-wrap your-message">
                                    <textarea name="message" cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea">{{ old('message') }}</textarea>
                                </span>
                            </div>
                            <div class="field">
                                <input type="submit" value="Gửi Đăng Ký" class="wpcf7-form-control wpcf7-submit" style="background:#a2c037; color:#fff; font-weight:bold; cursor:pointer;" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        @include('partials.sidebar')
    </div>
</div>
@endsection
