<!DOCTYPE html>
<html>

<head>
    <title>Laporan Rekam Medis</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #444;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            text-transform: uppercase;
            color: #000;
        }

        .info {
            font-size: 13px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* Biar tabel gak lari ke samping */
        }

        th {
            background-color: #f2f2f2;
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
            border: 1px solid #999;
            padding: 10px 5px;
        }

        td {
            font-size: 11px;
            border: 1px solid #999;
            padding: 8px 5px;
            word-wrap: break-word;
            /* Biar teks panjang gak kepotong */
            color: #000 !important;
            /* Paksa hitam biar jelas pas di print */
        }

        .text-center {
            text-align: center;
        }

        .status-badge {
            padding: 3px 6px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 10px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Laporan Rekam Medis</h2>
        <div class="info">
            Periode: <strong>{{ \Carbon\Carbon::parse($awal)->format('d/m/Y') }}</strong>
            s/d
            <strong>{{ \Carbon\Carbon::parse($akhir)->format('d/m/Y') }}</strong>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="30px">No</th>
                <th width="100px">Nama Siswa</th>
                <th width="60px">Kelas</th>
                <th width="80px">Tanggal</th>
                <th>Keluhan</th>
                <th width="80px">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekamMedis as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td><strong>{{ $data->siswa->nama }}</strong></td>
                    <td class="text-center">{{ $data->siswa->kelas->nama_kelas ?? '-' }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y') }}</td>
                    <td>{{ $data->keluhan }}</td>
                    <td class="text-center">
                        {{ ucfirst($data->status) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 20px;">Tidak ada data ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
