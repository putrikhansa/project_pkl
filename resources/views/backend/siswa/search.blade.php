@forelse ($siswas as $siswa)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
        <td>{{ $siswa->jenis_kelamin }}</td>
        @if (auth()->user()->role === 'admin')
            <td>{{ $siswa->user->name ?? '-' }}</td> {{-- Nama petugas yg input --}}
        @endif
        <td>
            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus siswa ini?')">Hapus</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center">Tidak ada data ditemukan.</td>
    </tr>
@endforelse
