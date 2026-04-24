@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}

                <a href="{{ route('admin.work-category.create') }}" class="btn btn-success float-end">
                    + Add Category
                </a>

                <div class="mt-3">
                    <p><b>Manage all work categories here.</b></p>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-middle table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collections as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <h4 class="pt-2"><span class="badge {{ $item->published ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->published ? 'Published' : 'Draft' }}
                                    </span></h4>
                                </td>
                                <td>
                                    <form action="{{ route('admin.work-category.toggle-publish', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary">
                                            {{ $item->published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                    <a class="btn btn-info" href="{{ route('admin.work-category.edit', $item) }}">
                                        Edit
                                    </a>
                                    <!-- DELETE -->
                                    <form action="{{ route('admin.work-category.destroy', $item) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger"
                                            onclick="return confirm('Delete this category?')">
                                            Delete
                                        </button>
                                    </form>
                                    {{-- <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $item->id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <!-- DELETE MODAL START -->
                                    <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('admin.work-category.destroy', $item) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="row">
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- DELETE MODAL END -->
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center;">No Results to Show</td>
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