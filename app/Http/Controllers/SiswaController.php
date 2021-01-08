<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa, App\Telepon, App\Kelas, App\Hobi;
use Validator, Session;
use App\Http\Requests\SiswaRequest, Storage;

class SiswaController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except' => [
            'index',
            'show',
            'cari',
        ]]);
    }

    public function index(){
    	$siswa     = Siswa::orderBy('nama_siswa','asc')->paginate(10);
        $jml_siswa = $siswa->count();
    	return view('siswa.index',compact('siswa','jml_siswa'));
    }

    public function create(){
        $list_kelas = Kelas::pluck('nama_kelas','id');        
        $list_hobi  = Hobi::pluck('nama_hobi','id');
        return view('siswa.create',compact('list_kelas','list_hobi'));
    }

    public function store(SiswaRequest $req){
        $input = $req->all();

        if($req->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($req);
        }

        $siswa = Siswa::create($input);

        if($req->filled('nomor_telepon')){
            $this->insertTelepon($siswa, $req);
        }

        $siswa->hobi()->attach($req->input('hobi_siswa'));

        Session::flash('flash_message','Data siswa berhasil disimpan');

        return redirect('siswa');
    }

    public function show(Siswa $siswa){        
        return view('siswa.show',compact('siswa'));
    }

    public function edit(Siswa $siswa){    
        $list_kelas = Kelas::pluck('nama_kelas','id');
        $list_hobi  = Hobi::pluck('nama_hobi','id');

        if(!empty($siswa->telepon->nomor_telepon)){
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }

        return view('siswa.edit',compact('siswa','list_kelas','list_hobi'));
    }

    public function update(Siswa $siswa, SiswaRequest $req){        
        $input = $req->all();

        if($req->hasFile('foto')){
            $input['foto'] = $this->updateFoto($siswa, $req);
        }

        $siswa->update($input);

        $this->updateTelepon($siswa, $req);        

        $siswa->hobi()->sync($req->input('hobi_siswa'));

        Session::flash('flash_message','Data siswa berhasil diupdate');

        return redirect('siswa');
    }

    public function destroy(Siswa $siswa){        
        $this->hapusFoto($siswa);

        Session::flash('flash_message','Data siswa berhasil dihapus');
        Session::flash('penting', true);

        $siswa->delete();
        return redirect('siswa');
    }

    public function dateMutator(){
        $siswa         = Siswa::findOrFail(1);
        $nama          = $siswa->nama_siswa;
        $tanggal_lahir = $siswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun   = $siswa->tanggal_lahir->addYears(30)->format('d-m-Y');        
        return "Siswa {$nama} lahir pada {$tanggal_lahir}. <br> Ulang tahun ke-30 akan jatuh pada {$ulang_tahun}.";
    }

    private function insertTelepon(Siswa $siswa, SiswaRequest $req){
        $telepon = new Telepon;
        $telepon->nomor_telepon = $req->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
    }

    private function updateTelepon(Siswa $siswa, SiswaRequest $req){
        if($siswa->telepon){
            if($req->filled('nomor_telepon')){
                $telepon                = $siswa->telepon;
                $telepon->nomor_telepon = $req->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }else{
                $siswa->telepon()->delete();
            }
        }else{
            if($request->filled('nomor_telepon')){
                $telepon = new Telepon;
                $telepon->nomor_telepon = $req->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
    }

    private function uploadFoto(SiswaRequest $req){
        $foto = $req->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if($req->file('foto')->isValid()){
            $foto_name = date('YmdHis').".$ext";
            $req->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }

    private function updateFoto(Siswa $siswa, SiswaRequest $req){
        if($req->hasFile('foto')){
            $exist = Storage::disk('foto')->exists($siswa->foto);
            if(isset($siswa->foto) & $exist){
                $delete = Storage::disk('foto')->delete($siswa->foto);
            }
        }

        $foto = $req->file('foto');
        $ext  = $foto->getClientOriginalExtension();
        if($req->file('foto')->isValid()){
            $fotoname = date('YmdHis').".$ext";
            $upload_path = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);
            return $foto_name;
        }
    }

    private function hapusFoto(Siswa $siswa){
        $is_foto_exist = Storage::disk('foto')->delete($siswa->foto);
        if($is_foto_exist){
            Storage::disk('foto')->delete($siswa->foto);
        }
    }

    public function cari(Request $req){
        $kata_kunci = trim($req->input('kata_kunci'));

        if(!empty($kata_kunci)){
            $jenis_kelamin = $req->input('jenis_kelamin');
            $id_kelas      = $req->input('id_kelas');
        }

        $query      = Siswa::where('nama_siswa','LIKE','%'.$kata_kunci.'%');

        (!empty($jenis_kelamin)) ? $query->jenisKelamin($jenis_kelamin) : '';
        (!empty($id_kelas)) ? $query->kelas($id_kelas) : '';

        $siswa      = $query->paginate(2);

        $pagination = (!empty($jenis_kelamin)) ? $siswa->appends(['jenis_kelamin'=>$jenis_kelamin]) : '';
        $pagination = (!empty($id_kelas)) ? $siswa->appends(['id_kelas'=>$id_kelas]) : '';
        $pagination = $siswa->appends(['kata_kunci'=>$kata_kunci]);

        $jml_siswa  = $siswa->total();
        return view('siswa.index',compact('siswa','kata_kunci','pagination','jml_siswa','id_kelas','jenis_kelamin'));
    }
}