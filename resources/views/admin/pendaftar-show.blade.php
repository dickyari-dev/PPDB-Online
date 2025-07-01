@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5">
    <h3 class="mb-4">📄 Detail Pendaftaran Siswa </h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-3">{{ $siswa->full_name }} - <span class="badge bg-info">@if ($siswa->status ==
                            'pending') Menunggu Verifikasi @elseif ($siswa->status == 'rejected') Ditolak @else Lulus
                            @endif</span></h4>
                    <span class="badge bg-secondary">{{ $siswa->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                    <span class="badge bg-info text-dark">NIK: {{ $siswa->nik }}</span>
                    <span class="badge bg-light text-dark">Tanggal Lahir: {{
                        \Carbon\Carbon::parse($siswa->date_of_birth)->translatedFormat('d F Y') }}</span>
                </div>
                <div class="col-6">
                    <!-- Button trigger modal -->

                    <!-- Modal -->

                    <button class="btn btn-success float-end me-2" data-bs-toggle="modal"
                        data-bs-target="#modalLulus"><i class="fas fa-info"></i> Tandai Diterima</button>
                    <div class="modal fade" id="modalLulus" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menandai siswa ini sebagai Diterima?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('admin.pendaftar.lulus', $siswa->id) }}"
                                        class="btn btn-success">Konfirmasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger float-end me-2" data-bs-toggle="modal"
                        data-bs-target="#modalGagal"><i class="fas fa-info"></i> Tandai Gagal</button>
                    <div class="modal fade" id="modalGagal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menandai siswa ini sebagai Gagal?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('admin.pendaftar.gagal', $siswa->id) }}"
                                        class="btn btn-danger">Konfirmasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-group mt-4">
        {{-- Data Pribadi --}}
        <div class="card">
            <div class="card-header bg-primary text-white">📌 Data Pribadi</div>
            <div class="card-body">
                <p><strong>Tempat Lahir:</strong> {{ $siswa->place_of_birth }}</p>
                <p><strong>No. HP:</strong> {{ $siswa->phone }}</p>
                <p><strong>Email:</strong> {{ $siswa->email }}</p>
            </div>
        </div>

        {{-- Alamat --}}
        <div class="card">
            <div class="card-header bg-success text-white">📍 Alamat</div>
            <div class="card-body">
                <p><strong>Alamat:</strong> {{ $siswa->address }}</p>
                <p><strong>Desa/Kelurahan:</strong> {{ $siswa->village }}</p>
                <p><strong>Kecamatan:</strong> {{ $siswa->district }}</p>
                <p><strong>Kota/Kabupaten:</strong> {{ $siswa->city }}</p>
                <p><strong>Provinsi:</strong> {{ $siswa->province }}</p>
            </div>
        </div>
    </div>

    <div class="card-group mt-4">
        {{-- Orang Tua --}}
        <div class="card">
            <div class="card-header bg-warning">👨‍👩‍👧 Orang Tua</div>
            <div class="card-body">
                <p><strong>Nama Ayah:</strong> {{ $siswa->father_name }}</p>
                <p><strong>Pekerjaan Ayah:</strong> {{ $siswa->father_occupation }}</p>
                <hr>
                <p><strong>Nama Ibu:</strong> {{ $siswa->mother_name }}</p>
                <p><strong>Pekerjaan Ibu:</strong> {{ $siswa->mother_occupation }}</p>
                <p><strong>Pendapatan Orang Tua:</strong> Rp{{ number_format($siswa->parent_income, 0, ',', '.') }}</p>
            </div>
        </div>

        {{-- Sekolah Asal --}}
        <div class="card">
            <div class="card-header bg-dark text-white">🏫 Sekolah Asal</div>
            <div class="card-body">
                <p><strong>Nama Sekolah:</strong> {{ $siswa->previous_school }}</p>
                <p><strong>Alamat Sekolah:</strong> {{ $siswa->school_address }}</p>
                <p><strong>NPSN:</strong> {{ $siswa->school_npsn }}</p>
            </div>
        </div>
    </div>

    <div class="mt-4 text-end">
        <a href="{{ route('admin.dataPendaftar') }}" class="btn btn-secondary">⬅️ Kembali</a>
        <a href="{{ route('admin.pendaftar.edit', $siswa->id) }}" class="btn btn-warning">✏️ Edit</a>
    </div>
</div>
@endsection