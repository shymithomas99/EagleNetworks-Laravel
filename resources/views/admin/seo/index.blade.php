@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">SEO Management</h1>

            <a href="{{ route('admin.seo.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add SEO
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Details</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Page URL</th>
                                <th>Meta Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($seos as $seo)
                                <tr>
                                    <td>{{ $seos->firstItem() + $loop->index }}</td>
                                    <td>{{ $seo->page_name }}</td>
                                    <td>{{ $seo->page_url }}</td>
                                    <td>{{ $seo->meta_title ?: '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.seo.destroy', $seo->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this SEO record?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No SEO records found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $seos->links() }}
            </div>
        </div>
    </div>
@endsection
