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
                        <h2 class="mb-4">Daftar Merek</h2>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="card mb-4">
                            <div class="card-header">Tambah Merek</div>
                            <div class="card-body">
                                <form action="{{ route('merek.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_merek" class="form-label">Nama Merek</label>
                                        <input type="text" class="form-control" id="nama_merek" name="nama_merek"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Merek</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mereks as $merek)
                                    <tr>
                                        <td>{{ $merek->id }}</td>
                                        <td>{{ $merek->nama_merek }}</td>
                                        <td>
                                            <a href="{{ route('merek.show', $merek->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('merek.destroy', $merek->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus merek ini?')">Hapus</button>
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
