<footer class="content-info">
    <div class="container">
        <section class="widget-1 widget-first widget-odd widget black-studio-tinymce-2 widget_black_studio_tinymce">
            <h3>Thông tin liên hệ</h3>
            <div class="textwidget">
                <ul>
                    <li><span style="font-size: 16px;">Địa chỉ: {{ $globalSettings['address'] ?? 'K31/2 Lê Hồng Phong, Tp. Đà Nẵng' }}</span></li>
                    <li><span style="font-size: 16px;">Điện thoại: <a href="tel:{{ $globalSettings['phone_link'] ?? '+842363565783' }}">{{ $globalSettings['phone'] ?? '+ 84 (0236) 3565 783' }}</a></span></li>
                    <li><span style="font-size: 16px;">Email đăng ký học: <span
                                style="text-decoration: underline;"><strong><a
                                        href="mailto:{{ $globalSettings['email_hoc'] ?? 'ngoinhaducindanang@gmail.com' }}">{{ $globalSettings['email_hoc'] ?? 'ngoinhaducindanang@gmail.com' }}</a></strong></span></span>
                    </li>
                    <li><span style="font-size: 16px;">Email đăng ký thi: <span
                                style="text-decoration: underline;"><strong><a
                                        href="mailto:{{ $globalSettings['email_thi'] ?? 'dangkythidanang@gmail.com' }}">{{ $globalSettings['email_thi'] ?? 'dangkythidanang@gmail.com' }}</a></strong></span></span>
                    </li>
                </ul>
            </div>
        </section>
        <section class="widget-2 widget-even widget black-studio-tinymce-3 widget_black_studio_tinymce">
            <h3>Liên kết</h3>
            <div class="textwidget">
                <table style="height: 62px; width: 463px;">
                    <tbody>
                        <tr style="height: 7px;">
                            <td style="width: 262.717px; height: 7px;">
                                <ul>
                                    <li><span style="text-decoration: underline; font-size: 16px;"><a
                                                href="{{ $globalSettings['facebook_url'] ?? 'https://www.facebook.com/ngoinhaducindanang.com.vn/' }}"
                                                target="_blank"><strong>Facebook</strong></a></span></li>
                                    <li><span style="text-decoration: underline; font-size: 16px;"><strong><a
                                                    href="http://www.hanoi.diplo.de/" target="_blank">Đại sứ quán
                                                    Đức</a></strong></span></li>
                                    <li><span style="font-size: 16px;"><a href="http://www.hanoi.diplo.de"><span
                                                    style="text-decoration: underline;"><strong>Tổng lãnh sự quán
                                                        Đức</strong></span></a></span></li>
                                    <li><span style="font-size: 16px;"><a href="http://www.daad-vietnam.vn"><span
                                                    style="text-decoration: underline;"><strong>DAAD Việt
                                                        Nam</strong></span></a></span></li>
                                </ul>
                            </td>
                            <td style="width: 199.283px; height: 7px;">
                                <ul>
                                    <li><span style="font-size: 16px;"><a
                                                href="http://www.dw.com/de/deutsch-lernen/s-2055"
                                                target="_blank"><span
                                                    style="text-decoration: underline;"><strong>Deutsche
                                                        Welle</strong></span></a></span></li>
                                    <li><span style="font-size: 16px;"><a
                                                href="https://www.goethe.de/ins/vn/vi/index.html"
                                                target="_blank"><span
                                                    style="text-decoration: underline;"><strong>Viện
                                                        Goethe</strong></span></a></span></li>
                                    <li><span style="text-decoration: underline; font-size: 16px;"><strong><a
                                                    href="https://www.hueber.de" target="_blank">Nhà xuất bản
                                                    Hueber</a></strong></span></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
            </div>
        </section>
    </div>
</footer>
