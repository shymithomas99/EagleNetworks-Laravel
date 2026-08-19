@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                Upload / Delete Gallery Images
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-8">
                        <label>Gallery Images (max 2 MB)</label>
                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-3">
                        <a href="{{ route('admin.work.index') }}" class="btn btn-primary">Done</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet" type="text/css" />
@endpush


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="{{ asset('js/image-upload.js') }}" type="text/javascript"></script>

<script>
$(document).ready(function() {

    @if($work->id)
        @if($work->galleryImages->isNotEmpty())
            let preloaded = [
            @foreach($work->galleryImages as $gallery)
                {
                    id: {{$gallery->id}},
                    src: '{{ asset("backend_assets/work/gallery-images/".$gallery->image) }}'
                },
            @endforeach
            ];
         
            $('.input-images-1').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'gallery_images',
                preloadedInputName: 'old',
                deleteUrl: "{{ route('admin.delete-image') }}",
                uploadUrl: "{{ route('admin.upload-image') }}",
                id: {{ $work->id }},
            });
        
        @else
            $('.input-images-1').imageUploader({
                id: {{ $work->id }},
            });
        @endif
    @endif

});
</script>
@endpush