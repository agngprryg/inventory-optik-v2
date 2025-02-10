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

                    <div class="container">
                        <h2 class="my-4">Daftar Kategori Produk</h2>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori
                            Produk</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Variasi</th>
                                    <th>Opsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $kategori->nama_kategori }} </td>
                                        <td>
                                            @if ($kategori->variasi->isEmpty())
                                                <span>Tidak ada variasi</span>
                                            @else
                                                <ul>
                                                    @foreach ($kategori->variasi as $variasi)
                                                        <li>{{ $variasi->nama_variasi }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($kategori->variasi->isEmpty())
                                                tidak ada Opsi
                                            @else
                                                <ul>
                                                    @foreach (json_decode($kategori->variasi) as $opsi)
                                                        <li>{{ $opsi->opsi }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('kategori.show', $kategori->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
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
