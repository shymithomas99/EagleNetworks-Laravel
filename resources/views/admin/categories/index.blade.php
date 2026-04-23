{{--  @extends('layouts.app')

@section('content')  --}}

@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">
        <div class="card">

            <!-- HEADER -->
            <div class="card-header">
                Video Categories

                <div class="mt-3 mb-3">
                    <p><b>Manage video categories used for organizing video projects.</b></p>
                </div>
            </div>

            <div class="card-body">

                <!-- ADD CATEGORY FORM -->
                <form method="POST" action="{{ route('admin.categories.store') }}">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" placeholder="Category Name" required>
                        </div>

                        <div class="col-md-2">
                            <input type="number" name="display_order" class="form-control" value="0"
                                placeholder="Order">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-success">Add Category</button>
                        </div>
                    </div>
                </form>

                <!-- SUCCESS MESSAGE -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- TABLE -->
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $index => $cat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->slug }}</td>
                                <td>{{ $cat->display_order }}</td>

                                <td>
                                    <!-- EDIT -->
                                    <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('admin.categories.delete', $cat->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this category?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    {{--  <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <input type="text" name="name" placeholder="Category name" required>

        <button>Add Category</button>
    </form>  --}}
@endsection
