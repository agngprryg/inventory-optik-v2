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
                        <h2 class="mb-4">Daftar Distributor</h2>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Nama Distributor</th>
                                    <th>No Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distributors as $distributor)
                                    <tr>
                                        <td>{{ $distributor->id }}</td>
                                        <td>
                                            @if ($distributor->logo)
                                                <img src="{{ asset('storage/' . $distributor->logo) }}" alt="Logo"
                                                    width="50">
                                            @else
                                                <span class="text-muted">Tidak ada logo</span>
                                            @endif
                                        </td>
                                        <td>{{ $distributor->nama_distributor }}</td>
                                        <td>{{ $distributor->no_telepon }}</td>
                                        <td>{{ $distributor->email }}</td>
                                        <td>{{ $distributor->alamat }}</td>
                                        <td>
                                            <a href="{{ route('distributor.show', $distributor->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('distributor.destroy', $distributor->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus distributor ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <a href="{{ route('distributor.create') }}" class="btn btn-primary">Tambah Produk</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
