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
                        <h2 class="mb-4">Daftar Produk</h2>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('list-produk.create') }}" class="btn btn-primary">Tambah Produk</a>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama produk</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Merek</th>
                                    {{-- <th>Variasi</th> --}}
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td>{{ $produk->id }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->kategori->nama_kategori }}</td>
                                        <td> {{ $produk->stok }} </td>
                                        <td> {{ $produk->satuan->nama_satuan }} </td>
                                        <td>{{ $produk->merek->nama_merek }}</td>
                                        {{-- <td>
                                            <ul>
                                                @foreach ($produk->kategori['variasi'] as $variasi)
                                                    @php
                                                        $opsi = json_decode($variasi['opsi'], true);
                                                    @endphp
                                                    @foreach ($opsi as $o)
                                                        <li>{{ $o }}</li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </td> --}}
                                        <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('list-produk.show', $produk->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('list-produk.destroy', $produk->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
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
