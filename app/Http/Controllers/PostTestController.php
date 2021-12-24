<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosttestRequest;
use App\Models\Interpretasi;
use App\Models\PostTest;
use App\Models\PostTestStudent;
use App\Models\PreTestStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posttest = PostTest::all();
        return view('pages.admin.posttest.index', compact(['posttest']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.posttest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PosttestRequest $request)
    {
        $validated = $request->validated();

        $postest = PostTest::create(array_merge($validated,
            [
                'soal' => $request->soal,
                'aspek' => $request->aspek,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('posttest.index')
            ->with('success', 'Soal Posttest berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posttest = PostTest::where('id', $id);
        return view('pages.admin.posttest.show', compact('posttest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posttest = PostTest::where('id', $id)->first();
        return view('pages.admin.posttest.edit', compact('posttest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PosttestRequest $request, $id)
    {
        $validated = $request->validated();

        $posttest = PostTest::where('id', $id)->update(array_merge($validated,
            [
                'soal' => $request->soal,
                'aspek' => $request->aspek,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('posttest.index')
            ->with('success', 'Soal Postest berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostTest::where('id', $id)->delete();
        return redirect()->route('posttest.index')
            -> with('success', 'Posttest berhasil dihapus');
    }

    public function test()
    {
        $uid = Auth::id();
        $posttestUser = PostTestStudent::where('user_id', $uid)->first();
        if($posttestUser != null){
            if($uid == $posttestUser->user_id){
                $interpretasi = Interpretasi::all();
                $hasil = json_decode($posttestUser->data_post_test);
                $total = 0;
                foreach ($hasil as $key => $data){
                    if($key != '_token'){
                        $total += (int) $data;
                    }
                }
                $persentase = ($total / 150) * 100;
                return view('pages.siswa.posttest.already', compact(['persentase', 'interpretasi']));
            }else{
                return view('pages.siswa.posttest.index');
            }
        }else{
            return view('pages.siswa.posttest.index');
        }
    }

    public function start()
    {
        $soal = PostTest::all();
        return view('pages.siswa.posttest.test', compact('soal'));
    }

    public function submit(Request $request)
    {
        $id = Auth::id();
        $data_post_test = json_encode($request->all(), true);
        $posttest = PostTestStudent::create(array_merge(
            [
                'user_id' => $id,
                'data_post_test' => $data_post_test,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('siswa.posttest')
            ->with('success', 'Anda berhasil melakukan posttest');
    }

    public function resultStudent(){
        $data_post_test = PostTestStudent::with('user')->get();
        return view('pages.admin.result.posttest', compact('data_post_test'));
    }

    public function resultStudentDetail($id){
        $interpretasi = Interpretasi::all();
        $posttestUser = PostTestStudent::with('user')->where('id', $id)->first();
        $hasil = json_decode($posttestUser->data_post_test);
        $total = 0;
        foreach ($hasil as $key => $data){
            if($key != '_token'){
                $total += (int) $data;
            }
        }
        $persentase = ($total / 150) * 100;
        return view('pages.admin.result.posttestDetail', compact(['posttestUser', 'persentase', 'interpretasi']));
    }
}
