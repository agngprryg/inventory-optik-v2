< <x-app-layout :assets="$assets ?? []">
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
                        <h2>Edit Variasi</h2>
                        <form action="{{ route('variasi.update', $variasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_variasi" class="form-label">Nama Variasi</label>
                                <input type="text" id="nama_variasi" name="nama_variasi" class="form-control"
                                    value="{{ $variasi->nama_variasi }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipe" class="form-label">Tipe</label>
                                <select id="tipe" name="tipe" class="form-select" required
                                    onchange="toggleOpsi()">
                                    <option value="Pilihan" {{ $variasi->tipe == 'Pilihan' ? 'selected' : '' }}>Pilihan
                                        (Opsi)</option>
                                    <option value="Isian" {{ $variasi->tipe == 'Isian' ? 'selected' : '' }}>Isian
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3" id="opsi-container">
                                <label for="opsi" class="form-label">Opsi</label>
                                <div id="opsi-fields">
                                    @if ($variasi->opsi)
                                        @foreach ($variasi->opsi as $opsi)
                                            <input type="text" name="opsi[]" class="form-control mb-2"
                                                value="{{ $opsi }}">
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="tambahOpsi()">+</button>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('variasi.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>

                    <script>
                        function tambahOpsi() {
                            let container = document.getElementById('opsi-fields');
                            let input = document.createElement('input');
                            input.type = 'text';
                            input.name = 'opsi[]';
                            input.classList.add('form-control', 'mb-2');
                            container.appendChild(input);
                        }

                        function toggleOpsi() {
                            let tipe = document.getElementById('tipe').value;
                            let opsiContainer = document.getElementById('opsi-container');

                            if (tipe === 'Isian') {
                                opsiContainer.style.display = 'none';
                            } else {
                                opsiContainer.style.display = 'block';
                            }
                        }

                        document.addEventListener("DOMContentLoaded", toggleOpsi);
                    </script>

                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
