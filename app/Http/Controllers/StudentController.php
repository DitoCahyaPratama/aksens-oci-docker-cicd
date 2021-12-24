<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'guru'){
            $student = User::where([['role', 'siswa'], ['kelas', Auth::user()->kelas]])->get();
        }else{
            $student = User::where('role', 'siswa')->get();
        }
        return view('pages.admin.student.index', compact(['student']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();

        $student = User::create(array_merge(
            [
                'username' => $request->username,
                'name' => $request->name,
                'nis' => $request->nis,
                'kelas' => $request->kelas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => $request->foto,
                'role' => 'siswa',
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('student.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::where([['id', $id], ['role', 'siswa']])->first();
        return view('pages.admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::where([['id', $id], ['role', 'siswa']])->first();
        return view('pages.admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->password == null){
            $student = User::where('id', $id)->update(array_merge(
                [
                    'name' => $request->name,
                    'username' => $request->username,
                    'nis' => $request->nis,
                    'kelas' => $request->kelas,
                    'email' => $request->email,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'foto' => $request->foto,
                    'role' => 'siswa',
                ],
            ));
        }else{
            $student = User::where('id', $id)->update(array_merge(
                [
                    'name' => $request->name,
                    'username' => $request->username,
                    'nis' => $request->nis,
                    'kelas' => $request->kelas,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'foto' => $request->foto,
                    'role' => 'siswa',
                ],
            ));
        }

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('student.index')
            ->with('success', 'Siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where([['id', $id], ['role', 'siswa']])->delete();
        return redirect()->route('student.index')
            -> with('success', 'Siswa berhasil dihapus');
    }

    public function aktifkan(Request $request, $id)
    {
        $user = User::where([['id', $id], ['role', 'siswa']])->get()->first();
        if($user->status == '0'){
            $user->update(array_merge(
                [
                    'status' => '1',
                ],
            ));
            return redirect()->route('student.index')
                -> with('success', 'Status siswa berhasil diubah menjadi aktif');
        }else{
            $user->update(array_merge(
                [
                    'status' => '0',
                ],
            ));
            return redirect()->route('student.index')
                -> with('success', 'Status siswa berhasil diubah menjadi tidak aktif');
        }
    }

    public function profile(){
        $student = User::where('id', Auth::id())->first();
        return view('pages.siswa.profile', compact(['student']));
    }

    public function editProfile(){
        $student = User::where('id', Auth::id())->first();
        return view('pages.siswa.profileEdit', compact(['student']));
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
                    'no_hp' => $request->no_hp,
                    'foto' => $request->foto,
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
                    'no_hp' => $request->no_hp,
                    'foto' => $request->foto,
                ],
            ));
        }

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('siswa.profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
}
