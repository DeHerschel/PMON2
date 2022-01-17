<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roll extends Model
{
    public $timestamps = false;
    protected $filleable = [
        'name'
    ];
    protected $table = 'rolls';
    use HasFactory;
}
