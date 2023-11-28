<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    // * Pengaduan front start

    public function publicPengaduan(Request $request){

        $validate = Validator::make($request->all(), [
            'tentang' => ['required','string','min:5'],
            'tkp' => ['required', 'string'],
            'aduan' => ['required', 'string'],
            'image' => ['required','file', 'mimes:jpg,png,svg'],
        ]);

        if ($validate->fails()) {
            $errors = $validate->errors()->messages();
            foreach ($errors as $key => $value) {
                toastr()->error($value[0]);
            }
            return redirect()->route('home');
        }

        if($request->hasFile('image')){
            $image = $request->file('image'); 
            $RANDOM_LENGTH_NAME = 15;
            $image_name = Str::random($RANDOM_LENGTH_NAME) . date('His') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/ImagePengaduan', $image_name);
        } else {
            toastr()->error('Tidak Ada Bukti Foto Di Pengaduan Anda!');
            return redirect()->route('home');
        }

        $data = Pengaduan::create([
            'tentang' => $request->tentang,
            'tkp' => $request->tkp,
            'aduan' => $request->aduan,
            'image' => $image_name,
            'user_id' => Auth::user()->id
        ]);
        
        if($data){
            return redirect()->route('home')->with('success', 'Data Berhasil Di Buat, Sihlakan Menunggu Acc!');
        } else {
            return redirect()->route('home')->with('error', 'Someting Wrong In Server!');
        }
        
    }
    // * Pengaduan front end
    
    public function index(){
        $data = Pengaduan::all();
        return view('Page.Dashboard.Admin.User.Index', [
            'pengaduan' => $data
        ]);
    }

    public function create(){
        return view('Page.Dashboard.Admin.User.Create');
    }

    public function search(Request $request){

        if($request->search == null || $request->search == "" ) return redirect()->route('user.index');
        $validate = Validator::make($request->all(), [
            'search' => ['required', 'string']
        ]);
        
        if ($validate->fails()) {
            toastr()->success('Someting Wrong, Try Again!');
            return redirect()->route('bunga.index');
        }

        $data = Pengaduan::where('name', 'LIKE', '%' . $request->search . '%')
        ->orWhere('role', 'LIKE', '%' . $request->search . '%')
        ->orWhere('email', 'LIKE', '%' . $request->search . '%')
        ->get();

        return view('Page.Dashboard.Admin.User.Index', [
            'pengaduan' => $data
        ]);
    }

    public function store(Request $request){
        
        $validate = Validator::make($request->all(), [
            'name' => ['required','string','min:4'],
            'email' => ['required', 'string', 'email'],
            'no_telp' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:4','confirmed'],
        ]);

        
        if ($validate->fails()) {
            $message = [];
            $errors = $validate->errors();
            return view('Page.Dashboard.Admin.User.Create',[
                'error' => true,
                'message' => $errors->messages()
            ]);
        }

        $req = $request->all();

        $data = Pengaduan::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'no_telp' => $req['no_telp'],
            'password' => Hash::make($req['password'])
        ]);   

        if ($data) {
            toastr()->success('Data has been saved successfully!');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('user.index');

        }

    }

    public function edit($uuid){

        $data = Pengaduan::where('uuid', $uuid)->first();

        if (!isset($data))  {
            return redirect()->route('bunga.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }
        
        return view('Page.Dashboard.Admin.User.Edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $uuid){

        $validate = Validator::make($request->all(), [
            'name' => ['required','string','min:4'],
            'email' => ['required', 'string', 'email'],
            'no_telp' => ['required', 'integer'],
            'password' => ['nullable', 'string', 'min:4','confirmed'],
        ]);
        
        if ($validate->fails()) {
            return redirect()->route('user.index')->withErrors(['errror' => 'Gagal Mengupdate!']);
        }
        
        $data = Pengaduan::where('uuid', $uuid)->first();
        if (!isset($data))  {
            return redirect()->route('user.index')->withErrors(['errror' => 'Data Tidak Di Temukan']);
        }
        $req = $request->all();
         if($req['password'] == null){
            unset($req['password']);
            unset($req['password_confirnmatin']);
         }

        $data->update($req);
        
        if ($data) {
            toastr()->success('Data successfully Updated!');
            return redirect()->route('user.index');
        } else {
            toastr()->error('Data Falied To Save!');
            return redirec()->route('user.index');
        }

    }

    public function delete($uuid){
        $data = Pengaduan::where('uuid', $uuid)->first();

        if (!isset($data)) {
            toastr()->error('No Data Found!');
            return redirect()->route('bunga.index');
        }
       
        if ($data->delete()) {
            toastr()->success('Data successfully Delete!');
            return redirect()->route('bunga.index');
        } else {
            toastr()->error('Data Falied To Delete!');
            return redirec()->route('bunga.index');
        }
    }
}
