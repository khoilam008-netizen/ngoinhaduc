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
            <p style="text-align: justify;"><span style="font-size: 14px;"><strong>I. NỘI DUNG ĐĂNG KÝ THI: Thí sinh
                        cần cung cấp các thông tin sau</strong></span></p>
            <ul>
                <li style="text-align: justify;"><span style="font-size: 16px;">Họ và tên (viết bằng tiếng Việt
                        <strong>không dấu</strong>)</span></li>
                <li><span style="font-size: 16px;">Ngày tháng năm sinh, Nơi sinh, Giới tính (ghi theo Hộ
                        chiếu)</span></li>
                <li><span style="font-size: 16px;">Số hộ chiếu</span></li>
                <li><span style="font-size: 16px;">Tên cấp độ (SD1/A2/B1/B2) mà bạn muốn dự thi: ghi rõ tên kỹ năng
                        nếu thi B1/B2</span></li>
                <li><span style="font-size: 16px;">Ngày tháng năm của kỳ thi</span></li>
                <li><span style="font-size: 16px;">Số điện thoại và địa chỉ E-mail</span></li>
            </ul>
            <p style="text-align: justify;">Lưu ý: Thông tin đăng ký phải trùng khớp với thông tin có trong Hộ chiếu
                của thí sinh. Trường hợp thông tin đăng ký không đồng nhất với thông tin có trong Hộ chiếu, thí sinh
                sẽ mất quyền dự thi và lệ phí thi không được hoàn lại.</p>
            <p style="text-align: justify;"><span style="font-size: 14px;"><strong>II. GỬI ĐĂNG KÝ THI NHƯ
                        SAU</strong></span></p>
            <ul>
                <li><span style="color: #0000ff; font-size: 16px;">Click vào LINK ĐĂNG KÝ THI CỦA THÁNG mà bạn muốn
                        dự thi (Bạn muốn đăng ký thi tháng 3? Vậy click vào link đăng ký thi của tháng 3). </span>
                </li>
                <li><span style="font-size: 16px; color: #0000ff;">Nhập thông tin đăng ký theo hướng dẫn.</span>
                </li>
                <li><span style="color: #0000ff; font-size: 16px;">Sau khi nhập thông tin hoàn tất, thí sinh sẽ nhận
                        được Bản câu trả lời (mà thí sinh vừa điền) được gửi tự động từ hệ thống.</span></li>
            </ul>
            <p style="text-align: justify;">Thí sinh sẽ sớm nhận được E-mail phản hồi về đăng ký thi và hướng dẫn
                nộp lệ phí thi (khoảng 2 ngày làm việc kể từ khi đăng ký thi hợp lệ được gửi đi).</p>
            <p style="text-align: justify;"><span style="color: #ff0000;"><strong>CẢNH BÁO LỪA ĐẢO: CHÚNG TÔI KHÔNG
                        TUYỂN SINH QUA FACEBOOK. <span style="color: #000000;">Fanpage của trung tâm hiện không hoạt
                            động.</span></strong></span><span style="color: #000000;"> </span><strong>Địa chỉ duy
                    nhất</strong> chấp nhận đăng ký thi và hướng dẫn các nội dung liên quan về thi tại điểm thi Đà
                Nẵng là <span style="color: #0000ff;"><strong><a style="color: #0000ff;"
                            href="mailto:dangkythidanang@gmail.com">dangkythidanang@gmail.com.</a></strong></span><strong>
                    Trường hợp link đăng ký thi tháng gặp sự cố, link mới sẽ được cập nhật tại website này. Hoặc thí
                    sinh nhận link mới từ <span style="color: #0000ff;"><a style="color: #0000ff;"
                            href="mailto:dangkythidanang@gmail.com">dangkythidanang@gmail.com.</a></span></strong>
            </p>
            <p style="text-align: justify;"><span style="font-size: 16px;"><strong>III. LINK ĐĂNG KÝ THI CÁC THÁNG:
                    </strong>Thí sinh chỉ có thể thao tác đăng ký thi trên link vào thời gian mở cửa đăng ký thi của
                    tháng, <strong><span style="color: #ff0000;">KHÔNG THỂ/ KHÔNG NHẬN ĐĂNG KÝ GIỮ
                            CHỖ</span></strong> các tháng kế tiếp. </span></p>
            
            @php
                $exam_status = [
                    'THÁNG 1/2026' => 'KHÔNG CÓ LỊCH THI',
                    'THÁNG 2/2026' => 'KHÔNG CÓ LỊCH THI',
                    'THÁNG 3/2026' => 'KHÔNG CÓ LỊCH THI',
                    'THÁNG 4/2026' => 'KHÔNG CÓ LỊCH THI',
                    'THÁNG 5/2026' => 'KHÔNG CÓ LỊCH THI',
                    'THÁNG 6/2026' => 'KHÔNG CÓ LỊCH THI',
                    'THÁNG 9/2026' => 'CHƯA CÓ LỊCH',
                    'THÁNG 10/2026' => 'CHƯA CÓ LỊCH',
                    'THÁNG 11/2026' => 'CHƯA CÓ LỊCH',
                    'THÁNG 12/2026' => 'CHƯA CÓ LỊCH',
                ];
            @endphp

            @foreach($exam_status as $month => $status)
                <p>
                    <strong>
                        <span @if(str_contains($status, 'KHÔNG CÓ')) style="color: #ff0000;" @else style="color: #0000ff;" @endif>
                            <span style="font-size: large;">{{ $month }}: {{ $status }}</span>
                        </span>
                    </strong>
                </p>
            @endforeach

            <p><span style="font-size: 16px;"><strong>IV. LƯU Ý:</strong></span></p>
            <ul>
                <li>Mỗi thí sinh chỉ có thể thao tác trên link đăng ký thi MỘT LẦN DUY NHẤT. Từ lần thứ 2 trở đi,
                    đăng ký thi sẽ không được chấp nhận. Nhiều E-Mail cùng đăng ký cho một thí sinh cũng sẽ không
                    được chấp nhận.</li>
                <li>Không hỗ trợ điều chỉnh thông tin đăng ký thi sau khi bấm nút &#8220;GỬI&#8221;.</li>
                <li>Các file Word/ Excel đăng ký thi được gửi về <span style="color: #0000ff;"><strong><a
                                style="color: #0000ff;"
                                href="mailto:dangkythidanang@gmail.com">dangkythidanang@gmail.com</a></strong>
                    </span>sẽ bị từ chối và yêu cầu thực hiện đăng ký thi tại <strong>link</strong> đăng ký.</li>
                <li>Thông tin về thời gian thi, kết quả thi và cách thức nhận văn bằng được thông báo đến thí sinh
                    qua địa chỉ E-Mail do thí sinh đăng ký.</li>
                <li><span style="color: #ff0000;"><strong>Sau khi đã thực hiện chuyển khoản, lệ phí thi không được
                            hoàn lại trong mọi trường hợp.</strong></span></li>
            </ul>
        </main>

        @include('partials.sidebar', ['sidebar_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klasse2.jpg'])
    </div>
</div>
@endsection
