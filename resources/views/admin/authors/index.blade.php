@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}

                <a href="{{ route('admin.authors.create') }}" class="btn btn-success float-end">
                    + Add Author
                </a>

                <div class="mt-3">
                    <p><b>Manage all authors here.</b></p>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-middle table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collections as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $item->image ? asset('backend_assets/authors/' . $item->image) : asset('backend_assets/blank-profile-picture.png') }}"
                                        alt="{{ $item->name }}"
                                        class="img-thumbnail"
                                        style="width:70px;height:70px;object-fit:cover;"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->designation }}</td>
                                {{-- <td>
                                    <div class="form-check form-switch">
                                    <input class="form-check-input toggle-publish" type="checkbox" value="1" data-id="{{ $item->id }}" {{ $item->published ? 'checked' : '' }}>
                                    </div>
                                </td> --}}
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.authors.edit', $item) }}">
                                        Edit
                                    </a>
                                    <!-- DELETE -->
                                    <form action="{{ route('admin.authors.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger"
                                            onclick="return confirm('Delete this author?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">No Results to Show</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row" align="center">
                    {{ $collections->appends(['sortmenu' => $selectedsortedmenu ?? null])->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection