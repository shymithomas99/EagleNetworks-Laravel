@extends('layouts.admin')

@section('content')
    <div class="container px-5 py-5">

        <div class="card">

            <div class="card-header">

                {{ $title }}

                <a href="{{ route('admin.terms-page.create', [
                    'section' => $section,
                    'is_card' => $is_card,
                ]) }}"
                    class="btn btn-success float-end">
                    + Add
                </a>

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

                        @forelse ($collections as $item)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->title }}
                                </td>

                                <td>
                                    {{ $item->display_order }}
                                </td>

                                <td>

                                    <span
                                        class="badge fs-6 px-3 py-2
                                    {{ $item->published ? 'bg-success' : 'bg-secondary' }}">

                                        {{ $item->published ? 'Published' : 'Unpublished' }}

                                    </span>

                                </td>

                                <td>

                                    <form
                                        action="{{ route('admin.terms-page.toggle-publish', [
                                            'section' => $section,
                                            'is_card' => $is_card,
                                            'termsPage' => $item,
                                        ]) }}"
                                        method="POST" class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-primary">

                                            {{ $item->published ? 'Unpublish' : 'Publish' }}

                                        </button>

                                    </form>

                                    <a class="btn btn-info"
                                        href="{{ route('admin.terms-page.edit', [
                                            'section' => $section,
                                            'is_card' => $is_card,
                                            'termsPage' => $item,
                                        ]) }}">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.terms-page.destroy', [
                                            'section' => $section,
                                            'is_card' => $is_card,
                                            'termsPage' => $item,
                                        ]) }}"
                                        method="POST" class="d-inline">

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

                                <td colspan="5" class="text-center">
                                    No Results to Show
                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

                <div class="row" align="center">
                    {{ $collections->links() }}
                </div>

            </div>

        </div>

    </div>
@endsection
