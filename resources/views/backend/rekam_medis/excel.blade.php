<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Keluhan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekamMedis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->siswa->nama }}</td>
                <td>{{ $item->siswa->kelas->nama_kelas }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->keluhan }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
