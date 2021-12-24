<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id', 'ASC')->get();
        return view('pages.admin.banner.index', compact(['banner']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'svg'];
        $file = $request->file('foto');

        $extension = $file->getClientOriginalExtension();
        $check = in_array($extension, $allowedfileExtension);

        if ($check) {
            $image = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads/banners'), $image);
            //fungsi eloquent untuk update data
            $banner = Banner::where('id', $id)->update(array_merge(
                [
                    'foto' => $image,
                ],
            ));

            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('banner.index')
                ->with('success', 'Banner berhasil diperbarui');
        }else{
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('banner.index')
                ->with('danger', 'Banner gagal diperbarui, gunakan format jpg, png, jpeg atau svg');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::where('id', $id)->update(array_merge(
            [
                'foto' => 'img1.jpg',
            ],
        ));

        return redirect()->route('banner.index')
            ->with('success', 'Banner berhasil dihapus');
    }
}
