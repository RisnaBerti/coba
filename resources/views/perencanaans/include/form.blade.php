<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="sub-kegiatan">{{ __('Sub Kegiatan') }}</label>
            <select class="form-select @error('sub_kegiatan') is-invalid @enderror" name="sub_kegiatan" id="sub-kegiatan" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select sub kegiatan') }} --</option>
                <option value="Pembangunan Puskesmas" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Pembangunan Puskesmas' ? 'selected' : (old('sub_kegiatan') == 'Pembangunan Puskesmas' ? 'selected' : '') }}>Pembangunan Puskesmas</option>
		<option value="Rehabilitasi dan Pemeliharaan Puskesmas" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Rehabilitasi dan Pemeliharaan Puskesmas' ? 'selected' : (old('sub_kegiatan') == 'Rehabilitasi dan Pemeliharaan Puskesmas' ? 'selected' : '') }}>Rehabilitasi dan Pemeliharaan Puskesmas</option>
		<option value="Pengembangan Puskesmas" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Pengembangan Puskesmas' ? 'selected' : (old('sub_kegiatan') == 'Pengembangan Puskesmas' ? 'selected' : '') }}>Pengembangan Puskesmas</option>
		<option value="Pengembangan Fasilitas Kesehatan Lainnya" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Pengembangan Fasilitas Kesehatan Lainnya' ? 'selected' : (old('sub_kegiatan') == 'Pengembangan Fasilitas Kesehatan Lainnya' ? 'selected' : '') }}>Pengembangan Fasilitas Kesehatan Lainnya</option>
		<option value="Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasyankes" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasyankes' ? 'selected' : (old('sub_kegiatan') == 'Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasyankes' ? 'selected' : '') }}>Pengadaan Alat Kesehatan/Alat Penunjang Medik Fasyankes</option>
		<option value="Pemeliharaan Rutin Berkala Alat Kesehatan/Alat Penunjang Medik Fasyankes" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Pemeliharaan Rutin Berkala Alat Kesehatan/Alat Penunjang Medik Fasyankes' ? 'selected' : (old('sub_kegiatan') == 'Pemeliharaan Rutin Berkala Alat Kesehatan/Alat Penunjang Medik Fasyankes' ? 'selected' : '') }}>Pemeliharaan Rutin Berkala Alat Kesehatan/Alat Penunjang Medik Fasyankes</option>
		<option value="Rehabilitasi dan Pemeliharaan Fasilitas Kesehatan Lainnya" {{ isset($perencanaan) && $perencanaan->sub_kegiatan == 'Rehabilitasi dan Pemeliharaan Fasilitas Kesehatan Lainnya' ? 'selected' : (old('sub_kegiatan') == 'Rehabilitasi dan Pemeliharaan Fasilitas Kesehatan Lainnya' ? 'selected' : '') }}>Rehabilitasi dan Pemeliharaan Fasilitas Kesehatan Lainnya</option>			
            </select>
            @error('sub_kegiatan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis-pengadaan">{{ __('Jenis Pengadaan') }}</label>
            <select class="form-select @error('jenis_pengadaan') is-invalid @enderror" name="jenis_pengadaan" id="jenis-pengadaan" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select jenis pengadaan') }} --</option>
                <option value="Tender" {{ isset($perencanaan) && $perencanaan->jenis_pengadaan == 'Tender' ? 'selected' : (old('jenis_pengadaan') == 'Tender' ? 'selected' : '') }}>Tender</option>
		<option value="Non-Tender" {{ isset($perencanaan) && $perencanaan->jenis_pengadaan == 'Non-Tender' ? 'selected' : (old('jenis_pengadaan') == 'Non-Tender' ? 'selected' : '') }}>Non-Tender</option>
		<option value="E-Katalog" {{ isset($perencanaan) && $perencanaan->jenis_pengadaan == 'E-Katalog' ? 'selected' : (old('jenis_pengadaan') == 'E-Katalog' ? 'selected' : '') }}>E-Katalog</option>
		<option value="Penunjukan Langsung" {{ isset($perencanaan) && $perencanaan->jenis_pengadaan == 'Penunjukan Langsung' ? 'selected' : (old('jenis_pengadaan') == 'Penunjukan Langsung' ? 'selected' : '') }}>Penunjukan Langsung</option>			
            </select>
            @error('jenis_pengadaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
	<div class="col-md-6">
	<p>Jenis Pekerjaan</p>
        <div class="form-check mb-2">
            <input class="form-check-input @error('jenis_pekerjaan') is-invalid @enderror" type="radio" name="jenis_pekerjaan" id="konstruksi" value="Konstruksi" {{ isset($perencanaan) && $perencanaan->jenis_pekerjaan == 'Konstruksi' ? 'checked' : (old('jenis_pekerjaan') == 'Konstruksi' ? 'checked' : '') }} required>
            <label class="form-check-label" for="konstruksi">
                Konstruksi
            </label>
            @error('jenis_pekerjaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input @error('jenis_pekerjaan') is-invalid @enderror" type="radio" name="jenis_pekerjaan" id="non--konstruksi" value="Non-Konstruksi" {{ isset($perencanaan) && $perencanaan->jenis_pekerjaan == 'Non-Konstruksi' ? 'checked' : (old('jenis_pekerjaan') == 'Non-Konstruksi' ? 'checked' : '') }} required>
            <label class="form-check-label" for="non--konstruksi">
                Non-Konstruksi
            </label>
            @error('jenis_pekerjaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
	</div>
	<div class="col-md-6">
	<p>Sumber Dana</p>
        <div class="form-check mb-2">
            <input class="form-check-input @error('sumber_dana') is-invalid @enderror" type="radio" name="sumber_dana" id="a-p-b-d" value="APBD" {{ isset($perencanaan) && $perencanaan->sumber_dana == 'APBD' ? 'checked' : (old('sumber_dana') == 'APBD' ? 'checked' : '') }} required>
            <label class="form-check-label" for="a-p-b-d">
                APBD
            </label>
            @error('sumber_dana')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input @error('sumber_dana') is-invalid @enderror" type="radio" name="sumber_dana" id="d-a-k" value="DAK" {{ isset($perencanaan) && $perencanaan->sumber_dana == 'DAK' ? 'checked' : (old('sumber_dana') == 'DAK' ? 'checked' : '') }} required>
            <label class="form-check-label" for="d-a-k">
                DAK
            </label>
            @error('sumber_dana')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input @error('sumber_dana') is-invalid @enderror" type="radio" name="sumber_dana" id="b-a-n-k-e-u" value="BANKEU" {{ isset($perencanaan) && $perencanaan->sumber_dana == 'BANKEU' ? 'checked' : (old('sumber_dana') == 'BANKEU' ? 'checked' : '') }} required>
            <label class="form-check-label" for="b-a-n-k-e-u">
                BANKEU
            </label>
            @error('sumber_dana')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
	</div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama-pekerjaan">{{ __('Nama Pekerjaan') }}</label>
            <input type="text" name="nama_pekerjaan" id="nama-pekerjaan" class="form-control @error('nama_pekerjaan') is-invalid @enderror" value="{{ isset($perencanaan) ? $perencanaan->nama_pekerjaan : old('nama_pekerjaan') }}" placeholder="{{ __('Nama Pekerjaan') }}" required />
            @error('nama_pekerjaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="jumlah">{{ __('Jumlah') }}</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ isset($perencanaan) ? $perencanaan->jumlah : old('jumlah') }}" placeholder="{{ __('Jumlah') }}" required />
            @error('jumlah')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="satuan">{{ __('Satuan') }}</label>
            <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ isset($perencanaan) ? $perencanaan->satuan : old('satuan') }}" placeholder="{{ __('Satuan') }}" required />
            @error('satuan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="harga-satuan">{{ __('Harga Satuan') }}</label>
            <input type="number" name="harga_satuan" id="harga-satuan" class="form-control @error('harga_satuan') is-invalid @enderror" value="{{ isset($perencanaan) ? $perencanaan->harga_satuan : old('harga_satuan') }}" placeholder="{{ __('Harga Satuan') }}" required />
            @error('harga_satuan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="pagu-anggaran">{{ __('Pagu Anggaran') }}</label>
            <input type="number" name="pagu_anggaran" id="pagu-anggaran" class="form-control @error('pagu_anggaran') is-invalid @enderror" value="{{ isset($perencanaan) ? $perencanaan->pagu_anggaran : old('pagu_anggaran') }}" placeholder="{{ __('Pagu Anggaran') }}" required />
            @error('pagu_anggaran')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="lokasi">{{ __('Lokasi') }}</label>
            <select class="form-select @error('lokasi') is-invalid @enderror" name="lokasi" id="lokasi" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select lokasi') }} --</option>
                <option value="Daftar UPTD di Lingkup Dinas Kesehatan" {{ isset($perencanaan) && $perencanaan->lokasi == 'Daftar UPTD di Lingkup Dinas Kesehatan' ? 'selected' : (old('lokasi') == 'Daftar UPTD di Lingkup Dinas Kesehatan' ? 'selected' : '') }}>Daftar UPTD di Lingkup Dinas Kesehatan</option>
		<option value="Labkesda" {{ isset($perencanaan) && $perencanaan->lokasi == 'Labkesda' ? 'selected' : (old('lokasi') == 'Labkesda' ? 'selected' : '') }}>Labkesda</option>
		<option value="Farmasi" {{ isset($perencanaan) && $perencanaan->lokasi == 'Farmasi' ? 'selected' : (old('lokasi') == 'Farmasi' ? 'selected' : '') }}>Farmasi</option>
		<option value="Puskesmas" {{ isset($perencanaan) && $perencanaan->lokasi == 'Puskesmas' ? 'selected' : (old('lokasi') == 'Puskesmas' ? 'selected' : '') }}>Puskesmas</option>
		<option value="PSC" {{ isset($perencanaan) && $perencanaan->lokasi == 'PSC' ? 'selected' : (old('lokasi') == 'PSC' ? 'selected' : '') }}>PSC</option>			
            </select>
            @error('lokasi')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rencana-lelang">{{ __('Rencana Lelang') }}</label>
            <input type="month" name="rencana_lelang" id="rencana-lelang" class="form-control @error('rencana_lelang') is-invalid @enderror" value="{{ isset($perencanaan) && $perencanaan->rencana_lelang ? $perencanaan->rencana_lelang->format('Y-m') : old('rencana_lelang') }}" placeholder="{{ __('Rencana Lelang') }}" required />
            @error('rencana_lelang')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rencana-kontrak">{{ __('Rencana Kontrak') }}</label>
            <input type="month" name="rencana_kontrak" id="rencana-kontrak" class="form-control @error('rencana_kontrak') is-invalid @enderror" value="{{ isset($perencanaan) && $perencanaan->rencana_kontrak ? $perencanaan->rencana_kontrak->format('Y-m') : old('rencana_kontrak') }}" placeholder="{{ __('Rencana Kontrak') }}" required />
            @error('rencana_kontrak')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="rencana-pengadaan">{{ __('Rencana Pengadaan') }}</label>
            <input type="month" name="rencana_pengadaan" id="rencana-pengadaan" class="form-control @error('rencana_pengadaan') is-invalid @enderror" value="{{ isset($perencanaan) && $perencanaan->rencana_pengadaan ? $perencanaan->rencana_pengadaan->format('Y-m') : old('rencana_pengadaan') }}" placeholder="{{ __('Rencana Pengadaan') }}" required />
            @error('rencana_pengadaan')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    @isset($perencanaan)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($perencanaan->dokumen == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Dokumen" class="rounded mb-2 mt-2" alt="Dokumen" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/dokumens/' . $perencanaan->dokumen) }}" alt="Dokumen" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="dokumen">{{ __('Dokumen') }}</label>
                        <input type="file" name="dokumen" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen">
                        {{-- <div class="dz-message">
                            Drop files here or click to upload.
                        </div> --}}

                        @error('dokumen')
                          <span class="text-danger">
                                {{ $message }}
                           </span>
                        @enderror
                        <div id="dokumenHelpBlock" class="form-text">
                            {{ __('Leave the dokuman blank if you don`t want to change it.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- <div class="col-md-6">
            <div class="form-group">
                <label for="dokumen">{{ __('Dokumen') }}</label>
                <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen[]" multiple>
                <input type="file" name="dokumen" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen">

                @error('dokumen')
                   <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div> --}}
        {{-- <div class="col-md-6">
            <div class="form-group">
                <label for="dokumen">{{ __('Dokumen') }}</label>
                <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen[]" multiple>
                @error('dokumen')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>         --}}
        <div class="col-md-6">
            <div class="form-group">
                <label for="dokumen">{{ __('Dokumen') }}</label>
                {{-- <form action="{{ route('your.upload.route') }}" class="dropzone" id="my-awesome-dropzone">
                    @csrf
                    
                </form> --}}
                <div class="dz-message">
                    Drop files here or click to upload.
                </div>
                @error('dokumen')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        
    @endisset
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
</div>