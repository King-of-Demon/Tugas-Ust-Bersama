@extends('layout.admin')

@push('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">TABLE LIST</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Table list</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>

            <div class="container-fluid">
                            <div class="justify-content-center">
                                <div class="container">

                                <div class="row align-items-center mb-4 mt-5">
                                    <di class="col-auto">
                                        <a href="/tambah" type="button" class="btn btn-primary"><i class="fa-solid fa-address-card"></i> Tambah+</a>
                                        {{-- {{ Session::get('halam_url') }} --}}
                                    </di>
                                    ||
                                    <div class="col-auto ms-3">
                                        <a href="/pdf" type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Export to PDF</a>
                                    </div>

                                    <div class="col-auto">
                                        <a href="/excel" type="button" class="btn btn-success"><i class="fa-solid fa-file-excel"></i> Export to Excel</a>
                                    </div>
                                    ||
                                    <!-- Button trigger modal -->
                                    <div class="col-auto ms-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="fa-solid fa-file-import"></i> Import From Excel
                                        </button>
                                    </div>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/import" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="file" name="myfile" class="form-control-file" id="exampleFormControlFile1" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>

                                    <div class="col-auto ms-auto">
                                        <form action="/table" method="get" class="d-flex" role="search">
                                            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit"><i class="fa-brands fa-searchengin"></i></button>
                                        </form>
                                    </div>

                                </div>
                                <div class="row">
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col"><i class="fa-solid fa-signature"></i> Nama</th>
                                                <th scope="col"><i class="fa-solid fa-image"></i> Foto</th>
                                                <th scope="col"><i class="fa-solid fa-venus-mars"></i> Jenis Kelamin</th>
                                                <th scope="col"><i class="fa-solid fa-phone"></i> No.Telephone</th>
                                                <th scope="col"><i class="fa-solid fa-cake-candles"></i> Tanggal Lahir</th>
                                                <th scope="col"><i class="fa-solid fa-house-chimney"></i> Tempat Tinggal</th>
                                                {{-- <th scope="col"><i class="fa-solid fa-calendar-plus"></i> Tanggal Dibuat</th> --}}
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $r)
                                                <tr>
                                                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                                                    <td>{{ $r->nama }}</td>
                                                    <td><img src="{{ asset('Images/foto/'.$r->foto) }}" alt="" width="40px"></td>
                                                    <td>{{ $r->jeniskelamin }}</td>
                                                    <td>{{ $r->no }}</td>
                                                    <td>{{ $r->tanggal_lahir }}</td>
                                                    <td>{{ $r->city->namakota }}</td>
                                                    <td>
                                                        <a href="/tampil/{{ $r->id }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                        <a href="#" class="btn btn-danger delete" data-id="{{ $r->id }}" data-nama="{{ $r->nama }}"><i class="fa-solid fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
            </div>
</div>
@endsection

@push('js')
            {{-- wow animate java script --}}
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            {{-- end of wow animate java script --}}

        <script>
            $('.delete').click(function(){
                var noid = $(this).attr('data-id');
                var nama = $(this).attr('data-nama');

                                Swal.fire({
                        title: "Apakah kamu yakin ?",
                        text: "Anda akan menghapus data yang bernama "+nama+"!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, tentu!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "/hapus/"+noid+" "
                            Swal.fire({
                            timeOut: 5000,
                            title: "Terhapus!",
                            text: "Data Anda telah dihapus.",
                            icon: "success"
                            });
                        }
                        });
            });
        </script>
        {{-- TOASTR --}}
        <script>
            @if (Session::has('berhasil'))
                    toastr.success("{{ Session::get('berhasil') }}", {timeOut: 2000})
            @endif
        </script>
@endpush

{{-- <td>{{ $r->created_at->format('Y-m-d') }}</td> --}}
