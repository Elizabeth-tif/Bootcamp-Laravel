@extends('layouts.master')

@section('title')
    Versi Laravel - TanyaLaraAja
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="card m-2 p-4">
            <table class="table table-hover text-center" id="versi">
                <thead>
                    <tr>
                        <th scope="row" class="text-center">No.</th>
                        <th scope="col" class="text-center">Versi Laravel</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($data as $no => $item)
                        <tr>
                            <th scope="row">{{ $no + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" data-versi-id="{{ $item->id }}"><span
                                        class="material-icons">filter_alt</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <style>
        .form-control {
            border: 1px solid #E3306F;
            border-radius: 5px;
        }

        .page-item .page-link,
        .page-item span {
            border-radius: 10% !important;
            margin: 0 10px;
        }

        li#versi_previous {
            padding-right: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        new DataTable('#versi');

        // Fungsi ini akan menangani klik pada tag <a> dengan class "btn-primary"
        document.querySelectorAll('a.btn-primary').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan default behavior dari link

                var versiId = link.getAttribute(
                'data-versi-id'); // Mendapatkan ID versi dari atribut data-versi-id

                // Mengarahkan ke view tanyajawab dengan versi yang dipilih
                window.location.href = '/tanyajawab?versi=' + versiId;
            });
        });
    </script>
@endpush
