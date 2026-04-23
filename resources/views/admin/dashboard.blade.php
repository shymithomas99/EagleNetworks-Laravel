@extends('layouts.admin')

@section('content')
    <h2>Dashboard Overview</h2>

    <div style="background:#0d3f2f; color:#fff; padding:25px; border-radius:12px; width:280px;">

        <h1 style="margin:0; font-size:40px;">{{ $totalLeads }}</h1>
        <p style="margin:5px 0 15px;">Total Leads</p>

        <a href="{{ route('admin.leads') }}"
            style="display:inline-block; padding:8px 14px; background:#ff4d1c; color:#fff; text-decoration:none; border-radius:6px;">
            View Leads →
        </a>

    </div>
@endsection
