<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perencanaans';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['sub_kegiatan', 'jenis_pengadaan', 'jenis_pekerjaan', 'sumber_dana', 'nama_pekerjaan', 'jumlah', 'satuan', 'harga_satuan', 'pagu_anggaran', 'lokasi', 'rencana_lelang', 'rencana_kontrak', 'rencana_pengadaan', 'dokumen'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['nama_pekerjaan' => 'string', 'jumlah' => 'integer', 'satuan' => 'string', 'rencana_lelang' => 'date:m/Y', 'rencana_kontrak' => 'date:m/Y', 'rencana_pengadaan' => 'date:m/Y', 'dokumen' => 'string', 'created_at' => 'datetime:d/m/Y H:i', 'updated_at' => 'datetime:d/m/Y H:i'];
    

}
