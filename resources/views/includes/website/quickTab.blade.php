@php
$quickTabMenus =(new Helper())->quickTabMenus($title ?? null) ?? [];
@endphp

@if (isset($quickTabMenus) && !empty($quickTabMenus))
<section class="quick-links">
    <div class="container">
        <div class="row">
            {{-- {{ dd(count($quickTabMenus)) }} --}}
            @forelse ($quickTabMenus as $quickTabMenu)
            <div class="col-md-6 col-lg-4">
                <a href="{{ $quickTabMenu->link }}" class="quick-tab">
                    <div class="d-flex justify-content-between">{{str_replace('-',' ',$quickTabMenu->menu)}}<i
                            class="bi bi-chevron-right"></i>
                    </div>
                </a>
            </div>
            @empty
            @endforelse

        </div>
    </div>
</section>

@endif