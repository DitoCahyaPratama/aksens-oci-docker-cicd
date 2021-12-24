<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PreTestController;
use App\Http\Controllers\PostTestController;
use App\Http\Controllers\ChatAutomaticController;

if (\Illuminate\Support\Facades\App::environment('production')) {
    \Illuminate\Support\Facades\URL::forceScheme('https');
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('siswa.home');

Route::get('/gr', function () {
    return view('welcomeGuru');
})->name('guru.home');

Auth::routes();
Route::post('guru/login', [App\Http\Controllers\Auth\LoginGuruController::class, 'login'])->name('login.guru');


//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/guru/login', function () {
    return view('auth.loginGuru');
})->name('guru.login');


Route::group(['middleware' => 'auth'], function(){
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
    Route::group(['middleware' => 'role:admin'], function() {
        Route::prefix('admin')->group(function () {
            Route::get('/', [HomeController::class, 'admin'])->name('admin.index');
            Route::get('/profile', [HomeController::class, 'admin'])->name('admin.profile');
            Route::get('/teacher', [TeacherController::class, 'index'])->name('admin.teacher');
            Route::get('/teacher/activate/{id}', [TeacherController::class, 'aktifkan'])->name('teacher.active');
            Route::get('/setting/chat', [ChatController::class, 'index'])->name('admin.setting.chat');
            Route::delete('/forum/detail/comment/{id}', [ForumController::class, 'destroy'])->name('public.forum.delete');
            Route::resource('pretest', PreTestController::class);
            Route::resource('posttest', PostTestController::class);
            Route::resource('chatautomatic', ChatAutomaticController::class);
        });
    });

    Route::group(['middleware' => 'role:guru'], function() {
        Route::prefix('guru')->group(function () {
            Route::get('/', [HomeController::class, 'guru'])->name('guru.index');
            Route::get('/profile', [TeacherController::class, 'profile'])->name('guru.profile');
            Route::get('/profile/edit', [TeacherController::class, 'editProfile'])->name('guru.profile.edit');
            Route::put('/profile/update', [TeacherController::class, 'updateProfile'])->name('guru.profile.update');
        });
    });

    Route::group(['middleware' => 'role:siswa'], function() {
        Route::prefix('siswa')->group(function () {
            Route::get('/', [HomeController::class, 'siswa'])->name('siswa.index');
            Route::get('/profile', [StudentController::class, 'profile'])->name('siswa.profile');
            Route::get('/profile/edit', [StudentController::class, 'editProfile'])->name('siswa.profile.edit');
            Route::put('/profile/update', [StudentController::class, 'updateProfile'])->name('siswa.profile.update');
            Route::get('/pretest', [PreTestController::class, 'test'])->name('siswa.pretest');
            Route::get('/pretest/start', [PreTestController::class, 'start'])->name('siswa.pretest.start');
            Route::post('/pretest', [PreTestController::class, 'submit'])->name('siswa.pretest.submit');
            Route::get('/posttest', [PostTestController::class, 'test'])->name('siswa.posttest');
            Route::get('/posttest/start', [PostTestController::class, 'start'])->name('siswa.posttest.start');
            Route::post('/posttest', [PostTestController::class, 'submit'])->name('siswa.posttest.submit');
        });
    });

    Route::group(['middleware' => 'role:guru,admin'], function(){
        Route::resource('article', ArticleController::class);
        Route::resource('student', StudentController::class);
        Route::get('/siswa/activate/{id}', [StudentController::class, 'aktifkan'])->name('student.active');
        Route::resource('banner', BannerController::class);
        Route::prefix('hasil')->group(function () {
            Route::get('/siswa/pretest', [PreTestController::class, 'resultStudent'])->name('result.student.pretest.index');
            Route::get('/siswa/pretest/{id}', [PreTestController::class, 'resultStudentDetail'])->name('result.student.pretest.detail');
            Route::get('/siswa/posttest', [PostTestController::class, 'resultStudent'])->name('result.student.posttest.index');
            Route::get('/siswa/posttest/{id}', [PostTestController::class, 'resultStudentDetail'])->name('result.student.posttest.detail');
        });
    });

    Route::group(['middleware' => 'role:siswa,guru,admin'], function(){
        Route::resource('forum', ForumController::class);
        Route::get('/forum/detail/{id}', [ForumController::class, 'publicDetail'])->name('public.forum.detail');
        Route::post('/forum/detail/comment/{id}', [ForumController::class, 'comment'])->name('public.forum.comment');
        Route::get('/article/detail/{slug}', [ArticleController::class, 'detail'])->name('public.article.detail');

    });

    Route::group(['middleware' => 'role:siswa,guru'], function() {
        Route::get('/chat', [MessagesController::class, 'index'])->name('chat');
        Route::prefix('chatify')->group(function () {
            Route::post('/getStudents', [MessagesController::class, 'getStudents'])->name('chatify.get.students');
            Route::post('/getTeachers', [MessagesController::class, 'getTeachers'])->name('chatify.get.teachers');
        });
    });
});
