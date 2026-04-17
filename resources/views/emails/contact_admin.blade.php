@extends('layouts.app')

@section('content')
    <h2>New Contact Enquiry</h2>

    <p><strong>Name:</strong> {{ $data->name }}</p>
    <p><strong>Email:</strong> {{ $data->email }}</p>
    <p><strong>Team:</strong> {{ $data->team }}</p>
    <p><strong>Service:</strong> {{ $data->service }}</p>
    <p><strong>Package:</strong> {{ $data->package }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $data->message }}</p>
@endsection
