@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}

                <a href="{{ route('admin.footer.create', ['section' => $section, 'is_link' => $is_link]) }}" class="btn btn-success float-end">
                    + Add
                </a>

                <!-- <div class="mt-3">
                    <p><b>Manage all footers here.</b></p>
                </div> -->
            </div>
            <div class="card-body">
                <table class="table align-middle table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            @if(in_array($section, [2,6]))<th>Text</th>@endif
                            @if($section === '5')<th>Social Media</th>@endif
                            <th>Display Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($collections as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if(in_array($section, [2,6]))<td>{{ $item->text }}</td>@endif
                                @if($section === '5')<td>{{ $item->social_media->label() }}</td>@endif
                                <td>{{ $item->display_order }}</td>
                                <td>
                                    <span
                                        class="badge fs-6 px-3 py-2 {{ $item->published ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $item->published ? 'Published' : 'Unpublished' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.footer.toggle-publish', ['section' => $section, 'is_link' => $is_link, 'footer' => $item]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary">
                                            {{ $item->published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                    <a class="btn btn-info" href="{{ route('admin.footer.edit', ['section' => $section, 'is_link' => $is_link, 'footer' => $item]) }}">
                                        Edit
                                    </a>
                                    <!-- DELETE -->
                                    <form action="{{ route('admin.footer.destroy', ['section' => $section, 'is_link' => $is_link, 'footer' => $item]) }}" method="POST"
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
