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

                                <div class="row align-items-center mb-5 mt-3">
                                    <di class="col-auto">
                                        <a href="/tambahkota" type="button" class="btn btn-primary"><i class="fa-solid fa-address-card"></i> Tambah+</a>
                                        {{-- {{ Session::get('halam_url') }} --}}
                                </div>
                                <div class="row">
                                    <table class="table table-dark table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Pulau</th>
                                                <th scope="col">Provinsi</th>
                                                <th scope="col">Kota</th>
                                                {{-- <th scope="col"><i class="fa-solid fa-calendar-plus"></i> Tanggal Dibuat</th> --}}
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $r)
                                                <tr>
                                                    <th scope="row">{{ $index + $data->firstItem() }}</th>
                                                    <td>{{ $r->pulau }}</td>
                                                    <td>{{ $r->namaprovinsi }}</td>
                                                    <td>{{ $r->namakota }}</td>
                                                    {{-- <td>{{ $r->created_at->format('Y-m-d') }}</td> --}}
                                                    {{-- <td>
                                                        <a href="/tampil/{{ $r->id }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                    </td> --}}
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
