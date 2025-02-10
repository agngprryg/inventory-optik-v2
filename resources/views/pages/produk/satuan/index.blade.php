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


                    <div class="container mt-5">
                        <h2 class="mb-4">Daftar Satuan</h2>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="card mb-4">
                            <div class="card-header">Tambah Satuan</div>
                            <div class="card-body">
                                <form action="{{ route('satuan.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_satuan" class="form-label">Nama Satuan</label>
                                        <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="" class="form-select">
                                            <option value="aktif">aktif</option>
                                            <option value="nonaktif">nonaktif</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama satuan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($satuans as $satuan)
                                    <tr>
                                        <td>{{ $satuan->id }}</td>
                                        <td>{{ $satuan->nama_satuan }}</td>
                                        <td>{{ $satuan->status }}</td>
                                        <td>
                                            <a href="{{ route('satuan.show', $satuan->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('satuan.destroy', $satuan->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus satuan ini?')">Hapus</button>
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
