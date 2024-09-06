<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'type',
        'description',
        'target'
    ];
    use HasFactory;

    public function Target()
    {
        return $this->belongsTo('App\Models\Target');
    }
}
