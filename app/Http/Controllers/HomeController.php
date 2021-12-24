<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\ChMessage;
use App\Models\Forum;
use App\Models\PreTestStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin(){
        $chat = ChMessage::where('seen', 0)->get();
//        foreach ($chat as $data){
//            if($data->created_at - date('Y-m-d H:i:s') >= 1 ){
//                dd($data);
//            }
//        }
        $article = Article::all();
        $forum = Forum::with('user', 'comment')->get();
        $banner = Banner::orderBy('id', 'ASC')->get();
        return view('pages.dashboard', compact(['article', 'banner', 'forum']));
    }

    public function guru(){
        $article = Article::all();
        $forum = Forum::with('user')->get();
        $banner = Banner::orderBy('id', 'ASC')->get();
        return view('pages.dashboard', compact(['article', 'banner', 'forum']));
    }

    public function siswa(){
        $uid = Auth::id();
        $pretestUser = PreTestStudent::where('user_id', $uid)->first();
        if($pretestUser == null){
            return redirect()->route('siswa.pretest');
        }else{
            $article = Article::all();
            $forum = Forum::with('user')->get();
            $banner = Banner::orderBy('id', 'ASC')->get();
            return view('pages.dashboard', compact(['article', 'banner', 'forum']));
        }
    }
}
