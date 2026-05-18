<aside class="sidebar">
    <section class="widget-1 widget-first widget-odd widget text-3 widget_text">
        <h3>Ảnh tiêu biểu của Trang</h3>
        <div class="textwidget">
            <div class="page-featured-image">
                <img width="800" height="600" 
                     src="{{ $globalSettings['sidebar_image'] ?? 'https://ngoinhaducindanang.com.vn/wp-content/uploads/2016/10/Klassegross6.jpg' }}" 
                     class="attachment-post-thumbnail size-post-thumbnail wp-post-image" 
                     alt="" decoding="async" loading="lazy" />
            </div>
        </div>
    </section>
    <section class="widget-2 widget-last widget-even image-slider-widget widget metaslider_widget-2 widget_metaslider_widget">
        <div style="width: 100%; margin: 0 auto;" class="metaslider metaslider-nivo metaslider-656 ml-slider">
            <div id="metaslider_container_656">
                <div class='slider-wrapper theme-default'>
                    <div class='ribbon'></div>
                    <div id='metaslider_656' class='nivoSlider'>
                        @if(!empty($sidebarSlider) && $sidebarSlider->items->isNotEmpty())
                            @foreach($sidebarSlider->items as $slide)
                                <a href="{{ $slide->link ?? '#' }}" target="_blank">
                                    <img src="{{ $slide->image_path }}" height="533" width="400" alt="{{ $slide->title ?? '' }}" class="slider-656 slide-{{ $slide->id }}" />
                                </a>
                            @endforeach
                        @else
                            <a href="#" target="_blank"><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/03/sicher.jpg" height="533" width="400" alt="" class="slider-656 slide-663" /></a>
                            <a href="#" target="_blank"><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/03/menschen.jpg" height="533" width="400" alt="" class="slider-656 slide-659" /></a>
                            <a href="#" target="_blank"><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/03/schritte.jpg" height="533" width="400" alt="" class="slider-656 slide-661" /></a>
                            <a href="#" target="_blank"><img src="https://ngoinhaducindanang.com.vn/wp-content/uploads/2017/04/dutch-flag1-400x533.jpg" height="533" width="400" alt="" class="slider-656 slide-786" /></a>
                        @endif
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var metaslider_656 = function ($) {
                    $('#metaslider_656').nivoSlider({
                        boxCols: 7,
                        boxRows: 5,
                        pauseTime: 3000,
                        effect: "fade",
                        controlNav: false,
                        directionNav: true,
                        pauseOnHover: true,
                        animSpeed: 600,
                        prevText: "&lt;",
                        nextText: "&gt;",
                        slices: 15,
                        manualAdvance: false
                    });
                };
                var timer_metaslider_656 = function () {
                    var slider = !window.jQuery ? window.setTimeout(timer_metaslider_656, 100) : !jQuery.isReady ? window.setTimeout(timer_metaslider_656, 1) : metaslider_656(window.jQuery);
                };
                timer_metaslider_656();
            </script>
        </div>
    </section>
</aside>
