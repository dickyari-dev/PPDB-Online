<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengumuman Kelulusan PPDB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #000;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
            margin-bottom: 10px;
        }

        h2 {
            margin: 5px 0;
        }

        .content {
            margin-top: 20px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table th {
            text-align: left;
            width: 180px;
            padding: 4px 0;
        }

        .info-table td {
            padding: 4px 0;
        }

        .status {
            margin: 20px 0;
            font-size: 16px;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .bg-success {
            background-color: green;
        }

        .bg-warning {
            background-color: orange;
        }

        .bg-danger {
            background-color: red;
        }

        .footer-note {
            font-size: 12px;
            color: #555;
        }

        .download-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('assets/images/logo-kemdikbud.png') }}" alt="Logo Kemdikbud" class="logo" style="width: 200px; height: 200px; object-fit: cover;">

        <h2>Pengumuman Hasil Seleksi PPDB SMA</h2>
        <p>Tahun Ajaran 2025</p>
    </div>

    <div class="content">
        <table class="info-table">
            <tr>
                <th>Nomor Peserta</th>
                <td>: 23 - 072025 - {{ Auth::user()->studentRegistrations->first()->id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>: {{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>: {{ Auth::user()->studentRegistrations->first()->date_of_birth }}</td>
            </tr>
        </table>

        <div class="status">
            @if ($pendaftaran->status == 'pending')
            <span class="badge bg-warning">Menunggu Verifikasi</span>
            @elseif ($pendaftaran->status == 'rejected')
            <span class="badge bg-danger">Ditolak</span>
            @else
            <p>Selamat! Anda dinyatakan <span class="badge bg-success">LULUS</span> Pendaftaran PPDB SMA.</p>
            @endif
        </div>

        <table class="info-table">
            <tr>
                <th>Nama Sekolah</th>
                <td>: SMA Negeri 1 Contoh Kota</td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td>: MIPA</td>
            </tr>
        </table>

        <p class="footer-note">
            Informasi pendaftaran ulang dan jadwal masuk dapat dilihat di situs resmi PPDB atau pengumuman sekolah.
            <br>
            Pastikan Anda mencetak dan menyimpan bukti kelulusan ini sebagai arsip.
        </p>
    </div>
</body>

</html>