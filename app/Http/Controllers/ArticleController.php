<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('id', 'DESC')->get();
        return view('pages.admin.article.index', compact(['article']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();

        $image = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/articles'), $image);

        $article = Article::create(array_merge(
            $validated,
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
                'slug' => Str::slug($request->title),
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('article.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('slug', $id)->first();
        return view('pages.admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('slug', $id)->first();
        return view('pages.admin.article.edit', compact('article'));
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
        if(!$request->hasFile('image')){
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);
            //fungsi eloquent untuk update data
            $article = Article::where('slug', $id)->update(array_merge(
                $validator->validated(),
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'slug' => Str::slug($request->title),
                ],
            ));

            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('article.index')
                ->with('success', 'Artikel berhasil diperbarui');
        }else{
            $allowedfileExtension = ['jpg', 'png', 'jpeg', 'svg'];
            $file = $request->file('image');
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);

            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/articles'), $image);
                //fungsi eloquent untuk update data
                $article = Article::where('slug', $id)->update(array_merge(
                    $validator->validated(),
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'image' => $image,
                        'slug' => Str::slug($request->title),
                    ],
                ));

                //jika data berhasil ditambahkan, akan kembali ke halaman utama
                return redirect()->route('article.index')
                    ->with('success', 'Artikel berhasil diperbarui');
            }else{
                //jika data berhasil ditambahkan, akan kembali ke halaman utama
                return redirect()->route('article.index')
                    ->with('danger', 'Artikel gagal diperbarui, gunakan format jpg, png, jpeg atau svg');
            }
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
        Article::where('slug', $id)->delete();
        return redirect()->route('article.index')
            -> with('success', 'Artikel berhasil dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function detail($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('pages.admin.article.detail', compact('article'));
    }
}
