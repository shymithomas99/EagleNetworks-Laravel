@extends('layouts.admin')
@section('content')
    <style>
        .btn-export {
            padding: 10px 15px;
            background: #ff4d1c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>

    <div class="container px-5 py-5">
        <div class="card">
            <div class="card-header">
                Newsletter Subscribers
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- Form for changing the number of rows per page -->
                    <div class="py-3 row col-3">
                        <form method="GET" action="{{ route('admin.newsletter-subscribers.index') }}">
                            <label class="d-flex align-items-center">Show
                                <select id="per_page" name="per_page" class="mx-2 form-select"
                                    onchange="this.form.submit()">
                                    <option value="10" {{ $perPage == 10 ? ' selected' : '' }}>10</option>
                                    <option value="25" {{ $perPage == 25 ? ' selected' : '' }}>25</option>
                                    <option value="50" {{ $perPage == 50 ? ' selected' : '' }}>50</option>
                                    <option value="100" {{ $perPage == 100 ? ' selected' : '' }}>100</option>
                                </select>
                                entries
                            </label>
                        </form>
                    </div>

                    <table class="table align-middle table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = ($subscribers->currentPage() - 1) * $subscribers->perPage() + 1;
                            @endphp

                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <th>{{ $i }}</th>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->created_at->format('d M Y') }}</td>
                                    <td>
                                        <!-- DELETE -->
                                        <form action="{{ route('admin.newsletter-subscribers.destroy', $subscriber) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger"
                                                onclick="return confirm('Delete this content?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row" align="center">
                        {{ $subscribers->appends(['per_page' => $perPage])->links('includes.admin.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('ids[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
@endsection
