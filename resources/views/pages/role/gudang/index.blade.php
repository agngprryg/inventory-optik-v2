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
                        <h2 class="mb-4">Data Gudang</h2>


                        <div class="mb-4">
                            <a href="{{ route('gudang.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Gudang</th>
                                    <th>Manager</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gudangs as $gudang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gudang->nama_gudang }}</td>
                                        <td>{{ $gudang->manager->nama_manager }}</td>
                                        <td>{{ $gudang->no_telepon }}</td>
                                        <td>{{ $gudang->alamat }}</td>
                                        <td>{{ $gudang->status }}</td>
                                        <td>
                                            <a href="{{ route('gudang.show', $gudang->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('gudang.destroy', $gudang->id) }}" method="POST"
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
