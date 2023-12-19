<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    use HasFactory;

    protected $table = 'user_education';

    protected $fillable = [
        'country_of_college',
        'title',
        'major',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
