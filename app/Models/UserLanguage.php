<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    use HasFactory;

    protected $table = 'user_language';

    protected $fillable = [
        'language',
        'language_level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
