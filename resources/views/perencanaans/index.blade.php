@extends('layouts.app')

@section('title', __('Perencanaan'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Perencanaan') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('List Data perencanaan.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Perencanaan') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <x-alert></x-alert>

            @can('perencanaan create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('perencanaans.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Tambah Data') }}
                    </a>
                </div>
            @endcan

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="data-table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sub Kegiatan') }}</th>
                                            <th>{{ __('Jenis Pengadaan') }}</th>
                                            <th>{{ __('Jenis Pekerjaan') }}</th>
                                            <th>{{ __('Sumber Dana') }}</th>
                                            <th>{{ __('Nama Pekerjaan') }}</th>
                                            <th>{{ __('Jumlah') }}</th>
                                            <th>{{ __('Satuan') }}</th>
                                            <th>{{ __('Harga Satuan') }}</th>
                                            <th>{{ __('Pagu Anggaran') }}</th>
                                            <th>{{ __('Lokasi') }}</th>
                                            <th>{{ __('Rencana Lelang') }}</th>
                                            <th>{{ __('Rencana Kontrak') }}</th>
                                            <th>{{ __('Rencana Pengadaan') }}</th>
                                            <th>{{ __('Dokumen') }}</th>
                                            {{-- <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Updated At') }}</th> --}}
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('perencanaans.index') }}",
            columns: [{
                    data: 'sub_kegiatan',
                    name: 'sub_kegiatan',
                },
                {
                    data: 'jenis_pengadaan',
                    name: 'jenis_pengadaan',
                },
                {
                    data: 'jenis_pekerjaan',
                    name: 'jenis_pekerjaan',
                },
                {
                    data: 'sumber_dana',
                    name: 'sumber_dana',
                },
                {
                    data: 'nama_pekerjaan',
                    name: 'nama_pekerjaan',
                },
                {
                    data: 'jumlah',
                    name: 'jumlah',
                },
                {
                    data: 'satuan',
                    name: 'satuan',
                },
                {
                    data: 'harga_satuan',
                    name: 'harga_satuan',
                    // format rupiah
                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp '),
                },
                {
                    data: 'pagu_anggaran',
                    name: 'pagu_anggaran',                    
                    render: $.fn.dataTable.render.number('.', ',', 2, 'Rp '),
                },
                {
                    data: 'lokasi',
                    name: 'lokasi',
                },
                {
                    data: 'rencana_lelang',
                    name: 'rencana_lelang',
                },
                {
                    data: 'rencana_kontrak',
                    name: 'rencana_kontrak',
                },
                {
                    data: 'rencana_pengadaan',
                    name: 'rencana_pengadaan',
                },
                {
                    data: 'dokumen',
                    name: 'dokumen',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return `<div class="avatar">
                            <img src="${data}" alt="Dokuman" >
                        </div>`;
                    }
                },
                // {
                //     data: 'created_at',
                //     name: 'created_at'
                // },
                // {
                //     data: 'updated_at',
                //     name: 'updated_at'
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush
