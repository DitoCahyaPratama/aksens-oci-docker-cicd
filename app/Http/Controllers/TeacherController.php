<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = User::where('role', 'guru')->get();
        return view('pages.admin.teacher.index', compact(['teacher']));
    }

    public function aktifkan(Request $request, $id)
    {
        $user = User::where([['id', $id], ['role', 'guru']])->get()->first();
        if($user->status == '0'){
            $user->update(array_merge(
                [
                    'status' => '1',
                ],
            ));
            return redirect()->route('admin.teacher')
                -> with('success', 'Status guru berhasil diubah menjadi aktif');
        }else{
            $user->update(array_merge(
                [
                    'status' => '0',
                ],
            ));
            return redirect()->route('admin.teacher')
                -> with('success', 'Status guru berhasil diubah menjadi tidak aktif');
        }
    }

    public function profile(){
        $teacher = User::where('id', Auth::id())->first();
        return view('pages.guru.profile', compact(['teacher']));
    }

    public function editProfile(){
        $teacher = User::where('id', Auth::id())->first();
        return view('pages.guru.profileEdit', compact(['teacher']));
    }

    public function updateProfile(Request $request){
        if($request->password == null){
            $student = User::where('id', Auth::id())->update(array_merge(
                [
                    'name' => $request->name,
                    'username' => $request->username,
                    'nik' => $request->nik,
                    'kelas' => $request->kelas,
                    'email' => $request->email,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'operational_time_start' => $request->operational_time_start,
                    'operational_time_end' => $request->operational_time_end,
                    'no_hp' => $request->no_hp,
                    'foto' => $request->foto,
                    'role' => 'guru',
                ],
            ));
        }else{
            $student = User::where('id', Auth::id())->update(array_merge(
                [
                    'name' => $request->name,
                    'username' => $request->username,
                    'nik' => $request->nik,
                    'kelas' => $request->kelas,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'operational_time_start' => $request->operational_time_start,
                    'operational_time_end' => $request->operational_time_end,
                    'no_hp' => $request->no_hp,
                    'foto' => $request->foto,
                    'role' => 'guru',
                ],
            ));
        }

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('guru.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
