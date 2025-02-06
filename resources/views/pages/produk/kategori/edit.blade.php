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
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST"
                            class="p-4 border rounded">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control"
                                    value="{{ $kategori->nama_kategori }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="variasi" class="form-label">Variasi</label>
                                <div id="variasi-container">
                                    <div class="variasi-group mb-2 d-flex">
                                        <select name="variasi_ids[]" class="form-select me-2" required>
                                            <option value="" disabled selected>Pilih Variasi</option>
                                            @foreach ($variasi as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $kategori->variasis->contains($item->id) ? 'selected' : '' }}>
                                                    {{ $item->nama_variasi }}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-danger remove-variasi"
                                            onclick="hapusVariasi(this)">-</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary mt-2"
                                    onclick="tambahVariasi()">+</button>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                    <script>
                        function tambahVariasi() {
                            let container = document.getElementById('variasi-container');
                            let newField = document.createElement('div');
                            newField.classList.add('variasi-group', 'mb-2', 'd-flex');

                            newField.innerHTML = `
                                <select name="variasi_ids[]" class="form-select me-2" required>
                                    <option value="" disabled selected>Pilih Variasi</option>
                                    @foreach ($variasi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_variasi }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-danger remove-variasi" onclick="hapusVariasi(this)">−</button>
                            `;

                            container.appendChild(newField);
                        }

                        function hapusVariasi(button) {
                            let container = document.getElementById('variasi-container');
                            if (container.children.length > 1) {
                                button.parentElement.remove();
                            }
                        }
                    </script>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
