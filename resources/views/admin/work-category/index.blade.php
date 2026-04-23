@extends('layouts.admin')
@section('content')
    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                {{ $title ?? null }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="pb-3 row">
                        <a href="{{route('admin.work-category.create')}}" class="btn btn-primary">
                            Create
                        </a>
                    </div>
                    <table class="table align-middle table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Published</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = ($collections->currentPage() - 1) * $collections->perPage() + 1;
                            @endphp
                            @forelse ($collections as $key => $item)
                                <tr>
                                    <th scope="row">
                                        {{ $key + $collections->perPage() * ($collections->currentPage() - 1) + 1 }}
                                    </th>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->published == true)
                                            <a class="mx-2 col btn btn-success"
                                                href="{{ route('admin.work-category.unpublish', $item->id) }}">
                                                Publish
                                            </a>
                                        @else
                                            <a class="mx-2 col btn btn-danger"
                                                href="{{ route('admin.work-category.publish', $item->id) }}">
                                                Unpublish
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <a class="mx-2 col btn btn-success" href="{{ route('admin.work-category.edit', $item) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <button class="mx-2 col btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $item->id }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>

                                        {{-- DELETE MODAL START --}}
                                        <!-- Modal -->
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
                                        </div>
                                        {{-- DELETE MODAL END --}}
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td scope="col" colspan="4" style="text-align: center;">No Results to Show</td>
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
    </div>

@endsection