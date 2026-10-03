@extends('layouts.appweb')
@section('title', 'Contact | ')
@push('meta')
    <meta name="description"
        content="A strategy, creative, and technology agency with offices in London and Accra. We help ambitious businesses grow by combining UK expertise with African market insight.">
@endpush
@section('content')

    @if($banner)
        <section class="section-hero contact-banner">
            <div class="container-custom">
                <div class="section-hero-sub">
                    <div>
                        <div>

                            <h1>{{ $banner->title }}</h1>
                            @if($banner->description)
                                <div class="subhead">
                                    {{ $banner->description }}
                                </div>
                            @endif

                            @if($banner->button_text)
                            <a href="{{ $banner->button_url ?? '' }}" class="commn-btn btn-primary-custom me-2 mb-3 mb-sm-0 mt-2">
                                {{ $banner->button_text }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-arrow-right ms-2"
                                    data-loc="client/src/pages/Home.tsx:47">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section id="contact-section" class="contact-form section-md">

        <div class=" container-custom d-flex flex-column">
            @if($formIntro)
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $formIntro->title }}</h2>

                    @if($formIntro->description)
                        <div class="subhead mb-5">
                            {{ $formIntro->description }}
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <div class="form-section">
                <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                    @csrf

                    <div class="row g-4">

                        {{-- Honeypot --}}
                        <div class="honeypot-field" aria-hidden="true">
                            <label for="username-contact">Username</label>

                            <input type="text" id="username-contact" name="username" value="" tabindex="-1"
                                autocomplete="off">
                        </div>


                        {{-- Name --}}
                        <div class="col-md-6">
                            <label>
                                Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" class="form-control" name="name" placeholder="Your name">

                            <div class="field-error" data-error-for="name">
                            </div>
                        </div>


                        {{-- Email --}}
                        <div class="col-md-6">
                            <label>
                                Email <span class="text-danger">*</span>
                            </label>

                            <input type="email" class="form-control" name="email" placeholder="your@email.com">

                            <div class="field-error" data-error-for="email">
                            </div>
                        </div>


                        {{-- Team --}}
                        <div class="col-md-6">

                            <label>
                                Who would you like to speak to?
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="team">

                                <option value="" selected disabled>
                                    Select a team
                                </option>

                                <option value="London">
                                    London
                                </option>

                                <option value="Accra">
                                    Accra
                                </option>

                                <option value="General">
                                    General
                                </option>

                            </select>

                            <div class="field-error" data-error-for="team">
                            </div>

                        </div>


                        {{-- Service --}}
                        <div class="col-md-6">

                            <label>
                                What service are you interested in?
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select" name="service">

                                <option value="" selected disabled>
                                    Select a service
                                </option>

                                <option value="Creative Production">
                                    Creative Production
                                </option>

                                <option value="Marketing & Consultancy">
                                    Marketing & Consultancy
                                </option>

                                <option value="Tech Solutions">
                                    Tech Solutions
                                </option>

                                <option value="Outsourced Customer Service">
                                    Outsourced Customer Service
                                </option>

                                <option value="EMTV Portal">
                                    EMTV Portal
                                </option>

                                <option value="General Enquiry">
                                    General Enquiry
                                </option>

                            </select>

                            <div class="field-error" data-error-for="service">
                            </div>

                        </div>


                        {{-- Package --}}
                        <div class="col-md-12">

                            <label>
                                Which package are you interested in?
                            </label>

                            <select class="form-select" name="package">

                                <option value="None">
                                    None
                                </option>

                                <option value="Ignite">
                                    Ignite
                                </option>

                                <option value="Amplify">
                                    Amplify
                                </option>

                                <option value="Connect">
                                    Connect
                                </option>

                            </select>

                            <div class="field-error" data-error-for="package">
                            </div>

                        </div>


                        {{-- Message --}}
                        <div class="col-md-12">

                            <label>
                                Message <span class="text-danger">*</span>
                            </label>

                            <textarea class="form-control" name="message"
                                placeholder="Tell us what you're trying to achieve, your timeline, and any key challenges."></textarea>

                            <div class="field-error" data-error-for="message">
                            </div>

                        </div>


                        {{-- Submit --}}
                        <div class="col-md-12">

                            <button type="submit" id="submitBtn" class="commn-btn btn-primary-custom py-2 w-100">

                                <span id="submitText">
                                    Send Message
                                </span>

                                <span id="submitLoader" style="display:none;">
                                    Sending...
                                </span>

                            </button>

                        </div>


                        {{-- Terms --}}
                        <div
                            class="col-md-12 contact-submit-text x-small-text text-muted fw-normal d-flex justify-content-center">

                            By submitting this form you agree to our&nbsp;

                            <a href="/privacy-policy">
                                Privacy Policy
                            </a>

                            &nbsp;and&nbsp;

                            <a href="/terms">
                                Terms of Use
                            </a>.

                        </div>

                    </div>
                </form>



            </div>
        </div>
    </section>

    @if($officeIntro || $offices->isNotEmpty())
        <section class="office-map section-md">

            <div class="container-custom">
                @if($officeIntro)
                <h2 class="text-white mb-5">{{ $officeIntro->title }}</h2>
                @endif

                @if($offices->isNotEmpty())
                <div class="row g-4">

                    @foreach($offices as $office)
                        <div class="col-lg-6">
                            <div class="office-card {{ $loop->odd ? 'office-orange' : 'office-green' }}">

                                {{-- Label --}}
                                @if($office->label)
                                    <div class="office-location x-small-text fw-bold text-muted mb-2">
                                        {{ $office->label }}
                                    </div>
                                @endif

                                {{-- Title --}}
                                @if($office->title)
                                    <h2 class="location-title {{ $loop->odd ? 'text-orange' : 'text-green' }} mb-2">
                                        {{ $office->title }}
                                    </h2>
                                @endif

                                {{-- Description --}}
                                @if($office->description)
                                    <div class="small-text mb-3">
                                        {{ $office->description }}
                                    </div>
                                @endif

                                {{-- Tags --}}
                                @if($office->tag_1 || $office->tag_2 || $office->tag_3)
                                    <div class="pill-group mb-3">
                                        @if($office->tag_1)
                                            <span class="badge-custom-2 {{ $loop->odd ? 'bg-orange-lite' : 'bg-green-lite' }}">
                                                {{ $office->tag_1 }}
                                            </span>
                                        @endif

                                        @if($office->tag_2)
                                            <span class="badge-custom-2 bg-grey-lite">
                                                {{ $office->tag_2 }}
                                            </span>
                                        @endif

                                        @if($office->tag_3)
                                            <span class="badge-custom-2 bg-grey-lite">
                                                {{ $office->tag_3 }}
                                            </span>
                                        @endif
                                    </div>
                                @endif

                                {{-- Location --}}
                                @if($office->location)
                                    <div class="{{ $loop->odd ? 'text-orange' : 'text-green' }} x-small-text fw-bold mb-2">
                                        {{ strtoupper($office->location) }}
                                    </div>
                                @endif

                                {{-- Company --}}
                                @if($office->company_name)
                                    <div class="office-title {{ $loop->even ? 'text-green' : '' }} mb-2">
                                        {{ $office->company_name }}
                                    </div>
                                @endif

                                {{-- Address --}}
                                @if($office->address)
                                    <div class="office-text {{ $loop->even ? 'text-green' : '' }}">
                                        {!! nl2br(e($office->address)) !!}
                                    </div>
                                @endif

                                {{-- Contact --}}
                                @if($office->phone_1 || $office->phone_2 || $office->email)
                                    <div class="office-contact">

                                        @if($office->phone_1)
                                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $office->phone_1) }}">
                                                {{ $office->phone_1 }}
                                            </a>
                                        @endif

                                        @if($office->phone_2)
                                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $office->phone_2) }}">
                                                {{ $office->phone_2 }}
                                            </a>
                                        @endif

                                        @if($office->email)
                                            <a href="mailto:{{ $office->email }}">
                                                {{ $office->email }}
                                            </a>
                                        @endif

                                    </div>
                                @endif

                                {{-- Google Map --}}
                                @if($office->map_url)
                                    <div class="map-container">
                                        <iframe
                                            src="{{ $office->map_url }}"
                                            loading="lazy">
                                        </iframe>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
    @endif

    @if($faqIntro || $faqs->isNotEmpty())
        <section class="faq-section section-md">
            <div class="container-custom-2">
                @if($faqIntro)
                    <div class="d-flex flex-column align-items-center text-center">

                        <h2 class="h2-36 mb-5">{{ $faqIntro->title }}</h2>

                    </div>
                @endif

                @if($faqs->isNotEmpty())
                    <div class="faq-section-accordian">
                        <div class="accordion accordion-flush custom-faq" id="faqAccordion">
                            @foreach($faqs as $faq)
                                @php
                                    $faqId = 'faq' . $faq->id;
                                @endphp
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="heading{{ $faqId }}">
                                        <button
                                            class="accordion-button collapsed"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $faqId }}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{ $faqId }}">
                                            {{ $faq->title }}
                                        </button>
                                    </h2>

                                    <div
                                        id="collapse{{ $faqId }}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $faqId }}"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            {{ $faq->description }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($follow)
        <section class="follow-section ready-to">
            <div class="container position-relative z-3">

                @if($follow->title)
                    <h2 class="h2-30 mb-3">
                        {{ $follow->title }}
                    </h2>
                @endif

                @if($follow->description)
                    <p class="follow-subtext">
                        {{ $follow->description }}
                    </p>
                @endif

                <div class="contact-social-icons">
                    @if($follow->instagram)
                        <a href="{{ $follow->instagram }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif

                    @if($follow->linkedin)
                        <a href="{{ $follow->linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif

                    @if($follow->x)
                        <a href="{{ $follow->x }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="X">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    @endif

                    @if($follow->tiktok)
                        <a href="{{ $follow->tiktok }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="TikTok">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    @endif

                    @if($follow->youtube)
                        <a href="{{ $follow->youtube }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endif


@endsection

@push('styles')
    <style>
        /*
                    |--------------------------------------------------------------------------
                    | Honeypot
                    |--------------------------------------------------------------------------
                    */

        .honeypot-field {
            position: absolute !important;
            left: -9999px !important;
            top: -9999px !important;

            width: 1px !important;
            height: 1px !important;

            overflow: hidden !important;

            opacity: 0 !important;

            pointer-events: none !important;
        }


        /*
                    |--------------------------------------------------------------------------
                    | Validation Error
                    |--------------------------------------------------------------------------
                    */

        .field-error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 6px;
            display: none;
        }


        .field-error.show {
            display: block;
        }


        /*
                    |--------------------------------------------------------------------------
                    | Input Error
                    |--------------------------------------------------------------------------
                    */

        .input-error {
            border-color: #dc3545 !important;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const form = document.getElementById('contactForm');

            if (!form || form.tagName !== 'FORM') {
                console.error('Contact form not found or contactForm is not a FORM.');
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitLoader = document.getElementById('submitLoader');


            /*
            |--------------------------------------------------------------------------
            | Clear Errors
            |--------------------------------------------------------------------------
            */

            function clearErrors() {

                form.querySelectorAll('.field-error').forEach(function(element) {

                    element.textContent = '';
                    element.classList.remove('show');

                });

                form.querySelectorAll('.input-error').forEach(function(element) {

                    element.classList.remove('input-error');

                });

            }


            /*
            |--------------------------------------------------------------------------
            | Show Laravel Validation Errors
            |--------------------------------------------------------------------------
            */

            function showErrors(errors) {

                console.log('Validation errors:', errors);

                Object.keys(errors).forEach(function(field) {

                    const errorElement = form.querySelector(
                        '[data-error-for="' + field + '"]'
                    );

                    const inputElement = form.querySelector(
                        '[name="' + field + '"]'
                    );


                    if (errorElement) {

                        errorElement.textContent = errors[field][0];

                        errorElement.classList.add('show');

                    }


                    if (inputElement) {

                        inputElement.classList.add('input-error');

                    }

                });

            }


            /*
            |--------------------------------------------------------------------------
            | Remove Error On Input
            |--------------------------------------------------------------------------
            */

            form.querySelectorAll('input, select, textarea').forEach(function(field) {

                field.addEventListener('input', function() {

                    const errorElement = form.querySelector(
                        '[data-error-for="' + this.name + '"]'
                    );

                    if (errorElement) {

                        errorElement.textContent = '';

                        errorElement.classList.remove('show');

                    }

                    this.classList.remove('input-error');

                });


                field.addEventListener('change', function() {

                    const errorElement = form.querySelector(
                        '[data-error-for="' + this.name + '"]'
                    );

                    if (errorElement) {

                        errorElement.textContent = '';

                        errorElement.classList.remove('show');

                    }

                    this.classList.remove('input-error');

                });

            });


            /*
            |--------------------------------------------------------------------------
            | Submit Form
            |--------------------------------------------------------------------------
            */

            form.addEventListener('submit', async function(e) {

                e.preventDefault();

                clearErrors();


                /*
                |--------------------------------------------------------------------------
                | Honeypot
                |--------------------------------------------------------------------------
                */

                const honeypot = form.querySelector('[name="username"]');


                if (honeypot && honeypot.value.trim() !== '') {

                    Swal.fire({

                        icon: 'error',

                        title: 'Oops!',

                        text: 'Unable to submit your enquiry. Please try again.',

                        confirmButtonText: 'OK'

                    });

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Loading
                |--------------------------------------------------------------------------
                */

                submitBtn.disabled = true;

                submitText.style.display = 'none';

                submitLoader.style.display = 'inline';


                try {

                    /*
                    |--------------------------------------------------------------------------
                    | Send Form
                    |--------------------------------------------------------------------------
                    */

                    const formData = new FormData(form);


                    const response = await fetch(form.action, {

                        method: 'POST',

                        body: formData,

                        headers: {

                            'X-Requested-With': 'XMLHttpRequest',

                            'Accept': 'application/json'

                        }

                    });


                    /*
                    |--------------------------------------------------------------------------
                    | Always Try JSON
                    |--------------------------------------------------------------------------
                    */

                    const data = await response.json();


                    console.log('HTTP Status:', response.status);

                    console.log('Laravel Response:', data);


                    /*
                    |--------------------------------------------------------------------------
                    | SUCCESS
                    |--------------------------------------------------------------------------
                    */

                    if (response.ok && data.success === true) {

                        await Swal.fire({

                            icon: 'success',

                            title: 'Thank You!',

                            text: data.message,

                            confirmButtonText: 'OK'

                        });

                        form.reset();

                        clearErrors();

                        return;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | 422 VALIDATION ERROR
                    |--------------------------------------------------------------------------
                    */

                    if (response.status === 422) {


                        /*
                        |--------------------------------------------------------------------------
                        | Laravel validation errors
                        |--------------------------------------------------------------------------
                        */

                        if (data.errors) {

                            showErrors(data.errors);

                            return;
                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Honeypot error
                        |--------------------------------------------------------------------------
                        */

                        if (data.message) {

                            Swal.fire({

                                icon: 'error',

                                title: 'Oops!',

                                text: data.message,

                                confirmButtonText: 'OK'

                            });

                            return;
                        }

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Other Errors
                    |--------------------------------------------------------------------------
                    */

                    Swal.fire({

                        icon: 'error',

                        title: 'Something Went Wrong',

                        text: data.message ||
                            'Unable to submit your enquiry. Please try again.',

                        confirmButtonText: 'OK'

                    });


                } catch (error) {

                    console.error('Contact form error:', error);


                    Swal.fire({

                        icon: 'error',

                        title: 'Something Went Wrong',

                        text: 'Unable to submit your enquiry. Please try again.',

                        confirmButtonText: 'OK'

                    });


                } finally {

                    submitBtn.disabled = false;

                    submitText.style.display = 'inline';

                    submitLoader.style.display = 'none';

                }

            });

        });
    </script>
@endpush
