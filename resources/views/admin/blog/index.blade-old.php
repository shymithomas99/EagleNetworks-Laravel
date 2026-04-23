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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                            Create
                        </button>
                        <a href="{{route('admin.blog.create')}}" class="btn btn-primary">
                            Create
                        </a>
                    </div>
                    <table class="table align-middle table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
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
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>
                                        @if ($item->published == true)
                                            <a class="mx-2 col btn btn-success"
                                                href="{{ route('admin.item.unpublish', [$item->id, ($requestfrom = 'blog')]) }}">
                                                Publish
                                            </a>
                                        @else
                                            <a class="mx-2 col btn btn-danger"
                                                href="{{ route('admin.item.publish', [$item->id, ($requestfrom = 'blog')]) }}">
                                                Unpublish
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row">
                                            <button class="mx-2 col btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $item->id }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <a class="mx-2 col btn btn-success" href="{{ route('admin.blog.edit', $item) }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <button class="mx-2 col btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $item->id }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        {{-- EDIT MODAL START --}}
                                        <!-- Modal -->
                                        <div class="modal fade editModal" id="edit{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="createContent" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editlabel">Edit</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form method="POST"
                                                            action="{{ route('admin.blog.update', $item) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('patch')

                                                            <div class="row">
                                                                <div class="col-md-12 my-3">
                                                                    <label for="editTitle">Title:</label>
                                                                    <input type="text" class="form-control" id="editTitle" placeholder="Article title..." name="title" value="{{ $item->title }}">
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <label for="editSlug">Slug:</label>
                                                                    <input type="text" class="form-control" id="editSlug" placeholder="article-slug" name="slug" value="{{ $item->slug }}">
                                                                </div>

                                                                <div class="col-md-6 my-3">
                                                                    <label for="editAuthor">Author:</label>
                                                                    <input type="text" class="form-control" id="editAuthor" placeholder="Eagle London" name="author" value="{{ $item->author }}">
                                                                </div>

                                                                <div class="col-md-6 my-3">
                                                                    <label for="editCategory">Category:</label>
                                                                    <input type="text" class="form-control" id="editCategory" placeholder="e.g., Strategy, Digital, Creative" name="category" value="{{ $item->category }}">
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <label class="" for="editExcerpt">Excerpt:</label><br>
                                                                    <textarea class="" name="excerpt" id="editExcerpt" rows="3" style="width: 100%;" placeholder="Short summary shown in listings...">{{ $item->excerpt }}</textarea>
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <label class=""> Body:</label>
                                                                    <textarea class="textarea" name="body">{!! $item->body !!}</textarea>
                                                                </div>

                                                                <div class="col-md-6 my-3">
                                                                    <label for="editSeoTitle">SEO Title:</label>
                                                                    <input type="text" class="form-control" id="editSeoTitle" placeholder="" name="seoTitle" value="{{ $item->seoTitle }}">
                                                                </div>

                                                                <div class="col-md-6 my-3">
                                                                    <label for="editSeoDescription">SEO Description:</label><br>
                                                                    <textarea class="" name="seoDescription" id="editSeoDescription" placeholder="" rows="3" style="width: 100%;">{{ $item->seoDescription }}</textarea>
                                                                </div>

                                                                <div class="col-md-6 my-3">
                                                                    <input type="checkbox" class="form-check-input" id="editPublished" name="published" @checked($item->published) value="1">
                                                                    <label class="form-check-label" for="editPublished">Published</label>
                                                                </div>

                                                                <div class="col-md-12 my-3">
                                                                    <button type="submit" style="width: 100%;" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- EDIT MODAL END --}}
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
                                                            action="{{ route('admin.blog.destroy', $item) }}">
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
                                    <td scope="col" colspan="6" style="text-align: center;">No Results to Show</td>
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
    {{-- MODAL START --}}
    <!-- Modal -->
    <div class="modal fade createModal" id="create" tabindex="-1" aria-labelledby="createContent"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createContent">Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" placeholder="Article title..." name="title">
                            </div>

                            <div class="col-md-12 my-3">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" id="slug" placeholder="article-slug" name="slug">
                            </div>      

                            <div class="col-md-6 my-3">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" placeholder="Eagle London" name="author">
                            </div>

                            <div class="col-md-6 my-3">
                                <label for="category">Category:</label>
                                <input type="text" class="form-control" id="category" placeholder="e.g., Strategy, Digital, Creative" name="category">
                            </div>

                            <div class="col-md-12 my-3">
                                <label class="" for="excerpt">Excerpt:</label><br>
                                <textarea class="" name="excerpt" id="excerpt" rows="3" style="width: 100%;" placeholder="Short summary shown in listings...">{{ $item->excerpt }}</textarea>
                            </div>

                            <div class="col-md-12 my-3">
                                <label class="">Body:</label>
                                <textarea class="textarea" name="body"></textarea>
                            </div>

                            <div class="col-md-6 my-3">
                                <label for="seoTitle">SEO Title:</label>
                                <input type="text" class="form-control" id="seoTitle" placeholder="" name="seoTitle">
                            </div>

                            <div class="col-md-6 my-3">
                                <label for="seoDescription">SEO Description:</label><br>
                                <textarea class="" name="seoDescription" id="seoDescription" placeholder="" rows="3" style="width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6 my-3">
                                <input type="checkbox" class="form-check-input" id="published" name="published" value="1">
                                <label class="form-check-label" for="published">Published</label>
                            </div>

                            <div class="col-md-12 my-3">
                                <button type="submit" style="width: 100%;" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL END --}}

@endsection