@extends('layouts.admin')
@section('content')

<div class="container px-5 py-5">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ route('admin.dashboard') }}"> Dashboard </a> </li>
            <li class="breadcrumb-item"> <a href="{{ route('admin.packages-page.index', [ 'section' => $section, 'is_card' => $is_card ]) }}"> Package Cards </a> </li>
            <li class="breadcrumb-item active" aria-current="page"> View Package Card (Menu)</li>
        </ol>
    </nav>

    <div class="card">

        <div class="card-header">
            {{ $title ?? null }}
        </div>

        <div class="card-body">

            <div class="list-group">

                {{-- Banner Intro --}}
                <a href="{{ route('admin.packages.edit', [
                        'packagesPage' => $packagesPage,
                        'section' => '1',
                        'is_card' => '0',
                        'package' => $packages->get(1),
                    ]) }}"
                    class="list-group-item list-group-item-action">
                    <i class="fas fa-image me-2"></i>
                    Banner Intro
                </a>


                {{-- For --}}
                <div class="list-group-item">

                    <div class="fw-bold mb-2">
                        <i class="fas fa-cogs me-2"></i>
                        For
                    </div>

                    <div class="ms-4">

                        {{-- For Intro --}}
                        <a href="{{ route('admin.packages.edit', [
                                'packagesPage' => $packagesPage,
                                'section' => '2',
                                'is_card' => '0',
                                'package' => $packages->get(2),
                            ]) }}"
                            class="list-group-item list-group-item-action border-0">
                            <i class="fas fa-angle-right me-2"></i>
                            Intro
                        </a>

                        {{-- For Cards --}}
                        <a href="{{ route('admin.packages.index', [
                                'packagesPage' => $packagesPage,
                                'section' => '2',
                                'is_card' => '1'
                            ]) }}"
                            class="list-group-item list-group-item-action border-0">
                            <i class="fas fa-angle-right me-2"></i>
                            Cards
                        </a>

                    </div>
                </div>

                {{-- Services --}}
                <div class="list-group-item">

                    <div class="fw-bold mb-2">
                        <i class="fas fa-cogs me-2"></i>
                        Services
                    </div>

                    <div class="ms-4">

                        {{-- Services Intro --}}
                        <a href="{{ route('admin.packages.edit', [
                                'packagesPage' => $packagesPage,
                                'section' => '3',
                                'is_card' => '0',
                                'package' => $packages->get(3),
                            ]) }}"
                            class="list-group-item list-group-item-action border-0">
                            <i class="fas fa-angle-right me-2"></i>
                            Intro
                        </a>

                        {{-- For Cards --}}
                        <a href="{{ route('admin.packages.index', [
                                'packagesPage' => $packagesPage,
                                'section' => '3',
                                'is_card' => '1'
                            ]) }}"
                            class="list-group-item list-group-item-action border-0">
                            <i class="fas fa-angle-right me-2"></i>
                            Cards
                        </a>

                    </div>
                </div>

                {{-- How We Work --}}
                <div class="list-group-item">

                    <div class="fw-bold mb-2">
                        <i class="fas fa-project-diagram me-2"></i>
                        How We Work
                    </div>

                    <div class="ms-4">

                        {{-- How We Work Intro --}}
                        <a href="{{ route('admin.packages.edit', [
                                'packagesPage' => $packagesPage,
                                'section' => '4',
                                'is_card' => '0',
                                'package' => $packages->get(4),
                            ]) }}"
                            class="list-group-item list-group-item-action border-0">
                            <i class="fas fa-angle-right me-2"></i>
                            Intro
                        </a>

                        {{-- How We Work Cards --}}
                        <a href="{{ route('admin.packages.index', [
                                'packagesPage' => $packagesPage,
                                'section' => '4',
                                'is_card' => '1'
                            ]) }}"
                            class="list-group-item list-group-item-action border-0">
                            <i class="fas fa-angle-right me-2"></i>
                            Cards
                        </a>

                    </div>
                </div>


                {{-- CTA Banner Bottom --}}
                <a href="{{ route('admin.packages.edit', [
                        'packagesPage' => $packagesPage,
                        'section' => '5',
                        'is_card' => '0',
                        'package' => $packages->get(5),
                    ]) }}"
                    class="list-group-item list-group-item-action">
                    <i class="fas fa-bullhorn me-2"></i>
                    CTA Banner (Bottom) Intro
                </a>

            </div>

        </div>
    </div>

</div>

@endsection