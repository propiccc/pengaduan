<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanSiswaController extends Controller
{
    public function deletePengaduanSiswa($uuid){
        $data = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($data)){
            return redirect()->route('pengaduan.siswa')->with('error', 'Pengaduan Tidak Di Temukan!');
        }
        
        if($data->delete()){
            return redirect()->route('pengaduan.siswa')->with('success', 'Data Berhasil Di Hapus!');
        } else {
            return redirect()->route('pengaduan.siswa')->with('error', 'Data Gagal Di Hapus!');
        }
    }

    public function detailPengaduanSiswa($uuid){
        $pengaduan = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($pengaduan)){
            return redirect()->route('pengaduan.siswa')->with('error', 'Pengaduan Tidak Di Temukan!');
        }
        return view('Page.System.Siswa.Pengaduan.Detail', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function pengaduanSiswa(){
        $pengaduan = Pengaduan::where('user_id', Auth::user()->id)->get();
        return view('Page.System.Siswa.Pengaduan.index',[
            'pengaduan' => $pengaduan
        ]);
    }
}
