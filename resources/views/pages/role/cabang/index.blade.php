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
                        <h2 class="mb-4">Data Cabang</h2>


                        <div class="mb-4">
                            <a href="{{ route('cabang.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Cabang</th>
                                    <th>Manager</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabangs as $cabang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cabang->nama_cabang }}</td>
                                        <td>{{ $cabang->manager->nama_manager }}</td>
                                        <td>{{ $cabang->no_telepon }}</td>
                                        <td>{{ $cabang->alamat }}</td>
                                        <td>{{ $cabang->status }}</td>
                                        <td>
                                            <a href="{{ route('cabang.show', $cabang->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('cabang.destroy', $cabang->id) }}" method="POST"
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
