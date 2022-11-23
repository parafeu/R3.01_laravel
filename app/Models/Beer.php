<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "type"
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function bars() {
        return $this->belongsToMany(Bar::class);
    }
}
