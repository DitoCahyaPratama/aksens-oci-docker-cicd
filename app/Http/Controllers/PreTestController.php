<?php

namespace App\Http\Controllers;

use App\Http\Requests\PretestRequest;
use App\Models\Interpretasi;
use App\Models\PostTestStudent;
use App\Models\PreTest;
use App\Models\PreTestStudent;
use App\Models\User;
use Database\Seeders\InterpretasiSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PreTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pretest = PreTest::all();
        return view('pages.admin.pretest.index', compact(['pretest']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pretest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PretestRequest $request)
    {
        $validated = $request->validated();

        $pretest = PreTest::create(array_merge($validated,
            [
                'soal' => $request->soal,
                'aspek' => $request->aspek,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pretest.index')
            ->with('success', 'Soal Pretest berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pretest = PreTest::where('id', $id);
        return view('pages.admin.pretest.show', compact('pretest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pretest = PreTest::where('id', $id)->first();
        return view('pages.admin.pretest.edit', compact('pretest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PretestRequest $request, $id)
    {
        $validated = $request->validated();

        $pretest = PreTest::where('id', $id)->update(array_merge($validated,
            [
                'soal' => $request->soal,
                'aspek' => $request->aspek,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pretest.index')
            ->with('success', 'Soal Pretest berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PreTest::where('id', $id)->delete();
        return redirect()->route('pretest.index')
            -> with('success', 'Pretest berhasil dihapus');
    }

    public function test()
    {
        $uid = Auth::id();
        $pretestUser = PreTestStudent::where('user_id', $uid)->first();
        if($pretestUser != null){
            if($uid == $pretestUser->user_id){
                $interpretasi = Interpretasi::all();
                $hasil = json_decode($pretestUser->data_pre_test);
                $total = 0;
                foreach ($hasil as $key => $data){
                    if($key != '_token'){
                        $total += (int) $data;
                    }
                }
                $persentase = round(($total / 150) * 100);
                return view('pages.siswa.pretest.already', compact(['persentase', 'interpretasi']));
            }else{
                return view('pages.siswa.pretest.index');
            }
        }else{
            return view('pages.siswa.pretest.index');
        }
    }

    public function start()
    {
        $soal = PreTest::all();
        return view('pages.siswa.pretest.test', compact('soal'));
    }

    public function submit(Request $request)
    {
        $id = Auth::id();
        $data_pre_test = json_encode($request->all(), true);
        $pretest = PreTestStudent::insertOrIgnore(array_merge(
            [
                'user_id' => $id,
                'data_pre_test' => $data_pre_test,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('siswa.pretest')
            ->with('success', 'Anda berhasil melakukan pretest');
    }

    public function resultStudent(){
        $data_pre_test = PreTestStudent::with('user')->get();
        return view('pages.admin.result.pretest', compact('data_pre_test'));
    }

    public function resultStudentDetail($id){
        $interpretasi = Interpretasi::all();
        $pretestUser = PreTestStudent::with('user')->where('id', $id)->first();
        $hasil = json_decode($pretestUser->data_pre_test);
        $total = 0;
        foreach ($hasil as $key => $data){
            if($key != '_token'){
                $total += (int) $data;
            }
        }
        $persentase = ($total / 150) * 100;
        return view('pages.admin.result.pretestDetail', compact(['pretestUser', 'persentase', 'interpretasi']));
    }
}
