@extends('layouts.app')

@section('title', $page->PageName)

@section('content')

    <div class="container py-5">
        {{-- <h2>{{ $page->PageName }}</h2> --}}
        <div>{!! $page->detail !!}</div>
    </div>

@endsection
{{--
@push('styles')
    <style>
        .modern-about-us {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            border-radius: 8px;
            background: #f8f9fa;
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-item i {
            font-size: 24px;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .feature-content h5 {
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
        }

        .mission-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px;
            border-radius: 8px;
            margin-top: 25px;
            border-left: 4px solid var(--primary, #007bff);
        }

        .mission-section h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .text-primary {
            color: var(--primary, #007bff) !important;
        }
    </style>
@endpush --}}
