<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ForumRequest;
use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $forum = Forum::with('user')->get();
        } else {
            $id = Auth::id();
            $forum = Forum::with('user')->where('user_id', $id)->get();
        }

        return view('pages.admin.forum.index', compact(['forum']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumRequest $request)
    {
        $user_id = Auth::id();
        $validated = $request->validated();

        $forum = Forum::create(array_merge(
            [
                'user_id' => $user_id,
                'title' => $request->title,
                'description' => $request->description,
                'limit' => $request->limit,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('forum.index')
            ->with('success', 'Forum berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = Forum::where('id', $id)->first();
        return view('pages.admin.forum.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forum = Forum::where('id', $id)->first();
        return view('pages.admin.forum.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'limit' => 'required',
        ]);
        //fungsi eloquent untuk update data
        $forum = Forum::where('id', $id)->update(array_merge(
            $validator->validated(),
            [
                'user_id' => $user_id,
                'title' => $request->title,
                'description' => $request->description,
                'limit' => $request->limit,
            ],
        ));

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('forum.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forum::where('id', $id)->delete();
        return redirect()->route('forum.index')
            ->with('success', 'Forum berhasil dihapus');
    }

    public function comment(CommentRequest $request, $id)
    {
        $forum = Forum::where('id', $id)->first();
        if ($forum->limit == "0" && Auth::user()->role == "siswa") {
            return redirect()->route('siswa.index');
        } else {
            $user_id = Auth::id();
            $validated = $request->validated();
            $forum = Comment::create(array_merge($validated,
                [
                    'komentar' => $request->comment,
                    'forum_id' => $id,
                    'user_id' => $user_id
                ],
            ));

            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('public.forum.detail', $id)
                ->with('success', 'Komentar berhasil ditambahkan');
        }
    }

    public function publicDetail($id)
    {
        $forum = Forum::with('user')->where('id', $id)->first();
        $comment = Comment::with('user')->where('forum_id', $forum->id)->orderByDesc('created_at')->get();
        return view('pages.admin.forum.detail', compact(['forum', 'comment']));
    }

}
