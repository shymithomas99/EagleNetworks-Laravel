@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">
        <div class="card">

            <div class="card-header">
                Edit Category
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Display Order</label>
                        <input type="number" name="display_order" value="{{ $category->display_order }}"
                            class="form-control">
                    </div>

                    <button class="btn btn-success">Update</button>

                </form>

            </div>
        </div>
    </div>
@endsection
