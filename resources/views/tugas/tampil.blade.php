<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="text-center mt-4">EDIT DATA</h1>
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <form action="/edit/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                                <option selected>{{ $data->jeniskelamin }}</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                              </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">No Telephone</label>
                          <input type="number" name="no" class="form-control" id="exampleInputPassword1" value="{{ $data->no }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
           </div>
        </div>
    </div>
</body>

</html>
