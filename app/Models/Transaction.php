<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'status',
        'package',
        'service_id',
        'deliverable',
        'isReview',
    ];

    function user () {
        return $this->belongsTo(User::class);
    }

    function service () {
        return $this->belongsTo(Service::class);
    }
}
