<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #00bebe;
  color: white;
}
h1 {
  text-align: center;
}
</style>
</head>
<body>

<h1>TABLE DATA SANTRI</h1>

<table id="customers">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Jenis Kelamin</th>
            <th>No.Telephone</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($data as $r)
            <tr>
                <th>{{ $i++ }}</th>
                <td>{{ $r->nama }}</td>
                <td><img src="{{ public_path('Images/foto/'.$r->foto) }}" alt="" width="40px"></td>
                <td>{{ $r->jeniskelamin }}</td>
                <td>{{ $r->no }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
