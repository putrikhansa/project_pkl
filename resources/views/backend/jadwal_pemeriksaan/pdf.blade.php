<!DOCTYPE html>
<html>

<head>
    <title>Laporan Jadwal Pemeriksaan</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #000;
            /* Paksa hitam pekat */
            line-height: 1.5;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }

        .info {
            font-size: 12px;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* Mencegah tabel meluber ke samping */
        }

        th {
            background-color: #eeeeee;
            color: #000;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            border: 1px solid #000;
            padding: 10px 5px;
        }

        td {
            font-size: 11px;
            border: 1px solid #000;
            padding: 8px 5px;
            color: #000 !important;
            word-wrap: break-word;
            /* Baris baru otomatis jika teks kepanjangan */
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Laporan Jadwal Pemeriksaan</h2>
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
                <th width="80px">Tanggal</th>
                <th width="80px">Kelas</th>
                <th width="120px">Petugas</th>
                <th>Keterangan / Agenda</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwal as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                    <td class="text-center font-bold">{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center" style="padding: 20px;">
                        Data tidak ditemukan untuk periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Opsional: Tambahkan info waktu cetak di pojok bawah --}}
    <div style="margin-top: 20px; font-size: 9px; text-align: right; font-style: italic;">
        Dicetak pada: {{ date('d/m/Y H:i') }}
    </div>
</body>

</html>
