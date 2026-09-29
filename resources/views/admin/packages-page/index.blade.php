@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}

                <a href="{{ route('admin.packages-page.create', ['section' => $section, 'is_card' => $is_card]) }}" class="btn btn-success float-end">
                    + Add
                </a>

                <!-- <div class="mt-3">
                    <p><b>Manage all packages-page here.</b></p>
                </div> -->
            </div>
            <div class="card-body">
                <table class="table align-middle table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collections as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->display_order }}</td>
                                <td>
                                    <span
                                        class="badge fs-6 px-3 py-2 {{ $item->published ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->published ? 'Published' : 'Unpublished' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.packages-page.toggle-publish', ['section' => $section, 'is_card' => $is_card, 'packagesPage' => $item]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary">
                                            {{ $item->published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                    @if($is_card && $section === '3')
                                    <a class="btn btn-dark" href="{{ route('admin.packages-page.show', ['section' => $section, 'is_card' => $is_card, 'packagesPage' => $item]) }}">
                                        View
                                    </a>
                                    @endif
                                    <a class="btn btn-info" href="{{ route('admin.packages-page.edit', ['section' => $section, 'is_card' => $is_card, 'packagesPage' => $item]) }}">
                                        Edit
                                    </a>
                                    <!-- DELETE -->
                                    <form action="{{ route('admin.packages-page.destroy', ['section' => $section, 'is_card' => $is_card, 'packagesPage' => $item]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                
                                        <button class="btn btn-danger" onclick="return confirm('Delete this content?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">No Results to Show</td>
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
