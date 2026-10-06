@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">

        @if (in_array($section, ['2', '4', '7']))

            @php
                if ($section === '2') {
                    $manageLabel = 'Service Cards';
                    $manageRoute = route('admin.services-page.index', [
                        'section' => 2,
                        'is_card' => 1
                    ]);
                    $contentLabel = 'service';
                } elseif ($section === '4') {
                    $manageLabel = 'Work Cards';
                    $manageRoute = route('admin.works.index');
                    $contentLabel = 'work';
                }
                else {
                    $manageLabel = 'Package Cards';
                    $manageRoute = route('admin.packages-page.index', [
                        'section' => 3,
                        'is_card' => 1
                    ]);
                    $contentLabel = 'package';
                }
            @endphp

            <div class="card">
                <div class="card-header">
                    {{ $title ?? null }}
                </div>

                <div class="card-body text-center py-5">

                    <p class="text-muted">
                        To manage {{ $manageLabel }},
                        <a href="{{ $manageRoute }}" class="fw-bold text-decoration-none">
                            click here</a>.
                        <br>
                        Enable the <strong>Featured</strong> option to display the
                        {{ $contentLabel }} on the public 'Home' page.
                    </p>

                </div>
            </div>

        @else
            <div class="card">
                <div class="card-header">
                    {{ $title ?? null }}

                    <a href="{{ route('admin.home-page.create', ['section' => $section, 'is_card' => $is_card]) }}" class="btn btn-success float-end">
                        + Add
                    </a>

                    <!-- <div class="mt-3">
                        <p><b>Manage all homePages here.</b></p>
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
                                        <form action="{{ route('admin.home-page.toggle-publish', ['section' => $section, 'is_card' => $is_card, 'homePage' => $item]) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-primary">
                                                {{ $item->published ? 'Unpublish' : 'Publish' }}
                                            </button>
                                        </form>
                                        <a class="btn btn-info" href="{{ route('admin.home-page.edit', ['section' => $section, 'is_card' => $is_card, 'homePage' => $item]) }}">
                                            Edit
                                        </a>
                                        <!-- DELETE -->
                                        <form action="{{ route('admin.home-page.destroy', ['section' => $section, 'is_card' => $is_card, 'homePage' => $item]) }}" method="POST"
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

        @endif

    </div>
@endsection
