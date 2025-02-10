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
                        <form action="{{ route('list-produk.update', $produk->id) }}" method="POST"
                            class="p-4 border rounded">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" id="nama_produk" name="nama_produk" class="form-control"
                                    value="{{ $produk->nama_produk }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="merek" class="form-label">Brand/Merek</label>
                                <select type="text" id="merek" name="id_merek" class="form-control" required>

                                    @foreach ($mereks as $merek)
                                        <option value="{{ $merek->id }}"
                                            {{ $merek->id == $produk->id_merek ? 'selected' : '' }}>
                                            {{ $merek->nama_merek }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select type="text" id="kategori" name="id_kategori" class="form-control" required>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $produk->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" id="catatan" name="catatan" class="form-control"
                                    value="{{ $produk->catatan }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" id="harga" name="harga" class="form-control"
                                        value="{{ number_format($produk->harga, 0, ',', '.') }}" required>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <select type="text" id="satuan" name="id_satuan" class="form-control" required>
                                    @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->id }}"
                                            {{ $satuan->id == $produk->id_satuan ? 'selected' : '' }}>
                                            {{ $satuan->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="distributor" class="form-label">Distributor</label>
                                <select type="text" id="distributor" name="id_distributor" class="form-control"
                                    required>
                                    <option selected disabled>-- Pilih Distributor --</option>
                                    @foreach ($distributors as $distributor)
                                        <option value="{{ $distributor->id }}"
                                            {{ $distributor->id == $produk->id_distributor ? 'selected' : '' }}>
                                            {{ $distributor->nama_distributor }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" id="stok" name="stok" class="form-control"
                                    value="{{ $produk->stok }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
