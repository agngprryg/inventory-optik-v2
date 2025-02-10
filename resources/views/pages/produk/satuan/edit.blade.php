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

                        <div class="card mb-4">
                            <div class="card-header">Edit Satuan</div>
                            <div class="card-body">
                                <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="edit_nama_satuan" class="form-label">Nama Satuan</label>
                                        <input type="text" class="form-control" id="edit_nama_satuan"
                                            name="nama_satuan" value="{{ $satuan->nama_satuan }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select type="text" class="form-control" id="status"
                                            name="status"required>
                                            <option value="aktif" {{ $satuan->status == 'aktif' ? 'selected' : '' }}>
                                                Aktif</option>
                                            <option value="nonaktif"
                                                {{ $satuan->status == 'nonaktif' ? 'selected' : '' }}>Non Aktif
                                            </option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
