@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">

        <div class="card">

            <div class="card-header">
                Cookie Preferences
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.cookie-preference-page.update') }}">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- =========================
                        MODAL HEADER
                    ========================= --}}

                        <div class="col-md-12 mb-4">
                            <h5 class="font-weight-bold text-primary border-bottom pb-2">
                                Modal Header
                            </h5>
                        </div>

                        <div class="col-md-12 mb-3">

                            <label for="title">
                                Modal Title
                            </label>

                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $cookiePage->title) }}">

                        </div>


                        {{-- =========================
                        INTRODUCTION
                    ========================= --}}

                        <div class="col-md-12 mb-4">
                            <h5 class="font-weight-bold text-primary border-bottom pb-2">
                                Introduction
                            </h5>
                        </div>

                        <div class="col-md-12 mb-3">

                            <label for="description">
                                Description
                            </label>

                            <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $cookiePage->description) }}</textarea>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="privacy_policy_text">
                                Privacy Policy Text
                            </label>

                            <input type="text" name="privacy_policy_text" id="privacy_policy_text" class="form-control"
                                value="{{ old('privacy_policy_text', $cookiePage->privacy_policy_text) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="privacy_policy_url">
                                Privacy Policy URL
                            </label>

                            <input type="text" name="privacy_policy_url" id="privacy_policy_url" class="form-control"
                                value="{{ old('privacy_policy_url', $cookiePage->privacy_policy_url) }}">

                        </div>


                        {{-- =========================
                        ESSENTIAL COOKIES
                    ========================= --}}

                        <div class="col-md-12 mb-4 mt-3">
                            <h5 class="font-weight-bold text-primary border-bottom pb-2">
                                Essential Cookies
                            </h5>
                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="essential_title">
                                Title
                            </label>

                            <input type="text" name="essential_title" id="essential_title" class="form-control"
                                value="{{ old('essential_title', $cookiePage->essential_title) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="essential_badge">
                                Badge
                            </label>

                            <input type="text" name="essential_badge" id="essential_badge" class="form-control"
                                value="{{ old('essential_badge', $cookiePage->essential_badge) }}">

                        </div>

                        <div class="col-md-12 mb-3">

                            <label for="essential_description">
                                Description
                            </label>

                            <textarea name="essential_description" id="essential_description" rows="4" class="form-control">{{ old('essential_description', $cookiePage->essential_description) }}</textarea>

                        </div>


                        {{-- =========================
                        ANALYTICS COOKIES
                    ========================= --}}

                        <div class="col-md-12 mb-4 mt-3">
                            <h5 class="font-weight-bold text-primary border-bottom pb-2">
                                Analytics Cookies
                            </h5>
                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="analytics_title">
                                Title
                            </label>

                            <input type="text" name="analytics_title" id="analytics_title" class="form-control"
                                value="{{ old('analytics_title', $cookiePage->analytics_title) }}">

                        </div>

                        <div class="col-md-12 mb-3">

                            <label for="analytics_description">
                                Description
                            </label>

                            <textarea name="analytics_description" id="analytics_description" rows="4" class="form-control">{{ old('analytics_description', $cookiePage->analytics_description) }}</textarea>

                        </div>


                        {{-- =========================
                        FOOTER BUTTONS
                    ========================= --}}

                        <div class="col-md-12 mb-4 mt-3">
                            <h5 class="font-weight-bold text-primary border-bottom pb-2">
                                Footer Buttons
                            </h5>
                        </div>

                        <div class="col-md-4 mb-3">

                            <label for="reject_button_text">
                                Reject Button
                            </label>

                            <input type="text" name="reject_button_text" id="reject_button_text" class="form-control"
                                value="{{ old('reject_button_text', $cookiePage->reject_button_text) }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label for="accept_button_text">
                                Accept Button
                            </label>

                            <input type="text" name="accept_button_text" id="accept_button_text" class="form-control"
                                value="{{ old('accept_button_text', $cookiePage->accept_button_text) }}">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label for="save_button_text">
                                Save Button
                            </label>

                            <input type="text" name="save_button_text" id="save_button_text" class="form-control"
                                value="{{ old('save_button_text', $cookiePage->save_button_text) }}">

                        </div>


                        {{-- =========================
                        PUBLISHED
                    ========================= --}}

                        <div class="col-md-12 mb-4">

                            <div class="form-check">

                                <input type="hidden" name="published" value="0">

                                <input type="checkbox" class="form-check-input" name="published" id="published"
                                    value="1"
                                    {{ old('published', $cookiePage->published ?? true) ? 'checked' : '' }}>

                                <label class="form-check-label" for="published">
                                    Published
                                </label>

                            </div>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection
