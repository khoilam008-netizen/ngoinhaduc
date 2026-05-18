@extends('layouts.main')

@section('title', 'Đăng ký dự thi – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-38 page-child parent-pageid-34 dang-ky-du-thi sidebar-primary')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Đăng ký dự thi</h1>
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
                <span property="name">Đăng ký dự thi</span>
                <meta property="position" content="3">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <p style="text-align: justify;"><span style="font-size: 14px;"><span
                        style="font-size: 32px;">N</span><span style="font-size: 16px;">gôi Nhà Đức hướng dẫn bạn
                        đăng ký thi như sau:</span></span></p>

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

            <p style="text-align: justify;"><span style="font-size: 14px;"><strong>I. NỘI DUNG ĐĂNG KÝ THI: Thí sinh cần cung cấp các thông tin sau</strong></span></p>
            <ul>
                <li style="text-align: justify;"><span style="font-size: 16px;">Họ và tên (viết bằng tiếng Việt <strong>không dấu</strong>)</span></li>
                <li><span style="font-size: 16px;">Ngày tháng năm sinh, Nơi sinh, Giới tính (ghi theo Hộ chiếu)</span></li>
                <li><span style="font-size: 16px;">Số hộ chiếu / CMND / CCCD</span></li>
                <li><span style="font-size: 16px;">Tên cấp độ (SD1/A2/B1/B2) mà bạn muốn dự thi: ghi rõ tên kỹ năng nếu thi B1/B2</span></li>
                <li><span style="font-size: 16px;">Ngày tháng năm của kỳ thi</span></li>
                <li><span style="font-size: 16px;">Số điện thoại và địa chỉ E-mail</span></li>
            </ul>
            <p style="text-align: justify;">Lưu ý: Thông tin đăng ký phải trùng khớp với thông tin có trong Hộ chiếu của thí sinh. Trường hợp thông tin đăng ký không đồng nhất với thông tin có trong Hộ chiếu, thí sinh sẽ mất quyền dự thi và lệ phí thi không được hoàn lại.</p>

            <div role="form" class="wpcf7" style="margin-top: 30px; margin-bottom: 30px;">
                <form action="{{ route('dang-ky.du-thi.store') }}" method="post" class="wpcf7-form">
                    {{ csrf_field() }}
                    <div class="aps-contact-form">
                        <h2>Biểu mẫu đăng ký dự thi trực tuyến</h2>
                        <div class="field-group">
                            <label>Họ và tên (viết không dấu) (*)</label>
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
                            <div class="field">
                                <label>Cấp độ / Kỹ năng thi (*)</label>
                                <span class="wpcf7-form-control-wrap your-exam-level">
                                    <input type="text" name="exam_level" value="{{ old('exam_level') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" placeholder="Ví dụ: B1 đủ 4 kỹ năng" />
                                </span>
                            </div>
                            <div class="field">
                                <label>Tháng dự thi (*)</label>
                                <span class="wpcf7-form-control-wrap your-exam-month">
                                    <input type="text" name="exam_month" value="{{ old('exam_month') }}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required aria-required="true" placeholder="Ví dụ: Tháng 5/2026" />
                                </span>
                            </div>
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
                                <input type="submit" value="Gửi Đăng Ký Thi" class="wpcf7-form-control wpcf7-submit" style="background:#a2c037; color:#fff; font-weight:bold; cursor:pointer;" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <p style="text-align: justify;"><span style="font-size: 14px;"><strong>II. QUY TRÌNH TIẾP NHẬN</strong></span></p>
            <ul>
                <li><span style="color: #0000ff; font-size: 16px;">Sau khi gửi thông tin hoàn tất, hệ thống sẽ ghi nhận và gửi bản xác nhận.</span></li>
                <li><span style="font-size: 16px; color: #0000ff;">Thí sinh sẽ sớm nhận được E-mail phản hồi về đăng ký thi và hướng dẫn nộp lệ phí thi (khoảng 2 ngày làm việc).</span></li>
            </ul>

            <p><span style="font-size: 16px;"><strong>III. LƯU Ý QUAN TRỌNG:</strong></span></p>
            <ul>
                <li>Mỗi thí sinh chỉ có thể thao tác đăng ký MỘT LẦN DUY NHẤT.</li>
                <li>Không hỗ trợ điều chỉnh thông tin đăng ký thi sau khi bấm nút &#8220;GỬI&#8221;.</li>
                <li>Thông tin về thời gian thi, kết quả thi và cách thức nhận văn bằng được thông báo đến thí sinh qua địa chỉ E-Mail do thí sinh đăng ký.</li>
                <li><span style="color: #ff0000;"><strong>Sau khi đã thực hiện chuyển khoản, lệ phí thi không được hoàn lại trong mọi trường hợp.</strong></span></li>
            </ul>
        </main>

        @include('partials.sidebar')
    </div>
</div>
@endsection
