@php
    use App\Enums\WebsiteFilesBelongsTo;
    use App\Enums\WebsiteFilesFor;
    use App\Enums\WebsiteFilesType;
@endphp



@php
    /* ================= PASSPORT FILES ================= */
    $passportFiles = collect();

    if (!empty($passportimgs) && $passportimgs->count()) {
        foreach ($passportimgs as $item) {
            if (is_object($item) && isset($item->websitefiles)) {
                $passportFiles = $passportFiles->merge(
                    optional($item->websitefiles)->where('belongsTo', WebsiteFilesBelongsTo::PassportVisa->value),
                );
            }
        }
    }

    $passportFiles = $passportFiles->values();

    /* ================= VISA FILES ================= */
    $visaFiles = collect();

    if (!empty($visanoticeimgs) && $visanoticeimgs->count()) {
        foreach ($visanoticeimgs as $item) {
            if (is_object($item) && isset($item->websitefiles)) {
                $visaFiles = $visaFiles->merge(
                    optional($item->websitefiles)->where('belongsTo', WebsiteFilesBelongsTo::VisaNotice->value),
                );
            }
        }
    }

    $visaFiles = $visaFiles->values();

    $passportNotice = $passportimgs->first();
@endphp

<style>
    .app-procedure .bi-youtube::before {
        content: "\f62b";
        color: red;
    }
</style>

<section class="mt-2 bnr-bottom-sec bnr-bottom-sec-innr">
    <div class="container px-md-0">
        <div
            class="d-flex flex-column flex-md-row align-items-center align-items-md-center justify-content-center justify-content-md-end gap-3">
            <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                <div class="apply-now-btn">
                    <div class="apply-text d-flex flex-column flex-md-row align-items-center gap-3 px-2">
                        <!-- Passport Button -->
                        {{-- PASSPORT BUTTON --}}
                        @if ($passportFiles->count())
                            <button class="btn cmn-btn cmn-btn2" data-bs-toggle="modal" data-bs-target="#passportModal">
                                <span class="btn-text">Passport Application</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        @else
                            <a href="https://passport.mfa.gov.gh" target="_blank" class="btn cmn-btn cmn-btn2">
                                Passport Application
                            </a>
                        @endif

                        {{-- VISA BUTTON --}}
                        @if ($visaFiles->count())
                            <button class="btn cmn-btn" data-bs-toggle="modal" data-bs-target="#VisaModal">
                                <span class="btn-text">Visa Application</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        @else
                            <a href="/terms-and-conditions" class="btn cmn-btn">
                                Visa Application
                            </a>
                        @endif


                    </div>
                </div>

                @if (isset($applicationprocedurevideo) && !empty($applicationprocedurevideo))
                    <div class="yt-sec ps-0">
                        <div
                            class="d-flex flex-column flex-md-column align-items-start align-items-md-start align-items-center justify-content-center gap-1">
                            <div>Application Procedure Video</div>
                            <div class="app-procedure d-flex flex-md-row gap-3 yt-links">
                                @forelse ($applicationprocedurevideo as $applicationprocedurevideos)
                                    <a href="{{ $applicationprocedurevideos->link }}" target="_blank"
                                        class="d-flex align-items-center gap-1">
                                        <i class="bi bi-youtube"></i>
                                        <span
                                            style="font-weight: var(--font-medium);">{{ $applicationprocedurevideos->title }}</span>
                                    </a>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{--  {{ dd($passportimgs) }}  --}}

{{-- ================= PASSPORT MODAL ================= --}}
<div class="modal fade" id="passportModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header align-items-center justify-content-between">

                <h5 class="mb-0 modal-title" id="passportModalTitle">
                    {{ $passportimgs->first()->title }}
                </h5>
                {{--  <div class="gap-2 d-flex align-items-center">
                    @if ($passportFiles->count() > 1)
                        <!-- Carousel Navigation Buttons -->
                        <button class="shadow btn btn-outline-dark" type="button" data-bs-target="#passportCarousel"
                            data-bs-slide="prev" title="Previous">
                            <span>
                                <i class="bi bi-chevron-left" style="font-size: 15px;"></i>
                            </span>
                        </button>
                        <button class="shadow btn btn-outline-dark" type="button" data-bs-target="#passportCarousel"
                            data-bs-slide="next" title="Next">
                            <span>
                                <i class="bi bi-chevron-right" style="font-size: 15px;"></i>
                            </span>
                        </button>
                    @endif


                    <!-- Close Button -->
                    <button type="button" class="btn-close ms-4" style="transform: scale(1.3);" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>  --}}

                <div class="gap-2 d-flex align-items-center">
                    @if ($passportimgs->count() > 1)
                        <button class="shadow btn btn-outline-dark" type="button" data-bs-target="#noticeCarousel"
                            data-bs-slide="prev" title="Previous">
                            <i class="bi bi-chevron-left" style="font-size: 15px;"></i>
                        </button>

                        <button class="shadow btn btn-outline-dark" type="button" data-bs-target="#noticeCarousel"
                            data-bs-slide="next" title="Next">
                            <i class="bi bi-chevron-right" style="font-size: 15px;"></i>
                        </button>
                    @endif

                    <button type="button" class="btn-close ms-4" style="transform: scale(1.3);" data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
            </div>

            {{--  <div class="modal-body">


                @if (!empty($passportNotice?->desc))
                    <div class="notice-content mb-3">
                        {!! $passportNotice->desc !!}
                    </div>
                @endif

                @if ($passportFiles->count())
                    <div id="passportCarousel" class="carousel slide" data-bs-ride="carousel">


                        <div class="carousel-indicators">
                            @foreach ($passportFiles as $key => $file)
                                <button data-bs-target="#passportCarousel" data-bs-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}">
                                </button>
                            @endforeach
                        </div>


                        <div class="carousel-inner">
                            @foreach ($passportFiles as $key => $file)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ url(str_replace(' ', '%20', $file->filesrc)) }}" class="d-block w-100"
                                        style="max-height:500px; object-fit:contain;">
                                </div>
                            @endforeach
                        </div>


                        <button class="carousel-control-prev" data-bs-target="#passportCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" data-bs-target="#passportCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>
                @endif
            </div>  --}}



            <div class="p-0 modal-body position-relative">
                <div id="noticeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($passportimgs as $passport)
                            {{--  <div class="carousel-item px-4 py-4 {{ $loop->first ? 'active' : '' }}">  --}}

                            <div class="carousel-item px-4 py-4 {{ $loop->first ? 'active' : '' }}"
                                data-title="{{ $passport->title }}">

                                {{--  @if (!empty($passport->title))
                                    <h4 class="mb-3">{{ $passport->title }}</h4>
                                @endif  --}}

                                @php
                                    $files = optional($passport->websitefiles)->where(
                                        'belongsTo',
                                        WebsiteFilesBelongsTo::PassportVisa->value,
                                    );
                                @endphp

                                @if ($files->count())
                                    <div class="row g-3 mb-3">
                                        @foreach ($files as $file)
                                            <div class="col-12">
                                                <img src="{{ url(str_replace(' ', '%20', $file->filesrc)) }}"
                                                    class="img-fluid w-100 rounded"
                                                    style="max-height:500px; object-fit:contain;">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if (!empty($passport->desc))
                                    <div class="notice-content">
                                        {!! $passport->desc !!}
                                    </div>
                                @endif

                            </div>
                        @endforeach

                    </div>


                </div>
            </div>




            <div class="modal-footer">
                <a href="https://passport.mfa.gov.gh" target="_blank" class="btn cmn-btn">
                    Continue →
                </a>
            </div>

        </div>
    </div>
</div>

{{-- ================= VISA MODAL ================= --}}
<div class="modal fade" id="VisaModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header align-items-center justify-content-between">
                <h5 class="mb-0 modal-title" id="visaNoticeModalLabel">Notice</h5>

                <div class="gap-2 d-flex align-items-center">
                    @if ($visaFiles->count() > 1)
                        <!-- Carousel Navigation Buttons -->
                        <button class="shadow btn btn-outline-dark" type="button" data-bs-target="#visaCarousel"
                            data-bs-slide="prev" title="Previous">
                            <span>
                                <i class="bi bi-chevron-left" style="font-size: 15px;"></i>
                            </span>
                        </button>
                        <button class="shadow btn btn-outline-dark" type="button" data-bs-target="#visaCarousel"
                            data-bs-slide="next" title="Next">
                            <span>
                                <i class="bi bi-chevron-right" style="font-size: 15px;"></i>
                            </span>
                        </button>
                    @endif

                    <!-- Close Button -->
                    <button type="button" class="btn-close ms-4" style="transform: scale(1.3);"
                        data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
            </div>

            <div class="modal-body">
                @if ($visaFiles->count())
                    <div id="visaCarousel" class="carousel slide" data-bs-ride="carousel">

                        {{-- Indicators --}}
                        <div class="carousel-indicators">
                            @foreach ($visaFiles as $key => $file)
                                <button data-bs-target="#visaCarousel" data-bs-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}">
                                </button>
                            @endforeach
                        </div>

                        {{-- Images --}}
                        <div class="carousel-inner">
                            @foreach ($visaFiles as $key => $file)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ url(str_replace(' ', '%20', $file->filesrc)) }}"
                                        class="d-block w-100" style="max-height:500px; object-fit:contain;">
                                </div>
                            @endforeach
                        </div>

                        {{-- Controls --}}
                        <button class="carousel-control-prev" data-bs-target="#visaCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" data-bs-target="#visaCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>
                @endif
            </div>

            <div class="modal-footer">
                <a href="/terms-and-conditions" class="btn cmn-btn">
                    Continue →
                </a>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('noticeCarousel');
        const modalTitle = document.getElementById('passportModalTitle');

        if (carousel) {
            carousel.addEventListener('slid.bs.carousel', function(event) {
                const activeSlide = event.relatedTarget;
                const newTitle = activeSlide.getAttribute('data-title');

                if (newTitle) {
                    modalTitle.textContent = newTitle;
                }
            });
        }
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var openBtn = document.getElementById('openPopupBtn');
        var modalEl = document.getElementById('passportModal');
        var myModal = new bootstrap.Modal(modalEl);

        openBtn.addEventListener('click', function() {
            myModal.show();
        });

        // Optional: cleanup after modal hide to fix backdrop issues if any
        modalEl.addEventListener('hidden.bs.modal', function() {
            // Remove modal-backdrop manually if still present
            var backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            }
            // Also ensure body class 'modal-open' is removed
            document.body.classList.remove('modal-open');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var openBtn = document.getElementById('OpenVisaPopupBtn');
        var modalEl = document.getElementById('VisaModal');
        var myModal = new bootstrap.Modal(modalEl);

        openBtn.addEventListener('click', function() {
            myModal.show();
        });

        // Optional: cleanup after modal hide to fix backdrop issues if any
        modalEl.addEventListener('hidden.bs.modal', function() {
            // Remove modal-backdrop manually if still present
            var backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            }
            // Also ensure body class 'modal-open' is removed
            document.body.classList.remove('modal-open');
        });
    });
</script>

{{--  banners section  --}}

@if (!empty($banners))
    @php
        $bannersimage = $banners
            ->websitefiles()
            ->where('filesfor', WebsiteFilesFor::MAIN->value)
            ->where('filetype', WebsiteFilesType::IMAGE->value)
            ->where('belongsTo', WebsiteFilesBelongsTo::Banners->value)
            ->first();
    @endphp

    <section class="inner-banner-main mt-5">
        <div class="container cmn-bold-text main-head content-paragrph">
            @if ($bannersimage)
                <img src="{{ URL::asset($bannersimage->filesrc) }}" alt="" class="mb-4 img-fluid">
            @endif
        </div>
    </section>
@endif
{{--  banners section end  --}}
