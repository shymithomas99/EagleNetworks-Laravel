    @php

    use App\Enums\WebsiteFilesBelongsTo;
    use App\Enums\WebsiteFilesFor;
    use App\Enums\WebsiteFilesType;

    $contactUs = (new Helper())->contactUs();
    if (!empty($contactUs)) {
    $contactUsData = json_decode($contactUs->data, true);
    }
    @endphp

    @if (isset($item) && !empty($item))
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">

                <!-- Print Button -->
                <button type="button" class="mb-3 btn btn-primary" onclick="printModalContent('{{ $item->id }}')"
>
                    Print
                </button>

                <!-- Printable Area -->
                <div id="printable-content-{{ $item->id }}">
                    <div class="text-center">
                        @php
                        $headerImg = $contactUs
                        ->websitefiles()
                        ->where('filesfor', WebsiteFilesFor::MAIN->value)
                        ->where('filetype', WebsiteFilesType::IMAGE->value)
                        ->where('belongsto', WebsiteFilesBelongsTo::HeaderLogo->value)
                        ->first();
                        @endphp
                        <img class="img-fluid" src="{{ $headerImg ? asset($headerImg->filesrc) : '' }}"
                            alt="Logo">
                    </div>

                    <h3 class="my-4 text-center">Request for <br> Registration Certificates</h3>

                    @php
                    $formcontentdata = json_decode($item->data, true);
                    @endphp

                    <table class="table mt-4 table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="30">1</td>
                                <td>Ref No</td>
                                <td>{{ $item->referenceNo }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Full Name/ Company Name</td>
                                <td>{{ $formcontentdata['name'] }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Purpose of Legalisation/Attestation</td>
                                <td>{{ $formcontentdata['purpose'] }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Applied Date</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Court/ Lawyer/ Commune to be submitted to</td>
                                <td>{{ $formcontentdata['address'] }}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Contact Telephone Number</td>
                                <td>{{ $formcontentdata['phoneno'] }}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Payment Mode</td>
                                <td>{{ $formcontentdata['paymentmode'] }}</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Fee</td>
                                <td>{{ $formcontentdata['fees'] }}</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Appointment Date</td>
                                <td>{{ \Carbon\Carbon::parse($formcontentdata['appointment_date'])->format('d-M-Y') }}</td>
                            </tr>

                            <!-- Documents -->
                            <tr>
                                @php
                                $uploadDocumentDatas = $item->receivedFiles()->get();
                                @endphp
                                <td>10</td>
                                <td colspan="2">
                                    <h4>Documents Attached</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>SlNo</th>
                                                <th>Documents</th>
                                                <th>Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $counter = 1; @endphp
                                            @foreach($uploadDocumentDatas as $uploadDocumentData)
                                            @php
                                            $uploadDocumentDataDecode = json_decode($uploadDocumentData->data,true);
                                            $attestationData = (new Helper())->attestationData($item->id,
                                            $item->application_Id);
                                            $uploadDocuments = $attestationData['uploadDocuments'];
                                            $nonFileItems = $attestationData['nonFileItems'];
                                            $uploadedFile = $uploadDocuments->firstWhere('id',
                                            $uploadDocumentDataDecode['websitefile']) ?? 'N/A';
                                            @endphp
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $uploadDocumentDataDecode['title'] }}</td>
                                                <td>
                                                    @if (!empty($uploadedFile))
                                                    <a href="{{ URL::asset($uploadedFile->filesrc ?? '') }}"
                                                        target="_blank">{{ $uploadedFile->filename ?? 'N/A' }}</a>
                                                    @else
                                                    N/A
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach

                                            @if (!empty($nonFileItems))
                                            @foreach($nonFileItems as $nonFileItem)
                                            <tr>
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $nonFileItem }}</td>
                                                <td>N/A</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-warning">
                        <ol>
                            <li>Original documents should be submitted with the application in person to the Embassy.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

    <script>
        function printModalContent(id) {
            const content = document.getElementById(`printable-content-${id}`).innerHTML;
            const printWindow = window.open('', '', 'height=700,width=900');
            printWindow.document.write(`
            <html>
                <head>
                    <title>Print Details</title>
                    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                    <style>
                        body { font-family: Arial, sans-serif; margin: 30px; }
                        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                        table, th, td { border: 1px solid #ccc; padding: 10px; }
                        .text-center { text-align: center; }
                        img { max-width: 200px; margin: 0 auto; display: block; }
                        h3 { text-align: center; margin-top: 20px; }
                    </style>
                </head>
                <body>
                    ${content}
                </body>
            </html>
        `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
    @endpush
    @endif