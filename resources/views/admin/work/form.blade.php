@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
            <form method="POST" action="{{ $work->id ? route('admin.work.update',$work) : route('admin.work.store') }}" enctype="multipart/form-data">
                @csrf
                {{ $work->id ? method_field('PUT') : '' }}
                <div class="row">
                    <div class="col-6 my-3">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title"
                            placeholder="" name="title"
                            value="{{ old('title', $work->title ?? '') }}">
                        @error("title")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-3">
                        <label for="slug">Slug*</label>
                        <input type="text" id="slug" name="slug" class="form-control"
                            value="{{ old('slug', $work->slug ?? '') }}">
                        @error("slug")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-3">
                        <label for="clientName">Client Name*</label>
                        <input type="text" id="clientName" name="clientName" class="form-control"
                            value="{{ old('clientName', $work->clientName ?? '') }}">
                        @error("clientName")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-3">
                        <label for="category_id">Category*</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $work->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 my-3">
                        <label for="industry">Industry</label>
                        <input type="text" id="industry" class="form-control" name="industry"
                            value="{{ old('industry', $work->industry ?? '') }}">
                    </div>
                    <div class="col-6 my-3">
                        <label for="projectYear">Project Year</label>
                        <input type="text" id="projectYear" class="form-control" inputmode="numeric" pattern="[0-9]*" maxlength="4" name="projectYear"
                            value="{{ old('projectYear', $work->projectYear ?? '') }}">
                    </div>
                    <div class="col-6 my-3">
                        <label for="excerpt">Excerpt</label>
                        <textarea id="excerpt" class="form-control" name="excerpt">{{ old('excerpt', $work->excerpt ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="servicesDelivered">Services Delivered</label>
                        <textarea id="servicesDelivered" class="form-control" name="servicesDelivered">{{ old('servicesDelivered', $work->servicesDelivered ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="brief">Brief</label>
                        <textarea id="brief" class="textarea" name="brief">{{ old('brief', $work->brief ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="approach">Approach</label>
                        <textarea id="approach" class="textarea" name="approach">{{ old('approach', $work->approach ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="results">Results</label>
                        <textarea id="results" class="textarea" name="results">{{ old('results', $work->results ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="keyMetrics">Key Metrics</label>
                        <textarea id="keyMetrics" class="textarea" name="keyMetrics">{{ old('keyMetrics', $work->keyMetrics ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="additionalContent">Testimonial</label>
                        <textarea id="additionalContent" class="form-control" name="additionalContent">{{ old('additionalContent', $work->additionalContent ?? '') }}</textarea>
                    </div>
                    <div class="col-6 my-3">
                        <label for="testimonialAuthor">Testimonial Author</label>
                        <input type="text" id="testimonialAuthor" class="form-control" name="testimonialAuthor"
                            value="{{ old('testimonialAuthor', $work->testimonialAuthor ?? '') }}">
                    </div>
                    <div class="col-12 my-3">
                        <label for="testimonial">Additional Content</label>
                        <textarea id="testimonial" class="textarea" name="testimonial">{{ old('testimonial', $work->testimonial ?? '') }}</textarea>
                    </div>
                    <div class="col-4 my-3">
                        <input type="checkbox" class="form-check-input" id="featured"
                            name="featured" value="1"
                            {{ old('featured', $work->featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">Featured</label>
                    </div>
                    <div class="col-4 my-3">
                        <input type="checkbox" class="form-check-input" id="published"
                            name="published" value="1"
                            {{ old('published', $work->published ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="published">Published</label>
                    </div>
                    <div class="col-4 my-3">
                        <label for="displayOrder">Display Order</label>
                        <input type="number" id="displayOrder" class="form-control" name="displayOrder"
                            value="{{ old('displayOrder', $work->displayOrder ?? 0) }}">
                    </div>
                    <div class="col-6 my-3">
                        <label for="seoTitle">SEO Title</label>
                        <input type="text" id="seoTitle" class="form-control" name="seoTitle"
                            value="{{ old('seoTitle', $work->seoTitle ?? '') }}">
                    </div>

                    <div class="col-6 my-3">
                        <label for="seoDescription">SEO Description</label>
                        <textarea id="seoDescription" class="form-control" name="seoDescription">{{ old('seoDescription', $work->seoDescription ?? '') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 my-3">
                        <button type="submit" class="btn btn-primary">{{ $work->id ? 'Update' : 'Save' }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.work.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.getElementById('projectYear').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);
});
</script>
@endpush