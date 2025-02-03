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
                        <h2>Edit Distributor</h2>

                        <form action="{{ route('distributor.update', $distributor->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_distributor" class="form-label">Nama Distributor</label>
                                <input type="text" name="nama_distributor" id="nama_distributor" class="form-control"
                                    value="{{ $distributor->nama_distributor }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control"
                                    accept="image/*">
                                @if ($distributor->logo)
                                    <img src="{{ asset('storage/' . $distributor->logo) }}" alt="Logo"
                                        class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" required>{{ $distributor->alamat }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ $distributor->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control"
                                    value="{{ $distributor->no_telepon }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
