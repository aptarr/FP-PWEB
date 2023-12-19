<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertification extends Model
{
    use HasFactory;

    protected $table = 'user_certification';

    protected $fillable = [
        'certificate_name',
        'certification_from',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
