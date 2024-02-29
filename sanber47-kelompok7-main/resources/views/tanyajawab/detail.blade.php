@extends('layouts.master')

@section('title')
    Detail Pertanyaan - TanyaLaraAja
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card m-2 p-4">
            <p class="btn btn-outline-primary btn-sm w-15">{{ $question->version->name }}</p>
            <h1 class="title-question fs-2 text-center">{{ $question->title }}</h1>
            <p class="time-info text-center">
                {{ Carbon\Carbon::parse($question->created_at)->format('d M Y H:i') }}
            </p>
            <a class="writer-question btn btn-primary btn-sm"><span class="material-icons"> account_circle </span>
                {{ $question->user->username }}</a>
            <img src="{{ asset('tanyaImage/' . $question->image) }}" class="card-img-top rounded-3" alt="error-pic-detail" />
            <h4 class="mt-3 text-center">Deskripsi</h4>
            <p class="my-3 text-break">{!! $question->content !!}</p>

            {{-- <center>DESKRIPSI</center>
                <textarea class="form-control" name="content" id="content" cols="100" rows="3">{{ $question->content }}</textarea> --}}
        </div>
        <!-- Answers Section | Bagian Komentar/Jawaban -->
        <div class="card m-2 p-4 mt-4">
            @auth
                <a class="btn btn-primary btn-sm w-15" data-bs-toggle="collapse" href="#answers" role="button"
                    aria-expanded="false" aria-controls="collapseExample"> <span class="material-icons"> question_answer </span>
                    Jawab </a>
            @endauth
            <h3 class="text-center">TANGGAPAN</h3>
            <div class="collapse" id="answers">
                <div class="card card-body">
                    <form action="/jawab/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Jawabanmu</label>
                            <textarea class="form-control" name="content" id="content" cols="100" rows="3"></textarea>
                            <br>
                            <div class="mb-4">
                                <label>Kirim Foto | max: 2 mb</label>
                                <br />
                                <input class="input-file-normal" type="file" name="image" id="image" />
                            </div>
                            <input type="hidden" value="{{ $question->id }}" name="tanya_id">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach ($jawabs as $jawab)
                <div class="container mx-2 my-2">
                    <hr />
                    <div class="d-flex justify-content-end">
                        @if ($jawab->users_id == Auth::id())
                            <a class="edit" href="#"> <span class="material-icons" data-bs-toggle="modal"
                                    data-bs-target="#editAnswer{{ $jawab->id }}"> edit_note </span></a>
                            <a class="delete" href="#" data-bs-toggle="modal"
                                data-bs-target="#deleteTanya{{ $jawab->id }}"><span class="material-icons"> delete
                                </span></a>
                        @endif
                    </div>
                    <h5 class="answer-name">{{ $jawab->user->username }}</h5>
                    <p class="btn btn-outline-primary btn-sm time-answer">
                        {{ Carbon\Carbon::parse($jawab->created_at)->format('d M Y H:i') }}</p>
                    <p class="content-asnwer">
                        {!! $jawab->content !!}
                    </p>
                    @if ($jawab->image != '')
                        <img class="card-img w-25 tanya" src="{{ asset('jawabImage/' . $jawab->image) }}"
                            alt="img-content" />
                    @endif
                </div>
                {{-- Ini buat Modals Edit Komentar/Jawaban --}}
                <div class="modal fade" id="editAnswer{{ $jawab->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Mengedit Jawaban ⚙</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/jawab/{{ $jawab->id }}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <label>Edit Jawabanmu</label>
                                    <textarea class="form-control" name="content" id="content" cols="100" rows="3">{{ $jawab->content }}</textarea>
                                    <br>
                                    <div class="mb-4">
                                        <label>Kirim Ulang Foto | max: 2 mb (Kosongkan jika tidak ingin memperbarui
                                            gambar)</label>
                                        <br />
                                        <input class="input-file-normal" type="file" name="image" id="image" />
                                        <input type="hidden" value="{{ $question->id }}" name="tanya_id">
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
                <div class="modal fade" id="deleteTanya{{ $jawab->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">PERINGATANN!!
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/jawab/{{ $jawab->id }}/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    Apakah Anda Yaking Ingin Menghapus Pertanyaan Anda? Hal ini
                                    tidak dapat di pulihkan
                                </div>
                                <input type="hidden" value="{{ $question->id }}" name="tanya_id">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
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
@endsection

{{-- kalau perlu input css baru sama js baru tinggal aktifin aja script di bawah --}}

@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('zoom.js/css/main.css') }}"> --}}
@endpush

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
    </script>

    <script src="{{ asset('zoom.js/js/zoom.js') }}"></script>
    <!-- Contoh JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.tanya');

            images.forEach(function(image) {
                image.addEventListener('click', function(event) {
                    event.preventDefault();
                    zoom.to({
                        element: event.target
                    });
                });
            });
        });
    </script>
@endpush
