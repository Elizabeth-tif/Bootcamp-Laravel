@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('template/assets/img/person.png') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $detail_profile->user->username }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Bio Profil</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="/profile/update">
                                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit Profile"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <p class="text-sm">
                                        {{ $detail_profile->bio }}
                                    </p>
                                    <hr class="horizontal gray-light my-4">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Nama Lengkap:</strong> &nbsp; {{ $detail_profile->name }}
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Gender:</strong> &nbsp; {{ $detail_profile->gender }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tanggal
                                                Lahir:</strong> &nbsp; {{ $detail_profile->tanggal_lahir }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Alamat:</strong> &nbsp; {{ $detail_profile->alamat }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; {{ $detail_profile->user->email }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="mb-5">
                                <div class="card">
                                    <div class="card-header p-3 pt-2">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">help_outline</i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Pertanyaan yang di Posting</p>
                                            <h4 class="mb-0">{{ $totalTanya }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <div class="card">
                                    <div class="card-header p-3 pt-2">
                                        <div
                                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                            <i class="material-icons opacity-10">chat_bubble</i>
                                        </div>
                                        <div class="text-end pt-1">
                                            <p class="text-sm mb-0 text-capitalize">Jawaban yang Terposting</p>
                                            <h4 class="mb-0">{{ $totalJawab }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="mb-5 ps-3">
                                <h6 class="mb-1">Pertanyaan</h6>
                                <p class="text-sm">List pertanyaan yang pernah di post</p>
                            </div>
                            <div class="row">
                                @foreach ($tanyas as $tanya)
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="card-header p-0 mt-n4 mx-3">
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="{{ asset('tanyaImage/' . $tanya->image) }}"
                                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                                </a>
                                            </div>
                                            <div class="card-body p-3">
                                                <a href="javascript:;">
                                                    <h5>
                                                        {{ $tanya->title }}
                                                    </h5>
                                                </a>
                                                <p class="mb-4 text-sm clamp-3">
                                                    {{ $tanya->content }}
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <a href="/tanyajawab/{{ $tanya->id }}" class="btn btn-outline-primary btn-sm mb-0">Lihat Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
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
    {{-- Modals Untuk Edit Profile --}}
    <div class="modal fade" id="addTanya" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mengedit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control form-control-user @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Nama" autocomplete="name"
                                autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input class="form-control form-control-user @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}"
                                placeholder="Username (gunakan huruf kecil)" autocomplete="username"
                                style="margin-top: 9px" />
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input class="form-control form-control-user @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email"
                                style="margin-top: 15px">
                            <p id="tanggal-lahir-title"
                                style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: 10px; margin-bottom: 0px; margin-left: 4px">
                                Tanggal Lahir</p>
                            <input type="date"
                                class="form-control form-control-user @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autocomplete="tanggal_lahir">
                        </div>
                        <p id="pilih-gender-title-1"
                            style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: -6px; margin-bottom: 0px; margin-left: 4px; padding-bottom: 11px">
                            Pilih Gender !
                        </p>
                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                            <optgroup label="Pilih Gender">
                                <option selected disabled>- Silahkan Pilih Gender -</option>
                                <option value="cowok"{{ old('gender') == 'cowok' ? ' selected' : '' }}>
                                    Cowok
                                </option>
                                <option value="cewek"{{ old('gender') == 'cewek' ? ' selected' : '' }}>
                                    Cewek
                                </option>
                            </optgroup>
                        </select>
                        <p id="alamat-title"
                            style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: 14px; margin-bottom: 0px; margin-left: 4px; padding-bottom: 10px">
                            Alamat</p>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p id="bio-title"
                            style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: 14px; margin-bottom: 0px; margin-left: 4px; padding-bottom: 10px">
                            Bio</p>
                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio">{{ old('bio') }}</textarea>
                        <input class="form-control form-control-user @error('password') is-invalid @enderror"
                            type="password" id="new-password" placeholder="Buat Password" name="password"
                            required="" style="margin-top: 15px" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="form-control form-control-user" type="password" id="new-password-1"
                            placeholder="Konfirmasi Password" name="password_confirmation" required=""
                            style="margin-top: 15px; margin-bottom: 10px" />
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row mb-3">
                            <p id="errorMsg" class="text-danger" style="display: none">Paragraph</p>
                        </div>
                        <div class="d-flex login-buttons">
                            <button class="btn btn-primary btn-user w-50 form-btn" data-bss-hover-animate="pulse"
                                id="register-btn" type="submit"
                                style="background: var(--bs-primary); color: var(--bs-light-text-emphasis); font-family: Poppins, sans-serif; border-radius: 10px">
                                Register</button>
                            <a href="/login" class="btn btn-primary btn-user w-50" role="button"
                                data-bss-disabled-mobile="true" data-bss-hover-animate="pulse" id="login-btn"
                                style="background: #ffffff00; color: var(--bs-primary); font-family: Poppins, sans-serif; border: 2px solid var(--bs-btn-border-color); border-radius: 10px; margin-left: 30px">Login</a>
                        </div>
                        <hr />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/swal.min.js') }}"></script>
    @if (session('message'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('message') }}",
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
    <script src="https://cdn.tiny.cloud/1/5gorw5nx4zw5j4viyd3rjucdwe1xqqwublsayv3cd879rzso/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
        });
    </script>
@endpush
