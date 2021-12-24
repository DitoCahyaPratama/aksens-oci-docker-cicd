<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreTestStudent extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=['user_id', 'data_pre_test'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
