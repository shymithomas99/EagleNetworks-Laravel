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
                Leads Dashboard
                <div class="mt-3 mb-3">
                    <p><b>This section displays enquiries submitted through the contact form on the website. All
                            information entered by users through the public form will appear here for review and record
                            keeping.</b></p>

                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- Form for changing the number of rows per page -->
                    <div class="py-3 row col-3">
                        <form method="GET" action="{{ route('admin.leads') }}">
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

                    <div class="py-3 mx-3">
                        <a href="{{ route('admin.leads.export') }}" class="btn-export">
                            Export CSV
                        </a>
                    </div>

                    <!-- Form for bulk deletion -->
                    <form method="POST" action="{{ route('admin.leads.bulk-delete') }}" id="bulk-form">
                        @csrf
                        <div class="py-3 row">
                            <div class="col text-end">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete the selected enquiries?')">
                                    Delete Selected
                                </button>
                            </div>
                        </div>

                        <table class="table align-middle table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" id="select-all">
                                    </th>
                                    <th scope="col"></th>#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Team</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = ($contacts->currentPage() - 1) * $contacts->perPage() + 1;
                                @endphp

                                @foreach ($contacts as $lead)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{ $lead->id }}">
                                        </td>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->email }}</td>
                                        <td>{{ $lead->team }}</td>
                                        <td>{{ $lead->service }}</td>
                                        <td>{{ $lead->package }}</td>
                                        <td>{{ $lead->message }}</td>
                                        <td>{{ $lead->created_at->format('d M Y') }}</td>

                                        <td>

                                            <div class="row">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    formaction="{{ route('admin.leads.delete', $lead->id) }}"
                                                    formmethod="post"
                                                    onclick="return confirm('Are you sure you want to delete this enquiry?')">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            </tbody>
                        </table>
                        <div class="row" align="center">
                            {{ $contacts->appends(['per_page' => $perPage])->links('includes.admin.pagination') }}
                        </div>
                    </form>
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
