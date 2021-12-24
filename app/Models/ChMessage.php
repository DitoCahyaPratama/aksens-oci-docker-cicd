<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChMessage extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $fillable=['type', 'from_id', 'to_id', 'body', 'attachment', 'seen'];
}
