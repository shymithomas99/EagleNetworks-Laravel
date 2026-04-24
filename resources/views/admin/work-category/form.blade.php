@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
            <form method="POST" action="{{ $workCategory->id ? route('admin.work-category.update',$workCategory) : route('admin.work-category.store') }}" enctype="multipart/form-data">
                @csrf
                {{ $workCategory->id ? method_field('PUT') : '' }}
                <div class="row">
                    <div class="col-6 my-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name"
                            placeholder="Creative" name="name"
                            value="{{ old('name', $workCategory->name ?? '') }}">
                        @error("name")
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-6 my-3">
                        <input type="checkbox" class="form-check-input" id="published"
                            name="published" value="1"
                            {{ old('published', $workCategory->published ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="published">Published</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 my-3">
                        <button type="submit" class="btn btn-primary">{{ $workCategory->id ? 'Update' : 'Save' }}</button>
                        <a class="btn btn-secondary" href="{{ route('admin.work-category.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection