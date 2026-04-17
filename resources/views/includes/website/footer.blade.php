<!-- ================= Time Section start =================  -->
@php
    use App\Enums\WebsiteFilesBelongsTo;
    use App\Enums\WebsiteFilesFor;
    use App\Enums\WebsiteFilesType;
    $Footerheadings = (new Helper())->FooterHeadings();

    $FooterLinks = (new Helper())->FooterLinks();
@endphp
@if (!request()->is('contact'))
    <section class="text-white time-section">
        <div class="container">
            <div class="time-main">
                <div class="row">
                    <div class="col-md-5">
                        <div class="d-flex align-items-center">
                            <div class="time-logo me-3">
                                <img src="/backend_assets/time-icon.svg" alt="" class="img-fluid">
                            </div>
                            <div class="time-details">
                                <div class="time-head">
                                    Working Hours
                                </div>

                                {{--
                                @foreach (['workhours2', 'workhours3'] as $key)
                                    @php
                                        $val = trim($contactUsData[$key] ?? '');
                                    @endphp

                                    @if ($val)
                                        @php
                                            [$day, $time] = array_pad(explode('|', $val, 2), 2, '');
                                        @endphp

                                        <div
                                            class="d-flex flex-column flex-sm-row flex-md-column flex-xl-row align-items-xl-center">
                                            <div class="working-day" style="font-size: 1rem;">{{ $day }}</div>
                                            <div class="working-time ms-0 ms-sm-2 ms-md-0 ms-xl-2"
                                                style="font-size: 1rem;">{{ $time }}</div>
                                        </div>
                                    @endif
                                @endforeach  --}}



                                @foreach (['workhours2', 'workhours3'] as $key)
                                    @php
                                        $val = trim($contactUsData[$key] ?? '');
                                    @endphp

                                    @if ($val)
                                        @php
                                            [$day, $times] = array_pad(explode('|', $val, 2), 2, '');
                                            $timeSlots = array_filter(array_map('trim', explode(',', $times)));
                                        @endphp

                                        <div class="working-day" style="font-size: 1rem;">
                                            {{ $day }}
                                        </div>

                                        <ul style="margin:5px 0 15px 18px; padding:0; font-size:1rem;">
                                            @foreach ($timeSlots as $slot)
                                                <li>{{ $slot }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 time-contact-sec d-flex justify-content-center align-items-center">
                        <div class="w-100">
                            <div class="information">
                                Visits to the Consular Section will be by online appointment only.
                            </div>

                            <div class="row">
                                <div class="col-12 col-xl-4">
                                    <div class="mb-2 time-contact-phn mb-xl-0">
                                        <i class="bi bi-telephone-fill me-2"></i>
                                        <a href="tel:{{ $contactUsData['ph1'] ?? null }}">
                                            {{ $contactUsData['ph1'] ?? null }}</a>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-8">
                                    {{--  <div class="time-contact-mail">
                                        <i class="bi bi-envelope-fill me-2"></i><a
                                            href="mailto:{{ $contactUsData['email'] ?? null }}">{{ $contactUsData['email'] ?? null }}</a>
                                    </div>
                                    <div class="time-contact-mail">For Visa
                                        Enquiries:
                                        <i class="bi bi-envelope-fill me-2"></i><a
                                            href="mailto:{{ $contactUsData['email1'] ?? null }}">{{ $contactUsData['email1'] ?? null }}</a>
                                    </div>
                                    <div class="time-contact-mail">For Passport
                                        Enquiries:
                                        <i class="bi bi-envelope-fill me-2"></i><a
                                            href="mailto:{{ $contactUsData['email2'] ?? null }}">{{ $contactUsData['email2'] ?? null }}</a>
                                    </div>
                                    <div class="time-contact-mail">For Other Consular
                                        Enquiries:
                                        <i class="bi bi-envelope-fill me-2"></i><a
                                            href="mailto:{{ $contactUsData['email3'] ?? null }}">{{ $contactUsData['email3'] ?? null }}</a>
                                    </div>  --}}

                                    @if (!empty($contactUsData['email1']) || !empty($contactUsData['email2']) || !empty($contactUsData['email3']))

                                        @if (!empty($contactUsData['email1']))
                                            <div class="time-contact-mail">
                                                For Visa Enquiries:
                                                <i class="bi bi-envelope-fill me-2"></i>
                                                <a href="mailto:{{ $contactUsData['email1'] }}">
                                                    {{ $contactUsData['email1'] }}
                                                </a>
                                            </div>
                                        @endif

                                        @if (!empty($contactUsData['email2']))
                                            <div class="time-contact-mail">
                                                For Passport Enquiries:
                                                <i class="bi bi-envelope-fill me-2"></i>
                                                <a href="mailto:{{ $contactUsData['email2'] }}">
                                                    {{ $contactUsData['email2'] }}
                                                </a>
                                            </div>
                                        @endif

                                        @if (!empty($contactUsData['email3']))
                                            <div class="time-contact-mail">
                                                For Other Consular Enquiries:
                                                <i class="bi bi-envelope-fill me-2"></i>
                                                <a href="mailto:{{ $contactUsData['email3'] }}">
                                                    {{ $contactUsData['email3'] }}
                                                </a>
                                            </div>
                                        @endif
                                    @elseif(!empty($contactUsData['email']))
                                        <div class="time-contact-mail">
                                            <i class="bi bi-envelope-fill me-2"></i>
                                            <a href="mailto:{{ $contactUsData['email'] }}">
                                                {{ $contactUsData['email'] }}
                                            </a>
                                        </div>

                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- ================= Vector Section start ================= -->
<section class="vector-section">
    <div class="container">
        @php
            $vectorImg = $contactUs
                ?->websitefiles()
                ->where('filesfor', WebsiteFilesFor::MAIN->value)
                ->where('filetype', WebsiteFilesType::IMAGE->value)
                ->where('belongsto', WebsiteFilesBelongsTo::FooterVectorImage->value)
                ->first();
        @endphp

        <div class="d-flex justify-content-center">
            <img src="{{ $vectorImg ? asset($vectorImg->filesrc) : '' }}" alt="" class="img-fluid">
        </div>
    </div>
</section>

<!-- ================= Footer Section start ================= -->
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between">

                @foreach ($Footerheadings as $header)
                    <div class="mb-3 col-sm-6 col-xl-3 mb-xl-0">
                        <div class="footer-head">{{ $header->title }}</div>
                        <ul>
                            @foreach ($header->links as $link)
                                <li class="display-flex text-nowrap"><a href="{{ $link->link }}"
                                        target="_blank">{{ $link->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

                <div class="footer-address-area col-sm-6 col-xl-4">
                    <div class="footer-head">Get in Touch With Us</div>
                    <ul>
                        <li>

                            {{--  @php
                                $footerImg = $contactUs
                                    ->websitefiles()
                                    ->where('filesfor', WebsiteFilesFor::MAIN->value)
                                    ->where('filetype', WebsiteFilesType::IMAGE->value)
                                    ->where('belongsto', WebsiteFilesBelongsTo::FooterLogo->value)
                                    ->first();
                            @endphp  --}}
                            @php
                                $footerImg = $contactUs
                                    ?->websitefiles()
                                    ->where('filesfor', WebsiteFilesFor::MAIN->value)
                                    ->where('filetype', WebsiteFilesType::IMAGE->value)
                                    ->where('belongsto', WebsiteFilesBelongsTo::FooterLogo->value)
                                    ->first();
                            @endphp

                            {{-- <img class="navbar-brand-logo mb-3 ps-0" src="/backend_assets/GH-Vienna-Logo-2.png"
                                alt="Logo">  --}}
                            <img class="navbar-brand-logo mb-3 ps-0"
                                src="{{ $footerImg ? asset($footerImg->filesrc) : '' }}" alt="Logo">

                        </li>

                        <li class="mb-3 ps--">{!! $contactUsData['address'] ?? null !!}</li>

                        <li>
                            <strong>Email:</strong>
                            <a href="mailto:{{ $contactUsData['email'] ?? null }}"
                                target="_blank"><span>{{ $contactUsData['email'] ?? null }}</span></a>
                        </li>
                        <li>
                            <strong>Tel:</strong> <a href="tel:{{ $contactUsData['ph1'] ?? null }}"
                                target="_blank"><span>{{ $contactUsData['ph1'] ?? null }}</span></a>
                        </li>
                        @if (!empty($contactUsData['fax']))
                            <li>
                                <strong>Fax:</strong> <a href="tel:{{ $contactUsData['fax'] ?? null }}"
                                    target="_blank"><span>{{ $contactUsData['fax'] ?? null }}</span></a>
                            </li>
                        @endif
                        @if (!empty($contactUsData['complaints_tel']))
                            <li>
                                <strong>Customer Complaints Tel:</strong> <a
                                    href="tel:{{ $contactUsData['complaints_tel'] ?? null }}"
                                    target="_blank"><span>{{ $contactUsData['complaints_tel'] ?? null }}</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
                <div class="mb-3 text-center copy-right mb-lg-0">© {{ date('Y') }}.
                    {{ $contactUsData['embassy_location'] ?? null }}. All rights reserved. Powered by <a
                        target="_blank" class="text-white" href="https://www.theemhglobal.com">EMH</a>.
                </div>
                <div class="footer-social d-flex align-items-center">
                    <div class="social-text me-3 ">Get Social</div>
                    <div class="social-icons">
                        <ul class="d-flex align-items-center">
                            @if (!empty($contactUsData['fb']))
                                <li>
                                    <a href="{{ $contactUsData['fb'] }}" target="_blank"><i
                                            class="bi bi-facebook"></i></a>
                                </li>
                            @endif

                            @if (!empty($contactUsData['insta']))
                                <li>
                                    <a href="{{ $contactUsData['insta'] }}" target="_blank"><i
                                            class="bi bi-instagram"></i></a>
                                </li>
                            @endif

                            @if (!empty($contactUsData['twitter']))
                                <li>
                                    <a href="{{ $contactUsData['twitter'] }}" target="_blank"><i
                                            class="bi bi-twitter-x"></i></a>
                                </li>
                            @endif

                            @if (!empty($contactUsData['youtube']))
                                <li>
                                    <a href="{{ $contactUsData['youtube'] }}" target="_blank"><i
                                            class="bi bi-youtube"></i></a>
                                </li>
                            @endif
                        </ul>

                        {{--  <ul class="d-flex align-items-center">
                            <li><a href="{{ $contactUsData['fb'] ?? null }}" target="_blank"><i
                                        class="bi bi-facebook"></i></a></li>
                            <li><a href="{{ $contactUsData['insta'] ?? null }}" target="_blank"><i
                                        class="bi bi-instagram"></i></a></li>
                            <li><a href="{{ $contactUsData['twitter'] ?? null }}" target="_blank"><i
                                        class="bi bi-twitter-x"></i></a></li>
                            <li><a href="{{ $contactUsData['youtube'] ?? null }}" target="_blank"><i
                                        class="bi bi-youtube"></i></a></li>
                        </ul>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="/js/jquery.js" type="text/javascript"></script>
<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/navigation.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- fancybox js start -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
</script>

<script>
    $(document).ready(function() {
        // add all to same gallery
        $(".ghana-overview-lightbox a").attr("data-fancybox", "mygallery");
        // assign captions and title from alt-attributes of images:
        $(".ghana-overview-lightbox a").each(function() {
            $(this).attr("data-caption", $(this).find("img").attr("alt"));
            $(this).attr("title", $(this).find("img").attr("alt"));
        });
        // start fancybox:
        $(".ghana-overview-lightbox a").fancybox();
    });
</script>

<script>
    $(document).ready(function() {
        $(".ghana-overview-lightbox a").fancybox();
    });
</script>
<!-- fancybox js end -->

<script>
    $(document).ready(function() {
        $("#navigation").navigation();
    });
</script>

<script>
    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function(event) {
        const carousel = document.getElementById('carouselExampleIndicators');
        const carouselInstance = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
        carouselInstance.to(0); // Go to the first slide
    });
</script>

<script>
    new Swiper("#home-news-slider", {
        loop: true,
        navigation: {
            nextEl: ".swiper-wrap .swiper-button-next",
            prevEl: ".swiper-wrap .swiper-button-prev"
        },
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        breakpoints: {
            1920: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1028: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            }
        }
    });
</script>

<script>
    new Swiper("#innerpage-slide", {
        loop: true,
        navigation: {
            nextEl: ".swiper-wrap .swiper-button-next",
            prevEl: ".swiper-wrap .swiper-button-prev"
        },
        spaceBetween: 20,
        autoplay: false,
        breakpoints: {
            1920: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            1028: {
                slidesPerView: 4,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            }
        }
    });
</script>

@stack('scripts')

</body>

</html>
