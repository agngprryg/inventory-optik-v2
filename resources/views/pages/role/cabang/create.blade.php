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
                        <form action="{{ route('cabang.store') }}" method="POST" class="p-4 border rounded"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_cabang" class="form-label">Nama cabang</label>
                                <input type="text" id="nama_cabang" name="nama_cabang" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="manager" class="form-label">manager</label>
                                <select type="text" id="manager" name="id_manager" class="form-control" required>
                                    <option selected disabled>-- Pilih Manager --</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->nama_manager }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" id="no_telepon" name="no_telepon" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">status</label>
                                <select type="text" id="status" name="status" class="form-control" required>
                                    <option selected disabled>-- pilih status --</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">NonAktif</option>
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
