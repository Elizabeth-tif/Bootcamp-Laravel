@extends('layouts.app')

@section('content')
    <div class="container"
        style="position: absolute; left: 0; right: 0; top: 50%; transform: translateY(-50%); -ms-transform: translateY(-50%); -moz-transform: translateY(-50%); -webkit-transform: translateY(-50%); -o-transform: translateY(-50%)">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-9 col-xxl-7">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5 rounded" style="background: #242426">
                                    <div class="text-center"></div>
                                    <img class="img-fluid justify-content-lg-center justify-content-xl-center justify-content-xxl-center"
                                        id="logo-login"
                                        src="{{ asset('templete_login/assets/img/TLAupscale.png') }}"
                                        style="position: relative; display: inline-block; margin-bottom: 2rem; padding-left: 5rem; padding-right: 5rem"
                                        width="426" height="75" />
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <input
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                type="email" id="email" aria-describedby="emailHelp"
                                                placeholder="Email Address" name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                type="password" placeholder="Password" name="password"/>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <p id="errorMsg" class="text-danger" style="display: none">Paragraph</p>
                                        </div>
                                        <div class="d-flex login-buttons">
                                            <button class="btn btn-primary btn-user w-50 form-btn"
                                                data-bss-hover-animate="pulse" id="login-btn" type="submit"
                                                style="background: var(--bs-primary); color: var(--bs-light-text-emphasis); font-family: Poppins, sans-serif; border-radius: 10px">
                                                Login</button>
                                                <a href="/register" class="btn btn-primary btn-user w-50" role="button"
                                                data-bss-disabled-mobile="true" data-bss-hover-animate="pulse"
                                                id="register-btn"
                                                style="background: #ffffff00; color: var(--bs-primary); font-family: Poppins, sans-serif; border: 2px solid var(--bs-btn-border-color); border-radius: 10px; margin-left: 30px">Register</a>
                                        </div>
                                        <hr />
                                    </form>
                                    <div class="text-center"><a id="forgot-link" class="forgot-link"
                                            style="color: var(--bs-primary)">Lupa Password?</a></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
