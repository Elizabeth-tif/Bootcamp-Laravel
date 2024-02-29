<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <title>logindaftar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap" />
    <link rel="stylesheet" href="{{ asset('templete_login/assets/css/bs-theme-overrides.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('templete_login/assets/css/styles.css') }}" />
    <!-- Scripts -->
</head>

<body style="--bs-body-color: var(--bs-body-color); background: #1f2122">
    <div class="container"
        style="position: absolute; left: 0; right: 0; top: 100%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%)">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-9 col-xxl-7">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5" style="background: #27292a">
                                    <div class="text-center"></div>
                                    <img class="img-fluid justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
                                        id="logo-login"
                                        src="{{ asset('templete_login/assets/img/TanyaLaraAja%20Upscale.png') }}"
                                        style="position: relative; display: inline-block; margin-bottom: 2rem; padding-left: 5rem; padding-right: 5rem"
                                        width="426" height="75" />
                                    <form method="POST" action="/profile/{{ $detail_profile->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <input
                                                class="form-control form-control-user @error('name') is-invalid @enderror"
                                                name="name" value="{{ $detail_profile->name }}" placeholder="Nama"
                                                autocomplete="name" autofocus />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input
                                                class="form-control form-control-user @error('username') is-invalid @enderror"
                                                name="username" value="{{ $detail_profile->User->username }}"
                                                placeholder="Username" autocomplete="username" style="margin-top: 9px"
                                                readonly />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <input
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ $detail_profile->User->email }}"
                                                autocomplete="email" placeholder="Email" style="margin-top: 15px">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <p id="tanggal-lahir-title"
                                                style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: 10px; margin-bottom: 0px; margin-left: 4px">
                                                Tanggal Lahir</p>
                                            <input type="date"
                                                class="form-control form-control-user @error('tanggal_lahir') is-invalid @enderror"
                                                name="tanggal_lahir" value="{{ $detail_profile->tanggal_lahir }}"
                                                autocomplete="tanggal_lahir">
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <p id="pilih-gender-title-1"
                                            style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: -6px; margin-bottom: 0px; margin-left: 4px; padding-bottom: 11px">
                                            Pilih Gender !
                                        </p>
                                        <select class="form-select @error('gender') is-invalid @enderror" id="gender"
                                            name="gender">
                                            <optgroup label="Pilih Gender">
                                                <option selected disabled>- Silahkan Pilih Gender -</option>
                                                <option
                                                    value="cowok"{{ $detail_profile->gender == 'cowok' ? ' selected' : '' }}>
                                                    Cowok
                                                </option>
                                                <option
                                                    value="cewek"{{ $detail_profile->gender == 'cewek' ? ' selected' : '' }}>
                                                    Cewek
                                                </option>
                                            </optgroup>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p id="alamat-title"
                                            style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: 14px; margin-bottom: 0px; margin-left: 4px; padding-bottom: 10px">
                                            Alamat</p>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ $detail_profile->alamat }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p id="bio-title"
                                            style="font-family: Poppins, sans-serif; font-size: 16px; color: #6c757d; padding-top: -0; margin-right: 0; margin-top: 14px; margin-bottom: 0px; margin-left: 4px; padding-bottom: 10px">
                                            Bio</p>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio">{{ $detail_profile->bio }}</textarea>
                                        <div class="row mb-3">
                                            <p id="errorMsg" class="text-danger" style="display: none">Paragraph</p>
                                        </div>
                                        <div class="d-flex login-buttons">
                                            <button class="btn btn-primary btn-user w-50 form-btn"
                                                data-bss-hover-animate="pulse" id="register-btn" type="submit"
                                                style="background: var(--bs-primary); color: var(--bs-light-text-emphasis); font-family: Poppins, sans-serif; border-radius: 10px">
                                                Simpan</button>
                                            <a href="/profile" class="btn btn-primary btn-user w-50" role="button"
                                                data-bss-disabled-mobile="true" data-bss-hover-animate="pulse"
                                                id="login-btn"
                                                style="background: #ffffff00; color: var(--bs-primary); font-family: Poppins, sans-serif; border: 2px solid var(--bs-btn-border-color); border-radius: 10px; margin-left: 30px">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templete_login/assets/js/bs-init.js') }}"></script>
</body>

</html>
