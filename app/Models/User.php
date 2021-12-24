<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'nis',
        'nik',
        'kelas',
        'email',
        'password',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status',
        'alamat',
        'no_hp',
        'foto',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function preTestStudent()
    {
        return $this->hasMany(PreTestStudent::class);
    }

    public function postTestStudent()
    {
        return $this->hasMany(PostTestStudent::class);
    }
}
