@extends('layouts.app')

@section('title', __('Create Perencanaans'))

@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .dropzone {
            border: 2px dashed #007bff;
            border-radius: 5px;
            background: #f9f9f9;
            padding: 50px;
            text-align: center;
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            transition: background 0.3s ease;
        }

        .dropzone:hover {
            background: #e6f7ff;
        }

        .dropzone .dz-message {
            font-weight: 500;
            color: #007bff;
        }

        .dropzone .dz-preview .dz-image {
            border-radius: 5px;
            overflow: hidden;
        }

        .dropzone .dz-preview .dz-details {
            display: none;
        }
    </style> --}}
    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Perencanaan') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Tambah Data Perencanaan.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('perencanaans.index') }}">{{ __('Perencanaan') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Create') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('perencanaans.store') }}" method="POST" class="dropzone"
                                id="my-awesome-dropzone" enctype="multipart/form-data">
                                @csrf
                                @method('POST')

                                @include('perencanaans.include.form')

                                <a href="{{ route('perencanaans.index') }}"
                                    class="btn btn-secondary">{{ __('Back') }}</a>

                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
