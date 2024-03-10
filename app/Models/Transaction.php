<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asal',
        'property_id',
        'description'
    ];

    public function properties()
    {
        return $this->belongsTo(Properties::class, 'property_id');
    }
}
