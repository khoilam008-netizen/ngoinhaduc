<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('assets/images/favicon.ico') }}">
    <title>@yield('title', 'Ngôi nhà Đức – Trung tâm Đức ngữ tại Đà Nẵng')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" type="text/css" media="all" />
    <meta name='robots' content='max-image-preview:large' />

    <link rel='stylesheet' id='wp-block-library-css'
        href="{{ asset('assets/css/style.css') }}" type='text/css' media='all' />

    <style id='classic-theme-styles-inline-css' type='text/css'>
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>

    <link rel='stylesheet' id='contact-form-7-css'
        href="{{ asset('assets/css/style.css') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='wp-pagenavi-css'
        href="{{ asset('assets/css/style.css') }}"
        type='text/css' media='all' />
    <link rel='stylesheet' id='lightslider/css-css'
        href='{{ asset('assets/css/lightslider.css') }}'
        type='text/css' media='all' />
    <link rel='stylesheet' id='lightgallery/css-css'
        href='{{ asset('assets/css/lightgallery.css') }}'
        type='text/css' media='all' />
    <link rel='stylesheet' id='sage/css-css'
        href='{{ asset('assets/css/main.css') }}'
        type='text/css' media='all' />

    {{-- Custom Styles from original index.html --}}
    <style type="text/css">
        #lang_sel_list a.lang_sel_sel,
        #lang_sel_list a.lang_sel_sel:visited {
            color: #444444;
        }

        #lang_sel_list a:hover,
        #lang_sel_list a.lang_sel_sel:hover {
            color: #000000;
        }

        #lang_sel_list a.lang_sel_sel,
        #lang_sel_list a.lang_sel_sel:visited {
            background-color: #ffffff;
        }

        #lang_sel_list a.lang_sel_sel:hover {
            background-color: #eeeeee;
        }

        #lang_sel_list ul a.lang_sel_other,
        #lang_sel_list ul a.lang_sel_other:visited {
            color: #444444;
        }

        #lang_sel_list ul a.lang_sel_other:hover {
            color: #000000;
        }

        #lang_sel_list ul a.lang_sel_other,
        #lang_sel li ul a:link,
        #lang_sel_list ul a.lang_sel_other:visited {
            background-color: #ffffff;
        }

        #lang_sel_list ul a.lang_sel_other:hover {
            background-color: #eeeeee;
        }

        #lang_sel_list a,
        #lang_sel_list a:visited {
            border-color: #cdcdcd;
        }

        #lang_sel_list ul {
            border-top: 1px solid #cdcdcd;
        }
    </style>

    <style type="text/css" media="screen">
        .block-page .page-summary div.excerpt p {
            margin-bottom: 10px;
        }

        .block-page .page-summary div.excerpt a.read-more {
            margin-top: 10px;
        }

        .block-table tr td {
            vertical-align: middle;
            padding-left: 15px;
            padding-right: 15px;
        }

        aside.sidebar .widget_metaslider_widget {
            padding: 30px 32px;
            background: #dcddde;
        }

        footer.content-info .widget table {
            border: none !important;
        }

        footer.content-info .widget table tr td {
            border: none !important;
            padding: 0 !important;
        }

        @media (min-width: 992px) {
            footer.content-info .widget>h3 {
                font-size: 18px;
                margin-bottom: 15px;
            }

            footer.content-info .widget ul li {
                margin-bottom: 5px;
            }

            footer.content-info .widget:first-child {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
                width: 50%;
                float: left !important;
                margin-bottom: 0;
            }

            header.banner nav.nav-primary>div ul.nav>li ul.sub-menu {
                width: 250px;
            }
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <script type="text/javascript" src="https://ngoinhaducindanang.com.vn/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
        id="jquery-core-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
        id="jquery-migrate-js"></script>

    @stack('styles')
</head>

<body class="@yield('body_class', 'home page-template-default page page-id-2 sidebar-primary')">
    <!--[if IE]>
      <div class="alert alert-warning">
        You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.      </div>
    <![endif]-->

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <link rel='stylesheet' id='metaslider-nivo-slider-css'
        href='https://ngoinhaducindanang.com.vn/wp-content/plugins/ml-slider/assets/sliders/nivoslider/nivo-slider.css?ver=3.3.7'
        type='text/css' media='all' property='stylesheet' />
    <link rel='stylesheet' id='metaslider-public-css'
        href='https://ngoinhaducindanang.com.vn/wp-content/plugins/ml-slider/assets/metaslider/public.css?ver=3.3.7'
        type='text/css' media='all' property='stylesheet' />
    <link rel='stylesheet' id='metaslider-nivo-slider-default-css'
        href='https://ngoinhaducindanang.com.vn/wp-content/plugins/ml-slider/assets/sliders/nivoslider/themes/default/default.css?ver=3.3.7'
        type='text/css' media='all' property='stylesheet' />
    
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20"
        id="jquery-form-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.6"
        id="contact-form-7-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/assets/libs/lightslider-master/dist/js/lightslider.min.js"
        id="lightslider/js-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/assets/libs/lightGallery-master/lib/picturefill.min.js"
        id="picturefill/js-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/assets/libs/lightGallery-master/lib/lightgallery-all.min.js"
        id="lightgallery/js-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/themes/germancenter/dist/scripts/main-d637ac0131.js"
        id="sage/js-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/plugins/sitepress-multilingual-cms/res/js/sitepress.js?ver=6.4.8"
        id="sitepress-js"></script>
    <script type="text/javascript"
        src="https://ngoinhaducindanang.com.vn/wp-content/plugins/ml-slider/assets/sliders/nivoslider/jquery.nivo.slider.pack.js?ver=3.3.7"
        id="metaslider-nivo-slider-js"></script>

    @stack('scripts')
</body>

</html>
