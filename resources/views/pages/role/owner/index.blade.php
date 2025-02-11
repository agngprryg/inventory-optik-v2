<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card   rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-2">Halo, selamat Datang</h3>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <h2 class="mb-4">Data Owner</h2>


                        <div class="mb-4">
                            <a href="{{ route('owner.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama Owner</th>
                                    <th>No Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($owners as $owner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (!$owner->foto)
                                                <p>tidak ada foto</p>
                                            @else
                                                <img src="{{ asset('storage/' . $owner->foto) }}" alt="Foto"
                                                    class="img-thumbnail" width="80">
                                            @endif
                                        </td>
                                        <td>{{ $owner->nama_owner }}</td>
                                        <td>{{ $owner->no_telepon }}</td>
                                        <td>{{ $owner->email }}</td>
                                        <td>{{ $owner->alamat }}</td>
                                        <td>
                                            <a href="{{ route('owner.show', $owner->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('owner.destroy', $owner->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
