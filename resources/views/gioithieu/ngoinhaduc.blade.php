@extends('layouts.main')

@section('title', 'Ngôi nhà Đức – Ngôi nhà Đức')

@section('body_class', 'page-template-default page page-id-10 page-child parent-pageid-8 ngoi-nha-duc sidebar-primary')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="page-header">
            <h1>Ngôi nhà Đức</h1>
        </div>

        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Ngôi nhà Đức." href="{{ route('home') }}" class="home">
                    <span property="name">Trang chủ</span>
                </a>
                <meta property="position" content="1">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" title="Go to Giới thiệu." href="#" class="post post-page">
                    <span property="name">Giới thiệu</span>
                </a>
                <meta property="position" content="2">
            </span> / 
            <span property="itemListElement" typeof="ListItem">
                <span property="name">Ngôi nhà Đức</span>
                <meta property="position" content="3">
            </span>
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="block-content">
                <p style="text-align: justify;"><span style="font-size: 14px;"><span style="font-size: 32px;">N</span><span style="font-size: 16px;">gôi Nhà Đức tại Đà Nẵng là một <span style="color: #000000;"><strong><a style="color: #000000; text-decoration: underline;" href="https://www.daad-vietnam.org/vi/hoc-tap-va-nghien-cuu-tai-duc/hoc-tieng-duc/hoc-tieng-duc-tai-viet-nam/">trung tâm ngoại ngữ uy tín</a></strong></span> với các khoá học chất lượng dành cho học viên tiếng Đức ở toàn khu vực miền Trung Việt Nam dưới sự điều hành của TS. Paul Weinig và ThS. Dương Thị Dung. Phương châm của chúng tôi là: Chất lượng quan trọng hơn số lượng và sự nghiêm túc luôn được đặt lên hàng đầu. </span></span></p>
                <p style="text-align: justify;"><span style="font-size: 16px;">Ngôi Nhà Đức tổ chức các khóa học cho mọi đối tượng với các trình độ từ A1 đến C2 theo Khung tham chiếu chung về trình độ ngôn ngữ của Châu Âu. Trong vai trò là <span style="text-decoration: underline;"><strong><span style="color: #000000; text-decoration: underline;"><a style="color: #000000; text-decoration: underline;" href="https://www.goethe.de/ins/vn/vi/sta/koo/dsd.html">đối tác của Goethe Institu</a></span></strong><span style="color: #000000; text-decoration: underline;"><a style="color: #000000; text-decoration: underline;" href="https://www.goethe.de/ins/vn/vi/sta/koo/dsd.html">t</a></span> </span>và là Trung tâm Khảo thí tiếng Đức của Goethe Institut tại khu vực miền Trung Việt Nam, các kỳ thi tiếng Đức quốc tế của Goethe Institut diễn ra tại đây<br /></span></p>
                <p style="text-align: justify;"><span style="font-size: 16px;">Phù hợp với phương châm của mình, Ngôi Nhà Đức tại Đà Nẵng cộng tác với giáo viên có trình độ, được đào tạo chuyên ngành tốt, có bề dày kinh nghiệm giảng dạy và làm khảo thí, có phương pháp giảng dạy hiện đại; đồng thời triển khai hiệu quả các tài liệu dạy và học nguyên bản mới nhất của các nhà xuất bản Đức. </span></p>
                <p style="text-align: justify;"><span style="font-size: 16px;">Ngôi Nhà Đức Đà Nẵng nằm ở ngay trung tâm thành phố, <strong>có một trụ sở duy nhất</strong> tại địa chỉ <strong>31/2 Lê Hồng Phong, phường Hải Châu, Đà Nẵng</strong> và chỉ cách con đường Bạch Đằng tuyệt đẹp bên sông Hàn cũng như cầu Rồng và Bảo tàng điêu khắc Chăm 5 phút đi bộ. Và sau 10 phút đi xe máy qua cầu sông Hàn/ cầu Rồng, biển Đà Nẵng xanh sạch đã hiện ra trước mắt.</span></p>
            </div>
        </main>

        @include('partials.sidebar', ['sidebar_img' => 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505.jpg'])
    </div>
</div>
@endsection
