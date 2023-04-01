<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
        $this->middleware(['auth','verified']);
    }

    public function indexAdmin()
    {
        $users = User::all();
        $n_users = User::onlyTrashed()->get();
        // dd($n_users);
        return view('admin.v_user', compact('users','n_users'));
    }

    public function listUser()
    {
        $users = User::where('level','<>', 1)->get();
        return view('ketua.v_listUser', compact('users'));
    }

    public function multiKredit(Request $request)
    {
        $request->validate([
            'status_user' => 'required',
        ],[
            'status_user.required' => 'Kolom tidak boleh kosong',
        ]);
        $userId = Request()->user_id;
        $nm = Request()->nama;
        // dd($request->all());

        try {
            $user = User::where('id', $userId)
            ->update([
                'status_user' => Request()->status_user,
            ]);
    
            return redirect()->back()->with('success','Berhasil')->with('sukses','Akses multi kredit untuk '.' '.$nm.' '.' berhasil di buka');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal')->with('gagal','Akses multi kredit untuk '.' '.$nm.' '.' gagal di buka');
        }
       
    }

    public function storePhoto(Request $request)
    {
    try {
        
        $file = $request->file('image');
        $namaFile = auth()->user()->nik_ktp.'.'.$file->extension();
        $request->file('image')->storeAs('public/foto_user/',$namaFile);
        // $file->move('storage/FileImport', $namaFile);

        $request = User::where('id', auth()->user()->id)
        ->update([
            'foto' => $namaFile,
        ]);
        // dd($request);
        
        // dd('Image uploaded successfully: '.$fileName);
        return redirect()->back()->with('success','Image uploaded successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Image upload has Failed');
        }
        
    }

    public function editPassword()
    {
        return view('v_editPassword');
    }

    public function editPasswordAnggota()
    {
        return view('anggota.v_editPassword');
    }

    public function updatePassword (Request $request)
    {
        try {
            $user = Auth::user();
            $validatedData = $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ],[
                'old_password.required' => 'Pasword lama belum diisi',
                'new_password.required' => 'Pasword baru belum diisi',
                'new_password.min' => 'Pasword baru min. 8 karakter',
                'confirm_password.required' => 'Pasword konfirmasi belum diisi',
                'confirm_password.same' => 'Pasword konfirmasi tidak sama dengan password baru',
            ]);
    
           // Periksa apakah password lama sesuai
            if (!Hash::check($validatedData['old_password'], $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak cocok']);
            }
            // Ubah password baru
            $user->password = Hash::make($validatedData['new_password']);
            $user->save();

            // dd($request->all());
            return redirect()->back()->with('success','Password berhasil di update');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Password gagal di update ');
        }
    }

    public function updateMode(Request $request)
    {
        $mode = Request()->mode;

        if(!$mode)
        {
            $user = User::where('id',auth()->user()->id)
            ->update([
                'mode' => null,
            ]);
        }elseif($mode)
        {
            $user = User::where('id',auth()->user()->id)
        ->update([
            'mode' => Request()->mode,
        ]);
        }
        
        // dd($request->all());
        return back();
    }

    public function hapusAkun(Request $request)
    {
        try {
            $id = Request()->user_id;
            $user = User::where('id', $id)
            ->delete();
            return redirect()->back()->with('success','Berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal dihapus');
        }

    }
}
