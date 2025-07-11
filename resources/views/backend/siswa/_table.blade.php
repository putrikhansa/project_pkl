@foreach ($siswas as $data)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $data->nama }}</td>
    <td>{{ $data->kelas->nama_kelas ?? '-' }}</td>
    <td>{{ $data->jenis_kelamin }}</td>
    <td>
        <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-info btn-sm">Show</a>
        <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
        <form action="{{ route('siswa.destroy', $data->id) }}" method="POST" style="display:inline;"
            onsubmit="return confirm('yakin ingin menghapus siswa ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
