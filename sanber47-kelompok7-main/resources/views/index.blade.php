@extends('layouts.master')

@section('title')
    Dashboard - TanyaLaraAja
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">help</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Pertanyaan</p>
                            @auth
                                <h4 class="mb-0">{{ $totalTanya }}</h4>
                            @endauth
                            @guest
                                <h4 class="mb-0">-</h4>
                            @endguest
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <a href="/versi">
                            <div
                                class="icon icon-lg icon-shape bg-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">explore</i>
                            </div>
                        </a>
                        <div class="text-end pt-1">
                            <h4 class="text-sm mb-0 text-capitalize">List Versi Laravel</h4>
                            <h4 style="visibility: hidden;" class="mb-0">.</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        @auth
                            <a href="/tanyajawab">
                            @endauth
                            @guest
                                <a href="/login">
                                @endguest
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-info shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">question_answer</i>
                                </div>
                            </a>
                            <div class="text-end pt-1">
                                <h4 class="text-sm mb-0 text-capitalize">Tambah Pertanyaan</h4>
                                <h4 style="visibility: hidden;" class="mb-0">.</h4>
                            </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">task_alt</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Jawabanmu</p>
                            @auth
                                <h4 class="mb-0">{{ $totalJawab }}</h4>
                            @endauth
                            @guest
                                <h4 class="mb-0">-</h4>
                            @endguest
                        </div>
                    </div>
                    <hr class="dark horizontal my-0" />
                    <div class="card-footer p-3"></div>
                </div>
            </div>
        </div>
        <div id="carouselExampleDark" class="carousel carousel slide my-4">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner ">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('template_bersih/assets/img/1.png') }}" class="d-block w-100 rounded"
                        alt="pic-1" />
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('template_bersih/assets/img/2.png') }}" class="d-block w-100 rounded"
                        alt="pic-2" />
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card p-4 my-4">
                <h2 class="title text-primary fs-3 my-3">Pertanyaan Terbaru <span class="material-icons"> cached </span>
                </h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-3">
                    @foreach ($tanyas as $tanya)
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('tanyaImage/' . $tanya->image) }}" class="card-img-top" alt="error-pic" />
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tanya->title }}</h5>
                                    <p class="fs-6 writer">Penulis: {{ $tanya->user->username }}</p>
                                    <p class="btn btn-outline-primary btn-sm">{{ $tanya->version->name }}</p>
                                    <div class="flex-row">
                                        <a class="btn btn-sm btn-info" href="/tanyajawab/{{ $tanya->id }}"><span class="material-icons">
                                                launch
                                            </span> Detail</a>
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
    </div>
@endsection
