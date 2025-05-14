@extends('layouts.app')

@section('content')
    <div class="card">
    <div class="card-body" style="background-color: #f5f5f5">
        <div class="container my-5 py-5">
            <div class="row">
                <div class="alert alert-secondary" role="alert">
                    Hallo {{ Auth::user()->name }}, Anda Sudah Melakukan Pendaftaran, Untuk Melakukan Perubahan Silahkan Isi
                </div>
                @if (session('success'))
                <div
                    style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div
                    style="padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                <div
                    style="padding: 10px; background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; margin-bottom: 15px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col">
                    <form action="{{ route('admin.pendaftaranupdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Data Pribadi --}}
                        <h5>Data Pribadi</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Nama Lengkap</label>
                                <input type="text" name="id" id="" value="{{ $check->id }}" hidden>
                                <input type="text" name="full_name"
                                    class="form-control @error('full_name') is-invalid @enderror"
                                    value="{{ $check->full_name }}" required>
                                @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                    value="{{ $check->nik }}" required>
                                @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>Tempat Lahir</label>
                                <input type="text" name="place_of_birth" class="form-control"
                                    value="{{ $check->place_of_birth }}" required>
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="date_of_birth" class="form-control"
                                    value="{{ $check->date_of_birth }}" required>
                            </div>
                            <div class="col-md-4">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="L" {{ $check->gender=='L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $check->gender=='P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <h5>Alamat</h5>
                        <div class="mb-3">
                            <label>Alamat Lengkap</label>
                            <textarea name="address" class="form-control" required>{{ $check->address }}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3"><input name="village" placeholder="Desa/Kelurahan"
                                    class="form-control" value="{{ $check->village }}" required></div>
                            <div class="col-md-3"><input name="district" placeholder="Kecamatan" class="form-control"
                                    value="{{ $check->district }}" required></div>
                            <div class="col-md-3"><input name="city" placeholder="Kota/Kabupaten" class="form-control"
                                    value="{{ $check->city }}" required></div>
                            <div class="col-md-3"><input name="province" placeholder="Provinsi" class="form-control"
                                    value="{{ $check->province }}" required></div>
                        </div>

                        {{-- Kontak --}}
                        <h5>Kontak</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>No. HP</label>
                                <input type="text" name="phone" class="form-control" value="{{ $check->phone }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $check->email }}"
                                    required>
                            </div>
                        </div>

                        {{-- Orang Tua --}}
                        <h5>Data Orang Tua</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Nama Ayah</label>
                                <input name="father_name" class="form-control" value="{{ $check->father_name }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Pekerjaan Ayah</label>
                                <input name="father_occupation" class="form-control"
                                    value="{{ $check->father_occupation }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Nama Ibu</label>
                                <input name="mother_name" class="form-control" value="{{ $check->mother_name }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Pekerjaan Ibu</label>
                                <input name="mother_occupation" class="form-control"
                                    value="{{ $check->mother_occupation }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Pendapatan Orang Tua</label>
                            <input type="number" name="parent_income" class="form-control"
                                value="{{ $check->parent_income }}" required>
                        </div>

                        {{-- Sekolah Asal --}}
                        <h5>Sekolah Asal</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>Nama Sekolah</label>
                                <input name="previous_school" class="form-control" value="{{ $check->previous_school }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Alamat Sekolah</label>
                                <input name="school_address" class="form-control" value="{{ $check->school_address }}"
                                    required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>NPSN Sekolah</label>
                            <input name="school_npsn" class="form-control" value="{{ $check->school_npsn }}" required>
                        </div>

                        {{-- Submit --}}
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection