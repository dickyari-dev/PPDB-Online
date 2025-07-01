@extends('layouts.app')


@section('content')
<div class="container mt-5 pt-5">
  <div class="row">
    <div class="alert alert-secondary" role="alert">
      Hallo {{ Auth::user()->name }}, Selamat Datang Di Website PPDB Online
    </div>
    @if (session('success'))
    <div
      style="padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 15px;">
      {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div
      style="padding: 10px; background-color: #f8d7da; color: #5f5c5d; border: 1px solid #f5c6cb; margin-bottom: 15px;">
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
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Status Pendaftaran</h5>

      <!-- Button trigger modal -->


      @if ($pendaftaran)
      <p class="card-text">Anda Sudah Melakukan Pendaftaran, Untuk Melihat Status Pendaftaran Anda Silahkan Klik tombol
        dibawah ini</p>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Lihat Status Pendaftaran
      </button>
      <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('student.pendaftaran.buktiPendaftaran') }}'">
        Download Bukti Pendaftaran
      </button>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <!-- ukuran lebih besar -->
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title" id="exampleModalLabel">Pengumuman Hasil Seleksi PPDB SMA</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <!-- Logo -->
                <div class="col-md-4 text-center align-self-center mb-3">
                  <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/1200px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png"
                    alt="Logo Kemdikbud" class="img-fluid" style="max-width: 200px;">
                </div>
                <!-- Info Peserta -->
                <div class="col-md-8">
                  <table class="table table-borderless">
                    <tr>
                      <th style="width: 150px;">Nomor Peserta</th>
                      <td>: 23 - 9999 - 010901</td>
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>: {{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                      <th>Tanggal Lahir</th>
                      <td>: {{ Auth::user()->studentRegistrations->first()->date_of_birth }}</td>
                    </tr>
                    <tr>
                      <td colspan="2" class="pt-4">
                        @if ($pendaftaran->status == 'pending')
                        <span class="badge bg-warning" style="font-size: 16px">Menunggu Verifikasi</span>
                        @elseif ($pendaftaran->status == 'rejected')
                        <span class="badge bg-danger">Ditolak</span>
                        @else
                       <p>Selamat Anda Dinyatakan <span class="badge bg-success">Lulus</span> Pendaftaran PPDB SMA </p>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Nama Sekolah</th>
                      <td>: SMA Negeri 1 Contoh Kota</td> <!-- Ganti sesuai data -->
                    </tr>
                    <tr>
                      <th>Jurusan</th>
                      <td>: MIPA / IPS / Bahasa</td> <!-- Bisa disesuaikan -->
                    </tr>
                    <tr>
                      <td colspan="2">
                        <small class="text-muted">Informasi pendaftaran ulang dan jadwal masuk dapat dilihat di <a
                            href="#">sini</a>.</small><br>
                        <small class="text-muted">Pastikan mencetak bukti kelulusan melalui akun PPDB
                          masing-masing.</small>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="pengumuman-ppdb.pdf" class="btn btn-success" target="_blank">Unduh Pengumuman Resmi (PDF)</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      @else
      <p class="card-text">Anda Belum Melakukan Pendaftaran, Untuk Melakukan Pendaftaran Silahkan Klik tombol dibawah
        ini</p>
      <a href="{{ route('student.pendaftaran') }}" class="btn btn-primary">Lakukan Pendaftaran</a>
      @endif


    </div>
  </div>
</div>


@endsection