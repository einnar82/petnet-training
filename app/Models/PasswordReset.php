<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PasswordReset extends Model
{
    protected $table = 'password_resets',
        $fillable = ['email', 'token'];


    public function createToken($email)
    {
        $password = $this->create([
            'email' => $email,
            'token' => Str::random(16)
        ]);

        return $password->token;
    }

    public function scopeDeleteToken($query, $email)
    {
        return $query->whereEmail($email)->delete();
    }
}
