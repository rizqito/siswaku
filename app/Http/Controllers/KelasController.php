<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas, App\Http\Requests\KelasRequest, Session;

class KelasController extends Controller
{    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $kelas = Kelas::all();
        return view('kelas.index',compact('kelas'));
    }
    
    public function create(){
        return view('kelas.create');
    }
    
    public function store(KelasRequest $request){
        Kelas::create($request->all());
        Session::flash('flash_message','Data kelas berhasil disimpan');
        return redirect('kelas');
    }

    public function show($id){
        //
    }

    public function edit(Kelas $kelas){
        return view('kelas.edit',compact('kelas'));
    }

    public function update(Kelas $kelas, KelasRequest $request, $id){
        $kelas->update($request->all());
        Session::flash('flash_message','Data Kelas Berhasil diupdate');
        return redirect('kelas');
    }

    public function destroy(Kelas $kelas){
        $kelas->delete();
        Session::flash('flash_message','Data kelas berhasil dihapus');
        return redirect('kelas');
    }
}
