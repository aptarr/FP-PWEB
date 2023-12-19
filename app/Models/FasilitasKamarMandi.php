<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamarMandi extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_kamar_mandi';

    protected $fillable = [
        'fasilitas',
        'service_id',
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
