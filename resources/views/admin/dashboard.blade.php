@extends('layouts.admin')

@section('content')

@push('styles')
<style>
    .dashboard-card {
        background: #0d3f2f;
        color: #fff;
        border-radius: 14px;
        padding: 24px;
        height: 100%;
        transition: all 0.25s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.14);
    }

    .dashboard-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 25px;
    }

    .dashboard-card-label {
        margin: 0 0 6px;
        font-size: 15px;
        color: rgba(255, 255, 255, 0.75);
    }

    .dashboard-card h2 {
        margin: 0;
        font-size: 38px;
        line-height: 1;
        font-weight: 700;
    }

    .dashboard-card-icon {
        width: 52px;
        height: 52px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.12);
        border-radius: 12px;
        font-size: 21px;
    }

    .dashboard-card-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .dashboard-card-link span {
        font-size: 20px;
        transition: transform 0.2s ease;
    }

    .dashboard-card-link:hover {
        color: #fff;
    }

    .dashboard-card-link:hover span {
        transform: translateX(4px);
    }
</style>
@endpush

<h2>Dashboard Overview</h2>
<div class="row g-4"> <!-- Total Blogs -->
    <div class="col-xl-3 col-md-6">
        <div class="dashboard-card">
            <div class="dashboard-card-top">
                <div>
                    <p class="dashboard-card-label">Total Blogs</p>
                    <h2>{{ $totalBlogs }}</h2>
                </div>
                <div class="dashboard-card-icon"> <i class="fas fa-blog"></i> </div>
            </div> <a href="{{ route('admin.blog.index') }}" class="dashboard-card-link"> View Blogs <span>→</span> </a>
        </div>
    </div> <!-- Total Works -->
    <div class="col-xl-3 col-md-6">
        <div class="dashboard-card">
            <div class="dashboard-card-top">
                <div>
                    <p class="dashboard-card-label">Total Works</p>
                    <h2>{{ $totalWorks }}</h2>
                </div>
                <div class="dashboard-card-icon"> <i class="fas fa-briefcase"></i> </div>
            </div> <a href="{{ route('admin.work.index') }}" class="dashboard-card-link"> View Works <span>→</span> </a>
        </div>
    </div> <!-- Total Videos -->
    <div class="col-xl-3 col-md-6">
        <div class="dashboard-card">
            <div class="dashboard-card-top">
                <div>
                    <p class="dashboard-card-label">Total Videos</p>
                    <h2>{{ $totalVideos }}</h2>
                </div>
                <div class="dashboard-card-icon"> <i class="fas fa-video"></i> </div>
            </div> <a href="{{ route('admin.videos.index') }}" class="dashboard-card-link"> View Videos <span>→</span> </a>
        </div>
    </div> <!-- Total Leads -->
    <div class="col-xl-3 col-md-6">
        <div class="dashboard-card">
            <div class="dashboard-card-top">
                <div>
                    <p class="dashboard-card-label">Total Leads</p>
                    <h2>{{ $totalLeads }}</h2>
                </div>
                <div class="dashboard-card-icon"> <i class="fas fa-users"></i> </div>
            </div> <a href="{{ route('admin.leads') }}" class="dashboard-card-link"> View Leads <span>→</span> </a>
        </div>
    </div>
</div>
@endsection