@extends('layout.ovation_home_layout')

@section('content')
    <!--==============================
    Hero Area
    ==============================-->
    <div class="hero-wrapper hero-1" id="hero">
        <div class="global-carousel" id="heroSlider1" data-fade="true" data-slide-show="1" data-lg-slide-show="1"
             data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="false">
            <div class="hero-slider"
                 data-bg-src="{{asset('assets/ovation-store-template/assets/img/hero/hero_bg_1_1.png')}}">
                <div class="hero-shape1_1 shape-mockup movingX" data-bottom="0" data-left="0">
                    <img src="{{asset('assets/ovation-store-template/assets/img/hero/hero_shape_1_1.png')}}" alt="img">
                </div>
                <div class="hero-shape1_2 shape-mockup movingX" data-top="-25%" data-right="35%">
                    <img src="{{asset('assets/ovation-store-template/assets/img/hero/hero_shape_1_2.png')}}" alt="img">
                </div>
                <div class="container">
                    <div class="row flex-row-reverse">

                        <div class="col-lg-6 col-md-12">
                            <div class="hero-style1">
                                <span class="hero-subtitle" data-ani="slideindown"
                                      data-ani-delay="0.5s">Trang Web Cưới</span>
                                <span class="hero-subtitle2" data-ani="slideindown" data-ani-delay="0.4s">Dịch vụ cho thuê website cưới chuyên nghiệp</span>
                                <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.1s">WEBSITE CƯỚI</h1>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.1s">ĐẲNG CẤP & SANG TRỌNG</h1>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.4s">
                                    <a href="{{ $is_registered ? route('guest_admin.dashboard') : '#' }}" class="btn style2 @if(!$is_registered) js-scroll-register @endif ">ĐĂNG KÝ NGAY</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-end">
                            <div class="hero-thumb1" data-ani="slideinleft" data-ani-delay="0.1s">
                                <img src="{{asset('assets/ovation-store-template/assets/img/hero/hero_1_1.png')}}"
                                     alt="img">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="hero-slider"
                 data-bg-src="{{asset('assets/ovation-store-template/assets/img/hero/hero_bg_1_1.png')}}">
                <div class="hero-shape1_1 shape-mockup movingX" data-bottom="0" data-left="0">
                    <img src="{{asset('assets/ovation-store-template/assets/img/hero/hero_shape_1_1.png')}}" alt="img">
                </div>
                <div class="hero-shape1_2 shape-mockup movingX" data-top="-25%" data-right="35%">
                    <img src="{{asset('assets/ovation-store-template/assets/img/hero/hero_shape_1_2.png')}}" alt="img">
                </div>
                <div class="container">
                    <div class="row flex-row-reverse">

                        <div class="col-lg-6 col-md-12">
                            <div class="hero-style1">
                                <span class="hero-subtitle" data-ani="slideindown"
                                      data-ani-delay="0.5s">Thiết Kế Chuyên Nghiệp</span>
                                <span class="hero-subtitle2" data-ani="slideindown" data-ani-delay="0.4s">Giao diện đẹp mắt, dễ sử dụng, tùy biến cao</span>
                                <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.1s">WEBSITE CƯỚI</h1>
                                <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.1s">THIẾT KẾ HIỆN ĐẠI</h1>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.4s">
                                    <a href="{{ $is_registered ? route('guest_admin.dashboard') : '#' }}" class="btn style2 @if(!$is_registered) js-scroll-register @endif">ĐĂNG KÝ NGAY</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 align-self-end">
                            <div class="hero-thumb1" data-ani="slideinleft" data-ani-delay="0.1s">
                                <img src="{{asset('assets/ovation-store-template/assets/img/hero/hero_1_2.png')}}"
                                     alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
    About Area
    ==============================-->
    <div class="space">
        <div class="container">
            <div class="row flex-row-reverse align-items-center justify-content-between">
                <div class="col-lg-7 ">
                    <div class="about-thumb mb-5 mb-lg-0 text-lg-end fade_left">
                        <img class="about-img-1"
                             src="{{asset('assets/ovation-store-template/assets/img/normal/about_1-1.png')}}" alt="img">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-content-wrap title-anim">
                        <div class="title-area mb-0">
                            <span class="sub-title">DỊCH VỤ CỦA CHÚNG TÔI</span>
                            <h2 class="sec-title">WEBSITE <br> CƯỚI CHUYÊN NGHIỆP</h2>
                            <p class="sec-text">Chúng tôi cung cấp dịch vụ cho thuê website cưới với giao diện đẹp mắt,
                                dễ sử dụng và nhiều tính năng hấp dẫn. Khách hàng có thể tùy chỉnh theo ý muốn,
                                chia sẻ thông tin đám cưới và nhận lời chúc từ bạn bè, người thân.
                            </p>
                        </div>
                        <div class="btn-wrap mt-40">
                            <a href="{{ $is_registered ? route('guest_admin.dashboard') : '#' }}" class="btn @if(!$is_registered) js-scroll-register @endif">ĐĂNG KÝ NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Service Area 01
    ==============================-->
    <div class="service-area-1 overflow-hidden">
        <div class="service-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0" data-left="-5%">
            <img src="{{asset('assets/ovation-store-template/assets/img/normal/service_1-1.png')}}" alt="img">
        </div>
        <div class="container">
            <div class="title-area text-center title-anim">
                <span class="sub-title style2">TÍNH NĂNG NỔI BẬT</span>
                <h2 class="sec-title">DỊCH VỤ WEBSITE CƯỚI</h2>
            </div>
            <div class="row gx-90 gy-40 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card title-anim">
                        <div class="service-card_icon">
                            <img src="{{asset('assets/ovation-store-template/assets/img/icon/service-icon_1-1.svg')}}"
                                 alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5">Thiết Kế Tùy Chỉnh</h4>
                            <span class="service-card_time">Giao Diện Đẹp Mắt</span>
                            <p class="service-card_text">Nhiều mẫu giao diện đẹp mắt, hiện đại. Dễ dàng tùy chỉnh màu sắc, hình ảnh và nội dung theo ý muốn.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card title-anim">
                        <div class="service-card_icon">
                            <img src="{{asset('assets/ovation-store-template/assets/img/icon/service-icon_1-2.svg')}}"
                                 alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5">Chia Sẻ Thông Tin</h4>
                            <span class="service-card_time">Dễ Dàng Truy Cập</span>
                            <p class="service-card_text">Chia sẻ thông tin đám cưới, lịch trình, địa điểm, album ảnh và video. Khách mời dễ dàng truy cập mọi lúc, mọi nơi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card title-anim">
                        <div class="service-card_icon">
                            <img src="{{asset('assets/ovation-store-template/assets/img/icon/service-icon_1-3.svg')}}"
                                 alt="img">
                        </div>
                        <div class="service-card_content">
                            <h4 class="service-card_title h5">Tương Tác Khách Mời</h4>
                            <span class="service-card_time">Xác Nhận Tham Dự</span>
                            <p class="service-card_text">Khách mời có thể xác nhận tham dự, gửi lời chúc, và tương tác trực tiếp. Dễ dàng quản lý danh sách khách mời.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--==============================
    Video Area
    ==============================-->
    <div class="video-area-1 space-top overflow-hidden">
        <div class="container">
            <div class="title-area text-center title-anim">
                <span class="sub-title style2">XEM DEMO WEBSITE</span>
                <h2 class="sec-title">TRẢI NGHIỆM DỊCH VỤ</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-wrap">
                        <div class="service-shape1_1 shape-mockup jump d-lg-block d-none z-index-3" data-top="-10%"
                             data-right="-10%">
                            <img src="{{asset('assets/ovation-store-template/assets/img/normal/video-shape_1-1.png')}}"
                                 alt="img">
                        </div>
                        <div class="img-anim">
                            <img src="{{asset('assets/ovation-store-template/assets/img/normal/video_1-1.png')}}"
                                 alt="img">
                        </div>
                        <a href="https://www.youtube.com/watch?v=yfFYBo0jtF0"
                           class="play-btn popup-video background-image">
                            <i class="fas fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Counter Area
    ==============================-->
    <div class="counter-area-1" data-bg-src="{{asset('assets/ovation-store-template/assets/img/bg/counter-1-bg.png')}}">
        <div class="counter-wrap1 space counter-item">
            <div class="container">
                <div class="row gy-40 justify-content-lg-between justify-content-center">
                    <div class="col-sm-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="media-body">
                                <h3 class="counter-card_number">
                                    <span class="odometer" data-odometer-final="256">.</span>
                                </h3>
                                <p class="counter-card_text">Website đã triển khai</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="media-body">
                                <h3 class="counter-card_number">
                                    <span class="odometer" data-odometer-final="28">.</span>
                                </h3>
                                <p class="counter-card_text">Năm kinh nghiệm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="media-body">
                                <h3 class="counter-card_number">
                                    <span class="odometer" data-odometer-final="1369">.</span>
                                </h3>
                                <p class="counter-card_text">Khách hàng hài lòng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="media-body">
                                <h3 class="counter-card_number">
                                    <span class="odometer" data-odometer-final="256">.</span>
                                </h3>
                                <p class="counter-card_text">Mẫu giao diện</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="marquee-wrap">
                <div class="marquee__group">
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                    <div class="m-item">
                        Tạo website cưới đẹp mắt chỉ trong vài phút
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
        Portfolio Area
    ==============================-->
    <div class="portfolio-area-1 space overflow-hidden"
         data-bg-src="{{asset('assets/ovation-store-template/assets/img/bg/portfolio-1-bg.png')}}">
        <div class="portfolio-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0%" data-right="-10%">
            <img src="{{asset('assets/ovation-store-template/assets/img/normal/portfolio-shape_1-1.png')}}" alt="img">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="title-area title-anim">
                        <span class="sub-title style2">MẪU WEBSITE CƯỚI ĐẸP</span>
                        <h2 class="sec-title">BỘ SƯU TẬP WEBSITE CƯỚI
                            SANG TRỌNG</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-30 masonary-active">
                <div class="col-lg-7 filter-item">
                    <div class="portfolio-thumb fade_left">
                        <a class="popup-image icon-btn"
                           href="{{asset('assets/ovation-store-template/assets/img/portfolio/portfolio1_1.png')}}"><i
                                class="far fa-eye"></i></a>
                        <div class="img-anim">
                            <img src="{{asset('assets/ovation-store-template/assets/img/portfolio/portfolio1_1.png')}}"
                                 alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <p>Mẫu Trang Chủ</p>
                            <h3><a href="project-details.html">Website Cưới Hiện Đại</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 filter-item">
                    <div class="portfolio-thumb fade_left">
                        <a class="popup-image icon-btn"
                           href="{{asset('assets/ovation-store-template/assets/img/portfolio/portfolio1_2.png')}}"><i
                                class="far fa-eye"></i></a>
                        <div class="img-anim">
                            <img src="{{asset('assets/ovation-store-template/assets/img/portfolio/portfolio1_2.png')}}"
                                 alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <p>Mẫu Album Ảnh</p>
                            <h3><a href="project-details.html">Bộ Sưu Tập Ảnh Cưới</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 filter-item">
                    <div class="portfolio-thumb fade_left">
                        <a class="popup-image icon-btn"
                           href="{{asset('assets/ovation-store-template/assets/img/portfolio/portfolio1_3.png')}}"><i
                                class="far fa-eye"></i></a>
                        <div class="img-anim">
                            <img src="{{asset('assets/ovation-store-template/assets/img/portfolio/portfolio1_3.png')}}"
                                 alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <p>Mẫu Lịch Trình</p>
                            <h3><a href="project-details.html">Thông Tin Sự Kiện Cưới</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Product Area
    ==============================-->
    <div class="product-area-1 space overflow-hidden">
        <div class="container">
            <div class="title-area text-center title-anim">
                <span class="sub-title style2">GÓI DỊCH VỤ WEBSITE CƯỚI</span>
                <h2 class="sec-title">Các Gói Dịch Vụ Của Chúng Tôi</h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="product-card title-anim">
                        <div class="product-img">
                            <img src="{{asset('assets/ovation-store-template/assets/img/product/1.png')}}"
                                 alt="Product Image">
                            <div class="actions">
                                <a href="#contact" class="btn">Đăng Ký Ngay</a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="price">1.500.000₫</span>
                            <h3 class="product-title"><a href="#contact">Gói Cơ Bản</a></h3>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card title-anim">
                        <div class="product-img">
                            <img src="{{asset('assets/ovation-store-template/assets/img/product/2.png')}}"
                                 alt="Product Image">
                            <div class="actions">
                                <a href="#" class="btn">Add TO Cart</a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="price">$250.00</span>
                            <h3 class="product-title"><a href="shop-details.html">Glossy Lip Plumper</a></h3>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card title-anim">
                        <div class="product-img">
                            <img src="{{asset('assets/ovation-store-template/assets/img/product/3.png')}}"
                                 alt="Product Image">
                            <div class="actions">
                                <a href="#" class="btn">Add TO Cart</a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="price">$250.00</span>
                            <h3 class="product-title"><a href="shop-details.html">Glossy Lip Plumper</a></h3>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card title-anim">
                        <div class="product-img">
                            <img src="{{asset('assets/ovation-store-template/assets/img/product/4.png')}}"
                                 alt="Product Image">
                            <div class="actions">
                                <a href="#" class="btn">Add TO Cart</a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="price">$250.00</span>
                            <h3 class="product-title"><a href="shop-details.html">Glossy Lip Plumper</a></h3>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
        Contact Area
    ==============================-->
    @if(!$is_registered)
        <div class="contact-area-1 space overflow-hidden"
             data-bg-src="{{asset('assets/ovation-store-template/assets/img/bg/contact-1-bg.png')}}">
            <div class="contact-shape1_1 shape-mockup jump d-lg-block d-none" data-top="0%" data-right="-8%">
                <img src="{{asset('assets/ovation-store-template/assets/img/normal/contact-shape_1-1.png')}}" alt="img">
            </div>
            <div class="contact-shape1_2 shape-mockup jump-reverse d-lg-block d-none" data-bottom="-3%"
                 data-left="-12%">
                <img src="{{asset('assets/ovation-store-template/assets/img/normal/contact-shape_1-2.png')}}" alt="img">
            </div>
            <div class="container-fluid p-0">
                <div class="contact-form-area space">
                    <div class="title-area text-center title-anim">
                    <span class="sub-title style2 text-white">LET US KNOW IF YOU COMING
                    </span>
                        <h2 class="sec-title text-white">WE CANT WAIT TO SEE YOU!</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('home.register') }}" method="POST" class="contact-form" id="registerForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="label font-bold">Full name of groom</label>
                                        <div class="form-group form-icon-left">
                                            <i class="far fa-user"></i>
                                            <input
                                                type="text"
                                                class="form-control style-border @error('groom_name') is-invalid @enderror"
                                                name="groom_name"
                                                id="groom_name"
                                                placeholder="Enter full name of groom"
                                                value="{{ old('groom_name') }}"
                                            >
                                            @error('groom_name')
                                            <div class="form-messages error">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="label font-bold">Full name of bride</label>
                                        <div class="form-group form-icon-left">
                                            <i class="far fa-user"></i>
                                            <input type="text"
                                                   class="form-control style-border @error('bride_name') is-invalid @enderror"
                                                   name="bride_name" id="name"
                                                   placeholder="Enter full name of bride"
                                                   value="{{ old('bride_name') }}"
                                            >

                                            @error('bride_name')
                                            <div class="form-messages error">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="label font-bold">Wedding day</label>
                                        <div class="form-group form-icon-left">
                                            <i class="far fa-calendar"></i>
                                            <input type="date"
                                                   class="form-control style-border @error('wedding_date') is-invalid @enderror"
                                                   name="wedding_date"
                                                   id="date"
                                                   value="{{ old('wedding_date') }}"
                                            >
                                            @error('wedding_date')
                                            <div class="form-messages error">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="label font-bold">Domain</label>
                                        <div class="d-flex align-items-center">
                                            <input type="text"
                                                   class="form-control style-border @error('sub_domain') is-invalid @enderror"
                                                   name="sub_domain"
                                                   value="{{ old('sub_domain') }}"
                                                   id="domain" placeholder="Enter your subdomain
                                               @error('groom_name') is-invalid @enderror">
                                            <input type="text"
                                                   class="form-control style-border w-50 @error('sub_domain') is-invalid @enderror"
                                                   value=".wedding.com"
                                                   readonly>

                                        </div>
                                        @error('groom_name')
                                        <div class="form-messages error">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                </div>

                                <div class="form-btn col-12 text-center">
                                    <button type="submit" class="btn">MAKE RESERVATION</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--==============================
    Testimonial Area
    ==============================-->
    <div class="testimonial-area-1 space-top overflow-hidden">
        <div class="container">
            <div class="title-area title-anim">
                <span class="sub-title style2">Feedbacks</span>
                <h2 class="sec-title">Our Testimonials</h2>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row global-carousel testi-slider1" data-slide-show="3" data-lg-slide-show="2"
                 data-md-slide-show="2">
                <div class="col-lg-4">
                    <div class="testi-box title-anim"
                         data-bg-src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_box-bg.png')}}">
                        <div class="testi-box_thumb">
                            <img src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_1_1.png')}}"
                                 alt="img">
                        </div>
                        <div class="testi-box_profile">
                            <h4 class="testi-box_name">Marks Daniel</h4>
                            <span class="testi-box_desig">Writer, Photographer, Manager</span>
                        </div>
                        <p class="testi-box_text">“Laculis primis leo pharetra ac varius diam class odio, turpis
                            nascetur gravida senectus sollicitudin lacus cursus tortor”</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-box title-anim"
                         data-bg-src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_box-bg.png')}}">
                        <div class="testi-box_thumb">
                            <img src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_1_2.png')}}"
                                 alt="img">
                        </div>
                        <div class="testi-box_profile">
                            <h4 class="testi-box_name">Louisa Abadie</h4>
                            <span class="testi-box_desig">Writer, Photographer, Manager</span>
                        </div>
                        <p class="testi-box_text">“Laculis primis leo pharetra ac varius diam class odio, turpis
                            nascetur gravida senectus sollicitudin lacus cursus tortor”</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-box title-anim"
                         data-bg-src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_box-bg.png')}}">
                        <div class="testi-box_thumb">
                            <img src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_1_3.png')}}"
                                 alt="img">
                        </div>
                        <div class="testi-box_profile">
                            <h4 class="testi-box_name">Andrew Daniel</h4>
                            <span class="testi-box_desig">Writer, Photographer, Manager</span>
                        </div>
                        <p class="testi-box_text">“Laculis primis leo pharetra ac varius diam class odio, turpis
                            nascetur gravida senectus sollicitudin lacus cursus tortor”</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-box title-anim"
                         data-bg-src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_box-bg.png')}}">
                        <div class="testi-box_thumb">
                            <img src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_1_1.png')}}"
                                 alt="img">
                        </div>
                        <div class="testi-box_profile">
                            <h4 class="testi-box_name">Marks Daniel</h4>
                            <span class="testi-box_desig">Writer, Photographer, Manager</span>
                        </div>
                        <p class="testi-box_text">“Laculis primis leo pharetra ac varius diam class odio, turpis
                            nascetur gravida senectus sollicitudin lacus cursus tortor”</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-box title-anim"
                         data-bg-src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_box-bg.png')}}">
                        <div class="testi-box_thumb">
                            <img src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_1_2.png')}}"
                                 alt="img">
                        </div>
                        <div class="testi-box_profile">
                            <h4 class="testi-box_name">Louisa Abadie</h4>
                            <span class="testi-box_desig">Writer, Photographer, Manager</span>
                        </div>
                        <p class="testi-box_text">“Laculis primis leo pharetra ac varius diam class odio, turpis
                            nascetur gravida senectus sollicitudin lacus cursus tortor”</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testi-box title-anim"
                         data-bg-src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_box-bg.png')}}">
                        <div class="testi-box_thumb">
                            <img src="{{asset('assets/ovation-store-template/assets/img/testimonial/testi_1_3.png')}}"
                                 alt="img">
                        </div>
                        <div class="testi-box_profile">
                            <h4 class="testi-box_name">Andrew Daniel</h4>
                            <span class="testi-box_desig">Writer, Photographer, Manager</span>
                        </div>
                        <p class="testi-box_text">“Laculis primis leo pharetra ac varius diam class odio, turpis
                            nascetur gravida senectus sollicitudin lacus cursus tortor”</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Blog Area
    ==============================-->
    <section class="blog-area space">
        <div class="container">
            <div class="title-area text-center title-anim">
                <span class="sub-title style2">Our Blog Posts
                </span>
                <h2 class="sec-title">Latest from our Journal</h2>
            </div>

            <div class="row flex-row-reverse">
                <div class="col-lg-4 mb-30 mb-lg-0">
                    <div class="blog-grid style2 style-big title-anim">
                        <div class="blog-img">
                            <img src="{{asset('assets/ovation-store-template/assets/img/blog/blog_1_3.png')}}"
                                 alt="blog image">
                        </div>
                        <div class="blog-content">
                            <div class="post-meta-item blog-meta">
                                <a href="blog.html">15 JAN, 2023</a>
                                <a href="blog.html">BY HARSH ARKA</a>
                            </div>
                            <h3 class="blog-title"><a href="blog-details.html">Enthusiast's Handbook: From Manicures
                                    to Nail Health</a></h3>
                            <a href="blog-details.html" class="link-btn style2">Continue Reading <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-grid style2 style-small title-anim">
                        <div>
                            <div class="blog-img">
                                <img src="{{asset('assets/ovation-store-template/assets/img/blog/blog_1_1.png')}}"
                                     alt="blog image">
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="post-meta-item blog-meta">
                                <a href="blog.html">15 JAN, 2023</a>
                                <a href="blog.html">BY HARSH ARKA</a>
                            </div>
                            <h3 class="blog-title"><a href="blog-details.html">Enthusiast's Handbook: From Manicures
                                    to Nail Health</a></h3>
                            <a href="blog-details.html" class="link-btn style2">Continue Reading <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="blog-grid style2 style-small title-anim">
                        <div>
                            <div class="blog-img">
                                <img src="{{asset('assets/ovation-store-template/assets/img/blog/blog_1_2.png')}}"
                                     alt="blog image">
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="post-meta-item blog-meta">
                                <a href="blog.html">15 JAN, 2023</a>
                                <a href="blog.html">BY HARSH ARKA</a>
                            </div>
                            <h3 class="blog-title"><a href="blog-details.html">Enthusiast's Handbook: From Manicures
                                    to Nail Health</a></h3>
                            <a href="blog-details.html" class="link-btn style2">Continue Reading <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            $(document).ready(function () {
                // Smooth scroll to the first error element
                const $firstError = $('.is-invalid').first();
                if ($firstError.length) {
                    console.log("First error element found:", $firstError);
                    $('html, body').animate({
                        scrollTop: $firstError.offset().top - 100
                    }, 2000);
                    $firstError.focus();
                }

                $('.js-scroll-register').click(function () {
                    $('html, body').animate({
                        scrollTop: $('#registerForm').offset().top - 100
                    }, 2000);
                    $('#groom_name').focus();
                })
            });
        </script>
    @endpush
@endsection
