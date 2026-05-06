@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">
        <div class="card">

            <div class="card-header">
                Video Projects

                <a href="{{ route('admin.videos.create') }}" class="btn btn-success float-end">
                    + Add Video
                </a>

                <div class="mt-3">
                    <p><b>Manage all video projects here.</b></p>
                </div>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            {{--  <th>Duration</th>  --}}
                            <th>Featured</th>
                            {{--  <th>Status</th>  --}}
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($videos as $index => $video)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->category->name ?? '' }}</td>
                                {{--  <td>{{ $video->duration }}</td>  --}}

                                <td>
                                    {{ $video->featured ? 'Yes' : 'No' }}
                                </td>

                                {{--  <td>
                                    {{ $video->published ? 'Published' : 'Draft' }}
                                </td>  --}}

                                <td>{{ $video->display_order }}</td>

                                <td>
                                    <h4 class="pt-2"><span
                                            class="badge {{ $video->published ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $video->published ? 'Published' : 'Draft' }}
                                        </span></h4>
                                </td>

                                <td>
                                    <form action="{{ route('admin.videos.toggle-publish', $video->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary">
                                            {{ $video->published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>


                                    <a class="btn btn-info" href="{{ route('admin.videos.edit', $video->id) }}">
                                        Edit
                                    </a>
                                    <!-- DELETE -->
                                    <form action="{{ route('admin.videos.delete', $video->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger" onclick="return confirm('Delete this video?')">
                                            Delete
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
@endsection
