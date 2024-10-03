<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Exports\TugasExport;
use App\Imports\TugasImport;
use App\Models\City;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TugasController extends Controller
{
    public function table(Request $request){
        if ($request->has('search')) {
            $data = Tugas::where('nama','LIKE','%' .$request->search.'%')->paginate(7);
            Session::put('halam_url', request()->fullUrl());
        }else{
            $data = Tugas::paginate(5);
            Session::put('halam_url', request()->fullUrl());
        }
        return view('tugas.table',compact('data'));
    }

    public function tambah(){
        $datakota = City::all();
        return view('tugas.tambah', compact('datakota'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'nama' => 'required|min:3|max:50',
            'no' => 'required|min:12|max:20',
        ]);

        $data = Tugas::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('Images/foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('table')->with('berhasil','Data berhasil di simpan');
    }

    public function tampil($id){
        $data = Tugas::find($id);
        return view('tugas.tampil',compact('data'));
    }

    public function edit(Request $request,$id){
        $data = Tugas::find($id);
        $data->update($request->all());
        if (session('halam_url')) {
            return redirect(session('halam_url'))->with('berhasil','Data berhasil di update');
        }
        return redirect()->route('table')->with('berhasil','Data berhasil di update');
    }

    public function hapus($id){
        $data = Tugas::find($id);
        $data->delete();
        return redirect()->route('table')->with('berhasil','Data berhasil di hapus');
    }

    public function pdf(){
        $data = Tugas::all();
        $pdf = Pdf::loadView('tugas.pdf', ['data' => $data]);
        return $pdf->stream('Data-Tugas.pdf');
    }

    public function excel(){
        return Excel::download(new TugasExport, 'Data-Tugas.xlsx');
    }

    public function import(Request $request){
        $data = $request->file('myfile');
        $namafile = $data->getClientOriginalName();
        $data->move('Tugasdata', $namafile);

        Excel::import(new TugasImport, public_path('/Tugasdata/'.$namafile));
        return redirect()->back();
    }
}
