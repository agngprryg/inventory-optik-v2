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
                        <form action="{{ route('cabang.update', $cabang->id) }}" method="POST" class="p-4 border rounded"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_cabang" class="form-label">Nama Cabang</label>
                                <input type="text" id="nama_cabang" name="nama_cabang" class="form-control"
                                    value="{{ $cabang->nama_cabang }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="manager" class="form-label">manager</label>
                                <select type="text" id="manager" name="id_manager" class="form-control" required>
                                    <option selected disabled>-- Pilih Manager --</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}"
                                            {{ $manager->id == $cabang->id_manager ? 'selected' : '' }}>
                                            {{ $manager->nama_manager }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" id="no_telepon" name="no_telepon" class="form-control"
                                    value="{{ $cabang->no_telepon }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    value="{{ $cabang->alamat }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">status</label>
                                <select type="text" id="status" name="status" class="form-control" required>
                                    <option selected disabled>-- pilih status --</option>
                                    <option value="aktif" {{ $cabang->status == 'aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="nonaktif" {{ $cabang->status == 'nonaktif' ? 'selected' : '' }}>
                                        NonAktif</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
