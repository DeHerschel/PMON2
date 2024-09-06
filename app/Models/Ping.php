<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ping extends Model
{
    protected $casts = [
        'date' => 'datetime'
    ];
    protected $fillable = [
        'ptime',
        'date',
        'target'
    ];
    use HasFactory;

    public function Target()
    {
        return $this->belongsTo('App\Models\Target');
    }
}
