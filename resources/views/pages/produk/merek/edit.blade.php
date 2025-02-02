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

                        <div class="card mb-4">
                            <div class="card-header">Edit Merek</div>
                            <div class="card-body">
                                <form action="{{ route('merek.update', $merek->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="edit_nama_merek" class="form-label">Nama Merek</label>
                                        <input type="text" class="form-control" id="edit_nama_merek"
                                            name="nama_merek" value="{{ $merek->nama_merek }}" required>
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
