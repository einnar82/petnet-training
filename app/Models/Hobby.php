<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable = ['name', 'frequency'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
