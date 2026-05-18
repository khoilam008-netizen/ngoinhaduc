@extends('layouts.main')

@section('content')
<div id="home-slider">
    <div class="container">
        <div class="mobile-slider">
            <!-- meta slider -->
            <div style="max-width: 748px; margin: 0 auto;"
                class="metaslider metaslider-nivo metaslider-63 ml-slider">

                <div id="metaslider_container_63">
                    <div class='slider-wrapper theme-default'>
                        <div class='ribbon'></div>
                        <div id='metaslider_63' class='nivoSlider'>
                            @if(!empty($mobileSlider) && $mobileSlider->items->isNotEmpty())
                                @foreach($mobileSlider->items as $slide)
                                    <img src="{{ $slide->image_path }}" height="305" width="748" alt="{{ $slide->title ?? '' }}" class="slider-63 slide-{{ $slide->id }}" />
                                @endforeach
                            @else
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/mobile-slider.jpg"
                                    height="305" width="748" alt="" class="slider-63 slide-66" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_02c-748x305.jpg"
                                    height="305" width="748" alt="" class="slider-63 slide-552" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_03c-748x305.jpg"
                                    height="305" width="748" alt="" class="slider-63 slide-554" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_04c-748x305.jpg"
                                    height="305" width="748" alt="" class="slider-63 slide-556" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_05c-748x305.jpg"
                                    height="305" width="748" alt="" class="slider-63 slide-558" />
                            @endif
                        </div>
                    </div>

                </div>
                <script type="text/javascript">
                    var metaslider_63 = function ($) {
                        $('#metaslider_63').nivoSlider({
                            boxCols: 7,
                            boxRows: 5,
                            pauseTime: 3000,
                            effect: "random",
                            controlNav: true,
                            directionNav: false,
                            pauseOnHover: true,
                            animSpeed: 600,
                            prevText: "&lt;",
                            nextText: "&gt;",
                            slices: 15,
                            manualAdvance: true
                        });
                    };
                    var timer_metaslider_63 = function () {
                        var slider = !window.jQuery ? window.setTimeout(timer_metaslider_63, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_63, 1) : metaslider_63(window.jQuery);
                    };
                    timer_metaslider_63();
                </script>
            </div>
            <!--// meta slider-->
        </div>
        <div class="desktop-slider">
            <!-- meta slider -->
            <div style="width: 100%; margin: 0 auto;" class="metaslider metaslider-nivo metaslider-80 ml-slider">

                <div id="metaslider_container_80">
                    <div class='slider-wrapper theme-default'>
                        <div class='ribbon'></div>
                        <div id='metaslider_80' class='nivoSlider'>
                            @if(!empty($desktopSlider) && $desktopSlider->items->isNotEmpty())
                                @foreach($desktopSlider->items as $slide)
                                    <img src="{{ $slide->image_path }}" height="305" width="1170" alt="{{ $slide->title ?? '' }}" class="slider-80 slide-{{ $slide->id }}" />
                                @endforeach
                            @else
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/desktop-slider.jpg"
                                    height="305" width="1170" alt="" class="slider-80 slide-64" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_02c-1170x305.jpg"
                                    height="305" width="1170" alt="" class="slider-80 slide-552" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_03c-1170x305.jpg"
                                    height="305" width="1170" alt="" class="slider-80 slide-554" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_04c-1170x305.jpg"
                                    height="305" width="1170" alt="" class="slider-80 slide-556" />
                                <img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/12/Slide_05c-1170x305.jpg"
                                    height="305" width="1170" alt="" class="slider-80 slide-558" />
                            @endif
                        </div>
                    </div>

                </div>
                <script type="text/javascript">
                    var metaslider_80 = function ($) {
                        $('#metaslider_80').nivoSlider({
                            boxCols: 7,
                            boxRows: 5,
                            pauseTime: 3000,
                            effect: "fade",
                            controlNav: true,
                            directionNav: false,
                            pauseOnHover: true,
                            animSpeed: 600,
                            prevText: "&lt;",
                            nextText: "&gt;",
                            slices: 15,
                            manualAdvance: true
                        });
                    };
                    var timer_metaslider_80 = function () {
                        var slider = !window.jQuery ? window.setTimeout(timer_metaslider_80, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_80, 1) : metaslider_80(window.jQuery);
                    };
                    timer_metaslider_80();
                </script>
            </div>
            <!--// meta slider-->
        </div>
    </div>
</div>

<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="block-table table-responsive " id="welcome">

                <table>
                    <tbody>
                        <tr style="height: 62px;">
                            <td style="height: 62px;" colspan="3">
                                <h2>Chào mừng bạn đến với Trung tâm Đức ngữ Ngôi nhà Đức tại Đà Nẵng</h2>
                            </td>
                        </tr>
                        <tr style="height: 147px;">
                            <td style="height: 147px;" colspan="3">
                                <p style="text-align: center;">Bạn muốn học tiếng Đức hoặc thi lấy chứng chỉ tiếng Đức? Hãy đến với chúng tôi.</p>
                                {!! $globalSettings['warning_notice'] ?? '<p style="text-align: center;"><strong><span style="color: #0000ff;">Chúng tôi chỉ có một trụ sở duy nhất tại K31/2 Lê Hồng Phong, phường Hải Châu, Đà Nẵng</span></strong>. <span style="color: #ff0000;"><strong>Fanpage của chúng tôi không tồn tại từ tháng 12/2024. Các fanpage hiện đang mạo danh chúng tôi và tuyển sinh qua fanpage LÀ GIẢ MẠO. </strong></span></p>' !!}
                            </td>
                        </tr>
                        <tr style="height: 33.8px;">
                            <td style="width: 248.733px; text-align: center; height: 33.8px;"><a
                                    href="{{ route('lich-hoc') }}">LỊCH HỌC</a></td>
                            <td style="width: 248.75px; text-align: center; height: 33.8px;"><a
                                    href="{{ route('lich-thi') }}">LỊCH THI</a></td>
                            <td style="width: 249.517px; text-align: center; height: 33.8px;"><a
                                    href="{{ route('dang-ky.nhap-hoc') }}">ĐĂNG KÝ</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @if(!empty($featuredPost))
            <div class="block-page">
                <div class="page-thumb">
                    <a href="{{ route('gioi-thieu.page', ['slug' => 'ngoi-nha-duc']) }}">
                        <img fetchpriority="high" decoding="async" width="370" height="242"
                            src="{{ $featuredPost->thumbnail ?? 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg' }}"
                            class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="{{ $featuredPost->title }}" /> </a>
                </div>
                <div class="page-summary">
                    <h3><a href="{{ route('gioi-thieu.page', ['slug' => 'ngoi-nha-duc']) }}">{{ $featuredPost->title }}</a></h3>
                    <div class="excerpt">
                        <ul style="padding-left: 18px;">
                            <li><span style="font-size: 14px;">HỌC TIẾNG ĐỨC <span
                                        style="color: #333333;"><strong>&gt;&gt;<em> <span
                                                    style="text-decoration: underline;"><a
                                                        style="color: #333333; text-decoration: underline;"
                                                        href="{{ route('lich-hoc') }}"
                                                        target="_blank" rel="noopener">Đọc
                                                        thêm</a></span></em></strong></span></span></li>
                            <li><span style="font-size: 14px;">THI TIẾNG ĐỨC<span
                                        style="color: #333333;"><strong>&gt;&gt;<em> <a style="color: #333333;"
                                                    href="{{ route('lich-thi') }}"
                                                    target="_blank" rel="noopener"><span
                                                        style="text-decoration: underline;">Đọc
                                                        thêm</span></a></em></strong></span></span></li>
                        </ul>
                    </div>
                    <a href="{{ route('gioi-thieu.page', ['slug' => 'ngoi-nha-duc']) }}" class="read-more">Đọc thêm >></a>
                </div>
            </div>
            @endif

                        <div class="block-page">
                <div class="page-thumb">
                    <a href="#">
                        <img decoding="async" width="370" height="242"
                            src="{{ $eventCategory->image ?? 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/DSC_0505-370x242.jpg' }}"
                            class="attachment-page-thumbnail size-page-thumbnail wp-post-image" alt="{{ $eventCategory->name ?? 'Sự kiện' }}" /> </a>
                </div>
                <div class="page-summary">
                    <h3><a href="#">{{ $eventCategory->name ?? 'Sự kiện' }}</a></h3>
                    <div class="excerpt">
                        <ul style="padding-left: 18px;">
                            @forelse($eventPosts as $post)
                                <li><span style="font-size: 14px;">{{ Str::limit($post->title, 40, '...') }} <span
                                            style="color: #333333;"><strong>&gt;&gt;<em> <span
                                                        style="text-decoration: underline;"><a
                                                            style="color: #333333; text-decoration: underline;"
                                                            href="{{ route('posts.show', ['slug' => $post->slug]) }}"
                                                            target="_blank" rel="noopener">Đọc
                                                            thêm</a></span></em></strong></span></span></li>
                            @empty
                                <li><span style="font-size: 14px; color: #888;">Chưa có sự kiện nào.</span></li>
                            @endforelse
                        </ul>
                    </div>
                    <a href="#" class="read-more">Đọc thêm >></a>
                </div>
            </div>

        </main><!-- /.main -->
        
        @include('partials.sidebar')
    </div><!-- /.content -->
</div><!-- /.wrap -->
@endsection
