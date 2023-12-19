<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'kamar_tersedia',
        'harga_per_bulan',
        'image',
        'category_id',
        'subcategory_id',
        'average_star',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function servicereport() {
        return $this->hasMany(ServiceReport::class);
    }

    public function userreview() {
        return $this->hasMany(UserReview::class);
    }

    public function transaction() {
        return $this->belongsToMany(User::class, 'transactions', 'service_id', 'user_id')->withPivot('quantity', 'status');
    }

    public function wishlist() {
        return $this->belongsToMany(User::class, 'wishlists', 'service_id', 'user_id');
    }

    public function fasilitaskamar() {
        return $this->hasMany(FasilitasKamar::class);
    }

    public function fasilitaskamarmandi() {
        return $this->hasMany(FasilitasKamarMandi::class);
    }

}
