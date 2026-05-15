<header class="banner">
    <div class="container">
        <a class="brand" href="{{ route('home') }}">
            <img src="https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/logo.png" alt="Ngôi nhà Đức">
            <h1>Ngôi nhà Đức - Trung tâm Đức ngữ tại Đà Nẵng</h1>
        </a>
        <nav class="nav-primary">
            <a href="#" id="btn-toggleMenu">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="menu-menu-chinh-container">
                <ul id="menu-menu-chinh" class="nav">
                    <li id="menu-item-545"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children {{ request()->is('gioi-thieu*') ? 'current-menu-ancestor current-menu-parent' : '' }} menu-item-545">
                        <a href="#">Giới thiệu</a>
                        <ul class="sub-menu">
                            <li id="menu-item-47"
                                class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('gioi-thieu/ngoi-nha-duc') ? 'current-menu-item' : '' }} menu-item-47"><a
                                    href="{{ route('gioi-thieu.ngoi-nha-duc') }}">Ngôi nhà
                                    Đức</a></li>
                            <li id="menu-item-48"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48"><a
                                    href="#">Giới
                                    thiệu Đà Nẵng</a></li>
                            <li id="menu-item-49"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a
                                    href="#">Phương
                                    pháp giảng dạy</a></li>
                            <li id="menu-item-51"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51"><a
                                    href="#">Cơ sở vật
                                    chất</a></li>
                            <li id="menu-item-675"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-675"><a
                                    href="#">Sự kiện</a></li>
                            <li id="menu-item-53"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a
                                    href="#">Các
                                    đối tác của chúng tôi</a></li>
                            <li id="menu-item-52"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52"><a
                                    href="#">Chứng
                                    chỉ Goethe-Zertifikat</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-19797"
                        class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('lich-hoc') ? 'current-menu-item' : '' }} menu-item-19797"><a
                            href="{{ route('lich-hoc') }}">Lịch học</a></li>
                    <li id="menu-item-55"
                        class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('lich-thi') ? 'current-menu-item' : '' }} menu-item-55"><a
                            href="{{ route('lich-thi') }}">Lịch thi</a></li>
                    <li id="menu-item-57"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children {{ request()->is('thu-vien*') ? 'current-menu-ancestor current-menu-parent' : '' }} menu-item-57">
                        <a href="#">Thư viện</a>
                        <ul class="sub-menu">
                            <li id="menu-item-58"
                                class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('thu-vien/anh') ? 'current-menu-item' : '' }} menu-item-58"><a
                                    href="{{ route('thu-vien.anh') }}">Thư viện
                                    ảnh</a></li>
                            <li id="menu-item-59"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a
                                    href="#">Tài liệu
                                    tham khảo</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-43"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children {{ request()->is('dang-ky*') ? 'current-menu-ancestor current-menu-parent' : '' }} menu-item-43">
                        <a href="#">Đăng ký</a>
                        <ul class="sub-menu">
                            <li id="menu-item-44"
                                class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('dang-ky/dang-ky-nhap-hoc') ? 'current-menu-item' : '' }} menu-item-44"><a
                                    href="{{ route('dang-ky.nhap-hoc') }}">Đăng ký nhập
                                    học</a></li>
                            <li id="menu-item-45"
                                class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('dang-ky/dang-ky-du-thi') ? 'current-menu-item' : '' }} menu-item-45"><a
                                    href="{{ route('dang-ky.du-thi') }}">Đăng ký dự
                                    thi</a></li>
                        </ul>
                    </li>
                    <li id="menu-item-56"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children {{ request()->is('lien-he*') ? 'current-menu-ancestor current-menu-parent' : '' }} menu-item-56">
                        <a href="{{ route('lien-he') }}">Liên hệ</a>
                        <ul class="sub-menu">
                            <li id="menu-item-191"
                                class="menu-item menu-item-type-post_type menu-item-object-page {{ request()->is('lien-he') ? 'current-menu-item' : '' }} menu-item-191"><a
                                    href="{{ route('lien-he') }}">Thông tin liên hệ</a></li>
                            <li id="menu-item-192"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-192"><a
                                    href="#">Tuyển dụng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="clearfix"></div>
    </div>
</header>
