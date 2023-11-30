<?php

namespace App\Http\Controllers;

use App\Models\Solusi;
use App\Models\Pengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanGuruController extends Controller
{
    public function pengaduan(){
        $data = Pengaduan::where(['penerima_id' => null, 'status' => 'pending'])->get();
        return view('Page.System.Guru.Pengaduan.Index', [
            'pengaduan' => $data
        ]);
    }
    public function pengaduanDetail($uuid){
        $data = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($data)){
            return redirect()->route('pengaduan.guru')->with('error', 'Pengaduan Tidak Di Temukan!');
        }
        return view('Page.System.Guru.Pengaduan.Detail',[
            'pengaduan' => $data
        ]);
    }
    public function pengaduanTolak($uuid){
        $data = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($data)){
            return redirect()->route('pengaduan.guru')->with('error', 'Pengaduan Tidak Di Temukan!');
        }
        $data->status = 'tolak';
        if ($data->save()) {
            toastr()->success('Data Updated Successfully!');
            return redirect()->route('pengaduan.guru');
        } else {
            toastr()->error('Data Falied To Update!');
            return redirec()->route('pengaduan.guru');
        }
    }
    public function pengaduanTerima($uuid){
        $data = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($data)){
            return redirect()->route('pengaduan.guru')->with('error', 'Pengaduan Tidak Di Temukan!');
        }
        $data->status = 'terima';
        $data->penerima_id = Auth::user()->id;
        if ($data->save()) {
            toastr()->success('Data Updated Successfully!');
            return redirect()->route('pengaduan.guru');
        } else {
            toastr()->error('Data Falied To Update!');
            return redirec()->route('pengaduan.guru');
        }
    }
     
    public function solusiIndex(){
        $data = Pengaduan::where('penerima_id', Auth::user()->id)->get();
        return view('Page.System.Guru.Solusi.Index', [
            'pengaduan' => $data
        ]);
    }

    public function solusiCreate($uuid){
        $data = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($data)){
            return redirect()->route('pengaduan.guru')->with('error', 'Pengaduan Tidak Di Temukan!');
        }
        return view('Page.System.Guru.Solusi.form',[
            'pengaduan' => $data
        ]);
    }

    public function solusiStore(Request $request, $uuid){

        $validate = Validator::make($request->all(), [
            'solusi' => ['required','string','min:4'],
            'image' => ['nullable', 'mimes:png,jpg']
        ]);
        
        if ($validate->fails()) {
            $message = [];
            $errors = $validate->errors()->messages();
            foreach ($errors as $error => $val) {
                toastr()->error($val[0], $error);
            }
            return view('Page.System.Admin.User.Create');
        }

        $pengaduan = Pengaduan::where('uuid', $uuid)->first();
        if(!isset($pengaduan) && $pengaduan->Solusi != null){
            return redirect()->route('solusi.guru')->with('error', 'Pengaduan Tidak Di Temukan Atau Sudah ADa Solusi!');
        } 
        
        $req = $request->all();
        if($request->hasFile('image') && $request->image != null){
            $image = $request->file('image');
            $image_name = Str::random(20) . date('His') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/ImageSolusi', $image_name);
            $req['image'] = $image_name;
        } else {
            unset($req['image']);
        }
        $dataSolusi = Solusi::create([
            'solusi' => $req['solusi'],
            'user_id' => Auth::user()->id,
            'pengaduan_id' => $pengaduan->id,
            'image' => isset($req['image']) ?  $req['image'] : null
        ]);
        
        if ($dataSolusi) {
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('solusi.guru');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('solusi.guru');
        }
    }
}
