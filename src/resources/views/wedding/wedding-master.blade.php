<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đám cưới &mdash; {{$wedding->groom_first_name}} & {{$wedding->bride_first_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mẫu HTML5 miễn phí bởi FREEHTML5.CO"/>
    <meta name="keywords" content="html5 miễn phí, mẫu miễn phí, bootstrap, html5, css3, ưu tiên di động, responsive"/>
    <meta name="author" content="FREEHTML5.CO"/>

    <!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/magnific-popup.css')}}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/owl.theme.default.min.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('assets/wedding-master-template/css/style.css')}}?v={{ time() }}">
    <link href="{{ asset("assets/css/css-template/animate.css")}}" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="{{asset('assets/wedding-master-template/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/wedding-master-template/js/respond.min.js')}}"></script>
    <![endif]-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Corinthia:wght@400;700&family=Fuzzy+Bubbles:wght@400;700&display=swap"
        rel="stylesheet">
    @livewireStyles
</head>
<body>

@if($wedding->show_animation)
    <link href="{{ asset("assets/css/css-template/animate.css")}}" rel="stylesheet">
    <div class="snowflakes" id="snowflakes"></div>
    <script src="{{ asset("assets/js/js-template/animate.js")}}"></script>
@endif


<div class="fh5co-loader"></div>
{{--<div class="snowflakes" id="snowflakes"></div>--}}

<div id="page">
    <div class="fh5co-nav">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="fh5co-logo">Đám cưới<strong>.</strong></div>
                </div>
            </div>
        </div>
    </div>

    <header id="fh5co-header" class="fh5co-cover" role="banner"
            style="background-image:url({{\Illuminate\Support\Facades\Storage::url($wedding->banner_image)}});background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1 class="corinthia-bold">{{$wedding->groom_first_name}}
                                &amp; {{$wedding->bride_first_name}}</h1>
                            <h2>Chúng tôi sắp về chung một nhà</h2>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <p><a href="#" class="btn btn-default btn-sm">Ghi nhớ ngày cưới</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-couple">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Xin chào!</h2>
                    <h1>{{ \Carbon\Carbon::parse($wedding->wedding_date)->locale('vi')->translatedFormat('d F, Y') }}</h1>
                    <p>Chúng tôi trân trọng mời bạn chung vui cùng lễ cưới của chúng tôi</p>
                </div>
            </div>
            <div class="couple-wrap animate-box">
                <div class="couple-half">
                    <div class="groom">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($wedding->groom_image)}}" alt="Chú rể"
                             class="img-responsive">
                    </div>
                    <div class="desc-groom">
                        <h3>{{$wedding->groom_name}}</h3>
                        <p>{{$wedding->about_groom}}</p>
                        @if($wedding->show_parents_names)
                            <p class="mb-0"><strong>Con ông:</strong> {{$wedding->groom_father ?? 'Đang cập nhật'}}</p>
                            <p><strong>Con bà:</strong> {{$wedding->groom_mother ?? 'Đang cập nhật'}}</p>
                        @endif
                    </div>
                </div>
                <p class="heart text-center"><i class="icon-heart2"></i></p>
                <div class="couple-half">
                    <div class="bride">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($wedding->bride_image)}}" alt="Cô dâu"
                             class="img-responsive">
                    </div>
                    <div class="desc-bride">
                        <h3>{{$wedding->bride_name}}</h3>
                        <p>{{$wedding->about_bride}}</p>
                        @if($wedding->show_parents_names)
                            <p class="mb-0"><strong>Con ông:</strong> {{$wedding->bride_father ?? 'Đang cập nhật'}}</p>
                            <p><strong>Con bà:</strong> {{$wedding->bride_mother ?? 'Đang cập nhật'}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-event" class="fh5co-bg"
         style="background-image:url({{asset('assets/wedding-master-template/images/img_bg_3.jpg')}}); padding: 0;background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box mt-5">
                    <span>Sự kiện đặc biệt của chúng tôi</span>
                    <h2>Lịch trình đám cưới</h2>
                </div>
            </div>
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <div class="col-md-10 col-ms-12 col-md-offset-1 animate-box d-flex flex-wrap">
                            @foreach($events as $key => $event)
                                <div class="col-md-6 col-sm-6 text-center event-gap-row" style="margin-bottom: 20px;">
                                    <div class="event-wrap animate-box">
                                        <h3 class="fs-1 fuzzy-bubbles-regular">{{$event->event_name}}</h3>
                                        <div class="row mt-5">
                                            <div class="event-col">
                                                <i class="icon-location"></i>
                                                <span class="d-block mt-2 fs-4">{{$event->event_location}}</span>
                                            </div>
                                            <div class="event-col">
                                                <i class="icon-calendar"></i>
                                                <span
                                                    class="d-block mt-2 fs-4">{{\Carbon\Carbon::parse($event->event_date)->locale('vi')->translatedFormat('d F, Y')}}</span>
                                            </div>
                                        </div>
                                        <p class="fs-5 fst-italic">{{$event->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-couple-story">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>Chúng tôi yêu nhau</span>
                    <h2>Chuyện tình của chúng tôi</h2>
                    <p>Ở nơi xa xôi, phía sau những dãy núi chữ, cách xa miền Vokalia và Consonantia, những con chữ vô
                        danh vẫn sống và kể câu chuyện của chúng tôi.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <ul class="timeline animate-box">
                        @foreach($love_stories as $key => $value)
                            <li class="@if(!($key % 2 ==0)) timeline-inverted @endif animate-box">
                                <div class="timeline-badge"
                                     style="background-image:url({{\Illuminate\Support\Facades\Storage::url($value->image)}});"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h3 class="timeline-title">{{$value->title}}</h3>
                                        <span
                                            class="date">{{\Carbon\Carbon::parse($value->timeline)->format('F j, Y') }}</span>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{$value->content}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-gallery" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <span>Kỷ niệm của chúng tôi</span>
                    <h2>Bộ sưu tập ảnh cưới</h2>
                    <p>Ở nơi xa xôi, phía sau những dãy núi chữ, cách xa miền Vokalia và Consonantia, những ký ức ngọt
                        ngào của chúng tôi vẫn luôn hiện hữu.</p>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">
                        @foreach($gallery as $key => $value)
                            {{-- Chỉ hiển thị album nếu có ít nhất một ảnh --}}
                            @if(!empty($value['photos']) && count($value['photos']) > 0)

                                {{-- Lấy ảnh đầu tiên làm ảnh bìa --}}
                                @php
                                    $coverImage = \Illuminate\Support\Facades\Storage::url($value['photos'][0]['image']);
                                @endphp

                                <li class="one-third animate-box" data-animate-effect="fadeIn"
                                    style="background-image: url({{ $coverImage }}); ">

                                    {{-- Liên kết hiển thị: đây là ảnh bìa album và là điểm kích hoạt gallery --}}
                                    <a href="{{ $coverImage }}" data-fancybox="gallery-{{$key}}"
                                       data-caption="{{$value['album_name']}}">
                                        <div class="case-studies-summary">
                                            <span>{{ count($value['photos']) }} ảnh</span>
                                            <h2>{{ $value['album_name'] }}</h2>
                                        </div>
                                    </a>

                                    {{-- Các liên kết ẩn: Dùng để Fancybox thu thập và tạo gallery --}}
                                    {{-- Vòng lặp bắt đầu từ ảnh thứ hai (chỉ số 1) vì ảnh đầu tiên đã được dùng ở trên --}}
                                    @foreach($value['photos'] as $index => $photo)
                                        @if($index > 0)
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($photo['image']) }}"
                                               data-fancybox="gallery-{{$key}}"
                                               data-caption="Bộ sưu tập: {{$value['album_name']}}"
                                               style="display: none;">
                                            </a>
                                        @endif
                                    @endforeach
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-counter" class="fh5co-bg fh5co-counter"
         style="background-image:url({{asset('assets/wedding-master-template/images/img_bg_5.jpg')}});background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="display-t">
                    <div class="display-tc">
                        <h1 class="big-date">The Big Date</h1>
                        <h2 class="corinthia-bold before-big-date">{{$wedding->groom_first_name}}
                            &amp; {{$wedding->bride_first_name}}</h2>
                        <h2 class="corinthia-bold before-big-date">{{ \Carbon\Carbon::parse($wedding->wedding_date)->locale('vi')->translatedFormat('d F, Y') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($wedding->show_names_and_wishes)
        <div id="fh5co-testimonial">
            <div class="container">
                <div class="row">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <span>Lời chúc thân thương</span>
                            <h2>Lời chúc từ bạn bè</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 animate-box">
                            <div class="wrap-testimony">
                                <div class="owl-carousel-fullwidth">
                                    @forelse($wishes as $wish)
                                        <div class="item">
                                            <div class="testimony-slide active text-center">
                                                <figure>
                                                    <img
                                                        src="{{asset('assets/wedding-master-template/images/couple-' . rand(1, 3) . '.jpg')}}"
                                                        alt="khách mời">
                                                </figure>
                                                <span>{{ $wish->guest_name }}</span>
                                                <blockquote>
                                                    <p>"{{ $wish->guest_message }}"</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="item">
                                            <div class="testimony-slide active text-center">
                                                <figure>
                                                    <img
                                                        src="{{asset('assets/wedding-master-template/images/couple-1.jpg')}}"
                                                        alt="khách mời">
                                                </figure>
                                                <span>Khách mời</span>
                                                <blockquote>
                                                    <p>"Hãy là người đầu tiên gửi lời chúc mừng đến chúng tôi!"</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($giftBoxes) >= 2 && $wedding->show_money_box)
        <div id="fh5co-services" class="fh5co-section-gray">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>Hộp quà mừng cưới</h2>
                        <p>Thay vì quà mừng, chúng tôi rất vui nếu nhận được sự hiện diện của bạn trong ngày trọng đại
                            của
                            chúng tôi. Tuy nhiên, nếu bạn muốn gửi lời chúc mừng, một món quà nhỏ sẽ được chúng tôi trân
                            trọng và sử dụng để bắt đầu cuộc sống mới cùng nhau.</p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    @forelse($giftBoxes as $key => $box)
                        @php
                            $recipientLabel = $key === 'bride' ? 'Cô dâu' : 'Chú rể';
                            $bank = $box->bank ?? null;
                            $bankName = optional($bank)->name ?? optional($bank)->code ?? 'Đang cập nhật';
                            $bankCode = optional($bank)->code;
                        @endphp
                        <div class="col-12 col-md-6 col-lg-5 d-flex animate-box">
                            <div class="services w-100 h-100 position-relative text-start rounded-4 p-4 shadow-lg"
                                 style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.97), rgba(247, 248, 255, 0.97)); border: 1px solid rgba(226,232,240,0.8);">
                                <h3 class="fw-bold mb-1" style="color: #1f2937;">{{ $box->name }}</h3>
                                <p class="fst-italic text-muted mb-4 fs-5">Những lời chúc yêu thương của bạn là món quà
                                    ý nghĩa nhất dành cho chúng tôi.</p>

                                <p class="text-uppercase text-secondary fw-semibold small mb-1">Ngân hàng</p>
                                <p class="fs-4 fw-semibold text-dark mb-3">
                                    @if($bankCode)
                                        {{ $bankCode }}
                                    @endif
                                    {{ $bankName }}
                                </p>
                                <p class="text-uppercase text-secondary fw-semibold small mb-1">Số tài khoản</p>
                                <p class="fs-4 fw-semibold text-dark mb-0">{{ $box->bank_number }}</p>
                                <div class="d-flex flex-column align-items-center gap-3 mt-4">
                                    <button type="button"
                                            class="btn btn-outline-primary btn-sm px-4 fs-5"
                                            data-bank-number="{{ $box->bank_number }}"
                                            onclick="copyBankInfo(this.dataset.bankNumber)">
                                        Sao chép số tài khoản
                                    </button>

                                    @if(!empty($box->image_qr))
                                        <div
                                            class="w-100 border border-2 border-dashed rounded-3 p-3 text-center bg-light"
                                            style="cursor: pointer; border-style: dashed;"
                                            onclick="showQR('{{ $box->image_qr }}')"
                                            role="button">
                                            <img src="{{ asset('storage/' . $box->image_qr) }}"
                                                 alt="Mã QR chuyển khoản cho {{ strtolower($recipientLabel) }}"
                                                 class="img-responsive center-block mx-auto"
                                                 style="max-width: 170px; height: auto;">
                                            <small class="d-block mt-2 text-muted">Nhấn để phóng to mã QR</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Thông tin hộp quà sẽ được cập nhật trong thời gian sớm nhất.</p>
                        </div>
                    @endforelse
                </div>

                <div id="copy-feedback"
                     class="alert alert-success shadow-lg position-fixed end-0 bottom-0 me-3 mb-3 d-none fade"
                     style="z-index: 1055; min-width: 260px;" role="alert">
                    Số tài khoản đã được sao chép. Cảm ơn bạn vì món quà ý nghĩa!
                </div>

            </div>
        </div>

        {{--Modal--}}
        <div id="groom-image-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <img src="" alt="QR Code" id="qr-code" width="300" height="500"
                                 class="object-contain">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-20 mr-1" onclick="closeMD()">Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div id="fh5co-started" class="fh5co-bg"
         style="background-image:url({{asset('assets/wedding-master-template/images/img_bg_4.jpg')}});background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Bạn sẽ tham dự chứ?</h2>
                    <p>Hãy gửi cho chúng tôi lời chúc tốt đẹp của bạn nhé. Xin cảm ơn!</p>
                </div>
            </div>
            <livewire:wish-form :wedding-id="$wedding->id"/>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3 d-none" style="z-index: 9999" data-wish-toast-container>
        <div id="wishSuccessToast" class="toast align-items-center text-bg-success border-0 shadow-lg" role="alert"
             aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="wishToastMessage">
                    Đã gửi thành công. Chúng tôi rất trân trọng những lời chúc này!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Đóng"></button>
            </div>
        </div>
    </div>

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2025 Free HTML5. Hoàng Công Tiến.</small>
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

@if($wedding->play_background_music)
    <div class="music" id="music-player-toggle" style="cursor: pointer;">
    <span>
        <i class="icon-sound" id="music-icon"></i> </span>
        <audio loop autoplay id="wedding-audio">
            <source src="{{asset('assets/audio/' . $audio->file_path)}}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
@endif

<!-- jQuery -->
<script src="{{asset('assets/wedding-master-template/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('assets/wedding-master-template/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/wedding-master-template/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('assets/wedding-master-template/js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{asset('assets/wedding-master-template/js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('assets/wedding-master-template/js/jquery.countTo.js')}}"></script>

<!-- Stellar -->
<script src="{{asset('assets/wedding-master-template/js/jquery.stellar.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('assets/wedding-master-template/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/wedding-master-template/js/magnific-popup-options.js')}}"></script>

<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
<script src="{{asset('assets/wedding-master-template/js/simplyCountdown.js')}}"></script>
<!-- Main -->
<script src="{{asset('assets/wedding-master-template/js/main.js')}}?v={{ time() }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>


<script>
    const d = new Date("{{ \Carbon\Carbon::parse($wedding->wedding_date)->toIso8601String() }}");
    console.log('d', d);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });

    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind("[data-fancybox]", {
            loop: true,
            buttons: ["zoom", "slideShow", "thumbs", "close"],
            thumbs: {
                autoStart: false,
            },
        });
    });

    let copyFeedbackTimeout;

    function showQR(path) {
        const modal = document.getElementById('groom-image-modal');
        const qrCodeImage = document.getElementById('qr-code');
        qrCodeImage.src = `/storage/${path}`;

        if (modal) {
            modal.classList.add('show');
            modal.style.display = 'block';
            modal.setAttribute('aria-hidden', 'false');
        }

    }

    function closeMD() {
        const modal = document.getElementById('groom-image-modal');
        if (modal) {
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
        }
    }

    function copyBankInfo(bankNumber) {
        if (!bankNumber) {
            return;
        }

        const onCopied = () => {
            triggerCopyFeedback();
        };

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(bankNumber.toString())
                .then(onCopied)
                .catch(() => {
                    if (fallbackCopyTextToClipboard(bankNumber)) {
                        onCopied();
                    }
                });
        } else if (fallbackCopyTextToClipboard(bankNumber)) {
            onCopied();
        }
    }

    function fallbackCopyTextToClipboard(text) {
        try {
            const tempInput = document.createElement('input');
            tempInput.value = text;
            tempInput.setAttribute('readonly', '');
            tempInput.style.position = 'absolute';
            tempInput.style.left = '-9999px';
            document.body.appendChild(tempInput);
            tempInput.select();
            const successful = document.execCommand('copy');
            document.body.removeChild(tempInput);
            return successful;
        } catch (error) {
            console.warn('Không thể sao chép số tài khoản', error);
            return false;
        }
    }

    function triggerCopyFeedback() {
        const feedback = document.getElementById('copy-feedback');
        if (!feedback) {
            return;
        }

        feedback.classList.remove('d-none');
        feedback.classList.add('fade', 'show');

        clearTimeout(copyFeedbackTimeout);
        copyFeedbackTimeout = setTimeout(() => {
            feedback.classList.remove('show');
            feedback.classList.add('d-none');
        }, 2200);
    }

    function showWishToast(message) {
        const container = document.querySelector('[data-wish-toast-container]');
        const toastEl = document.getElementById('wishSuccessToast');

        if (!container || !toastEl || typeof bootstrap === 'undefined' || !bootstrap.Toast) {
            return;
        }

        const toastBody = document.getElementById('wishToastMessage');
        if (toastBody && message) {
            toastBody.textContent = message;
        }

        container.classList.remove('d-none');

        const toast = bootstrap.Toast.getOrCreateInstance(toastEl, {delay: 5000});
        toast.show();
    }

    function scrollToWishField(field) {
        if (!field) {
            return;
        }

        const target = document.querySelector(`[data-wish-field="${field}"]`);
        if (target) {
            target.scrollIntoView({behavior: 'smooth', block: 'center'});
            if (typeof target.focus === 'function') {
                target.focus({preventScroll: true});
            }
        }
    }

    document.addEventListener('livewire:initialized', () => {
        Livewire.on('wish-submitted', (payload = {}) => {
            const message = payload.message || 'Đã gửi thành công. Chúng tôi rất trân trọng những lời chúc này!';
            showWishToast(message);
        });

        Livewire.on('wish-validation-error', (payload = {}) => {
            scrollToWishField(payload.field);
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const serverWishSuccess = <?php echo json_encode(session('success')); ?>;
        if (serverWishSuccess) {
            showWishToast(serverWishSuccess);
        }
    });

    @if($wedding->play_background_music)
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('music-player-toggle');
        const audio = document.getElementById('wedding-audio');
        const icon = document.getElementById('music-icon');
        let isMuted = false;

        toggle.addEventListener('click', function () {
            isMuted = !isMuted;
            audio.muted = isMuted;
            icon.className = isMuted ? 'icon-sound-mute' : 'icon-sound';
        });
    });
    @endif
</script>

@include('common.notification', ['notification' => $notification])

@livewireScripts
</body>
</html>

