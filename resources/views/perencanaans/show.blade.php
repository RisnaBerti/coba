@extends('layouts.app')

@section('title', __('Detail Perencanaan'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Perencanaan') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail data perencanaan.') }}
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
                        {{ __('Detail') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                            <td class="fw-bold">{{ __('Sub Kegiatan') }}</td>
                                            <td>{{ $perencanaan->sub_kegiatan }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Jenis Pengadaan') }}</td>
                                            <td>{{ $perencanaan->jenis_pengadaan }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Jenis Pekerjaan') }}</td>
                                            <td>{{ $perencanaan->jenis_pekerjaan }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Sumber Dana') }}</td>
                                            <td>{{ $perencanaan->sumber_dana }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Nama Pekerjaan') }}</td>
                                            <td>{{ $perencanaan->nama_pekerjaan }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Jumlah') }}</td>
                                            <td>{{ $perencanaan->jumlah }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Satuan') }}</td>
                                            <td>{{ $perencanaan->satuan }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Harga Satuan') }}</td>
                                            {{-- format rupiah --}}
                                            <td>{{ 'Rp ' . number_format($perencanaan->harga_satuan, 0, ',', '.') }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Pagu Anggaran') }}</td>
                                            {{-- format rupiah --}}
                                            <td>{{ 'Rp ' . number_format($perencanaan->pagu_anggaran, 0, ',', '.') }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Lokasi') }}</td>
                                            <td>{{ $perencanaan->lokasi }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Rencana Lelang') }}</td>
                                            <td>{{ isset($perencanaan->rencana_lelang) ? $perencanaan->rencana_lelang->format('M-Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Rencana Kontrak') }}</td>
                                            <td>{{ isset($perencanaan->rencana_kontrak) ? $perencanaan->rencana_kontrak->format('M-Y') : ''  }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Rencana Pengadaan') }}</td>
                                            <td>{{ isset($perencanaan->rencana_pengadaan) ? $perencanaan->rencana_pengadaan->format('M-Y') : ''  }}</td>
                                        </tr>
									{{-- <tr>
                                        <td class="fw-bold">{{ __('Dokumen') }}</td>
                                        <td>
                                            @if ($perencanaan->dokumen == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Dokumen"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/dokumens/' . $perencanaan->dokumen) }}" alt="Dokumen" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td class="fw-bold">{{ __('Dokumen') }}</td>
                                        <td>
                                            @if ($perencanaan->dokumen == null)
                                                <img src="https://via.placeholder.com/350?text=No+Image+Available" alt="Dokumen" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                @php
                                                    $dokumens = explode('|', $perencanaan->dokumen);
                                                @endphp
                                                @foreach ($dokumens as $dokumen)
                                                    <img src="{{ asset('storage/uploads/dokumens/' . $dokumen) }}" alt="Dokumen" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    
                                    {{-- <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $perencanaan->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $perencanaan->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr> --}}
                                </table>
                            </div>

                            <a href="{{ route('perencanaans.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
