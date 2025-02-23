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
                        <form action="{{ route('manager.update', $manager->id) }}" method="POST"
                            class="p-4 border rounded" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_manager" class="form-label">Nama Manager</label>
                                <input type="text" id="nama_manager" name="nama_manager" class="form-control"
                                    value="{{ $manager->nama_manager }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control"
                                    accept="image/*">
                                @if ($manager->foto)
                                    <img src="{{ asset('storage/' . $manager->foto) }}" alt="Logo"
                                        class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" id="no_telepon" name="no_telepon" class="form-control"
                                    value="{{ $manager->no_telepon }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    value="{{ $manager->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    value="{{ $manager->alamat }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
