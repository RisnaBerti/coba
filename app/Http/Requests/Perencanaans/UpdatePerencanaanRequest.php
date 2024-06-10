<?php

namespace App\Http\Requests\Perencanaans;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerencanaanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'sub_kegiatan' => 'required|in:Pembangunan Puskesmas,Rehabilitasi dan Pemeliharaan Puskesmas,Pengembangan Puskesmas,Pengembangan Fasilitas Kesehatan Lainnya,Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasyankes,Pemeliharaan Rutin Berkala Alat Kesehatan/Alat Penunjang Medik Fasyankes,Rehabilitasi dan Pemeliharaan Fasilitas Kesehatan Lainnya',
			'jenis_pengadaan' => 'required|in:Tender,Non-Tender,E-Katalog,Penunjukan Langsung',
			'jenis_pekerjaan' => 'required|in:Konstruksi,Non-Konstruksi',
			'sumber_dana' => 'required|in:APBD,DAK,BANKEU',
			'nama_pekerjaan' => 'required|string|max:50',
			'jumlah' => 'required|numeric',
			'satuan' => 'required|string|max:25',
			'harga_satuan' => 'required|numeric',
			'pagu_anggaran' => 'required|numeric',
			'lokasi' => 'required|in:Daftar UPTD di Lingkup Dinas Kesehatan,Labkesda,Farmasi,Puskesmas,PSC',
			'rencana_lelang' => 'required',
			'rencana_kontrak' => 'required',
			'rencana_pengadaan' => 'required',
			// 'dokumen' => 'nullable|mimes:pdf|max:25000',
            'dokumen.*' => 'nullable|mimes:pdf|max:25000',
        ];
    }
}
