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
                        <h2 class="my-4">Daftar Variasi Produk</h2>
                        <a href="{{ route('variasi.create') }}" class="btn btn-primary mb-3">Tambah Variasi
                            Produk</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Variasi</th>
                                    <th>Tipe</th>
                                    <th>Opsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variasis as $variasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $variasi->nama_variasi }}</td>
                                        <td>{{ $variasi->tipe }}</td>
                                        <td>
                                            @if ($variasi->opsi)
                                                <ul>
                                                    @foreach (json_decode($variasi->opsi) as $opsi)
                                                        <li>{{ $opsi }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                Tidak ada opsi
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('variasi.show', $variasi->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('variasi.destroy', $variasi->id) }}" method="POST"
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
