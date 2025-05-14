@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-body">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12">
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
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Asal Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendaftars as $index => $siswa)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $siswa->full_name }}</td>
                                    <td>{{ $siswa->nik }}</td>
                                    <td>{{ $siswa->date_of_birth }}</td>
                                    <td>{{ $siswa->previous_school }}</td>
                                    <td>
                                        <a href="{{ route('admin.pendaftar.show', $siswa->id) }}"
                                            class="btn btn-sm btn-info">Detail</a>
                                        <a href="{{ route('admin.pendaftar.edit', $siswa->id) }}"
                                            class="btn btn-sm btn-warning">Update</a>
                                        <a href="{{ route('admin.pendaftar.delete', $siswa->id) }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada pendaftaran.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection