@extends('layouts.master')

@section('title')
    Tanya Jawab - TanyaLaraAja
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card m-2 p-4">
            @auth
                <a class="btn btn-primary w-25" href="#" data-bs-toggle="modal" data-bs-target="#addTanya">
                    <span class="material-icons"> add_circle_outline </span>
                    Tambahkan
                </a>
            @endauth
            <div class="input-group input-group-static mb-4">
                <select class="form-control" name="version_id" id="version_id" onchange="filterCards()">
                    <option value="all">-- Semua Versi --</option>
                    @foreach ($versions as $versi)
                        <option value="card-{{ $versi->id }}" id="{{ $versi->id }}">{{ $versi->name }}</option>
                    @endforeach
                </select>
            </div>
            <h2 class="title fs-3">List Pertanyaan <span class="material-icons"> contact_support </span></h2>
            <!-- Cards -->
            <div class="row row-cols-1 row-cols-md-3 g-4 py-3">
                @foreach ($questions as $question)
                    <div class="col" id="card-{{ $question->version_id }}">
                        <div class="card">
                            <img src="{{ asset('tanyaImage/' . $question->image) }}" class="card-img-top" alt="error-pic" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $question->title }}</h5>
                                <p class="fs-6 writer">{{ $question->user->username }}</p>
                                <p class="btn btn-outline-primary btn-sm">{{ $question->version->name }}</p>
                                <div class="flex-row">
                                    <a class="btn btn-sm btn-info" href="/tanyajawab/{{ $question->id }}"><span
                                            class="material-icons"> launch
                                        </span>
                                        Detail</a>
                                    @if (Auth::id() == $question->users_id)
                                        <a class="btn btn-sm btn-warning" href="#" data-bs-toggle="modal"
                                            data-bs-target="#editTanya{{ $question->id }}"> <span class="material-icons">
                                                edit_note
                                            </span>Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteTanya{{ $question->id }}"><span class="material-icons">
                                                delete
                                            </span></a>

                                        {{-- Modal Edit Pertanyaan --}}
                                        <div class="modal fade" id="editTanya{{ $question->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update
                                                            Pertanyaan Anda 👩‍💻</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/tanyajawab/{{ $question->id }}/update" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="input-group input-group-static mb-4">
                                                                <label>Judul Masalah</label>
                                                                <input type="text" name="title"
                                                                    value="{{ $question->title }}" class="form-control" />
                                                            </div>
                                                            <label>Deskripsi Masalah</label>
                                                            <textarea class="form-control" name="content" id="content" cols="100" rows="3">{{ $question->content }}</textarea>
                                                            <br>
                                                            <div class="input-group input-group-static mb-4">
                                                                <label class="ms-0">Versi Laravel</label>
                                                                <select class="form-control" name="version_id"
                                                                    id="version_id">
                                                                    <option selected disabled>-- Pilih Versi --</option>
                                                                    @foreach ($versions as $versi)
                                                                        <option value="{{ $versi->id }}"
                                                                            @if ($versi->id === $question->version_id) selected @endif>
                                                                            {{ $versi->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label>Kirim Foto (Kosongkan jika foto sama dengan yang
                                                                    sebelumnya)</label>
                                                                <br />
                                                                <input class="input-file-normal" type="file"
                                                                    name="image" id="image" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal Hapus --}}
                                        <div class="modal fade" id="deleteTanya{{ $question->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">PERINGATANN!!
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="/tanyajawab/{{ $question->id }}/delete" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-body">
                                                            Apakah Anda Yakin Ingin Menghapus Pertanyaan Anda? Hal ini
                                                            tidak dapat di pulihkan
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <footer class="footer py-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-4 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            | Created By Kelompok 7 | Batch 47 Sanber Laravel 👩‍💻
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Modals Add Tanya -->
    <div class="modal fade" id="addTanya" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Menambahkan Pertanyaan 👩‍💻</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/tanyajawab/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group input-group-static mb-4">
                            <label>Judul Masalah</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <label>Deskripsi Masalah</label>
                        <textarea class="form-control" name="content" id="content" cols="100" rows="3"></textarea>
                        <br>
                        <div class="input-group input-group-static mb-4">
                            <label class="ms-0">Versi Laravel</label>
                            <select class="form-control" name="version_id" id="version_id">
                                <option selected disabled>-- Pilih Versi --</option>
                                @foreach ($versions as $versi)
                                    <option value="{{ $versi->id }}">{{ $versi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label>Kirim Foto | max: 2 mb</label>
                            <br />
                            <input class="input-file-normal" type="file" name="image" id="image" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- kalau perlu input css baru sama js baru tinggal aktifin aja script di bawah --}}

{{-- @push('styles')

@endpush --}}

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/5gorw5nx4zw5j4viyd3rjucdwe1xqqwublsayv3cd879rzso/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/swal.min.js') }}"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 3000, // Pesan akan hilang setelah 3 detik
                showConfirmButton: false // Tidak menampilkan tombol OK
            });
        </script>
    @endif
    <script>
        tinymce.init({
            selector: 'textarea',
        });

        // Ambil nilai versi dari URL (misalnya menggunakan query parameter 'versi')
        var urlParams = new URLSearchParams(window.location.search);
        var selectedVersi = urlParams.get('versi');

        if (selectedVersi) {
            // Cari elemen option yang memiliki value sesuai dengan variable versi
            var optionToSelect = document.querySelector('#version_id option[value="card-' + selectedVersi + '"]');

            // Berikan atribut 'selected' pada elemen option yang ditemukan
            if (optionToSelect) {
                optionToSelect.setAttribute('selected', 'selected');
            }
            filterCards();
        }

        function filterCards() {
            var selectedVersion = document.getElementById('version_id').value;
            var cards = document.querySelectorAll('[id*="card-"]');

            cards.forEach(function(card) {
                if (selectedVersion === 'all' || card.id === selectedVersion) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
@endpush
